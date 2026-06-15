<!DOCTYPE html>

<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Order Form - Accesorios Yamileth</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Playfair+Display:wght@600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed-dim": "#a6d38b",
                        "primary": "#8a486f",
                        "background": "#fff8f8",
                        "primary-container": "#f9a8d4",
                        "inverse-primary": "#ffaeda",
                        "on-error-container": "#93000a",
                        "surface-container-highest": "#ecdfe3",
                        "surface-container-high": "#f2e5e9",
                        "error": "#ba1a1a",
                        "secondary": "#5d5f5f",
                        "on-tertiary-fixed": "#072100",
                        "on-primary-container": "#78395f",
                        "on-primary-fixed": "#3a0329",
                        "surface-container": "#f7ebee",
                        "outline-variant": "#d5c1c9",
                        "on-secondary-fixed-variant": "#454747",
                        "on-secondary-fixed": "#1a1c1c",
                        "tertiary-container": "#a0cd85",
                        "on-surface-variant": "#514349",
                        "on-error": "#ffffff",
                        "on-secondary": "#ffffff",
                        "surface-dim": "#e3d7db",
                        "inverse-on-surface": "#faeef1",
                        "on-secondary-container": "#616363",
                        "secondary-fixed-dim": "#c6c6c7",
                        "tertiary": "#41682c",
                        "on-primary-fixed-variant": "#6f3157",
                        "on-surface": "#201a1d",
                        "on-tertiary-container": "#31581d",
                        "primary-fixed": "#ffd8ea",
                        "surface-container-lowest": "#ffffff",
                        "surface-variant": "#ecdfe3",
                        "secondary-container": "#dfe0e0",
                        "error-container": "#ffdad6",
                        "on-background": "#201a1d",
                        "surface-tint": "#8a486f",
                        "primary-fixed-dim": "#ffaeda",
                        "outline": "#83737a",
                        "surface-bright": "#fff8f8",
                        "inverse-surface": "#352f31",
                        "on-primary": "#ffffff",
                        "surface": "#fff8f8",
                        "secondary-fixed": "#e2e2e2",
                        "tertiary-fixed": "#c1f0a4",
                        "on-tertiary-fixed-variant": "#2a5016",
                        "surface-container-low": "#fdf0f4"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-desktop": "64px",
                        "unit": "4px",
                        "margin-mobile": "16px",
                        "gutter": "24px",
                        "container-max": "1280px"
                    },
                    "fontFamily": {
                        "h1": ["Playfair Display"],
                        "h2": ["Playfair Display"],
                        "h1-mobile": ["Playfair Display"],
                        "body-lg": ["Inter"],
                        "body-sm": ["Inter"],
                        "h3": ["Playfair Display"],
                        "label-caps": ["Inter"],
                        "body-md": ["Inter"]
                    },
                    "fontSize": {
                        "h1": ["48px", { "lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "h2": ["36px", { "lineHeight": "1.3", "fontWeight": "600" }],
                        "h1-mobile": ["32px", { "lineHeight": "1.2", "fontWeight": "700" }],
                        "body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "body-sm": ["14px", { "lineHeight": "1.5", "fontWeight": "400" }],
                        "h3": ["24px", { "lineHeight": "1.4", "fontWeight": "600" }],
                        "label-caps": ["12px", { "lineHeight": "1", "letterSpacing": "0.1em", "fontWeight": "600" }],
                        "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }]
                    }
                }
            }
        }
    </script>
<style>
        body { background-color: theme('colors.background'); color: theme('colors.on-background'); }
        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .custom-radio:checked + div {
            border-color: theme('colors.primary');
            background-color: theme('colors.primary-container');
        }
        .custom-radio:checked + div .radio-inner {
            background-color: theme('colors.primary');
        }
    </style>
</head>
<body class="font-body-md text-body-md antialiased min-h-screen flex flex-col">
<!-- TopNavBar (Nav Suppressed for Checkout Flow, keeping simple brand header) -->
@include('partials.navbar')
<main class="flex-grow w-full max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-12">
<div class="mb-10 text-center md:text-left">
<h1 class="font-h1-mobile md:font-h1 text-h1-mobile md:text-h1 text-primary mb-2">Finalizar Encargo</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant">Completa los detalles para tu pedido.</p>
</div>
<div class="flex flex-col lg:flex-row gap-8 lg:gap-16">
<!-- Left Column: Form -->
<div class="flex-1 w-full max-w-3xl">
<form class="space-y-8" id="orderForm">
<!-- Delivery Type Selection (Bento Grid Style) -->
<section class="glass-panel rounded-xl p-6 md:p-8 shadow-[0_8px_30px_rgb(138,72,111,0.05)]">
<h2 class="font-h3 text-h3 text-on-surface mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">local_shipping</span>
                            Tipo de Entrega
                        </h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<label class="cursor-pointer relative">
