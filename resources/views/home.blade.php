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
<nav class="bg-surface shadow-sm docked full-width top-0 z-50 sticky">
<div class="flex justify-between items-center w-full px-margin-mobile md:px-margin-desktop py-4 max-w-container-max mx-auto">
<!-- Brand -->
<div class="flex items-center gap-2">
<span class="font-h2 text-h2 text-primary tracking-tight">Accesorios Yamileth</span>
</div>
<!-- Search (Desktop) -->
<div class="hidden md:flex flex-1 max-w-md mx-8 relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container-low border border-outline-variant rounded-full text-body-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors" placeholder="Search jewelry..." type="text"/>
</div>
<!-- Navigation Links & Actions -->
<div class="hidden md:flex items-center gap-6">
<a class="text-primary font-bold border-b-2 border-primary pb-1" href="#">Products</a>
<a class="text-on-surface-variant font-medium hover:text-primary-fixed-variant transition-colors duration-200" href="#">My Orders</a>
<a class="text-on-surface-variant font-medium hover:text-primary-fixed-variant transition-colors duration-200" href="#">Profile</a>
<div class="flex items-center gap-3 border-l border-outline-variant pl-6">
<button class="text-primary font-medium hover:text-primary-fixed-variant transition-colors">Login</button>
<button class="bg-primary text-on-primary px-4 py-2 rounded-full font-medium hover:opacity-80 scale-95 transition-all">Register</button>
</div>
</div>
<!-- Mobile Menu Toggle -->
<button class="md:hidden text-on-surface p-2">
<span class="material-symbols-outlined" data-icon="menu">menu</span>
</button>
</div>
<!-- Mobile Search (Visible only on mobile) -->
<div class="md:hidden px-margin-mobile pb-4">
<div class="relative w-full">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container-low border border-outline-variant rounded-full text-body-sm focus:outline-none focus:border-primary" placeholder="Search..." type="text"/>
</div>
</div>
</nav>
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
<div class="flex justify-between items-center mb-6">
<span class="text-body-sm text-on-surface-variant">Showing 24 products</span>
<select class="bg-surface-container-low border border-outline-variant rounded-md text-body-sm px-4 py-2 focus:outline-none focus:border-primary text-on-surface">
<option>Sort by: Featured</option>
<option>Price: Low to High</option>
<option>Price: High to Low</option>
<option>Newest Arrivals</option>
</select>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
<!-- Product Card 1 -->
<div class="group relative bg-surface rounded-xl flex flex-col shadow-[0_8px_30px_rgb(138,72,111,0.06)] hover:shadow-[0_8px_30px_rgb(138,72,111,0.12)] hover:-translate-y-1 transition-all duration-300">
<div class="relative aspect-square overflow-hidden rounded-t-xl bg-surface-container-low">
<img alt="Elegant rose gold necklace with a delicate diamond pendant displayed on a minimalist white pedestal. Soft, warm lighting highlights the intricate details of the chain and the sparkle of the gem. The aesthetic is luxurious, feminine, and clean, fitting a premium boutique catalog." class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Elegant rose gold necklace with a delicate diamond pendant displayed on a minimalist white pedestal. Soft, warm lighting highlights the intricate details of the chain and the sparkle of the gem. The aesthetic is luxurious, feminine, and clean, fitting a premium boutique catalog." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD90f7qJeGzwDtidwY7rerAKpAm_a9DFa72hvxB92GhXiKexEO2KgPg2bq0Fl7shl1srVYlfPLX3gr4jdpWbYftM_depJ4YrWg-Gl4577YJOw3kDPGxrlUKa-n1T-gyzid0E4KYumIpYc2P72ZUEkGjhZ-_KpCDg7W8DcSGE5WkMvl5uU-9q0fIwgpjpipl0Rd37YSYD0IUkOwTUmPKPiW6bSFgVsaaWW9fh7ibNrIQ5bH0jYckFgnKaNagF27KNDYVk6VNwA_hziBc"/>
<div class="absolute top-3 left-3 bg-error text-on-error px-2 py-1 rounded-full font-label-caps text-label-caps shadow-sm">
                            -15%
                        </div>
