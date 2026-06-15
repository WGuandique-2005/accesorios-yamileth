<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Accesorios Yamileth - Product Catalog</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;family=Playfair+Display:wght@600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen flex flex-col font-body-md selection:bg-primary-container selection:text-on-primary-container">
<!-- TopNavBar -->
@include('partials.navbar')
<!-- Main Content -->
<main class="flex-1 flex flex-col md:flex-row max-w-container-max mx-auto w-full px-margin-mobile md:px-margin-desktop py-8 gap-gutter">
<!-- Sidebar Filters -->
<aside class="w-full md:w-64 flex-shrink-0 space-y-8">
<div>
<h3 class="font-h3 text-h3 text-primary mb-4">Categories</h3>
<ul class="space-y-3">
<li>
<label class="flex items-center gap-3 cursor-pointer group">
<input checked="" class="form-checkbox text-primary border-outline-variant rounded focus:ring-primary h-5 w-5" type="checkbox"/>
<span class="text-body-md text-on-surface group-hover:text-primary transition-colors">All Products</span>
</label>
</li>
<li>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="form-checkbox text-primary border-outline-variant rounded focus:ring-primary h-5 w-5" type="checkbox"/>
<span class="text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Necklaces</span>
</label>
</li>
<li>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="form-checkbox text-primary border-outline-variant rounded focus:ring-primary h-5 w-5" type="checkbox"/>
<span class="text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Earrings</span>
</label>
</li>
<li>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="form-checkbox text-primary border-outline-variant rounded focus:ring-primary h-5 w-5" type="checkbox"/>
<span class="text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Bracelets</span>
</label>
</li>
<li>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="form-checkbox text-primary border-outline-variant rounded focus:ring-primary h-5 w-5" type="checkbox"/>
<span class="text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Rings</span>
</label>
</li>
</ul>
</div>
<div>
<h3 class="font-h3 text-h3 text-primary mb-4">Price Range</h3>
<div class="flex items-center gap-2">
<input class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-md text-body-sm focus:outline-none focus:border-primary" placeholder="Min" type="number"/>
<span class="text-on-surface-variant">-</span>
<input class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-md text-body-sm focus:outline-none focus:border-primary" placeholder="Max" type="number"/>
</div>
</div>
</aside>
<!-- Product Grid -->
<section class="flex-1">
<div class="mb-6">
    <h1 class="font-h2 text-h2 text-primary tracking-tight mb-2">Bienvenida, {{ Auth::user()->name }}</h1>
</div>
<div class="flex justify-between items-center mb-6">
<span class="text-body-sm text-on-surface-variant">Showing {{ $products->count() }} products</span>
<select class="bg-surface-container-low border border-outline-variant rounded-md text-body-sm px-4 py-2 focus:outline-none focus:border-primary text-on-surface">
<option>Sort by: Featured</option>
<option>Price: Low to High</option>
<option>Price: High to Low</option>
<option>Newest Arrivals</option>
</select>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
@forelse ($products as $product)
<div class="group relative bg-surface rounded-xl flex flex-col shadow-[0_8px_30px_rgb(138,72,111,0.06)] hover:shadow-[0_8px_30px_rgb(138,72,111,0.12)] hover:-translate-y-1 transition-all duration-300">
<div class="relative aspect-square overflow-hidden rounded-t-xl bg-surface-container-low">
<img alt="{{ $product->nombre }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ asset('storage/' . $product->imagen_ruta) }}"/>
@if(\Carbon\Carbon::parse($product->created_at)->diffInDays(now()) < 30)
<div class="absolute top-3 left-3 bg-tertiary text-on-tertiary px-2 py-1 rounded-full font-label-caps text-label-caps shadow-sm">
    NUEVO
</div>
@endif
</div>
<div class="p-4 flex flex-col flex-1 text-center">
<h4 class="font-body-lg text-body-lg text-on-surface mb-1">{{ $product->nombre }}</h4>
<div class="flex justify-center items-center gap-2 mb-4">
<span class="font-h3 text-h3 text-primary">${{ number_format($product->precio_final, 2) }}</span>
</div>
<button class="mt-auto w-full bg-primary-container text-on-primary-container py-2.5 rounded-full font-medium hover:bg-primary hover:text-on-primary transition-colors duration-300">
                            Encargar
                        </button>
</div>
</div>
@empty
<div class="col-span-full text-center py-12">
    <p class="font-h3 text-h3 text-on-surface-variant">Pronto habrá productos disponibles para ti 🌸</p>
</div>
@endforelse
</div>
</section>
</main>
<!-- Footer -->
@include('partials.footer')
</body></html>