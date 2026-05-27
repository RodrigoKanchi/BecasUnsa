<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categorias = [
            ['nombre' => 'Beca', 'activo' => true],
            ['nombre' => 'Pasantia', 'activo' => true],
            ['nombre' => 'Intercambio Estudiantil', 'activo' => true]
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
