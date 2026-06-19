<?php

namespace Tests\Feature;

use App\Models\InvoiceItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\PurchaseInvoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceDiscountTest extends TestCase
{
    use RefreshDatabase;

    public function test_la_factura_actualiza_el_costo_efectivo_del_producto(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $product = Product::create([
            'nombre' => 'Set',
            'cantidad_stock' => 10,
            'precio_unitario' => 20,
            'precio_inversion' => 10,
            'descuento' => 0,
            'activo' => true,
        ]);

        $this->actingAs($admin)->post(route('admin.facturas.store'), [
            'numero_factura' => 'F-100',
            'fecha_compra' => now()->toDateString(),
            'descuento_temu' => 6,
            'items' => [
                [
                    'product_id' => $product->id,
                    'nombre_producto' => 'Set',
                    'cantidad' => 2,
                    'precio_unitario_temu' => 10,
                ],
            ],
        ])->assertRedirect(route('admin.facturas.index'));

        $product->refresh();

        $this->assertSame('7.00', (string) $product->precio_inversion);

        $invoice = PurchaseInvoice::first();
        $this->assertNotNull($invoice);
        $this->assertSame('6.00', (string) $invoice->descuento_temu);
        $this->assertSame('6.00', (string) $invoice->descuento_por_producto);

        $item = InvoiceItem::first();
        $this->assertNotNull($item);
        $this->assertSame('20.00', (string) $item->subtotal);
    }

    public function test_dashboard_y_analitica_muestran_el_descuento_de_facturas(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        PurchaseInvoice::create([
            'numero_factura' => 'F-101',
            'fecha_compra' => now()->toDateString(),
            'total_inversion' => 20,
            'descuento_temu' => 8,
            'descuento_por_producto' => 8,
        ]);

        $this->actingAs($admin)->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Descuento facturas', false)
            ->assertSee('$8.00', false);

        $this->actingAs($admin)->get(route('admin.analitica'))
            ->assertOk()
            ->assertSee('Descuento facturas', false)
            ->assertSee('$8.00', false);
    }

    public function test_los_productos_ya_facturados_no_aparecen_en_nuevas_facturas(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $facturado = Product::create([
            'nombre' => 'Producto facturado',
            'cantidad_stock' => 10,
            'precio_unitario' => 20,
            'precio_inversion' => 10,
            'descuento' => 0,
            'activo' => true,
        ]);
        $disponible = Product::create([
            'nombre' => 'Producto disponible',
            'cantidad_stock' => 10,
            'precio_unitario' => 15,
            'precio_inversion' => 7,
            'descuento' => 0,
            'activo' => true,
        ]);

        PurchaseInvoice::create([
            'numero_factura' => 'F-102',
            'fecha_compra' => now()->toDateString(),
            'total_inversion' => 20,
            'descuento_temu' => 4,
            'descuento_por_producto' => 4,
        ]);
        InvoiceItem::create([
            'invoice_id' => PurchaseInvoice::first()->id,
            'product_id' => $facturado->id,
            'nombre_producto' => $facturado->nombre,
            'cantidad' => 2,
            'precio_unitario_temu' => 10,
            'subtotal' => 20,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.facturas.create'));

        $response->assertOk();
        $response->assertDontSee('Producto facturado', false);
        $response->assertSee('Producto disponible', false);
    }

    public function test_no_se_puede_repetir_el_mismo_producto_en_la_misma_factura(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $product = Product::create([
            'nombre' => 'Producto unico',
            'cantidad_stock' => 10,
            'precio_unitario' => 20,
            'precio_inversion' => 10,
            'descuento' => 0,
            'activo' => true,
        ]);

        $response = $this->actingAs($admin)->post(route('admin.facturas.store'), [
            'numero_factura' => 'F-103',
            'fecha_compra' => now()->toDateString(),
            'descuento_temu' => 5,
            'items' => [
                [
                    'product_id' => $product->id,
                    'nombre_producto' => 'Producto unico',
                    'cantidad' => 1,
                    'precio_unitario_temu' => 10,
                ],
                [
                    'product_id' => $product->id,
                    'nombre_producto' => 'Producto unico',
                    'cantidad' => 2,
                    'precio_unitario_temu' => 10,
                ],
            ],
        ]);

        $response->assertSessionHasErrors('items');
        $this->assertDatabaseCount('purchase_invoices', 0);
        $this->assertDatabaseCount('invoice_items', 0);
    }

    public function test_la_factura_muestra_el_total_despues_del_descuento(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $invoice = PurchaseInvoice::create([
            'numero_factura' => 'F-104',
            'fecha_compra' => now()->toDateString(),
            'total_inversion' => 100,
            'descuento_temu' => 20,
            'descuento_por_producto' => 20,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.facturas.show', $invoice->id));

        $response->assertOk();
        $response->assertSee('Total después del descuento', false);
        $response->assertSee('$80.00', false);
    }
}
