<?php

namespace Database\Seeders;

use App\Models\Configuracione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuracione::create([
            'icono' => '/img/config/favicon.ico',
            'img_auth' => '/img/config/proyecto.png',
            'logo_auth' => '/img/config/auth-logo.png',
        ]);
    }
}
