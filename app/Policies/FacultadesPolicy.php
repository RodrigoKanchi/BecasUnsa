<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FacultadesPolicy
{
    /**
     * Create a new policy instance.
     */
    use HandlesAuthorization;
    public function __construct()
    {
        //
    }
    public function view(User $user)
    {
        return $user->can('verFacultades');
    }

    public function create(User $user)
    {
        return $user->can('crearFacultades');
    }

    public function update(User $user)
    {
        return $user->can('editarFacultades');
    }

    public function delete(User $user)
    {
        return $user->can('eliminarFacultades');
    }
}
