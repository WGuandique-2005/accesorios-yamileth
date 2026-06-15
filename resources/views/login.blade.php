@auth
    @php redirect()->intended('/home')->send(); @endphp
@endauth
<!DOCTYPE html>

<html class="light" lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Iniciar Sesión - Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Playfair+Display:wght@600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 20px 40px rgba(138, 72, 111, 0.08);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #fff8f8 0%, #fdf0f4 50%, #f7ebee 100%);
        }
    </style>
</head>

<body
    class="gradient-bg min-h-screen flex items-center justify-center p-margin-mobile md:p-margin-desktop font-body-md text-on-surface">
    <main class="w-full max-w-md">
        <!-- Floating Glass Card -->
        <div
            class="glass-card rounded-xl p-8 md:p-10 border border-white/50 relative overflow-hidden group hover:-translate-y-1 transition-transform duration-500">
            <!-- Decorative Elements -->
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-primary-container rounded-full blur-3xl opacity-30">
            </div>
            <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-tertiary-container rounded-full blur-3xl opacity-20">
            </div>
            <!-- Header -->
            <div class="text-center mb-8 relative z-10">
                <h1 class="font-h2 text-h2 text-primary mb-2 tracking-tight">Bienvenida</h1>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Ingresa tus datos para continuar</p>
            </div>
            <!-- Form -->
            <form action="{{ url('/login') }}" method="POST" class="space-y-6 relative z-10">
                @csrf
                <!-- Email Input -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2" for="email">Correo
                        Electrónico</label>
                    <div class="relative">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">mail</span>
                        <input
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-3 pl-10 pr-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/30 transition-all duration-300 placeholder:text-outline/50"
                            id="email" name="email" placeholder="tu@correo.com" required="" type="email" value="{{ old('email') }}" />
                    </div>
                    @error('email')
                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Password Input -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block font-label-caps text-label-caps text-on-surface-variant"
                            for="password">Contraseña</label>
                        <a class="font-body-sm text-body-sm text-primary hover:text-primary-fixed-variant transition-colors"
                            href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                    <div class="relative">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">lock</span>
                        <input
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-3 pl-10 pr-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/30 transition-all duration-300 placeholder:text-outline/50"
                            id="password" name="password" placeholder="••••••••" required="" type="password" />
                        <button aria-label="Toggle password visibility"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors focus:outline-none"
                            type="button">
                            <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded border-outline-variant text-primary focus:ring-primary/30 bg-surface-container-lowest">
                    <label for="remember" class="ml-2 block font-body-sm text-on-surface-variant">
                        Recordarme
                    </label>
                </div>
                <!-- Submit Button -->
                <button
                    class="w-full bg-primary text-on-primary py-3 rounded-lg font-body-md font-medium hover:bg-primary/90 hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 active:scale-[0.98] flex items-center justify-center gap-2"
                    type="submit">
                    Iniciar Sesión
                    <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                </button>
            </form>
            <!-- Footer Links -->
            <div class="mt-8 text-center relative z-10">
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                    ¿No tienes cuenta?
                    <a class="text-primary font-medium hover:underline hover:text-primary-fixed-variant transition-colors ml-1"
                        href="{{ route('register') }}">Regístrate</a>
                </p>
            </div>
        </div>
        <!-- Back to Home Link (Optional, good UX) -->
        <div class="mt-6 text-center">
            <a class="inline-flex items-center gap-2 font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"
                href="{{ url('/') }}">
                <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                Volver a la tienda
            </a>
        </div>
    </main>
    <!-- Vanilla JS for Micro-interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Password visibility toggle
            const passwordInput = document.getElementById('password');
            const toggleBtn = passwordInput.nextElementSibling;
            const toggleIcon = toggleBtn.querySelector('.material-symbols-outlined');

            toggleBtn.addEventListener('click', () => {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleIcon.textContent = 'visibility';
                } else {
                    passwordInput.type = 'password';
                    toggleIcon.textContent = 'visibility_off';
                }
            });

            // Subtle input focus effects on parent
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    input.parentElement.querySelector('.material-symbols-outlined:first-child').classList.add('text-primary');
                    input.parentElement.querySelector('.material-symbols-outlined:first-child').classList.remove('text-outline');
                });
                input.addEventListener('blur', () => {
                    input.parentElement.querySelector('.material-symbols-outlined:first-child').classList.remove('text-primary');
                    input.parentElement.querySelector('.material-symbols-outlined:first-child').classList.add('text-outline');
                });
            });
        });
    </script>
</body>

</html>