<input checked="" class="custom-radio peer sr-only" name="delivery_type" type="radio" value="envio"/>
<div class="w-full p-5 rounded-lg border-2 border-outline-variant hover:border-primary/50 transition-colors bg-surface-container-lowest flex flex-col items-center justify-center gap-3 text-center h-full">
<div class="w-6 h-6 rounded-full border-2 border-outline flex items-center justify-center peer-checked:border-primary">
<div class="radio-inner w-3 h-3 rounded-full bg-transparent transition-colors"></div>
</div>
<span class="material-symbols-outlined text-4xl text-on-surface-variant">package</span>
<div>
<div class="font-bold text-on-surface mb-1">Envío por Encomienda</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Melo Express, Cargo Expreso, etc.</div>
</div>
</div>
</label>
<label class="cursor-pointer relative">
<input class="custom-radio peer sr-only" name="delivery_type" type="radio" value="personal"/>
<div class="w-full p-5 rounded-lg border-2 border-outline-variant hover:border-primary/50 transition-colors bg-surface-container-lowest flex flex-col items-center justify-center gap-3 text-center h-full">
<div class="w-6 h-6 rounded-full border-2 border-outline flex items-center justify-center peer-checked:border-primary">
<div class="radio-inner w-3 h-3 rounded-full bg-transparent transition-colors"></div>
</div>
<span class="material-symbols-outlined text-4xl text-on-surface-variant">handshake</span>
<div>
<div class="font-bold text-on-surface mb-1">Entrega Personal</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Punto de encuentro acordado</div>
</div>
</div>
</label>
</div>
</section>
<!-- Dispatch/Address Details -->
<section class="glass-panel rounded-xl p-6 md:p-8 shadow-[0_8px_30px_rgb(138,72,111,0.05)]">
<h2 class="font-h3 text-h3 text-on-surface mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">location_on</span>
                            Detalles de Ubicación
                        </h2>
<div class="space-y-5">
<div>
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2" for="dispatch">Agencia de Envío / Lugar de Encuentro</label>
<select class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all text-on-surface" id="dispatch">
<option value="">Selecciona una opción...</option>
<optgroup label="Encomiendas">
<option value="melo">Melo Express</option>
<option value="cargo">Cargo Expreso</option>
<option value="caex">CAEX</option>
</optgroup>
<optgroup label="Entregas Personales">
<option value="mall1">Metrocentro</option>
<option value="mall2">Multiplaza</option>
<option value="other">Otro (Especificar en notas)</option>
</optgroup>
</select>
</div>
<div>
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2" for="address">Dirección Exacta / Sucursal</label>
<textarea class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all text-on-surface resize-none placeholder:text-outline" id="address" placeholder="Ej: Sucursal Escalón, o dirección de domicilio..." rows="3"></textarea>
</div>
</div>
</section>
<!-- Date & Time -->
<section class="glass-panel rounded-xl p-6 md:p-8 shadow-[0_8px_30px_rgb(138,72,111,0.05)]">
<h2 class="font-h3 text-h3 text-on-surface mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">calendar_month</span>
                            Fecha y Hora
                        </h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
<div>
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2" for="date">Fecha Deseada</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline-variant">event</span>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all text-on-surface" id="date" type="date"/>
</div>
</div>
<div>
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2" for="time">Hora / Rango</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline-variant">schedule</span>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all text-on-surface" id="time" type="time"/>
</div>
</div>
</div>
</section>
<!-- Additional Notes -->
<section class="glass-panel rounded-xl p-6 md:p-8 shadow-[0_8px_30px_rgb(138,72,111,0.05)]">
<h2 class="font-h3 text-h3 text-on-surface mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">edit_note</span>
                            Notas Adicionales
                        </h2>
