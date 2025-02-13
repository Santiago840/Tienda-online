<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuarioRutasTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use DatabaseTransactions;
    //use RefreshDatabase;

    public function test_obtener_usuario(): void
    {
        $response = $this->withoutMiddleware()->get('/usuarios');

        $response->assertStatus(200);
        //$response->assertSee('hello world');
        //$response->assertViewIs('usuarios.index');
    }

    public function test_crear_usuario(): void
    {
        $response = $this->withoutMiddleware()->post(route('usuarios.store'));

        $response->assertStatus(302);
        //$response->assertSessionHasErrors();
    }

    public function test_eliminar_usuario(): void
    {
        $admin = User::create([
            'name' => 'test usuario',
            'email' => 'test@gmail.com',
            'password' => bcrypt('caracoles1234'),
            'rol' => 'administrador'
        ]);

        $usuario = User::factory()->create();

        $response = $this->actingAs($admin)->withoutMiddleware()->delete(route('usuarios.destroy', $usuario));
        $response->assertStatus(302);
    }

    /*  public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    } */
}
