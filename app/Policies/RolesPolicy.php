<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolesPolicy
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
        return $user->can('verRoles');
    }

    public function create(User $user)
    {
        return $user->can('crearRoles');
    }

    public function update(User $user)
    {
        return $user->can('editarRoles');
    }

    public function delete(User $user)
    {
        return $user->can('eliminarRoles');
    }
}
