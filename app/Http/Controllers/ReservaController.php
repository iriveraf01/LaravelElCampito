<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Apartamento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function index() {
        $reservas = Reserva::where('usuario_id', Auth::id())
            ->latest()
            ->get();
        return view('reservas.index', compact('reservas'));
    }

    public function cancelar($id)
    {
        $reserva = Reserva::where('id', $id)
            ->where('usuario_id', Auth::id())
            ->firstOrFail();

        if ($reserva->fecha_fin && now()->gte($reserva->fecha_fin)) {
            return back()->withErrors(['cancelar' => 'No se puede cancelar una reserva ya finalizada.']);
        }

        $reserva->delete(); // O puedes cambiar el estado si prefieres conservarla: $reserva->update(['estado' => 'cancelada']);

        return redirect()->route('reservas.index')->with('success', 'Reserva cancelada correctamente.');
    }

    public function borrar($id)
    {
        $reserva = Reserva::where('id', $id)
            ->where('usuario_id', Auth::id())
            ->firstOrFail();

        if ($reserva->fecha_fin && now()->lt($reserva->fecha_fin)) {
            return back()->withErrors(['borrar' => 'Solo puedes borrar reservas finalizadas.']);
        }

        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Reserva borrada exitosamente.');
    }


    public function store(Request $request)
    {
        $request->validate([
            'apartamento_id' => 'required|exists:apartamentos,id',
            'fecha_inicio' => 'required|date|after_or_equal:today',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'personas' => 'required|integer|min:1',
        ]);

        $apartamento = Apartamento::findOrFail($request->apartamento_id);

        if ($request->personas > $apartamento->capacidad) {
            return back()->withErrors(['personas' => 'No se pueden reservar más personas de las permitidas.']);
        }

        // Calcular el total
        $inicio = Carbon::parse($request->fecha_inicio);
        $fin = Carbon::parse($request->fecha_fin);
        $noches = $inicio->diffInDays($fin);

        if ($noches <= 0) {
            return back()->withErrors(['fecha_fin' => 'La fecha de fin debe ser posterior a la de inicio.']);
        }

        $total = $noches * $apartamento->precio;

        Reserva::create([
            'usuario_id' => auth()->id(),
            'apartamento_id' => $apartamento->id,
            'fecha_inicio' => $inicio,
            'fecha_fin' => $fin,
            'estado' => 'Pendiente',
            'total' => $total,
            'disponibilidad' => false,
            'personas' => $request->personas
        ]);

        return redirect()->route('dashboard')->with('success', 'Reserva realizada con éxito.');
    }
}
