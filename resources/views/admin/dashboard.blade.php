<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Dashboard - Accesorios Yamileth</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
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
        .icon-fill {
            font-variation-settings: 'FILL' 1;
        }
        
        /* Custom Scrollbar for a cleaner look */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #d5c1c9; /* outline-variant */
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex antialiased">
<!-- Mobile Header (Hidden on Desktop) -->
<header class="md:hidden fixed top-0 w-full z-50 bg-surface border-b border-outline-variant/30 px-margin-mobile py-4 flex justify-between items-center shadow-sm">
<h1 class="font-h3 text-h3 text-primary tracking-tight">Accesorios Yamileth</h1>
<button class="p-2 text-on-surface-variant" id="mobile-menu-btn">
<span class="material-symbols-outlined">menu</span>
</button>
</header>
<!-- SideNavBar (from JSON) -->
<aside class="bg-surface-container-low dark:bg-surface-container-lowest text-primary dark:text-primary-fixed-dim font-label-caps text-label-caps docked left-0 h-full w-64 bg-surface/80 backdrop-blur-md shadow-lg shadow-lg flex flex-col h-full border-r border-outline-variant/30 transition-all duration-300 ease-in-out z-40 fixed md:sticky top-0 -translate-x-full md:translate-x-0" id="sidebar">
<!-- Sidebar Header -->
<div class="p-6 flex flex-col items-center border-b border-outline-variant/20">
<div class="w-16 h-16 rounded-full bg-surface-container-highest mb-4 overflow-hidden shadow-sm flex items-center justify-center">
<!-- Using a placeholder for avatar -->
<span class="material-symbols-outlined text-primary" style="font-size: 32px;">person</span>
</div>
<h2 class="font-h3 text-h3 text-primary dark:text-primary-fixed mb-1 text-center">Yamileth Admin</h2>
<p class="text-on-surface-variant opacity-80 font-body-sm text-body-sm">Store Manager</p>
</div>
<!-- Main Navigation -->
<nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
<!-- Active Item: Dashboard -->
<a class="flex items-center gap-4 px-4 py-3 bg-primary-container text-on-primary-container rounded-lg font-bold hover:scale-105 hover:bg-primary/10 transition-transform transition-all duration-300 ease-in-out" href="#">
<span class="material-symbols-outlined icon-fill">dashboard</span>
                Dashboard
            </a>
<!-- Inactive Items -->
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg hover:scale-105 hover:bg-primary/10 transition-transform transition-all duration-300 ease-in-out" href="#">
<span class="material-symbols-outlined">inventory_2</span>
                Inventory
            </a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg hover:scale-105 hover:bg-primary/10 transition-transform transition-all duration-300 ease-in-out" href="#">
<span class="material-symbols-outlined">shopping_bag</span>
                Orders
            </a>
<a class="flex items-center gap-4 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg hover:scale-105 hover:bg-primary/10 transition-transform transition-all duration-300 ease-in-out" href="#">
<span class="material-symbols-outlined">group</span>
                Clients
            </a>
</nav>
<!-- CTA Button -->
<div class="px-6 py-4">
<button class="w-full bg-primary text-on-primary py-3 rounded-full font-label-caps text-label-caps shadow-sm hover:shadow-md hover:bg-primary/90 transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined" style="font-size: 18px;">add</span>
                New Product
            </button>
</div>
<!-- Footer Navigation -->
<div class="mt-auto border-t border-outline-variant/20 p-4 space-y-1">
<a class="flex items-center gap-4 px-4 py-2 text-on-surface-variant hover:bg-surface-container-high rounded-lg hover:scale-105 hover:bg-primary/10 transition-transform transition-all duration-300 ease-in-out" href="#">
<span class="material-symbols-outlined">settings</span>
                Settings
            </a>
<a class="flex items-center gap-4 px-4 py-2 text-error hover:bg-error-container/50 rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">logout</span>
                Logout
            </a>
