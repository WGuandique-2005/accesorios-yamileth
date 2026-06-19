@php
    $adminLinks = [
        ['label' => 'Dashboard', 'icon' => 'dashboard', 'route' => 'admin.dashboard'],
        ['label' => 'Reseñas', 'icon' => 'star_rate', 'route' => 'admin.resenas.index'],
        ['label' => 'Analítica', 'icon' => 'query_stats', 'route' => 'admin.analitica'],
        ['label' => 'Inventario', 'icon' => 'inventory_2', 'route' => 'admin.inventario.index'],
        ['label' => 'Pedidos', 'icon' => 'shopping_bag', 'route' => 'admin.pedidos.index'],
        ['label' => 'Facturas', 'icon' => 'receipt_long', 'route' => 'admin.facturas.index'],
        ['label' => 'Envíos', 'icon' => 'local_shipping', 'route' => 'admin.envios.index'],
        ['label' => 'Clientes', 'icon' => 'group', 'route' => 'admin.clientes.index'],
    ];
@endphp

<div data-admin-sidebar>
    <aside class="fixed inset-y-0 left-0 z-50 hidden w-64 flex-col border-r border-[#eadde3] bg-white md:flex">
        <div class="border-b border-[#eadde3] p-6">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Accesorios Yamileth"
                    class="h-12 w-12 rounded-full object-cover">
                <div>
                    <h2 class="font-serif text-xl font-bold text-[#8A486F]">Brisa Admin</h2>
                    <p class="text-sm text-gray-500">Panel de gestión</p>
                </div>
            </div>
        </div>
        <nav class="flex-1 space-y-2 p-4">
            @foreach ($adminLinks as $link)
                @php
                    $name = request()->route()?->getName() ?? '';
                    $active = $name === $link['route'] || str_starts_with($name, str_replace('.index', '.', $link['route']));
                @endphp
                <a href="{{ route($link['route']) }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-semibold {{ $active ? 'bg-[#F9A8D4] text-[#78395F]' : 'text-gray-600 hover:bg-[#FDF0F4] hover:text-[#8A486F]' }}">
                    <span class="material-symbols-outlined text-[20px]">{{ $link['icon'] }}</span>
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>
        <div class="space-y-2 border-t border-[#eadde3] p-4">
            <a href="{{ route('home') }}"
                class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-semibold text-gray-600 hover:bg-[#FDF0F4]">
                <span class="material-symbols-outlined text-[20px]">storefront</span>
                Ver tienda
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm font-semibold text-red-600 hover:bg-red-50">
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                    Cerrar sesión
                </button>
            </form>
        </div>
    </aside>

    <header class="sticky top-0 z-40 border-b border-[#eadde3] bg-white px-4 py-3 md:hidden">
        <div class="flex items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Accesorios Yamileth"
                    class="h-10 w-10 rounded-full object-cover">
                <div>
                    <span class="block font-serif text-lg font-bold text-[#8A486F]">Brisa Admin</span>
                    <span class="text-xs text-gray-500">Panel de gestión</span>
                </div>
            </div>
            <button type="button"
                class="inline-flex items-center justify-center rounded-full border border-gray-200 bg-white p-3 text-[#8A486F] shadow-sm transition-colors hover:bg-[#FDF0F4] focus:outline-none focus:ring-2 focus:ring-[#8A486F]/30"
                data-admin-sidebar-toggle aria-controls="admin-mobile-drawer" aria-expanded="false">
                <span class="sr-only">Abrir menú del admin</span>
                <span class="material-symbols-outlined text-[22px]" data-admin-sidebar-icon-open>menu</span>
                <span class="material-symbols-outlined hidden text-[22px]" data-admin-sidebar-icon-close>close</span>
            </button>
        </div>
    </header>

    <div class="fixed inset-0 z-40 hidden bg-black/50 backdrop-blur-sm md:hidden" data-admin-sidebar-backdrop></div>

    <aside id="admin-mobile-drawer"
        class="fixed inset-y-0 left-0 z-50 flex w-72 -translate-x-full flex-col border-r border-[#eadde3] bg-white shadow-2xl transition-transform duration-300 ease-out md:hidden"
        data-admin-sidebar-drawer>
        <div class="border-b border-[#eadde3] p-6">
            <div class="flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Accesorios Yamileth"
                        class="h-12 w-12 rounded-full object-cover">
                    <div>
                        <h2 class="font-serif text-xl font-bold text-[#8A486F]">Brisa Admin</h2>
                        <p class="text-sm text-gray-500">Panel de gestión</p>
                    </div>
                </div>
                <button type="button"
                    class="rounded-full p-2 text-gray-500 transition-colors hover:bg-[#FDF0F4] hover:text-[#8A486F]"
                    data-admin-sidebar-close>
                    <span class="sr-only">Cerrar menú</span>
                    <span class="material-symbols-outlined text-[22px]">close</span>
                </button>
            </div>
        </div>
        <nav class="flex-1 space-y-2 overflow-y-auto p-4">
            @foreach ($adminLinks as $link)
                @php
                    $name = request()->route()?->getName() ?? '';
                    $active = $name === $link['route'] || str_starts_with($name, str_replace('.index', '.', $link['route']));
                @endphp
                <a href="{{ route($link['route']) }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-semibold {{ $active ? 'bg-[#F9A8D4] text-[#78395F]' : 'text-gray-600 hover:bg-[#FDF0F4] hover:text-[#8A486F]' }}">
                    <span class="material-symbols-outlined text-[20px]">{{ $link['icon'] }}</span>
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>
        <div class="space-y-2 border-t border-[#eadde3] p-4">
            <a href="{{ route('home') }}"
                class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-semibold text-gray-600 hover:bg-[#FDF0F4]">
                <span class="material-symbols-outlined text-[20px]">storefront</span>
                Ver tienda
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm font-semibold text-red-600 hover:bg-red-50">
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                    Cerrar sesión
                </button>
            </form>
        </div>
    </aside>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const root = document.querySelector('[data-admin-sidebar]');
        const toggle = root?.querySelector('[data-admin-sidebar-toggle]');
        const closeButton = root?.querySelector('[data-admin-sidebar-close]');
        const drawer = root?.querySelector('[data-admin-sidebar-drawer]');
        const backdrop = root?.querySelector('[data-admin-sidebar-backdrop]');
        const openIcon = root?.querySelector('[data-admin-sidebar-icon-open]');
        const closeIcon = root?.querySelector('[data-admin-sidebar-icon-close]');

        if (!toggle || !drawer || !backdrop) return;

        const setOpen = (isOpen) => {
            drawer.classList.toggle('-translate-x-full', !isOpen);
            backdrop.classList.toggle('hidden', !isOpen);
            toggle.setAttribute('aria-expanded', String(isOpen));
            openIcon?.classList.toggle('hidden', isOpen);
            closeIcon?.classList.toggle('hidden', !isOpen);
            document.body.style.overflow = isOpen ? 'hidden' : '';
        };

        toggle.addEventListener('click', () => {
            setOpen(drawer.classList.contains('-translate-x-full'));
        });

        closeButton?.addEventListener('click', () => setOpen(false));
        backdrop.addEventListener('click', () => setOpen(false));

        drawer.querySelectorAll('a, button[type="submit"]').forEach((item) => {
            item.addEventListener('click', () => setOpen(false));
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                setOpen(false);
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                setOpen(false);
            }
        });
    });
</script>
