@php
    $adminLinks = [
        ['label' => 'Dashboard', 'icon' => 'dashboard', 'route' => 'admin.dashboard'],
        ['label' => 'Inventario', 'icon' => 'inventory_2', 'route' => 'admin.inventario.index'],
        ['label' => 'Pedidos', 'icon' => 'shopping_bag', 'route' => 'admin.pedidos.index'],
        ['label' => 'Clientes', 'icon' => 'group', 'route' => 'admin.clientes.index'],
    ];
@endphp

<aside class="hidden md:flex fixed inset-y-0 left-0 w-64 flex-col border-r border-[#eadde3] bg-white">
    <div class="p-6 border-b border-[#eadde3]">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Accesorios Yamileth" class="h-12 w-12 rounded-full object-cover">
            <div>
                <h2 class="font-serif text-xl font-bold text-[#8A486F]">Yamileth Admin</h2>
                <p class="text-sm text-gray-500">Panel de gestión</p>
            </div>
        </div>
    </div>
    <nav class="flex-1 p-4 space-y-2">
        @foreach ($adminLinks as $link)
            @php
                $name = request()->route()?->getName() ?? '';
                $active = $name === $link['route'] || str_starts_with($name, str_replace('.index', '.', $link['route']));
            @endphp
            <a href="{{ route($link['route']) }}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-semibold {{ $active ? 'bg-[#F9A8D4] text-[#78395F]' : 'text-gray-600 hover:bg-[#FDF0F4] hover:text-[#8A486F]' }}">
                <span class="material-symbols-outlined text-[20px]">{{ $link['icon'] }}</span>
                {{ $link['label'] }}
            </a>
        @endforeach
    </nav>
    <div class="p-4 border-t border-[#eadde3] space-y-2">
        <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-semibold text-gray-600 hover:bg-[#FDF0F4]">
            <span class="material-symbols-outlined text-[20px]">storefront</span>
            Ver tienda
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm font-semibold text-red-600 hover:bg-red-50">
                <span class="material-symbols-outlined text-[20px]">logout</span>
                Cerrar sesión
            </button>
        </form>
    </div>
</aside>

<header class="md:hidden sticky top-0 z-40 border-b border-[#eadde3] bg-white px-4 py-3">
    <div class="flex items-center justify-between">
        <span class="font-serif text-xl font-bold text-[#8A486F]">Admin</span>
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-semibold text-[#8A486F]">Dashboard</a>
    </div>
</header>
