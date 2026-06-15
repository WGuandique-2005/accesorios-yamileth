<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis encargos | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">
    @include('partials.theme')
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

    <style>
        .rating-star {
            transition: color 0.15s ease, transform 0.15s ease;
        }

        .rating-input:checked+.rating-star,
        .rating-input:checked+.rating-star~.rating-star {
            color: #8A486F;
        }

        .rating-input:hover+.rating-star,
        .rating-input:hover+.rating-star~.rating-star {
            color: #8A486F;
        }
    </style>

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
            @php
                $adminPhone = '50362080344';
                $message = "Hola Accesorios Yamileth, deseo confirmar mi encargo #{$order->id}.\n";
                $message .= "Cliente: " . Auth::user()->name . "\n";
                $message .= "Detalles:\n";
                foreach ($order->orderItems as $item) {
                    $message .= "- " . ($item->product?->nombre ?? 'Producto') . " x " . $item->cantidad . "\n";
                }
                $message .= "Subtotal: $" . number_format($order->precio_total, 2) . "\n";
                $message .= "Envío: $" . number_format($order->cargo_envio, 2) . "\n";
                $message .= "Total final: $" . number_format($order->total_con_envio, 2) . "\n";
                $message .= "Tipo: " . $order->envio_o_entrega . "\n";
                $message .= "Lugar de entrega: " . $order->lugar_de_recibir;
                $whatsappUrl = "https://wa.me/{$adminPhone}?text=" . urlencode($message);
            @endphp
            <article class="mb-5 rounded-xl bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-[#8A486F]">Encargo #{{ $order->id }}</h2>
                        <p class="text-sm text-gray-500">Fecha solicitada: {{ $order->fecha->format('d/m/Y') }}</p>
                    </div>
                    <span
                        class="w-fit rounded-full px-3 py-1 text-sm font-bold {{ $badgeClasses[$order->estado] ?? 'bg-gray-100 text-gray-700' }}">
                        {{ str_replace('_', ' ', ucfirst($order->estado)) }}
                    </span>
                </div>

                <div class="mt-5 divide-y divide-gray-100">
                    @foreach ($order->orderItems as $item)
                        <div class="flex items-center justify-between gap-4 py-3">
                            <div class="flex items-start gap-3">
                                <img src="{{ $item->product?->imagen_principal ? asset('storage/' . $item->product->imagen_principal) : asset('images/logo.jpeg') }}"
                                    alt="{{ $item->product?->nombre ?? 'Producto' }}" class="h-12 w-12 rounded-lg object-cover">
                                <div>
                                    <p class="font-semibold">{{ $item->product?->nombre ?? 'Producto no disponible' }}</p>
                                    <p class="text-sm text-gray-500">Cantidad: {{ $item->cantidad }}</p>
                                    <p class="text-sm text-gray-500">Subtotal: ${{ number_format($item->subtotal, 2) }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                @if ($item->review)
                                    <p class="text-sm font-semibold text-[#8A486F]">Ya calificado</p>
                                    <div class="mt-1 flex items-center justify-end gap-1">
                                        @for ($star = 1; $star <= 5; $star++)
                                            <span
                                                class="text-lg {{ $star <= $item->review->rating ? 'text-[#8A486F]' : 'text-gray-300' }}">★</span>
                                        @endfor
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">{{ $item->review->rating }}/5</p>
                                @elseif ($order->estado === 'entregado')
                                    <p class="text-sm font-semibold text-green-700">Listo para calificar</p>
                                @else
                                    <p class="text-sm text-gray-500">Disponible al entregarse</p>
                                @endif
                            </div>
                        </div>

                        @if (!$item->review && $order->estado === 'entregado')
                            <form method="POST" action="{{ route('resenas.store') }}" class="mb-4 rounded-lg bg-[#FDF0F4] p-4">
                                @csrf
                                <input type="hidden" name="order_item_id" value="{{ $item->id }}">
                                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                                    <div>
                                        <p class="font-semibold text-[#8A486F]">Califica este producto</p>
                                        <div class="mt-2 flex items-center gap-2">
                                            <span class="text-xs text-gray-500">1</span>
                                            <div class="flex items-center gap-1">
                                                @for ($rating = 1; $rating <= 5; $rating++)
                                                    <label class="cursor-pointer text-2xl text-gray-300 hover:text-[#8A486F]">
                                                        <input class="rating-input peer sr-only" type="radio" name="rating"
                                                            value="{{ $rating }}" required>
                                                        <span class="rating-star peer-checked:text-[#8A486F]">★</span>
                                                    </label>
                                                @endfor
                                            </div>
                                            <span class="text-xs text-gray-500">5</span>
                                        </div>
                                        <p class="mt-1 text-xs text-gray-500">Selecciona de 1 a 5 estrellas.</p>
                                    </div>
                                    <button class="rounded-full bg-[#8A486F] px-5 py-2 font-bold text-white">Enviar reseña</button>
                                </div>
                                <textarea name="comment" rows="3" maxlength="1000" class="mt-4 w-full rounded-lg border-gray-300"
                                    placeholder="Cuéntanos qué te pareció el producto..."></textarea>
                            </form>
                        @endif
                    @endforeach
                </div>

                <div class="mt-5 grid gap-3 rounded-lg bg-[#FDF0F4] p-4 text-sm sm:grid-cols-3">
                    <div><span
                            class="block text-gray-500">Subtotal</span><strong>${{ number_format($order->precio_total, 2) }}</strong>
                    </div>
                    <div><span
                            class="block text-gray-500">Envío</span><strong>${{ number_format($order->cargo_envio, 2) }}</strong>
                    </div>
                    <div><span class="block text-gray-500">Total
                            final</span><strong>${{ number_format($order->total_con_envio, 2) }}</strong></div>
                    <div><span class="block text-gray-500">Tipo</span><strong>{{ $order->envio_o_entrega }}</strong></div>
                    <div><span
                            class="block text-gray-500">Despacho</span><strong>{{ $order->lugar_despacho ?: 'No especificado' }}</strong>
                    </div>
                    <div class="sm:col-span-3"><span class="block text-gray-500">Recibir
                            en</span><strong>{{ $order->lugar_de_recibir }}</strong></div>

                    @if ($order->estado === 'pendiente')
                        <div class="sm:col-span-3 mt-2">
                            <a href="{{ $whatsappUrl }}" target="_blank"
                                class="flex items-center justify-center gap-2 w-full py-3 rounded-xl bg-[#25D366] text-white font-bold hover:bg-[#20ba5a] transition-all transform active:scale-95 shadow-sm">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.018-.57-.018-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.297.149.534.238.72.304.187.066.354.054.484-.035.13-.089.563-.383.712-.52.149-.137.297-.114.502-.074.205.04 1.286.513 1.504.607.218.094.367.141.42.237.053.097.053.454-.144.603zM12.003 2C6.478 2 2 6.478 2 12.003c0 2.12.86 4.09 2.23 5.65L2 22l4.46-1.16c1.51.78 3.22 1.2 5.04 1.2 5.525 0 10-4.478 10-10.003 0-5.525-4.478-10-10-10z" />
                                </svg>
                                Confirmar Pedido por WhatsApp
                            </a>
                        </div>
                    @endif
                </div>
            </article>
        @empty
            <div class="rounded-xl bg-white p-12 text-center shadow-sm">
                <p class="text-2xl font-bold text-[#8A486F]">Aún no tienes encargos 🛍️</p>
                <a href="{{ route('home') }}"
                    class="mt-5 inline-flex rounded-full bg-[#8A486F] px-6 py-3 font-semibold text-white">Ver productos</a>
            </div>
        @endforelse
    </main>

    @include('partials.footer')
</body>

</html>