<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'cedula' => '1',
            'nombre' => 'N/A',
            'apellido' => 'N/A',
            'telefono' => 'N/A',
            'direccion' => 'N/A',
        ]);
        Cliente::create([
            'cedula' => '2',
            'nombre' => 'CARLOS',
            'apellido' => 'SECRETARIA DEPARTAMENTAL',
            'telefono' => '3168738530',
            'direccion' => 'N/A',
        ]);
        Cliente::create([
            'cedula' => '3',
            'nombre' => 'JUAN CAMILO',
            'apellido' => 'ORTIZ',
            'telefono' => '3153362722',
            'direccion' => 'N/A',
        ]);
        Cliente::create([
            'cedula' => '4',
            'nombre' => 'CAMILO',
            'apellido' => 'MONDRAGON XTZ',
            'telefono' => '3208139540',
            'direccion' => 'N/A',
        ]);
    }
}
