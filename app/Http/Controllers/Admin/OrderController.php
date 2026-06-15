<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['user', 'orderItems.product'])->latest();

        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        $orders = $query->paginate(15)->withQueryString();
        $selectedOrder = null;

        return view('admin.pedidos', compact('orders', 'selectedOrder'));
    }

    public function show(int $id)
    {
        $orders = Order::with(['user', 'orderItems.product'])
            ->latest()
            ->paginate(15);
        $selectedOrder = Order::with(['user', 'orderItems.product'])->findOrFail($id);

        return view('admin.pedidos', compact('orders', 'selectedOrder'));
    }

    public function updateEstado(Request $request, int $id)
    {
        $validated = $request->validate([
            'estado' => ['required', Rule::in(['pendiente', 'confirmado', 'en_ruta', 'entregado', 'cancelado'])],
        ]);

        $order = Order::findOrFail($id);
        $order->update(['estado' => $validated['estado']]);

        return response()->json([
            'success' => true,
            'estado' => $order->estado,
        ]);
    }

    public function updateEnvio(Request $request, int $id)
    {
        $validated = $request->validate([
            'envio_o_entrega' => ['required', Rule::in(['Envío', 'Entrega'])],
            'lugar_despacho' => ['nullable', 'string', 'max:100'],
            'lugar_de_recibir' => ['required', 'string', 'max:255'],
            'cargo_envio' => ['required', 'numeric', 'min:0'],
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'envio_o_entrega' => $validated['envio_o_entrega'],
            'lugar_despacho' => $validated['lugar_despacho'] ?? null,
            'lugar_de_recibir' => $validated['lugar_de_recibir'],
            'cargo_envio' => $validated['cargo_envio'],
        ]);

        return redirect()
            ->route('admin.pedidos.show', $order)
            ->with('success', 'Datos de envío actualizados correctamente.');
    }
}
