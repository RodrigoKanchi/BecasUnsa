<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facultades = [
            ['nombre' => 'Facultad de Ciencias Exactas','created_at' => now(),'updated_at' => now()],
            ['nombre' => 'Facultad de Ingeniería','created_at' => now(),'updated_at' => now()],
            ['nombre' => 'Facultad de Ciencias Económicas, Jurídicas y Sociales','created_at' => now(),'updated_at' => now()],
            ['nombre' => 'Facultad de Ciencias de la Salud','created_at' => now(),'updated_at' => now()],
            ['nombre' => 'Facultad de Ciencias Naturales','created_at' => now(),'updated_at' => now()],
            ['nombre' => 'Facultad de Humanidades','created_at' => now(),'updated_at' => now()],
        ];

        // Insertamos el array en la base de datos
        DB::table('facultades')->insert($facultades);
    }
}
