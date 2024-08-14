<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla2Route3 extends Model
{
    use HasFactory;

    protected $table = 'tabla2_route3';

    protected $fillable = [
        'persona_id',
        'habilidad',
        'nivel',
    ];

    public function persona()
    {
        return $this->belongsTo(Tabla1Route1::class, 'persona_id');
    }
}
