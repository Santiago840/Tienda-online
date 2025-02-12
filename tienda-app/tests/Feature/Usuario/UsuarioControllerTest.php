<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UsuarioControllerTest extends TestCase
{
    use DatabaseTransactions;
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
        $usuario = User::factory()->create([
            'name' => 'Test Usuario'
        ]);
        $response = $this->withoutMiddleware()->actingAs($usuario)->post('/usuarios');

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', ['name' => 'Test Usuario']);
    }
}
