<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->nombre }} | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    @include('partials.theme')
</head>
<body class="min-h-screen bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
@include('partials.navbar')

<main class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">
    @if (session('error'))
        <div class="mb-6 rounded-lg bg-red-50 px-4 py-3 text-red-700">{{ session('error') }}</div>
    @endif

    <a href="{{ route('home') }}" class="mb-8 inline-flex text-sm font-semibold text-[#8A486F] hover:underline">Volver al catálogo</a>

    @php
        $gallery = $product->productImages->pluck('ruta')->filter()->values();
        if ($product->imagen_ruta && ! $gallery->contains($product->imagen_ruta)) {
            $gallery = $gallery->prepend($product->imagen_ruta)->values();
        }
        if ($gallery->isEmpty()) {
            $gallery = collect([$product->imagen_ruta ?: null])->filter()->values();
        }
    @endphp

    <section class="grid gap-10 lg:grid-cols-2 lg:items-start">
        <div class="rounded-xl bg-white p-4 shadow-sm">
            <div class="relative overflow-hidden rounded-xl bg-[#FDF0F4]">
                <img id="main-product-image" src="{{ $gallery->first() ? asset('storage/'.$gallery->first()) : asset('images/logo.jpeg') }}" alt="{{ $product->nombre }}" class="aspect-square w-full object-cover">
                @if ($gallery->count() > 1)
                    <button type="button" data-carousel-prev class="absolute left-3 top-1/2 -translate-y-1/2 rounded-full bg-white/90 p-2 shadow-md text-[#8A486F]">‹</button>
                    <button type="button" data-carousel-next class="absolute right-3 top-1/2 -translate-y-1/2 rounded-full bg-white/90 p-2 shadow-md text-[#8A486F]">›</button>
                @endif
            </div>
            @if ($gallery->count() > 1)
                <div class="mt-4 grid grid-cols-4 gap-3">
                    @foreach ($gallery as $index => $image)
                        <button type="button" data-carousel-thumb="{{ $index }}" class="overflow-hidden rounded-lg border-2 {{ $index === 0 ? 'border-[#8A486F]' : 'border-transparent' }}">
                            <img src="{{ asset('storage/'.$image) }}" alt="{{ $product->nombre }} miniatura {{ $index + 1 }}" class="h-20 w-full object-cover">
                        </button>
                    @endforeach
                </div>
            @endif
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

            <div class="mt-4 flex flex-col gap-1 text-sm text-gray-600">
                <div class="flex items-center gap-1" aria-label="Calificación {{ number_format($product->promedio_calificacion ?: 0, 1) }} de 5">
                    @for ($star = 1; $star <= 5; $star++)
                        <span class="{{ $star <= round($product->promedio_calificacion ?: 0) ? 'text-[#8A486F]' : 'text-gray-300' }} text-lg">★</span>
                    @endfor
                </div>
                <span>{{ number_format($product->promedio_calificacion ?: 0, 1) }}/5 · {{ $product->total_resenas }} reseñas</span>
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

    <section class="mt-10 rounded-xl bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-serif text-2xl font-bold text-[#8A486F]">Reseñas</h2>
                <p class="text-sm text-gray-600">Opiniones reales de clientes que ya recibieron su pedido.</p>
            </div>
            <div class="text-right">
                <p class="text-2xl font-bold text-[#8A486F]">{{ number_format($product->promedio_calificacion ?: 0, 1) }}</p>
                <p class="text-sm text-gray-500">{{ $product->total_resenas }} calificaciones</p>
            </div>
        </div>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
            @forelse ($product->reviews->take(4) as $review)
                <article class="rounded-lg bg-[#FDF0F4] p-4">
                    <div class="flex items-center justify-between gap-3">
                        <p class="font-semibold text-[#8A486F]">{{ $review->user->name }}</p>
                        <div class="flex items-center gap-0.5" aria-label="Calificación {{ $review->rating }} de 5">
                            @for ($star = 1; $star <= 5; $star++)
                                <span class="{{ $star <= $review->rating ? 'text-[#8A486F]' : 'text-gray-300' }} text-sm">★</span>
                            @endfor
                        </div>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">{{ $review->rating }}/5</p>
                    @if ($review->comment)
                        <p class="mt-3 text-sm text-gray-700">{{ $review->comment }}</p>
                    @endif
                </article>
            @empty
                <p class="text-gray-500">Todavía no hay reseñas para este producto.</p>
            @endforelse
        </div>
    </section>
</main>

@include('partials.footer')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const images = @json($gallery->map(fn ($image) => asset('storage/'.$image))->values());
        if (!images.length) {
            return;
        }

        const mainImage = document.getElementById('main-product-image');
        const thumbs = Array.from(document.querySelectorAll('[data-carousel-thumb]'));
        const prevButton = document.querySelector('[data-carousel-prev]');
        const nextButton = document.querySelector('[data-carousel-next]');
        let activeIndex = 0;

        const setActive = (index) => {
            activeIndex = (index + images.length) % images.length;
            mainImage.src = images[activeIndex];

            thumbs.forEach((thumb, thumbIndex) => {
                thumb.classList.toggle('border-[#8A486F]', thumbIndex === activeIndex);
                thumb.classList.toggle('border-transparent', thumbIndex !== activeIndex);
            });
        };

        thumbs.forEach(thumb => {
            thumb.addEventListener('click', () => setActive(parseInt(thumb.dataset.carouselThumb, 10)));
        });

        prevButton?.addEventListener('click', () => setActive(activeIndex - 1));
        nextButton?.addEventListener('click', () => setActive(activeIndex + 1));
    });
</script>
</body>
</html>
