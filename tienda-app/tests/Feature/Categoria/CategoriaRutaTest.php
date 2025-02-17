<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CategoriaRutaTest extends TestCase
{
    use RefreshDatabase;
    public function test_mostrar_categorias()
    {
        $response = $this->WithoutMiddleware()->get('categorias');

        $response->assertStatus(200);
    }

    public function test_crear_categorias()
    {
        $response = $this->withoutMiddleware()->post(route('categorias.store'));

        $response->assertStatus(302);
    }

    public function test_editar_categoria()
    {
        $categoria = Category::factory()->create();

        $datos = [
            'name' => 'Nueva categoria',
        ];

        $response = $this->withoutMiddleware()->put(route('categorias.update'), $datos, $categoria->id);

        $response->assertStatus(302);
    }

    public function test_eliminar_categoria()
    {
        $categoria = Category::factory()->create();

        $response = $this->withoutMiddleware()->delete(route('categorias.destroy', $categoria->id));

        $response->assertStatus(302);
    }
}
