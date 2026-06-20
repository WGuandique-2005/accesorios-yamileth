<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ShipmentTracking;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index(Request $request)
    {
        $query = ShipmentTracking::with(['order.user'])->latest('fecha_envio')->latest('id');

        if ($request->filled('pedido')) {
            $query->where('order_id', $request->integer('pedido'));
        }

        $shipments = $query->paginate(12)->withQueryString();

        return view('admin.envios', compact('shipments'));
    }

    public function store(Request $request, int $order_id)
    {
        $order = Order::with('shipmentTracking')->findOrFail($order_id);

        if ($order->shipmentTracking) {
            return back()->with('success', 'Ese pedido ya tiene seguimiento registrado.');
        }

        if (in_array($order->estado, ['entregado', 'cancelado'], true)) {
            return back()->with('error', 'Este pedido ya está cerrado y no se puede registrar un envío.');
        }

        $data = $request->validate([
            'agencia' => ['required', 'string', 'max:255'],
            'fecha_envio' => ['required', 'date'],
            'notas_envio' => ['nullable', 'string'],
        ]);

        ShipmentTracking::create([
            'order_id' => $order->id,
            'agencia' => $data['agencia'],
            'fecha_envio' => $data['fecha_envio'],
            'fecha_limite_retiro' => ShipmentTracking::calcularFechaLimiteRetiro($data['fecha_envio']),
            'notas_envio' => $data['notas_envio'] ?? null,
        ]);

        return back()->with('success', 'Envío registrado correctamente.');
    }

    public function update(Request $request, int $id)
    {
        $tracking = ShipmentTracking::with('order')->findOrFail($id);

        if ($tracking->isLockedForAdminUpdates()) {
            $message = 'Este envío ya fue cobrado y no se puede modificar.';

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $message,
                    'locked' => true,
                ], 422);
            }

            return back()->with('error', $message);
        }

        $request->validate([
            'agencia' => ['nullable', 'string', 'max:255'],
            'cliente_retiro' => ['nullable', 'boolean'],
            'admin_cobro' => ['nullable', 'boolean'],
        ]);

        if ($request->has('agencia')) {
            $tracking->agencia = trim((string) $request->input('agencia'));
        }

        if ($request->has('cliente_retiro')) {
            $clienteRetiro = $request->boolean('cliente_retiro');
            $tracking->cliente_retiro = $clienteRetiro;
            $tracking->fecha_retiro_real = $clienteRetiro
                ? ($tracking->fecha_retiro_real ?? now()->toDateString())
                : null;
        }

        if ($request->has('admin_cobro')) {
            $adminCobro = $request->boolean('admin_cobro');

            if ($adminCobro && ! $tracking->cliente_retiro) {
                $message = 'Primero debes confirmar que el cliente retiró el pedido antes de marcarlo como cobrado.';

                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => $message,
                        'locked' => false,
                    ], 422);
                }

                return back()->with('error', $message);
            }

            $tracking->admin_cobro = $adminCobro;
            $tracking->fecha_cobro = $adminCobro
                ? ($tracking->fecha_cobro ?? now()->toDateString())
                : null;
        }

        $tracking->save();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'agencia' => $tracking->agencia,
                'cliente_retiro' => $tracking->cliente_retiro,
                'admin_cobro' => $tracking->admin_cobro,
                'estado' => $tracking->estado_badge['label'],
                'badge_class' => $tracking->estado_badge['class'],
            ]);
        }

        return back()->with('success', 'Seguimiento actualizado correctamente.');
    }
}
