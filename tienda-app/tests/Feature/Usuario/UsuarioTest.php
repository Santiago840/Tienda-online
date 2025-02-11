<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UsuarioTest extends TestCase
{
    //asegurar que todas las mihgraciones se jecuten antes de cada prueba
    //use RefreshDatabase;

    //para crear las trasacciones, pero regresa la base de datos a su estado actual
    use DatabaseTransactions;
    //use RefreshDatabase;

    public function test_usuario_creacion(): void
    {
        $user = User::create([
            'name' => 'Test Usuario',
            'email' => 'usuario@gmail.com',
            'password' => bcrypt('caracoles'),
            'rol' => 'cliente'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'usuario@gmail.com',
            'rol' => 'cliente'
        ]);
    }

    public function test_usuario_editar(): void
    {
        $user = User::create([
            'name' => 'Test Usuario',
            'email' => 'usuario@gmail.com',
            'password' => bcrypt('caracoles'),
            'rol' => 'administrador'
        ]);

        $user->update([
            'password' => bcrypt('caracoles2'),
            'rol' => 'cliente'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'usuario@gmail.com',
            'rol' => 'cliente'
        ]);
    }

    public function test_usuario_eliminar(): void
    {
        $user = User::factory()->create([
            'name' => 'Test Usuario',
        ]);

        $user->delete();

        $this->assertDatabaseMissing('users', [
            'name' => 'Test usuario'
        ]);
    }

    /**
     * A basic feature test example.
     */
    /* public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    } */
}
