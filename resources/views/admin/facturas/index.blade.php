<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas admin | Accesorios Yamileth</title>
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
                <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Facturas de compra</h1>
                <p class="mt-2 text-gray-600">Registra las compras a Temu y distribuye el descuento entre productos.</p>
            </div>
            <a href="{{ route('admin.facturas.create') }}"
                class="w-fit rounded-full bg-[#8A486F] px-5 py-3 font-bold text-white">Nueva factura</a>
        </div>

        @if (session('success'))
            <div class="mb-5 rounded-lg bg-green-50 px-4 py-3 text-green-700">{{ session('success') }}</div>
        @endif

        <section class="mb-6 grid gap-4 sm:grid-cols-4">
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Facturas</p>
                <p class="text-2xl font-bold text-[#8A486F]">{{ $invoices->total() }}</p>
            </div>
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Ítems</p>
                <p class="text-2xl font-bold text-[#8A486F]">{{ $invoices->sum('items_count') }}</p>
            </div>
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Páginas</p>
                <p class="text-2xl font-bold text-[#8A486F]">{{ $invoices->lastPage() }}</p>
            </div>
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Resultados</p>
                <p class="text-2xl font-bold text-[#8A486F]">{{ $invoices->count() }}</p>
            </div>
        </section>

        <section class="overflow-hidden rounded-xl bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[980px] text-left text-sm">
                    <thead class="bg-[#FDF0F4] text-gray-600">
                        <tr>
                            <th class="p-4">N° Factura</th>
                            <th class="p-4">Fecha compra</th>
                            <th class="p-4">Ítems</th>
                            <th class="p-4">Inversión</th>
                            <th class="p-4">Descuento Temu</th>
                            <th class="p-4">Desc. por producto</th>
                            <th class="p-4">Notas</th>
                            <th class="p-4 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($invoices as $invoice)
                            <tr>
                                <td class="p-4 font-semibold text-[#8A486F]">
                                    {{ $invoice->numero_factura ?: 'Sin número' }}
                                </td>
                                <td class="p-4">{{ $invoice->fecha_compra->format('d/m/Y') }}</td>
                                <td class="p-4">{{ $invoice->items_count }}</td>
                                <td class="p-4 font-bold">${{ number_format($invoice->total_inversion, 2) }}</td>
                                <td class="p-4">${{ number_format($invoice->descuento_temu, 2) }}</td>
                                <td class="p-4">${{ number_format($invoice->descuento_por_producto, 2) }}</td>
                                <td class="p-4 text-gray-600">{{ $invoice->notas ?: 'Sin notas' }}</td>
                                <td class="p-4 text-right">
                                    <a href="{{ route('admin.facturas.show', $invoice) }}"
                                        class="font-semibold text-[#8A486F] hover:underline">Ver</a>
                                    <button type="button" class="ml-3 font-semibold text-red-600 hover:underline"
                                        data-delete-invoice
                                        data-delete-url="{{ route('admin.facturas.destroy', $invoice) }}"
                                        data-delete-title="Factura {{ $invoice->numero_factura ?: '#' . $invoice->id }}">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="p-8 text-center text-gray-500">No hay facturas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="border-t p-4">{{ $invoices->links() }}</div>
        </section>
    </main>

    <div id="delete-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 px-4">
        <div class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-2xl">
            <p class="text-sm font-semibold uppercase tracking-wide text-red-600">Confirmación</p>
            <h2 class="mt-2 text-2xl font-bold text-[#8A486F]">Eliminar factura</h2>
            <p class="mt-3 text-gray-600">
                Vas a eliminar <strong id="delete-modal-title"></strong>. Esta acción no se puede deshacer.
            </p>

            <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end">
                <button type="button" id="delete-modal-cancel"
                    class="rounded-full border border-gray-300 px-5 py-3 font-semibold text-gray-700">
                    Cancelar
                </button>
                <form id="delete-modal-form" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button class="rounded-full bg-red-600 px-5 py-3 font-bold text-white">
                        Sí, eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const deleteModal = document.getElementById('delete-modal');
        const deleteModalTitle = document.getElementById('delete-modal-title');
        const deleteModalForm = document.getElementById('delete-modal-form');
        const deleteModalCancel = document.getElementById('delete-modal-cancel');

        document.querySelectorAll('[data-delete-invoice]').forEach((button) => {
            button.addEventListener('click', () => {
                deleteModalTitle.textContent = button.dataset.deleteTitle || 'esta factura';
                deleteModalForm.action = button.dataset.deleteUrl;
                deleteModal.classList.remove('hidden');
                deleteModal.classList.add('flex');
            });
        });

        const closeDeleteModal = () => {
            deleteModal.classList.add('hidden');
            deleteModal.classList.remove('flex');
        };

        deleteModalCancel.addEventListener('click', closeDeleteModal);
        deleteModal.addEventListener('click', (event) => {
            if (event.target === deleteModal) {
                closeDeleteModal();
            }
        });
    </script>
</body>

</html>
