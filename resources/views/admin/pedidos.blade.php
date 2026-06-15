<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Admin Orders - Accesorios Yamileth</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&amp;family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"/>
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
        .ambient-shadow {
            box-shadow: 0 10px 40px -10px rgba(138, 72, 111, 0.08);
        }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md antialiased flex h-screen overflow-hidden">
<!-- SideNavBar -->
<nav class="hidden md:flex flex-col h-full w-64 bg-surface-container-low border-r border-outline-variant/30 flex-shrink-0">
<div class="p-6 border-b border-outline-variant/30 flex items-center gap-4">
<div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-h3">
                YA
            </div>
<div>
<h2 class="font-h3 text-h3 text-primary">Yamileth Admin</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Store Manager</p>
</div>
</div>
<div class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="font-label-caps text-label-caps">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">inventory_2</span>
<span class="font-label-caps text-label-caps">Inventory</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 bg-primary-container text-on-primary-container rounded-lg font-bold transition-all shadow-sm" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">shopping_bag</span>
<span class="font-label-caps text-label-caps">Orders</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">group</span>
<span class="font-label-caps text-label-caps">Clients</span>
</a>
</div>
<div class="p-4 border-t border-outline-variant/30 space-y-2">
<a class="flex items-center gap-3 px-4 py-2 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-label-caps text-label-caps">Settings</span>
</a>
<a class="flex items-center gap-3 px-4 py-2 text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">logout</span>
<span class="font-label-caps text-label-caps">Logout</span>
</a>
</div>
</nav>
<!-- Main Content -->
<main class="flex-1 flex flex-col h-full overflow-hidden bg-background">
<!-- Header -->
<header class="flex items-center justify-between px-margin-mobile md:px-margin-desktop py-6 border-b border-outline-variant/30 bg-surface/80 backdrop-blur-md">
<div>
<h1 class="font-h2 text-h2 text-on-surface">Manage Orders</h1>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">View, filter, and update customer orders.</p>
</div>
<div class="flex items-center gap-4">
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="pl-10 pr-4 py-2 rounded-full border border-outline-variant bg-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-body-sm w-64 transition-all" placeholder="Search orders..." type="text"/>
</div>
</div>
</header>
<!-- Content Area -->
<div class="flex-1 overflow-y-auto p-margin-mobile md:p-margin-desktop">
<!-- Filters & Actions -->
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
<div class="flex flex-wrap items-center gap-2">
<button class="px-4 py-2 rounded-full bg-primary text-on-primary font-label-caps text-label-caps shadow-sm hover:opacity-90 transition-opacity">
                        All Orders
                    </button>
<button class="px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-high transition-colors">
                        Pending
                    </button>
<button class="px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-high transition-colors">
                        Processing
                    </button>
<button class="px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-high transition-colors">
                        Shipped
                    </button>
<button class="px-4 py-2 rounded-full border border-outline-variant text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-high transition-colors">
                        Delivered
                    </button>
</div>
<button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-surface border border-outline-variant text-on-surface hover:bg-surface-container-high transition-colors">
<span class="material-symbols-outlined">filter_list</span>
<span class="font-body-sm text-body-sm font-medium">More Filters</span>
</button>
</div>
<!-- Orders Table (Bento Style) -->
<div class="bg-surface rounded-xl ambient-shadow border border-outline-variant/50 overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="border-b border-outline-variant/50 bg-surface-container-lowest">
<th class="p-4 font-label-caps text-label-caps text-on-surface-variant">Order #</th>
<th class="p-4 font-label-caps text-label-caps text-on-surface-variant">Client</th>
<th class="p-4 font-label-caps text-label-caps text-on-surface-variant">Products</th>
<th class="p-4 font-label-caps text-label-caps text-on-surface-variant">Total</th>
<th class="p-4 font-label-caps text-label-caps text-on-surface-variant">Delivery</th>
<th class="p-4 font-label-caps text-label-caps text-on-surface-variant">Date</th>
<th class="p-4 font-label-caps text-label-caps text-on-surface-variant">Status</th>
<th class="p-4 font-label-caps text-label-caps text-on-surface-variant text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/30">
<!-- Order Row 1 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="p-4 font-body-sm font-medium text-on-surface">#ORD-001</td>
<td class="p-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-surface-container-highest flex items-center justify-center text-primary font-bold text-xs">
                                            MR
                                        </div>
