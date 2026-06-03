<?php

namespace App\Models;

use carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carrera;

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


    public function carreras(){
        return $this->belongsToMany(Carrera::class,'beca_carrera','beca_id','carrera_id');
    }

    public function facultades(){
        return $this->belongsToMany(Facultad::class,'beca_facultad','beca_id','facultad_id');
    }
}
