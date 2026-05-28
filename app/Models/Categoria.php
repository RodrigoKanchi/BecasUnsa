<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


#[Table('categorias')]
#[Fillable(['nombre','activo'])]
class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'activo'
    ];
}
