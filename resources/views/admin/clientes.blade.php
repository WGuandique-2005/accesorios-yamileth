<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Clients - Accesorios Yamileth Admin</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 10px 30px -10px rgba(138, 72, 111, 0.1);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex">
<!-- SideNavBar -->
<nav class="hidden md:flex flex-col h-full w-64 border-r border-outline-variant/30 bg-surface-container-low dark:bg-surface-container-lowest fixed left-0 top-0 bottom-0 shadow-lg z-50">
<div class="p-6 border-b border-outline-variant/30">
<h2 class="font-h3 text-h3 text-primary dark:text-primary-fixed mb-6">Accesorios Yamileth</h2>
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold text-lg">
                    AU
                </div>
<div>
<h3 class="font-bold text-on-surface">Yamileth Admin</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Store Manager</p>
</div>
</div>
</div>
<div class="p-6 flex-1 overflow-y-auto">
<button class="w-full bg-primary text-on-primary rounded-full py-3 px-4 font-bold flex items-center justify-center gap-2 mb-8 hover:scale-105 transition-transform">
<span class="material-symbols-outlined">add</span>
                New Product
            </button>
<ul class="space-y-2 font-label-caps text-label-caps">
<li>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg hover:scale-105 hover:bg-primary/10 transition-transform transition-all duration-300 ease-in-out" href="#">
<span class="material-symbols-outlined">dashboard</span>
                        Dashboard
                    </a>
</li>
<li>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg hover:scale-105 hover:bg-primary/10 transition-transform transition-all duration-300 ease-in-out" href="#">
<span class="material-symbols-outlined">inventory_2</span>
                        Inventory
                    </a>
</li>
<li>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg hover:scale-105 hover:bg-primary/10 transition-transform transition-all duration-300 ease-in-out" href="#">
<span class="material-symbols-outlined">shopping_bag</span>
                        Orders
                    </a>
</li>
<li>
<a class="flex items-center gap-3 px-4 py-3 bg-primary-container text-on-primary-container rounded-lg font-bold transition-all duration-300 ease-in-out" href="#">
<span class="material-symbols-outlined">group</span>
                        Clients
                    </a>
</li>
</ul>
</div>
<div class="p-6 border-t border-outline-variant/30 mt-auto">
<ul class="space-y-2 font-label-caps text-label-caps">
<li>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg hover:scale-105 hover:bg-primary/10 transition-transform transition-all duration-300 ease-in-out" href="#">
<span class="material-symbols-outlined">settings</span>
                        Settings
                    </a>
</li>
<li>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg hover:scale-105 hover:bg-primary/10 transition-transform transition-all duration-300 ease-in-out" href="#">
<span class="material-symbols-outlined">logout</span>
                        Logout
                    </a>
</li>
</ul>
</div>
</nav>
<!-- Main Content -->
<main class="flex-1 md:ml-64 p-margin-mobile md:p-margin-desktop bg-background min-h-screen">
<!-- Header Section -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
<div>
<h1 class="font-h2 text-h2 text-on-surface mb-2">Clients Directory</h1>
<p class="text-on-surface-variant font-body-sm text-body-sm">Manage your customer relationships and order history.</p>
</div>
<div class="relative w-full md:w-96">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full bg-surface-container-highest border border-outline-variant rounded-full py-3 pl-12 pr-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-shadow font-body-sm text-body-sm" placeholder="Search by name, email, or phone..." type="text"/>
</div>
</div>
<!-- Clients Table Area (Bento Grid Style) -->
<div class="glass-card rounded-xl overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="border-b border-outline-variant/50 bg-surface-container-low font-label-caps text-label-caps text-on-surface-variant">
<th class="py-4 px-6 font-semibold">Client Name</th>
<th class="py-4 px-6 font-semibold">Contact Info</th>
<th class="py-4 px-6 font-semibold">Registration Date</th>
<th class="py-4 px-6 font-semibold text-center">Total Orders</th>
<th class="py-4 px-6 font-semibold text-right">Actions</th>
</tr>
</thead>
<tbody class="font-body-sm text-body-sm text-on-surface">
<!-- Row 1 -->
<tr class="border-b border-outline-variant/30 hover:bg-surface-container-high transition-colors">
<td class="py-4 px-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-tertiary-container text-on-tertiary-container flex items-center justify-center font-bold">
                                        MR
                                    </div>
