<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento de envíos | Accesorios Yamileth</title>
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
                <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Seguimiento de envíos</h1>
                <p class="mt-2 text-gray-600">Controla el retiro del cliente y el cobro a la agencia.</p>
            </div>
        </div>

        <form class="mb-5 flex flex-wrap gap-3" method="GET">
            <input type="number" name="pedido" value="{{ request('pedido') }}" min="1"
                class="w-40 rounded-full border-gray-300 px-4 py-2 text-sm" placeholder="N° pedido">
            <button class="rounded-full bg-[#8A486F] px-5 py-2 text-sm font-bold text-white">Filtrar</button>
            @if (request('pedido'))
                <a href="{{ route('admin.envios.index') }}"
                    class="rounded-full border border-gray-300 px-5 py-2 text-sm font-semibold text-gray-700">Limpiar</a>
            @endif
        </form>

        @if (session('success'))
            <div class="mb-5 rounded-lg bg-green-50 px-4 py-3 text-green-700">{{ session('success') }}</div>
        @endif

        <section class="admin-table-shell">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[1100px] text-left text-sm">
                    <thead class="bg-[#FDF0F4] text-gray-600">
                        <tr>
                            <th class="p-4">N° Pedido</th>
                            <th class="p-4">Estado</th>
                            <th class="p-4">Cliente</th>
                            <th class="p-4">Lugar donde se recibirá</th>
                            <th class="p-4">Agencia</th>
                            <th class="p-4">Fecha envío</th>
                            <th class="p-4">Límite retiro</th>
                            <th class="p-4">¿Retiró?</th>
                            <th class="p-4">¿Cobrado?</th>
                            <th class="p-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($shipments as $shipment)
                            @php $locked = $shipment->isLockedForUpdates(); @endphp
                            <tr>
                                <td class="p-4 font-semibold text-[#8A486F]">
                                    #{{ $shipment->order_id }}
                                </td>
                                <td class="p-4">
                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-bold {{ $shipment->estado_badge['class'] }}">
                                        {{ $shipment->estado_badge['label'] }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <p class="font-semibold">{{ $shipment->order?->user?->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $shipment->order?->user?->email }}</p>
                                </td>
                                <td class="p-4">
                                    <p class="font-medium">{{ $shipment->order?->lugar_de_recibir ?: 'No especificado' }}</p>
                                </td>
                                <td class="p-4">
                                    <div class="flex flex-col gap-2">
                                        <input type="text" value="{{ $shipment->agencia }}"
                                            data-agency-input="{{ $shipment->id }}"
                                            @disabled($locked)
                                            class="w-full rounded-lg border-gray-300 px-3 py-2 text-sm {{ $locked ? 'bg-gray-100 text-gray-500 cursor-not-allowed' : '' }}">
                                        <button type="button" data-toggle-url="{{ route('admin.envios.update', $shipment) }}"
                                            data-field="agencia"
                                            data-id="{{ $shipment->id }}"
                                            @disabled($locked)
                                            class="shipment-agency-save rounded-full border border-gray-300 px-3 py-1 text-xs font-semibold text-gray-700 disabled:cursor-not-allowed disabled:opacity-50">
                                            {{ $locked ? 'Bloqueado' : 'Guardar agencia' }}
                                        </button>
                                    </div>
                                </td>
                                <td class="p-4">{{ $shipment->fecha_envio->format('d/m/Y') }}</td>
                                <td class="p-4">{{ $shipment->fecha_limite_retiro->format('d/m/Y') }}</td>
                                <td class="p-4">
                                    <span data-badge-retiro="{{ $shipment->id }}"
                                        class="inline-flex rounded-full px-3 py-1 text-xs font-bold {{ $shipment->cliente_retiro ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                        {{ $shipment->cliente_retiro ? 'Sí' : 'No' }}
                                    </span>
                                    <button data-toggle-url="{{ route('admin.envios.update', $shipment) }}"
                                        data-field="cliente_retiro"
                                        data-next-value="{{ $shipment->cliente_retiro ? 'false' : 'true' }}"
                                        data-confirm-label="{{ $shipment->cliente_retiro ? 'quitar retiro' : 'marcar retiro' }}"
                                        @disabled($locked)
                                        class="shipment-toggle mt-2 block rounded-full border border-gray-300 px-3 py-1 text-xs font-semibold text-gray-700 disabled:cursor-not-allowed disabled:opacity-50">
                                        {{ $locked ? 'Bloqueado' : ($shipment->cliente_retiro ? 'Quitar retiro' : 'Cliente retiró') }}
                                    </button>
                                </td>
                                <td class="p-4">
                                    <span data-badge-cobro="{{ $shipment->id }}"
                                        class="inline-flex rounded-full px-3 py-1 text-xs font-bold {{ $shipment->admin_cobro ? 'bg-purple-100 text-purple-700' : 'bg-gray-100 text-gray-600' }}">
                                        {{ $shipment->admin_cobro ? 'Sí' : 'No' }}
                                    </span>
                                    <button data-toggle-url="{{ route('admin.envios.update', $shipment) }}"
                                        data-field="admin_cobro"
                                        data-next-value="{{ $shipment->admin_cobro ? 'false' : 'true' }}"
                                        data-confirm-label="{{ $shipment->admin_cobro ? 'quitar cobro' : 'marcar cobro' }}"
                                        @disabled($locked)
                                        class="shipment-toggle mt-2 block rounded-full border border-gray-300 px-3 py-1 text-xs font-semibold text-gray-700 disabled:cursor-not-allowed disabled:opacity-50">
                                        {{ $locked ? 'Bloqueado' : ($shipment->admin_cobro ? 'Quitar cobro' : 'Ya cobré') }}
                                    </button>
                                </td>
                                <td class="p-4">
                                    <a href="{{ route('admin.pedidos.show', $shipment->order_id) }}"
                                        class="font-semibold text-[#8A486F] hover:underline">Ver pedido</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="p-8 text-center text-gray-500">No hay seguimientos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="border-t p-4">{{ $shipments->links() }}</div>
        </section>
        </div>
    </main>

    <div class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 px-4" data-shipment-confirm-modal>
        <div class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-2xl">
            <div class="flex items-center justify-between gap-3">
                <h2 class="text-2xl font-bold text-[#8A486F]">Confirmar acción</h2>
                <button type="button" data-shipment-confirm-close class="text-gray-500 hover:text-[#8A486F]">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <p class="mt-4 text-sm text-gray-600">
                ¿Seguro que quieres <strong data-shipment-confirm-text></strong>?
            </p>
            <div class="mt-6 flex gap-3">
                <button type="button" data-shipment-confirm-yes
                    class="rounded-full bg-[#8A486F] px-5 py-3 font-bold text-white">Sí, confirmar</button>
                <button type="button" data-shipment-confirm-close
                    class="rounded-full border border-gray-300 px-5 py-3 font-semibold text-gray-700">Cancelar</button>
            </div>
        </div>
    </div>

    <script>
        const shipmentConfirmModal = document.querySelector('[data-shipment-confirm-modal]');
        const shipmentConfirmText = document.querySelector('[data-shipment-confirm-text]');
        const shipmentConfirmYes = document.querySelector('[data-shipment-confirm-yes]');
        const shipmentConfirmCloseButtons = document.querySelectorAll('[data-shipment-confirm-close]');
        let pendingShipmentAction = null;

        const setShipmentConfirmModal = (isOpen) => {
            if (!shipmentConfirmModal) return;
            shipmentConfirmModal.classList.toggle('hidden', !isOpen);
            shipmentConfirmModal.classList.toggle('flex', isOpen);
            document.body.style.overflow = isOpen ? 'hidden' : '';
        };

        document.querySelectorAll('.shipment-toggle').forEach((button) => {
            button.addEventListener('click', async () => {
                if (button.disabled) return;
                const field = button.dataset.field;
                const nextValue = button.dataset.nextValue === 'true';
                const confirmLabel = button.dataset.confirmLabel || 'realizar este cambio';

                const runToggle = async () => {
                    const response = await fetch(button.dataset.toggleUrl, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ [field]: nextValue }),
                    });

                    const data = await response.json();
                    if (!data.success) return;

                    if (field === 'cliente_retiro') {
                        const badge = button.parentElement.querySelector('[data-badge-retiro]');
                        if (badge) {
                            badge.textContent = data.cliente_retiro ? 'Sí' : 'No';
                            badge.className = 'inline-flex rounded-full px-3 py-1 text-xs font-bold ' + (data.cliente_retiro ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600');
                        }
                        button.dataset.nextValue = data.cliente_retiro ? 'false' : 'true';
                        button.dataset.confirmLabel = data.cliente_retiro ? 'quitar retiro' : 'marcar retiro';
                        button.textContent = data.cliente_retiro ? 'Quitar retiro' : 'Cliente retiró';
                    }

                    if (field === 'admin_cobro') {
                        const badge = button.parentElement.querySelector('[data-badge-cobro]');
                        if (badge) {
                            badge.textContent = data.admin_cobro ? 'Sí' : 'No';
                            badge.className = 'inline-flex rounded-full px-3 py-1 text-xs font-bold ' + (data.admin_cobro ? 'bg-purple-100 text-purple-700' : 'bg-gray-100 text-gray-600');
                        }
                        button.dataset.nextValue = data.admin_cobro ? 'false' : 'true';
                        button.dataset.confirmLabel = data.admin_cobro ? 'quitar cobro' : 'marcar cobro';
                        button.textContent = data.admin_cobro ? 'Quitar cobro' : 'Ya cobré';
                    }
                };

                pendingShipmentAction = runToggle;
                if (shipmentConfirmText) {
                    shipmentConfirmText.textContent = confirmLabel;
                }
                setShipmentConfirmModal(true);
            });
        });

        shipmentConfirmYes?.addEventListener('click', async () => {
            const action = pendingShipmentAction;
            pendingShipmentAction = null;
            setShipmentConfirmModal(false);
            if (action) {
                await action();
            }
        });

        shipmentConfirmCloseButtons.forEach((button) => {
            button.addEventListener('click', () => {
                pendingShipmentAction = null;
                setShipmentConfirmModal(false);
            });
        });

        shipmentConfirmModal?.addEventListener('click', (event) => {
            if (event.target === shipmentConfirmModal) {
                pendingShipmentAction = null;
                setShipmentConfirmModal(false);
            }
        });

        document.querySelectorAll('.shipment-agency-save').forEach((button) => {
            button.addEventListener('click', async () => {
                if (button.disabled) return;
                const id = button.dataset.id;
                const input = document.querySelector(`[data-agency-input="${id}"]`);
                const response = await fetch(button.dataset.toggleUrl, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ agencia: input?.value ?? '' }),
                });

                const data = await response.json();
                if (!data.success) return;

                if (input) {
                    input.value = data.agencia;
                }
            });
        });
    </script>
</body>

</html>
