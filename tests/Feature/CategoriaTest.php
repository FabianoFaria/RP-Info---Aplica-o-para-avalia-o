<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Usuario;
use App\Models\Categoria;

class CategoriaTest extends TestCase
{

    use RefreshDatabase;

    public function testListaCategorias()
    {
        $user = Usuario::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('listaCategorias'));

        $response->assertStatus(200);
        $response->assertViewIs('categoria.index'); // Substitua pelo nome correto da sua view
    }


    public function testStoreCategoria()
    {
        $user = Usuario::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('categoria.store'), [
            'nome' => 'Categoria Teste',
        ]);

        $response->assertRedirect(route('listaCategorias'));
        $this->assertDatabaseHas('categoria', [
            'nome' => 'Categoria Teste',
        ]);
    }

    public function testUpdateCategoria()
    {
        $user = Usuario::factory()->create();
        $categoria = Categoria::factory()->create();
        $this->actingAs($user);

        $response = $this->put(route('categoria.update', ['id' => $categoria->id]), [
            'nome' => 'Categoria Atualizada',
        ]);

        $response->assertRedirect(route('listaCategorias'));
        $this->assertDatabaseHas('categoria', [
            'id' => $categoria->id,
            'nome' => 'Categoria Atualizada',
        ]);
    }

    public function testDeleteCategoria()
    {
        $user = Usuario::factory()->create();
        $categoria = Categoria::factory()->create();
        $this->actingAs($user);

        $response = $this->delete(route('deleteCategoria', ['id' => $categoria->id]));

        $response->assertRedirect(route('listaCategorias'));
        $this->assertSoftDeleted('categoria', [
            'id' => $categoria->id,
        ]);
    }

}