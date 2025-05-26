<?php

namespace Database\Seeders;

use App\Models\Entorno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntornoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entorno::create([
            'nombre' => 'Qué ver en Zafra',
            'descripcion' => 'Zafra, conocida como la "Sevilla la Chica", ofrece un casco histórico lleno de encanto. Destacan la Plaza Grande y la Plaza Chica, unidas por el famoso Arquillo del Pan. El Alcázar de los Duques de Feria, hoy Parador Nacional, es uno de los monumentos más emblemáticos. También merece una visita la Iglesia de la Candelaria, el Convento de Santa Clara, y las antiguas murallas con sus puertas históricas como la Puerta de Jerez.',
            'imagenes' => [
                'images/entorno/zafra/zafra-2.jpg',
                'images/entorno/zafra/plaza-grande.jpg',
                'images/entorno/zafra/plaza-chica.jpg',
                'images/entorno/zafra/parador.jpg',
                'images/entorno/zafra/parador-2.jpg',
                'images/entorno/zafra/zafra-1.jpg',
                'images/entorno/zafra/zafra-4.jpg',
                'images/entorno/zafra/candelaria.jpg',
                'images/entorno/zafra/santa-clara.jpg',
            ],
        ]);

        Entorno::create([
            'nombre' => 'Alrededores de Zafra',
            'descripcion' => 'Los alrededores de Zafra ofrecen numerosas opciones para el turismo rural, cultural y natural. Se puede visitar Feria y su castillo en lo alto del cerro, Burguillos del Cerro con su encanto medieval, y Jerez de los Caballeros, antigua villa templaria. También destacan el Monasterio de Tentudía, situado en el punto más alto de Badajoz, y la ruta del Jamón Ibérico en plena dehesa extremeña.',
            'imagenes' => [
                'images/entorno/alrededores/feria.jpg',
                'images/entorno/alrededores/feria-2.jpg',
                'images/entorno/alrededores/burguillos.jpg',
                'images/entorno/alrededores/jerez-caballeros.jpg',
                'images/entorno/alrededores/monasterio-tentudia.jpg'
            ],
        ]);

    }
}
