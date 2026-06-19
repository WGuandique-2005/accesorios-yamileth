<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WhatsAppReminderTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_puede_generar_recordatorio_de_whatsapp_para_pedido_en_ruta(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $customer = User::factory()->create([
            'rol' => 'cliente',
            'numero_contacto' => '+503 7123-4567',
        ]);
        $product = Product::create([
            'nombre' => 'Collar',
            'cantidad_stock' => 10,
            'precio_unitario' => 25,
            'precio_inversion' => 10,
            'descuento' => 0,
            'activo' => true,
        ]);
        $order = Order::create([
            'user_id' => $customer->id,
            'envio_o_entrega' => 'Entrega',
            'lugar_despacho' => 'Sucursal central',
            'lugar_de_recibir' => 'Casa',
            'fecha' => now()->toDateString(),
            'hora_recordatorio' => '10:30',
            'precio_total' => 25,
            'cargo_envio' => 2.50,
            'estado' => 'en_ruta',
        ]);
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'cantidad' => 1,
            'precio_unitario' => 25,
            'descuento_aplicado' => 0,
            'precio_inversion_aplicado' => 10,
        ]);

        $order->load(['user', 'orderItems.product']);

        $url = $order->whatsappRecordatorioUrl();

        $this->assertNotNull($url);
        $this->assertStringContainsString('https://wa.me/50371234567?text=', $url);
        $this->assertStringContainsString('ya fue enviado', $order->whatsappRecordatorioMensaje());
        $this->assertStringContainsString('Collar x 1', $order->whatsappRecordatorioMensaje());

        $response = $this->actingAs($admin)->get(route('admin.pedidos.show', $order));

        $response->assertOk();
        $response->assertSee('Enviar recordatorio por WhatsApp', false);
        $response->assertSee('wa.me/50371234567', false);
    }

    public function test_no_se_muestra_recordatorio_cuando_el_pedido_ya_esta_entregado(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $customer = User::factory()->create([
            'rol' => 'cliente',
            'numero_contacto' => '+503 7123-4567',
        ]);
        $product = Product::create([
            'nombre' => 'Collar',
            'cantidad_stock' => 10,
            'precio_unitario' => 25,
            'precio_inversion' => 10,
            'descuento' => 0,
            'activo' => true,
        ]);
        $order = Order::create([
            'user_id' => $customer->id,
            'envio_o_entrega' => 'Entrega',
            'lugar_despacho' => 'Sucursal central',
            'lugar_de_recibir' => 'Casa',
            'fecha' => now()->toDateString(),
            'hora_recordatorio' => '10:30',
            'precio_total' => 25,
            'cargo_envio' => 2.50,
            'estado' => 'entregado',
        ]);
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'cantidad' => 1,
            'precio_unitario' => 25,
            'descuento_aplicado' => 0,
            'precio_inversion_aplicado' => 10,
        ]);

        $order->load(['user', 'orderItems.product', 'shipmentTracking']);

        $this->assertNull($order->whatsappRecordatorioUrl());
        $this->assertFalse($order->puedeEnviarRecordatorioWhatsapp());

        $response = $this->actingAs($admin)->get(route('admin.pedidos.show', $order));

        $response->assertOk();
        $response->assertDontSee('Enviar recordatorio por WhatsApp', false);
        $response->assertSee('Este pedido ya está cerrado', false);
    }
}
