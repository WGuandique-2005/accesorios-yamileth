<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        $currentMonthStart = now()->startOfMonth();
        $currentMonthEnd = now()->endOfMonth();
        $previousMonthStart = now()->copy()->subMonthNoOverflow()->startOfMonth();
        $previousMonthEnd = now()->copy()->subMonthNoOverflow()->endOfMonth();

        $weeklyProfitChart = collect(CarbonPeriod::create(now()->copy()->subWeeks(7)->startOfWeek(), '1 week', now()->copy()->startOfWeek()))
            ->map(function (Carbon $weekStart) {
                $weekEnd = $weekStart->copy()->endOfWeek();
                $summary = $this->summaryForPeriod($weekStart, $weekEnd);

                return [
                    'label' => $weekStart->format('d/m'),
                    'value' => $summary['profit'],
                ];
            });

        $monthlyProfitChart = collect(CarbonPeriod::create(now()->copy()->subMonths(5)->startOfMonth(), '1 month', now()->copy()->startOfMonth()))
            ->map(function (Carbon $monthStart) {
                $monthEnd = $monthStart->copy()->endOfMonth();
                $summary = $this->summaryForPeriod($monthStart, $monthEnd);

                return [
                    'label' => $monthStart->format('m/Y'),
                    'value' => $summary['profit'],
                ];
            });

        $currentSummary = $this->summaryForPeriod($currentMonthStart, $currentMonthEnd);
        $previousSummary = $this->summaryForPeriod($previousMonthStart, $previousMonthEnd);

        $topProduct = OrderItem::query()
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->whereBetween('orders.created_at', [$currentMonthStart, $currentMonthEnd])
            ->groupBy('products.id', 'products.nombre')
            ->select('products.id', 'products.nombre')
            ->selectRaw('SUM(order_items.cantidad) as unidades')
            ->orderByDesc('unidades')
            ->first();

        $topClient = Order::query()
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->whereBetween('orders.created_at', [$currentMonthStart, $currentMonthEnd])
            ->groupBy('users.id', 'users.name')
            ->select('users.id', 'users.name')
            ->selectRaw('SUM(orders.precio_total) as total_comprado')
            ->selectRaw('COUNT(*) as pedidos')
            ->orderByDesc('total_comprado')
            ->first();

        return view('admin.analitica', [
            'weeklyProfitChart' => $weeklyProfitChart,
            'monthlyProfitChart' => $monthlyProfitChart,
            'currentSummary' => $currentSummary,
            'previousSummary' => $previousSummary,
            'topProduct' => $topProduct,
            'topClient' => $topClient,
        ]);
    }

    private function summaryForPeriod(Carbon $start, Carbon $end): array
    {
        $row = OrderItem::query()
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->whereBetween('orders.created_at', [$start, $end])
            ->selectRaw('COALESCE(SUM((order_items.precio_unitario - order_items.descuento_aplicado) * order_items.cantidad), 0) as revenue')
            ->selectRaw('COALESCE(SUM((COALESCE(NULLIF(order_items.precio_inversion_aplicado, 0), products.precio_inversion)) * order_items.cantidad), 0) as cost')
            ->selectRaw('COALESCE(SUM(((order_items.precio_unitario - order_items.descuento_aplicado) - COALESCE(NULLIF(order_items.precio_inversion_aplicado, 0), products.precio_inversion)) * order_items.cantidad), 0) as profit')
            ->first();

        return [
            'revenue' => (float) ($row->revenue ?? 0),
            'cost' => (float) ($row->cost ?? 0),
            'profit' => (float) ($row->profit ?? 0),
        ];
    }
}
