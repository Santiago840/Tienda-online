<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    use RefreshDatabase;
    public function test_crear_categoria()
    {
        $categoria = Category::factory()->create();

        $this->assertDatabaseHas($categoria);
    }

    public function test_editar_categoria()
    {
        $categoria = Category::factory()->create();

        $datos = [
            'name' => 'Testing'
        ];

        $categoria->update($datos);

        $this->assertDatabaseHas('categories', $datos);
    }

    public function test_eliminar_categoria()
    {
        $categoria = Category::factory()->create();

        $categoria->delete();

        $this->assertDatabaseMissing($categoria);
    }
}
