<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeFilterTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_filtra_productos_por_rango_de_precio(): void
    {
        $user = User::factory()->create(['rol' => 'cliente']);

        Product::create([
            'nombre' => 'Producto Barato',
            'cantidad_stock' => 10,
            'precio_unitario' => 10,
            'precio_inversion' => 5,
            'descuento' => 2,
            'activo' => true,
        ]);

        Product::create([
            'nombre' => 'Producto Caro',
            'cantidad_stock' => 10,
            'precio_unitario' => 20,
            'precio_inversion' => 10,
            'descuento' => 0,
            'activo' => true,
        ]);

        $response = $this->actingAs($user)->get('/home?min_price=0&max_price=9');

        $response->assertStatus(200);
        $response->assertSee('Producto Barato');
        $response->assertDontSee('Producto Caro');
    }

    public function test_home_muestra_el_precio_del_lote_mas_antiguo_disponible(): void
    {
        $user = User::factory()->create(['rol' => 'cliente']);
        $product = Product::create([
            'nombre' => 'Producto FIFO',
            'cantidad_stock' => 0,
            'precio_unitario' => 0,
            'precio_inversion' => 0,
            'descuento' => 0,
            'activo' => true,
        ]);

        $product->agregarLote(2, 10, null, 18);
        $product->agregarLote(3, 12, null, 22);

        $response = $this->actingAs($user)->get('/home');

        $response->assertStatus(200);
        $response->assertSee('Producto FIFO');
        $response->assertSee('$18.00', false);
        $response->assertDontSee('$22.00', false);
    }
}
