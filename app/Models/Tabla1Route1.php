<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla1Route1 extends Model
{
    use HasFactory;

    protected $table = 'tabla1_route1';

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'direccion',
        'fecha_nacimiento',
    ];

    public function direcciones()
    {
        return $this->hasMany(Tabla2Route1::class, 'persona_id');
    }

    public function trabajos()
    {
        return $this->hasMany(Tabla3Route1::class, 'persona_id');
    }
}
