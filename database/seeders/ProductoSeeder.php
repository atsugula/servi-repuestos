<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *apellido
     * @return void
     */
    public function run()
    {
        //Primeros 10
        Producto::create([
            'codigo' => '1',
            'nombre' => 'N/A',
            'precio_costo' => 0,
            'porcentaje' => 0,
            'precio_venta' => 0,
            'stock' => 1000000,
            'id_categoria' => 1,
            'id_proveedor' => 1,
            'marca' => 'N/A',
        ]);
    }
}
