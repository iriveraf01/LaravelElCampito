<?php

namespace Database\Seeders;

use App\Models\Restaurante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestauranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurante::create([
            'nombre' => 'Restaurante El Campito',
            'descripcion' => 'Telefono: 924 55 35 56',
            'horario' => 'Horario: De Martes a Domingo desde las 10:00h hasta Cierre Lunes: Descanso',
            'imagenes' => [
                'images/restaurante/restaurante-interior1.jpg',
                'images/restaurante/restaurante-interior2.jpg',
                'images/restaurante/restaurante-interior3.jpg',
                'images/restaurante/restaurante-interior4.jpg',
                'images/restaurante/restaurante-exterior1.jpg',
                'images/restaurante/restaurante-exterior2.jpg',
                'images/restaurante/restaurante-exterior3.jpg',
                'images/restaurante/restaurante-exterior4.jpg',
                'images/restaurante/restaurante-exterior5.jpg',
                'images/restaurante/restaurante-exterior6.jpg',
            ],
        ]);
    }
}
