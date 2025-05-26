<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'apartamento_id',
        'fecha_inicio',
        'fecha_fin',
        'personas',
        'estado',
        'total',
        'disponibilidad',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'disponibilidad' => 'boolean',
    ];

    public function apartamento()
    {
        return $this->belongsTo(Apartamento::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
