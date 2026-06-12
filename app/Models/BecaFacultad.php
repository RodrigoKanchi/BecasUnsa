<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Table('beca_facultad')]
#[Fillable(['beca_id', 'facultad_id'])]
class BecaFacultad extends Model
{
    protected $table = 'beca_facultad';

    protected $fillable = [
        'beca_id',
        'facultad_id'
    ];
}
