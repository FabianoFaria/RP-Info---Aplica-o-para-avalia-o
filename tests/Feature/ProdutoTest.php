<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Usuario;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoTest extends TestCase
{

    use RefreshDatabase;

    public function testListaProdutos()
    {
        $user = Usuario::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('listaProdutos'));

        $response->assertStatus(200);
        $response->assertViewIs('produto.index'); // Substitua pelo nome correto da sua view
    }

    public function testStoreProduto()
    {
        $user = Usuario::factory()->create();
        $categoria = Categoria::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('produto.store'), [
            'nome' => 'Produto Teste',
            'valor' => 123.45,
            'categoria_id' => $categoria->id,
        ]);

        $response->assertRedirect(route('listaProdutos'));
        $this->assertDatabaseHas('produto', [
            'nome' => 'Produto Teste',
            'valor' => 123.45,
        ]);
    }

    public function testUpdateProduto()
    {
        $user = Usuario::factory()->create();
        $categoria = Categoria::factory()->create();
        $produto = Produto::factory()->create([
            'usuario_id' => $user->id,
            'categoria_id' => $categoria->id,
        ]);
        $this->actingAs($user);

        $response = $this->put(route('produto.update', ['id' => $produto->id]), [
            'nome' => 'Produto Atualizado',
            'valor' => 543.21,
            'categoria_id' => $categoria->id,
        ]);

        $response->assertRedirect(route('listaProdutos'));
        $this->assertDatabaseHas('produto', [
            'id' => $produto->id,
            'nome' => 'Produto Atualizado',
            'valor' => 543.21,
        ]);
    }

    public function testDeleteProduto()
    {
        $user = Usuario::factory()->create();
        $categoria = Categoria::factory()->create();
        $produto = Produto::factory()->create([
            'usuario_id' => $user->id,
            'categoria_id' => $categoria->id,
        ]);
        $this->actingAs($user);

        $response = $this->delete(route('deleteProduto', ['id' => $produto->id]));

        $response->assertRedirect(route('listaProdutos'));
        $this->assertSoftDeleted('produto', [
            'id' => $produto->id,
        ]);
    }
}