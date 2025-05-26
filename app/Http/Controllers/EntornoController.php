<?php

namespace App\Http\Controllers;

use App\Models\Entorno;
use Illuminate\Http\Request;

class EntornoController extends Controller
{
    public function index() {
        $entorno = Entorno::all();

        return view('entorno.index', compact('entorno'));
    }
}
