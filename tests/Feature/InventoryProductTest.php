<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductBatch;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_el_inventario_muestra_precio_unitario_y_inversion_total(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);

        $product = Product::create([
            'nombre' => 'Pulsera',
            'cantidad_stock' => 3,
            'precio_unitario' => 12,
            'precio_inversion' => 5,
            'descuento' => 0,
            'activo' => true,
        ]);
        $product->agregarLote(3, 5);

        $response = $this->actingAs($admin)->get(route('admin.inventario.index'));

        $response->assertOk();
        $response->assertSee('Precio unitario', false);
        $response->assertSee('Inversión total', false);
        $response->assertSee('$15.00', false);
        $response->assertDontSee('Precio inversión', false);
    }

    public function test_el_admin_puede_reponer_stock_desde_el_inventario(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $product = Product::create([
            'nombre' => 'Pulsera',
            'cantidad_stock' => 3,
            'precio_unitario' => 12,
            'precio_inversion' => 5,
            'descuento' => 0,
            'activo' => true,
        ]);

        $response = $this->actingAs($admin)->post(route('admin.inventario.reponer', $product), [
            'cantidad' => 4,
            'costo_unitario' => 6.5,
            'precio_venta' => 11.75,
            'fecha_ingreso' => now()->toDateString(),
        ]);

        $batch = ProductBatch::first();
        $this->assertNotNull($batch);
        $response->assertRedirect(route('admin.inventario.index', ['batch_id' => $batch->id]));
        $this->assertDatabaseCount('product_batches', 1);

        $product->refresh();
        $this->assertSame(7, $product->cantidad_stock);
        $this->assertSame('11.75', (string) $product->precio_unitario);

        $this->assertSame(4, $batch->cantidad_inicial);
        $this->assertSame('6.50', (string) $batch->precio_inversion);
        $this->assertSame('11.75', (string) $batch->precio_venta);
    }
}
