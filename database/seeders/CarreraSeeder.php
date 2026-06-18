<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buscamos las facultades existentes para obtener sus IDs reales
        /* $ingenieria = DB::table('facultades')->where('nombre', 'Facultad de Ingeniería')->first();
        $exactas = DB::table('facultades')->where('nombre', 'Facultad de Ciencias Exactas')->first();
        $economicas = DB::table('facultades')->where('nombre', 'Facultad de Ciencias Económicas, Jurídicas y Sociales')->first();
        $salud = DB::table('facultades')->where('nombre', 'Facultad de Ciencias de la Salud')->first();
        $naturales = DB::table('facultades')->where('nombre', 'Facultad de Ciencias Naturales')->first();
        $humanidades = DB::table('facultades')->where('nombre', 'Facultad de Humanidades')->first(); */

        // 2. Armamos el array de carreras asegurando que las variables no sean null
        $carreras = [
            ['nombre' => 'Licenciatura en Análisis de Sistemas', 'facultad_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Tecnicatura Universitaria en Programación', 'facultad_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Licenciatura en Física', 'facultad_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Ingeniería Química', 'facultad_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Ingeniería Industrial', 'facultad_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Ingeniería Civil', 'facultad_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Contador Público', 'facultad_id' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Licenciatura en Administración', 'facultad_id' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Licenciatura en Enfermería', 'facultad_id' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Licenciatura en Nutrición', 'facultad_id' => '6', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Licenciatura en Biología', 'facultad_id' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Licenciatura en Geología', 'facultad_id' => '7', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Licenciatura en Filosofía', 'facultad_id' => '8', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Licenciatura en Historia', 'facultad_id' => '8', 'created_at' => now(), 'updated_at' => now()],
            ];

        // 3. Insertamos todas las carreras juntas
        foreach($carreras as $carrera){
            Carrera::create($carrera);
        }
    }
}