<div>
<label class="block font-label-caps text-label-caps text-on-surface-variant mb-2" for="notes">Instrucciones Especiales (Opcional)</label>
<textarea class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all text-on-surface resize-none placeholder:text-outline" id="notes" placeholder="Ej: Llamar al llegar, empacar para regalo..." rows="2"></textarea>
</div>
</section>
</form>
</div>
<!-- Right Column: Order Summary (Sticky) -->
<div class="w-full lg:w-96">
<div class="sticky top-24">
<div class="glass-panel rounded-xl p-6 md:p-8 shadow-[0_8px_30px_rgb(138,72,111,0.1)]">
<h2 class="font-h3 text-h3 text-primary mb-6 border-b border-outline-variant/50 pb-4">Resumen del Encargo</h2>
<!-- Order Items List -->
<div class="space-y-4 mb-6 max-h-[409px] overflow-y-auto pr-2">
<!-- Item 1 -->
<div class="flex items-start gap-4">
<div class="w-16 h-16 rounded-lg overflow-hidden bg-surface-variant shrink-0 relative">
<img alt="Pendientes de Oro Rosa con diseño floral detallado, fotografía de producto macro con iluminación suave" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAvEnUPr4Mpkry7EHCtf4zHFo2RIWmw7DiclEqSCsLBQXq2RcSx_rj1H2xNwPxgkjdwtOwWNTgEVk_4rmeZfI4wfOspWfmasMbObDwX1CyxbcipNSDd367YtPdOgVarUL5-3wnn-uCNXABrDsSjF6mVZ5wCA7zLALmQZZwPtM5whOn-ClfMGMQJxxKIlLiIFIxiBhwMCp4BgbnvHMcW_tNAgPvcAXeqC1VWapSQBDTH9Va0l3aOHVMvUWarZhV3Qn2kBEn2PRtJKjR_"/>
</div>
<div class="flex-grow">
<h4 class="font-medium text-on-surface line-clamp-1">Pendientes de Oro Rosa Florales</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Cant: 1</p>
</div>
<div class="font-medium text-on-surface">$45.00</div>
</div>
<!-- Item 2 -->
<div class="flex items-start gap-4">
<div class="w-16 h-16 rounded-lg overflow-hidden bg-surface-variant shrink-0 relative">
<img alt="Collar elegante de perlas con dije brillante, estilo boutique de lujo, fondo minimalista blanco" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAKx-McTJ-Zy5QdrTJKKAFOh6oGQ9Q8OR42gabGBBVAYJZ-nZYYiSVat5ASHmZFGLw8jWGuVVWbWKF1Nnfd8_Q21qyL8lMjk14C4LNpoKn2_Lrl9_PvahcE2oCkZeqq5N4l4h_R-SENbUZayrM2kI-rO8O2Jom-UQZf0CDkg3SpAoBwPlbfLiJ3OfbU8bUZyYm37izkUYS-r2roSO1iyF0_TuTkBTDX1rKg6M96AS9i-935WzifU0wXP44zrDCdYnSnAwFfw_CbsS5Y"/>
</div>
<div class="flex-grow">
<h4 class="font-medium text-on-surface line-clamp-1">Collar de Perlas Clásico</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Cant: 2</p>
</div>
<div class="font-medium text-on-surface">$120.00</div>
</div>
</div>
<!-- Totals -->
<div class="border-t border-outline-variant/50 pt-4 space-y-3 mb-6">
<div class="flex justify-between text-on-surface-variant">
<span>Subtotal</span>
<span>$165.00</span>
</div>
<div class="flex justify-between text-on-surface-variant">
<span>Envío estimado</span>
<span>$5.00</span>
</div>
<div class="flex justify-between items-center font-bold text-lg text-primary pt-2 border-t border-outline-variant/30">
<span>Total</span>
<span>$170.00</span>
</div>
</div>
<!-- Payment Note -->
<div class="bg-surface-container flex items-start gap-3 p-4 rounded-lg mb-8 border border-outline-variant/30">
<span class="material-symbols-outlined text-primary mt-0.5">info</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
<strong class="text-on-surface block mb-1">El pago se realiza contra entrega.</strong>
                                Prepararemos tu encargo una vez confirmado.
                            </p>
</div>
<!-- Submit Button -->
<button class="w-full bg-primary hover:bg-primary/90 text-on-primary py-4 px-6 rounded-full font-bold transition-all transform hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-2 shadow-md relative overflow-hidden group" id="submitBtn" type="button">
<span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">check_circle</span>
                            Confirmar Encargo
                            <!-- Loading Spinner (Hidden by default) -->
<div class="absolute inset-0 bg-primary flex items-center justify-center opacity-0 pointer-events-none transition-opacity" id="loadingState">
<span class="material-symbols-outlined animate-spin text-white">sync</span>
<span class="ml-2 text-white">Procesando...</span>
</div>
</button>
</div>
</div>
</div>
</div>
</main>
<!-- Footer (Minimal for checkout) -->
@include('partials.footer')
<script>
        // Simple Interaction Script
        document.getElementById('submitBtn').addEventListener('click', function(e) {
            e.preventDefault();
            const btn = this;
            const loading = document.getElementById('loadingState');
            
            // Show loading state
            loading.classList.remove('opacity-0');
            loading.classList.add('opacity-100');
            btn.classList.add('pointer-events-none');
            
            // Simulate API call
            setTimeout(() => {
                loading.classList.remove('opacity-100');
                loading.classList.add('opacity-0');
                btn.classList.remove('pointer-events-none');
                
                // Show success (could be a modal or redirect in real app)
                btn.innerHTML = '<span class="material-symbols-outlined">done_all</span> ¡Encargo Confirmado!';
                btn.classList.replace('bg-primary', 'bg-tertiary');
                btn.classList.replace('hover:bg-primary/90', 'hover:bg-tertiary/90');
                
            }, 2000);
        });
    </script>
</body></html>