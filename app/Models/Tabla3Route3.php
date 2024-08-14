<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla3Route3 extends Model
{
    use HasFactory;

    protected $table = 'tabla3_route3';

    protected $fillable = [
        'persona_id',
        'ciberseguridad',
        'nivel',
        'certificaciones_ciberseguridad',
    ];

    public function persona()
    {
        return $this->belongsTo(Tabla1Route1::class, 'persona_id');
    }
}
