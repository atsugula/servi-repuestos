<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\TipoGasto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class GastoController
 * @package App\Http\Controllers
 */
class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastos = Gasto::paginate();

        return view('gasto.index', compact('gastos'))
            ->with('i', (request()->input('page', 1) - 1) * $gastos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gasto = new Gasto();
        $tipoGastos = TipoGasto::pluck('nombre','id');
        return view('gasto.create', compact('gasto','tipoGastos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Gasto::$rules);
        $data = [
            'id_tipo_gasto' => $request['id_tipo_gasto'],
            'valor' => $request['valor'],
            'observaciones' => $request['observaciones'],
        ];
        $gasto = Gasto::create($data);

        return redirect()->route('gastos.index')
            ->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gasto = Gasto::find($id);
        //si no trae nada genere un error
        if(empty($gasto))return view('errors.404');
        return view('gasto.show', compact('gasto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gasto = Gasto::find($id);
        //si no trae nada genere un error
        if(empty($gasto))return view('errors.404');
        $tipoGastos = TipoGasto::pluck('nombre','id');
        return view('gasto.edit', compact('gasto','tipoGastos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Gasto $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {
        request()->validate(Gasto::$rules);
        $data = [
            'id_tipo_gasto' => $request['id_tipo_gasto'],
            'valor' => $request['valor'],
            'observaciones' => $request['observaciones'],
        ];
        $gasto->update($data);

        return redirect()->route('gastos.index')
            ->with('success', 'Updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $gasto = Gasto::find($id);
        //si no trae nada genere un error
        if(empty($gasto))return view('errors.404');
        $gasto->delete();
        return redirect()->route('gastos.index')
            ->with('success', 'Deleted successfully.');
    }

    //Generar reporte de gastos
    public function PDF(){
        $i = 1;
        $ingresos = 0;
        $egresos = 0;
        $gastos_ingresos = Gasto::orderBy('fecha','asc')
            ->whereHas('tipoGasto', function ($query) {
                $query->where('tipo', 'Ingreso');
            })->get();

        $gastos_egresos = Gasto::orderBy('fecha','asc')
            ->whereHas('tipoGasto', function ($query) {
                $query->where('tipo', 'Egreso');
            })->get();

        $pdf = PDF::loadview('gasto.reporte', compact('gastos_ingresos','gastos_egresos','ingresos','egresos','i'));
        $pdf->set_paper('letter', 'landscape');
        return $pdf->stream('reporte.pdf');
    }

}
