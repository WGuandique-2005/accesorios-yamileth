<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard admin | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">
    @include('partials.theme')
</head>

<body class="bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
    @include('partials.admin_sidebar')

    <main class="admin-main">
        <div class="admin-page">
        <div class="mb-8 flex flex-col gap-3 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-[#8A486F]/70">Panel de control</p>
                <h1 class="mt-1 font-serif text-4xl font-bold text-[#8A486F]">Dashboard</h1>
                <p class="mt-2 max-w-2xl text-gray-600">Resumen del negocio para hoy, {{ now()->format('d/m/Y') }}.</p>
            </div>
            <a href="{{ route('admin.analitica') }}"
                class="w-fit rounded-full bg-[#8A486F] px-5 py-3 font-bold text-white hover:bg-[#733b5c]">
                Ver analítica completa
            </a>
        </div>

        <section class="admin-mobile-stack cols-4">
            @foreach ([
                ['label' => 'Pedidos hoy', 'value' => $total_pedidos_hoy, 'icon' => 'today', 'tone' => 'text-[#8A486F]'],
                ['label' => 'Pendientes', 'value' => $pedidos_pendientes, 'icon' => 'pending_actions', 'tone' => 'text-[#8A486F]'],
                ['label' => 'Productos', 'value' => $total_productos, 'icon' => 'inventory_2', 'tone' => 'text-[#8A486F]'],
                ['label' => 'Sin stock', 'value' => $productos_sin_stock, 'icon' => 'production_quantity_limits', 'tone' => 'text-red-600'],
            ] as $card)
                <article class="admin-card p-5">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-sm text-gray-500">{{ $card['label'] }}</p>
                            <p class="mt-2 text-3xl font-extrabold {{ $card['tone'] }}">{{ $card['value'] }}</p>
                        </div>
                        <div class="rounded-2xl bg-[#FDF0F4] p-3">
                            <span class="material-symbols-outlined text-2xl {{ $card['tone'] }}">{{ $card['icon'] }}</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>

        <section class="mt-6 grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
            <article class="admin-card p-6">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-[#8A486F]">Resumen financiero</h2>
                        <p class="text-sm text-gray-500">Ventas, inversión, utilidad y descuentos acumulados del mes.</p>
                    </div>
                </div>

                <div class="mt-5 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <div class="rounded-2xl bg-[#FFF8FB] p-4">
                        <p class="text-sm text-gray-500">Ventas mes</p>
                        <p class="mt-2 text-2xl font-bold text-[#8A486F]">${{ number_format($ventas_mes, 2) }}</p>
                    </div>
                    <div class="rounded-2xl bg-[#FFF8FB] p-4">
                        <p class="text-sm text-gray-500">Invertido este mes</p>
                        <p class="mt-2 text-2xl font-bold text-[#8A486F]">${{ number_format($inversion_mes, 2) }}</p>
                    </div>
                    <div class="rounded-2xl bg-[#FFF8FB] p-4">
                        <p class="text-sm text-gray-500">Ganado este mes</p>
                        <p class="mt-2 text-2xl font-bold text-green-700">${{ number_format($ganancias_mes, 2) }}</p>
                    </div>
                    <div class="rounded-2xl bg-[#FFF8FB] p-4">
                        <p class="text-sm text-gray-500">Descuento facturas</p>
                        <p class="mt-2 text-2xl font-bold text-[#8A486F]">${{ number_format($descuentos_facturas_mes, 2) }}</p>
                    </div>
                </div>

                <div class="mt-4 rounded-2xl border border-[#8A486F]/10 bg-gradient-to-r from-[#FDF0F4] to-[#FFF8F8] p-4">
                    <p class="text-sm text-gray-500">Balance real</p>
                    <p class="mt-1 text-3xl font-extrabold {{ $ganancias_mes >= 0 ? 'text-green-700' : 'text-red-700' }}">
                        ${{ number_format($ganancias_mes, 2) }}
                    </p>
                </div>
            </article>

            <article class="admin-card p-6">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-xl font-bold text-[#8A486F]">Acceso rápido</h2>
                        <p class="text-sm text-gray-500">Atajos a los módulos más usados.</p>
                    </div>
                </div>

                <div class="mt-5 grid gap-3 sm:grid-cols-2">
                    <a href="{{ route('admin.resenas.index') }}"
                        class="rounded-2xl border border-[#8A486F]/10 bg-[#FDF0F4] p-4 font-semibold text-[#8A486F] transition hover:bg-[#f8dbe6]">
                        Gestionar reseñas
                    </a>
                    <a href="{{ route('admin.analitica') }}"
                        class="rounded-2xl border border-[#8A486F]/10 bg-[#FDF0F4] p-4 font-semibold text-[#8A486F] transition hover:bg-[#f8dbe6]">
                        Ver analítica
                    </a>
                    <a href="{{ route('admin.inventario.index') }}"
                        class="rounded-2xl border border-[#8A486F]/10 bg-[#FDF0F4] p-4 font-semibold text-[#8A486F] transition hover:bg-[#f8dbe6]">
                        Abrir inventario
                    </a>
                    <a href="{{ route('admin.pedidos.index') }}"
                        class="rounded-2xl border border-[#8A486F]/10 bg-[#FDF0F4] p-4 font-semibold text-[#8A486F] transition hover:bg-[#f8dbe6]">
                        Revisar pedidos
                    </a>
                </div>
            </article>
        </section>

        <section class="mt-6 grid gap-6 lg:grid-cols-[1.35fr_0.65fr]">
            <article class="admin-card p-6">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-xl font-bold text-[#8A486F]">Pedidos últimos 7 días</h2>
                        <p class="text-sm text-gray-500">Actividad reciente del negocio.</p>
                    </div>
                </div>

                <div class="mt-6 flex h-72 items-end gap-3 rounded-2xl bg-[#FFF8FB] px-4 pb-5 pt-6">
                    @foreach ($chartData as $day)
                        @php $height = max(10, min(100, $day['total'] * 18)); @endphp
                        <div class="flex flex-1 flex-col items-center justify-end gap-2">
                            <span class="text-xs font-semibold text-[#8A486F]">{{ $day['total'] }}</span>
                            <div class="w-full max-w-[42px] rounded-t-2xl bg-gradient-to-t from-[#8A486F] to-[#D97FA3]"
                                style="height: {{ $height }}px"></div>
                            <span class="text-xs text-gray-500">{{ $day['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </article>

            <article class="admin-card p-6">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-xl font-bold text-[#8A486F]">Últimos pedidos</h2>
                        <p class="text-sm text-gray-500">Acceso directo al detalle más reciente.</p>
                    </div>
                    <a href="{{ route('admin.pedidos.index') }}"
                        class="text-sm font-semibold text-[#8A486F] hover:underline">Ver todos</a>
                </div>

                <div class="mt-4 divide-y divide-gray-100">
                    @forelse ($ultimos_pedidos as $order)
                        <a href="{{ route('admin.pedidos.show', $order) }}"
                            class="block rounded-xl py-3 transition hover:bg-[#FFF8FB]">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="font-semibold text-[#8A486F]">#{{ $order->id }} - {{ $order->user?->name }}</p>
                                    <p class="mt-1 text-sm text-gray-500">{{ $order->cantidad_total }} productos</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-gray-900">${{ number_format($order->precio_total, 2) }}</p>
                                    <p class="text-sm text-gray-500">{{ ucfirst($order->estado) }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="py-8 text-center text-gray-500">No hay pedidos recientes.</p>
                    @endforelse
                </div>
            </article>
        </section>

        <section class="mt-6 grid gap-6 lg:grid-cols-[1fr_0.9fr]">
            <article class="admin-card p-6">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-xl font-bold text-[#8A486F]">Reseñas recientes</h2>
                        <p class="text-sm text-gray-500">Opiniones más nuevas de clientes.</p>
                    </div>
                    <a href="{{ route('admin.resenas.index') }}"
                        class="text-sm font-semibold text-[#8A486F] hover:underline">Ver todas</a>
                </div>

                <div class="mt-5 space-y-4">
                    @forelse ($reseñas_recientes as $review)
                        <div class="rounded-2xl bg-[#FFF8FB] p-4">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <p class="font-semibold text-[#8A486F]">{{ $review->product->nombre }}</p>
                                    <p class="text-sm text-gray-600">{{ $review->user->name }}</p>
                                </div>
                                <div class="flex items-center gap-0.5 text-lg leading-none">
                                    @for ($star = 1; $star <= 5; $star++)
                                        <span class="{{ $star <= $review->rating ? 'text-[#8A486F]' : 'text-gray-300' }}">★</span>
                                    @endfor
                                </div>
                            </div>
                            @if ($review->comment)
                                <p class="mt-3 text-sm leading-6 text-gray-700">{{ $review->comment }}</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500">Aún no hay reseñas recientes.</p>
                    @endforelse
                </div>
            </article>

            <article class="admin-card p-6">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-xl font-bold text-[#8A486F]">Estado general</h2>
                        <p class="text-sm text-gray-500">Vista rápida de los números clave del mes.</p>
                    </div>
                </div>

                <div class="mt-5 space-y-3">
                    <div class="rounded-2xl bg-[#FFF8FB] p-4">
                        <p class="text-sm text-gray-500">Pedidos hoy</p>
                        <p class="mt-1 text-2xl font-bold text-[#8A486F]">{{ $total_pedidos_hoy }}</p>
                    </div>
                    <div class="rounded-2xl bg-[#FFF8FB] p-4">
                        <p class="text-sm text-gray-500">Pendientes</p>
                        <p class="mt-1 text-2xl font-bold text-[#8A486F]">{{ $pedidos_pendientes }}</p>
                    </div>
                    <div class="rounded-2xl bg-[#FFF8FB] p-4">
                        <p class="text-sm text-gray-500">Descuento facturas</p>
                        <p class="mt-1 text-2xl font-bold text-[#8A486F]">${{ number_format($descuentos_facturas_mes, 2) }}</p>
                    </div>
                </div>
            </article>
        </section>
        </div>
    </main>
</body>

</html>
