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
                    <li><a href="#" class="text-gray-600 hover:text-[#8A486F] transition-colors">Colecciones</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-[#8A486F] transition-colors">Novedades</a></li>
                </ul>
            </div>

            <!-- Customer Service -->
            <div>
                <h4 class="font-bold text-gray-900 mb-6 uppercase tracking-wider text-sm">Servicio al Cliente</h4>
                <ul class="space-y-4">
                    <li><a href="#" class="text-gray-600 hover:text-[#8A486F] transition-colors">Guía de Envíos</a></li>
                    <li><button id="open-privacy-modal" class="text-gray-600 hover:text-[#8A486F] transition-colors cursor-pointer text-left focus:outline-none">Política de Privacidad</button></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div>
                <h4 class="font-bold text-gray-900 mb-6 uppercase tracking-wider text-sm">Síguenos</h4>
                <div class="flex flex-wrap gap-4">
                    <a href="https://www.instagram.com/yamileth.accesorios_?utm_source=ig_web_button_share_sheet&amp;igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-white rounded-full shadow-sm flex items-center justify-center text-[#6f3157] border border-[#f9a8d4]/40 hover:text-[#8A486F] hover:shadow-md transition-all">
                        <span class="sr-only">Instagram</span>
                        <span class="text-[11px] font-bold tracking-tight">IG</span>
                    </a>
                    <a href="https://www.facebook.com/yamileth.hernandez.539848" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-white rounded-full shadow-sm flex items-center justify-center text-[#6f3157] border border-[#f9a8d4]/40 hover:text-[#8A486F] hover:shadow-md transition-all">
                        <span class="sr-only">Facebook</span>
                        <span class="text-[13px] font-bold leading-none">f</span>
                    </a>
                    <a href="https://wa.me/50362080344" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-white rounded-full shadow-sm flex items-center justify-center text-[#6f3157] border border-[#f9a8d4]/40 hover:text-[#8A486F] hover:shadow-md transition-all">
                        <span class="sr-only">WhatsApp</span>
                        <span class="text-[10px] font-bold tracking-tight">WA</span>
                    </a>
                </div>
                <div class="mt-4">
                    <a href="https://wa.me/50362080344" target="_blank" rel="noopener noreferrer" class="text-[#6f3157] hover:text-[#8A486F] transition-colors font-medium">
                        WhatsApp: +503 6208 0344
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

<!-- Fuentes e Iconos de Google para garantizar la visualización en todas las vistas -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

<!-- Modal de Política de Privacidad -->
<div id="privacy-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Backdrop -->
        <div id="privacy-modal-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300 opacity-0" aria-hidden="true"></div>

        <!-- Truco para centrar verticalmente el modal en pantallas grandes -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <!-- Panel del Modal -->
        <div id="privacy-modal-panel" class="inline-block align-bottom bg-[#FFF8F8] rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full border border-[#E3D7DB] translate-y-4 opacity-0 duration-300">
            <!-- Encabezado -->
            <div class="bg-[#FFF0F0] px-6 py-4 border-b border-[#E3D7DB] flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <span class="material-symbols-outlined text-[#8A486F] text-2xl" style="font-variation-settings: 'FILL' 1;">shield</span>
                    <h3 class="text-xl font-serif font-bold text-[#8A486F]" id="modal-title">
                        Política de Privacidad
                    </h3>
                </div>
                <button type="button" id="close-privacy-modal-btn-top" class="text-gray-400 hover:text-[#8A486F] rounded-full p-1.5 hover:bg-white/80 transition-colors focus:outline-none cursor-pointer">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            </div>

            <!-- Cuerpo del Modal -->
            <div class="px-8 py-6 max-h-[60vh] overflow-y-auto text-gray-700 space-y-6 scrollbar-thin scrollbar-thumb-[#8A486F]/20 scrollbar-track-transparent" style="font-family: 'Inter', sans-serif;">
                <p class="text-xs text-gray-500 italic">
                    Última actualización: 15 de junio de 2026
                </p>
                
                <p class="leading-relaxed text-sm">
                    En <strong class="text-[#8A486F]">Accesorios Yamileth</strong>, valoramos y respetamos tu privacidad. Esta Política de Privacidad describe cómo recopilamos, utilizamos, protegemos y compartimos tu información personal al utilizar nuestra plataforma web para explorar y encargar nuestros accesorios artesanales y de joyería.
                </p>

                <div class="space-y-2">
                    <h4 class="text-md font-serif font-bold text-[#8A486F] flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'wght' 500;">person_search</span>
                        1. Información que Recopilamos
                    </h4>
                    <p class="leading-relaxed text-sm text-gray-600">
                        Para ofrecerte la mejor experiencia posible, podemos solicitarte cierta información personal, que incluye:
                    </p>
                    <ul class="list-disc list-inside space-y-1.5 pl-2 text-xs text-gray-600">
                        <li><strong>Datos de contacto:</strong> Nombre, dirección de correo electrónico y número de teléfono (indispensable para coordinar tus pedidos directamente por WhatsApp).</li>
                        <li><strong>Datos de entrega:</strong> Dirección física de envío para coordinar el despacho a domicilio en todo el país.</li>
                        <li><strong>Detalles de encargos:</strong> Historial de pedidos, especificaciones de los accesorios y preferencias seleccionadas.</li>
                        <li><strong>Opiniones y reseñas:</strong> Comentarios, valoraciones y calificaciones que decidas publicar en nuestros productos de forma voluntaria.</li>
                    </ul>
                </div>

                <div class="space-y-2">
                    <h4 class="text-md font-serif font-bold text-[#8A486F] flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'wght' 500;">settings_suggest</span>
                        2. Uso de la Información
                    </h4>
                    <p class="leading-relaxed text-sm text-gray-600">
                        Utilizamos la información recolectada de manera sumamente responsable para los siguientes fines:
                    </p>
                    <ul class="list-disc list-inside space-y-1.5 pl-2 text-xs text-gray-600">
                        <li>Procesar, gestionar y hacer seguimiento de tus <strong>encargos</strong> de accesorios.</li>
                        <li>Coordinar las entregas bajo la modalidad de <strong>pago contra entrega</strong> o envíos nacionales a todo el territorio de El Salvador.</li>
                        <li>Establecer comunicación directa contigo vía WhatsApp para confirmar detalles, stock y tiempo de elaboración del accesorio.</li>
                        <li>Permitir el correcto funcionamiento de tu perfil de usuario para que lleves el control de tus compras.</li>
                        <li>Mostrar tus opiniones y testimonios en el catálogo con el fin de guiar a otros compradores.</li>
                    </ul>
                </div>

                <div class="space-y-2">
                    <h4 class="text-md font-serif font-bold text-[#8A486F] flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'wght' 500;">security</span>
                        3. Protección y Seguridad de tus Datos
                    </h4>
                    <p class="leading-relaxed text-sm text-gray-600">
                        Implementamos estrictas medidas de seguridad técnicas y administrativas para proteger tus datos personales contra accesos no autorizados, pérdidas o divulgación. Solo la administración de Accesorios Yamileth tiene acceso a tu información de contacto y entrega con el exclusivo propósito de gestionar tus pedidos.
                    </p>
                </div>

                <div class="space-y-2">
                    <h4 class="text-md font-serif font-bold text-[#8A486F] flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'wght' 500;">swap_horiz</span>
                        4. Transferencia de Datos
                    </h4>
                    <p class="leading-relaxed text-sm text-gray-600">
                        No vendemos, alquilamos ni comercializamos tus datos personales con terceros. Tu información de entrega únicamente se comparte con nuestros mensajeros de confianza o servicios de despacho seleccionados de mutuo acuerdo, únicamente para llevar los accesorios de forma segura hasta tus manos.
                    </p>
                </div>

                <div class="space-y-2">
                    <h4 class="text-md font-serif font-bold text-[#8A486F] flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'wght' 500;">patient_list</span>
                        5. Tus Derechos de Control
                    </h4>
                    <p class="leading-relaxed text-sm text-gray-600">
                        Como usuario registrado, tienes total control sobre tus datos. Puedes acceder, actualizar o rectificar tu información de perfil en cualquier momento desde tu panel de usuario en la plataforma. Asimismo, si deseas eliminar tu cuenta permanentemente, puedes hacerlo directamente desde la sección de gestión de perfil.
                    </p>
                </div>

                <div class="space-y-2">
                    <h4 class="text-md font-serif font-bold text-[#8A486F] flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'wght' 500;">contact_support</span>
                        6. Contacto Directo
                    </h4>
                    <p class="leading-relaxed text-sm text-gray-600">
                        Si tienes alguna duda, sugerencia o reclamo sobre nuestra Política de Privacidad o el tratamiento de tus datos, no dudes en escribirnos por WhatsApp al <a href="https://wa.me/50362080344" target="_blank" class="text-[#8A486F] hover:underline font-semibold font-serif">+503 6208 0344</a> o ponerte en contacto a través de nuestras redes sociales oficiales de Facebook e Instagram.
                    </p>
                </div>
            </div>

            <!-- Botonera de Cierre -->
            <div class="bg-[#FFF0F0] px-6 py-4 border-t border-[#E3D7DB] flex justify-end">
                <button type="button" id="close-privacy-modal-btn" class="px-5 py-2.5 bg-[#8A486F] text-white font-serif font-bold text-sm rounded-xl hover:bg-[#6f3157] transition-all focus:outline-none shadow-sm hover:shadow-md cursor-pointer">
                    Entendido, cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const openBtn = document.getElementById('open-privacy-modal');
        const modal = document.getElementById('privacy-modal');
        const backdrop = document.getElementById('privacy-modal-backdrop');
        const panel = document.getElementById('privacy-modal-panel');
        const closeBtnTop = document.getElementById('close-privacy-modal-btn-top');
        const closeBtn = document.getElementById('close-privacy-modal-btn');

        function openModal() {
            // Evitar que el fondo se mueva
            document.body.style.overflow = 'hidden';
            
            modal.classList.remove('hidden');
            
            // Iniciar animación
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
                
                panel.classList.remove('translate-y-4', 'opacity-0');
                panel.classList.add('translate-y-0', 'opacity-100');
            }, 10);
        }

        function closeModal() {
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            
            panel.classList.remove('translate-y-0', 'opacity-100');
            panel.classList.add('translate-y-4', 'opacity-0');
            
            // Esperar a que la transición termine
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }

        if (openBtn) {
            openBtn.addEventListener('click', function (e) {
                e.preventDefault();
                openModal();
            });
        }

        if (closeBtnTop) {
            closeBtnTop.addEventListener('click', closeModal);
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', closeModal);
        }

        if (backdrop) {
            backdrop.addEventListener('click', closeModal);
        }

        // Cerrar con la tecla ESC
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>
