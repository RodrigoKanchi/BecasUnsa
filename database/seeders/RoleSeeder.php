<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['nombre' => 'admin']);
        $editorRole = Role::create(['nombre' => 'editor']);
        $usuarioRole = Role::create(['nombre' => 'usuario']);

        $admin = User::create([
            'name' => 'Administrador Becas',
            'email' => 'adminbecas@gmail.com',
            'password' => Hash::make('12345678'), // Recuerda cambiarla luego
            'role_id' => $adminRole->id,
            'email_verified_at' => now(),
        ]);

        $usereditor = User::create([
            'name' => 'Editor Becas',
            'email' => 'editorbecas@gmail.com',
            'password' => Hash::make('12345678'), // Recuerda cambiarla luego
            'role_id' => $editorRole->id,
            'email_verified_at' => now(),
        ]);

        $userusuario = User::create([
            'name' => 'Usuario Becas',
            'email' => 'usuariobecas@gmail.com',
            'password' => Hash::make('12345678'), // Recuerda cambiarla luego
            'role_id' => $usuarioRole->id,
            'email_verified_at' => now(),
        ]);

    }
}
