<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRol = Role::create(['name' => 'Administrador']);
        $operarioRol = Role::create(['name' => 'Operario']);
        $usuarioRol = Role::create(['name' => 'Usuario']);

        $permisos = [
            'verUsuarios', 'editarUsuarios', 'eliminarUsuarios', 'crearUsuarios',
            'verRoles', 'editarRoles', 'eliminarRoles', 'crearRoles',
            'verPermisos', 'editarPermisos', 'eliminarPermisos', 'crearPermisos',
            'verBecas', 'editarBecas', 'eliminarBecas', 'crearBecas',
            'verFacultades', 'editarFacultades', 'eliminarFacultades', 'crearFacultades',
            'verCarreras', 'editarCarreras', 'eliminarCarreras', 'crearCarreras',
            'verCategorias', 'editarCategorias', 'eliminarCategorias', 'crearCategorias',
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }

        $adminRol->givePermissionTo(Permission::all());
        $operarioRol->givePermissionTo([
            'verPermisos', 'verBecas', 'verFacultades', 'verCarreras', 'verCategorias',
            'editarBecas', 'crearBecas', 'eliminarBecas'
        ]);

        $usuarioRol->givePermissionTo([
            'verBecas', 'verFacultades', 'verCarreras', 'verCategorias'
        ]);

        $admin = User::find(1);
        $operario = User::find(2);
        $usuario = User::find(3);

        $admin->assignRole('Administrador');
        $operario->assignRole('Operario');
        $usuario->assignRole('Usuario');

    }
}
