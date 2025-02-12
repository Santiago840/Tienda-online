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

        $response = $this->actingAs($usuario->first())->get('/usuarios');

        //$response->assertStatus(200);
        $response->assertSee($usuario->first()->name); 
    }

    public function test_crear_usuario(): void
    {
        $usuario = User::factory()->create([
            'name' => 'Test Usuario'
        ]);
        $response = $this->actingAs($usuario)->post('/usuario');

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', ['name' => 'Test Usuario']);
    }
}
