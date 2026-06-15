<!-- Navbar Component para Laravel (Guest & Logged In) -->
<nav class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo Section -->
            <div class="flex-shrink-0 flex items-center">
                    <img src="{{ asset('images/logo.jpeg')}}" alt="Accesorios Yamileth" class="h-10 w-auto rounded-full mr-3 object-cover shadow-sm">
                    <span class="font-serif text-2xl font-bold tracking-tight text-[#8A486F]">
                        Accesorios Yamileth
                    </span>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-gray-600 hover:text-[#8A486F] font-medium transition-colors">Productos</a>
                
                @auth
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#8A486F] font-medium transition-colors">Inicio</a>
                    <a href="#" class="text-gray-600 hover:text-[#8A486F] font-medium transition-colors">Mis Pedidos</a>
                    <a href="#" class="text-gray-600 hover:text-[#8A486F] font-medium transition-colors">Mi Perfil</a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-[#8A486F] text-white px-6 py-2 rounded-full font-semibold hover:bg-[#733b5c] transition-all transform active:scale-95 shadow-md">
                            Cerrar Sesión
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-[#8A486F] font-medium transition-colors">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="bg-[#8A486F] text-white px-6 py-2 rounded-full font-semibold hover:bg-[#733b5c] transition-all transform active:scale-95 shadow-md">
                        Registrarse
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>