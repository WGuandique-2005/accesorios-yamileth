<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario admin | Accesorios Yamileth</title>
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
        <div class="mb-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Inventario</h1>
                <p class="mt-2 text-gray-600">Productos activos, ocultos y eliminados lógicamente.</p>
            </div>
            <a href="#product-form" class="w-fit rounded-full bg-[#8A486F] px-5 py-3 font-bold text-white">Nuevo
                producto</a>
        </div>

        @if (session('success'))
            <div class="mb-5 rounded-lg bg-green-50 px-4 py-3 text-green-700">{{ session('success') }}</div>
        @endif
        @if (request()->filled('batch_id'))
            <div class="mb-5 rounded-lg border border-[#E8C4D5] bg-[#FDF0F4] px-4 py-3 text-[#8A486F]">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <p class="font-semibold">
                        Lote #{{ request('batch_id') }} creado. ¿Quieres registrar la factura de esta compra?
                    </p>
                    <a href="{{ route('admin.facturas.create', ['batch_id' => request('batch_id')]) }}"
                        class="w-fit rounded-full bg-[#8A486F] px-4 py-2 text-sm font-bold text-white">
                        Registrar factura
                    </a>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-5 rounded-lg bg-red-50 px-4 py-3 text-red-700">
                <ul class="list-disc pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <section class="admin-mobile-stack cols-4 mb-6">
            @foreach ([['Total', $stats['total']], ['Activos', $stats['active']], ['Sin stock', $stats['no_stock']], ['Papelera', $stats['trashed']]] as [$label, $value])
                <div class="admin-card p-5">
                    <p class="text-sm text-gray-500">{{ $label }}</p>
                    <p class="text-2xl font-bold text-[#8A486F]">{{ $value }}</p>
                </div>
            @endforeach
        </section>

        <section id="product-form" class="admin-card mb-8 p-6">
            <h2 class="mb-5 text-xl font-bold text-[#8A486F]">{{ $product ? 'Editar producto' : 'Crear producto' }}</h2>
            <form method="POST"
                action="{{ $product ? route('admin.inventario.update', $product) : route('admin.inventario.store') }}"
                enctype="multipart/form-data" class="grid gap-4 lg:grid-cols-4">
                @csrf
                @if ($product) @method('PUT') @endif
                <label class="block lg:col-span-2">
                    <span class="mb-1 block text-sm font-semibold text-gray-700">Nombre</span>
                    <input name="nombre" value="{{ old('nombre', $product?->nombre) }}" required maxlength="150"
                        class="w-full rounded-lg border-gray-300">
                </label>
                <label class="block">
                    <span class="mb-1 block text-sm font-semibold text-gray-700">Stock</span>
                    <input type="number" name="cantidad_stock"
                        value="{{ old('cantidad_stock', $product?->cantidad_stock ?? 0) }}" min="0" required
                        class="w-full rounded-lg border-gray-300">
                </label>
                <label class="flex items-end gap-2 pb-3">
                    <input type="checkbox" name="activo" value="1" @checked(old('activo', $product?->activo ?? true))
                        class="rounded border-gray-300 text-[#8A486F]">
                    <span class="text-sm font-semibold text-gray-700">Activo</span>
                </label>
                <label class="block">
                    <span class="mb-1 block text-sm font-semibold text-gray-700">Precio unitario</span>
                    <input type="number" step="0.01" name="precio_inversion"
                        value="{{ old('precio_inversion', $product?->precio_inversion ?? 0) }}" min="0" required
                        class="w-full rounded-lg border-gray-300">
                    <p class="mt-1 text-xs text-gray-500">Se multiplica por el stock para calcular la inversión total.</p>
                </label>
                <label class="block">
                    <span class="mb-1 block text-sm font-semibold text-gray-700">Precio venta</span>
                    <input type="number" step="0.01" name="precio_unitario"
                        value="{{ old('precio_unitario', $product?->precio_unitario ?? 0) }}" min="0" required
                        class="w-full rounded-lg border-gray-300">
                </label>
                <label class="block">
                    <span class="mb-1 block text-sm font-semibold text-gray-700">Imagen principal</span>
                    <input type="file" name="imagen" accept="image/jpeg,image/png,image/webp"
                        class="w-full rounded-lg border-gray-300 text-sm">
                </label>
                <label class="block lg:col-span-2">
                    <span class="mb-1 block text-sm font-semibold text-gray-700">Galería adicional</span>
                    <input type="file" name="imagenes[]" accept="image/jpeg,image/png,image/webp" multiple
                        class="w-full rounded-lg border-gray-300 text-sm">
                    <p class="mt-1 text-xs text-gray-500">Puedes subir varias fotos para el carrusel del detalle.</p>
                </label>
                <div class="lg:col-span-4 flex gap-3">
                    <button
                        class="rounded-full bg-[#8A486F] px-6 py-3 font-bold text-white">{{ $product ? 'Guardar cambios' : 'Crear producto' }}</button>
                    @if ($product)
                        <a href="{{ route('admin.inventario.index') }}"
                            class="rounded-full border border-gray-300 px-6 py-3 font-semibold text-gray-700">Cancelar</a>
                    @endif
                </div>
            </form>
        </section>

        <section class="admin-table-shell">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[1000px] text-left text-sm">
                    <thead class="bg-[#FDF0F4] text-gray-600">
                        <tr>
                            <th class="p-4">Imagen</th>
                            <th class="p-4">Nombre</th>
                            <th class="p-4">Stock</th>
                            <th class="p-4">Inversión total</th>
                            <th class="p-4">Venta</th>
                            <th class="p-4">Fotos</th>
                            <th class="p-4">Ganancia</th>
                            <th class="p-4">Activo</th>
                            <th class="p-4 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($products as $item)
                            <tr class="{{ $item->trashed() ? 'bg-gray-50 text-gray-400' : '' }}">
                                <td class="p-4"><img
                                        src="{{ $item->imagen_principal ? asset('storage/' . $item->imagen_principal) : asset('images/logo.jpeg') }}"
                                        alt="{{ $item->nombre }}" class="h-12 w-12 rounded-lg object-cover"></td>
                                <td class="p-4">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-semibold">{{ $item->nombre }} @if($item->trashed()) <span
                                            class="text-xs">(eliminado)</span> @endif</p>
                                            <span class="mt-2 inline-flex rounded-full bg-[#FDF0F4] px-3 py-1 text-xs font-semibold text-[#8A486F]">
                                                Costo prom. disponible: ${{ number_format($item->costo_promedio_disponible, 2) }}
                                            </span>
                                        </div>
                                        <div class="flex flex-wrap justify-end gap-2">
                                            <button type="button" data-replenish-product="{{ $item->id }}"
                                                data-replenish-name="{{ $item->nombre }}"
                                                data-replenish-price="{{ $item->precio_unitario }}"
                                                data-replenish-url="{{ route('admin.inventario.reponer', $item) }}"
                                                class="rounded-full bg-[#8A486F] px-3 py-1 text-xs font-bold text-white">
                                                Agregar stock
                                            </button>
                                            <button type="button" data-batches-toggle="{{ $item->id }}"
                                                class="rounded-full border border-gray-300 px-3 py-1 text-xs font-bold text-gray-700">
                                                Ver lotes
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">{{ $item->cantidad_stock }}</td>
                                <td class="p-4">${{ number_format($item->valor_stock_inversion, 2) }}</td>
                                <td class="p-4">${{ number_format($item->precio_unitario, 2) }}</td>
                                <td class="p-4">{{ $item->productImages->count() }}</td>
                                <td
                                    class="p-4 font-bold {{ $item->ganancia_unitaria >= 0 ? 'text-green-700' : 'text-red-700' }}">
                                    ${{ number_format($item->ganancia_unitaria, 2) }}</td>
                                <td class="p-4">
                                    @if (!$item->trashed())
                                        <button data-toggle-url="{{ route('admin.inventario.toggle', $item) }}"
                                            class="toggle-btn rounded-full px-3 py-1 text-xs font-bold {{ $item->activo ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">{{ $item->activo ? 'Activo' : 'Oculto' }}</button>
                                    @else
                                        <span class="text-xs">No disponible</span>
                                    @endif
                                </td>
                                <td class="p-4 text-right">
                                    @if (!$item->trashed())
                                        <a href="{{ route('admin.inventario.edit', $item) }}"
                                            class="font-semibold text-[#8A486F] hover:underline">Editar</a>
                                        <form method="POST" action="{{ route('admin.inventario.destroy', $item) }}"
                                            class="inline" onsubmit="return confirm('¿Eliminar este producto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="ml-3 font-semibold text-red-600 hover:underline">Eliminar</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            <tr id="batch-panel-{{ $item->id }}" class="hidden bg-[#FDF0F4]/40">
                                <td colspan="9" class="p-0">
                                    <div class="border-t border-gray-100 p-4">
                                        <div class="overflow-x-auto rounded-2xl border border-gray-200 bg-white">
                                            <table class="w-full min-w-[720px] text-left text-xs">
                                                <thead class="bg-[#FDF0F4] text-gray-600">
                                                    <tr>
                                                        <th class="p-3">Lote #</th>
                                                        <th class="p-3">Fecha ingreso</th>
                                                        <th class="p-3">Cantidad inicial</th>
                                                        <th class="p-3">Disponible</th>
                                                        <th class="p-3">Costo</th>
                                                        <th class="p-3">Venta</th>
                                                        <th class="p-3">Factura</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-100">
                                                    @forelse ($item->batches as $batch)
                                                        <tr>
                                                            <td class="p-3 font-semibold">#{{ $batch->id }}</td>
                                                            <td class="p-3">{{ $batch->fecha_ingreso?->format('d/m/Y') }}</td>
                                                            <td class="p-3">{{ $batch->cantidad_inicial }}</td>
                                                            <td class="p-3">{{ $batch->cantidad_disponible }}</td>
                                                            <td class="p-3">${{ number_format($batch->precio_inversion, 2) }}</td>
                                                            <td class="p-3">${{ number_format($batch->precio_venta ?? $item->precio_unitario, 2) }}</td>
                                                            <td class="p-3">
                                                                @if ($batch->invoiceItem?->invoice)
                                                                    <a href="{{ route('admin.facturas.show', $batch->invoiceItem->invoice->id) }}"
                                                                        class="text-xs font-semibold text-[#8A486F] hover:underline">
                                                                        Ver factura #{{ $batch->invoiceItem->invoice->id }}
                                                                    </a>
                                                                @else
                                                                    <span class="text-xs text-gray-400">Sin factura vinculada</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" class="p-3 text-gray-500">No hay lotes registrados todavía.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="p-8 text-center text-gray-500">No hay productos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
        </div>
    </main>

    <div id="replenish-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 px-4">
        <div class="w-full max-w-xl rounded-3xl border border-gray-200 bg-white shadow-2xl">
            <div class="flex items-start justify-between gap-4 border-b border-gray-100 p-6">
                <div>
                    <h2 class="text-2xl font-bold text-[#8A486F]">Agregar stock</h2>
                    <p id="replenish-modal-product" class="mt-1 text-sm text-gray-600"></p>
                </div>
                <button type="button" id="replenish-modal-close" class="text-gray-500 hover:text-[#8A486F]">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form id="replenish-form" method="POST" class="space-y-4 p-6">
                @csrf
                <label class="block">
                    <span class="mb-1 block text-sm font-semibold text-gray-700">Cantidad a reponer</span>
                    <input type="number" name="cantidad" min="1" required value="1"
                        class="w-full rounded-lg border-gray-300">
                </label>
                <label class="block">
                    <span class="mb-1 block text-sm font-semibold text-gray-700">Costo unitario de este lote</span>
                    <input type="number" name="costo_unitario" step="0.01" min="0" required value="0"
                        class="w-full rounded-lg border-gray-300">
                </label>
                <label class="block">
                    <span class="mb-1 block text-sm font-semibold text-gray-700">Precio de venta de este lote</span>
                    <input type="number" name="precio_venta" step="0.01" min="0" required value="0"
                        class="w-full rounded-lg border-gray-300">
                </label>
                <label class="block">
                    <span class="mb-1 block text-sm font-semibold text-gray-700">Fecha de ingreso</span>
                    <input type="date" name="fecha_ingreso" value="{{ now()->toDateString() }}" required
                        class="w-full rounded-lg border-gray-300">
                </label>
                <div class="flex flex-col gap-3 pt-2 sm:flex-row sm:justify-end">
                    <button type="button" id="replenish-modal-cancel"
                        class="rounded-full border border-gray-300 px-5 py-3 font-bold text-gray-700">
                        Cancelar
                    </button>
                    <button class="rounded-full bg-[#8A486F] px-5 py-3 font-bold text-white">
                        Guardar reposición
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const replenishModal = document.getElementById('replenish-modal');
        const replenishForm = document.getElementById('replenish-form');
        const replenishModalProduct = document.getElementById('replenish-modal-product');
        const replenishModalClose = document.getElementById('replenish-modal-close');
        const replenishModalCancel = document.getElementById('replenish-modal-cancel');
        const replenishPriceInput = replenishForm.querySelector('input[name="precio_venta"]');

        const closeReplenishModal = () => {
            replenishModal.classList.add('hidden');
            replenishModal.classList.remove('flex');
        };

        document.querySelectorAll('[data-replenish-product]').forEach(button => {
            button.addEventListener('click', () => {
                replenishForm.action = button.dataset.replenishUrl;
                replenishModalProduct.textContent = button.dataset.replenishName || '';
                if (replenishPriceInput) {
                    replenishPriceInput.value = button.dataset.replenishPrice || '0';
                }
                replenishModal.classList.remove('hidden');
                replenishModal.classList.add('flex');
            });
        });

        replenishModalClose.addEventListener('click', closeReplenishModal);
        replenishModalCancel.addEventListener('click', closeReplenishModal);
        replenishModal.addEventListener('click', (event) => {
            if (event.target === replenishModal) {
                closeReplenishModal();
            }
        });

        document.querySelectorAll('[data-batches-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const panel = document.getElementById(`batch-panel-${button.dataset.batchesToggle}`);
                if (!panel) return;

                panel.classList.toggle('hidden');
                button.textContent = panel.classList.contains('hidden') ? 'Ver lotes' : 'Ocultar lotes';
            });
        });

        document.querySelectorAll('.toggle-btn').forEach(button => {
            button.addEventListener('click', async () => {
                const response = await fetch(button.dataset.toggleUrl, {
                    method: 'PATCH',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                });
                const data = await response.json();
                if (data.success) {
                    button.textContent = data.activo ? 'Activo' : 'Oculto';
                    button.className = 'toggle-btn rounded-full px-3 py-1 text-xs font-bold ' + (data.activo ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600');
                }
            });
        });
    </script>
</body>

</html>
