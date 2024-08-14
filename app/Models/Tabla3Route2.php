<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla3Route2 extends Model
{
    use HasFactory;

    protected $table = 'tabla3_route2';

    protected $fillable = [
        'persona_id',
        'idiomas',
        'nivel',
    ];

    public function persona()
    {
        return $this->belongsTo(Tabla1Route1::class, 'persona_id');
    }
}
