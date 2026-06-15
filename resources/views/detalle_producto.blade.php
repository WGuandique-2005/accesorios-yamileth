<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->nombre }} | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
@include('partials.navbar')

<main class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">
    @if (session('error'))
        <div class="mb-6 rounded-lg bg-red-50 px-4 py-3 text-red-700">{{ session('error') }}</div>
    @endif

    <a href="{{ route('home') }}" class="mb-8 inline-flex text-sm font-semibold text-[#8A486F] hover:underline">Volver al catálogo</a>

    <section class="grid gap-10 lg:grid-cols-2 lg:items-start">
        <div class="overflow-hidden rounded-xl bg-white shadow-sm">
            <img src="{{ $product->imagen_ruta ? asset('storage/'.$product->imagen_ruta) : asset('images/logo.jpeg') }}" alt="{{ $product->nombre }}" class="aspect-square w-full object-cover">
        </div>

        <div class="rounded-xl bg-white p-6 shadow-sm sm:p-8">
            <p class="mb-3 text-sm font-semibold uppercase tracking-wide text-[#8A486F]">Stock disponible: {{ $product->cantidad_stock }}</p>
            <h1 class="font-serif text-4xl font-bold text-[#8A486F]">{{ $product->nombre }}</h1>

            <div class="mt-6 flex flex-wrap items-end gap-3">
                <span class="text-4xl font-bold text-[#8A486F]">${{ number_format($product->precio_final, 2) }}</span>
                @if ($product->descuento > 0)
                    <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700">Descuento de ${{ number_format($product->descuento, 2) }}</span>
                @endif
            </div>

            <dl class="mt-8 grid gap-4 sm:grid-cols-2">
                <div class="rounded-lg bg-[#FDF0F4] p-4">
                    <dt class="text-sm text-gray-500">Precio final</dt>
                    <dd class="text-lg font-semibold">${{ number_format($product->precio_final, 2) }}</dd>
                </div>
                <div class="rounded-lg bg-[#FDF0F4] p-4">
                    <dt class="text-sm text-gray-500">Stock</dt>
                    <dd class="text-lg font-semibold">{{ $product->cantidad_stock }} unidades</dd>
                </div>
            </dl>

            <a href="{{ route('encargos.create', ['producto' => $product->id]) }}" class="mt-8 inline-flex w-full items-center justify-center rounded-full bg-[#8A486F] px-6 py-4 text-lg font-bold text-white hover:bg-[#733b5c]">
                Hacer encargo
            </a>
        </div>
    </section>
</main>

@include('partials.footer')
</body>
</html>
