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
        // Obtiene todas las fechas ocupadas para este apartamento
        $fechasOcupadas = $this->fechasReservadas($apartamento->id);

        return view('apartamentos.show', compact('apartamento', 'fechasOcupadas'));
    }

    public function fechasReservadas($apartamentoId)
    {
        // Consulta las reservas activas para el apartamento
        $reservas = Reserva::where('apartamento_id', $apartamentoId)
            ->whereIn('estado', ['Pendiente', 'Confirmada']) // estados que bloquean la fecha
            ->get();

        // Array para almacenar todas las fechas ocupadas
        $fechasOcupadas = [];

        // Bucle para ver cada reserva
        foreach ($reservas as $reserva) {
            // Esto crea un período desde fecha inicio hasta fecha fin
            $periodo = CarbonPeriod::create($reserva->fecha_inicio, $reserva->fecha_fin);
            // Cada periodo es un rango de fechas ej: 2025-01-01, 2025-01-02, 2025-01-03, 2025-01-04
            foreach ($periodo as $fecha) {
                $fechasOcupadas[] = $fecha->format('Y-m-d');
            }
        }
        // El array unique es para eliminar duplicados por ejemplo en caso de que alguien
        // reserve de 2 a 4 de enero y el siguiente empiece un 4 de enero a un 6
        return array_unique($fechasOcupadas);
    }

}