</div>
<div class="p-4 flex flex-col flex-1 text-center">
<h4 class="font-body-lg text-body-lg text-on-surface mb-1">Rose Gold Diamond Pendant</h4>
<div class="flex justify-center items-center gap-2 mb-4">
<span class="font-h3 text-h3 text-primary">$125.00</span>
<span class="text-body-sm text-outline line-through">$147.00</span>
</div>
<button class="mt-auto w-full bg-primary-container text-on-primary-container py-2.5 rounded-full font-medium hover:bg-primary hover:text-on-primary transition-colors duration-300">
                            Encargar
                        </button>
</div>
</div>
<!-- Product Card 2 -->
<div class="group relative bg-surface rounded-xl flex flex-col shadow-[0_8px_30px_rgb(138,72,111,0.06)] hover:shadow-[0_8px_30px_rgb(138,72,111,0.12)] hover:-translate-y-1 transition-all duration-300">
<div class="relative aspect-square overflow-hidden rounded-t-xl bg-surface-container-low">
<img alt="A pair of intricate silver hoop earrings resting on a smooth, soft pink fabric background. The lighting is bright and diffused, creating soft shadows that emphasize the artisanal texture of the silver. The composition is centered and elegant, reflecting a high-end boutique style." class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A pair of intricate silver hoop earrings resting on a smooth, soft pink fabric background. The lighting is bright and diffused, creating soft shadows that emphasize the artisanal texture of the silver. The composition is centered and elegant, reflecting a high-end boutique style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6xJBzeb6py1pKg2TZKsRS0YIxqucuNGaPtZkfcgtNKV5zzcDvLKBrMrtWdeJL9UJ2v3a8sJ-rVmld_jPyIofplkzQO4-ZlmmrqblAA1SYYRB5SjYnAfFvh0BGCUxO-FMhIQWeKsjAku5R7PNj-VdHei85OHDEbIm9vJ7qDjvPZ8Be61I3zG2qgnbHtumIC_pthZyzCPp6M_tbrzANkPIk53Ib9t8hwRoVlfwZmBHHenEM8dSd3ctn5Il_c9t127fkkDlG2v-YzORc"/>
</div>
<div class="p-4 flex flex-col flex-1 text-center">
<h4 class="font-body-lg text-body-lg text-on-surface mb-1">Artisan Silver Hoops</h4>
<div class="flex justify-center items-center gap-2 mb-4">
<span class="font-h3 text-h3 text-primary">$45.00</span>
</div>
<button class="mt-auto w-full bg-surface-container text-on-surface py-2.5 rounded-full font-medium border border-outline-variant hover:bg-primary hover:text-on-primary hover:border-primary transition-colors duration-300">
                            Encargar
                        </button>
</div>
</div>
<!-- Product Card 3 -->
<div class="group relative bg-surface rounded-xl flex flex-col shadow-[0_8px_30px_rgb(138,72,111,0.06)] hover:shadow-[0_8px_30px_rgb(138,72,111,0.12)] hover:-translate-y-1 transition-all duration-300">
<div class="relative aspect-square overflow-hidden rounded-t-xl bg-surface-container-low">
<img alt="A collection of delicate gold stacking rings displayed neatly in a row on a piece of white marble. The scene is brightly lit with natural light, giving a fresh and modern feel. The styling is minimalist, focusing on the fine details of each ring, matching a luxury artisanal brand." class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A collection of delicate gold stacking rings displayed neatly in a row on a piece of white marble. The scene is brightly lit with natural light, giving a fresh and modern feel. The styling is minimalist, focusing on the fine details of each ring, matching a luxury artisanal brand." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDgAcbluo_poFAN_260IV1zAe354aMYEeEky8jpu5_iUD1kTIWWajUZ3GTYJk2mrkLhay2QRd_iKo4SVVITRfHJZdSvU8-0NW8ESsPwGben1sSrlvW1zhWCmQR3PAoHt0i41pIqfKSTMSEkjwuh97HBBHQrFJNuLmt2HE_Qks5r6TDdTVWP1jkYoKtwijs1wCNbROtxvcH98HE0ye2KnQAikUWdCFu-ZUkTovtT8xemAKIvWul8EU5DDXMU3SdlHlDz1OyldvrcylBt"/>
</div>
<div class="p-4 flex flex-col flex-1 text-center">
<h4 class="font-body-lg text-body-lg text-on-surface mb-1">Gold Stacking Rings Set</h4>
<div class="flex justify-center items-center gap-2 mb-4">
<span class="font-h3 text-h3 text-primary">$85.00</span>
</div>
<button class="mt-auto w-full bg-surface-container text-on-surface py-2.5 rounded-full font-medium border border-outline-variant hover:bg-primary hover:text-on-primary hover:border-primary transition-colors duration-300">
                            Encargar
                        </button>
