<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

/**
 * Class CategoriaController
 * @package App\Http\Controllers
 */
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate();

        return view('categoria.index', compact('categorias'))
            ->with('i', (request()->input('page', 1) - 1) * $categorias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = new Categoria();
        return view('categoria.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Categoria::$rules);

        $categoria = Categoria::create($request->all());

        return redirect()->route('categorias.index')
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
        $categoria = Categoria::find($id);
        //si no trae nada genere un error
        if(empty($categoria))return view('errors.404');
        return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        //si no trae nada genere un error
        if(empty($categoria))return view('errors.404');
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        request()->validate(Categoria::$rules);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
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
        $categoria = Categoria::find($id);
        //si no trae nada genere un error
        if(empty($categoria))return view('errors.404');
        $cateConProductos = Producto::where('id_categoria','=',$categoria->id)->count();
        if($cateConProductos == 0)$categoria->delete();
        else{
            $message = 'There are products in this category.';
            $tipo = 'error';
        }
        return redirect()->route('categorias.index')
            ->with($tipo, $message);
    }
}
