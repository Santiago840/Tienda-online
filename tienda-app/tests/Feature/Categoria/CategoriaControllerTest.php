<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_obtener_categorias(): void
    {
        Category::factory()->count(4)->create();

        $respond = $this->withoutMiddleware()->get(route('categorias.index'));

        $respond->assertSee('categorias');
    }

    public function test_crear_categoria(): void
    {
        $categoria = [
            'name' => 'categoria de prueba'
        ];

        $respond = $this->withoutMiddleware()->post(route('categorias.store'), $categoria);

        $respond->assertSessionHas('success', 'Categoría correctamente creada.');
    }

    public function test_editar_categoria(): void
    {
        $categoria = Category::factory()->create();

        $datos = [
            'name' => 'nueva categoria'
        ];

        $respond = $this->withoutMiddleware()->put(route('categorias.update', $categoria->id), $datos);

        $respond->assertSessionHas('success', 'Categoría actualizada correctamente.');
    }

    public function test_eliminar_categoria(): void
    {
        $categoria = Category::factory()->create();

        $respond = $this->withoutMiddleware()->delete(route('categorias.destroy', $categoria->id));

        $respond->assertSessionHas('success', 'Categoría correctamente eliminada.');
    }
}
