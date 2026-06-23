<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Categoria;

class CategoriasPolicy
{
    use HandlesAuthorization;
    public function __construct()
    {
        //
    }
    public function view(User $user)
    {
        return $user->can('verCategorias');
    }

    public function create(User $user)
    {
        return $user->can('crearCategorias');
    }

    public function update(User $user)
    {
        return $user->can('editarCategorias');
    }

    public function delete(User $user)
    {
        return $user->can('eliminarCategorias');
    }
}
