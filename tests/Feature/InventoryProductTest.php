<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_el_inventario_muestra_precio_unitario_y_inversion_total(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);

        Product::create([
            'nombre' => 'Pulsera',
            'cantidad_stock' => 3,
            'precio_unitario' => 12,
            'precio_inversion' => 5,
            'descuento' => 0,
            'activo' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.inventario.index'));

        $response->assertOk();
        $response->assertSee('Precio unitario', false);
        $response->assertSee('Inversión total', false);
        $response->assertSee('$15.00', false);
        $response->assertDontSee('Precio inversión', false);
    }
}
