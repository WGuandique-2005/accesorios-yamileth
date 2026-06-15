<!-- Navbar Component para Laravel (Guest & Logged In) -->
<nav class="sticky top-0 z-50 border-b border-gray-100 bg-white shadow-sm" data-navbar>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between gap-4">
            <div class="flex-shrink-0 flex items-center">
                <img src="{{ asset('images/logo.jpeg')}}" alt="Accesorios Yamileth" class="mr-3 h-10 w-auto rounded-full object-cover shadow-sm">
                <span class="font-serif text-2xl font-bold tracking-tight text-[#8A486F]">
                    Accesorios Yamileth
                </span>
            </div>

            <div class="hidden items-center space-x-8 md:flex">
                @auth
                    <a href="{{ route('home') }}" class="font-medium text-gray-600 transition-colors hover:text-[#8A486F]">Productos</a>
                    <a href="{{ route('mis-encargos') }}" class="font-medium text-gray-600 transition-colors hover:text-[#8A486F]">Mis Pedidos</a>
                    <a href="{{ route('perfil.show') }}" class="font-medium text-gray-600 transition-colors hover:text-[#8A486F]">Mi Perfil</a>
                    @if (Auth::user()->rol === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="font-medium text-gray-600 transition-colors hover:text-[#8A486F]">Admin</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="rounded-full bg-[#8A486F] px-6 py-2 font-semibold text-white shadow-md transition-all hover:bg-[#733b5c] active:scale-95">
                            Cerrar Sesión
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="font-medium text-gray-600 transition-colors hover:text-[#8A486F]">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="rounded-full bg-[#8A486F] px-6 py-2 font-semibold text-white shadow-md transition-all hover:bg-[#733b5c] active:scale-95">
                        Registrarse
                    </a>
                @endauth
            </div>

            <div class="md:hidden">
                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-full border border-gray-200 bg-white p-3 text-gray-600 shadow-sm transition-colors hover:border-[#8A486F] hover:text-[#8A486F] focus:outline-none focus:ring-2 focus:ring-[#8A486F]/30"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
                    data-nav-toggle>
                    <span class="sr-only">Abrir menú</span>
                    <svg class="h-6 w-6" data-nav-icon-open fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6" data-nav-icon-close fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="hidden border-t border-gray-100 bg-white md:hidden" id="mobile-menu" data-nav-menu>
        <div class="mx-auto max-w-7xl space-y-1 px-4 py-4 sm:px-6">
            @auth
                <a href="{{ route('home') }}" class="block rounded-lg px-4 py-3 font-medium text-gray-700 transition-colors hover:bg-[#FDF0F4] hover:text-[#8A486F]">Productos</a>
                <a href="{{ route('mis-encargos') }}" class="block rounded-lg px-4 py-3 font-medium text-gray-700 transition-colors hover:bg-[#FDF0F4] hover:text-[#8A486F]">Mis Pedidos</a>
                <a href="{{ route('perfil.show') }}" class="block rounded-lg px-4 py-3 font-medium text-gray-700 transition-colors hover:bg-[#FDF0F4] hover:text-[#8A486F]">Mi Perfil</a>
                @if (Auth::user()->rol === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block rounded-lg px-4 py-3 font-medium text-gray-700 transition-colors hover:bg-[#FDF0F4] hover:text-[#8A486F]">Admin</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="pt-2">
                    @csrf
                    <button type="submit" class="w-full rounded-full bg-[#8A486F] px-4 py-3 font-semibold text-white shadow-md transition-all hover:bg-[#733b5c] active:scale-95">
                        Cerrar Sesión
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block rounded-lg px-4 py-3 font-medium text-gray-700 transition-colors hover:bg-[#FDF0F4] hover:text-[#8A486F]">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="mt-2 block rounded-full bg-[#8A486F] px-4 py-3 text-center font-semibold text-white shadow-md transition-all hover:bg-[#733b5c] active:scale-95">
                    Registrarse
                </a>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const nav = document.querySelector('[data-navbar]');
        const toggle = nav?.querySelector('[data-nav-toggle]');
        const menu = nav?.querySelector('[data-nav-menu]');
        const openIcon = nav?.querySelector('[data-nav-icon-open]');
        const closeIcon = nav?.querySelector('[data-nav-icon-close]');
        if (!toggle || !menu) return;

        const setOpen = (isOpen) => {
            menu.classList.toggle('hidden', !isOpen);
            toggle.setAttribute('aria-expanded', String(isOpen));
            openIcon?.classList.toggle('hidden', isOpen);
            closeIcon?.classList.toggle('hidden', !isOpen);
        };

        toggle.addEventListener('click', () => {
            setOpen(menu.classList.contains('hidden'));
        });

        menu.querySelectorAll('a, button[type="submit"]').forEach((item) => {
            item.addEventListener('click', () => setOpen(false));
        });

        document.addEventListener('click', (event) => {
            if (!nav.contains(event.target)) {
                setOpen(false);
            }
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
