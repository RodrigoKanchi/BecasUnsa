<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Table('carreras')]
#[Fillable(['nombre', 'facultad_id','activo'])]
class Carrera extends Model
{
    protected $table = 'carreras';

    protected $fillable = [
        'nombre',
        'facultad_id',
        'activo'
    ];
}
