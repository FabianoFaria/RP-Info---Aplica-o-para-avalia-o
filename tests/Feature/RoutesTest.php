<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Usuario;

class PublicRouteTest extends TestCase
{
    use RefreshDatabase;

    public function testLoginPage()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('login.login'); // Substitua pelo nome correto da sua view
    }

    public function testPostLogin()
    {
        $user = Usuario::factory()->create([
            'email' => 'test@example.com',
            'senha' => bcrypt('password'),
        ]);

        $response = $this->post(route('login.post'), [
            'email' => 'test@example.com',
            'senha' => 'password',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }


    public function testRegistrationPage()
    {
        $response = $this->get(route('cadastrar'));

        $response->assertStatus(200);
        $response->assertViewIs('login.registration'); // Substitua pelo nome correto da sua view
    }


    public function testPostRegistration()
    {
        $response = $this->post(route('register.post'), [
            'nome' => 'Test User',
            'email' => 'newuser@example.com',
            'senha' => 'password',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('usuario', [
            'email' => 'newuser@example.com',
        ]);
    }
    
    // Adicione mais testes para outras rotas públicas
}