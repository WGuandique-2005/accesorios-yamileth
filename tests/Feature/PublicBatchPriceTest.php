<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicBatchPriceTest extends TestCase
{
    use RefreshDatabase;

    public function test_el_detalle_publico_muestra_el_precio_del_lote_mas_antiguo_disponible(): void
    {
        $user = User::factory()->create(['rol' => 'cliente']);
        $product = Product::create([
            'nombre' => 'Vestido',
            'cantidad_stock' => 0,
            'precio_unitario' => 0,
            'precio_inversion' => 0,
            'descuento' => 0,
            'activo' => true,
        ]);

        $product->agregarLote(2, 12.00, null, 22.00);
        $product->agregarLote(3, 18.00, null, 30.00);

        $response = $this->actingAs($user)->get(route('productos.show', $product->id));

        $response->assertOk();
        $response->assertSee('$22.00', false);
        $response->assertSee('Se vende primero el lote más antiguo disponible', false);
        $response->assertDontSee('$30.00', false);
    }
}
