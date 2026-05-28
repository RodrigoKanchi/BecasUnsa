<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['name', 'email', 'password', 'role_id', 'fcm_token'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, hasRoles;

    /**
     * Los atributos que se pueden asignar masivamente.
     * Basado en tu ESQUEMA.PNG.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',   // Campo de tu esquema
        'fcm_token', // Campo para notificaciones en tu esquema
        'activo'
    ];

    /**
     * Los atributos que deben ocultarse en las respuestas JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
        'fcm_token', // Oculta el token de notificaciones
    ];

    /**
     * Relación con la tabla Roles (ESQUEMA.PNG).
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
