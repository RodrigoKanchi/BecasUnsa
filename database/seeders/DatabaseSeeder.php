<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamamos al seeder de roles para crear los roles y usuarios iniciales
        $this->call(RoleSeeder::class);

        $this->call(CategoriaSeeder::class);

        $this->call(BecaSeeder::class);
    }
}
