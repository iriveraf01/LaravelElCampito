<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;
use App\Models\Apartamento;

class ServiciosSeeder extends Seeder
{
    public function run(): void
    {
        // Servicios por categoría
        $serviciosPorCategoria = [
            'interior' => [
                'Aire acondicionado',
                'Calefacción',
                'Cocina',
                'Comedor',
                'Microondas',
                'Televisión',
                'Baño',
                'Chimenea',
            ],
            'exterior' => [
                'Barbacoa',
                'Jardín',
                'Piscina',
                'Terraza',
                'Zona de aparcamiento',
                'Bar',
            ],
            'servicios' => [
                'Acceso internet',
                'Admite mascotas',
                'Cuna disponible',
                'Restaurante (público)',
            ],
            'situación' => [
                'Afueras del casco urbano',
                'Acceso asfaltado',
            ],
        ];

        // Crear todos los servicios
        foreach ($serviciosPorCategoria as $categoria => $servicios) {
            foreach ($servicios as $nombre) {
                Servicio::firstOrCreate([
                    'nombre' => $nombre,
                    'categoria' => $categoria,
                ]);
            }
        }

        // Obtener servicios interiores por nombre
        $serviciosInterior = Servicio::where('categoria', 'interior')->get()->keyBy('nombre');

        // Apartamentos base (1 al 7)
        $apartamentos = Apartamento::all();

        // Servicios interiores base (sin chimenea)
        $interioresBase = collect([
            'Aire acondicionado',
            'Calefacción',
            'Cocina',
            'Comedor',
            'Microondas',
            'Televisión',
            'Baño',
        ]);

        foreach ($apartamentos as $apartamento) {
            // Servicios comunes
            $serviciosAsignados = $interioresBase->toArray();

            // Chimenea solo para 1, 4 y 5
            if (in_array($apartamento->id, [1, 4, 5])) {
                $serviciosAsignados[] = 'Chimenea';
            }

            // Obtener IDs y sincronizar
            $servicioIds = collect($serviciosAsignados)
                ->map(fn($nombre) => $serviciosInterior[$nombre]?->id)
                ->filter()
                ->toArray();

            $apartamento->servicios()->syncWithoutDetaching($servicioIds);
        }
    }
}
