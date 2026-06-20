<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $products = Product::activos()->enStock()->with(['productImages', 'batches'])->orderBy('nombre')->get();
        $selectedProduct = null;

        if ($request->filled('producto')) {
            $selectedProduct = Product::activos()->enStock()->with(['productImages', 'batches'])->find($request->integer('producto'));
        }

        return view('formulario_encargo', compact('products', 'selectedProduct'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'productos' => ['required', 'array', 'min:1'],
            'productos.*.id' => ['required', 'integer', 'exists:products,id'],
            'productos.*.cantidad' => ['required', 'integer', 'min:1'],
            'envio_o_entrega' => ['required', Rule::in(['Envío', 'Entrega'])],
            'lugar_de_recibir' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date', 'after_or_equal:today'],
            'lugar_despacho' => ['nullable', 'string', 'max:100'],
            'hora_recordatorio' => ['nullable', 'date_format:H:i'],
            'notas' => ['nullable', 'string', 'max:500'],
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $items = collect($validated['productos'])
                    ->groupBy('id')
                    ->map(fn ($rows, $id) => [
                        'id' => (int) $id,
                        'cantidad' => (int) $rows->sum('cantidad'),
                    ])
                    ->values();

                $products = Product::whereIn('id', $items->pluck('id'))
                    ->lockForUpdate()
                    ->get()
                    ->keyBy('id');

                $preparedItems = [];
                $precioTotal = 0;

                foreach ($items as $item) {
                    $product = $products->get($item['id']);

                    if (! $product || ! $product->activo) {
                        throw ValidationException::withMessages([
                            'productos' => 'No se pudo procesar '.($product?->nombre ?? 'el producto seleccionado').'.',
                        ]);
                    }

                    if ($item['cantidad'] > $product->stock_publico_disponible) {
                        throw ValidationException::withMessages([
                            'productos' => "Solo hay {$product->stock_publico_disponible} unidades disponibles del lote actual de {$product->nombre}.",
                        ]);
                    }

                    $consumo = $product->consumirStockFifo($item['cantidad']);
                    $descuento = (float) $product->descuento;
                    $preparedItems[] = [
                        'product' => $product,
                        'consumo' => $consumo,
                        'descuento' => $descuento,
                    ];

                    foreach ($consumo as $lote) {
                        $precioTotal += (($lote['venta'] - $descuento) * $lote['cantidad']);
                    }
                }

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'envio_o_entrega' => $validated['envio_o_entrega'],
                    'lugar_despacho' => $validated['lugar_despacho'] ?? null,
                    'lugar_de_recibir' => $validated['lugar_de_recibir'],
                    'fecha' => $validated['fecha'],
                    'precio_total' => $precioTotal,
                    'estado' => 'pendiente',
                    'hora_recordatorio' => $validated['hora_recordatorio'] ?? null,
                    'notas' => $validated['notas'] ?? null,
                ]);

                foreach ($preparedItems as $prepared) {
                    /** @var \App\Models\Product $product */
                    $product = $prepared['product'];
                    $descuento = $prepared['descuento'];

                    foreach ($prepared['consumo'] as $lote) {
                        $order->orderItems()->create([
                            'product_id' => $product->id,
                            'product_batch_id' => $lote['batch_id'],
                            'cantidad' => $lote['cantidad'],
                            'precio_unitario' => $lote['venta'],
                            'descuento_aplicado' => $descuento,
                            'precio_inversion_aplicado' => $lote['costo'],
                        ]);
                    }
                }
            });
        } catch (ValidationException $exception) {
            return back()->withInput()->withErrors($exception->errors());
        } catch (\Exception $exception) {
            if (str_contains($exception->getMessage(), 'Stock insuficiente')) {
                return back()->withInput()->with('error', $exception->getMessage());
            }

            report($exception);

            return back()->withInput()->with('error', 'No se pudo guardar el encargo. Intenta de nuevo.');
        } catch (\Throwable $exception) {
            report($exception);

            return back()->withInput()->with('error', 'No se pudo guardar el encargo. Intenta de nuevo.');
        }

        return redirect('/mis-encargos')->with('success', '¡Encargo realizado con éxito! 🎉');
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('orderItems.product.productImages', 'orderItems.productBatch', 'orderItems.review')
            ->latest()
            ->get();

        return view('mis_encargos', compact('orders'));
    }
}