</div>
</div>
<!-- Product Card 4 -->
<div class="group relative bg-surface rounded-xl flex flex-col shadow-[0_8px_30px_rgb(138,72,111,0.06)] hover:shadow-[0_8px_30px_rgb(138,72,111,0.12)] hover:-translate-y-1 transition-all duration-300">
<div class="relative aspect-square overflow-hidden rounded-t-xl bg-surface-container-low">
<img alt="A chunky chain bracelet in shiny gold finish resting delicately on a softly folded beige velvet cloth. The light is focused on the bracelet, creating soft reflections that imply quality and weight. The overall mood is sophisticated and softly feminine." class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A chunky chain bracelet in shiny gold finish resting delicately on a softly folded beige velvet cloth. The light is focused on the bracelet, creating soft reflections that imply quality and weight. The overall mood is sophisticated and softly feminine." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxW60LH3d0MB0GWUqAW4QAygbm7rL4iPn7rleYw7tqDVJqJyvhaNBLFZ17668ER16AnGm62XtJIRm9HWa9Whc5PIKw9K-A8t3tux-1bvAGWNp0uYSyyUsI4HwWSU5p4gFvCaCx_QwEW2fXxqH7XDwtbmrM-_UT8Y_oZeGvcQI3m-TbxsT3yZ33CLJtckY5SWtmGnbIvoCRFEB7pHNgi--bs_7y4vXKW16yl_NaIvHjBdXyYMg7tOo1y6RS6wH71H4Qlg4oVBm3W29K"/>
<div class="absolute top-3 left-3 bg-tertiary text-on-tertiary px-2 py-1 rounded-full font-label-caps text-label-caps shadow-sm">
                            NEW
                        </div>
</div>
<div class="p-4 flex flex-col flex-1 text-center">
<h4 class="font-body-lg text-body-lg text-on-surface mb-1">Classic Chain Bracelet</h4>
<div class="flex justify-center items-center gap-2 mb-4">
<span class="font-h3 text-h3 text-primary">$60.00</span>
</div>
<button class="mt-auto w-full bg-surface-container text-on-surface py-2.5 rounded-full font-medium border border-outline-variant hover:bg-primary hover:text-on-primary hover:border-primary transition-colors duration-300">
                            Encargar
                        </button>
</div>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-surface-container-highest w-full py-12 px-margin-mobile md:px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-gutter border-t border-outline-variant/50 mt-auto">
<div class="text-center md:text-left">
<h3 class="font-h3 text-h3 text-primary mb-2">Accesorios Yamileth</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">© 2024 Accesorios Yamileth. All rights reserved.</p>
</div>
<div class="flex flex-wrap justify-center gap-6">
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary-container transition-colors" href="#">Contact Us</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary-container transition-colors" href="#">Privacy Policy</a>
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary-container transition-colors" href="#">Shipping Info</a>
</div>
<div class="flex gap-4">
<a class="text-on-surface-variant hover:text-primary-container transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="photo_camera">photo_camera</span>
</a>
<a class="text-on-surface-variant hover:text-primary-container transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="thumb_up">thumb_up</span>
</a>
</div>
</footer>
</body></html>