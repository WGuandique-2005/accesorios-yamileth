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
        $products = Product::activos()->enStock()->orderBy('nombre')->get();
        $selectedProduct = null;

        if ($request->filled('producto')) {
            $selectedProduct = Product::activos()->enStock()->find($request->integer('producto'));
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

                $precioTotal = 0;

                foreach ($items as $item) {
                    $product = $products->get($item['id']);

                    if (! $product || ! $product->activo || $product->cantidad_stock < $item['cantidad']) {
                        throw ValidationException::withMessages([
                            'productos' => 'Stock insuficiente para '.($product?->nombre ?? 'el producto seleccionado'),
                        ]);
                    }

                    $precioTotal += ($product->precio_unitario - $product->descuento) * $item['cantidad'];
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

                foreach ($items as $item) {
                    $product = $products->get($item['id']);

                    $order->orderItems()->create([
                        'product_id' => $product->id,
                        'cantidad' => $item['cantidad'],
                        'precio_unitario' => $product->precio_unitario,
                        'descuento_aplicado' => $product->descuento,
                    ]);

                    $product->decrement('cantidad_stock', $item['cantidad']);
                }
            });
        } catch (ValidationException $exception) {
            return back()->withInput()->withErrors($exception->errors());
        } catch (\Throwable $exception) {
            report($exception);

            return back()->withInput()->with('error', 'No se pudo guardar el encargo. Intenta de nuevo.');
        }

        return redirect('/mis-encargos')->with('success', '¡Encargo realizado con éxito! 🎉');
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('orderItems.product')
            ->latest()
            ->get();

        return view('mis_encargos', compact('orders'));
    }
}
