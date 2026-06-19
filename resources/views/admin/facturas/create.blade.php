<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva factura | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">
    @include('partials.theme')
</head>

<body class="bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
    @include('partials.admin_sidebar')

    <main class="min-h-screen p-4 md:ml-64 md:p-8">
        <div class="mb-8">
            <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Registrar factura</h1>
            <p class="mt-2 text-gray-600">Selecciona un producto para cargar sus datos y luego ajusta cantidad, precio y descuento Temu.</p>
        </div>

        @if ($errors->any())
            <div class="mb-5 rounded-lg bg-red-50 px-4 py-3 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.facturas.store') }}" class="space-y-6">
            @csrf
            <section class="rounded-xl bg-white p-6 shadow-sm">
                <div class="grid gap-4 lg:grid-cols-4">
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">N° Factura</span>
                        <input type="text" name="numero_factura" value="{{ old('numero_factura') }}" maxlength="255"
                            class="w-full rounded-lg border-gray-300" placeholder="Opcional">
                    </label>
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Fecha de compra</span>
                        <input type="date" name="fecha_compra" value="{{ old('fecha_compra', now()->format('Y-m-d')) }}"
                            required class="w-full rounded-lg border-gray-300">
                    </label>
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Descuento Temu</span>
                        <input type="number" step="0.01" min="0" name="descuento_temu"
                            value="{{ old('descuento_temu', 0) }}" required class="w-full rounded-lg border-gray-300">
                    </label>
                    <label class="block lg:col-span-4">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Notas</span>
                        <textarea name="notas" rows="3" class="w-full rounded-lg border-gray-300"
                            placeholder="Observaciones opcionales">{{ old('notas') }}</textarea>
                    </label>
                </div>
            </section>

            <section class="rounded-xl bg-white p-6 shadow-sm">
                <div class="mb-4 flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-xl font-bold text-[#8A486F]">Productos de la factura</h2>
                        <p class="text-sm text-gray-600">Al elegir un producto se autocompletan sus datos y quedan bloqueados para evitar cambios accidentales.</p>
                    </div>
                    <button type="button" id="add-item"
                        class="rounded-full border border-[#8A486F] px-4 py-2 text-sm font-bold text-[#8A486F]">Agregar
                        ítem</button>
                </div>

                <div id="items-list" class="space-y-4">
                    @php
                        $oldItems = old('items', [
                            ['nombre_producto' => '', 'cantidad' => 1, 'precio_unitario_temu' => '', 'product_id' => ''],
                        ]);
                    @endphp
                    @if ($products->isEmpty())
                        <div class="rounded-lg border border-yellow-200 bg-yellow-50 p-4 text-sm text-yellow-800">
                            No hay productos disponibles para facturar porque todos ya fueron incluidos en facturas anteriores.
                        </div>
                    @endif
                    @foreach ($oldItems as $index => $item)
                        <div class="grid gap-4 rounded-lg border border-gray-200 p-4 lg:grid-cols-12 item-row">
                            <label class="block lg:col-span-4">
                                <span class="mb-1 block text-sm font-semibold text-gray-700">Producto</span>
                                <select name="items[{{ $index }}][product_id]" data-product-select
                                    class="w-full rounded-lg border-gray-300">
                                    <option value="">Sin vincular</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            data-product-name="{{ $product->nombre }}"
                                            data-product-price="{{ $product->precio_inversion }}"
                                            data-product-quantity="{{ $product->cantidad_stock }}"
                                            @selected((string) ($item['product_id'] ?? '') === (string) $product->id)>
                                            {{ $product->nombre }} - ${{ number_format($product->precio_inversion, 2) }}
                                        </option>
                                    @endforeach
                                </select>
                            </label>
                            <label class="block lg:col-span-4">
                                <span class="mb-1 block text-sm font-semibold text-gray-700">Nombre del producto</span>
                                <input type="text" name="items[{{ $index }}][nombre_producto]" data-product-name-input
                                    value="{{ $item['nombre_producto'] ?? '' }}" maxlength="255"
                                    class="w-full rounded-lg border-gray-300" placeholder="Se usa si no hay producto creado">
                            </label>
                            <label class="block lg:col-span-2">
                                <span class="mb-1 block text-sm font-semibold text-gray-700">Cantidad</span>
                                <input type="hidden" name="items[{{ $index }}][cantidad]"
                                    value="{{ $item['cantidad'] ?? 1 }}" data-quantity-input>
                                <input type="text" value="{{ $item['cantidad'] ?? 1 }}" readonly
                                    class="w-full rounded-lg border-gray-300 bg-gray-50 text-gray-500 cursor-not-allowed pointer-events-none"
                                    data-quantity-display>
                            </label>
                            <label class="block lg:col-span-2">
                                <span class="mb-1 block text-sm font-semibold text-gray-700">Precio unitario</span>
                                <input type="text" inputmode="decimal"
                                    name="items[{{ $index }}][precio_unitario_temu]" data-product-price-input
                                    value="{{ $item['precio_unitario_temu'] ?? '' }}" required
                                    class="w-full rounded-lg border-gray-300">
                            </label>
                        </div>
                    @endforeach
                </div>

                <template id="item-template">
                    <div class="grid gap-4 rounded-lg border border-gray-200 p-4 lg:grid-cols-12 item-row">
                        <label class="block lg:col-span-4">
                            <span class="mb-1 block text-sm font-semibold text-gray-700">Producto</span>
                            <select data-name="product_id" data-product-select class="w-full rounded-lg border-gray-300">
                                <option value="">Sin vincular</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        data-product-name="{{ $product->nombre }}"
                                        data-product-price="{{ $product->precio_inversion }}"
                                        data-product-quantity="{{ $product->cantidad_stock }}">
                                        {{ $product->nombre }} - ${{ number_format($product->precio_inversion, 2) }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        <label class="block lg:col-span-4">
                            <span class="mb-1 block text-sm font-semibold text-gray-700">Nombre del producto</span>
                            <input type="text" data-name="nombre_producto" data-product-name-input maxlength="255"
                                class="w-full rounded-lg border-gray-300" placeholder="Se usa si no hay producto creado">
                        </label>
                        <label class="block lg:col-span-2">
                            <span class="mb-1 block text-sm font-semibold text-gray-700">Cantidad</span>
                            <input type="hidden" data-name="cantidad" value="1" data-quantity-input>
                            <input type="text" value="1" readonly
                                class="w-full rounded-lg border-gray-300 bg-gray-50 text-gray-500 cursor-not-allowed pointer-events-none"
                                data-quantity-display>
                        </label>
                        <label class="block lg:col-span-2">
                            <span class="mb-1 block text-sm font-semibold text-gray-700">Precio unitario</span>
                            <input type="text" inputmode="decimal" data-name="precio_unitario_temu" data-product-price-input required
                                class="w-full rounded-lg border-gray-300">
                        </label>
                    </div>
                </template>

                <div class="mt-6">
                    <button class="rounded-full bg-[#8A486F] px-6 py-3 font-bold text-white">Guardar factura</button>
                    <a href="{{ route('admin.facturas.index') }}"
                        class="ml-3 rounded-full border border-gray-300 px-6 py-3 font-semibold text-gray-700">Cancelar</a>
                </div>
            </section>
        </form>
    </main>

    <script>
        const itemsList = document.getElementById('items-list');
        const template = document.getElementById('item-template');
        const addItemButton = document.getElementById('add-item');

        const getSelectedProductIds = (exceptRow = null) => {
            return Array.from(itemsList.querySelectorAll('.item-row'))
                .filter((row) => row !== exceptRow)
                .map((row) => row.querySelector('[data-product-select]')?.value)
                .filter(Boolean);
        };

        const syncEditableState = (row) => {
            const select = row.querySelector('[data-product-select]');
            const nameInput = row.querySelector('[data-product-name-input]');
            const priceInput = row.querySelector('[data-product-price-input]');
            const quantityDisplay = row.querySelector('[data-quantity-display]');
            const quantityInput = row.querySelector('[data-quantity-input]');

            if (!select || !nameInput || !priceInput || !quantityDisplay || !quantityInput) return;

            const hasProduct = Boolean(select.value);
            nameInput.readOnly = hasProduct;
            priceInput.readOnly = hasProduct;
            nameInput.tabIndex = hasProduct ? -1 : 0;
            priceInput.tabIndex = hasProduct ? -1 : 0;
            quantityDisplay.readOnly = true;
            quantityDisplay.tabIndex = -1;
            nameInput.classList.toggle('cursor-not-allowed', hasProduct);
            priceInput.classList.toggle('cursor-not-allowed', hasProduct);
            nameInput.classList.toggle('pointer-events-none', hasProduct);
            priceInput.classList.toggle('pointer-events-none', hasProduct);
            nameInput.classList.toggle('bg-gray-50', hasProduct);
            priceInput.classList.toggle('bg-gray-50', hasProduct);
            nameInput.classList.toggle('text-gray-500', hasProduct);
            priceInput.classList.toggle('text-gray-500', hasProduct);
            quantityDisplay.classList.add('bg-gray-50', 'text-gray-500', 'cursor-not-allowed', 'pointer-events-none');
        };

        const syncRowFromProduct = (row) => {
            const select = row.querySelector('[data-product-select]');
            const nameInput = row.querySelector('[data-product-name-input]');
            const priceInput = row.querySelector('[data-product-price-input]');
            const quantityInput = row.querySelector('[data-quantity-input]');
            const quantityDisplay = row.querySelector('[data-quantity-display]');

            if (!select || !nameInput || !priceInput || !quantityInput || !quantityDisplay) return;

            const option = select.selectedOptions[0];
            if (!option || !option.value) {
                nameInput.readOnly = false;
                priceInput.readOnly = false;
                syncEditableState(row);
                return;
            }

            nameInput.value = option.dataset.productName || nameInput.value;
            priceInput.value = option.dataset.productPrice || priceInput.value;
            quantityInput.value = option.dataset.productQuantity || quantityInput.value || '1';
            quantityDisplay.value = quantityInput.value;
            syncEditableState(row);
        };

        const refreshProductOptions = () => {
            const selectedIds = getSelectedProductIds();

            itemsList.querySelectorAll('.item-row').forEach((row) => {
                const select = row.querySelector('[data-product-select]');
                if (!select) return;

                const currentValue = select.value;
                select.querySelectorAll('option').forEach((option) => {
                    if (!option.value) {
                        option.disabled = false;
                        return;
                    }

                    option.disabled = selectedIds.includes(option.value) && option.value !== currentValue;
                });
            });
        };

        const rebuildIndexes = () => {
            itemsList.querySelectorAll('.item-row').forEach((row, index) => {
                row.querySelectorAll('[name]').forEach((input) => {
                    const field = input.name.split('][').pop().replace(']', '');
                    input.name = `items[${index}][${field}]`;
                });

                row.querySelectorAll('[data-name]').forEach((input) => {
                    const field = input.dataset.name;
                    input.name = `items[${index}][${field}]`;
                });
            });
        };

        itemsList.querySelectorAll('.item-row').forEach((row) => {
            const select = row.querySelector('[data-product-select]');
            if (select) {
                select.addEventListener('change', () => {
                    const selectedId = select.value;
                    const duplicate = selectedId && getSelectedProductIds(row).includes(selectedId);

                    if (duplicate) {
                        alert('Ese producto ya está agregado en otra fila de la misma factura.');
                        select.value = '';
                    }

                    syncRowFromProduct(row);
                    refreshProductOptions();
                });
                syncRowFromProduct(row);
            }
        });

        refreshProductOptions();

        addItemButton.addEventListener('click', () => {
            const fragment = template.content.cloneNode(true);
            const row = fragment.querySelector('.item-row');
            row.querySelectorAll('[data-name]').forEach((input) => {
                const field = input.dataset.name;
                input.name = `items[${itemsList.querySelectorAll('.item-row').length}][${field}]`;
            });
            const select = row.querySelector('[data-product-select]');
            if (select) {
                select.addEventListener('change', () => {
                    const selectedId = select.value;
                    const duplicate = selectedId && getSelectedProductIds(row).includes(selectedId);

                    if (duplicate) {
                        alert('Ese producto ya está agregado en otra fila de la misma factura.');
                        select.value = '';
                    }

                    syncRowFromProduct(row);
                    refreshProductOptions();
                });
            }
            itemsList.appendChild(fragment);
            rebuildIndexes();
            syncRowFromProduct(row);
            refreshProductOptions();
        });
    </script>
</body>

</html>