</div>
</aside>
<!-- Overlay for mobile sidebar -->
<div class="fixed inset-0 bg-on-background/20 backdrop-blur-sm z-30 hidden md:hidden" id="sidebar-overlay"></div>
<!-- Main Content Area -->
<main class="flex-1 flex flex-col min-w-0 h-screen overflow-y-auto pt-[72px] md:pt-0">
<div class="px-margin-mobile md:px-margin-desktop py-8 md:py-12 max-w-container-max mx-auto w-full">
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center justify-between mb-12 gap-4">
<div>
<h1 class="font-h2 text-h2 text-on-surface mb-2">Overview</h1>
<p class="font-body-sm text-body-sm text-on-surface-variant">Here's what's happening with your store today.</p>
</div>
<div class="flex items-center gap-3">
<span class="font-body-sm text-body-sm text-on-surface-variant">Today, Oct 24</span>
<button class="p-2 rounded-full bg-surface-container hover:bg-surface-container-high transition-colors text-primary">
<span class="material-symbols-outlined">calendar_today</span>
</button>
</div>
</div>
<!-- Summary Cards (Bento Grid Style) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter mb-12">
<!-- Orders Today -->
<div class="bg-surface rounded-xl p-6 shadow-[0_8px_30px_rgb(138,72,111,0.05)] hover:shadow-[0_8px_30px_rgb(138,72,111,0.1)] transition-shadow duration-300 relative overflow-hidden group">
<div class="absolute -right-4 -top-4 w-24 h-24 bg-primary-container/20 rounded-full blur-xl group-hover:bg-primary-container/30 transition-colors"></div>
<div class="flex justify-between items-start mb-4 relative z-10">
<div class="p-3 bg-surface-container rounded-lg text-primary">
<span class="material-symbols-outlined">shopping_cart</span>
</div>
<span class="font-body-sm text-body-sm text-tertiary flex items-center gap-1 bg-tertiary-container/20 px-2 py-1 rounded-full">
<span class="material-symbols-outlined" style="font-size: 14px;">trending_up</span> 12%
                        </span>
</div>
<div class="relative z-10">
<p class="font-body-sm text-body-sm text-on-surface-variant mb-1">Orders Today</p>
<h3 class="font-h3 text-h3 text-on-surface">24</h3>
</div>
</div>
<!-- Pending Orders -->
<div class="bg-surface rounded-xl p-6 shadow-[0_8px_30px_rgb(138,72,111,0.05)] hover:shadow-[0_8px_30px_rgb(138,72,111,0.1)] transition-shadow duration-300 relative overflow-hidden group">
<div class="absolute -right-4 -top-4 w-24 h-24 bg-surface-container-highest/50 rounded-full blur-xl group-hover:bg-surface-container-highest/80 transition-colors"></div>
<div class="flex justify-between items-start mb-4 relative z-10">
<div class="p-3 bg-surface-container rounded-lg text-secondary">
<span class="material-symbols-outlined">pending_actions</span>
</div>
<span class="font-body-sm text-body-sm text-error flex items-center gap-1 bg-error-container/20 px-2 py-1 rounded-full">
<span class="material-symbols-outlined" style="font-size: 14px;">priority_high</span> 5 req
                        </span>
</div>
<div class="relative z-10">
<p class="font-body-sm text-body-sm text-on-surface-variant mb-1">Pending Orders</p>
<h3 class="font-h3 text-h3 text-on-surface">12</h3>
</div>
</div>
<!-- Products in Stock -->
<div class="bg-surface rounded-xl p-6 shadow-[0_8px_30px_rgb(138,72,111,0.05)] hover:shadow-[0_8px_30px_rgb(138,72,111,0.1)] transition-shadow duration-300 relative overflow-hidden group">
<div class="absolute -right-4 -top-4 w-24 h-24 bg-tertiary-container/20 rounded-full blur-xl group-hover:bg-tertiary-container/30 transition-colors"></div>
<div class="flex justify-between items-start mb-4 relative z-10">
<div class="p-3 bg-surface-container rounded-lg text-tertiary">
<span class="material-symbols-outlined">inventory</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 bg-surface-container px-2 py-1 rounded-full">
                            Stable
                        </span>
