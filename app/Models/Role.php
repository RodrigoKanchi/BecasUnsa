<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Atributos asignables.
     * Según ESQUEMA.PNG: id, nombre, created_at, updated_at.
     */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Relación inversa: Un rol tiene muchos usuarios.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
