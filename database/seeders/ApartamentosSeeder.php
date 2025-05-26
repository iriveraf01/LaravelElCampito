<?php

namespace Database\Seeders;

use App\Models\Apartamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Apartamento::create([
            'descripcion' => 'Apartamento 1 habitación doble (2 pax)',
            'precio' => 60,
            'capacidad' => 2,
            'imagenes' => [
                'images/apartamento/1/apartamento1-1.jpg',
                'images/apartamento/1/apartamento1-2.jpg',
                'images/apartamento/1/apartamento1-3.jpg',
                'images/apartamento/1/apartamento1-4.jpg'],
        ]);

        Apartamento::create([
            'descripcion' => 'Apartamento 2 dos habitaciones dobles (4 pax)',
            'precio' => 95,
            'capacidad' => 4,
            'imagenes' => [
                'images/apartamento/2/apartamento2-1.jpg',
                'images/apartamento/2/apartamento2-2.jpg',
                'images/apartamento/2/apartamento2-3.jpg',
                'images/apartamento/2/apartamento2-4.jpg',
                'images/apartamento/2/apartamento2-5.jpg',
                'images/apartamento/2/apartamento2-6.jpg',],
        ]);

        Apartamento::create([
            'descripcion' => 'Apartamento 3 dos habitaciones dobles (4 pax)',
            'precio' => 95,
            'capacidad' => 4,
            'imagenes' => [
                'images/apartamento/3/apartamento3-1.jpg',
                'images/apartamento/3/apartamento3-2.jpg',
                'images/apartamento/3/apartamento3-3.jpg',
                'images/apartamento/3/apartamento3-4.jpg',
                'images/apartamento/3/apartamento3-5.jpg',
                'images/apartamento/3/apartamento3-6.jpg',],
        ]);

        Apartamento::create([
            'descripcion' => 'Apartamento 4 dos habitaciones dobles (4 pax)',
            'precio' => 95,
            'capacidad' => 4,
            'imagenes' => [
                'images/apartamento/4/apartamento4-1.jpg',
                'images/apartamento/4/apartamento4-2.jpg',
                'images/apartamento/4/apartamento4-3.jpg',
                'images/apartamento/4/apartamento4-4.jpg',
                'images/apartamento/4/apartamento4-5.jpg'],
        ]);

        Apartamento::create([
            'descripcion' => 'Apartamento 5 tres habitaciones dobles (6 pax)',
            'precio' => 130,
            'capacidad' => 6,
            'imagenes' => [
                'images/apartamento/5/apartamento5-1.jpg',
                'images/apartamento/5/apartamento5-2.jpg',
                'images/apartamento/5/apartamento5-3.jpg',
                'images/apartamento/5/apartamento5-4.jpg',
                'images/apartamento/5/apartamento5-5.jpg',
                'images/apartamento/5/apartamento5-6.jpg',
                'images/apartamento/5/apartamento5-7.jpg',
                'images/apartamento/5/apartamento5-8.jpg',
                'images/apartamento/5/apartamento5-9.jpg',
                'images/apartamento/5/apartamento5-10.jpg'],
        ]);

        Apartamento::create([
            'descripcion' => 'Apartamento 6 dos habitaciones dobles (4 pax)',
            'precio' => 95,
            'capacidad' => 4,
            'imagenes' => [
                'images/apartamento/6/apartamento6-1.jpg',
                'images/apartamento/6/apartamento6-2.jpg',
                'images/apartamento/6/apartamento6-3.jpg',
                'images/apartamento/6/apartamento6-4.jpg',
                'images/apartamento/6/apartamento6-5.jpg',
                'images/apartamento/6/apartamento6-6.jpg',
                'images/apartamento/6/apartamento6-7.jpg',
                'images/apartamento/6/apartamento6-8.jpg',
                'images/apartamento/6/apartamento6-9.jpg',
                'images/apartamento/6/apartamento6-10.jpg',],
        ]);

        Apartamento::create([
            'descripcion' => 'Apartamento 7 dos habitaciones dobles (4 pax)',
            'precio' => 95,
            'capacidad' => 4,
            'imagenes' => [
                'images/apartamento/7/apartamento7-1.jpg',
                'images/apartamento/7/apartamento7-2.jpg',
                'images/apartamento/7/apartamento7-3.jpg',
                'images/apartamento/7/apartamento7-4.jpg',
                'images/apartamento/7/apartamento7-5.jpg',
                'images/apartamento/7/apartamento7-6.jpg',
                'images/apartamento/7/apartamento7-7.jpg',
                'images/apartamento/7/apartamento7-8.jpg',
                'images/apartamento/7/apartamento7-9.jpg'],
        ]);

    }
}
