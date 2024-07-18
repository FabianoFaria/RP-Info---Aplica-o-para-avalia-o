<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nome' => 'Fulano da Silva',
            'email' => 'fulano@examplo.com',
            'senha' => bcrypt('senha123'),
        ]);

        // Adicione mais usuários conforme necessário
        Usuario::create([
            'nome' => 'Ciclano dos Santos',
            'email' => 'ciclano@examplo.com',
            'senha' => bcrypt('senha1234'),
        ]);
    }
}