</div>
<div class="relative z-10">
<p class="font-body-sm text-body-sm text-on-surface-variant mb-1">Products in Stock</p>
<h3 class="font-h3 text-h3 text-on-surface">342</h3>
</div>
</div>
<!-- Monthly Profit -->
<div class="bg-primary rounded-xl p-6 shadow-[0_12px_40px_rgb(138,72,111,0.2)] hover:shadow-[0_16px_50px_rgb(138,72,111,0.3)] transition-shadow duration-300 relative overflow-hidden group text-on-primary">
<div class="absolute -right-10 -top-10 w-40 h-40 bg-primary-container/20 rounded-full blur-2xl group-hover:bg-primary-container/30 transition-colors"></div>
<div class="absolute -left-10 -bottom-10 w-32 h-32 bg-inverse-primary/10 rounded-full blur-xl"></div>
<div class="flex justify-between items-start mb-4 relative z-10">
<div class="p-3 bg-on-primary/10 rounded-lg text-on-primary backdrop-blur-sm">
<span class="material-symbols-outlined">payments</span>
</div>
<span class="font-body-sm text-body-sm text-on-primary flex items-center gap-1 bg-on-primary/20 px-2 py-1 rounded-full backdrop-blur-sm">
<span class="material-symbols-outlined" style="font-size: 14px;">trending_up</span> 8.4%
                        </span>
</div>
<div class="relative z-10">
<p class="font-body-sm text-body-sm text-primary-fixed mb-1">Monthly Profit</p>
<h3 class="font-h2 text-h2 text-on-primary">$4,250.00</h3>
</div>
</div>
</div>
<!-- Two Column Layout: Recent Orders & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
<!-- Recent Orders Table Area (Takes 2/3 space on large screens) -->
<div class="lg:col-span-2 bg-surface rounded-xl shadow-[0_8px_30px_rgb(138,72,111,0.05)] overflow-hidden flex flex-col">
<div class="p-6 border-b border-outline-variant/30 flex justify-between items-center">
<h2 class="font-h3 text-h3 text-on-surface">Recent Orders</h2>
<a class="font-body-sm text-body-sm text-primary hover:text-primary-fixed-variant transition-colors flex items-center gap-1" href="#">
                            View All <span class="material-symbols-outlined" style="font-size: 16px;">arrow_forward</span>
</a>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant/30 text-on-surface-variant font-label-caps text-label-caps">
<th class="py-4 px-6 font-semibold">Order ID</th>
<th class="py-4 px-6 font-semibold">Customer</th>
<th class="py-4 px-6 font-semibold">Date</th>
<th class="py-4 px-6 font-semibold">Amount</th>
<th class="py-4 px-6 font-semibold">Status</th>
</tr>
</thead>
<tbody class="font-body-sm text-body-sm divide-y divide-outline-variant/20">
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-4 px-6 text-on-surface font-medium">#ORD-001</td>
<td class="py-4 px-6 text-on-surface-variant flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold text-xs">MV</div>
                                        Maria Vallejo
                                    </td>
<td class="py-4 px-6 text-on-surface-variant">Oct 24, 10:30 AM</td>
<td class="py-4 px-6 text-on-surface font-medium">$125.00</td>
<td class="py-4 px-6">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-caps text-label-caps bg-tertiary-container/30 text-on-tertiary-container">
                                            Completed
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-4 px-6 text-on-surface font-medium">#ORD-002</td>
<td class="py-4 px-6 text-on-surface-variant flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface flex items-center justify-center font-bold text-xs">LC</div>
                                        Laura Castro
                                    </td>
<td class="py-4 px-6 text-on-surface-variant">Oct 24, 09:15 AM</td>
<td class="py-4 px-6 text-on-surface font-medium">$85.50</td>
<td class="py-4 px-6">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-caps text-label-caps bg-primary-container/30 text-on-primary-container">
                                            Processing
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-4 px-6 text-on-surface font-medium">#ORD-003</td>
<td class="py-4 px-6 text-on-surface-variant flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface flex items-center justify-center font-bold text-xs">AG</div>
                                        Ana Garcia
                                    </td>
<td class="py-4 px-6 text-on-surface-variant">Oct 23, 16:45 PM</td>
<td class="py-4 px-6 text-on-surface font-medium">$210.00</td>
<td class="py-4 px-6">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-caps text-label-caps bg-error-container/30 text-on-error-container">
                                            Pending
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-4 px-6 text-on-surface font-medium">#ORD-004</td>
<td class="py-4 px-6 text-on-surface-variant flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface flex items-center justify-center font-bold text-xs">SR</div>
                                        Sofia Reyes
                                    </td>
<td class="py-4 px-6 text-on-surface-variant">Oct 23, 14:20 PM</td>
<td class="py-4 px-6 text-on-surface font-medium">$45.00</td>
<td class="py-4 px-6">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-caps text-label-caps bg-tertiary-container/30 text-on-tertiary-container">
                                            Completed
                                        </span>
