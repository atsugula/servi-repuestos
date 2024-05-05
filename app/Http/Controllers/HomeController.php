<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Venta;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\Template;

class HomeController extends Controller
{
    use Template;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $message = 'Bienvenido, comienza cambiando tu contraseña.';
        $user = HomeController::traerUsuario(auth()->id());
        $respuesta = HomeController::traerConfiguracion($user);
        /***********************************************/
        // PROCESO PARA MOSTRAR EL BTN DE CONFIGURACION
        /***********************************************/
        $mostrar=true; //Por defecto lo mostramos
        //Buscamos el usuario logeado
        $usuario = User::find(auth()->user()->id);
        //Permite mostrar las configuraciones
        if($usuario->tipo_usuario>0)$mostrar=false;

        if($respuesta){
            $clientes = Cliente::count();
            $ventas = Venta::count();
            //Llenamos el grafico para los clientes
            $namesCliente=HomeController::graficaClienteNombre();
            $dataCliente=HomeController::graficaClienteData();
            //Llenamos el grafico para las ventas
            $namesVenta=HomeController::graficaVentaNombre();
            $dataVenta=HomeController::graficaVentaData();
            return view('home',compact('clientes','ventas','namesCliente','dataCliente','namesVenta','dataVenta','mostrar'));
        }else{
            return redirect()->route('usuarios.cambiar-contrasena')->with('user',$user, 'message', $message);
        }
    }
}
