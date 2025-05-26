<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           UsersSeeder::class,
            InstalacionesSeeder::class,
            RestauranteSeeder::class,
            CartaSeeder::class,
            EntornoSeeder::class,
            ApartamentosSeeder::class,
            ServiciosSeeder::class,
        ]);
    }
}
