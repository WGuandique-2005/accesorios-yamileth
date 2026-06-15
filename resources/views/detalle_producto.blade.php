<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Product Detail - Accesorios Yamileth</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;family=Playfair+Display:wght@600;700&amp;display=swap" rel="stylesheet"/>
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
<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col antialiased selection:bg-primary-container selection:text-on-primary-container">
<!-- TopNavBar -->
<nav class="bg-surface dark:bg-surface-dim docked full-width top-0 shadow-sm dark:shadow-none z-50 sticky transition-all duration-300">
<div class="flex justify-between items-center w-full px-margin-mobile md:px-margin-desktop py-4 max-w-container-max mx-auto">
<!-- Brand Logo -->
<a class="font-h2 text-h2 text-primary dark:text-primary-fixed tracking-tight hover:opacity-80 transition-opacity" href="#">
                Accesorios Yamileth
            </a>
<!-- Navigation Links (Desktop) -->
<div class="hidden md:flex items-center gap-8">
<!-- Active Item -->
<a class="text-primary dark:text-primary-fixed font-bold border-b-2 border-primary pb-1 transition-colors duration-200" href="#">
                    Products
                </a>
<a class="text-on-surface-variant dark:text-surface-variant font-medium hover:text-primary-fixed-variant transition-colors duration-200" href="#">
                    My Orders
                </a>
<a class="text-on-surface-variant dark:text-surface-variant font-medium hover:text-primary-fixed-variant transition-colors duration-200" href="#">
                    Profile
                </a>
</div>
<!-- Actions & Search -->
<div class="flex items-center gap-4">
<button aria-label="Search" class="text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined text-[24px]">search</span>
</button>
<div class="hidden md:flex items-center gap-4 border-l border-outline-variant pl-4 ml-2">
<button class="text-primary font-medium hover:text-primary-fixed-variant transition-colors">Login</button>
<button class="bg-primary text-on-primary px-4 py-2 rounded-full font-medium hover:opacity-90 hover:scale-95 transition-all">Register</button>
</div>
<!-- Mobile Menu Toggle -->
<button class="md:hidden text-on-surface-variant">
<span class="material-symbols-outlined">menu</span>
</button>
</div>
</div>
</nav>
<!-- Main Content Canvas -->
<main class="flex-grow w-full max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-8 md:py-12">
<!-- Breadcrumbs -->
<nav aria-label="Breadcrumb" class="flex items-center gap-2 text-on-surface-variant font-body-sm mb-8 md:mb-12">
<a class="hover:text-primary transition-colors" href="#">Home</a>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
<a class="hover:text-primary transition-colors" href="#">Colecciones</a>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
<span class="text-primary font-medium">Collar Perlas de Río</span>
</nav>
<!-- Product Layout -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-12 lg:gap-16 items-start">
<!-- Image Gallery (Left Side) -->
<div class="md:col-span-7 flex flex-col gap-6">
<!-- Main Image -->
<div class="relative w-full aspect-[4/5] md:aspect-square rounded-2xl overflow-hidden bg-surface-container shadow-[0_20px_40px_-15px_rgba(138,72,111,0.1)] group">
<img alt="A high-end, elegant product photograph of a delicate freshwater pearl necklace resting on a soft, textured beige silk cloth. The lighting is soft and diffused, creating a luxurious, feminine, and artisanal boutique aesthetic with a bright light-mode feel." class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" data-alt="A high-end, elegant product photograph of a delicate freshwater pearl necklace resting on a soft, textured beige silk cloth. The lighting is soft and diffused, creating a luxurious, feminine, and artisanal boutique aesthetic with a bright light-mode feel." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGGl_nN-EyUcjTgBfjeEU9wuP9chAEx8tukfHQ3dk_zHj1bT-gT80y2dhE-1kqUK-Xx5JQGMtwbxQcRJOp6VPOKSKinwPAaw0xfA7abPsyu8AHfftfpSUAjakeYVjRnjSRp4HKKb4veQdIhgvz3lz5pdfzh4iEo8sxL8j4mKmZhyyb5kDzH06TNQCEiXAcPQTs_ONusMvCwElCOM3pdTUQ1vCX_zTE89_-xv9BmBSaCH0Ydhytc4DVbztwlZ1WO3MfYeHJDOKO-SVZ"/>
</div>
<!-- Thumbnails -->
<div class="grid grid-cols-4 gap-4">
<button class="relative aspect-square rounded-xl overflow-hidden border-2 border-primary">
<img alt="Thumbnail 1" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYkh4EM4YibrhyRaokC5VKB371jwTF6JwTowwnmrWV58oMlEvtK-5XGdWNFDqVpjPrwhv28REdxXc7Dscr0nrEqm1eKm5VwPphPe6XHHpwShmPSCfmy6FkHeGq50fE4-PsWcOOcm01LePok6XF_sqftP5hj8g3b3TXXt1pwkrdFsgptNYDhCVJttVgN2Nh5ExWbnZmWGTQrYMeMt6-f3wdfjmhOhkYsx2C--rxh1aWRUtZojH2hbFNTEiiBVYaPZrqTFNsoxD6oFRP"/>
</button>
<button class="relative aspect-square rounded-xl overflow-hidden border border-transparent hover:border-outline-variant transition-colors opacity-70 hover:opacity-100">
<img alt="Thumbnail 2" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBA07mLmQbUilJQ11dabR6heyjvHLKliekJSqrT-RZv8j5f7LDoeGnVCsQwqOrhLDiBhYb1oQhsyjLy0ps2VowLLda2wG4HPq4zfz2jzKHdqc_b13dDcu3NA3c3SUBtkyT6eLwMpjYiP-603HUKRS7JZ3fuyFu9pZkZkv3xq7oMiKd5X3H22A802ZrwvVA9U23m6HDjhzKtIF6E_tdSdDPC5xazREfd60rxAvW4Y3bA5EGCwX3Ll9HsLpbumLo5XOUl9ndGMUllXnHA"/>
</button>
<button class="relative aspect-square rounded-xl overflow-hidden border border-transparent hover:border-outline-variant transition-colors opacity-70 hover:opacity-100">
<img alt="Thumbnail 3" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAhdltrck4r9xSZlkGmjFINtp4dKnGlE5AvH4kl8c25iXzmAfTXbskfATfGbttzqpRsBYFmspUXQK5_wVyVapTsATqt0Gasdfm6CRAuCW0QtqK0VS0gSNibRXmHKhd3QDxAkb2nD0k25MGk1fzw76tFvmLlT9qDKpPLpS6L0gMYYKsqLYev1QI0VLu1zOajfDdtdDgfMEPko4wy3lv22Sn8PG7do9xVThEy9BZze59xbB4VkQEmO8VOtu5UOEwOlqcOt79QszVyif1j"/>
</button>
</div>
</div>
<!-- Product Details (Right Side) -->
<div class="md:col-span-5 flex flex-col pt-2 md:pt-8 sticky top-32">
<h1 class="font-h1-mobile md:font-h1 text-h1-mobile md:text-h1 text-on-surface mb-4">
                    Collar Perlas de Río Naturales
                </h1>
