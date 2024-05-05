<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentaController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Traer variables para llenar los modulos
Route::controller(VentaController::class)->group(function(){
    //Listar todos los productos en el select
    Route::post('/traer/productos','traerProductos');
    Route::post('/{id}/traer/productos','traerProductos');

    //Traer informacion del producto seleccionado
    Route::post('/traer/seleccionado','traerProducto');
    Route::post('/{id}/traer/seleccionado','traerProducto');
});
