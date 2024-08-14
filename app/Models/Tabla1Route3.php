<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla1Route3 extends Model
{
    use HasFactory;

    protected $table = 'tabla1_route3';

    protected $fillable = [
        'persona_id',
        'nombre_proyecto',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function persona()
    {
        return $this->belongsTo(Tabla1Route1::class, 'persona_id');
    }
}
