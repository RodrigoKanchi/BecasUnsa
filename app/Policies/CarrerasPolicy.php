<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarrerasPolicy
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
        return $user->can('verCarreras');
    }

    public function create(User $user)
    {
        return $user->can('crearCarreras');
    }

    public function update(User $user)
    {
        return $user->can('editarCarreras');
    }

    public function delete(User $user)
    {
        return $user->can('eliminarCarreras');
    }
}
