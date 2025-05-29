<?php

namespace Database\Seeders;

use App\Models\Carta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * IBÉRICOS
         */
        Carta::create([
            'nombre_plato'         => 'Surtido Ibérico',
            'descripcion'          => 'Es la combinación de lomo, chorizo, salchichón y paleta ibérica',
            'precio_racion'        => 18.00,
            'precio_media_racion'  => 9.50,
            'categoria'            => 'Ibéricos',
            'imagen'               => 'images/platos/surtido-ibericos.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Jamón ibérico',
            'descripcion'          => '',
            'precio_racion'        => 16.00,
            'precio_media_racion'  => 9.00,
            'categoria'            => 'Ibéricos',
            'imagen'               => 'images/platos/jamon-iberico.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Lomo ibérico',
            'descripcion'          => '',
            'precio_racion'        => 16.00,
            'precio_media_racion'  => 9.00,
            'categoria'            => 'Ibéricos',
            'imagen'               => 'images/platos/lomo-iberico.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Queso Manchego',
            'descripcion'          => 'Queso de pasta prensada, de corteza dura y de pasta firme y compacta, con color variable desde blanco hasta marfil-amarillento, olor intenso y persistente, sabor ligeramente ácido, fuerte y sabroso, elasticidad baja con sensación mantecosa y algo harinosa.',
            'precio_racion'        => 11.00,
            'precio_media_racion'  => 6.50,
            'categoria'            => 'Ibéricos',
            'imagen'               => 'images/platos/queso-manchego.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Torta de la Serena',
            'descripcion'          => 'La Torta de Queso de La serena es un queso de Oveja curado. Se elabora con leche de oveja merina, es una leche con un alto nivel proteico y graso.',
            'precio_racion'        => 11.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Ibéricos',
            'imagen'               => 'images/platos/torta-serena.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos']),
        ]);
        /**
         * PRIMEROS
         */
        Carta::create([
            'nombre_plato'         => 'Gazpacho',
            'descripcion'          => '',
            'precio_racion'        => 3.50,
            'precio_media_racion'  => 0,
            'categoria'            => 'Primeros',
            'imagen'               => 'images/platos/gazpacho.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['sulfitos']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Consomé',
            'descripcion'          => '',
            'precio_racion'        => 3.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Primeros',
            'imagen'               => 'images/platos/consome.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Sopa de picadillo',
            'descripcion'          => '',
            'precio_racion'        => 4.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Primeros',
            'imagen'               => 'images/platos/sopa-picadillo.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['huevo']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Salmorejo',
            'descripcion'          => '',
            'precio_racion'        => 4.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Primeros',
            'imagen'               => 'images/platos/salmorejo.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['huevo', 'gluten', 'sulfitos']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Pisto',
            'descripcion'          => '',
            'precio_racion'        => 7.00,
            'precio_media_racion'  => 4.00,
            'categoria'            => 'Primeros',
            'imagen'               => 'images/platos/pisto.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);
        /**
         * VARIADOS
         */
        Carta::create([
            'nombre_plato'         => 'Ensalada de Rulo de Cabra',
            'descripcion'          => '',
            'precio_racion'        => 10.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/ensalada-rulo-cabra.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos', 'cacahuetes', 'gluten', 'sulfitos']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Ensalada mixta',
            'descripcion'          => '',
            'precio_racion'        => 8.50,
            'precio_media_racion'  => 5.00,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/ensalada-mixta.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['pescado', 'huevo']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Ensalada de tomate queso y atún',
            'descripcion'          => '',
            'precio_racion'        => 8.50,
            'precio_media_racion'  => 5.00,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/ensalada-tomate-queso-atun.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos', 'pescado', 'sulfitos']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Croquetas caseras de Jamón',
            'descripcion'          => '',
            'precio_racion'        => 9.00,
            'precio_media_racion'  => 5.00,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/croquetas-caseras-jamon.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['huevo', 'lacteos', 'gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Tortilla de patatas',
            'descripcion'          => '',
            'precio_racion'        => 7.00,
            'precio_media_racion'  => 4.50,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/tortilla-patatas.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['huevo']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Huevos fritos y patatas',
            'descripcion'          => '',
            'precio_racion'        => 4.50,
            'precio_media_racion'  => 0,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/huevos-patatas.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['huevo', 'gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Huevos rotos',
            'descripcion'          => '',
            'precio_racion'        => 9.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/huevos-roto.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['huevo']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Alcachofas con jamón - sin jamón',
            'descripcion'          => '',
            'precio_racion'        => 7.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/alcachofas-jamon.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Gambas al ajillo',
            'descripcion'          => '',
            'precio_racion'        => 9.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/gambas-ajillo.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['crustaceos', 'sulfitos']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Pimientos del piquillo con bacalao y gambas',
            'descripcion'          => '',
            'precio_racion'        => 8.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/pimientos-bacalao-gambas.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['crustaceos', 'pescado']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Pimientos del piquillo con merluza y gambas',
            'descripcion'          => '',
            'precio_racion'        => 8.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/pimientos-merluza-gambas.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['crustaceos', 'pescado']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Bacalao dorado',
            'descripcion'          => '',
            'precio_racion'        => 9.50,
            'precio_media_racion'  => 6.00,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/bacalao-dorado.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['crustaceos', 'pescado', 'huevo']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Revuelto de la casa',
            'descripcion'          => '',
            'precio_racion'        => 9.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/revuelto-casa.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['crustaceos', 'huevo']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Revuelto de gambas',
            'descripcion'          => '',
            'precio_racion'        => 9.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/revuelto-gambas.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['crustaceos', 'huevo']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Revuelto de champiñones',
            'descripcion'          => '',
            'precio_racion'        => 9.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/revuelto-champinones.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['huevo']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Revuelto de espárragos trigueros con o sin jamón',
            'descripcion'          => '',
            'precio_racion'        => 9.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Variados',
            'imagen'               => 'images/platos/revuelto-esparragos-jamon.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['huevo']),
        ]);
        /**
         * PESCADOS
         */
        Carta::create([
            'nombre_plato'         => 'Calamares',
            'descripcion'          => '',
            'precio_racion'        => 10.00,
            'precio_media_racion'  => 6.50,
            'categoria'            => 'Pescados',
            'imagen'               => 'images/platos/calamares-fritos.jpg',
            'estilo_preparacion'   => 'Fritos',
            'alergenos'            => json_encode(['gluten', 'pescado']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Chocos',
            'descripcion'          => '',
            'precio_racion'        => 10.00,
            'precio_media_racion'  => 6.50,
            'categoria'            => 'Pescados',
            'imagen'               => 'images/platos/chocos-fritos.jpg',
            'estilo_preparacion'   => 'Fritos',
            'alergenos'            => json_encode(['gluten', 'pescado']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Pijotas',
            'descripcion'          => '',
            'precio_racion'        => 10.00,
            'precio_media_racion'  => 5.50,
            'categoria'            => 'Pescados',
            'imagen'               => 'images/platos/pijotas-fritas.jpg',
            'estilo_preparacion'   => 'Fritos',
            'alergenos'            => json_encode(['gluten', 'pescado']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Boquerones',
            'descripcion'          => '',
            'precio_racion'        => 9.00,
            'precio_media_racion'  => 6.50,
            'categoria'            => 'Pescados',
            'imagen'               => 'images/platos/boquerones-fritos.jpg',
            'estilo_preparacion'   => 'Fritos',
            'alergenos'            => json_encode(['gluten', 'pescado']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Puntillitas',
            'descripcion'          => '',
            'precio_racion'        => 10.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Pescados',
            'imagen'               => 'images/platos/putillitas-fritos.jpg',
            'estilo_preparacion'   => 'Fritos',
            'alergenos'            => json_encode(['gluten', 'pescado']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Chocos',
            'descripcion'          => '',
            'precio_racion'        => 12.50,
            'precio_media_racion'  => 0,
            'categoria'            => 'Pescados',
            'imagen'               => 'images/platos/chocos-plancha.jpg',
            'estilo_preparacion'   => 'A la plancha',
            'alergenos'            => json_encode(['pescado']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Salmón',
            'descripcion'          => '',
            'precio_racion'        => 12.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Pescados',
            'imagen'               => 'images/platos/salmon-plancha.jpg',
            'estilo_preparacion'   => 'A la plancha',
            'alergenos'            => json_encode(['pescado']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Atún',
            'descripcion'          => '',
            'precio_racion'        => 12.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Pescados',
            'imagen'               => 'images/platos/atun-plancha.jpg',
            'estilo_preparacion'   => 'A la plancha',
            'alergenos'            => json_encode(['pescado']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Pez espada',
            'descripcion'          => '',
            'precio_racion'        => 11.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Pescados',
            'imagen'               => 'images/platos/pez-espada-plancha.jpg',
            'estilo_preparacion'   => 'A la plancha',
            'alergenos'            => json_encode(['pescado']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Dorada',
            'descripcion'          => '',
            'precio_racion'        => 13.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Pescados',
            'imagen'               => 'images/platos/dorada-plancha.jpg',
            'estilo_preparacion'   => 'A la plancha',
            'alergenos'            => json_encode(['pescado']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Lubina',
            'descripcion'          => '',
            'precio_racion'        => 13.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Pescados',
            'imagen'               => 'images/platos/lubina-plancha.jpg',
            'estilo_preparacion'   => 'A la plancha',
            'alergenos'            => json_encode(['pescado']),
        ]);
        /**
         * CARNES
         */
        Carta::create([
            'nombre_plato'         => 'Solomillo de cerdo ibérico',
            'descripcion'          => '',
            'precio_racion'        => 15.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Carnes',
            'imagen'               => 'images/platos/solomillo-cerdo-brasa.jpg',
            'estilo_preparacion'   => 'A la brasa',
            'alergenos'            => json_encode(['gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Magro de cerdo ibérico',
            'descripcion'          => '',
            'precio_racion'        => 10.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Carnes',
            'imagen'               => 'images/platos/magro-cerdo-brasa.jpg',
            'estilo_preparacion'   => 'A la brasa',
            'alergenos'            => json_encode(['gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Presa de entraña ibérica',
            'descripcion'          => '',
            'precio_racion'        => 16.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Carnes',
            'imagen'               => 'images/platos/presa-entrana-brasa.jpg',
            'estilo_preparacion'   => 'A la brasa',
            'alergenos'            => json_encode(['gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Solomillo de ternera',
            'descripcion'          => '',
            'precio_racion'        => 18.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Carnes',
            'imagen'               => 'images/platos/solomillo-ternera-brasa.jpg',
            'estilo_preparacion'   => 'A la brasa',
            'alergenos'            => json_encode(['gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Chuletón de ternera',
            'descripcion'          => '',
            'precio_racion'        => 17.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Carnes',
            'imagen'               => 'images/platos/chuleton-ternera-brasa.jpg',
            'estilo_preparacion'   => 'A la brasa',
            'alergenos'            => json_encode(['gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Entrecot de ternera',
            'descripcion'          => '',
            'precio_racion'        => 17.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Carnes',
            'imagen'               => 'images/platos/entrecot-ternera-brasa.jpg',
            'estilo_preparacion'   => 'A la brasa',
            'alergenos'            => json_encode(['gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Chuletas de cordero',
            'descripcion'          => '',
            'precio_racion'        => 14.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Carnes',
            'imagen'               => 'images/platos/chuletas-cordero-brasa.jpg',
            'estilo_preparacion'   => 'A la brasa',
            'alergenos'            => json_encode(['gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Lomo de cerdo ibérico',
            'descripcion'          => '',
            'precio_racion'        => 9.50,
            'precio_media_racion'  => 6.00,
            'categoria'            => 'Carnes',
            'imagen'               => 'images/platos/lomo-cerdo-plancha.jpg',
            'estilo_preparacion'   => 'A la plancha',
            'alergenos'            => json_encode(['gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Filete de ternera',
            'descripcion'          => '',
            'precio_racion'        => 9.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Carnes',
            'imagen'               => 'images/platos/filete-ternera-plancha.jpg',
            'estilo_preparacion'   => 'A la plancha',
            'alergenos'            => json_encode(['gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Montado de lomo',
            'descripcion'          => '',
            'precio_racion'        => 4.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Carnes',
            'imagen'               => 'images/platos/montado-lomo-plancha.jpg',
            'estilo_preparacion'   => 'A la plancha',
            'alergenos'            => json_encode(['gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Guarrito frito',
            'descripcion'          => '',
            'precio_racion'        => 11.00,
            'precio_media_racion'  => 6.50,
            'categoria'            => 'Carnes',
            'imagen'               => 'images/platos/guarrito.jpg',
            'estilo_preparacion'   => 'Otros',
            'alergenos'            => json_encode(['gluten']),
        ]);

        /**
         * PLATOS EXTRA
         */
        Carta::create([
            'nombre_plato'         => 'Plato extra 1',
            'descripcion'          => '',
            'precio_racion'        => 8.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Platos extra',
            'imagen'               => '',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Plato extra 2',
            'descripcion'          => '',
            'precio_racion'        => 12.50,
            'precio_media_racion'  => 0,
            'categoria'            => 'Platos extra',
            'imagen'               => '',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Paella (Por encargo)',
            'descripcion'          => '',
            'precio_racion'        => 6.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Platos extra',
            'imagen'               => '',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Menú de la casa',
            'descripcion'          => 'Incluye: 1 primer plato, 1 segundo plato, 1 bebida, pan y postre',
            'precio_racion'        => 12.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Platos extra',
            'imagen'               => '',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);

        /**
         * POSTRES CASEROS
         */
        Carta::create([
            'nombre_plato'         => 'Tarta de Queso',
            'descripcion'          => '',
            'precio_racion'        => 4.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Postres caseros',
            'imagen'               => 'images/platos/tarta-queso.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos', 'gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Tiramisú',
            'descripcion'          => '',
            'precio_racion'        => 4.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Postres caseros',
            'imagen'               => 'images/platos/tiramisu.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos', 'gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Crema de limón',
            'descripcion'          => '',
            'precio_racion'        => 4.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Postres caseros',
            'imagen'               => 'images/platos/crema-limon.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Crema de chocolate',
            'descripcion'          => '',
            'precio_racion'        => 4.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Postres caseros',
            'imagen'               => 'images/platos/crema-chocolate.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Crema de la abuela',
            'descripcion'          => '',
            'precio_racion'        => 4.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Postres caseros',
            'imagen'               => 'images/platos/crema-abuela.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos', 'gluten']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Natillas',
            'descripcion'          => '',
            'precio_racion'        => 4.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Postres caseros',
            'imagen'               => 'images/platos/natillas.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos', 'gluten', 'huevo']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Arroz con leche',
            'descripcion'          => '',
            'precio_racion'        => 4.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Postres caseros',
            'imagen'               => 'images/platos/arroz-leche.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos']),
        ]);

        /**
         * OTROS POSTRES
         */
        Carta::create([
            'nombre_plato'         => 'Fruta del tiempo',
            'descripcion'          => '',
            'precio_racion'        => 2.50,
            'precio_media_racion'  => 0,
            'categoria'            => 'Otros postres',
            'imagen'               => 'images/platos/fruta-tiempo.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Flan con nata',
            'descripcion'          => '',
            'precio_racion'        => 3.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Otros postres',
            'imagen'               => 'images/platos/flan-nata.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['lacteos', 'huevo']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Macedonia (Almíbar)',
            'descripcion'          => '',
            'precio_racion'        => 3.50,
            'precio_media_racion'  => 0,
            'categoria'            => 'Otros postres',
            'imagen'               => 'images/platos/macedonia.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Ver carta de helados',
            'descripcion'          => '',
            'precio_racion'        => 0,
            'precio_media_racion'  => 0,
            'categoria'            => 'Otros postres',
            'imagen'               => 'images/platos/helados.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);

        /**
         * CAFÉS
         */
        Carta::create([
            'nombre_plato'         => 'Café irlandés',
            'descripcion'          => '',
            'precio_racion'        => 5.50,
            'precio_media_racion'  => 0,
            'categoria'            => 'Cafés',
            'imagen'               => 'images/platos/cafe-irlandes.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);

        Carta::create([
            'nombre_plato'         => 'Café vienés',
            'descripcion'          => '',
            'precio_racion'        => 4.00,
            'precio_media_racion'  => 0,
            'categoria'            => 'Cafés',
            'imagen'               => 'images/platos/cafe-vienes.jpg',
            'estilo_preparacion'   => '',
            'alergenos'            => json_encode(['']),
        ]);
    }
}