</td>
</tr>
<tr class="hover:bg-surface-container-lowest transition-colors group">
<td class="py-4 px-6 text-on-surface font-medium">#ORD-005</td>
<td class="py-4 px-6 text-on-surface-variant flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface flex items-center justify-center font-bold text-xs">CD</div>
                                        Carmen Diaz
                                    </td>
<td class="py-4 px-6 text-on-surface-variant">Oct 23, 11:10 AM</td>
<td class="py-4 px-6 text-on-surface font-medium">$150.00</td>
<td class="py-4 px-6">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full font-label-caps text-label-caps bg-tertiary-container/30 text-on-tertiary-container">
                                            Completed
                                        </span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Quick Actions & Promotions (Takes 1/3 space) -->
<div class="flex flex-col gap-gutter">
<!-- Quick Actions Glassmorphism Card -->
<div class="bg-surface/60 backdrop-blur-lg rounded-xl p-6 shadow-[0_8px_30px_rgb(138,72,111,0.05)] border border-white/50">
<h2 class="font-h3 text-h3 text-on-surface mb-6">Quick Actions</h2>
<div class="space-y-4">
<a class="flex items-center justify-between p-4 rounded-lg bg-surface hover:bg-primary-container/10 border border-outline-variant/30 hover:border-primary/30 transition-all group" href="#">
<div class="flex items-center gap-4">
<div class="p-2 bg-surface-container rounded-md text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
<span class="material-symbols-outlined">inventory_2</span>
</div>
<span class="font-body-md text-body-md text-on-surface font-medium">Inventario</span>
</div>
<span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">chevron_right</span>
</a>
<a class="flex items-center justify-between p-4 rounded-lg bg-surface hover:bg-primary-container/10 border border-outline-variant/30 hover:border-primary/30 transition-all group" href="#">
<div class="flex items-center gap-4">
<div class="p-2 bg-surface-container rounded-md text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
<span class="material-symbols-outlined">shopping_bag</span>
</div>
<span class="font-body-md text-body-md text-on-surface font-medium">Pedidos</span>
</div>
<span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">chevron_right</span>
</a>
<a class="flex items-center justify-between p-4 rounded-lg bg-surface hover:bg-primary-container/10 border border-outline-variant/30 hover:border-primary/30 transition-all group" href="#">
<div class="flex items-center gap-4">
<div class="p-2 bg-surface-container rounded-md text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
<span class="material-symbols-outlined">group</span>
</div>
<span class="font-body-md text-body-md text-on-surface font-medium">Clientes</span>
</div>
<span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">chevron_right</span>
</a>
</div>
</div>
<!-- Ambient Image Card to add luxury feel -->
<div class="bg-surface rounded-xl overflow-hidden shadow-[0_8px_30px_rgb(138,72,111,0.05)] relative min-h-[200px] flex items-end p-6">
<img alt="Placeholder Image" class="absolute inset-0 w-full h-full object-cover opacity-80" data-alt="A close up, high-end editorial product shot of delicate gold and rose gold jewelry resting on a pristine, soft pink satin fabric. The lighting is soft, diffused, and bright, highlighting the gleam of the metal and casting gentle, elegant shadows. The mood is luxurious, feminine, and sophisticated, perfectly matching a boutique light-mode aesthetic with a focus on pristine whites and soft pinks." src="https://www.gstatic.com/labs-code/stitch/stitch-placeholder-300x300.svg"/>
<div class="absolute inset-0 bg-gradient-to-t from-background/90 via-background/40 to-transparent"></div>
<div class="relative z-10 w-full">
<h3 class="font-h3 text-h3 text-on-surface mb-1">New Collection</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-4">Prepare the inventory for the upcoming season launch.</p>
<button class="w-full bg-surface-container text-primary py-2 rounded-lg font-label-caps text-label-caps hover:bg-primary hover:text-on-primary transition-colors">Manage Campaign</button>
</div>
</div>
</div>
</div>
</div>
</main>
<script>
        // Simple script to handle mobile sidebar toggle
        document.addEventListener('DOMContentLoaded', () => {
            const mobileBtn = document.getElementById('mobile-menu-btn');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            let isOpen = false;

            function toggleSidebar() {
                isOpen = !isOpen;
                if (isOpen) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                } else {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            }

            mobileBtn.addEventListener('click', toggleSidebar);
            overlay.addEventListener('click', toggleSidebar);
        });
    </script>
</body></html>