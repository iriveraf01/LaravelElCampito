<?php
namespace App\Http\Controllers;

use App\Mail\NuevaReservaAdminMail;
use App\Mail\ReservaConfirmadaMail;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Apartamento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservaController extends Controller
{
    public function index() {
        $reservas = Reserva::where('usuario_id', Auth::id())
            ->latest()
            ->get();
        return view('reservas.index', compact('reservas'));
    }

    // Función para eliminar futuras reservas
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

    // Función para eliminar reservas finalizadas y hacer algo de limpieza
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
        // 1. VALIDACIÓN DE DATOS DEL FORMULARIO
        $request->validate([
            'apartamento_id' => 'required|exists:apartamentos,id',
            'fecha_inicio' => 'required|date|after_or_equal:today',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'personas' => 'required|integer|min:1',
        ]);

        // 2. OBTENER EL APARTAMENTO
        $apartamento = Apartamento::findOrFail($request->apartamento_id); // Busca o falla

        // 3. VALIDAR CAPACIDAD
        if ($request->personas > $apartamento->capacidad) {
            return back()->withErrors(['personas' => 'No se pueden reservar más personas de las permitidas.']);
        }

        // 4. CÁLCULO DE ESTADÍA (USANDO CARBON)
        // Carbon es una librería muy popular en PHP/Laravel para el manejo de fechas y horas
        // en este caso convierte un string a un objeto Carbon que puede ser manipulado
        $inicio = Carbon::parse($request->fecha_inicio);
        $fin = Carbon::parse($request->fecha_fin);
        $noches = $inicio->diffInDays($fin);

        // Alternativa sin Carbon
        // $inicio = new DateTime($request->fecha_inicio);
        //$fin = new DateTime($request->fecha_fin);
        //$noches = $inicio->diff($fin)->days;

        // Validación por seguridad
        if ($noches <= 0) {
            return back()->withErrors(['fecha_fin' => 'La fecha de fin debe ser posterior a la de inicio.']);
        }

        // Cálculo del total a pagar
        $total = $noches * $apartamento->precio;

        //5. CREAR LA RESERVA
        $reserva = Reserva::create([
            'usuario_id' => auth()->id(),
            'apartamento_id' => $apartamento->id,
            'fecha_inicio' => $inicio,
            'fecha_fin' => $fin,
            'estado' => 'Pendiente',
            'total' => $total,
            'disponibilidad' => false,
            'personas' => $request->personas
        ]);

        try {
            Mail::to('iriveraf01@suarezdefigueroa.es')->send(new NuevaReservaAdminMail($reserva));
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Error enviando email: ' . $e->getMessage()]);
        }

        // Prueba si llega aquí
        return redirect()->route('dashboard')->with('success', 'Reserva realizada con éxito.');
    }
}
