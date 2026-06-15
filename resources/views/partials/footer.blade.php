<!-- Footer Component para Laravel -->
<footer class="bg-[#FFF8F8] border-t border-[#E3D7DB] pt-16 pb-8">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12 grid grid-cols-1 gap-12 md:grid-cols-4">
            <div class="col-span-1 md:col-span-1">
                <h3 class="mb-4 font-serif text-2xl font-bold text-[#8A486F]">Accesorios Yamileth</h3>
                <p class="leading-relaxed text-gray-600">
                    Elegancia y sencillez en cada detalle. Joyería exclusiva artesanal para resaltar tu brillo natural.
                </p>
            </div>

            <div>
                <h4 class="mb-6 text-sm font-bold uppercase tracking-wider text-gray-900">Explorar</h4>
                <ul class="space-y-4">
                    <li><a href="{{ url('/') }}" class="text-gray-600 transition-colors hover:text-[#8A486F]">Inicio</a></li>
                    <li><a href="{{ route('home') }}" class="text-gray-600 transition-colors hover:text-[#8A486F]">Productos</a></li>
                </ul>
            </div>

            <div>
                <h4 class="mb-6 text-sm font-bold uppercase tracking-wider text-gray-900">Servicio al Cliente</h4>
                <ul class="space-y-4">
                    <li><button id="open-shipping-guide-modal" class="cursor-pointer text-left text-gray-600 transition-colors hover:text-[#8A486F] focus:outline-none">Guía de Envíos</button></li>
                    <li><button id="open-privacy-modal" class="cursor-pointer text-left text-gray-600 transition-colors hover:text-[#8A486F] focus:outline-none">Política de Privacidad</button></li>
                </ul>
            </div>

            <div>
                <h4 class="mb-6 text-sm font-bold uppercase tracking-wider text-gray-900">Síguenos</h4>
                <div class="flex flex-wrap gap-4">
                    <a href="https://www.instagram.com/yamileth.accesorios_?utm_source=ig_web_button_share_sheet&amp;igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-full border border-[#f9a8d4]/40 bg-white text-[#6f3157] shadow-sm transition-all hover:text-[#8A486F] hover:shadow-md">
                        <span class="sr-only">Instagram</span>
                        <span class="text-[11px] font-bold tracking-tight">IG</span>
                    </a>
                    <a href="https://www.facebook.com/yamileth.hernandez.539848" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-full border border-[#f9a8d4]/40 bg-white text-[#6f3157] shadow-sm transition-all hover:text-[#8A486F] hover:shadow-md">
                        <span class="sr-only">Facebook</span>
                        <span class="text-[13px] font-bold leading-none">f</span>
                    </a>
                    <a href="https://wa.me/50362080344" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-full border border-[#f9a8d4]/40 bg-white text-[#6f3157] shadow-sm transition-all hover:text-[#8A486F] hover:shadow-md">
                        <span class="sr-only">WhatsApp</span>
                        <span class="text-[10px] font-bold tracking-tight">WA</span>
                    </a>
                </div>
                <div class="mt-4">
                    <a href="https://wa.me/50362080344" target="_blank" rel="noopener noreferrer" class="font-medium text-[#6f3157] transition-colors hover:text-[#8A486F]">
                        WhatsApp: +503 6208 0344
                    </a>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center justify-between gap-4 border-t border-[#E3D7DB]/50 pt-8 text-sm text-gray-500 md:flex-row">
            <p>&copy; {{ date('Y') }} Accesorios Yamileth. Todos los derechos reservados.</p>
            <div class="flex space-x-6">
                <span>Pago contra entrega</span>
                <span>Envíos a todo el país</span>
            </div>
        </div>
    </div>
</footer>

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap" rel="stylesheet" />

<div id="shipping-guide-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="shipping-guide-title" role="dialog" aria-modal="true">
    <div class="flex min-h-screen items-end justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0">
        <div id="shipping-guide-modal-backdrop" class="fixed inset-0 bg-black/60 opacity-0 backdrop-blur-sm transition-opacity duration-300" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>

        <div id="shipping-guide-modal-panel" class="inline-block w-full translate-y-4 transform overflow-hidden rounded-2xl border border-[#E3D7DB] bg-[#FFF8F8] text-left align-bottom shadow-2xl transition-all duration-300 sm:my-8 sm:max-w-4xl sm:align-middle">
            <div class="border-b border-[#E3D7DB] bg-[#FFF0F0] px-6 py-4 sm:px-8">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="mb-1 text-xs font-semibold uppercase tracking-[0.18em] text-[#8A486F]">Guía de Envíos</p>
                        <h3 id="shipping-guide-title" class="font-serif text-2xl font-bold text-[#8A486F]">Opciones de entrega y rutas</h3>
                        <p class="mt-2 max-w-2xl text-sm text-gray-600">
                            Revisa qué te conviene más: ruta por mensajería, entrega a domicilio o coordinación directa por WhatsApp.
                        </p>
                    </div>
                    <button type="button" id="close-shipping-guide-modal-btn-top" class="rounded-full p-2 text-gray-400 transition-colors hover:bg-white/80 hover:text-[#8A486F] focus:outline-none">
                        <span class="material-symbols-outlined text-xl">close</span>
                    </button>
                </div>
            </div>

            <div class="max-h-[70vh] overflow-y-auto px-6 py-6 sm:px-8">
                <div class="grid gap-6 lg:grid-cols-2">
                    <article class="rounded-2xl border border-[#E3D7DB] bg-white p-5 shadow-sm">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h4 class="font-serif text-xl font-bold text-[#8A486F]">Melo Express</h4>
                                <p class="mt-1 text-sm text-gray-600">Útil si tu entrega va por ruta o punto específico.</p>
                            </div>
                            <a href="https://www.catalogomeloexpress.com/" target="_blank" rel="noopener noreferrer" class="rounded-full bg-[#8A486F] px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-[#733b5c]">
                                Ver catálogo
                            </a>
                        </div>
                        <p class="mt-4 text-sm leading-relaxed text-gray-600">
                            Consulta la cobertura y verifica si tu zona entra en su ruta. Es una buena opción para entregas coordinadas con punto de retiro o envío a domicilio, según disponibilidad.
                        </p>
                    </article>

                    <article class="rounded-2xl border border-[#E3D7DB] bg-white p-5 shadow-sm">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h4 class="font-serif text-xl font-bold text-[#8A486F]">Pedidos Express</h4>
                                <p class="mt-1 text-sm text-gray-600">Ideal para coordinar encomiendas dentro de rutas activas.</p>
                            </div>
                            <a href="https://www.facebook.com/EncomiendasPedidosExpress/?locale=es_LA" target="_blank" rel="noopener noreferrer" class="rounded-full bg-[#8A486F] px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-[#733b5c]">
                                Ver Facebook
                            </a>
                        </div>
                        <p class="mt-4 text-sm leading-relaxed text-gray-600">
                            Revisa rutas y cobertura para decidir si te sale mejor recibir en una zona específica o coordinar entrega directa.
                        </p>
                    </article>
                </div>

                <section class="mt-6 grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                    <div class="rounded-2xl border border-[#E3D7DB] bg-white p-5 shadow-sm">
                        <h4 class="font-serif text-xl font-bold text-[#8A486F]">Zonas y puntos atendidos</h4>
                        <p class="mt-2 text-sm text-gray-600">
                            Coordinamos entregas y retiros en zonas específicas de San Miguel, entre ellas:
                        </p>
                        <div class="mt-4 grid gap-3 sm:grid-cols-2">
                            <div class="rounded-xl bg-[#FDF0F4] p-4 text-sm text-gray-700">El Encuentro</div>
                            <div class="rounded-xl bg-[#FDF0F4] p-4 text-sm text-gray-700">Alcaldía</div>
                            <div class="rounded-xl bg-[#FDF0F4] p-4 text-sm text-gray-700">Metro Centro</div>
                            <div class="rounded-xl bg-[#FDF0F4] p-4 text-sm text-gray-700">Garden Mall</div>
                            <div class="rounded-xl bg-[#FDF0F4] p-4 text-sm text-gray-700">Universidades: UGB, UNIVO, UNAB, UMA</div>
                            <div class="rounded-xl bg-[#FDF0F4] p-4 text-sm text-gray-700">Ex Plaza GoldThree</div>
                            <div class="rounded-xl bg-[#FDF0F4] p-4 text-sm text-gray-700">Ex Plaza Chapatulteca</div>
                            <div class="rounded-xl bg-[#FDF0F4] p-4 text-sm text-gray-700">Plaza Chaparrastique</div>
                            <div class="rounded-xl bg-[#FDF0F4] p-4 text-sm text-gray-700 sm:col-span-2">Zonas céntricas de San Miguel</div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <article class="rounded-2xl border border-[#E3D7DB] bg-white p-5 shadow-sm">
                            <h4 class="font-serif text-xl font-bold text-[#8A486F]">Horario de entrega</h4>
                            <p class="mt-2 text-sm leading-relaxed text-gray-600">
                                El horario de coordinación es de <strong class="text-[#8A486F]">8:00 a.m. a 4:00 p.m.</strong>. Si tu pedido ya fue confirmado por WhatsApp, podemos ajustar el punto de entrega, el método y la ruta según lo acordado.
                            </p>
                        </article>

                        <article class="rounded-2xl border border-[#E3D7DB] bg-[#FFF0F0] p-5 shadow-sm">
                            <h4 class="font-serif text-xl font-bold text-[#8A486F]">¿Prefieres coordinar directo?</h4>
                            <p class="mt-2 text-sm leading-relaxed text-gray-600">
                                Escríbenos por WhatsApp para revisar disponibilidad, confirmar la mejor ruta y ajustar el pedido a domicilio o a un punto de encuentro.
                            </p>
                            <a href="https://wa.me/50362080344?text=Hola%2C%20quiero%20coordinar%20mi%20entrega%20y%20consultar%20la%20mejor%20opci%C3%B3n%20de%20env%C3%ADo." target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex w-full items-center justify-center rounded-full bg-[#25D366] px-5 py-3 font-semibold text-white transition-colors hover:bg-[#20ba5a]">
                                Coordinar por WhatsApp
                            </a>
                            <p class="mt-3 text-xs text-gray-500">
                                También puedes compartir tu zona para ayudarte a elegir entre mensajería o entrega directa.
                            </p>
                        </article>
                    </div>
                </section>
            </div>

            <div class="border-t border-[#E3D7DB] bg-[#FFF0F0] px-6 py-4 sm:px-8">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-sm text-gray-600">
                        Envíos y entregas sujetos a ruta, disponibilidad y acuerdo con el cliente.
                    </p>
                    <button type="button" id="close-shipping-guide-modal-btn" class="rounded-xl border border-[#E3D7DB] bg-white px-5 py-2.5 text-sm font-semibold text-[#8A486F] transition-colors hover:bg-[#FDF0F4]">
                        Entendido
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="privacy-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex min-h-screen items-end justify-center pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div id="privacy-modal-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300 opacity-0" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div id="privacy-modal-panel" class="inline-block align-bottom bg-[#FFF8F8] rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full border border-[#E3D7DB] translate-y-4 opacity-0 duration-300">
            <div class="bg-[#FFF0F0] px-6 py-4 border-b border-[#E3D7DB] flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <span class="material-symbols-outlined text-[#8A486F] text-2xl" style="font-variation-settings: 'FILL' 1;">shield</span>
                    <h3 class="text-xl font-serif font-bold text-[#8A486F]" id="modal-title">Política de Privacidad</h3>
                </div>
                <button type="button" id="close-privacy-modal-btn-top" class="text-gray-400 hover:text-[#8A486F] rounded-full p-1.5 hover:bg-white/80 transition-colors focus:outline-none cursor-pointer">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            </div>
            <div class="px-8 py-6 max-h-[60vh] overflow-y-auto text-gray-700 space-y-6 scrollbar-thin scrollbar-thumb-[#8A486F]/20 scrollbar-track-transparent" style="font-family: 'Inter', sans-serif;">
                <p class="text-xs text-gray-500 italic">Última actualización: 15 de junio de 2026</p>
                <p class="leading-relaxed text-sm">
                    En <strong class="text-[#8A486F]">Accesorios Yamileth</strong>, valoramos y respetamos tu privacidad. Esta Política de Privacidad describe cómo recopilamos, utilizamos, protegemos y compartimos tu información personal al utilizar nuestra plataforma web para explorar y encargar nuestros accesorios artesanales y de joyería.
                </p>
                <div class="space-y-2">
                    <h4 class="text-md font-serif font-bold text-[#8A486F] flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'wght' 500;">person_search</span>
                        1. Información que Recopilamos
                    </h4>
                    <p class="leading-relaxed text-sm text-gray-600">Para ofrecerte la mejor experiencia posible, podemos solicitarte cierta información personal, que incluye:</p>
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
                    <p class="leading-relaxed text-sm text-gray-600">Utilizamos la información recolectada de manera sumamente responsable para los siguientes fines:</p>
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
                        Si tienes alguna duda, sugerencia o reclamo sobre nuestra Política de Privacidad o el tratamiento de tus datos, no dudes en escribirnos por WhatsApp al <a href="https://wa.me/50362080344" target="_blank" class="font-semibold font-serif text-[#8A486F] hover:underline">+503 6208 0344</a> o ponerte en contacto a través de nuestras redes sociales oficiales de Facebook e Instagram.
                    </p>
                </div>
            </div>
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
        const modalConfigs = [
            {
                open: 'open-shipping-guide-modal',
                modal: 'shipping-guide-modal',
                backdrop: 'shipping-guide-modal-backdrop',
                panel: 'shipping-guide-modal-panel',
                closeTop: 'close-shipping-guide-modal-btn-top',
                close: 'close-shipping-guide-modal-btn',
            },
            {
                open: 'open-privacy-modal',
                modal: 'privacy-modal',
                backdrop: 'privacy-modal-backdrop',
                panel: 'privacy-modal-panel',
                closeTop: 'close-privacy-modal-btn-top',
                close: 'close-privacy-modal-btn',
            },
        ];

        const state = new Map();
        let openModalCount = 0;

        function openModal(config) {
            const modal = document.getElementById(config.modal);
            const backdrop = document.getElementById(config.backdrop);
            const panel = document.getElementById(config.panel);
            if (!modal || !backdrop || !panel) return;

            if (!state.has(config.modal)) {
                openModalCount += 1;
            }

            document.body.style.overflow = 'hidden';
            modal.classList.remove('hidden');

            requestAnimationFrame(() => {
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
                panel.classList.remove('translate-y-4', 'opacity-0');
                panel.classList.add('translate-y-0', 'opacity-100');
            });

            state.set(config.modal, { modal, backdrop, panel });
        }

        function closeModal(config) {
            const modalState = state.get(config.modal) || {
                modal: document.getElementById(config.modal),
                backdrop: document.getElementById(config.backdrop),
                panel: document.getElementById(config.panel),
            };

            if (!modalState.modal || !modalState.backdrop || !modalState.panel) return;

            modalState.backdrop.classList.remove('opacity-100');
            modalState.backdrop.classList.add('opacity-0');
            modalState.panel.classList.remove('translate-y-0', 'opacity-100');
            modalState.panel.classList.add('translate-y-4', 'opacity-0');

            setTimeout(() => {
                modalState.modal.classList.add('hidden');
                state.delete(config.modal);
                openModalCount = Math.max(0, openModalCount - 1);
                if (openModalCount === 0) {
                    document.body.style.overflow = '';
                }
            }, 300);
        }

        modalConfigs.forEach((config) => {
            document.getElementById(config.open)?.addEventListener('click', function (event) {
                event.preventDefault();
                openModal(config);
            });

            document.getElementById(config.closeTop)?.addEventListener('click', () => closeModal(config));
            document.getElementById(config.close)?.addEventListener('click', () => closeModal(config));
            document.getElementById(config.backdrop)?.addEventListener('click', () => closeModal(config));
        });

        document.addEventListener('keydown', function (event) {
            if (event.key !== 'Escape') return;

            modalConfigs.forEach((config) => {
                const modal = document.getElementById(config.modal);
                if (modal && !modal.classList.contains('hidden')) {
                    closeModal(config);
                }
            });
        });
    });
</script>
