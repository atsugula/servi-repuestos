<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 190);
            $table->double('total');
            $table->text('productos');
            $table->timestamp('fecha');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_usuario');
            $table->double('iva')->nullable()->default('0.00');
            $table->double('descuento')->nullable()->default('0.00');
            $table->double('saldo_pendiente')->nullable()->default('0.00');
            $table->string('tipo_pago', 20)->nullable()->default('Efectivo');
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
