<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {   
        // 
    }

      public function view(User $user)
        {
            return $user->can('verUsuarios');
        }

        public function create(User $user)
        {
            return $user->can('crearUsuarios');
        }

        public function update(User $user)
        {
            return $user->can('editarUsuarios');
        }

        public function delete(User $user)
        {
            return $user->can('eliminarUsuarios');
        }
}
