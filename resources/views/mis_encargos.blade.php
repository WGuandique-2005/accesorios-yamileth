<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis encargos | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
@include('partials.navbar')

@php
    $badgeClasses = [
        'pendiente' => 'bg-yellow-100 text-yellow-800',
        'confirmado' => 'bg-blue-100 text-blue-800',
        'en_ruta' => 'bg-orange-100 text-orange-800',
        'entregado' => 'bg-green-100 text-green-800',
        'cancelado' => 'bg-red-100 text-red-800',
    ];
@endphp

<main class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Mis encargos</h1>
        <p class="mt-2 text-gray-600">Consulta el estado y detalle de tus pedidos.</p>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-lg bg-green-50 px-4 py-3 text-green-700">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="mb-6 rounded-lg bg-red-50 px-4 py-3 text-red-700">{{ session('error') }}</div>
    @endif

    @forelse ($orders as $order)
        <article class="mb-5 rounded-xl bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <h2 class="text-xl font-bold text-[#8A486F]">Encargo #{{ $order->id }}</h2>
                    <p class="text-sm text-gray-500">Fecha solicitada: {{ $order->fecha->format('d/m/Y') }}</p>
                </div>
                <span class="w-fit rounded-full px-3 py-1 text-sm font-bold {{ $badgeClasses[$order->estado] ?? 'bg-gray-100 text-gray-700' }}">
                    {{ str_replace('_', ' ', ucfirst($order->estado)) }}
                </span>
            </div>

            <div class="mt-5 divide-y divide-gray-100">
                @foreach ($order->orderItems as $item)
                    <div class="flex items-center justify-between gap-4 py-3">
                        <div class="flex items-center gap-3">
                            <img src="{{ $item->product?->imagen_ruta ? asset('storage/'.$item->product->imagen_ruta) : asset('images/logo.jpeg') }}" alt="{{ $item->product?->nombre ?? 'Producto' }}" class="h-12 w-12 rounded-lg object-cover">
                            <div>
                                <p class="font-semibold">{{ $item->product?->nombre ?? 'Producto no disponible' }}</p>
                                <p class="text-sm text-gray-500">Cantidad: {{ $item->cantidad }}</p>
                            </div>
                        </div>
                        <p class="font-semibold">${{ number_format($item->subtotal, 2) }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-5 grid gap-3 rounded-lg bg-[#FDF0F4] p-4 text-sm sm:grid-cols-3">
                <div><span class="block text-gray-500">Total</span><strong>${{ number_format($order->precio_total, 2) }}</strong></div>
                <div><span class="block text-gray-500">Tipo</span><strong>{{ $order->envio_o_entrega }}</strong></div>
                <div><span class="block text-gray-500">Despacho</span><strong>{{ $order->lugar_despacho ?: 'No especificado' }}</strong></div>
                <div class="sm:col-span-3"><span class="block text-gray-500">Recibir en</span><strong>{{ $order->lugar_de_recibir }}</strong></div>
            </div>
        </article>
    @empty
        <div class="rounded-xl bg-white p-12 text-center shadow-sm">
            <p class="text-2xl font-bold text-[#8A486F]">Aún no tienes encargos 🛍️</p>
            <a href="{{ route('home') }}" class="mt-5 inline-flex rounded-full bg-[#8A486F] px-6 py-3 font-semibold text-white">Ver productos</a>
        </div>
    @endforelse
</main>

@include('partials.footer')
</body>
</html>
