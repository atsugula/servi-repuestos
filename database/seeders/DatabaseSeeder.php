<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriaSeeder::class,
            ClienteSeeder::class,
            ConfigSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
            UserSeeder::class,
            TipoGastoSeeder::class,
            UserSeeder::class,
            DataSystemSeeder::class,
        ]);
    }
}
