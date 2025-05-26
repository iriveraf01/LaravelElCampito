<?php

namespace App\Http\Controllers;

use App\Models\Instalaciones;
use App\Models\Servicio;
use Illuminate\Http\Request;

class InstalacionesController extends Controller
{
    public function index() {
        $instalaciones = Instalaciones::all();
        $servicios = Servicio::all()->groupBy('categoria');

        return view('instalaciones.index', compact('instalaciones', 'servicios'));
    }
}
