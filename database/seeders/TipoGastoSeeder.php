<?php

namespace Database\Seeders;

use App\Models\TipoGasto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoGastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Se crean los tipos de gasto que vienen por defecto
        TipoGasto::create([
            'nombre' => 'RECIBO LUZ',
        ]);
    }
}
