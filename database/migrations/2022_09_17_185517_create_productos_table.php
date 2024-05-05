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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 190);
            $table->string('marca', 190)->nullable();
            $table->string('codigo', 190);
            $table->double('precio_costo');
            $table->double('precio_venta');
            $table->string('observaciones')->nullable()->default('N/A');
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_proveedor')->nullable()->default(1);
            $table->bigInteger('stock')->nullable()->default('0');
            $table->double('porcentaje')->nullable()->default('0.00');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
