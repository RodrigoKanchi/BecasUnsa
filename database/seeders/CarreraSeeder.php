<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buscamos las facultades existentes para obtener sus IDs reales
        $ingenieria = DB::table('facultades')->where('nombre', 'Facultad de Ingeniería')->first();
        $exactas = DB::table('facultades')->where('nombre', 'Facultad de Ciencias Exactas')->first();
        $economicas = DB::table('facultades')->where('nombre', 'Facultad de Ciencias Económicas, Jurídicas y Sociales')->first();
        $salud = DB::table('facultades')->where('nombre', 'Facultad de Ciencias de la Salud')->first();
        $naturales = DB::table('facultades')->where('nombre', 'Facultad de Ciencias Naturales')->first();
        $humanidades = DB::table('facultades')->where('nombre', 'Facultad de Humanidades')->first();

        // 2. Armamos el array de carreras asegurando que las variables no sean null
        $carreras = [];

        if ($exactas) {
            $carreras[] = ['nombre' => 'Licenciatura en Análisis de Sistemas', 'facultad_id' => $exactas->id, 'created_at' => now(), 'updated_at' => now()];
            $carreras[] = ['nombre' => 'Tecnicatura Universitaria en Programación', 'facultad_id' => $exactas->id, 'created_at' => now(), 'updated_at' => now()];
            $carreras[] = ['nombre' => 'Licenciatura en Física', 'facultad_id' => $exactas->id, 'created_at' => now(), 'updated_at' => now()];
        }

        if ($ingenieria) {
            $carreras[] = ['nombre' => 'Ingeniería Química', 'facultad_id' => $ingenieria->id, 'created_at' => now(), 'updated_at' => now()];
            $carreras[] = ['nombre' => 'Ingeniería Industrial', 'facultad_id' => $ingenieria->id, 'created_at' => now(), 'updated_at' => now()];
            $carreras[] = ['nombre' => 'Ingeniería Civil', 'facultad_id' => $ingenieria->id, 'created_at' => now(), 'updated_at' => now()];
        }

        if ($economicas) {
            $carreras[] = ['nombre' => 'Contador Público', 'facultad_id' => $economicas->id, 'created_at' => now(), 'updated_at' => now()];
            $carreras[] = ['nombre' => 'Licenciatura en Administración', 'facultad_id' => $economicas->id, 'created_at' => now(), 'updated_at' => now()];
        }

        if ($salud) {
            $carreras[] = ['nombre' => 'Licenciatura en Enfermería', 'facultad_id' => $salud->id, 'created_at' => now(), 'updated_at' => now()];
            $carreras[] = ['nombre' => 'Licenciatura en Nutrición', 'facultad_id' => $salud->id, 'created_at' => now(), 'updated_at' => now()];
        }

        if($naturales) {
            $carreras[] = ['nombre' => 'Licenciatura en Biología', 'facultad_id' => $naturales->id, 'created_at' => now(), 'updated_at' => now()];
            $carreras[] = ['nombre' => 'Licenciatura en Geología', 'facultad_id' => $naturales->id, 'created_at' => now(), 'updated_at' => now()];
        }

        if($humanidades) {
            $carreras[] = ['nombre' => 'Licenciatura en Filosofía', 'facultad_id' => $humanidades->id, 'created_at' => now(), 'updated_at' => now()];
            $carreras[] = ['nombre' => 'Licenciatura en Historia', 'facultad_id' => $humanidades->id, 'created_at' => now(), 'updated_at' => now()];
        }

        // 3. Insertamos todas las carreras juntas
        if (!empty($carreras)) {
            DB::table('carreras')->insert($carreras);
        }
    }
}
