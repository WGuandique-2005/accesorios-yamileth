<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShippingFeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_puede_agregar_cargo_de_envio_a_un_pedido(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $customer = User::factory()->create(['rol' => 'cliente']);
        $product = Product::create([
            'nombre' => 'Aretes',
            'cantidad_stock' => 10,
            'precio_unitario' => 20,
            'precio_inversion' => 8,
            'descuento' => 0,
            'activo' => true,
        ]);
        $order = Order::create([
            'user_id' => $customer->id,
            'envio_o_entrega' => 'Envío',
            'lugar_de_recibir' => 'Casa',
            'fecha' => now()->toDateString(),
            'precio_total' => 20,
            'cargo_envio' => 0,
            'estado' => 'pendiente',
        ]);
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'cantidad' => 1,
            'precio_unitario' => 20,
            'descuento_aplicado' => 0,
            'precio_inversion_aplicado' => 8,
        ]);

        $response = $this->actingAs($admin)->patch(route('admin.pedidos.envio', $order), [
            'envio_o_entrega' => 'Entrega',
            'lugar_despacho' => 'Sucursal principal',
            'lugar_de_recibir' => 'Casa de la clienta',
            'cargo_envio' => 3.50,
        ]);

        $response->assertRedirect(route('admin.pedidos.show', $order));
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'envio_o_entrega' => 'Entrega',
            'lugar_despacho' => 'Sucursal principal',
            'lugar_de_recibir' => 'Casa de la clienta',
            'cargo_envio' => 3.50,
        ]);
    }
}
