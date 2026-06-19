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

    <main class="min-h-screen p-4 md:ml-64 md:p-8">
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
        @if ($errors->any())
            <div class="mb-5 rounded-lg bg-red-50 px-4 py-3 text-red-700">
                <ul class="list-disc pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <section class="mb-6 grid gap-4 sm:grid-cols-4">
            @foreach ([['Total', $stats['total']], ['Activos', $stats['active']], ['Sin stock', $stats['no_stock']], ['Papelera', $stats['trashed']]] as [$label, $value])
                <div class="rounded-xl bg-white p-5 shadow-sm">
                    <p class="text-sm text-gray-500">{{ $label }}</p>
                    <p class="text-2xl font-bold text-[#8A486F]">{{ $value }}</p>
                </div>
            @endforeach
        </section>

        <section id="product-form" class="mb-8 rounded-xl bg-white p-6 shadow-sm">
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

        <section class="overflow-hidden rounded-xl bg-white shadow-sm">
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
                                <td class="p-4 font-semibold">{{ $item->nombre }} @if($item->trashed()) <span
                                class="text-xs">(eliminado)</span> @endif</td>
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
                        @empty
                            <tr>
                                <td colspan="9" class="p-8 text-center text-gray-500">No hay productos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script>
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
