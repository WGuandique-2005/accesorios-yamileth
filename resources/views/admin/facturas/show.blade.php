<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura {{ $invoice->numero_factura ?: '#' . $invoice->id }} | Accesorios Yamileth</title>
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
                <h1 class="font-serif text-4xl font-bold text-[#8A486F]">
                    Factura {{ $invoice->numero_factura ?: '#' . $invoice->id }}
                </h1>
                <p class="mt-2 text-gray-600">
                    Fecha de compra: {{ $invoice->fecha_compra->format('d/m/Y') }}
                </p>
            </div>
            <a href="{{ route('admin.facturas.index') }}"
                class="w-fit rounded-full border border-gray-300 px-5 py-3 font-bold text-gray-700">Volver</a>
        </div>

        <section class="grid gap-6 xl:grid-cols-[1fr_320px]">
            <div class="admin-table-shell">
                <div class="border-b border-gray-100 p-6">
                    <div class="grid gap-4 md:grid-cols-3">
                        <div>
                            <p class="text-sm text-gray-500">N° Factura</p>
                            <p class="text-xl font-bold text-[#8A486F]">{{ $invoice->numero_factura ?: 'Sin número' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Fecha</p>
                            <p class="text-xl font-bold text-[#8A486F]">{{ $invoice->fecha_compra->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Total inversión</p>
                            <p class="text-xl font-bold text-[#8A486F]">${{ number_format($invoice->total_inversion, 2) }}</p>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[760px] text-left text-sm">
                        <thead class="bg-[#FDF0F4] text-gray-600">
                            <tr>
                                <th class="p-4">Producto</th>
                                <th class="p-4">Cantidad</th>
                                <th class="p-4">Precio unit.</th>
                                <th class="p-4">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($invoice->items as $item)
                                <tr>
                                    <td class="p-4">
                                        <p class="font-semibold">{{ $item->nombre_producto }}</p>
                                        @if ($item->product)
                                            <p class="text-xs text-gray-500">Vinculado a inventario</p>
                                        @endif
                                    </td>
                                    <td class="p-4">{{ $item->cantidad }}</td>
                                    <td class="p-4">${{ number_format($item->precio_unitario_temu, 2) }}</td>
                                    <td class="p-4 font-bold">${{ number_format($item->subtotal, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <aside class="admin-card h-fit p-6">
                <h2 class="text-xl font-bold text-[#8A486F]">Resumen</h2>
                <div class="mt-4 space-y-3 text-sm">
                    <div class="flex justify-between gap-4">
                        <span>Total</span>
                        <strong>${{ number_format($invoice->total_inversion, 2) }}</strong>
                    </div>
                    <div class="flex justify-between gap-4">
                        <span>Descuento Temu</span>
                        <strong class="text-red-600">-${{ number_format($invoice->descuento_temu, 2) }}</strong>
                    </div>
                    <div class="flex justify-between gap-4 border-t border-gray-100 pt-3">
                        <span>Total después del descuento</span>
                        <strong>${{ number_format($invoice->total_inversion - $invoice->descuento_temu, 2) }}</strong>
                    </div>
                    <div class="flex justify-between gap-4">
                        <span>Descuento por producto</span>
                        <strong>${{ number_format($invoice->descuento_por_producto, 2) }}</strong>
                    </div>
                    <div class="flex justify-between gap-4">
                        <span>Cantidad total</span>
                        <strong>{{ $invoice->cantidad_total }}</strong>
                    </div>
                </div>

                @if ($invoice->notas)
                    <div class="mt-5 rounded-lg bg-[#FDF0F4] p-4 text-sm text-gray-700">
                        <p class="font-semibold text-[#8A486F]">Notas</p>
                        <p class="mt-1">{{ $invoice->notas }}</p>
                    </div>
                @endif
            </aside>
        </section>
        </div>
    </main>
</body>

</html>
