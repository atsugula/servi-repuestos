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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',30);
            $table->string('cedula');
            $table->string('apellido',30);
            $table->string('telefono',15)->nullable()->default('N/A');
            $table->string('direccion',30)->nullable()->default('N/A');
            $table->integer('total_compras')->nullable()->default('0');
            $table->date('ultima_compra')->nullable()->useCurrent();
            $table->timestamp('fecha_creado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
