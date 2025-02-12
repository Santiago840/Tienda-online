<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuarioControllerTest extends TestCase
{
    use DatabaseTransactions, WithFaker;
    /**
     * A basic feature test example.
     */
    public function test_obtener_usuarios(): void
    {
        $usuario =  User::factory()->count(2)->create();

        $response = $this->withoutMiddleware()->actingAs($usuario->first())->get('/usuarios');

        //$response->assertStatus(200);
        $response->assertSee($usuario->first()->name);
        //$response->assertViewIs('resources\js\Pages\Usuario\Index');
        //$response->assertViewHas('Santiago Emmanuels');
    }

    public function test_crear_usuario(): void
    {
        $usuario =
            [
                'name' => 'santiago',
                'email' => 'usuarios@gmail.com',
                'password' => bcrypt('caracoles1234'),
                'rol' => 'cliente'
            ];
        $response = $this->withoutMiddleware()->post(route('usuarios.store'), $usuario);

        $response->assertRedirect(route('usuarios.index'));

        $response->assertSessionHas('success', 'Usuario creado exitosamente.');

        //$response->assertSessionHasErrors('password');
        /*$usuario == User::factory()->create();
        $this->assertDatabaseHas('users', $usuario); */
    }
}
