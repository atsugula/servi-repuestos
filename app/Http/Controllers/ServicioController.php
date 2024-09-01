<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedore;
use App\Models\Venta;
use Illuminate\Http\Request;
use App\Traits\Template;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ServicioController extends Controller
{
    use Template;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        if ($buscarpor == null) $productos = Producto::paginate();
        $productos = Producto::where('nombre','like','%' . $buscarpor . '%')->paginate();
        return view('servicio.index', compact('productos','buscarpor'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $categorias = Categoria::pluck('nombre','id');
        $proveedores = Proveedore::pluck('nombre','id');
        return view('servicio.create', compact('producto','categorias','proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Producto::$ruleService);

        $request['type'] = 1;

        $request['ganancia'] = ($request['porcentaje'] / 100) * $request['precio_costo'];

        $$request['stock'] = 10000000;
        
        $data = $request->all();

        $producto = Producto::create($data);

        return redirect()->route('productos.index')
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
        $producto = Producto::find($id);
        //si no trae nada genere un error
        if(empty($producto))return view('errors.404');
        return view('servicio.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        //si no trae nada genere un error
        if(empty($producto))return view('errors.404');
        $categorias = Categoria::pluck('nombre','id');
        $proveedores = Proveedore::pluck('nombre','id');
        return view('servicio.edit', compact('producto','categorias','proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        request()->validate(Producto::$ruleService);

        $request['ganancia'] = ($request['porcentaje'] / 100) * $request['precio_costo'];

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $message = 'Deleted successfully.';
        $tipo = 'success';
        $producto = Producto::find($id);
        //si no trae nada genere un error
        if(empty($producto))return view('errors.404');
        //Buscamos si tiene ventas registradas
        $conVentas = ServicioController::traerVentaProducto($id);
        if($conVentas == 0)$producto->delete();
        else {
            $message = 'There are sales with this product.';
            $tipo = 'error';
        }
        return redirect()->route('productos.index')
            ->with($tipo, $message);
    }
    //Generar reporte de productos
    public function productosPDF(Request $request){
        $i = 1;
        if($request['fechaInicial'] == null){
            $now = date('d-m-Y');
            $rest = date("d-m-Y",strtotime($now.'- 1 days'));
            $productos = Producto::whereBetween('created_at',[$now, $rest])->get();
        }
        else if($request['fechaInicial'] == $request['fechaFinal'])$productos = Producto::where('created_at','LIKE','%'.$request['fechaFinal'].'%')->get();
        else$productos = Producto::whereBetween('created_at',[$request['fechaInicial'],$request['fechaFinal']])->get();
        //Generamos el pdf
        set_time_limit(300);
        $pdf = PDF::loadview('producto.reporte', compact('productos','i'), ['dpi' => '200']);
        $pdf->set_paper('letter', 'landscape');
        return $pdf->stream('reporte.pdf');
    }
    //Vista para generar los reportes
    public function reportes(Request $request){
        return view('producto.index-reporte');
    }

    public function exportReport(){
        $date_now = Carbon::now()->format('d-m-Y');
        $name = 'Productos_' . $date_now;
        return Excel::download(new ProductsExport, $name .'.xlsx');
    }

}
