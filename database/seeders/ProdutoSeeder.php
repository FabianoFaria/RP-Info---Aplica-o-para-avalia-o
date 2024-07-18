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
        Usuario::create([
            'nome' => 'Rafael Ficticio',
            'email' => 'rafa@examplo.com',
            'senha' => bcrypt('senha123'),
        ]);

        // Adicione mais usuários conforme necessário
        Usuario::create([
            'nome' => 'Junior Usuário',
            'email' => 'junior@examplo.com',
            'senha' => bcrypt('senha1234'),
        ]);

        // Adição de categorias

        Categoria::create([
            'nome' => 'Categoria extra',
        ]);

        Categoria::create([
            'nome' => 'Categoria extra 2',
        ]);

        // Adição de produtos

        Produto::create([
            'nome' => 'Refrigerante Cola',
            'valor' => 10.00,
            'usuario_id' => 1,
            'categoria_id' => 1,
        ]);

        Produto::create([
            'nome' => 'Salgadinho',
            'valor' => 2.5,
            'usuario_id' => 2,
            'categoria_id' => 2,
        ]);
    }
}
