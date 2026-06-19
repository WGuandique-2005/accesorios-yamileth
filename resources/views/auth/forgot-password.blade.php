@auth
    @php redirect()->intended('/home')->send(); @endphp
@endauth
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña | Accesorios Yamileth</title>
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
            <div class="grid w-full gap-8 lg:grid-cols-[1.05fr_0.95fr] lg:gap-10">
                <section class="flex flex-col justify-center rounded-[2rem] border border-[#E7D5DC] bg-white/70 p-6 shadow-sm backdrop-blur sm:p-8 lg:p-10">
                    <span class="inline-flex w-fit rounded-full bg-[#8A486F]/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-[#8A486F]">
                        Recuperación segura
                    </span>
                    <h1 class="mt-4 font-serif text-3xl font-bold tracking-tight text-[#8A486F] sm:text-4xl">
                        ¿Olvidaste tu contraseña?
                    </h1>
                    <p class="mt-4 max-w-xl text-sm leading-6 text-gray-600 sm:text-base">
                        Ingresa el correo de tu cuenta y te enviaremos un enlace de un solo uso para crear una nueva contraseña.
                    </p>

                    <div class="mt-8 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-2xl bg-[#FCF7F8] p-4">
                            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#8A486F]">1. Solicita</p>
                            <p class="mt-2 text-sm text-gray-600">Recibes el enlace en tu correo.</p>
                        </div>
                        <div class="rounded-2xl bg-[#FCF7F8] p-4">
                            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#8A486F]">2. Cambia</p>
                            <p class="mt-2 text-sm text-gray-600">Define una contraseña nueva y segura.</p>
                        </div>
                        <div class="rounded-2xl bg-[#FCF7F8] p-4">
                            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#8A486F]">3. Entra</p>
                            <p class="mt-2 text-sm text-gray-600">Quedas autenticado automáticamente.</p>
                        </div>
                    </div>
                </section>

                <section class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-black/5 sm:p-8 lg:p-10">
                    <div class="text-center">
                        <h2 class="font-serif text-2xl font-bold text-[#8A486F] sm:text-3xl">Enviar enlace</h2>
                        <p class="mt-2 text-sm text-gray-500">Te lo mandamos a tu correo de acceso.</p>
                    </div>

                    @if (session('status'))
                        <div class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                            {{ $errors->first('email') ?? $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-5">
                        @csrf
                        <label class="block">
                            <span class="mb-2 block text-sm font-semibold text-gray-700">Correo electrónico</span>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                autocomplete="email" placeholder="tu@correo.com"
                                class="w-full rounded-2xl border-gray-300 bg-[#FCF7F8] px-4 py-3 text-base shadow-sm focus:border-[#8A486F] focus:ring-[#8A486F]">
                        </label>

                        <button type="submit"
                            class="inline-flex w-full items-center justify-center rounded-full bg-[#8A486F] px-6 py-3 font-bold text-white transition hover:bg-[#733b5c]">
                            Enviar enlace
                        </button>
                    </form>

                    <div class="mt-6 flex flex-col items-center gap-3 text-sm text-gray-500 sm:flex-row sm:justify-between">
                        <a href="{{ route('login') }}" class="font-semibold text-[#8A486F] hover:underline">
                            Volver al inicio de sesión
                        </a>
                        <a href="{{ url('/') }}" class="hover:text-[#8A486F] hover:underline">
                            Volver a la tienda
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>

</html>
