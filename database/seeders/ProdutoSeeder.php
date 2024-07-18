<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Usuario;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Adição de usuarios
        $usuario1 = Usuario::create([
            'nome' => 'Rafael Ficticio',
            'email' => 'rafa@examplo.com',
            'senha' => bcrypt('senha123'),
        ]);

        // Adicione mais usuários conforme necessário
        $usuario2 = Usuario::create([
            'nome' => 'Junior Usuário',
            'email' => 'junior@examplo.com',
            'senha' => bcrypt('senha1234'),
        ]);

        // Adição de categorias

        $categoria1 = Categoria::create([
            'nome' => 'Categoria extra',
        ]);

        $categoria2 = Categoria::create([
            'nome' => 'Categoria extra 2',
        ]);

        // Adição de produtos

        Produto::create([
            'nome' => 'Refrigerante Cola',
            'valor' => 10.00,
            'usuario_id' => $usuario1->id,
            'categoria_id' => $categoria1->id,
        ]);

        Produto::create([
            'nome' => 'Salgadinho',
            'valor' => 2.5,
            'usuario_id' => $usuario2->id,
            'categoria_id' => $categoria2->id,
        ]);
    }
}