<span class="font-semibold">Maria Rodriguez</span>
</div>
</td>
<td class="py-4 px-6">
<div>maria.r@example.com</div>
<div class="text-on-surface-variant text-xs">+1 (555) 123-4567</div>
</td>
<td class="py-4 px-6 text-on-surface-variant">Oct 12, 2023</td>
<td class="py-4 px-6 text-center">
<span class="bg-primary-container text-on-primary-container py-1 px-3 rounded-full font-label-caps text-xs">14</span>
</td>
<td class="py-4 px-6 text-right">
<button class="text-primary hover:text-primary-fixed transition-colors text-sm font-medium">View History</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="border-b border-outline-variant/30 hover:bg-surface-container-high transition-colors">
<td class="py-4 px-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold">
                                        SL
                                    </div>
<span class="font-semibold">Sofia Lopez</span>
</div>
</td>
<td class="py-4 px-6">
<div>sofia.l@example.com</div>
<div class="text-on-surface-variant text-xs">+1 (555) 987-6543</div>
</td>
<td class="py-4 px-6 text-on-surface-variant">Nov 05, 2023</td>
<td class="py-4 px-6 text-center">
<span class="bg-primary-container text-on-primary-container py-1 px-3 rounded-full font-label-caps text-xs">8</span>
</td>
<td class="py-4 px-6 text-right">
<button class="text-primary hover:text-primary-fixed transition-colors text-sm font-medium">View History</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="border-b border-outline-variant/30 hover:bg-surface-container-high transition-colors">
<td class="py-4 px-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center font-bold">
                                        AG
                                    </div>
<span class="font-semibold">Ana Garcia</span>
</div>
</td>
<td class="py-4 px-6">
<div>ana.g@example.com</div>
<div class="text-on-surface-variant text-xs">+1 (555) 345-6789</div>
</td>
<td class="py-4 px-6 text-on-surface-variant">Jan 22, 2024</td>
<td class="py-4 px-6 text-center">
<span class="bg-primary-container text-on-primary-container py-1 px-3 rounded-full font-label-caps text-xs">3</span>
</td>
<td class="py-4 px-6 text-right">
<button class="text-primary hover:text-primary-fixed transition-colors text-sm font-medium">View History</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-high transition-colors">
<td class="py-4 px-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-surface-dim text-on-surface flex items-center justify-center font-bold">
                                        VC
                                    </div>
<span class="font-semibold">Valentina Cruz</span>
</div>
</td>
<td class="py-4 px-6">
<div>val.cruz@example.com</div>
<div class="text-on-surface-variant text-xs">+1 (555) 765-4321</div>
</td>
<td class="py-4 px-6 text-on-surface-variant">Feb 14, 2024</td>
<td class="py-4 px-6 text-center">
<span class="bg-primary-container text-on-primary-container py-1 px-3 rounded-full font-label-caps text-xs">1</span>
</td>
<td class="py-4 px-6 text-right">
<button class="text-primary hover:text-primary-fixed transition-colors text-sm font-medium">View History</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="p-4 border-t border-outline-variant/30 bg-surface-container-lowest flex justify-between items-center text-sm">
<span class="text-on-surface-variant">Showing 1 to 4 of 48 entries</span>
<div class="flex gap-2">
<button class="p-2 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-high transition-colors disabled:opacity-50" disabled="">
<span class="material-symbols-outlined text-sm">chevron_left</span>
</button>
<button class="p-2 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-high transition-colors">
<span class="material-symbols-outlined text-sm">chevron_right</span>
</button>
</div>
</div>
</div>
</main>
<!-- Mobile Bottom Nav (Visible only on small screens) -->
<nav class="md:hidden fixed bottom-0 left-0 right-0 bg-surface border-t border-outline-variant/50 shadow-[0_-4px_20px_rgba(0,0,0,0.05)] z-50">
<ul class="flex justify-around items-center py-3">
<li>
<a class="flex flex-col items-center gap-1 text-on-surface-variant" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-[10px] font-medium">Dashboard</span>
</a>
</li>
<li>
<a class="flex flex-col items-center gap-1 text-on-surface-variant" href="#">
<span class="material-symbols-outlined">shopping_bag</span>
<span class="text-[10px] font-medium">Orders</span>
</a>
</li>
<li>
<a class="flex flex-col items-center gap-1 text-primary" href="#">
<span class="material-symbols-outlined">group</span>
<span class="text-[10px] font-bold">Clients</span>
</a>
</li>
<li>
<a class="flex flex-col items-center gap-1 text-on-surface-variant" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="text-[10px] font-medium">Settings</span>
</a>
</li>
</ul>
</nav>
</body></html>