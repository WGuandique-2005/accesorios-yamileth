<!-- Footer Component para Laravel -->
<footer class="bg-[#FFF8F8] border-t border-[#E3D7DB] pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <!-- Brand Column -->
            <div class="col-span-1 md:col-span-1">
                <h3 class="font-serif text-2xl font-bold text-[#8A486F] mb-4">Accesorios Yamileth</h3>
                <p class="text-gray-600 leading-relaxed">
                    Elegancia y sencillez en cada detalle. Joyería exclusiva artesanal para resaltar tu brillo natural.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-bold text-gray-900 mb-6 uppercase tracking-wider text-sm">Explorar</h4>
                <ul class="space-y-4">
                    <li><a href="{{ url('/') }}" class="text-gray-600 hover:text-[#8A486F] transition-colors">Inicio</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-gray-600 hover:text-[#8A486F] transition-colors">Colecciones</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-[#8A486F] transition-colors">Novedades</a></li>
                </ul>
            </div>

            <!-- Customer Service -->
            <div>
                <h4 class="font-bold text-gray-900 mb-6 uppercase tracking-wider text-sm">Servicio al Cliente</h4>
                <ul class="space-y-4">
                    <li><a href="#" class="text-gray-600 hover:text-[#8A486F] transition-colors">Guía de Envíos</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-[#8A486F] transition-colors">Política de Privacidad</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-[#8A486F] transition-colors">Contacto</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div>
                <h4 class="font-bold text-gray-900 mb-6 uppercase tracking-wider text-sm">Síguenos</h4>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-white rounded-full shadow-sm flex items-center justify-center text-gray-400 hover:text-[#8A486F] hover:shadow-md transition-all">
                        <span class="sr-only">Instagram</span>
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white rounded-full shadow-sm flex items-center justify-center text-gray-400 hover:text-[#8A486F] hover:shadow-md transition-all">
                        <span class="sr-only">Facebook</span>
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-[#E3D7DB]/50 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} Accesorios Yamileth. Todos los derechos reservados.</p>
            <div class="flex space-x-6">
                <span>Pago contra entrega</span>
                <span>Envíos a todo el país</span>
            </div>
        </div>
    </div>
</footer>