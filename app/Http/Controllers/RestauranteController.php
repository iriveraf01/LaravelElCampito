<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    public function index()
    {
        $restauranteCampito = Restaurante::first();

        $cartas = Carta::all();

        // Agrupar por categoría y luego por estilo de preparación
        $cartasAgrupadas = $cartas->groupBy('categoria')->map(function ($items) {
            return $items->groupBy('estilo_preparacion');
        });

        return view('restaurante.index', compact('restauranteCampito', 'cartasAgrupadas'));
    }


}
