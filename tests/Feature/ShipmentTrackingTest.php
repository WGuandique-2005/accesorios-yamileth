<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ShipmentTracking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShipmentTrackingTest extends TestCase
{
    use RefreshDatabase;

    public function test_al_pasar_un_pedido_a_ruta_se_crea_su_seguimiento_automaticamente(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-06-19 10:00:00'));

        $admin = User::factory()->create(['rol' => 'admin']);
        $customer = User::factory()->create(['rol' => 'cliente']);
        $product = Product::create([
            'nombre' => 'Pulsera',
            'cantidad_stock' => 10,
            'precio_unitario' => 20,
            'precio_inversion' => 8,
            'descuento' => 0,
            'activo' => true,
        ]);
        $order = Order::create([
            'user_id' => $customer->id,
            'envio_o_entrega' => 'Envío',
            'lugar_despacho' => 'Melo Express',
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

        $response = $this->actingAs($admin)->patchJson(route('admin.pedidos.estado', $order), [
            'estado' => 'en_ruta',
        ]);

        $response->assertOk()->assertJson([
            'success' => true,
            'estado' => 'en_ruta',
        ]);

        $tracking = ShipmentTracking::where('order_id', $order->id)->first();

        $this->assertNotNull($tracking);
        $this->assertSame('Melo Express', $tracking->agencia);
        $this->assertSame('2026-06-19', $tracking->fecha_envio->toDateString());
        $this->assertSame('2026-06-24', $tracking->fecha_limite_retiro->toDateString());
        $this->assertFalse($tracking->cliente_retiro);
        $this->assertFalse($tracking->admin_cobro);

        $response = $this->actingAs($admin)->patchJson(route('admin.pedidos.estado', $order), [
            'estado' => 'entregado',
        ]);

        $response->assertOk()->assertJson([
            'success' => true,
            'estado' => 'entregado',
        ]);

        $tracking->refresh();
        $this->assertTrue($tracking->cliente_retiro);
        $this->assertSame('2026-06-19', $tracking->fecha_retiro_real->toDateString());

        Carbon::setTestNow();
    }

    public function test_admin_puede_marcar_y_desmarcar_retiro_y_cobro_desde_envios(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $customer = User::factory()->create(['rol' => 'cliente']);
        $order = Order::create([
            'user_id' => $customer->id,
            'envio_o_entrega' => 'Envío',
            'lugar_despacho' => 'Alcaldía',
            'lugar_de_recibir' => 'Casa',
            'fecha' => now()->toDateString(),
            'precio_total' => 20,
            'cargo_envio' => 0,
            'estado' => 'en_ruta',
        ]);

        $tracking = ShipmentTracking::create([
            'order_id' => $order->id,
            'agencia' => 'Alcaldía',
            'fecha_envio' => now()->toDateString(),
            'fecha_limite_retiro' => now()->toDateString(),
        ]);

        $this->actingAs($admin)->patchJson(route('admin.envios.update', $tracking), [
            'agencia' => 'Melo Express',
        ])->assertOk()->assertJsonPath('agencia', 'Melo Express');

        $tracking->refresh();
        $this->assertSame('Melo Express', $tracking->agencia);

        $this->actingAs($admin)->patchJson(route('admin.envios.update', $tracking), [
            'cliente_retiro' => true,
        ])->assertOk()->assertJsonPath('cliente_retiro', true);

        $tracking->refresh();
        $this->assertTrue($tracking->cliente_retiro);
        $this->assertNotNull($tracking->fecha_retiro_real);

        $this->actingAs($admin)->patchJson(route('admin.envios.update', $tracking), [
            'cliente_retiro' => false,
        ])->assertOk()->assertJsonPath('cliente_retiro', false);

        $tracking->refresh();
        $this->assertFalse($tracking->cliente_retiro);
        $this->assertNull($tracking->fecha_retiro_real);

        $this->actingAs($admin)->patchJson(route('admin.envios.update', $tracking), [
            'admin_cobro' => true,
        ])->assertOk()->assertJsonPath('admin_cobro', true);

        $tracking->refresh();
        $this->assertTrue($tracking->admin_cobro);
        $this->assertNotNull($tracking->fecha_cobro);

        $this->actingAs($admin)->patchJson(route('admin.envios.update', $tracking), [
            'cliente_retiro' => true,
        ])->assertOk()->assertJsonPath('cliente_retiro', true);

        $tracking->refresh();
        $this->assertTrue($tracking->cliente_retiro);

        $this->actingAs($admin)->patchJson(route('admin.envios.update', $tracking), [
            'agencia' => 'Otro despacho',
        ])->assertStatus(422)->assertJsonPath('locked', true);
    }

    public function test_pedido_entregado_o_cancelado_ya_no_puede_cambiar_de_estado(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $customer = User::factory()->create(['rol' => 'cliente']);
        $order = Order::create([
            'user_id' => $customer->id,
            'envio_o_entrega' => 'Envío',
            'lugar_despacho' => 'Melo Express',
            'lugar_de_recibir' => 'Casa',
            'fecha' => now()->toDateString(),
            'precio_total' => 20,
            'cargo_envio' => 0,
            'estado' => 'entregado',
        ]);

        $this->actingAs($admin)->patchJson(route('admin.pedidos.estado', $order), [
            'estado' => 'pendiente',
        ])->assertStatus(422)->assertJsonPath('locked', true);

        $order->refresh();
        $this->assertSame('entregado', $order->estado);

        $cancelledOrder = Order::create([
            'user_id' => $customer->id,
            'envio_o_entrega' => 'Envío',
            'lugar_despacho' => 'Melo Express',
            'lugar_de_recibir' => 'Casa',
            'fecha' => now()->toDateString(),
            'precio_total' => 20,
            'cargo_envio' => 0,
            'estado' => 'cancelado',
        ]);

        $this->actingAs($admin)->patchJson(route('admin.pedidos.estado', $cancelledOrder), [
            'estado' => 'en_ruta',
        ])->assertStatus(422)->assertJsonPath('locked', true);

        $cancelledOrder->refresh();
        $this->assertSame('cancelado', $cancelledOrder->estado);
    }

    public function test_el_envio_ya_no_se_puede_modificar_cuando_el_pedido_esta_entregado(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $customer = User::factory()->create(['rol' => 'cliente']);
        $order = Order::create([
            'user_id' => $customer->id,
            'envio_o_entrega' => 'Envío',
            'lugar_despacho' => 'Melo Express',
            'lugar_de_recibir' => 'Casa',
            'fecha' => now()->toDateString(),
            'precio_total' => 20,
            'cargo_envio' => 0,
            'estado' => 'entregado',
        ]);

        $tracking = ShipmentTracking::create([
            'order_id' => $order->id,
            'agencia' => 'Melo Express',
            'fecha_envio' => now()->toDateString(),
            'fecha_limite_retiro' => now()->toDateString(),
        ]);

        $this->actingAs($admin)->patchJson(route('admin.envios.update', $tracking), [
            'agencia' => 'Otra agencia',
        ])->assertStatus(422)->assertJsonPath('locked', true);

        $this->actingAs($admin)->patchJson(route('admin.envios.update', $tracking), [
            'cliente_retiro' => true,
        ])->assertStatus(422)->assertJsonPath('locked', true);
    }
}
