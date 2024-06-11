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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 190)->nullable();
            $table->string('total')->nullable();
            $table->text('productos')->nullable();
            $table->timestamp('fecha')->nullable();
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('iva')->nullable()->default('0.00');
            $table->string('descuento')->nullable()->default('0.00');
            // $table->string('saldo_pendiente')->nullable()->default('0.00');
            // $table->string('tipo_pago', 20)->nullable()->default('Efectivo');
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
        Schema::dropIfExists('cotizaciones');
    }
};
