<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear encargo | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
@include('partials.navbar')

<main class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Finalizar encargo</h1>
        <p class="mt-2 text-gray-600">Selecciona tus productos y completa los datos de entrega.</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-lg bg-red-50 px-4 py-3 text-red-700">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('error'))
        <div class="mb-6 rounded-lg bg-red-50 px-4 py-3 text-red-700">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('encargos.store') }}" class="grid gap-8 lg:grid-cols-[1fr_360px]">
        @csrf

        <div class="space-y-6">
            <section class="rounded-xl bg-white p-6 shadow-sm">
                <h2 class="mb-4 text-xl font-bold text-[#8A486F]">Productos</h2>
                <div class="grid gap-4 sm:grid-cols-[1fr_130px_auto]">
                    <select id="productSelect" class="rounded-lg border-gray-300">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-name="{{ $product->nombre }}" data-price="{{ $product->precio_final }}" data-stock="{{ $product->cantidad_stock }}" data-image="{{ $product->imagen_ruta ? asset('storage/'.$product->imagen_ruta) : asset('images/logo.jpeg') }}">
                                {{ $product->nombre }} - ${{ number_format($product->precio_final, 2) }} ({{ $product->cantidad_stock }} disp.)
                            </option>
                        @endforeach
                    </select>
                    <input id="quantityInput" type="number" min="1" value="1" class="rounded-lg border-gray-300">
                    <button type="button" id="addProductBtn" class="rounded-lg bg-[#8A486F] px-4 py-2 font-semibold text-white hover:bg-[#733b5c]">Agregar</button>
                </div>
                <div id="itemsContainer" class="mt-5 space-y-3"></div>
            </section>

            <section class="rounded-xl bg-white p-6 shadow-sm">
                <h2 class="mb-4 text-xl font-bold text-[#8A486F]">Entrega</h2>
                <div class="grid gap-4 sm:grid-cols-2">
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Tipo</span>
                        <select name="envio_o_entrega" class="w-full rounded-lg border-gray-300" required>
                            <option value="Envío" @selected(old('envio_o_entrega') === 'Envío')>Envío</option>
                            <option value="Entrega" @selected(old('envio_o_entrega') === 'Entrega')>Entrega</option>
                        </select>
                    </label>
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Lugar de despacho</span>
                        <input name="lugar_despacho" value="{{ old('lugar_despacho') }}" maxlength="100" class="w-full rounded-lg border-gray-300" placeholder="Melo Express, Metrocentro...">
                    </label>
                    <label class="block sm:col-span-2">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Lugar de recibir</span>
                        <input name="lugar_de_recibir" value="{{ old('lugar_de_recibir') }}" maxlength="255" required class="w-full rounded-lg border-gray-300" placeholder="Dirección, sucursal o punto de encuentro">
                    </label>
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Fecha</span>
                        <input type="date" name="fecha" value="{{ old('fecha', now()->toDateString()) }}" min="{{ now()->toDateString() }}" required class="w-full rounded-lg border-gray-300">
                    </label>
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Hora recordatorio</span>
                        <input type="time" name="hora_recordatorio" value="{{ old('hora_recordatorio') }}" class="w-full rounded-lg border-gray-300">
                    </label>
                    <label class="block sm:col-span-2">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Notas</span>
                        <textarea name="notas" rows="3" maxlength="500" class="w-full rounded-lg border-gray-300" placeholder="Indicaciones especiales">{{ old('notas') }}</textarea>
                    </label>
                </div>
            </section>
        </div>

        <aside class="h-fit rounded-xl bg-white p-6 shadow-sm lg:sticky lg:top-24">
            <h2 class="text-xl font-bold text-[#8A486F]">Resumen</h2>
            <div id="summaryContainer" class="mt-4 space-y-3 text-sm text-gray-600"></div>
            <div class="mt-5 border-t pt-4">
                <div class="flex justify-between text-lg font-bold">
                    <span>Total</span>
                    <span id="totalLabel">$0.00</span>
                </div>
            </div>
            <button class="mt-6 w-full rounded-full bg-[#8A486F] px-6 py-3 font-bold text-white hover:bg-[#733b5c]">Confirmar encargo</button>
        </aside>
    </form>
</main>

@include('partials.footer')

<script>
    const selectedInitialId = @json($selectedProduct?->id);
    const oldProducts = @json(old('productos', []));
    const items = [];
    const select = document.getElementById('productSelect');
    const quantity = document.getElementById('quantityInput');
    const itemsContainer = document.getElementById('itemsContainer');
    const summaryContainer = document.getElementById('summaryContainer');
    const totalLabel = document.getElementById('totalLabel');

    function optionData(option) {
        return {
            id: option.value,
            name: option.dataset.name,
            price: parseFloat(option.dataset.price),
            stock: parseInt(option.dataset.stock, 10),
            image: option.dataset.image,
        };
    }

    function addItem(id = null, qty = null) {
        const option = id ? Array.from(select.options).find(item => item.value == id) : select.selectedOptions[0];
        if (!option) return;
        const data = optionData(option);
        const amount = parseInt(qty ?? quantity.value, 10);
        if (!amount || amount < 1 || amount > data.stock) return alert('Cantidad inválida o mayor al stock disponible.');
        const existing = items.find(item => item.id == data.id);
        if (existing) {
            existing.quantity = Math.min(data.stock, existing.quantity + amount);
        } else {
            items.push({ ...data, quantity: amount });
        }
        renderItems();
    }

    function removeItem(id) {
        const index = items.findIndex(item => item.id == id);
        if (index >= 0) items.splice(index, 1);
        renderItems();
    }

    function renderItems() {
        itemsContainer.innerHTML = '';
        summaryContainer.innerHTML = '';
        let total = 0;

        items.forEach((item, index) => {
            const subtotal = item.price * item.quantity;
            total += subtotal;
            itemsContainer.insertAdjacentHTML('beforeend', `
                <div class="flex items-center justify-between gap-4 rounded-lg border border-gray-100 p-3">
                    <div class="flex items-center gap-3">
                        <img src="${item.image}" class="h-12 w-12 rounded-lg object-cover" alt="">
                        <div>
                            <p class="font-semibold">${item.name}</p>
                            <p class="text-sm text-gray-500">$${item.price.toFixed(2)} x ${item.quantity}</p>
                        </div>
                    </div>
                    <button type="button" class="text-sm font-semibold text-red-600" onclick="removeItem('${item.id}')">Quitar</button>
                    <input type="hidden" name="productos[${index}][id]" value="${item.id}">
                    <input type="hidden" name="productos[${index}][cantidad]" value="${item.quantity}">
                </div>
            `);
            summaryContainer.insertAdjacentHTML('beforeend', `<div class="flex justify-between"><span>${item.name} x ${item.quantity}</span><span>$${subtotal.toFixed(2)}</span></div>`);
        });

        if (!items.length) {
            itemsContainer.innerHTML = '<p class="rounded-lg bg-[#FDF0F4] p-4 text-sm text-gray-600">Agrega al menos un producto.</p>';
            summaryContainer.innerHTML = '<p>No hay productos seleccionados.</p>';
        }

        totalLabel.textContent = `$${total.toFixed(2)}`;
    }

    document.getElementById('addProductBtn').addEventListener('click', () => addItem());

    if (oldProducts.length) {
        oldProducts.forEach(item => addItem(item.id, item.cantidad));
    } else if (selectedInitialId) {
        addItem(selectedInitialId, 1);
    } else {
        renderItems();
    }
</script>
</body>
</html>
