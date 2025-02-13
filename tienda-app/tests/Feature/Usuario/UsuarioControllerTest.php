<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuarioControllerTest extends TestCase
{
    //use DatabaseTransactions, WithFaker;
    use RefreshDatabase;
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

        $response->assertSessionHas('success', 'Usuario creado exitosamente.');

        //$response->assertSessionHasErrors('password');
        /*$usuario == User::factory()->create();
        $this->assertDatabaseHas('users', $usuario); */
    }

    public function test_editar_usuario(): void
    {
        $usuario = User::factory()->create(
            [
                'rol' => 'administrador'
            ]
        );
        $datos =
            [
                'name' => 'santiago',
                'email' => 'usuarios@gmail.com',
                'password' => bcrypt('caracoles1234'),
                'rol' => 'cliente'
            ];

        $this->actingAs($usuario);

        $response = $this->withoutMiddleware()->put(route('usuarios.update', $usuario), $datos);

        $response->assertSessionHas('success', 'Usuario correctamente actualizado.');
    }

    public function test_eliminar_usuario()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('caracoles1234'),
            'rol' => 'administrador'
        ]);

        // Crea un usuario a eliminar
        $usuario = User::create([
            'name' => 'Santiago',
            'email' => 'usuarios@gmail.com',
            'password' => bcrypt('caracoles1234'),
            'rol' => 'cliente'
        ]);

        $this->actingAs($admin);

        $response = $this->withoutMiddleware()->delete(route('usuarios.destroy', $usuario));

        $response->assertRedirect(route('usuarios.index'));

        //$response->assertSessionHas('success', 'El usuario ha sido correctamente eliminado.');
    }
}
