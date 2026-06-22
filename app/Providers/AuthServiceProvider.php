<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Facultad;
use App\Policies\FacultadesPolicy;
use App\Models\Beca;
use App\Policies\BecasPolicy;
use App\Models\Carrera;
use App\Policies\CarrerasPolicy;
use App\Models\User;
use App\Policies\UserPolicy;
use Spatie\Permission\Models\Permission;
use App\Policies\PermisosPolicy;
use Spatie\Permission\Models\Role;
use App\Policies\RolesPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $policies = [
        Facultad::class => FacultadesPolicy::class,
        Beca::class => BecasPolicy::class,
        Carrera::class => CarrerasPolicy::class,
        User::class => UserPolicy::class,
        Permission::class => PermisosPolicy::class,
        Role::class => RolesPolicy::class,
    ];


    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
