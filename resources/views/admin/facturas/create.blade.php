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

    <main class="admin-main">
        <div class="admin-page">
            <div class="mb-8">
                <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Registrar factura</h1>
                <p class="mt-2 text-gray-600">
                    Selecciona un producto y luego un lote existente para documentarlo. Si un ítem no va ligado a inventario, puedes llenarlo manualmente.
                </p>
            </div>

            @if (session('success'))
                <div class="mb-5 rounded-lg bg-green-50 px-4 py-3 text-green-700">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="mb-5 rounded-lg bg-red-50 px-4 py-3 text-red-700">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @php
                $productCatalog = $products->mapWithKeys(function ($product) {
                    return [
                        (string) $product->id => [
                            'nombre' => $product->nombre,
                            'cantidad_stock' => (int) $product->cantidad_stock,
                            'imagen' => $product->imagen_principal ? asset('storage/' . $product->imagen_principal) : asset('images/logo.jpeg'),
                            'batches' => $product->batches->map(function ($batch) {
                                return [
                                    'id' => $batch->id,
                                    'cantidad_inicial' => (int) $batch->cantidad_inicial,
                                    'cantidad_disponible' => (int) $batch->cantidad_disponible,
                                    'precio_inversion' => (float) $batch->precio_inversion,
                                    'fecha_ingreso' => $batch->fecha_ingreso?->format('d/m/Y'),
                                    'invoice_item_id' => $batch->invoice_item_id,
                                    'invoice_id' => $batch->invoiceItem?->invoice?->id,
                                    'label' => 'Lote #' . $batch->id . ' - ' . ($batch->fecha_ingreso?->format('d/m/Y') ?? 'sin fecha'),
                                ];
                            })->values(),
                        ],
                    ];
                })->toArray();

                $initialItems = old('items');

                if (! is_array($initialItems) || empty($initialItems)) {
                    if ($selectedBatch) {
                        $initialItems = [[
                            'nombre_producto' => $selectedBatch->product?->nombre ?? '',
                            'cantidad' => $selectedBatch->cantidad_inicial,
                            'precio_unitario_temu' => $selectedBatch->precio_inversion,
                            'product_id' => $selectedBatch->product_id,
                            'product_batch_id' => $selectedBatch->id,
                        ]];
                    } else {
                        $initialItems = [[
                            'nombre_producto' => '',
                            'cantidad' => 1,
                            'precio_unitario_temu' => '',
                            'product_id' => '',
                            'product_batch_id' => '',
                        ]];
                    }
                }
            @endphp

            <form method="POST" action="{{ route('admin.facturas.store') }}" id="invoice-form" class="space-y-6">
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
                            <h2 class="text-xl font-bold text-[#8A486F]">Ítems de la factura</h2>
                            <p class="text-sm text-gray-600">Si eliges un producto, debes escoger uno de sus lotes disponibles. Los valores se toman del lote.</p>
                        </div>
                        <button type="button" id="add-item"
                            class="rounded-full border border-[#8A486F] px-4 py-2 text-sm font-bold text-[#8A486F]">
                            Agregar ítem
                        </button>
                    </div>

                    <div id="items-list" class="space-y-4">
                        @if ($products->isEmpty())
                            <div class="rounded-lg border border-yellow-200 bg-yellow-50 p-4 text-sm text-yellow-800">
                                No hay productos cargados en inventario para seleccionar. Puedes registrar ítems manuales.
                            </div>
                        @endif

                        @foreach ($initialItems as $index => $item)
                            @php
                                $productId = (string) ($item['product_id'] ?? '');
                                $batchId = (string) ($item['product_batch_id'] ?? '');
                            @endphp
                            <div class="item-row grid gap-4 rounded-lg border border-gray-200 p-4 lg:grid-cols-12"
                                data-initial-product-id="{{ $productId }}"
                                data-initial-batch-id="{{ $batchId }}"
                                data-initial-name="{{ $item['nombre_producto'] ?? '' }}"
                                data-initial-quantity="{{ $item['cantidad'] ?? 1 }}"
                                data-initial-price="{{ $item['precio_unitario_temu'] ?? '' }}">
                                <div class="lg:col-span-12 space-y-4">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <span class="block text-sm font-semibold text-gray-700">Producto</span>
                                            <p class="text-xs text-gray-500">Elige una tarjeta para cargar el lote. Si no eliges nada, esta fila queda libre.</p>
                                        </div>
                                    </div>

                                    <select name="items[{{ $index }}][product_id]" data-product-select class="hidden" aria-hidden="true" tabindex="-1">
                                        <option value="">Sin vincular</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}"
                                                data-product-name="{{ $product->nombre }}"
                                                data-product-image="{{ $product->imagen_principal ? asset('storage/' . $product->imagen_principal) : asset('images/logo.jpeg') }}"
                                                @selected($productId === (string) $product->id)>
                                                {{ $product->nombre }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-3" data-product-picker>
                                        @foreach ($products as $product)
                                            <button type="button"
                                                class="group overflow-hidden rounded-2xl border border-gray-200 bg-white text-left shadow-sm transition hover:-translate-y-0.5 hover:border-[#8A486F] hover:shadow-md"
                                                data-product-card
                                                data-product-id="{{ $product->id }}"
                                                data-product-name="{{ $product->nombre }}"
                                                data-product-image="{{ $product->imagen_principal ? asset('storage/' . $product->imagen_principal) : asset('images/logo.jpeg') }}">
                                                <div class="aspect-[4/3] bg-[#FDF0F4]">
                                                    <img src="{{ $product->imagen_principal ? asset('storage/' . $product->imagen_principal) : asset('images/logo.jpeg') }}"
                                                        alt="{{ $product->nombre }}" class="h-full w-full object-cover">
                                                </div>
                                                <div class="space-y-2 p-4">
                                                    <div>
                                                    <p class="min-h-[2.5rem] text-sm font-bold leading-snug text-[#8A486F]">{{ $product->nombre }}</p>
                                                    <p class="mt-1 text-xs text-gray-500">
                                                        {{ $product->batches->count() }} lote(s) disponibles
                                                    </p>
                                                </div>
                                                    <div class="flex items-center justify-between gap-3">
                                                        <span class="text-xs font-semibold text-gray-500">
                                                            Stock: {{ $product->cantidad_stock }}
                                                        </span>
                                                        <span class="rounded-full bg-[#FDF0F4] px-2.5 py-1 text-[11px] font-semibold text-[#8A486F]">
                                                            Ver lotes
                                                        </span>
                                                    </div>
                                                </div>
                                            </button>
                                        @endforeach
                                    </div>

                                    <div data-batch-panel class="rounded-2xl border border-gray-200 bg-[#FDF0F4]/60 p-4">
                                        <div class="grid gap-4 lg:grid-cols-[1fr_280px] lg:items-end">
                                            <label class="block">
                                                <span class="mb-1 block text-sm font-semibold text-gray-700">Lote</span>
                                                <select name="items[{{ $index }}][product_batch_id]" data-product-batch-select
                                                    class="w-full rounded-lg border-gray-300 bg-white">
                                                    <option value="">Selecciona un producto primero</option>
                                                </select>
                                            </label>
                                            <div class="rounded-xl bg-white p-3 text-xs text-gray-600" data-batch-info>
                                                Selecciona un producto para ver sus lotes disponibles.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <label class="block lg:col-span-4">
                                    <span class="mb-1 block text-sm font-semibold text-gray-700">Nombre del producto</span>
                                    <input type="text" name="items[{{ $index }}][nombre_producto]" data-product-name-input
                                        value="{{ $item['nombre_producto'] ?? '' }}" maxlength="255"
                                        class="w-full rounded-lg border-gray-300" placeholder="Se usa si no hay producto creado">
                                </label>

                                <label class="block lg:col-span-2">
                                    <span class="mb-1 block text-sm font-semibold text-gray-700">Cantidad</span>
                                    <input type="number" min="1" name="items[{{ $index }}][cantidad]" data-quantity-input
                                        value="{{ $item['cantidad'] ?? 1 }}" class="w-full rounded-lg border-gray-300">
                                </label>

                                <label class="block lg:col-span-2">
                                    <span class="mb-1 block text-sm font-semibold text-gray-700">Costo unitario</span>
                                    <input type="number" min="0" step="0.01" name="items[{{ $index }}][precio_unitario_temu]"
                                        data-unit-price-input value="{{ $item['precio_unitario_temu'] ?? '' }}"
                                        class="w-full rounded-lg border-gray-300">
                                </label>

                                <label class="block lg:col-span-2">
                                    <span class="mb-1 block text-sm font-semibold text-gray-700">Subtotal</span>
                                    <input type="text" data-subtotal-display readonly
                                        class="w-full rounded-lg border-gray-300 bg-gray-50 text-gray-500 cursor-not-allowed pointer-events-none"
                                        value="">
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <template id="item-template">
                        <div class="item-row grid gap-4 rounded-lg border border-gray-200 p-4 lg:grid-cols-12"
                            data-initial-product-id="" data-initial-batch-id=""
                            data-initial-name="" data-initial-quantity="1" data-initial-price="">
                            <div class="lg:col-span-12 space-y-4">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <span class="block text-sm font-semibold text-gray-700">Producto</span>
                                        <p class="text-xs text-gray-500">Elige una tarjeta para cargar el lote. Si no eliges nada, esta fila queda libre.</p>
                                    </div>
                                </div>

                                <select data-name="product_id" data-product-select class="hidden" aria-hidden="true" tabindex="-1">
                                    <option value="">Sin vincular</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            data-product-name="{{ $product->nombre }}"
                                            data-product-image="{{ $product->imagen_principal ? asset('storage/' . $product->imagen_principal) : asset('images/logo.jpeg') }}">
                                            {{ $product->nombre }}
                                        </option>
                                    @endforeach
                                </select>

                                <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-3" data-product-picker>
                                    @foreach ($products as $product)
                                        <button type="button"
                                            class="group overflow-hidden rounded-2xl border border-gray-200 bg-white text-left shadow-sm transition hover:-translate-y-0.5 hover:border-[#8A486F] hover:shadow-md"
                                            data-product-card
                                            data-product-id="{{ $product->id }}"
                                            data-product-name="{{ $product->nombre }}"
                                            data-product-image="{{ $product->imagen_principal ? asset('storage/' . $product->imagen_principal) : asset('images/logo.jpeg') }}">
                                            <div class="aspect-[4/3] bg-[#FDF0F4]">
                                                <img src="{{ $product->imagen_principal ? asset('storage/' . $product->imagen_principal) : asset('images/logo.jpeg') }}"
                                                    alt="{{ $product->nombre }}" class="h-full w-full object-cover">
                                            </div>
                                            <div class="space-y-2 p-4">
                                                <div>
                                                    <p class="min-h-[2.5rem] text-sm font-bold leading-snug text-[#8A486F]">{{ $product->nombre }}</p>
                                                    <p class="mt-1 text-xs text-gray-500">
                                                        {{ $product->batches->count() }} lote(s) disponibles
                                                    </p>
                                                </div>
                                                <div class="flex items-center justify-between gap-3">
                                                    <span class="text-xs font-semibold text-gray-500">
                                                        Stock: {{ $product->cantidad_stock }}
                                                    </span>
                                                    <span class="rounded-full bg-[#FDF0F4] px-2.5 py-1 text-[11px] font-semibold text-[#8A486F]">
                                                        Ver lotes
                                                    </span>
                                                </div>
                                            </div>
                                        </button>
                                    @endforeach
                                </div>

                                <div data-batch-panel class="rounded-2xl border border-gray-200 bg-[#FDF0F4]/60 p-4">
                                    <div class="grid gap-4 lg:grid-cols-[1fr_280px] lg:items-end">
                                        <label class="block">
                                            <span class="mb-1 block text-sm font-semibold text-gray-700">Lote</span>
                                            <select data-name="product_batch_id" data-product-batch-select
                                                class="w-full rounded-lg border-gray-300 bg-white">
                                                <option value="">Selecciona un producto primero</option>
                                            </select>
                                        </label>
                                        <div class="rounded-xl bg-white p-3 text-xs text-gray-600" data-batch-info>
                                            Selecciona un producto para ver sus lotes disponibles.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <label class="block lg:col-span-4">
                                <span class="mb-1 block text-sm font-semibold text-gray-700">Nombre del producto</span>
                                <input type="text" data-name="nombre_producto" data-product-name-input maxlength="255"
                                    class="w-full rounded-lg border-gray-300" placeholder="Se usa si no hay producto creado">
                            </label>

                            <label class="block lg:col-span-2">
                                <span class="mb-1 block text-sm font-semibold text-gray-700">Cantidad</span>
                                <input type="number" min="1" data-name="cantidad" data-quantity-input value="1"
                                    class="w-full rounded-lg border-gray-300">
                            </label>

                            <label class="block lg:col-span-2">
                                <span class="mb-1 block text-sm font-semibold text-gray-700">Costo unitario</span>
                                <input type="number" min="0" step="0.01" data-name="precio_unitario_temu" data-unit-price-input value=""
                                    class="w-full rounded-lg border-gray-300">
                            </label>

                            <label class="block lg:col-span-2">
                                <span class="mb-1 block text-sm font-semibold text-gray-700">Subtotal</span>
                                <input type="text" data-subtotal-display readonly
                                    class="w-full rounded-lg border-gray-300 bg-gray-50 text-gray-500 cursor-not-allowed pointer-events-none"
                                    value="">
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
        </div>
    </main>

    <script>
        const productCatalog = @json($productCatalog);
        const itemsList = document.getElementById('items-list');
        const template = document.getElementById('item-template');
        const addItemButton = document.getElementById('add-item');
        const invoiceForm = document.getElementById('invoice-form');
        const currencyFormatter = new Intl.NumberFormat('es-SV', {
            style: 'currency',
            currency: 'USD',
        });

        const formatCurrency = (value) => currencyFormatter.format(Number(value) || 0);
        const roundToTwo = (value) => Math.round((Number(value) + Number.EPSILON) * 100) / 100;

        const getProductData = (productId) => productCatalog[String(productId)] || null;

        const getBatchData = (productId, batchId) => {
            const product = getProductData(productId);
            if (!product || !batchId) {
                return null;
            }

            return (product.batches || []).find((batch) => String(batch.id) === String(batchId)) || null;
        };

        const updateSubtotal = (row) => {
            const quantityInput = row.querySelector('[data-quantity-input]');
            const priceInput = row.querySelector('[data-unit-price-input]');
            const subtotalDisplay = row.querySelector('[data-subtotal-display]');

            if (!quantityInput || !priceInput || !subtotalDisplay) {
                return;
            }

            const quantity = Math.max(parseInt(quantityInput.value || '0', 10), 0);
            const price = Math.max(parseFloat(priceInput.value || '0'), 0);
            subtotalDisplay.value = formatCurrency(roundToTwo(quantity * price));
        };

        const setBatchInfo = (row, message) => {
            const batchInfo = row.querySelector('[data-batch-info]');
            if (batchInfo) {
                batchInfo.textContent = message;
            }
        };

        const syncProductCardState = (row) => {
            const productSelect = row.querySelector('[data-product-select]');
            const selectedProductId = productSelect?.value || '';

            row.querySelectorAll('[data-product-card]').forEach((card) => {
                const isSelected = String(card.dataset.productId) === String(selectedProductId);
                card.classList.toggle('ring-2', isSelected);
                card.classList.toggle('ring-[#8A486F]', isSelected);
                card.classList.toggle('border-[#8A486F]', isSelected);
                card.classList.toggle('bg-[#FFF6FA]', isSelected);
                card.setAttribute('aria-pressed', isSelected ? 'true' : 'false');
            });
        };

        const populateBatchSelect = (row, productId, selectedBatchId = '') => {
            const batchSelect = row.querySelector('[data-product-batch-select]');
            if (!batchSelect) {
                return null;
            }

            const product = getProductData(productId);
            if (!product) {
                batchSelect.innerHTML = '<option value="">Selecciona un producto primero</option>';
                batchSelect.disabled = true;
                return null;
            }

            const batches = product.batches || [];
            const availableBatches = batches.filter((batch) => !batch.invoice_item_id);

            batchSelect.disabled = false;
            batchSelect.innerHTML = '';

            if (!availableBatches.length) {
                batchSelect.innerHTML = '<option value="">No hay lotes disponibles</option>';
                batchSelect.disabled = true;
                setBatchInfo(row, 'No hay lotes disponibles para documentar en este producto.');
                return null;
            }

            batchSelect.appendChild(new Option('Selecciona un lote', ''));

            batches.forEach((batch) => {
                const label = `${batch.label}${batch.invoice_id ? ` - Factura #${batch.invoice_id}` : ''}`;
                const option = new Option(label, String(batch.id), false, false);
                option.disabled = Boolean(batch.invoice_item_id);
                batchSelect.appendChild(option);
            });

            const preferredBatch = selectedBatchId && availableBatches.some((batch) => String(batch.id) === String(selectedBatchId))
                ? String(selectedBatchId)
                : String(availableBatches[0].id);

            batchSelect.value = preferredBatch;

            const selectedBatch = getBatchData(productId, preferredBatch);
            if (selectedBatch) {
                setBatchInfo(
                    row,
                    `Lote #${selectedBatch.id} creado el ${selectedBatch.fecha_ingreso}. Cantidad: ${selectedBatch.cantidad_inicial}. Costo: ${formatCurrency(selectedBatch.precio_inversion)}.`
                );
            } else {
                setBatchInfo(row, 'Selecciona un lote para completar la fila.');
            }

            return selectedBatch;
        };

        const syncRowState = (row, preferredBatchId = '') => {
            const productSelect = row.querySelector('[data-product-select]');
            const batchSelect = row.querySelector('[data-product-batch-select]');
            const nameInput = row.querySelector('[data-product-name-input]');
            const quantityInput = row.querySelector('[data-quantity-input]');
            const priceInput = row.querySelector('[data-unit-price-input]');
            const batchPanel = row.querySelector('[data-batch-panel]');

            if (!productSelect || !batchSelect || !nameInput || !quantityInput || !priceInput || !batchPanel) {
                return;
            }

            const productId = productSelect.value || '';

            if (!productId) {
                batchPanel.classList.add('hidden');
                batchSelect.disabled = true;
                batchSelect.value = '';
                nameInput.readOnly = false;
                quantityInput.readOnly = false;
                priceInput.readOnly = false;
                if (!nameInput.value) {
                    nameInput.value = row.dataset.initialName || '';
                }
                if (!quantityInput.value) {
                    quantityInput.value = row.dataset.initialQuantity || 1;
                }
                if (!priceInput.value && row.dataset.initialPrice) {
                    priceInput.value = row.dataset.initialPrice;
                }
                syncProductCardState(row);
                setBatchInfo(row, 'Selecciona un producto para ver sus lotes disponibles.');
                updateSubtotal(row);
                return;
            }

            const product = getProductData(productId);
            nameInput.value = product?.nombre || nameInput.value;
            nameInput.readOnly = true;
            quantityInput.readOnly = true;
            priceInput.readOnly = true;
            batchPanel.classList.remove('hidden');

            const batch = populateBatchSelect(row, productId, preferredBatchId || batchSelect.value || row.dataset.initialBatchId || '');

            if (batch) {
                quantityInput.value = batch.cantidad_inicial;
                priceInput.value = Number(batch.precio_inversion).toFixed(2);
            } else {
                quantityInput.value = '';
                priceInput.value = '';
            }

            syncProductCardState(row);
            updateSubtotal(row);
        };

        const bindProductCards = (row) => {
            row.querySelectorAll('[data-product-card]').forEach((card) => {
                card.addEventListener('click', () => {
                    const select = row.querySelector('[data-product-select]');
                    if (!select) {
                        return;
                    }

                    select.value = card.dataset.productId || '';
                    syncRowState(row);
                });
            });
        };

        const bindRow = (row) => {
            const productSelect = row.querySelector('[data-product-select]');
            const batchSelect = row.querySelector('[data-product-batch-select]');
            const quantityInput = row.querySelector('[data-quantity-input]');
            const priceInput = row.querySelector('[data-unit-price-input]');
            const initialProductId = row.dataset.initialProductId || '';
            const initialBatchId = row.dataset.initialBatchId || '';

            if (productSelect) {
                productSelect.value = initialProductId;
                productSelect.addEventListener('change', () => syncRowState(row));
            }

            if (batchSelect) {
                batchSelect.addEventListener('change', () => {
                    const productId = productSelect?.value || '';
                    const batch = getBatchData(productId, batchSelect.value);

                    if (batch) {
                        row.querySelector('[data-product-name-input]').value = getProductData(productId)?.nombre || '';
                        quantityInput.value = batch.cantidad_inicial;
                        priceInput.value = Number(batch.precio_inversion).toFixed(2);
                    }

                    syncRowState(row, batchSelect.value);
                });
            }

            if (quantityInput) {
                quantityInput.addEventListener('input', () => updateSubtotal(row));
            }

            if (priceInput) {
                priceInput.addEventListener('input', () => updateSubtotal(row));
            }

            bindProductCards(row);
            syncRowState(row, initialBatchId);
            updateSubtotal(row);
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

        itemsList.querySelectorAll('.item-row').forEach((row) => bindRow(row));

        addItemButton.addEventListener('click', () => {
            const fragment = template.content.cloneNode(true);
            const row = fragment.querySelector('.item-row');
            itemsList.appendChild(fragment);
            rebuildIndexes();
            const lastRow = itemsList.querySelectorAll('.item-row');
            bindRow(lastRow[lastRow.length - 1]);
        });
    </script>
</body>

</html>
