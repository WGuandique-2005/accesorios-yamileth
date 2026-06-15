<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes admin | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
@include('partials.admin_sidebar')

<main class="min-h-screen p-4 md:ml-64 md:p-8">
    <div class="mb-8">
        <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Clientes</h1>
        <p class="mt-2 text-gray-600">Historial, contacto y actividad de compra.</p>
    </div>

    @if (session('success'))
        <div class="mb-5 rounded-lg bg-green-50 px-4 py-3 text-green-700">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="mb-5 rounded-lg bg-red-50 px-4 py-3 text-red-700">{{ session('error') }}</div>
    @endif

    <section class="grid gap-6 xl:grid-cols-[1fr_420px]">
        <div class="overflow-hidden rounded-xl bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px] text-left text-sm">
                    <thead class="bg-[#FDF0F4] text-gray-600">
                        <tr>
                            <th class="p-4">Cliente</th>
                            <th class="p-4">Contacto</th>
                            <th class="p-4">Registro</th>
                            <th class="p-4">Pedidos</th>
                            <th class="p-4">Comprado</th>
                            <th class="p-4 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($clients as $client)
                            <tr>
                                <td class="p-4 font-semibold">{{ $client->name }}</td>
                                <td class="p-4">
                                    <p>{{ $client->email }}</p>
                                    <p class="text-xs text-gray-500">{{ $client->numero_contacto ?: 'Sin teléfono' }}</p>
                                </td>
                                <td class="p-4">{{ $client->created_at->format('d/m/Y') }}</td>
                                <td class="p-4">{{ $client->orders_count }}</td>
                                <td class="p-4 font-bold text-[#8A486F]">${{ number_format($client->total_comprado ?? 0, 2) }}</td>
                                <td class="p-4 text-right">
                                    <a href="{{ route('admin.clientes.show', $client) }}" class="font-semibold text-[#8A486F] hover:underline">Historial</a>
                                    @if ($client->orders_count === 0)
                                        <form method="POST" action="{{ route('admin.clientes.destroy', $client) }}" class="inline" onsubmit="return confirm('¿Eliminar este cliente?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="ml-3 font-semibold text-red-600 hover:underline">Eliminar</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="p-8 text-center text-gray-500">No hay clientes registrados.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="border-t p-4">{{ $clients->links() }}</div>
        </div>

        <aside class="h-fit rounded-xl bg-white p-6 shadow-sm">
            @if ($selectedClient)
                <h2 class="text-xl font-bold text-[#8A486F]">{{ $selectedClient->name }}</h2>
                <p class="mt-1 text-sm text-gray-600">{{ $selectedClient->email }}</p>
                <div class="mt-5 grid grid-cols-2 gap-3">
                    <div class="rounded-lg bg-[#FDF0F4] p-4">
                        <p class="text-xs text-gray-500">Pedidos</p>
                        <p class="text-xl font-bold">{{ $selectedClient->orders_count }}</p>
                    </div>
                    <div class="rounded-lg bg-[#FDF0F4] p-4">
                        <p class="text-xs text-gray-500">Total</p>
                        <p class="text-xl font-bold">${{ number_format($selectedClient->total_comprado ?? 0, 2) }}</p>
                    </div>
                </div>
                <h3 class="mt-6 font-bold text-[#8A486F]">Historial</h3>
                <div class="mt-3 divide-y divide-gray-100">
                    @forelse ($selectedClient->orders as $order)
                        <a href="{{ route('admin.pedidos.show', $order) }}" class="block py-3">
                            <div class="flex justify-between">
                                <div>
                                    <p class="font-semibold">Pedido #{{ $order->id }}</p>
                                    <p class="text-xs text-gray-500">{{ $order->fecha->format('d/m/Y') }} - {{ $order->estado }}</p>
                                </div>
                                <p class="font-bold">${{ number_format($order->precio_total, 2) }}</p>
                            </div>
                        </a>
                    @empty
                        <p class="py-6 text-center text-gray-500">Este cliente aún no tiene pedidos.</p>
                    @endforelse
                </div>
            @else
                <p class="text-gray-500">Selecciona un cliente para ver su historial.</p>
            @endif
        </aside>
    </section>
</main>
</body>
</html>
