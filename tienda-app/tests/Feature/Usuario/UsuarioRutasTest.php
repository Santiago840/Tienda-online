<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuarioRutasTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_ruta_usuario():void{
        $response = $this->get('/usuarios');

        $response->assertStatus(200);
        //$response->assertSee('hello world');
        //$response->assertViewIs('usuarios.index');
    }

    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
