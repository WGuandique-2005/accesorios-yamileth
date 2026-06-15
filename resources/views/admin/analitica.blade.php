<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analítica admin | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">
    @include('partials.theme')
</head>

<body class="bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
    @include('partials.admin_sidebar')

    @php
        $weeklyMax = max(1, collect($weeklyProfitChart)->max(fn($item) => abs($item['value'])));
        $monthlyMax = max(1, collect($monthlyProfitChart)->max(fn($item) => abs($item['value'])));
        $comparisonRows = [
            ['label' => 'Ventas', 'current' => $currentSummary['revenue'], 'previous' => $previousSummary['revenue']],
            ['label' => 'Inversión', 'current' => $currentSummary['cost'], 'previous' => $previousSummary['cost']],
            ['label' => 'Ganancia', 'current' => $currentSummary['profit'], 'previous' => $previousSummary['profit']],
        ];
    @endphp

    <main class="min-h-screen p-4 md:ml-64 md:p-8">
        <div class="mb-8 flex flex-col gap-3 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Analítica del negocio</h1>
                <p class="mt-2 text-gray-600">Ganancias, inversión y comportamiento de ventas con la misma estética de
                    la tienda.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}"
                class="w-fit rounded-full border border-[#8A486F] px-5 py-3 font-bold text-[#8A486F]">Volver al
                dashboard</a>
        </div>

        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Ganancia actual</p>
                <p class="mt-2 text-3xl font-bold text-[#8A486F]">${{ number_format($currentSummary['profit'], 2) }}</p>
            </div>
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Inversión actual</p>
                <p class="mt-2 text-3xl font-bold text-[#8A486F]">${{ number_format($currentSummary['cost'], 2) }}</p>
            </div>
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Ventas actuales</p>
                <p class="mt-2 text-3xl font-bold text-[#8A486F]">${{ number_format($currentSummary['revenue'], 2) }}
                </p>
            </div>
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Comparativa mes anterior</p>
                @php
                    $delta = $currentSummary['profit'] - $previousSummary['profit'];
                @endphp
                <p class="mt-2 text-3xl font-bold {{ $delta >= 0 ? 'text-green-700' : 'text-red-700' }}">
                    {{ $delta >= 0 ? '+' : '' }}${{ number_format($delta, 2) }}
                </p>
            </div>
        </section>

        <section class="mt-8 grid gap-6 xl:grid-cols-2">
            <div class="rounded-xl bg-white p-6 shadow-sm">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-[#8A486F]">Ganancias por semana</h2>
                    <span class="text-sm text-gray-500">Últimas 8 semanas</span>
                </div>
                <div class="flex h-72 items-end gap-3 border-b border-gray-200">
                    @foreach ($weeklyProfitChart as $item)
                        @php
                            $height = max(8, (abs($item['value']) / $weeklyMax) * 100);
                            $isPositive = $item['value'] >= 0;
                        @endphp
                        <div class="flex flex-1 flex-col items-center justify-end gap-2">
                            <span
                                class="text-xs font-semibold {{ $isPositive ? 'text-green-700' : 'text-red-700' }}">${{ number_format($item['value'], 0) }}</span>
                            <div class="w-full rounded-t-lg {{ $isPositive ? 'bg-[#8A486F]' : 'bg-red-400' }}"
                                style="height: {{ $height }}%"></div>
                            <span class="pb-2 text-xs text-gray-500">{{ $item['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-[#8A486F]">Ganancias por mes</h2>
                    <span class="text-sm text-gray-500">Últimos 6 meses</span>
                </div>
                <div class="flex h-72 items-end gap-3 border-b border-gray-200">
                    @foreach ($monthlyProfitChart as $item)
                        @php
                            $height = max(8, (abs($item['value']) / $monthlyMax) * 100);
                            $isPositive = $item['value'] >= 0;
                        @endphp
                        <div class="flex flex-1 flex-col items-center justify-end gap-2">
                            <span
                                class="text-xs font-semibold {{ $isPositive ? 'text-green-700' : 'text-red-700' }}">${{ number_format($item['value'], 0) }}</span>
                            <div class="w-full rounded-t-lg {{ $isPositive ? 'bg-[#8A486F]' : 'bg-red-400' }}"
                                style="height: {{ $height }}%"></div>
                            <span class="pb-2 text-xs text-gray-500">{{ $item['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="mt-8 grid gap-6 lg:grid-cols-2">
            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h2 class="text-xl font-bold text-[#8A486F]">Producto más vendido</h2>
                @if ($topProduct)
                    <div class="mt-4 rounded-lg bg-[#FDF0F4] p-5">
                        <p class="text-2xl font-bold text-[#8A486F]">{{ $topProduct->nombre }}</p>
                        <p class="mt-2 text-gray-600">{{ $topProduct->unidades }} unidades vendidas este mes</p>
                    </div>
                @else
                    <p class="mt-4 text-gray-500">Todavía no hay ventas suficientes para calcularlo.</p>
                @endif
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h2 class="text-xl font-bold text-[#8A486F]">Cliente que más compra</h2>
                @if ($topClient)
                    <div class="mt-4 rounded-lg bg-[#FDF0F4] p-5">
                        <p class="text-2xl font-bold text-[#8A486F]">{{ $topClient->name }}</p>
                        <p class="mt-2 text-gray-600">${{ number_format($topClient->total_comprado, 2) }} en
                            {{ $topClient->pedidos }} pedidos</p>
                    </div>
                @else
                    <p class="mt-4 text-gray-500">Todavía no hay compras suficientes para calcularlo.</p>
                @endif
            </div>
        </section>

        <section class="mt-8 rounded-xl bg-white p-6 shadow-sm">
            <h2 class="text-xl font-bold text-[#8A486F]">Comparativa con el mes anterior</h2>
            <div class="mt-5 overflow-x-auto">
                <table class="w-full min-w-[640px] text-left">
                    <thead class="bg-[#FDF0F4] text-gray-600">
                        <tr>
                            <th class="px-4 py-3">Métrica</th>
                            <th class="px-4 py-3">Mes actual</th>
                            <th class="px-4 py-3">Mes anterior</th>
                            <th class="px-4 py-3">Diferencia</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($comparisonRows as $row)
                            @php
                                $diff = $row['current'] - $row['previous'];
                            @endphp
                            <tr>
                                <td class="px-4 py-3 font-semibold">{{ $row['label'] }}</td>
                                <td class="px-4 py-3">${{ number_format($row['current'], 2) }}</td>
                                <td class="px-4 py-3">${{ number_format($row['previous'], 2) }}</td>
                                <td class="px-4 py-3 font-bold {{ $diff >= 0 ? 'text-green-700' : 'text-red-700' }}">
                                    {{ $diff >= 0 ? '+' : '' }}${{ number_format($diff, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>

</html>