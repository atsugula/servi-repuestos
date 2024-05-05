<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\TipoGastoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ConfiguracioneController;
use App\Http\Controllers\ServicioController;

//Personalizamos las vistas del Auth
Route::namespace('Auth')->group(function(){
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
//En caso de que no este logeado no le muestre nada
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('home', [HomeController::class, 'index']);
    Route::resource('categorias', CategoriaController::class)->names('categorias');
    Route::resource('clientes', ClienteController::class)->names('clientes');
    Route::resource('proveedores', ProveedoreController::class)->names('proveedores');
    Route::resource('tipo-gastos', TipoGastoController::class)->names('tipo-gastos');
    Route::resource('usuarios', UserController::class)->names('usuarios');

    //Modulo para las configuraciones del proyecto
    Route::get('configuraciones', [ConfiguracioneController::class, 'index'])->name('configuraciones.index');
    Route::patch('configuraciones', [ConfiguracioneController::class, 'update'])->name('configuraciones.update');

    //Modulos donde se habilita que metodo se ejecuta
    Route::resource('gastos',GastoController::class)->names('gastos');
    Route::resource('productos', ProductoController::class)->names('productos');
    Route::resource('servicios', ServicioController::class)->names('servicios');
    Route::resource('ventas', VentaController::class)
        ->only('index','create','store','edit','update','destroy')->names('ventas');

    //Personalizar usuario, despues de logearse
    Route::get('/cambiar-contrasena', [UserController::class, 'showFormChangePassword']);
    Route::patch('/cambiar-contrasena', [UserController::class, 'changePassword'])
        ->name('usuarios.cambiar-contrasena');

    //Modulos para generar reportes
    Route::post('reporte/productos', [ProductoController::class, 'productosPDF'])->name('productos.reporte.pdf');
    Route::get('reportes/productos', [ProductoController::class, 'reportes']);
    Route::get('pdf/gastos', [GastoController::class, 'PDF'])->name('gastos.reporte.pdf');
    Route::get('ventas/pdf', [VentaController::class, 'rangoPDF'])->name('ventas.rango.pdf');
    Route::post('ventas/pdf', [VentaController::class, 'rangoPDF']);

    Route::get('products/export', [ProductoController::class, 'exportReport'])->name('productos.reporte.excel');

    //Traer las facturas generadas
    Route::get('ventas/factura/{id}', [VentaController::class, 'facturaVenta'])->name('ventas.factura');

    //Realizar copias de seguridad o backup
    Route::get('backups', [ConfiguracioneController::class, 'generarBackup'])->name('backup');

});
