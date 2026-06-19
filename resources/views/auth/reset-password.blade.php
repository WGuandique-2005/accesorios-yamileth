@auth
    @php redirect()->intended('/home')->send(); @endphp
@endauth
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva contraseña | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">
    @include('partials.theme')
    <style>
        .auth-bg {
            background:
                radial-gradient(circle at top left, rgba(249, 168, 212, .22), transparent 28%),
                radial-gradient(circle at bottom right, rgba(160, 205, 133, .18), transparent 26%),
                linear-gradient(180deg, #fff8f8 0%, #fdf0f4 100%);
        }
    </style>
</head>

<body class="min-h-screen bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
    <main class="auth-bg min-h-screen px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto flex min-h-[calc(100vh-5rem)] w-full max-w-6xl items-center">
            <div class="grid w-full gap-8 lg:grid-cols-[0.95fr_1.05fr] lg:gap-10">
                <section class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-black/5 sm:p-8 lg:p-10">
                    <span class="inline-flex w-fit rounded-full bg-[#8A486F]/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-[#8A486F]">
                        Nuevo acceso
                    </span>
                    <h1 class="mt-4 font-serif text-3xl font-bold tracking-tight text-[#8A486F] sm:text-4xl">
                        Crea tu nueva contraseña
                    </h1>
                    <p class="mt-4 max-w-xl text-sm leading-6 text-gray-600 sm:text-base">
                        Este enlace funciona una sola vez. Al guardar la nueva contraseña, tu sesión quedará renovada y las demás sesiones se invalidarán.
                    </p>

                    <div class="mt-8 rounded-2xl bg-[#FCF7F8] p-4 sm:p-5">
                        <h2 class="text-base font-bold text-[#8A486F]">Seguridad aplicada</h2>
                        <ul class="mt-3 space-y-2 text-sm text-gray-600">
                            <li>• El token expira y no se puede reutilizar.</li>
                            <li>• Se cierran las sesiones activas del usuario.</li>
                            <li>• Ingresas automáticamente a tu cuenta.</li>
                        </ul>
                    </div>
                </section>

                <section class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-black/5 sm:p-8 lg:p-10">
                    <div class="text-center">
                        <h2 class="font-serif text-2xl font-bold text-[#8A486F] sm:text-3xl">Actualizar contraseña</h2>
                        <p class="mt-2 text-sm text-gray-500">Completa los campos para continuar.</p>
                    </div>

                    @if ($errors->any())
                        <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-5">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <label class="block">
                            <span class="mb-2 block text-sm font-semibold text-gray-700">Correo electrónico</span>
                            <input type="email" name="email" value="{{ old('email', $email) }}" required
                                autocomplete="email"
                                class="w-full rounded-2xl border-gray-300 bg-[#FCF7F8] px-4 py-3 text-base shadow-sm focus:border-[#8A486F] focus:ring-[#8A486F]">
                        </label>

                        <label class="block">
                            <span class="mb-2 block text-sm font-semibold text-gray-700">Nueva contraseña</span>
                            <input type="password" name="password" required autocomplete="new-password"
                                class="w-full rounded-2xl border-gray-300 bg-[#FCF7F8] px-4 py-3 text-base shadow-sm focus:border-[#8A486F] focus:ring-[#8A486F]">
                        </label>

                        <label class="block">
                            <span class="mb-2 block text-sm font-semibold text-gray-700">Confirmar contraseña</span>
                            <input type="password" name="password_confirmation" required autocomplete="new-password"
                                class="w-full rounded-2xl border-gray-300 bg-[#FCF7F8] px-4 py-3 text-base shadow-sm focus:border-[#8A486F] focus:ring-[#8A486F]">
                        </label>

                        <button type="submit"
                            class="inline-flex w-full items-center justify-center rounded-full bg-[#8A486F] px-6 py-3 font-bold text-white transition hover:bg-[#733b5c]">
                            Guardar y entrar
                        </button>
                    </form>

                    <div class="mt-6 flex flex-col items-center gap-3 text-sm text-gray-500 sm:flex-row sm:justify-between">
                        <a href="{{ route('password.request') }}" class="font-semibold text-[#8A486F] hover:underline">
                            Solicitar otro enlace
                        </a>
                        <a href="{{ route('login') }}" class="hover:text-[#8A486F] hover:underline">
                            Volver al inicio de sesión
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>

</html>
