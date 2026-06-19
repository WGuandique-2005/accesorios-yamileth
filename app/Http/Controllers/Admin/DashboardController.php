<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PurchaseInvoice;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();
        $lowStockThreshold = 5;

        $total_pedidos_hoy = Order::whereDate('created_at', today())->count();
        $pedidos_pendientes = Order::where('estado', 'pendiente')->count();
        $total_productos = Product::count();
        $productos_sin_stock = Product::where('cantidad_stock', 0)->count();
        $productos_bajo_stock = Product::where('cantidad_stock', '>', 0)
            ->where('cantidad_stock', '<', $lowStockThreshold)
            ->orderBy('cantidad_stock')
            ->take(6)
            ->get();
        $reseñas_recientes = Review::with(['user', 'product'])
            ->latest()
            ->take(4)
            ->get();
        $descuentos_facturas_mes = PurchaseInvoice::whereBetween('fecha_compra', [$startOfMonth->toDateString(), $endOfMonth->toDateString()])
            ->sum('descuento_temu');

        $balance_mes = OrderItem::query()
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->whereBetween('orders.created_at', [$startOfMonth, $endOfMonth])
            ->selectRaw('COALESCE(SUM((order_items.precio_unitario - order_items.descuento_aplicado) * order_items.cantidad), 0) as ventas_mes')
            ->selectRaw('COALESCE(SUM((COALESCE(NULLIF(order_items.precio_inversion_aplicado, 0), products.precio_inversion)) * order_items.cantidad), 0) as inversion_mes')
            ->selectRaw('COALESCE(SUM(((order_items.precio_unitario - order_items.descuento_aplicado) - COALESCE(NULLIF(order_items.precio_inversion_aplicado, 0), products.precio_inversion)) * order_items.cantidad), 0) as ganancias_mes')
            ->first();

        $ventas_mes = (float) ($balance_mes->ventas_mes ?? 0);
        $inversion_mes = (float) ($balance_mes->inversion_mes ?? 0);
        $ganancias_mes = (float) ($balance_mes->ganancias_mes ?? 0);

        $ultimos_pedidos = Order::with(['user', 'orderItems.product'])
            ->latest()
            ->take(5)
            ->get();

        $period = CarbonPeriod::create(now()->subDays(6)->startOfDay(), now()->startOfDay());
        $counts = Order::selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->whereDate('created_at', '>=', now()->subDays(6)->toDateString())
            ->groupBy(DB::raw('DATE(created_at)'))
            ->pluck('total', 'day');

        $chartData = collect($period)->map(fn ($date) => [
            'label' => $date->format('d/m'),
            'total' => (int) ($counts[$date->toDateString()] ?? 0),
        ]);

        return view('admin.dashboard', compact(
            'total_pedidos_hoy',
            'pedidos_pendientes',
            'total_productos',
            'productos_sin_stock',
            'productos_bajo_stock',
            'lowStockThreshold',
            'ventas_mes',
            'inversion_mes',
            'ganancias_mes',
            'descuentos_facturas_mes',
            'ultimos_pedidos',
            'reseñas_recientes',
            'chartData',
        ));
    }
}
