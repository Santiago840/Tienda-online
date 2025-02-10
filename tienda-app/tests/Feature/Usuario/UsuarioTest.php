<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UsuarioTest extends TestCase
{
    //asegurar que todas las mihgraciones se jecuten antes de cada prueba
    use RefreshDatabase;

    public function test_usuario_creacion(): void
    {
        $user = User::create([
            'name' => 'Test Usuario',
            'email' => 'usuario@gmail.com',
            'password' => bcrypt('caracoles'),
            'rol' => 'cliente'
        ]);

        $this->assertDatabaseHas('users',[
            'email' => 'usuario@gmail.com',
            'rol' => 'cliente'
        ]);
    }

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
