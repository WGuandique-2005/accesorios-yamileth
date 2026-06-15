<!DOCTYPE html><html class="light" lang="es" style=""><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Mi Perfil | Accesorios Yamileth</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&amp;family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-tertiary-fixed-variant": "#2a5016",
                    "surface-container": "#f7ebee",
                    "surface-container-highest": "#ecdfe3",
                    "tertiary-fixed": "#c1f0a4",
                    "tertiary-container": "#a0cd85",
                    "on-surface-variant": "#514349",
                    "tertiary": "#41682c",
                    "primary-fixed-dim": "#ffaeda",
                    "on-secondary-container": "#616363",
                    "on-secondary": "#ffffff",
                    "secondary": "#5d5f5f",
                    "on-primary-fixed": "#3a0329",
                    "surface-container-low": "#fdf0f4",
                    "on-primary-fixed-variant": "#6f3157",
                    "on-error": "#ffffff",
                    "primary-container": "#f9a8d4",
                    "surface-bright": "#fff8f8",
                    "on-tertiary-container": "#31581d",
                    "on-secondary-fixed-variant": "#454747",
                    "secondary-fixed-dim": "#c6c6c7",
                    "inverse-surface": "#352f31",
                    "on-error-container": "#93000a",
                    "surface-container-high": "#f2e5e9",
                    "secondary-container": "#dfe0e0",
                    "on-primary": "#ffffff",
                    "surface-variant": "#ecdfe3",
                    "on-primary-container": "#78395f",
                    "on-secondary-fixed": "#1a1c1c",
                    "on-background": "#201a1d",
                    "inverse-on-surface": "#faeef1",
                    "primary-fixed": "#ffd8ea",
                    "error": "#ba1a1a",
                    "secondary-fixed": "#e2e2e2",
                    "tertiary-fixed-dim": "#a6d38b",
                    "primary": "#8a486f",
                    "surface-dim": "#e3d7db",
                    "outline": "#83737a",
                    "on-surface": "#201a1d",
                    "on-tertiary-fixed": "#072100",
                    "on-tertiary": "#ffffff",
                    "surface-tint": "#8a486f",
                    "surface": "#fff8f8",
                    "outline-variant": "#d5c1c9",
                    "background": "#fff8f8",
                    "surface-container-lowest": "#ffffff",
                    "error-container": "#ffdad6",
                    "inverse-primary": "#ffaeda"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "unit": "4px",
                    "margin-desktop": "64px",
                    "container-max": "1280px",
                    "margin-mobile": "16px",
                    "gutter": "24px"
            },
            "fontFamily": {
                    "h2": ["Playfair Display"],
                    "h1": ["Playfair Display"],
                    "body-lg": ["Inter"],
                    "h1-mobile": ["Playfair Display"],
                    "body-sm": ["Inter"],
                    "h3": ["Playfair Display"],
                    "label-caps": ["Inter"],
                    "body-md": ["Inter"]
            },
            "fontSize": {
                    "h2": ["36px", {"lineHeight": "1.3", "fontWeight": "600"}],
                    "h1": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "h1-mobile": ["32px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}],
                    "h3": ["24px", {"lineHeight": "1.4", "fontWeight": "600"}],
                    "label-caps": ["12px", {"lineHeight": "1", "letterSpacing": "0.1em", "fontWeight": "600"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}]
            }
          },
        },
      }
    </script>
