<?php

namespace App\Traits;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

trait Template
{
    //script para subir o mover la imagen
    public static function moveImage(Request $request, $filename, $endFilename){

        if (!empty($request->hasFile($filename))) {
            $image = $request->file($filename);
            $basePath = "img/config/";
            $file = $endFilename ?? $filename;
            $path = "$basePath$file." . $image->guessExtension();
            if (file_exists($path)) unlink($path);
            $route = public_path($basePath);
            $image->move($route, $file . '.' . $image->guessExtension());
            return $path;
        } else {
            return 'NULL';
        }
    }
    //Traer usuario logeado
    public function traerUsuario($id){
        $user = User::find($id);
        if(empty($user)){
            return null;
        }
        return $user;
    }

    //Traemos el nombre del tenant
    public function traerNombre(){
        $url = $_SERVER['HTTP_HOST'];
        $partes = explode('.', $url);
        return $partes[0];
    }

    //Preguntar configuracion de usuario logeado
    public function traerConfiguracion($user){
        $respuesta = $user['config'] == '1' ? true : false;
        return $respuesta;
    }

    //Se elimina imagenes
    public static function deleteImage($path){
        if (file_exists($path)) unlink($path);
    }

    //Calculamos el codigo de cada producto
    public function codigoProducto(){
        $codigo = 1001;
        $productos = Producto::count();
        if($productos!=0)$codigo=$codigo+$productos;
        return $codigo;
    }
    //Calculamos el codigo de cada producto
    public function codigoVenta(){
        $codigo = 1001;
        $ventas = Venta::count();
        if($ventas!=0)$codigo=$codigo+$ventas;
        return $codigo;
    }
    /**
    * It takes a JSON string and returns an array
    *
    * @param lista The list of items you want to decode.
    *
    * @return the decoded list.
    */
    public function decodificar($lista){
        $listaDecodificada = json_decode($lista, true);
        return $listaDecodificada;
    }

    /**
     * It takes an array of objects, and updates the database with the values of the objects
     *
     * @param lista array of objects
     */
    public function actualizarProductoDevolucion($lista){
        foreach ($lista as $lis) {
            // Buscamos el producto
            $producto = Producto::find($lis['id']);
            if ($producto->stock != 0){
                $data = [
                    'stock' => $lis['stock'] + $lis['cantidad'],
                ];
                $producto->update($data);
            }else {
                return false;
            }
        }
        return true;
    }

    /**
     * It takes an array of objects, and updates the database with the values of the objects
     *
     * @param lista array of objects
     */
    public function actualizarProducto($lista){
        foreach ($lista as $lis) {
            $producto = Producto::find($lis['id']);
            if($producto->stock != 0){
                $data = [
                    'stock' => $lis['stock']
                ];
                $producto->update($data);
            }else {
                return false;
            }
        }
        return true;
    }
    //Al eliminar los productos, devolvemos el stock al producto
    public function devolverProductos($lista){
        foreach ($lista as $lis) {
            $producto = Producto::find($lis['id']);
            $data = [
                'stock' => $producto->stock + $lis['cantidad']
            ];
            $producto->update($data);
        }
    }
    //Devolvemos una lista JSON de los productos
    public function devolverListaProductoVenta($productos){
        $respuesta = [];
        foreach ($productos as $listaproducto) {
            array_push($respuesta, [
                'id' => $listaproducto['id'],
                'stock' => $listaproducto->stock,
                'nombre' => $listaproducto->nombre . ' - ' . $listaproducto->codigo_propio . ' - ' . $listaproducto->codigo_escaner,
                'precioVender' => $listaproducto->precio_venta,
                'precioCosto' => $listaproducto->precio_costo,
                'combi_nombre' => $listaproducto->nombre . ' - ' . $listaproducto->codigo_propio . ' - ' . $listaproducto->codigo_escaner,
            ]);
        }
        // Convertir el array a un string JSON
        $jsonString = json_encode($respuesta);
        Log::info($jsonString);
        return $respuesta;
    }
    //Traemos y retornamos los nombres en JSON, segun la libreria Chart.js
    public function graficaClienteNombre(){
        $clientes = Cliente::whereYear('fecha_creado',$this->traerFecha())->where('total_compras','=',1)->get();
        $labels = [];
        foreach ($clientes as $cliente){
            $labels[] = [
                $cliente->nombre,
            ];
        }
        return json_encode($labels);
    }
    //Traemos el año en curso, actualmente se usa para los datos de las graficas
    public function traerFecha(){
        return date('Y');
    }
    //Traemos y retornamos los nombres en JSON, segun la libreria Chart.js
    public function graficaClienteData(){
        $clientes = Cliente::whereYear('fecha_creado',$this->traerFecha())->where('total_compras','=',1)->get();
        $data = [];
        foreach ($clientes as $cliente){
            $data[] = [
                $cliente->total_compras,
            ];
        }
        return json_encode($data);
    }
    //Traemos y retornamos los nombres en JSON, segun la libreria Chart.js
    public function graficaVentaNombre(){
        $labels = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        return json_encode($labels);
    }
    //Traemos y retornamos los nombres en JSON, segun la libreria Chart.js
    public function graficaVentaData(){
        $data = [];
        for ($i=1;$i<13;$i++){
            array_push($data,Venta::whereMonth('fecha',$i)->count());
        }
        return json_encode($data);
    }
    //Buscar producto en las ventas
    public function traerVentaProducto($id){
        $contador = Venta::where('productos','like','%'.'"id":"'.$id.'"%')->count();
        return $contador;
    }
    /**
     * It takes a JSON string as an argument, decodes it, loops through the decoded array, and returns
     * an array of the stock values of the products in the decoded array
     *
     * @param lista the list of products that are being sold
     */
    public function traerProductoVendido($lista){
        $listaProducto = json_decode($lista, true);
        $stocks = [];
        foreach ($listaProducto as $listaproducto) {
            $producto = Producto::where('id',$listaproducto['id'])->get();
            array_push($stocks, $producto[0]->stock + $listaproducto['cantidad']);
        }
        return $stocks;
    }
}
