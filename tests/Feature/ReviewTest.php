<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_cliente_puede_calificar_un_pedido_entregado(): void
    {
        $user = User::factory()->create(['rol' => 'cliente']);
        $product = Product::create([
            'nombre' => 'Pulsera',
            'cantidad_stock' => 10,
            'precio_unitario' => 25,
            'precio_inversion' => 10,
            'descuento' => 0,
            'activo' => true,
        ]);
        $order = Order::create([
            'user_id' => $user->id,
            'envio_o_entrega' => 'Entrega',
            'lugar_de_recibir' => 'Casa',
            'fecha' => now()->toDateString(),
            'precio_total' => 25,
            'estado' => 'entregado',
        ]);
        $orderItem = OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'cantidad' => 1,
            'precio_unitario' => 25,
            'descuento_aplicado' => 0,
            'precio_inversion_aplicado' => 10,
        ]);

        $response = $this->actingAs($user)->post(route('resenas.store'), [
            'order_item_id' => $orderItem->id,
            'rating' => 5,
            'comment' => 'Excelente producto.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('reviews', [
            'user_id' => $user->id,
            'order_item_id' => $orderItem->id,
            'product_id' => $product->id,
            'rating' => 5,
        ]);
    }

    public function test_cliente_no_puede_calificar_un_pedido_no_entregado(): void
    {
        $user = User::factory()->create(['rol' => 'cliente']);
        $product = Product::create([
            'nombre' => 'Collar',
            'cantidad_stock' => 10,
            'precio_unitario' => 30,
            'precio_inversion' => 12,
            'descuento' => 0,
            'activo' => true,
        ]);
        $order = Order::create([
            'user_id' => $user->id,
            'envio_o_entrega' => 'Entrega',
            'lugar_de_recibir' => 'Casa',
            'fecha' => now()->toDateString(),
            'precio_total' => 30,
            'estado' => 'pendiente',
        ]);
        $orderItem = OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'cantidad' => 1,
            'precio_unitario' => 30,
            'descuento_aplicado' => 0,
            'precio_inversion_aplicado' => 12,
        ]);

        $response = $this->actingAs($user)->post(route('resenas.store'), [
            'order_item_id' => $orderItem->id,
            'rating' => 4,
            'comment' => 'Aún no debería permitirlo.',
        ]);

        $response->assertSessionHas('error', 'Solo puedes calificar pedidos entregados.');
        $this->assertDatabaseMissing('reviews', [
            'order_item_id' => $orderItem->id,
        ]);
    }
}
