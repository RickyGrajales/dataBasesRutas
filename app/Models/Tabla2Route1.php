<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla1Route2 extends Model
{
    use HasFactory;
    protected $table = 'tabla2_route1';
    protected $fillable = [
        'persona_id',
        'calle',
        'ciudad',
        'estado',
        'colonia',
        'codigo_postal',
        'pais'
    ];
    public function persona()
    {
        return $this->belongTo(Tabla1Route1::class, 'persona_id');
    }
}
