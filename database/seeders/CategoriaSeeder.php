<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nome' => 'Bebidas',
        ]);

        Categoria::create([
            'nome' => 'Alimentos',
        ]);

        Categoria::create([
            'nome' => 'Categoria 3',
        ]);

        Categoria::create([
            'nome' => 'Categoria 4',
        ]);

        Categoria::create([
            'nome' => 'Categoria 5',
        ]);
    }
}
