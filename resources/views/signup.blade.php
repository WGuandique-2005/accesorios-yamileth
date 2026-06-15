@auth
    @php redirect()->intended('/home')->send(); @endphp
@endauth
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Registro - Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Playfair+Display:wght@600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
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
        body {
            background-color: theme('colors.background');
            color: theme('colors.on-background');
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 40px -10px rgba(138, 72, 111, 0.1);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col font-body-md antialiased">
    <header class="w-full py-6 px-margin-mobile md:px-margin-desktop flex justify-center items-center fixed top-0 z-50 bg-background/80 backdrop-blur-md">
        <a class="font-h2 text-h2 text-primary tracking-tight" href="/">Accesorios Yamileth</a>
    </header>
    <main class="flex-grow flex items-center justify-center px-margin-mobile md:px-margin-desktop py-32 relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
            <div class="absolute -top-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-primary-container/20 blur-[100px]"></div>
            <div class="absolute top-[60%] -right-[10%] w-[40%] h-[60%] rounded-full bg-surface-container-highest/40 blur-[80px]"></div>
        </div>
        <div class="w-full max-w-md">
            <div class="glass-card rounded-xl p-8 md:p-10 relative">
                <div class="text-center mb-8">
                    <h1 class="font-h2 text-h2 text-primary mb-2">Crear Cuenta</h1>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Únete para una experiencia de compra exclusiva.</p>
                </div>
                <form action="{{ route('register') }}" class="space-y-5" method="POST">
                    @csrf
                    <div>
                        <label class="block font-label-caps text-label-caps text-on-surface mb-2 uppercase tracking-wider" for="name">Nombre Completo</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">person</span>
                            <input class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none transition-colors duration-200 font-body-sm text-body-sm text-on-surface placeholder:text-outline/50" id="name" name="name" placeholder="María Pérez" required type="text" value="{{ old('name') }}" />
                        </div>
                        @error('name')
                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-label-caps text-label-caps text-on-surface mb-2 uppercase tracking-wider" for="email">Correo Electrónico</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">mail</span>
                            <input class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none transition-colors duration-200 font-body-sm text-body-sm text-on-surface placeholder:text-outline/50" id="email" name="email" placeholder="maria@ejemplo.com" required type="email" value="{{ old('email') }}" />
                        </div>
                        @error('email')
                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-label-caps text-label-caps text-on-surface mb-2 uppercase tracking-wider" for="numero_contacto">Número de Contacto</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">phone</span>
                            <input class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none transition-colors duration-200 font-body-sm text-body-sm text-on-surface placeholder:text-outline/50" id="numero_contacto" name="numero_contacto" placeholder="+52 123 456 7890" type="tel" value="{{ old('numero_contacto') }}" />
                        </div>
                        @error('numero_contacto')
                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-label-caps text-label-caps text-on-surface mb-2 uppercase tracking-wider" for="password">Contraseña</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">lock</span>
                            <input class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none transition-colors duration-200 font-body-sm text-body-sm text-on-surface placeholder:text-outline/50" id="password" name="password" placeholder="••••••••" required type="password" />
                        </div>
                        @error('password')
                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-label-caps text-label-caps text-on-surface mb-2 uppercase tracking-wider" for="password_confirmation">Confirmar Contraseña</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">lock</span>
                            <input class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-lowest border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none transition-colors duration-200 font-body-sm text-body-sm text-on-surface placeholder:text-outline/50" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required type="password" />
                        </div>
                        @error('password_confirmation')
                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="pt-4">
                        <button class="w-full bg-primary hover:bg-on-primary-fixed-variant text-on-primary font-body-md text-body-md py-3 rounded-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-[1px] flex justify-center items-center gap-2" type="submit">
                            <span>Crear cuenta</span>
                            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                        </button>
                    </div>
                </form>
                <div class="mt-8 text-center border-t border-outline-variant/30 pt-6">
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                        ¿Ya tienes cuenta?
                        <a class="text-primary font-medium hover:text-primary-fixed-variant transition-colors underline underline-offset-4 decoration-primary/30 hover:decoration-primary" href="{{ route('login') }}">Inicia sesión</a>
                    </p>
                </div>
            </div>
        </div>
    </main>
    <footer class="w-full py-6 px-margin-mobile md:px-margin-desktop flex justify-center items-center border-t border-outline-variant/30">
        <p class="font-body-sm text-body-sm text-on-surface-variant">© 2024 Accesorios Yamileth. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
