<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BecasPolicy
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
        return $user->can('verBecas');
    }

    public function create(User $user)
    {
        return $user->can('crearBecas');
    }

    public function update(User $user)
    {
        return $user->can('editarBecas');
    }

    public function delete(User $user)
    {
        return $user->can('eliminarBecas');
    }
}
