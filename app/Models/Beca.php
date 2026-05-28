<?php

namespace App\Models;

use carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

#[Table('becas')]
#[Fillable(['titulo', 'descripcion', 'fecha_inscripcion', 'fecha_limite', 'categoria_id', 'link_resolucion', 'correo_contacto'])]
class Beca extends Model
{
    protected $table = 'becas';

    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_inscripcion',
        'fecha_limite',
        'categoria_id',
        'link_resolucion',
        'correo_contacto'
    ];

    protected $casts = [
        'fecha_inscripcion' => 'date',
        'fecha_limite' => 'date',
    ];
}
