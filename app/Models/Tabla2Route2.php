<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla2Route2 extends Model
{
    use HasFactory;

    protected $table = 'tabla2_route2';

    protected $fillable = [
        'persona_id',
        'cursos',
        'certificaciones',
    ];

    public function persona()
    {
        return $this->belongsTo(Tabla1Route1::class, 'persona_id');
    }
}
