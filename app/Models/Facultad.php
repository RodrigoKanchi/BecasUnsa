<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Table('facultades')]
#[Fillable(['nombre', 'activo'])]
class Facultad extends Model
{
    protected $table = 'facultades';

    protected $fillable = [
        'nombre',
        'activo'
    ];
}
