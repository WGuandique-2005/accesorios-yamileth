<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>My Orders - Accesorios Yamileth</title>
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
            box-shadow: 0 10px 30px -10px rgba(138, 72, 111, 0.05);
        }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen flex flex-col font-body-md">
<!-- TopNavBar -->
@include('partials.navbar')
<!-- Main Content -->
<main class="flex-grow w-full max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-12">
<header class="mb-12">
<h1 class="font-h1 text-h1 text-primary mb-2">My Orders</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant">Track your recent purchases and their delivery status.</p>
</header>
<!-- Orders Timeline/List -->
<div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-outline-variant/30">
<!-- Order Card 1: Entregado -->
<div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
<div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-background bg-tertiary text-on-tertiary shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
<span class="material-symbols-outlined" style="font-size: 20px;">check</span>
</div>
<div class="glass-card w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] rounded-xl p-6 transition-all hover:scale-[1.01] hover:shadow-lg">
<div class="flex justify-between items-start mb-4">
<div>
<span class="font-label-caps text-label-caps text-secondary">Order #AY-0982</span>
<h3 class="font-h3 text-h3 text-on-surface mt-1">Oct 12, 2023</h3>
</div>
<span class="inline-flex items-center px-3 py-1 rounded-full bg-tertiary-container/30 text-on-tertiary-container font-label-caps text-label-caps">
                            Entregado
                        </span>
</div>
<div class="flex gap-4 mb-4 border-t border-outline-variant/30 pt-4">
<img alt="Rose gold elegant necklace" class="w-16 h-16 object-cover rounded-lg" data-alt="A delicate, elegant rose gold necklace featuring a minimalist pendant, resting on a soft, blush pink silk background. The lighting is soft and natural, creating a luxurious and feminine atmosphere typical of high-end boutique jewelry photography. Clean aesthetic with subtle warm tones." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAssWgNS9RaZBfKJyKS9ApGo-hH0cSlfGQWZuCGB6ttWnc24o-CILgnfY6BpzrXzghdqTC9fV_SSC_agZ50fYp2SP58nH1HA-BqyrbyAcQB7naQiFJxVtSkEF-fU0PF--ZUVnHHMNfd6mtAJBW8KvvN3DsFRD2Sp6OTDBPuFEmx_bO9qHMWdtb5DrMcDvuq_DZJ5UAORb_GKtbJ2Zqs8OpazBKOYK1LmZ57m5KABvb6x266wMD0gkjnn9qSXaNCEYdKetqcT91mZF03"/>
<div>
<p class="font-body-md text-body-md font-semibold text-on-surface">Rose Gold Elegance Necklace</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Qty: 1</p>
</div>
</div>
<div class="flex justify-between items-center border-t border-outline-variant/30 pt-4">
<span class="font-body-md text-body-md text-on-surface-variant">Total</span>
<span class="font-h3 text-h3 text-primary">$125.00</span>
</div>
</div>
</div>
<!-- Order Card 2: En ruta -->
<div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
<div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-background bg-orange-400 text-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
<span class="material-symbols-outlined" style="font-size: 20px;">local_shipping</span>
</div>
<div class="glass-card w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] rounded-xl p-6 transition-all hover:scale-[1.01] hover:shadow-lg">
<div class="flex justify-between items-start mb-4">
<div>
<span class="font-label-caps text-label-caps text-secondary">Order #AY-0995</span>
<h3 class="font-h3 text-h3 text-on-surface mt-1">Oct 24, 2023</h3>
</div>
<span class="inline-flex items-center px-3 py-1 rounded-full bg-orange-100 text-orange-800 font-label-caps text-label-caps">
                            En ruta
                        </span>
