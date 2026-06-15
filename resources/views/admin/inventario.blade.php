<!DOCTYPE html>

<html lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Accesorios Yamileth - Inventario Admin</title>
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
                      "h1": [
                              "Playfair Display"
                      ],
                      "h2": [
                              "Playfair Display"
                      ],
                      "h1-mobile": [
                              "Playfair Display"
                      ],
                      "body-lg": [
                              "Inter"
                      ],
                      "body-sm": [
                              "Inter"
                      ],
                      "h3": [
                              "Playfair Display"
                      ],
                      "label-caps": [
                              "Inter"
                      ],
                      "body-md": [
                              "Inter"
                      ]
              },
              "fontSize": {
                      "h1": [
                              "48px",
                              {
                                      "lineHeight": "1.2",
                                      "letterSpacing": "-0.02em",
                                      "fontWeight": "700"
                              }
                      ],
                      "h2": [
                              "36px",
                              {
                                      "lineHeight": "1.3",
                                      "fontWeight": "600"
                              }
                      ],
                      "h1-mobile": [
                              "32px",
                              {
                                      "lineHeight": "1.2",
                                      "fontWeight": "700"
                              }
                      ],
                      "body-lg": [
                              "18px",
                              {
                                      "lineHeight": "1.6",
                                      "fontWeight": "400"
                              }
                      ],
                      "body-sm": [
                              "14px",
                              {
                                      "lineHeight": "1.5",
                                      "fontWeight": "400"
                              }
                      ],
                      "h3": [
                              "24px",
                              {
                                      "lineHeight": "1.4",
                                      "fontWeight": "600"
                              }
                      ],
                      "label-caps": [
                              "12px",
                              {
                                      "lineHeight": "1",
                                      "letterSpacing": "0.1em",
                                      "fontWeight": "600"
                              }
                      ],
                      "body-md": [
                              "16px",
                              {
                                      "lineHeight": "1.6",
                                      "fontWeight": "400"
                              }
                      ]
              }
      },
          },
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .material-symbols-outlined.filled {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        
        /* Subtle modal backdrop blur */
        .modal-backdrop {
            backdrop-filter: blur(4px);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex">
<!-- SideNavBar (Admin) -->
<aside class="bg-surface-container-low dark:bg-surface-container-lowest text-primary dark:text-primary-fixed-dim docked left-0 h-full w-64 bg-surface/80 backdrop-blur-md shadow-lg flex flex-col h-full border-r border-outline-variant/30 hidden md:flex z-40 fixed">
<div class="p-6 border-b border-outline-variant/30 flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-h3">
                YA
            </div>
<div>
<h2 class="font-h3 text-h3 text-primary dark:text-primary-fixed m-0 leading-tight">Yamileth Admin</h2>
<span class="font-label-caps text-label-caps text-on-surface-variant">Store Manager</span>
</div>
</div>
<div class="p-6 pb-2">
<button class="w-full bg-primary text-on-primary py-3 rounded-lg font-body-md font-medium hover:bg-on-primary-container transition-colors flex justify-center items-center gap-2" onclick="openModal()">
<span class="material-symbols-outlined">add</span>
                 New Product
             </button>
</div>
<nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-transform duration-300 ease-in-out font-label-caps text-label-caps hover:scale-105 hover:bg-primary/10" href="#">
<span class="material-symbols-outlined">dashboard</span>
                Dashboard
            </a>
<a class="flex items-center gap-3 px-4 py-3 bg-primary-container text-on-primary-container rounded-lg font-bold transition-all duration-300 ease-in-out font-label-caps text-label-caps" href="#">
<span class="material-symbols-outlined filled">inventory_2</span>
                Inventory
            </a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-transform duration-300 ease-in-out font-label-caps text-label-caps hover:scale-105 hover:bg-primary/10" href="#">
<span class="material-symbols-outlined">shopping_bag</span>
                Orders
            </a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-transform duration-300 ease-in-out font-label-caps text-label-caps hover:scale-105 hover:bg-primary/10" href="#">
<span class="material-symbols-outlined">group</span>
                Clients
            </a>
</nav>
<div class="p-4 border-t border-outline-variant/30 space-y-2">
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-colors font-label-caps text-label-caps" href="#">
<span class="material-symbols-outlined">settings</span>
                Settings
            </a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-error hover:bg-error-container transition-colors font-label-caps text-label-caps" href="#">
<span class="material-symbols-outlined">logout</span>
                Logout
            </a>
</div>
</aside>
<!-- Mobile Header (Visible only on small screens) -->
<header class="md:hidden bg-surface shadow-sm p-4 flex justify-between items-center w-full fixed top-0 z-30">
<h1 class="font-h3 text-h3 text-primary tracking-tight">AY Admin</h1>
<button class="text-on-surface">
<span class="material-symbols-outlined">menu</span>
</button>
</header>
<!-- Main Content Canvas -->
<main class="flex-1 md:ml-64 pt-20 md:pt-0 min-h-screen pb-12">
<div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-8 md:py-12">
<!-- Page Header & Actions -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
<div>
<h1 class="font-h1 text-h1 text-primary mb-2">Inventory Management</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Manage your catalog, track stock, and update pricing.</p>
</div>
<div class="flex w-full md:w-auto gap-4">
<div class="relative flex-1 md:w-64">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container rounded-full border-none focus:ring-2 focus:ring-primary focus:bg-surface transition-colors font-body-sm text-body-sm" placeholder="Search products..." type="text"/>
</div>
<button class="md:hidden bg-primary text-on-primary px-4 py-2 rounded-full font-label-caps text-label-caps flex items-center gap-2" onclick="openModal()">
<span class="material-symbols-outlined">add</span>
</button>
</div>
</div>
<!-- Bento-style Stats Grid (Optional addition for professional look) -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
<div class="bg-surface-container-low p-6 rounded-2xl shadow-[0_8px_30px_rgb(138,72,111,0.05)] border border-surface-variant/50">
<span class="material-symbols-outlined text-primary mb-2">inventory_2</span>
<h3 class="font-label-caps text-label-caps text-on-surface-variant mb-1">Total Products</h3>
<p class="font-h2 text-h2 text-on-surface">124</p>
</div>
<div class="bg-surface-container-low p-6 rounded-2xl shadow-[0_8px_30px_rgb(138,72,111,0.05)] border border-surface-variant/50">
<span class="material-symbols-outlined text-tertiary mb-2">check_circle</span>
<h3 class="font-label-caps text-label-caps text-on-surface-variant mb-1">Active Listings</h3>
<p class="font-h2 text-h2 text-on-surface">118</p>
</div>
<div class="bg-surface-container-low p-6 rounded-2xl shadow-[0_8px_30px_rgb(138,72,111,0.05)] border border-surface-variant/50">
<span class="material-symbols-outlined text-error mb-2">warning</span>
<h3 class="font-label-caps text-label-caps text-on-surface-variant mb-1">Low Stock</h3>
<p class="font-h2 text-h2 text-on-surface">12</p>
</div>
<div class="bg-surface-container-low p-6 rounded-2xl shadow-[0_8px_30px_rgb(138,72,111,0.05)] border border-surface-variant/50">
<span class="material-symbols-outlined text-primary-container mb-2">sell</span>
<h3 class="font-label-caps text-label-caps text-on-surface-variant mb-1">Avg Profit Margin</h3>
<p class="font-h2 text-h2 text-on-surface">65%</p>
</div>
</div>
<!-- Inventory Table Glassmorphism Container -->
<div class="bg-surface/80 backdrop-blur-xl rounded-2xl shadow-[0_20px_40px_rgb(138,72,111,0.05)] border border-white/50 overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low/50 border-b border-outline-variant/30">
<th class="py-4 px-6 font-label-caps text-label-caps text-on-surface-variant">Product</th>
<th class="py-4 px-6 font-label-caps text-label-caps text-on-surface-variant text-right">Stock</th>
<th class="py-4 px-6 font-label-caps text-label-caps text-on-surface-variant text-right">Investment</th>
<th class="py-4 px-6 font-label-caps text-label-caps text-on-surface-variant text-right">Sale Price</th>
<th class="py-4 px-6 font-label-caps text-label-caps text-on-surface-variant text-right">Discount</th>
<th class="py-4 px-6 font-label-caps text-label-caps text-on-surface-variant text-right">Unit Profit</th>
<th class="py-4 px-6 font-label-caps text-label-caps text-on-surface-variant text-center">Status</th>
<th class="py-4 px-6 font-label-caps text-label-caps text-on-surface-variant text-right">Actions</th>
</tr>
</thead>
<tbody class="font-body-sm text-body-sm divide-y divide-outline-variant/20">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-highest/20 transition-colors group">
<td class="py-4 px-6">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-lg bg-surface-container overflow-hidden shadow-sm relative">
<img alt="Elegant Gold Necklace" class="w-full h-full object-cover" data-alt="A close up shot of a delicate, elegant gold necklace laid flat against a pristine white, bright minimalist surface. The lighting is soft and luxurious, typical of a high-end jewelry boutique layout. Soft shadows hint at the premium quality, reflecting a modern, clean, light-mode aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-Wu5fHgrN11HmEGxF-CCjEJUSDPfWMYczDmn6FZRHd_C8f_PR7zo-KTMzqHec62xR8FKYTi-8gB81yBMb1oBVmWG62p1ib2tQR9YwH74msdymbNt0YqhAPMGXnuEJMHI7Bmkzpii0mRcFe8-Jb9wGTV-Yyjc2_2X_R_--bVsoS4JRkyC0mcjrI0JeV2YCSaJ4EqbL7Rafa2xGH06b8B1ycGa7EmfUwjvVGlaL1RpDaW-wSwICsKzkpQwi5jfunJNUAO1m6OZ81TI0"/>
</div>
<div>
<p class="font-semibold text-on-surface">Collar Perla Elegance</p>
<p class="text-on-surface-variant text-xs">SKU: COL-001</p>
</div>
</div>
</td>
<td class="py-4 px-6 text-right font-medium">24</td>
<td class="py-4 px-6 text-right text-on-surface-variant">$15.00</td>
<td class="py-4 px-6 text-right font-semibold text-primary">$45.00</td>
<td class="py-4 px-6 text-right text-on-surface-variant">$0.00</td>
<td class="py-4 px-6 text-right font-semibold text-tertiary">$30.00</td>
<td class="py-4 px-6 text-center">
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox" value=""/>
<div class="w-9 h-5 bg-surface-variant peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
</label>
</td>
<td class="py-4 px-6 text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-on-surface-variant hover:text-primary transition-colors rounded-full hover:bg-primary/10" title="Edit">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-2 text-on-surface-variant hover:text-error transition-colors rounded-full hover:bg-error/10" title="Delete">
<span class="material-symbols-outlined text-[20px]">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-highest/20 transition-colors group">
<td class="py-4 px-6">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-lg bg-surface-container overflow-hidden shadow-sm">
<div class="w-full h-full flex items-center justify-center text-outline-variant bg-surface-container-high">
<span class="material-symbols-outlined">image</span>
</div>
</div>
<div>
<p class="font-semibold text-on-surface">Pulsera Cristal Rosa</p>
<p class="text-on-surface-variant text-xs">SKU: PUL-042</p>
</div>
</div>
</td>
<td class="py-4 px-6 text-right font-medium text-error">3</td>
<td class="py-4 px-6 text-right text-on-surface-variant">$8.50</td>
<td class="py-4 px-6 text-right font-semibold text-primary">$25.00</td>
<td class="py-4 px-6 text-right text-error">-$5.00</td>
<td class="py-4 px-6 text-right font-semibold text-tertiary">$11.50</td>
<td class="py-4 px-6 text-center">
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox" value=""/>
<div class="w-9 h-5 bg-surface-variant peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
</label>
</td>
<td class="py-4 px-6 text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-on-surface-variant hover:text-primary transition-colors rounded-full hover:bg-primary/10" title="Edit">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-2 text-on-surface-variant hover:text-error transition-colors rounded-full hover:bg-error/10" title="Delete">
<span class="material-symbols-outlined text-[20px]">delete</span>
</button>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-highest/20 transition-colors group opacity-60">
<td class="py-4 px-6">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-lg bg-surface-container overflow-hidden shadow-sm relative">
<img alt="Silver Rings" class="w-full h-full object-cover grayscale" data-alt="A macro photography shot of minimalist silver rings resting on a soft, pale pink velvet surface. The lighting is gentle and diffused, creating soft shadows and highlights that emphasize the metallic texture. The overall mood is calm, luxurious, and aligns with a light, boutique feminine aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAwXTlHwI8c5sYKNCtcLaS_p7Y-QlBD7v2Gvu8tbtkZNdtYuNCq3yYBnvMQoY1uqr_teCDKKX6sb93PPNF3YoKN_6XzXcZlxGryqN5gcawVMMzdt9HIeuDfK_bvabYwIfoJ4iyTeFJxj4ZpXiXx0knM4kByAt-ywbgmHOkQWTtpMvUsD8o1nIlE9p-DCEU5kWPXx9N0iBdLXuWzY4V_h3razo3P7lP0tMz_lP35I-gEKaf_U1-tQfNw9Gp-e9i9835NUtD7-Db-aKCa"/>
</div>
<div>
<p class="font-semibold text-on-surface line-through decoration-outline">Set Anillos Plata</p>
<p class="text-on-surface-variant text-xs">SKU: ANI-012</p>
</div>
</div>
</td>
<td class="py-4 px-6 text-right font-medium">0</td>
<td class="py-4 px-6 text-right text-on-surface-variant">$12.00</td>
<td class="py-4 px-6 text-right font-semibold text-on-surface-variant">$35.00</td>
<td class="py-4 px-6 text-right text-on-surface-variant">$0.00</td>
<td class="py-4 px-6 text-right font-semibold text-on-surface-variant">$23.00</td>
<td class="py-4 px-6 text-center">
<label class="relative inline-flex items-center cursor-pointer">
<input class="sr-only peer" type="checkbox" value=""/>
<div class="w-9 h-5 bg-surface-variant peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary"></div>
</label>
</td>
<td class="py-4 px-6 text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-on-surface-variant hover:text-primary transition-colors rounded-full hover:bg-primary/10" title="Edit">
<span class="material-symbols-outlined text-[20px]">edit</span>
</button>
<button class="p-2 text-on-surface-variant hover:text-error transition-colors rounded-full hover:bg-error/10" title="Delete">
<span class="material-symbols-outlined text-[20px]">delete</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="p-4 border-t border-outline-variant/30 flex items-center justify-between bg-surface-container-low/30">
<span class="font-body-sm text-body-sm text-on-surface-variant">Showing 1 to 10 of 124 entries</span>
<div class="flex gap-1">
<button class="p-2 rounded-lg text-on-surface-variant hover:bg-surface-container disabled:opacity-50" disabled="">
<span class="material-symbols-outlined text-[20px]">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg bg-primary text-on-primary font-body-sm flex items-center justify-center">1</button>
<button class="w-8 h-8 rounded-lg text-on-surface hover:bg-surface-container font-body-sm flex items-center justify-center">2</button>
<button class="w-8 h-8 rounded-lg text-on-surface hover:bg-surface-container font-body-sm flex items-center justify-center">3</button>
<span class="w-8 h-8 flex items-center justify-center text-on-surface-variant">...</span>
<button class="p-2 rounded-lg text-on-surface hover:bg-surface-container">
<span class="material-symbols-outlined text-[20px]">chevron_right</span>
</button>
</div>
</div>
</div>
</div>
</main>
<!-- Add/Edit Product Modal -->
<div class="fixed inset-0 z-50 hidden flex items-center justify-center px-4 modal-backdrop bg-on-background/20 transition-opacity opacity-0" id="productModal">
<div class="bg-surface rounded-2xl shadow-[0_24px_48px_rgb(138,72,111,0.15)] w-full max-w-2xl overflow-hidden flex flex-col max-h-[921px] scale-95 transition-transform duration-300" id="modalContent">
<!-- Modal Header -->
<div class="px-6 py-4 border-b border-outline-variant/30 flex justify-between items-center bg-surface-container-lowest">
<h2 class="font-h3 text-h3 text-primary">Agregar Producto</h2>
<button class="text-on-surface-variant hover:text-error transition-colors rounded-full p-1 hover:bg-surface-container" onclick="closeModal()">
<span class="material-symbols-outlined">close</span>
</button>
</div>
<!-- Modal Body (Scrollable) -->
<div class="p-6 overflow-y-auto custom-scrollbar flex-1">
<form class="space-y-6">
<!-- Image Upload Area -->
<div class="flex flex-col items-center justify-center w-full">
<label class="flex flex-col items-center justify-center w-full h-48 border-2 border-outline-variant border-dashed rounded-xl cursor-pointer bg-surface hover:bg-surface-container-low transition-colors group" for="dropzone-file">
<div class="flex flex-col items-center justify-center pt-5 pb-6">
<span class="material-symbols-outlined text-4xl text-primary mb-3 group-hover:scale-110 transition-transform">cloud_upload</span>
<p class="mb-2 font-body-sm text-body-sm text-on-surface"><span class="font-semibold">Click to upload</span> or drag and drop</p>
<p class="font-label-caps text-label-caps text-on-surface-variant lowercase">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
</div>
<input class="hidden" id="dropzone-file" type="file"/>
</label>
</div>
<!-- Basic Info -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2 md:col-span-2">
<label class="font-label-caps text-label-caps text-on-surface-variant">Product Name</label>
<input class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all font-body-md" placeholder="e.g. Collar Perla Elegance" type="text"/>
</div>
<div class="space-y-2">
<label class="font-label-caps text-label-caps text-on-surface-variant">SKU (Optional)</label>
<input class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all font-body-md" placeholder="e.g. COL-001" type="text"/>
</div>
<div class="space-y-2">
<label class="font-label-caps text-label-caps text-on-surface-variant">Initial Stock</label>
<input class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all font-body-md" min="0" placeholder="0" type="number"/>
</div>
</div>
<div class="border-t border-outline-variant/30 my-4"></div>
<!-- Pricing Info -->
<h3 class="font-h3 text-base text-on-surface mb-4">Pricing Details</h3>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="space-y-2">
<label class="font-label-caps text-label-caps text-on-surface-variant">Investment Price</label>
<div class="relative">
<span class="absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">$</span>
<input class="w-full pl-8 pr-4 py-3 rounded-lg border border-outline-variant bg-surface focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all font-body-md" placeholder="0.00" step="0.01" type="number"/>
</div>
</div>
<div class="space-y-2">
<label class="font-label-caps text-label-caps text-on-surface-variant">Sale Price</label>
<div class="relative">
<span class="absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">$</span>
<input class="w-full pl-8 pr-4 py-3 rounded-lg border border-outline-variant bg-surface focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all font-body-md" placeholder="0.00" step="0.01" type="number"/>
</div>
</div>
<div class="space-y-2">
<label class="font-label-caps text-label-caps text-on-surface-variant">Discount</label>
<div class="relative">
<span class="absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">$</span>
<input class="w-full pl-8 pr-4 py-3 rounded-lg border border-outline-variant bg-surface focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all font-body-md" placeholder="0.00" step="0.01" type="number"/>
</div>
</div>
</div>
<!-- Projected Profit Display (Static for demo) -->
<div class="bg-primary/5 border border-primary/20 rounded-xl p-4 flex justify-between items-center mt-2">
<span class="font-body-sm text-on-surface-variant">Projected Unit Profit</span>
<span class="font-h3 text-h3 text-primary font-bold">$0.00</span>
</div>
<!-- Status Toggle -->
<div class="flex items-center justify-between p-4 bg-surface-container-low rounded-xl border border-outline-variant/30">
<div>
<p class="font-semibold text-on-surface">Active Listing</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Product will be immediately visible in store.</p>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox" value=""/>
<div class="w-11 h-6 bg-surface-variant peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
</label>
</div>
</form>
</div>
<!-- Modal Footer -->
<div class="p-6 border-t border-outline-variant/30 bg-surface-container-lowest flex justify-end gap-4">
<button class="px-6 py-2.5 rounded-full font-label-caps text-label-caps text-on-surface border border-outline-variant hover:bg-surface-container transition-colors" onclick="closeModal()">
                    Cancel
                </button>
<button class="px-6 py-2.5 rounded-full font-label-caps text-label-caps bg-primary text-on-primary hover:bg-on-primary-container shadow-md hover:shadow-lg transition-all hover:-translate-y-0.5">
                    Save Product
                </button>
</div>
</div>
</div>
<script>
        const modal = document.getElementById('productModal');
        const modalContent = document.getElementById('modalContent');

        function openModal() {
            modal.classList.remove('hidden');
            // Small delay to allow display:flex to apply before animating opacity
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95');
            }, 10);
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            modalContent.classList.add('scale-95');
            
            // Wait for transition to finish before hiding
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        // Close on backdrop click
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
</body></html>