<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Usuario',
            'apellido' => 'Prueba',
            'cedula' => '567202210',
            'password' => Hash::make('567202210'),
            'tipo_usuario' => 0,
        ]);
        User::create([
            'name' => 'ISABEL CRISTINA',
            'apellido' => 'VICTORIA TRIVINO',
            'cedula' => '1113782441',
            'password' => Hash::make('1113782441'),
            'tipo_usuario' => 0,
        ]);
        User::create([
            'name' => 'EDWARD',
            'apellido' => 'GALVIS ORTIZ',
            'cedula' => '16554385',
            'password' => Hash::make('16554385'),
            'tipo_usuario' => 0,
        ]);
        User::create([
            'name' => 'JHOANNA',
            'apellido' => 'AMEZQUITA',
            'cedula' => '1113793332',
            'password' => Hash::make('1113793332'),
            'tipo_usuario' => 1,
        ]);
    }
}