<style>
        body {
            background-color: #fff8f8; /* surface */
            scroll-behavior: smooth;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .form-input-focus:focus {
            border-color: #8a486f;
            box-shadow: 0 0 0 4px rgba(138, 72, 111, 0.1);
        }
        .glass-card {
            background: rgba(255, 248, 248, 0.8);
            backdrop-filter: blur(8px);
        }
    </style>
</head>
<body class="font-body-md text-on-surface">
<!-- TopAppBar -->
<header class="w-full top-0 sticky z-50 bg-surface dark:bg-on-background shadow-[0_4px_20px_rgba(138,72,111,0.05)] shadow-sm">
<div class="flex justify-between items-center px-margin-mobile md:px-margin-desktop py-4 max-w-container-max mx-auto">
<h1 class="font-h2 text-h2 text-primary dark:text-primary-fixed-dim">Accesorios Yamileth</h1>
<nav class="hidden md:flex items-center gap-8">
<a class="text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary dark:hover:text-primary-fixed-dim transition-colors duration-300" href="#">Inicio</a>
<a class="text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary dark:hover:text-primary-fixed-dim transition-colors duration-300" href="#">Catálogo</a>
<a class="text-primary dark:text-primary-fixed-dim font-bold border-b-2 border-primary transition-colors duration-300" href="#">Perfil</a>
</nav>
<div class="flex items-center gap-4">
<button class="p-2 text-primary dark:text-primary-fixed-dim active:scale-95 transition-transform">
<span class="material-symbols-outlined" data-icon="favorite">favorite</span>
</button>
<button class="p-2 text-primary dark:text-primary-fixed-dim active:scale-95 transition-transform">
<span class="material-symbols-outlined" data-icon="shopping_bag">shopping_bag</span>
</button>
</div>
</div>
</header>
<main class="min-h-screen py-12 px-margin-mobile md:px-margin-desktop">
<div class="max-w-4xl mx-auto">
<!-- Header Section -->
<div class="text-center mb-12">
<h2 class="font-h1 text-h1-mobile md:text-h1 text-on-surface mb-2">Mi Perfil</h2>
<p class="font-body-lg text-on-surface-variant">Gestiona tu información personal y seguridad.</p>
</div>
<!-- Profile Content Card -->
<div class="bg-surface-container-lowest rounded-xl shadow-[0_20px_40px_rgba(138,72,111,0.08)] overflow-hidden">
<div class="flex flex-col md:flex-row">
<!-- Sidebar: Profile Picture -->
<aside class="md:w-1/3 bg-surface-container p-8 flex flex-col items-center border-b md:border-b-0 md:border-r border-outline-variant">
<div class="relative group">
<div class="w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden shadow-lg border-4 border-white bg-white"><div class="w-full h-full bg-primary flex items-center justify-center text-white font-h1 text-[48px] md:text-[64px] font-bold">YG</div></div>

</div>
<div class="mt-6 text-center">
<h3 class="font-h3 text-h3 text-primary">Yamileth García</h3>
<p class="font-label-caps text-on-surface-variant uppercase tracking-widest mt-1">Cliente Premium</p>
</div>
</aside>
<!-- Form Sections -->
<div class="md:w-2/3 p-8 md:p-12">
<form class="space-y-10" id="profileForm">
<!-- Personal Information -->
<section>
<div class="flex items-center gap-2 mb-6 border-b border-outline-variant pb-2">
<span class="material-symbols-outlined text-primary" data-icon="person">person</span>
<h4 class="font-h3 text-h3 text-on-surface">Información Personal</h4>
</div>
<div class="grid grid-cols-1 gap-6">
<div class="space-y-1.5">
<label class="font-label-caps text-on-surface-variant" for="fullName">Nombre completo</label>
<input class="w-full bg-surface border-outline-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:ring-0 focus:border-primary transition-all outline-none" id="fullName" type="text" value="Yamileth García">
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-1.5">
<label class="font-label-caps text-on-surface-variant" for="email">Correo electrónico</label>
<input class="w-full bg-surface border-outline-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:ring-0 focus:border-primary transition-all outline-none" id="email" type="email" value="yamileth@example.com">
</div>
<div class="space-y-1.5">
<label class="font-label-caps text-on-surface-variant" for="phone">Número de contacto</label>
<input class="w-full bg-surface border-outline-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:ring-0 focus:border-primary transition-all outline-none" id="phone" type="tel" value="+52 55 1234 5678">
</div>
</div>
</div>
</section>
<!-- Change Password -->
<section>
<div class="flex items-center gap-2 mb-6 border-b border-outline-variant pb-2">
<span class="material-symbols-outlined text-primary" data-icon="lock_reset">lock_reset</span>
<h4 class="font-h3 text-h3 text-on-surface">Cambiar Contraseña</h4>
</div>
<div class="space-y-4">
<div class="space-y-1.5">
<label class="font-label-caps text-on-surface-variant" for="currPass">Contraseña Actual</label>
<input class="w-full bg-surface border-outline-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:ring-0 focus:border-primary transition-all outline-none" id="currPass" placeholder="••••••••" type="password">
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="space-y-1.5">
<label class="font-label-caps text-on-surface-variant" for="newPass">Nueva Contraseña</label>
<input class="w-full bg-surface border-outline-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:ring-0 focus:border-primary transition-all outline-none" id="newPass" placeholder="••••••••" type="password">
</div>
<div class="space-y-1.5">
<label class="font-label-caps text-on-surface-variant" for="confirmPass">Confirmar Nueva Contraseña</label>
<input class="w-full bg-surface border-outline-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:ring-0 focus:border-primary transition-all outline-none" id="confirmPass" placeholder="••••••••" type="password">
</div>
</div>
</div>
</section>
<!-- Action Buttons -->
<div class="flex flex-col sm:flex-row items-center justify-end gap-4 pt-8">
<button class="w-full sm:w-auto px-8 py-3 text-primary border-2 border-primary rounded-full font-label-caps hover:bg-primary-container transition-colors active:scale-95" type="button">
                                    Cancelar
                                </button>
<button class="w-full sm:w-auto px-10 py-3 bg-primary text-white rounded-full font-label-caps shadow-md hover:bg-on-primary-container transition-all active:scale-95" type="submit">
                                    Guardar Cambios
                                </button>
</div>
</form>
</div>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="w-full bottom-0 mt-auto bg-surface-container dark:bg-inverse-surface border-t border-outline-variant">
<div class="flex flex-col md:flex-row justify-between items-center gap-4 px-margin-mobile md:px-margin-desktop py-8 max-w-container-max mx-auto">
<h2 class="font-h3 text-h3 text-primary dark:text-primary-fixed-dim">Accesorios Yamileth</h2>
<div class="flex gap-6">
<a class="font-body-sm text-body-sm text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary dark:hover:text-primary-fixed-dim underline transition-all" href="#">Privacidad</a>
<a class="font-body-sm text-body-sm text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary dark:hover:text-primary-fixed-dim underline transition-all" href="#">Términos</a>
<a class="font-body-sm text-body-sm text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary dark:hover:text-primary-fixed-dim underline transition-all" href="#">Contacto</a>
<a class="font-body-sm text-body-sm text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary dark:hover:text-primary-fixed-dim underline transition-all" href="#">Envíos</a>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant dark:text-secondary-fixed-dim opacity-80">© 2024 Accesorios Yamileth. Elegancia Artesanal.</p>
</div>
</footer>
<!-- Toast Notification -->
<div class="fixed bottom-8 left-1/2 -translate-x-1/2 bg-on-background text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 transform transition-all duration-500 translate-y-24 opacity-0 pointer-events-none z-[60]" id="toast">
<span class="material-symbols-outlined text-tertiary-fixed" data-icon="check_circle">check_circle</span>
<div class="flex flex-col">
<span class="font-label-caps text-white">¡Éxito!</span>
<span class="font-body-sm text-surface-variant">Tus cambios han sido guardados correctamente.</span>
</div>
</div>
<script>
        const profileForm = document.getElementById('profileForm');
        const toast = document.getElementById('toast');

        profileForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Show toast animation
            toast.classList.remove('translate-y-24', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            // Hide toast after 3 seconds
            setTimeout(() => {
                toast.classList.add('translate-y-24', 'opacity-0');
                toast.classList.remove('translate-y-0', 'opacity-100');
            }, 3500);
        });

        // Simple hover effect for inputs
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.querySelector('label').classList.replace('text-on-surface-variant', 'text-primary');
            });
            input.addEventListener('blur', () => {
                input.parentElement.querySelector('label').classList.replace('text-primary', 'text-on-surface-variant');
            });
        });
    </script>


</body></html>