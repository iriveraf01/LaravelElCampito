<?php

namespace Database\Seeders;

use App\Models\Instalaciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstalacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Instalaciones::create([
            'nombre' => 'Algo sobre nosotros',
            'descripcion' => 'El Campito Zafra es un encantador complejo rural ubicado en Zafra, Extremadura, que combina la tranquilidad del campo con la comodidad de alojamientos bien equipados y una experiencia gastronómica destacada. Ofrece casas rurales acogedoras ideales para el descanso en un entorno natural, así como un restaurante que destaca por su cocina tradicional con toques modernos, elaborada con productos locales. Es un lugar perfecto para disfrutar de la naturaleza, la buena comida y la hospitalidad extremeña.',
            'imagenes' => [
                'images/instalaciones/instalaciones-sobre-nosotros1.jpg',
                'images/instalaciones/instalaciones-sobre-nosotros2.jpg',
                'images/instalaciones/instalaciones-sobre-nosotros3.jpg',
            ],
        ]);

        Instalaciones::create([
            'nombre' => 'Alojamiento',
            'descripcion' => 'El complejo cuenta con 7 apartamentos rurales de diferentes capacidades (2, 4 y 6 personas), sumando un total de 30 plazas. Cada apartamento está construido con materiales tradicionales como piedra, ladrillo visto y madera, y dispone de cocina-comedor totalmente equipada, baño privado y acceso a terrazas ajardinadas.',
            'imagenes' => [
                'images/instalaciones/instalaciones-alojamiento1.jpg',
                'images/instalaciones/instalaciones-alojamiento2.jpg',
                'images/instalaciones/instalaciones-alojamiento3.jpg',
            ],
        ]);

        Instalaciones::create([
            'nombre' => 'Instalaciones',
            'descripcion' => 'El Campito Zafra cuenta con una variedad de instalaciones comunes diseñadas para ofrecer comodidad y disfrute a sus huéspedes. Entre ellas se incluyen una piscina al aire libre, zona de barbacoa, amplios jardines con terraza, aparcamiento privado gratuito, parque infantil y acceso a internet Wi-Fi. También se admiten mascotas, lo que lo convierte en un lugar ideal para toda la familia. Además, el complejo ofrece servicios como aire acondicionado, calefacción, televisión y lavandería, asegurando una estancia confortable en cualquier época del año.',
            'imagenes' => [
                'images/instalaciones/instalaciones1.jpg',
                'images/instalaciones/instalaciones2.jpg',
                'images/instalaciones/instalaciones3.jpg',
            ],
        ]);
    }
}
