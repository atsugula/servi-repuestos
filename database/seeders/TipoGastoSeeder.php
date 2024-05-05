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
        // Se crean los tipos de gasto que vienen por defecto
        TipoGasto::create([
            'nombre' => 'RECIBO LUZ',
        ]);

        // Se pueden agregar más tipos de gastos aquí
        TipoGasto::create([
            'nombre' => 'ARRIENDO',
        ]);

        TipoGasto::create([
            'nombre' => 'SALARIOS',
        ]);

        TipoGasto::create([
            'nombre' => 'SERVICIOS PÚBLICOS',
        ]);

        TipoGasto::create([
            'nombre' => 'SEGUROS',
        ]);

        TipoGasto::create([
            'nombre' => 'IMPUESTOS',
        ]);

        TipoGasto::create([
            'nombre' => 'MATERIAS PRIMAS',
        ]);

        TipoGasto::create([
            'nombre' => 'LOGÍSTICA Y TRANSPORTE',
        ]);

        TipoGasto::create([
            'nombre' => 'MARKETING Y PUBLICIDAD',
        ]);

        TipoGasto::create([
            'nombre' => 'GASTOS DE ADMINISTRACIÓN',
        ]);

        TipoGasto::create([
            'nombre' => 'GASTOS FINANCIEROS',
        ]);

        TipoGasto::create([
            'nombre' => 'RECURSOS HUMANOS',
        ]);
    }
}