<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos admin | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
@include('partials.admin_sidebar')
@php
    $statuses = ['pendiente', 'confirmado', 'en_ruta', 'entregado', 'cancelado'];
    $badgeClasses = [
        'pendiente' => 'bg-yellow-100 text-yellow-800',
        'confirmado' => 'bg-blue-100 text-blue-800',
        'en_ruta' => 'bg-orange-100 text-orange-800',
        'entregado' => 'bg-green-100 text-green-800',
        'cancelado' => 'bg-red-100 text-red-800',
    ];
@endphp

<main class="min-h-screen p-4 md:ml-64 md:p-8">
    <div class="mb-8">
        <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Pedidos</h1>
        <p class="mt-2 text-gray-600">Consulta y actualiza el estado de los encargos.</p>
    </div>

    <div class="mb-5 flex flex-wrap gap-2">
        <a href="{{ route('admin.pedidos.index') }}" class="rounded-full px-4 py-2 text-sm font-bold {{ request('estado') ? 'border border-gray-300 text-gray-700' : 'bg-[#8A486F] text-white' }}">Todos</a>
        @foreach ($statuses as $status)
            <a href="{{ route('admin.pedidos.index', ['estado' => $status]) }}" class="rounded-full px-4 py-2 text-sm font-bold {{ request('estado') === $status ? 'bg-[#8A486F] text-white' : 'border border-gray-300 text-gray-700' }}">{{ str_replace('_', ' ', ucfirst($status)) }}</a>
        @endforeach
    </div>

    <section class="grid gap-6 xl:grid-cols-[1fr_420px]">
        <div class="overflow-hidden rounded-xl bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[980px] text-left text-sm">
                    <thead class="bg-[#FDF0F4] text-gray-600">
                        <tr>
                            <th class="p-4">Pedido</th>
                            <th class="p-4">Cliente</th>
                            <th class="p-4">Productos</th>
                            <th class="p-4">Total</th>
                            <th class="p-4">Entrega</th>
                            <th class="p-4">Fecha</th>
                            <th class="p-4">Estado</th>
                            <th class="p-4 text-right">Detalle</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($orders as $order)
                            <tr>
                                <td class="p-4 font-bold">#{{ $order->id }}</td>
                                <td class="p-4">
                                    <p class="font-semibold">{{ $order->user?->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $order->user?->email }}</p>
                                </td>
                                <td class="p-4">{{ $order->cantidad_total }} productos</td>
                                <td class="p-4 font-bold text-[#8A486F]">${{ number_format($order->precio_total, 2) }}</td>
                                <td class="p-4">{{ $order->envio_o_entrega }}<p class="text-xs text-gray-500">{{ $order->lugar_despacho }}</p></td>
                                <td class="p-4">{{ $order->fecha->format('d/m/Y') }}</td>
                                <td class="p-4">
                                    <select data-status-url="{{ route('admin.pedidos.estado', $order) }}" class="status-select rounded-full border-0 px-3 py-1 text-xs font-bold {{ $badgeClasses[$order->estado] ?? 'bg-gray-100 text-gray-700' }}">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status }}" @selected($order->estado === $status)>{{ str_replace('_', ' ', ucfirst($status)) }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="p-4 text-right"><a href="{{ route('admin.pedidos.show', $order) }}" class="font-semibold text-[#8A486F] hover:underline">Ver</a></td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="p-8 text-center text-gray-500">No hay pedidos.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="border-t p-4">{{ $orders->links() }}</div>
        </div>

        <aside class="h-fit rounded-xl bg-white p-6 shadow-sm">
            @if ($selectedOrder)
                <h2 class="text-xl font-bold text-[#8A486F]">Pedido #{{ $selectedOrder->id }}</h2>
                <div class="mt-4 space-y-2 text-sm">
                    <p><strong>Cliente:</strong> {{ $selectedOrder->user?->name }} ({{ $selectedOrder->user?->email }})</p>
                    <p><strong>Contacto:</strong> {{ $selectedOrder->user?->numero_contacto ?: 'No registrado' }}</p>
                    <p><strong>Tipo:</strong> {{ $selectedOrder->envio_o_entrega }}</p>
                    <p><strong>Despacho:</strong> {{ $selectedOrder->lugar_despacho ?: 'No especificado' }}</p>
                    <p><strong>Recibir:</strong> {{ $selectedOrder->lugar_de_recibir }}</p>
                    <p><strong>Fecha:</strong> {{ $selectedOrder->fecha->format('d/m/Y') }} {{ $selectedOrder->hora_recordatorio?->format('H:i') }}</p>
                    <p><strong>Notas:</strong> {{ $selectedOrder->notas ?: 'Sin notas' }}</p>
                </div>
                <div class="mt-5 divide-y divide-gray-100">
                    @foreach ($selectedOrder->orderItems as $item)
                        <div class="py-3">
                            <p class="font-semibold">{{ $item->product?->nombre ?? 'Producto no disponible' }}</p>
                            <p class="text-sm text-gray-500">{{ $item->cantidad }} x ${{ number_format($item->precio_unitario - $item->descuento_aplicado, 2) }} = ${{ number_format($item->subtotal, 2) }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5 rounded-lg bg-[#FDF0F4] p-4">
                    <div class="flex justify-between"><span>Total</span><strong>${{ number_format($selectedOrder->precio_total, 2) }}</strong></div>
                    <div class="mt-2 flex justify-between"><span>Ganancia</span><strong class="text-green-700">${{ number_format($selectedOrder->ganancia_total, 2) }}</strong></div>
                </div>
            @else
                <p class="text-gray-500">Selecciona un pedido para ver el detalle completo.</p>
            @endif
        </aside>
    </section>
</main>

<script>
    const statusClasses = {
        pendiente: 'bg-yellow-100 text-yellow-800',
        confirmado: 'bg-blue-100 text-blue-800',
        en_ruta: 'bg-orange-100 text-orange-800',
        entregado: 'bg-green-100 text-green-800',
        cancelado: 'bg-red-100 text-red-800',
    };

    document.querySelectorAll('.status-select').forEach(select => {
        select.addEventListener('change', async () => {
            const response = await fetch(select.dataset.statusUrl, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({estado: select.value}),
            });
            const data = await response.json();
            if (data.success) {
                select.className = 'status-select rounded-full border-0 px-3 py-1 text-xs font-bold ' + statusClasses[data.estado];
            }
        });
    });
</script>
</body>
</html>
