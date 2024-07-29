<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Traits\Template;
use App\Models\Producto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
/**
 * Class VentaController
 * @package App\Http\Controllers
 */
class VentaController extends Controller
{
    use Template;

    public function index()
    {
        $ventas = Venta::paginate();

        return view('venta.index', compact('ventas'))
            ->with('i', (request()->input('page', 1) - 1) * $ventas->perPage());
    }

    public function create()
    {
        $venta = new Venta();
        $stocks = [];
        //Para identificar que hacemos en el Form
        $accion = 'crear';
        //Traer código
        $venta->codigo = VentaController::codigoVenta();
        //Traer una lista de clientes
        $clientes = Cliente::pluck('nombre','id');
        return view('venta.create', compact('venta','clientes','stocks','accion'));
    }

    public function store(Request $request)
    {
        request()->validate(Venta::$rules);

        $data = [
            'codigo' => $request['codigo'],
            'id_cliente' => $request['id_cliente'],
            'id_usuario' => $request['id_usuario'],
            'productos' => $request['listaProductos'],
            'total' => $request['total'],
            'fecha' => now(),
        ];
        $respuesta = $this->actualizarProducto($this->decodificar($request['listaProductos']));
        if($respuesta){
            $cliente = Cliente::find($data['id_cliente']);

            $cliente->update([
                'total_compras'=>$cliente->total_compras+1,
                'ultima_compra'=>date('Y-m-d'),
            ]);
            Venta::create($data);
            return redirect()->route('ventas.index')
                ->with('success', 'Created successfully.');
        }else{
            return redirect()->route('ventas.index')
                ->with('error', 'Alguno de los productos seleccionados no tiene stock.');
        }

    }

    public function show($id)
    {
        $venta = Venta::find($id);

        return view('venta.show', compact('venta'));
    }

    public function edit($id)
    {
        $venta = Venta::find($id);
        //si no trae nada genere un error
        if(empty($venta))return view('errors.404');
        $stocks = VentaController::traerProductoVendido($venta->productos);
        //Para identificar que hacemos en el Form
        $accion = 'editar';
        //Traer una lista de clientes
        $clientes = Cliente::pluck('nombre','id');
        return view('venta.edit', compact('venta','clientes','stocks','accion'));
    }

    public function update(Request $request, Venta $venta)
    {
        request()->validate(Venta::$rules);

        $data = [
            'codigo' => $request['codigo'],
            'id_cliente' => $request['id_cliente'],
            'id_usuario' => $request['id_usuario'],
            'productos' => $request['listaProductos'],
            'total' => $request['total'],
        ];

        $respuesta = $this->actualizarProducto($this->decodificar($request['listaProductos']));

        if($respuesta){
            $venta->update($data);
            return redirect()->route('ventas.index')
                ->with('success', 'Updated successfully.');
        }else{
            return redirect()->route('ventas.index')
                ->with('error', 'Alguno de los productos seleccionados no tiene stock.');
        }
    }

    public function destroy($id)
    {
        $venta = Venta::find($id);
        $cliente = Cliente::find($venta->id_cliente);
        $this->devolverProductos($this->decodificar($venta->productos));
        $cliente->update([
            'total_compras'=>$cliente->total_compras-1,
            'ultima_compra'=>date('Y-m-d'),
        ]);

        $venta->delete();

        return redirect()->route('ventas.index')
            ->with('success', 'Deleted successfully.');
    }

    /**
     * It generates a PDF with the data of the sales made in a certain period of time.
     * </code>
     *
     * @param Request request The request object.
     *
     * @return The PDF is being returned.
     */
    public function rangoPDF(Request $request){
        $total = 0;
        $promedio = 0;
        $cantidad = 0;
        $i = 1;
        if($request['fechaInicial'] == null){
            $now = date('d-m-Y');
            $rest = date("d-m-Y",strtotime($now.'- 1 week'));
            $ventas = Venta::whereBetween('fecha',[$now, $rest])->get();
        }
        else if($request['fechaInicial'] == $request['fechaFinal'])$ventas = Venta::where('fecha','LIKE','%'.$request['fechaFinal'].'%')->get();
        else$ventas = Venta::whereBetween('fecha',[$request['fechaInicial'],$request['fechaFinal']])->get();
        //Generamos el pdf
        $pdf = Pdf::loadview('venta.show', compact('ventas','total','promedio','cantidad','i'));
        $pdf->set_paper('letter', 'landscape');
        return $pdf->stream('reporte.pdf');
    }

    /**
     * It returns a JSON object of all the products in the database
     */
    public function traerProductos(Request $request)
    {
        $productos = Producto::all();
        $respuesta = $this->devolverListaProductoVenta($productos);
        return response(json_encode($respuesta),200)->header('Content-type','text/plain');
    }

    /**
     * It returns a JSON object of the product with the name
     *
     * @param nombre The name of the product
     */
    public function traerProducto(Request $request)
    {
        $producto = Producto::where('id',$request['id'])->get();
        $respuesta = $this->devolverListaProductoVenta($producto);
        return response(json_encode($respuesta),200)->header('Content-type','text/plain');
    }

    /**
     * The function facturaVenta() is called from a route, and it returns a PDF file
     *
     * @return The PDF is being returned.
     */
    public function facturaVenta($id){
        $venta = Venta::find($id);
        $codigo = $venta->codigo;

        $listaProductos = json_decode($venta->productos, true);

        $productos = [];

        foreach ($listaProductos as $key => $producto) {
            // Buscamos el producto
            $model = Producto::where('id', $producto["id"])->first();
            // añadimos los campos al array
            $model["descripcion"] = $producto["descripcion"];
            $model["cantidad"] = $producto["cantidad"];
            $model["precio"] = $producto["precio"];
            // Incluimos esto a la lista de productos
            array_push($productos, $model);
        }

        $pdf = Pdf::loadview('venta.factura',compact('venta','codigo','productos'));
        $pdf->setPaper('b7', 'portrait');
        return $pdf->stream('reporte.pdf');
    }

}
