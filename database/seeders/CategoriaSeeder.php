<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categorias = ['Beca', 'Pasantia', 'Intercambio Estudiantil'];

        foreach ($categorias as $nombre) {
            \App\Models\Categoria::create(['nombre' => $nombre]);
        }
    }
}
