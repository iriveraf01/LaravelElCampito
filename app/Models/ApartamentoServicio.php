<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApartamentoServicio extends Model
{
    use HasFactory;

    protected $table = 'apartamento_servicio';

    protected $fillable = [
        'apartamento_id',
        'servicio_id',
    ];

    public function apartamento(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Apartamento::class);
    }

    public function servicio(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Servicio::class);
    }
}
