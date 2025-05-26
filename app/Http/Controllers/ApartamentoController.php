<?php

namespace App\Http\Controllers;

use App\Models\Apartamento;
use App\Models\Reserva;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class ApartamentoController extends Controller
{
    public function index()
    {
        $apartamentos = Apartamento::with('servicios')->get();
        return view('apartamentos.index', compact('apartamentos'));
    }

    public function show(Apartamento $apartamento)
    {
        $fechasOcupadas = $this->fechasReservadas($apartamento->id);

        return view('apartamentos.show', compact('apartamento', 'fechasOcupadas'));
    }

    public function fechasReservadas($apartamentoId)
    {
        $reservas = Reserva::where('apartamento_id', $apartamentoId)
            ->whereIn('estado', ['Pendiente', 'Confirmada']) // estados que bloquean la fecha
            ->get();

        $fechasOcupadas = [];

        foreach ($reservas as $reserva) {
            $periodo = CarbonPeriod::create($reserva->fecha_inicio, $reserva->fecha_fin);
            foreach ($periodo as $fecha) {
                $fechasOcupadas[] = $fecha->format('Y-m-d');
            }
        }

        return array_unique($fechasOcupadas);
    }

}
