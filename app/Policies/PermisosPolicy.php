<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermisosPolicy
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
        return $user->can('verPermisos');
    }

    public function create(User $user)
    {
        return $user->can('crearPermisos');
    }

    public function update(User $user)
    {
        return $user->can('editarPermisos');
    }

    public function delete(User $user)
    {
        return $user->can('eliminarPermisos');
    }
}
