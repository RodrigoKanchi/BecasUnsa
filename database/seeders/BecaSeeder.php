<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categoriaBeca = \App\Models\Categoria::where('nombre', 'Beca')->first();

        \App\Models\Beca::create([
            'titulo' => 'Beca Comedor UNSa 2026',
            'fecha_inscripcion' => '2026/05/01',
            'fecha_limite' => '2026/05/30',
            'activo' => true,
            'correo_contacto' => 'becas@unsa.edu.ar',
            'categoria_id' => $categoriaBeca->id,
            'user_id' => 2,
            'link_resolucion' => 'https://www.unsa.edu.ar/resolucion_comedor.pdf'
        ]);

        \App\Models\Beca::create([
            'titulo' => 'Beca de Formación a la Investigación',
            'fecha_inscripcion' => '2026/05/10',
            'fecha_limite' => '2026/06/15',
            'activo' => true,
            'correo_contacto' => 'ciunsa@unsa.edu.ar',
            'categoria_id' => $categoriaBeca->id,
            'user_id' => 2,
            'link_resolucion' => 'https://ciunsa.unsa.edu.ar/becas_investigacion.pdf'
        ]);

        \App\Models\Beca::create([
            'titulo' => 'Beca de Apoyo a la Movilidad Estudiantil',
            'fecha_inscripcion' => '2026/05/20',
            'fecha_limite' => '2026/06/30',
            'activo' => true,
            'correo_contacto' => 'movilidad@unsa.edu.ar',
            'categoria_id' => $categoriaBeca->id,
            'user_id' => 2,
            'link_resolucion' => 'https://www.unsa.edu.ar/resolucion_movilidad.pdf'
        ]);
    }
}
