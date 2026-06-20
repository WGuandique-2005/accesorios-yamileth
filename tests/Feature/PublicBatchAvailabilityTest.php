<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicBatchAvailabilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_el_formulario_muestra_solo_el_lote_activo_disponible(): void
    {
        $user = User::factory()->create(['rol' => 'cliente']);
        $product = Product::create([
            'nombre' => 'Vestido Blanco',
            'cantidad_stock' => 0,
            'precio_unitario' => 0,
            'precio_inversion' => 0,
            'descuento' => 0,
            'activo' => true,
        ]);

        $product->agregarLote(6, 10, null, 18);
        $product->agregarLote(4, 12, null, 22);

        $response = $this->actingAs($user)->get(route('encargos.create', ['producto' => $product->id]));

        $response->assertOk();
        $response->assertSee('Vestido Blanco', false);
        $response->assertSee('$18.00', false);
        $response->assertSee('6 disp.', false);
        $response->assertDontSee('$22.00', false);
    }

    public function test_no_permite_pedir_mas_que_el_stock_del_lote_activo_y_luego_avanza_al_siguiente(): void
    {
        $user = User::factory()->create(['rol' => 'cliente']);
        $product = Product::create([
            'nombre' => 'Vestido Blanco',
            'cantidad_stock' => 0,
            'precio_unitario' => 0,
            'precio_inversion' => 0,
            'descuento' => 0,
            'activo' => true,
        ]);

        $firstBatch = $product->agregarLote(6, 10, null, 18);
        $secondBatch = $product->agregarLote(4, 12, null, 22);

        $this->actingAs($user)->post(route('encargos.store'), [
            'productos' => [
                ['id' => $product->id, 'cantidad' => 7],
            ],
            'envio_o_entrega' => 'Entrega',
            'lugar_de_recibir' => 'Casa',
            'fecha' => now()->toDateString(),
        ])->assertSessionHasErrors('productos');

        $firstBatch->refresh();
        $secondBatch->refresh();
        $product->refresh();

        $this->assertSame(6, $firstBatch->cantidad_disponible);
        $this->assertSame(4, $secondBatch->cantidad_disponible);
        $this->assertSame(10, $product->cantidad_stock);

        $this->actingAs($user)->post(route('encargos.store'), [
            'productos' => [
                ['id' => $product->id, 'cantidad' => 6],
            ],
            'envio_o_entrega' => 'Entrega',
            'lugar_de_recibir' => 'Casa',
            'fecha' => now()->toDateString(),
        ])->assertRedirect('/mis-encargos');

        $response = $this->actingAs($user)->get(route('encargos.create', ['producto' => $product->id]));

        $response->assertOk();
        $response->assertSee('Vestido Blanco', false);
        $response->assertSee('$22.00', false);
        $response->assertSee('4 disp.', false);
        $response->assertDontSee('6 disp.', false);
    }
}
