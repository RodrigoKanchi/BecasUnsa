<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Table('beca_carrera')]
#[Fillable(['beca_id', 'carrera_id'])]
class BecaCarrera extends Model
{
    protected $table = 'beca_carrera';

    protected $fillable = [
        'beca_id',
        'carrera_id'
    ];
}
