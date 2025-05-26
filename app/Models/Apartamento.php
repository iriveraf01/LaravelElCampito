<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    use HasFactory;

    protected $table = 'apartamentos';

    protected $fillable = [
        'descripcion',
        'precio',
        'capacidad',
        'imagenes',
    ];

    protected $casts = [
        'imagenes' => 'array',
    ];

    // 🔗 Relación con reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // 🔗 Relación muchos a muchos con servicios
    public function servicios(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Servicio::class, 'apartamento_servicio');
    }
}
