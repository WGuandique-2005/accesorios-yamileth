<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard admin | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
@include('partials.admin_sidebar')

<main class="min-h-screen p-4 md:ml-64 md:p-8">
    <div class="mb-8">
        <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Dashboard</h1>
        <p class="mt-2 text-gray-600">Resumen del negocio para hoy, {{ now()->format('d/m/Y') }}.</p>
    </div>

    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-5">
        @foreach ([
            ['label' => 'Pedidos hoy', 'value' => $total_pedidos_hoy, 'icon' => 'today'],
            ['label' => 'Pendientes', 'value' => $pedidos_pendientes, 'icon' => 'pending_actions'],
            ['label' => 'Productos', 'value' => $total_productos, 'icon' => 'inventory_2'],
            ['label' => 'Sin stock', 'value' => $productos_sin_stock, 'icon' => 'production_quantity_limits'],
            ['label' => 'Ganancias mes', 'value' => '$'.number_format($ganancias_mes, 2), 'icon' => 'payments'],
        ] as $card)
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <span class="material-symbols-outlined text-[#8A486F]">{{ $card['icon'] }}</span>
                <p class="mt-3 text-sm text-gray-500">{{ $card['label'] }}</p>
                <p class="text-2xl font-bold text-[#8A486F]">{{ $card['value'] }}</p>
            </div>
        @endforeach
    </section>

    <section class="mt-8 grid gap-6 lg:grid-cols-[1fr_420px]">
        <div class="rounded-xl bg-white p-6 shadow-sm">
            <h2 class="text-xl font-bold text-[#8A486F]">Pedidos últimos 7 días</h2>
            <div class="mt-6 flex h-64 items-end gap-3 border-b border-gray-200">
                @foreach ($chartData as $day)
                    @php $height = max(8, min(100, $day['total'] * 18)); @endphp
                    <div class="flex flex-1 flex-col items-center justify-end gap-2">
                        <span class="text-xs font-semibold">{{ $day['total'] }}</span>
                        <div class="w-full rounded-t-lg bg-[#8A486F]" style="height: {{ $height }}%"></div>
                        <span class="pb-2 text-xs text-gray-500">{{ $day['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="rounded-xl bg-white p-6 shadow-sm">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-xl font-bold text-[#8A486F]">Últimos pedidos</h2>
                <a href="{{ route('admin.pedidos.index') }}" class="text-sm font-semibold text-[#8A486F] hover:underline">Ver todos</a>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse ($ultimos_pedidos as $order)
                    <a href="{{ route('admin.pedidos.show', $order) }}" class="block py-3 hover:bg-[#FDF0F4]">
                        <div class="flex justify-between gap-3">
                            <div>
                                <p class="font-semibold">#{{ $order->id }} - {{ $order->user?->name }}</p>
                                <p class="text-sm text-gray-500">{{ $order->cantidad_total }} productos</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold">${{ number_format($order->precio_total, 2) }}</p>
                                <p class="text-sm text-gray-500">{{ $order->estado }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="py-8 text-center text-gray-500">No hay pedidos recientes.</p>
                @endforelse
            </div>
        </div>
    </section>
</main>
</body>
</html>
