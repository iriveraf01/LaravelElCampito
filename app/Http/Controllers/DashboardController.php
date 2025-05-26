<?php

namespace App\Http\Controllers;

use App\Models\Apartamento;
use App\Models\Entorno;
use App\Models\Restaurante;
use App\Models\Instalaciones;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $restaurante = Restaurante::first();
        $apartamento = Apartamento::first();
        $instalacion2 = Instalaciones::skip(1)->first(); // segundo registro
        $instalacion3 = Instalaciones::skip(2)->first(); // tercer registro
        $entorno = Entorno::first();

        return view('dashboard.index', compact('restaurante', 'apartamento','instalacion2', 'instalacion3', 'entorno'));
    }

}

