<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla3Route1 extends Model
{
    use HasFactory;

    protected $table = 'tabla3_route1';

    protected $fillable = [
        'persona_id',
        'empresa',
        'area',
        'cargo',
        'telefono',
        'correo',
    ];

    public function persona()
    {
        return $this->belongsTo(Tabla1Route1::class, 'persona_id');
    }
}