@auth
    @php redirect()->intended('/home')->send(); @endphp
@endauth
<!DOCTYPE html>

<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Accesorios Yamileth</title>
<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Google Fonts: Playfair Display & Inter -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind CSS v3 -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Tailwind Config from Brand Anchors -->
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
@include('partials.theme')
<style>
        .material-symbols-outlined {
          font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .hero-pattern {
            background-color: #fff8f8;
            background-image: radial-gradient(#ecdfe3 1px, transparent 1px);
            background-size: 24px 24px;
        }
        .ghost-card {
            box-shadow: 0 20px 40px -10px rgba(138, 72, 111, 0.05);
            transition: all 0.3s ease;
        }
        .ghost-card:hover {
            box-shadow: 0 30px 50px -15px rgba(138, 72, 111, 0.1);
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col antialiased">
<!-- TopNavBar -->
@include("partials.navbar")
<!-- Main Content -->
<main class="flex-grow">
<!-- Hero Section -->
<section class="hero-pattern relative overflow-hidden pt-20 pb-32 px-margin-mobile md:px-margin-desktop">
<div class="max-w-container-max mx-auto text-center flex flex-col items-center justify-center relative z-10">
<span class="font-label-caps text-label-caps text-primary tracking-[0.2em] mb-6 uppercase block">Colección boutique</span>
<h1 class="font-h1-mobile text-h1-mobile md:font-h1 md:text-h1 text-on-surface mb-6 max-w-3xl mx-auto">
                    Elegancia y sencillez <br/>
<span class="text-primary italic">en cada detalle</span>
</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl mx-auto mb-10">
                    Descubre piezas lindas diseñadas para resaltar. Variedad de accesorios que no encontraras en otro lugar.
                </p>
<div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
<button class="bg-primary text-on-primary px-8 py-4 rounded-full font-body-md font-medium hover:shadow-lg hover:-translate-y-1 transition-all duration-300 w-full sm:w-auto flex items-center gap-2 justify-center">
                        Explorar Colección
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'wght' 600;">arrow_forward</span>
</button>
<button class="px-8 py-4 rounded-full font-body-md font-medium text-primary border border-primary/20 hover:bg-primary/5 transition-colors w-full sm:w-auto">
                        Ver Novedades
                    </button>
</div>
</div>
<!-- Decorative Elements -->
<div class="absolute top-1/2 left-10 w-64 h-64 bg-primary-container/20 rounded-full blur-3xl -translate-y-1/2"></div>
<div class="absolute top-1/2 right-10 w-72 h-72 bg-tertiary-container/20 rounded-full blur-3xl -translate-y-1/2"></div>
</section>
<!-- Featured Products Section -->
<section class="py-24 px-margin-mobile md:px-margin-desktop bg-surface-container-low">
<div class="max-w-container-max mx-auto">
<div class="text-center mb-16">
<h2 class="font-h2 text-h2 text-on-surface mb-4">Piezas Destacadas</h2>
<div class="w-16 h-0.5 bg-primary/30 mx-auto"></div>
</div>
<!-- Bento Grid Layout for Products -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
@forelse ($products as $product)
<article class="ghost-card bg-surface rounded-xl overflow-hidden group flex flex-col relative h-[450px]">
@if(\Carbon\Carbon::parse($product->created_at)->diffInDays(now()) < 30)
<span class="absolute top-4 left-4 z-10 bg-tertiary text-on-tertiary px-3 py-1 rounded-full font-label-caps text-label-caps">NUEVO</span>
@endif
<button class="absolute top-4 right-4 z-10 w-10 h-10 bg-surface/80 backdrop-blur-sm rounded-full flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined text-xl">favorite</span>
</button>
<div class="h-2/3 w-full bg-surface-variant relative overflow-hidden">
<img alt="{{ $product->nombre }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" src="{{ asset('storage/' . $product->imagen_ruta) }}"/>
</div>
<div class="p-6 flex-grow flex flex-col justify-between text-center">
<div>
<h3 class="font-h3 text-h3 text-on-surface mb-2">{{ $product->nombre }}</h3>
<p class="font-body-md text-body-md text-primary font-medium">${{ number_format($product->precio_final, 2) }}</p>
</div>
<button class="text-primary font-medium font-body-sm tracking-wide uppercase hover:text-primary-fixed-variant transition-colors flex items-center justify-center gap-2 mt-4 group/btn">
                                Hacer encargo
                                <span class="material-symbols-outlined text-sm group-hover/btn:translate-x-1 transition-transform">trending_flat</span>
</button>
</div>
</article>
@empty
<div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
    <p class="font-h3 text-h3 text-on-surface-variant">Pronto habrá productos disponibles para ti 🌸</p>
</div>
@endforelse
</div>
<div class="mt-16 text-center">
<button class="px-8 py-3 rounded-full font-body-md font-medium text-primary border border-primary hover:bg-primary hover:text-on-primary transition-all duration-300">
                        Ver Catálogo Completo
                    </button>
</div>
</div>
</section>
<!-- Trust/Features Section -->
<section class="py-20 bg-surface border-t border-outline-variant/30">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
<div class="flex flex-col items-center">
<div class="w-16 h-16 bg-primary-container/30 rounded-full flex items-center justify-center text-primary mb-4">
<span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'wght' 300;">diamond</span>
</div>
<h4 class="font-h3 text-h3 mb-2 text-on-surface">Calidad Premium</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Materiales seleccionados cuidadosamente para asegurar durabilidad y belleza.</p>
</div>
<div class="flex flex-col items-center">
<div class="w-16 h-16 bg-primary-container/30 rounded-full flex items-center justify-center text-primary mb-4">
<span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'wght' 300;">local_shipping</span>
</div>
<h4 class="font-h3 text-h3 mb-2 text-on-surface">Envíos Seguros</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Entregas confiables para que tus piezas lleguen en perfectas condiciones.</p>
</div>
<div class="flex flex-col items-center">
<div class="w-16 h-16 bg-primary-container/30 rounded-full flex items-center justify-center text-primary mb-4">
<span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'wght' 300;">redeem</span>
</div>
<h4 class="font-h3 text-h3 mb-2 text-on-surface">Empaque Especial</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Cada pedido se prepara como cariño, ideal para sorprender o consentirte.</p>
</div>
</div>
</section>
</main>
<!-- Footer -->
@include("partials.footer")
</footer>
</body></html>
