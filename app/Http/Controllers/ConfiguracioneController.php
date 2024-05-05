<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\Template;
use App\Traits\Backup;

/**
 * Class ConfiguracioneController
 * @package App\Http\Controllers
 */
class ConfiguracioneController extends Controller
{
    use Template, Backup;

    public function index()
    {
        $configuracione = Configuracione::find(1);
        //si no trae nada genere un error
        if(empty($configuracione))return view('errors.404');
        /**********************************************/
        // SI ES EMPLEADO NO MUESTRA CONFIGURACIONES
        /**********************************************/
        //Buscamos el usuario logeado
        $usuario = User::find(auth()->id());
        //Permite mostrar las configuraciones
        if($usuario->tipo_usuario>0)return view('errors.500');
        return view('configuracione.edit', compact('configuracione'));
    }

    public function update(Request $request)
    {
        /**********************************************/
        // SI ES EMPLEADO NO MUESTRA CONFIGURACIONES
        /**********************************************/
        //Buscamos el usuario logeado
        $usuario = User::find(auth()->id());
        //Permite mostrar las configuraciones
        if($usuario->tipo_usuario>0)return view('errors.500');
        $data = request()->except(['_token', '_method']);
        $configuracione = Configuracione::find(1);
        //si no trae nada genere un error
        if(empty($configuracione))return view('errors.404');
        if(isset($data['icono']))$data['icono'] = ConfiguracioneController::moveImage($request,'icono','favicon');
        if(isset($data['logo_auth']))$data['logo_auth'] = ConfiguracioneController::moveImage($request,'logo_auth','auth-logo');
        if(isset($data['img_auth']))$data['img_auth'] = ConfiguracioneController::moveImage($request,'img_auth','proyecto');
        $configuracione->update($data);

        return redirect()->route('configuraciones.index')
            ->with('success', 'Configuracione updated successfully');
    }

    public function generarBackup(){
        $message = 'Generates the backup correctly.';
        $tipo = 'success';
        $mensaje = ConfiguracioneController::generar();
        if($mensaje>0){
            $message = 'Generates the backup correctly.';
            $tipo = 'error';
        }
        return redirect()->route('configuraciones.index')
            ->with($tipo, $message);
    }

}
