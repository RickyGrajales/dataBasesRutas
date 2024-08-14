<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla1Route2 extends Model
{
    use HasFactory;

    protected $table = 'tabla1_route2';

    protected $fillable = [
        'persona_id',
        'Institucion',
        'Carrera',
        'Programa',
        'Semestre',
    ];

    public function persona()
    {
        return $this->belongsTo(Tabla1Route1::class, 'persona_id');
    }
}
