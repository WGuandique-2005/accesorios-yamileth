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

    public function test_la_factura_no_modifica_stock_y_referencia_el_lote_existente(): void
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

        $batch = $product->agregarLote(2, 10);
        $stockAntes = $product->fresh()->cantidad_stock;
        $costoAntes = (string) $product->fresh()->precio_inversion;

        $this->actingAs($admin)->post(route('admin.facturas.store'), [
            'numero_factura' => 'F-100',
            'fecha_compra' => now()->toDateString(),
            'descuento_temu' => 6,
            'items' => [
                [
                    'product_id' => $product->id,
                    'product_batch_id' => $batch->id,
                    'nombre_producto' => 'Set',
                    'cantidad' => 2,
                    'precio_unitario_temu' => 10,
                ],
            ],
        ])->assertRedirect(route('admin.facturas.index'));

        $product->refresh();

        $this->assertSame($stockAntes, $product->cantidad_stock);
        $this->assertSame($costoAntes, (string) $product->precio_inversion);

        $invoice = PurchaseInvoice::first();
        $this->assertNotNull($invoice);
        $this->assertSame('6.00', (string) $invoice->descuento_temu);
        $this->assertSame('3.00', (string) $invoice->descuento_por_producto);

        $item = InvoiceItem::first();
        $this->assertNotNull($item);
        $this->assertSame('20.00', (string) $item->subtotal);
        $this->assertSame($batch->id, $item->product_batch_id);

        $batch->refresh();
        $this->assertSame($item->id, $batch->invoice_item_id);
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

    public function test_el_formulario_de_factura_muestra_productos_y_lotes_disponibles(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $product = Product::create([
            'nombre' => 'Producto loteado',
            'cantidad_stock' => 10,
            'precio_unitario' => 20,
            'precio_inversion' => 10,
            'descuento' => 0,
            'activo' => true,
        ]);
        $product->agregarLote(3, 7.5);

        $response = $this->actingAs($admin)->get(route('admin.facturas.create'));

        $response->assertOk();
        $response->assertSee('Producto loteado', false);
        $response->assertSee('data-product-batch-select', false);
        $response->assertSee('Costo unitario', false);
    }

    public function test_el_formulario_de_factura_oculta_productos_que_ya_no_tienen_lotes_disponibles(): void
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
        $batchFacturado = $facturado->agregarLote(2, 10);
        $invoice = PurchaseInvoice::create([
            'numero_factura' => 'F-300',
            'fecha_compra' => now()->toDateString(),
            'total_inversion' => 20,
            'descuento_temu' => 0,
            'descuento_por_producto' => 0,
        ]);
        $invoiceItem = InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'product_id' => $facturado->id,
            'product_batch_id' => $batchFacturado->id,
            'nombre_producto' => 'Producto facturado',
            'cantidad' => 2,
            'precio_unitario_temu' => 10,
            'subtotal' => 20,
        ]);

        $disponible = Product::create([
            'nombre' => 'Producto disponible',
            'cantidad_stock' => 10,
            'precio_unitario' => 20,
            'precio_inversion' => 10,
            'descuento' => 0,
            'activo' => true,
        ]);
        $disponible->agregarLote(3, 7.5);

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
        $batch = $product->agregarLote(1, 10);

        $response = $this->actingAs($admin)->post(route('admin.facturas.store'), [
            'numero_factura' => 'F-103',
            'fecha_compra' => now()->toDateString(),
            'descuento_temu' => 5,
            'items' => [
                [
                    'product_id' => $product->id,
                    'product_batch_id' => $batch->id,
                    'nombre_producto' => 'Producto unico',
                    'cantidad' => 1,
                    'precio_unitario_temu' => 10,
                ],
                [
                    'product_id' => $product->id,
                    'product_batch_id' => $batch->id,
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

    public function test_no_se_puede_facturar_un_lote_ya_facturado(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $product = Product::create([
            'nombre' => 'Producto bloqueado',
            'cantidad_stock' => 10,
            'precio_unitario' => 20,
            'precio_inversion' => 10,
            'descuento' => 0,
            'activo' => true,
        ]);
        $batch = $product->agregarLote(1, 10);

        $invoice = PurchaseInvoice::create([
            'numero_factura' => 'F-1040',
            'fecha_compra' => now()->toDateString(),
            'total_inversion' => 10,
            'descuento_temu' => 0,
            'descuento_por_producto' => 0,
        ]);
        $invoiceItem = InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'product_id' => $product->id,
            'product_batch_id' => $batch->id,
            'nombre_producto' => 'Producto bloqueado',
            'cantidad' => 1,
            'precio_unitario_temu' => 10,
            'subtotal' => 10,
        ]);

        $response = $this->actingAs($admin)->post(route('admin.facturas.store'), [
            'numero_factura' => 'F-1041',
            'fecha_compra' => now()->toDateString(),
            'descuento_temu' => 0,
            'items' => [
                [
                    'product_id' => $product->id,
                    'product_batch_id' => $batch->id,
                    'nombre_producto' => 'Producto bloqueado',
                    'cantidad' => 1,
                    'precio_unitario_temu' => 10,
                ],
            ],
        ]);

        $response->assertSessionHasErrors('items.0.product_batch_id');
        $this->assertDatabaseCount('purchase_invoices', 1);
        $this->assertDatabaseCount('invoice_items', 1);
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

    public function test_la_factura_muestra_la_cantidad_total_de_productos(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $invoice = PurchaseInvoice::create([
            'numero_factura' => 'F-105',
            'fecha_compra' => now()->toDateString(),
            'total_inversion' => 90,
            'descuento_temu' => 9,
            'descuento_por_producto' => 3,
        ]);

        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'product_id' => null,
            'nombre_producto' => 'Lote',
            'cantidad' => 3,
            'precio_unitario_temu' => 30,
            'subtotal' => 90,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.facturas.show', $invoice->id));

        $response->assertOk();
        $response->assertSee('Cantidad total', false);
        $response->assertSee('3', false);
    }

    public function test_el_formulario_de_factura_muestra_precio_total_por_producto(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);
        $product = Product::create([
            'nombre' => 'Producto total',
            'cantidad_stock' => 4,
            'precio_unitario' => 20,
            'precio_inversion' => 7.5,
            'descuento' => 0,
            'activo' => true,
        ]);
        $product->agregarLote(4, 7.5);

        $response = $this->actingAs($admin)->get(route('admin.facturas.create'));

        $response->assertOk();
        $response->assertSee('Costo unitario', false);
        $response->assertSee('Producto total', false);
        $response->assertSee('data-product-card', false);
        $response->assertDontSee('Precio total', false);
    }

    public function test_la_lista_de_facturas_muestra_el_total_neto_con_descuentos_incluidos(): void
    {
        $admin = User::factory()->create(['rol' => 'admin']);

        PurchaseInvoice::create([
            'numero_factura' => 'F-200',
            'fecha_compra' => now()->toDateString(),
            'total_inversion' => 120,
            'descuento_temu' => 15,
            'descuento_por_producto' => 5,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.facturas.index'));

        $response->assertOk();
        $response->assertSee('Total neto', false);
        $response->assertSee('$105.00', false);
    }
}
