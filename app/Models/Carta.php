<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;

    protected $table = 'carta';

    protected $fillable = [
        'nombre_plato',
        'descripcion',
        'precio_racion',
        'precio_media_racion',
        'categoria',
        'imagen',
        'restaurante_id',
        'estilo_preparacion',
        'alergenos'
    ];


    protected $casts = [
        'alergenos' => 'array',
    ];

}