<div class="flex items-center gap-4 mb-6">
<span class="font-h2 text-h2 text-primary">$45.00</span>
<span class="text-on-surface-variant line-through text-lg">$60.00</span>
<span class="bg-tertiary-container text-on-tertiary-container font-label-caps text-label-caps px-3 py-1.5 rounded-full tracking-wider">
                        25% OFF
                    </span>
</div>
<!-- Stock Indicator -->
<div class="flex items-center gap-2 mb-8">
<span class="flex h-2.5 w-2.5 relative">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-tertiary opacity-75"></span>
<span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-tertiary"></span>
</span>
<span class="font-body-sm text-tertiary font-medium">Disponible para encargo artesanal</span>
</div>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed mb-10">
                    Un diseño clásico reinventado. Este collar presenta perlas de río cultivadas, seleccionadas a mano por su lustre único y forma orgánica. Ensamblado delicadamente con terminaciones bañadas en oro de 18k, es la pieza central perfecta para elevar cualquier atuendo con un toque de elegancia atemporal.
                </p>
<!-- Details List -->
<div class="space-y-4 mb-10 border-t border-outline-variant/30 pt-6">
<div class="flex items-center gap-3 text-on-surface-variant">
<span class="material-symbols-outlined text-primary-container">diamond</span>
<span class="font-body-sm">Material: Perlas de río naturales, Oro 18k</span>
</div>
<div class="flex items-center gap-3 text-on-surface-variant">
<span class="material-symbols-outlined text-primary-container">straighten</span>
<span class="font-body-sm">Largo: 40cm + 5cm extensión</span>
</div>
<div class="flex items-center gap-3 text-on-surface-variant">
<span class="material-symbols-outlined text-primary-container">handyman</span>
<span class="font-body-sm">Hecho a mano en Costa Rica</span>
</div>
</div>
<!-- Primary Action -->
<button class="w-full bg-primary text-on-primary font-h3 text-[20px] py-5 rounded-full shadow-[0_10px_20px_-10px_rgba(138,72,111,0.5)] hover:bg-on-primary-fixed-variant hover:-translate-y-1 hover:shadow-[0_15px_25px_-10px_rgba(138,72,111,0.6)] transition-all duration-300 ease-out flex items-center justify-center gap-3 group">
<span class="material-symbols-outlined group-hover:scale-110 transition-transform">shopping_bag</span>
                    Hacer encargo de este producto
                </button>
<p class="text-center text-on-surface-variant font-body-sm mt-4 italic">
                    *Tiempos de preparación: 3 a 5 días hábiles.
                </p>
</div>
</div>
</main>
<!-- Footer -->
<footer class="w-full bg-surface-container-highest dark:bg-surface-dim border-t border-outline-variant/50 mt-auto">
<div class="w-full py-12 px-margin-mobile md:px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-gutter max-w-container-max mx-auto">
<!-- Logo / Brand -->
<div class="font-h3 text-h3 text-primary">
                Accesorios Yamileth
            </div>
<!-- Links -->
<div class="flex flex-wrap justify-center gap-6 font-body-sm text-body-sm">
<a class="text-on-surface-variant hover:text-primary-container transition-colors" href="#">Contact Us</a>
<a class="text-on-surface-variant hover:text-primary-container transition-colors" href="#">Privacy Policy</a>
<a class="text-on-surface-variant hover:text-primary-container transition-colors" href="#">Shipping Info</a>
<a class="text-on-surface-variant hover:text-primary-container transition-colors" href="#">Instagram</a>
<a class="text-on-surface-variant hover:text-primary-container transition-colors" href="#">Facebook</a>
</div>
<!-- Copyright -->
<div class="font-body-sm text-body-sm text-on-surface-variant">
                © 2024 Accesorios Yamileth. All rights reserved.
            </div>
</div>
</footer>
</body></html>