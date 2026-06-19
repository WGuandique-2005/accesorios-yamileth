<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas admin | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">
    @include('partials.theme')
</head>

<body class="bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
    @include('partials.admin_sidebar')

    <main class="admin-main">
        <div class="admin-page">
        <div class="mb-8 flex flex-col gap-3 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Reseñas</h1>
                <p class="mt-2 text-gray-600">Aquí ves los comentarios y calificaciones que dejan los clientes después
                    de recibir su pedido.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}"
                class="w-fit rounded-full border border-[#8A486F] px-5 py-3 font-bold text-[#8A486F]">Volver al
                dashboard</a>
        </div>

        <form method="GET" action="{{ route('admin.resenas.index') }}"
            class="admin-card mb-6 grid gap-4 p-5 md:grid-cols-3">
            <label class="block">
                <span class="mb-1 block text-sm font-semibold text-gray-700">Filtrar por estrellas</span>
                <select name="rating" class="w-full rounded-lg border-gray-300">
                    <option value="">Todas</option>
                    @for ($rating = 5; $rating >= 1; $rating--)
                        <option value="{{ $rating }}" @selected(request('rating') == $rating)>{{ $rating }} estrellas</option>
                    @endfor
                </select>
            </label>
            <label class="block">
                <span class="mb-1 block text-sm font-semibold text-gray-700">Filtrar por producto</span>
                <select name="product_id" class="w-full rounded-lg border-gray-300">
                    <option value="">Todos</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" @selected(request('product_id') == $product->id)>
                            {{ $product->nombre }}</option>
                    @endforeach
                </select>
            </label>
            <div class="flex items-end gap-3">
                <button class="rounded-full bg-[#8A486F] px-5 py-3 font-bold text-white">Aplicar</button>
                <a href="{{ route('admin.resenas.index') }}"
                    class="rounded-full border border-gray-300 px-5 py-3 font-semibold text-gray-700">Limpiar</a>
            </div>
        </form>

        <section class="space-y-4">
            @forelse ($reviews as $review)
                <article class="admin-card p-5">
                    <div class="flex flex-col gap-3 lg:flex-row lg:items-start lg:justify-between">
                        <div>
                            <div class="flex flex-wrap items-center gap-3">
                                <h2 class="text-xl font-bold text-[#8A486F]">{{ $review->product->nombre }}</h2>
                                <span
                                    class="rounded-full bg-[#FDF0F4] px-3 py-1 text-sm font-semibold text-[#8A486F]">{{ $review->rating }}/5</span>
                            </div>
                            <p class="mt-1 text-sm text-gray-600">Cliente: {{ $review->user->name }} · Pedido
                                #{{ $review->orderItem->order->id }} · {{ $review->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div class="flex items-center gap-1">
                            @for ($star = 1; $star <= 5; $star++)
                                <span
                                    class="{{ $star <= $review->rating ? 'text-[#8A486F]' : 'text-gray-300' }} text-lg">★</span>
                            @endfor
                        </div>
                    </div>

                    @if ($review->comment)
                        <p class="mt-4 rounded-lg bg-[#FDF0F4] p-4 text-gray-700">{{ $review->comment }}</p>
                    @else
                        <p class="mt-4 text-sm text-gray-500">Sin comentario adicional.</p>
                    @endif
                </article>
            @empty
                <div class="admin-card p-12 text-center">
                    <p class="text-2xl font-bold text-[#8A486F]">Todavía no hay reseñas registradas.</p>
                </div>
            @endforelse
        </section>

        <div class="mt-6">
            {{ $reviews->links() }}
        </div>
        </div>
    </main>
</body>

</html>