</div>
<div class="flex gap-4 mb-4 border-t border-outline-variant/30 pt-4">
<div class="flex -space-x-2">
<img alt="Gold hoop earrings" class="w-16 h-16 object-cover rounded-lg border-2 border-surface" data-alt="Classic, refined gold hoop earrings displayed on a smooth, off-white marble surface. Subtle, ambient lighting casts soft shadows, highlighting the metallic sheen. The composition is minimal and elegant, conveying a premium artisanal jewelry brand identity." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCkJ2SP9Sv-wg4cdtcuYdTnX-hdK-KTkDaQf6XPZrkXvz-BLUNTiMI0x1UaB7ez7cUjhwWmmxzTc-4L8_yONNoLWzOstmJCxjFe3T4kYQ3RU2jbwMusLSlm0eIsB_CGudGTC3F4g4W6jjvuEDADSwd-uFnRCIyZVXffu4kR7T4PIrmPrFM_UBHvQGmzfrOQnnEZRYMFlq44eB5_mOh769BrUlg_CQ9izw41EwQNPxnSnVd2ZzR5VK9O-Drhlyo8gQk07xZ2QuDqwvTN"/>
<img alt="Pearl bracelet" class="w-16 h-16 object-cover rounded-lg border-2 border-surface" data-alt="A delicate bracelet made of tiny, iridescent freshwater pearls laid delicately on a piece of soft, textured linen in a pale pink tone. The aesthetic is soft, feminine, and high-end, with bright, airy lighting emphasizing the gentle luster of the pearls." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDXUSEwHJGuvhYTgi8oJ9VILxOYpx2LO43SYaVXT05o0ha5fEuwaQqf6-s_H9mzucpV1iF9Hq9EVg_RgX3VwEPDzOaxq15PcqHVKTUsLO41mUh-lBxUmrP7xSJsZoh7ErydoURLP0XWeP3NBJ89iqJdxKG9HfWj_Yom_WnEovZXJ9FeguTbgCN-f6xiuYo8IOl_klJJqYGFOJJx15-eNS6Kny2wlsfq3f9L304Ep-c1iXV_IqqvOm_aHbSmdbt5pvAMaB4h6fat6mV-"/>
</div>
<div class="self-center">
<p class="font-body-md text-body-md font-semibold text-on-surface">2 Items</p>
<a class="font-body-sm text-body-sm text-primary hover:underline" href="#">View details</a>
</div>
</div>
<div class="flex justify-between items-center border-t border-outline-variant/30 pt-4">
<span class="font-body-md text-body-md text-on-surface-variant">Total</span>
<span class="font-h3 text-h3 text-primary">$85.50</span>
</div>
</div>
</div>
<!-- Order Card 3: Pendiente -->
<div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group">
<div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-background bg-yellow-400 text-yellow-900 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
<span class="material-symbols-outlined" style="font-size: 20px;">schedule</span>
</div>
<div class="glass-card w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] rounded-xl p-6 transition-all hover:scale-[1.01] hover:shadow-lg">
<div class="flex justify-between items-start mb-4">
<div>
<span class="font-label-caps text-label-caps text-secondary">Order #AY-1002</span>
<h3 class="font-h3 text-h3 text-on-surface mt-1">Oct 28, 2023</h3>
</div>
<span class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 font-label-caps text-label-caps">
                            Pendiente
                        </span>
</div>
<div class="flex gap-4 mb-4 border-t border-outline-variant/30 pt-4">
<img alt="Minimalist silver ring" class="w-16 h-16 object-cover rounded-lg" data-alt="A sleek, minimalist silver ring with a small embedded crystal, positioned gracefully on a soft beige ceramic dish. The environment is bathed in bright, diffused light, producing a clean, modern, and sophisticated aesthetic suited for a luxury boutique." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCwJ5Qf7QSCiqvS7xGWLwKAtwn-7BIAeY5FKKUiD27TTLNY9F-5Al3ixOVjlz2OeD0nsLKxtfhypfF_R9bnc5yCvLfm6-pjNSNSMLWqt1ynleKrq5S0DOZerP_beBRR15JeKqK2HkLET7O8RVflPGeh40YcJY7J_Z4DotUspuOZdk0f0lk9TSplsC3bWl7PyEYFL7mf1LH_-tZll00cl5lGWL0nh5U7pIemd6hzfqP0HcEM2xpMkSUY4GtzVBWmzG-I3lsUmHvJ9agA"/>
<div>
<p class="font-body-md text-body-md font-semibold text-on-surface">Minimalist Silver Ring</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Size: 7</p>
</div>
</div>
<div class="flex justify-between items-center border-t border-outline-variant/30 pt-4">
<span class="font-body-md text-body-md text-on-surface-variant">Total</span>
<span class="font-h3 text-h3 text-primary">$45.00</span>
</div>
</div>
</div>
</div>
<!-- Pagination (Optional/Stylistic) -->
<div class="flex justify-center mt-12 gap-2">
<button class="w-10 h-10 rounded-full flex items-center justify-center border border-outline-variant text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-10 h-10 rounded-full flex items-center justify-center bg-primary text-on-primary font-body-md">1</button>
<button class="w-10 h-10 rounded-full flex items-center justify-center border border-outline-variant text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors font-body-md">2</button>
<button class="w-10 h-10 rounded-full flex items-center justify-center border border-outline-variant text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</main>
<!-- Footer -->
@include('partials.footer')
</body></html>