<div>
<p class="font-body-sm text-on-surface font-medium">Maria Rodriguez</p>
<p class="text-xs text-on-surface-variant">maria@example.com</p>
</div>
</div>
</td>
<td class="p-4 font-body-sm text-on-surface-variant">3 items</td>
<td class="p-4 font-body-sm font-semibold text-primary">$145.00</td>
<td class="p-4">
<div class="flex flex-col">
<span class="font-body-sm text-on-surface">Shipping</span>
<span class="text-xs text-on-surface-variant">San Jose, CR</span>
</div>
</td>
<td class="p-4 font-body-sm text-on-surface-variant">Oct 24, 2023</td>
<td class="p-4">
<select class="bg-primary-container/20 text-on-primary-container border-0 rounded-full px-3 py-1 font-label-caps text-[10px] focus:ring-0 cursor-pointer">
<option selected="" value="pending">Pending</option>
<option value="processing">Processing</option>
<option value="shipped">Shipped</option>
<option value="delivered">Delivered</option>
</select>
</td>
<td class="p-4 text-right">
<button class="p-2 text-on-surface-variant hover:text-primary transition-colors rounded-full hover:bg-surface-container-high">
<span class="material-symbols-outlined">visibility</span>
</button>
</td>
</tr>
<!-- Order Row 2 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="p-4 font-body-sm font-medium text-on-surface">#ORD-002</td>
<td class="p-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-surface-container-highest flex items-center justify-center text-primary font-bold text-xs">
                                            JC
                                        </div>
<div>
<p class="font-body-sm text-on-surface font-medium">Juan Carlos</p>
<p class="text-xs text-on-surface-variant">juan@example.com</p>
</div>
</div>
</td>
<td class="p-4 font-body-sm text-on-surface-variant">1 item</td>
<td class="p-4 font-body-sm font-semibold text-primary">$45.50</td>
<td class="p-4">
<div class="flex flex-col">
<span class="font-body-sm text-on-surface">Pick-up</span>
<span class="text-xs text-on-surface-variant">Main Store</span>
</div>
</td>
<td class="p-4 font-body-sm text-on-surface-variant">Oct 23, 2023</td>
<td class="p-4">
<select class="bg-tertiary-container/30 text-on-tertiary-container border-0 rounded-full px-3 py-1 font-label-caps text-[10px] focus:ring-0 cursor-pointer">
<option value="pending">Pending</option>
<option value="processing">Processing</option>
<option selected="" value="shipped">Shipped</option>
<option value="delivered">Delivered</option>
</select>
</td>
<td class="p-4 text-right">
<button class="p-2 text-on-surface-variant hover:text-primary transition-colors rounded-full hover:bg-surface-container-high">
<span class="material-symbols-outlined">visibility</span>
</button>
</td>
</tr>
<!-- Order Row 3 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="p-4 font-body-sm font-medium text-on-surface">#ORD-003</td>
<td class="p-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-surface-container-highest flex items-center justify-center text-primary font-bold text-xs">
                                            LG
                                        </div>
<div>
<p class="font-body-sm text-on-surface font-medium">Laura Gomez</p>
<p class="text-xs text-on-surface-variant">laura@example.com</p>
</div>
</div>
</td>
<td class="p-4 font-body-sm text-on-surface-variant">5 items</td>
<td class="p-4 font-body-sm font-semibold text-primary">$280.00</td>
<td class="p-4">
<div class="flex flex-col">
<span class="font-body-sm text-on-surface">Shipping</span>
<span class="text-xs text-on-surface-variant">Heredia, CR</span>
</div>
</td>
<td class="p-4 font-body-sm text-on-surface-variant">Oct 22, 2023</td>
<td class="p-4">
<select class="bg-error-container/30 text-on-error-container border-0 rounded-full px-3 py-1 font-label-caps text-[10px] focus:ring-0 cursor-pointer">
<option value="pending">Pending</option>
<option value="processing">Processing</option>
<option value="shipped">Shipped</option>
<option selected="" value="delivered">Delivered</option>
</select>
</td>
<td class="p-4 text-right">
<button class="p-2 text-on-surface-variant hover:text-primary transition-colors rounded-full hover:bg-surface-container-high">
<span class="material-symbols-outlined">visibility</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="p-4 border-t border-outline-variant/30 bg-surface-container-lowest flex items-center justify-between">
<p class="font-body-sm text-on-surface-variant text-sm">Showing 1 to 3 of 45 orders</p>
<div class="flex gap-1">
<button class="p-2 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-high disabled:opacity-50" disabled="">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-10 h-10 rounded-lg bg-primary text-on-primary font-body-sm font-medium flex items-center justify-center">1</button>
<button class="w-10 h-10 rounded-lg hover:bg-surface-container-high text-on-surface font-body-sm font-medium flex items-center justify-center">2</button>
<button class="w-10 h-10 rounded-lg hover:bg-surface-container-high text-on-surface font-body-sm font-medium flex items-center justify-center">3</button>
<button class="p-2 rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container-high">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
</div>
</div>
</main>
</body></html>