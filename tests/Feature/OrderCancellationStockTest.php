<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderCancellationStockTest extends TestCase
{
    use RefreshDatabase;

    public function test_al_cancelar_un_pedido_el_stock_se_reintegra(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $customer = User::factory()->create(['rol' => 'cliente']);

        $product = Product::create([
            'nombre' => 'Pulsera',
            'cantidad_stock' => 5,
            'precio_unitario' => 20,
            'precio_inversion' => 8,
            'descuento' => 0,
            'activo' => true,
        ]);

        $this->actingAs($customer)->post(route('encargos.store'), [
            'productos' => [
                ['id' => $product->id, 'cantidad' => 2],
            ],
            'envio_o_entrega' => 'Entrega',
            'lugar_de_recibir' => 'Casa',
            'fecha' => now()->toDateString(),
        ])->assertRedirect('/mis-encargos');

        $product->refresh();
        $this->assertSame(3, $product->cantidad_stock);

        $order = Order::with('orderItems')->latest('id')->firstOrFail();

        $this->actingAs($admin)->patchJson(route('admin.pedidos.estado', $order), [
            'estado' => 'cancelado',
        ])->assertOk()->assertJson([
            'success' => true,
            'estado' => 'cancelado',
        ]);

        $product->refresh();
        $this->assertSame(5, $product->cantidad_stock);
        $this->assertSame('cancelado', $order->refresh()->estado);
    }
}
