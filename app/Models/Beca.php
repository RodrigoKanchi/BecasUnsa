<?php

namespace App\Models;

use carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Beca extends Model
{
    protected $casts = [
        'fecha_inscripcion' => 'date',
        'fecha_limite' => 'date',
    ];
}
