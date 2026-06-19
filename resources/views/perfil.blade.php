<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi perfil | Accesorios Yamileth</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">
    @include('partials.theme')
</head>

<body class="min-h-screen bg-[#FFF8F8] text-[#201A1D]" style="font-family: Inter, sans-serif;">
    @include('partials.navbar')

    <main class="mx-auto max-w-5xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8">
        <div class="overflow-hidden rounded-3xl border border-[#E7D5DC] bg-gradient-to-br from-white via-[#FFF9FA] to-[#F8EEF2] shadow-sm">
            <div class="grid gap-6 p-6 sm:p-8 lg:grid-cols-[minmax(0,1.4fr)_minmax(280px,0.8fr)] lg:items-center lg:p-10">
                <div class="space-y-4">
                    <span class="inline-flex rounded-full bg-[#8A486F]/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-[#8A486F]">
                        Configuración de cuenta
                    </span>
                    <div class="space-y-2">
                        <h1 class="font-serif text-3xl font-bold tracking-tight text-[#8A486F] sm:text-4xl">Mi perfil</h1>
                        <p class="max-w-2xl text-sm leading-6 text-gray-600 sm:text-base">
                            Actualiza tu información personal, cambia tu contraseña o elimina tu cuenta desde un espacio más claro y cómodo en cualquier pantalla.
                        </p>
                    </div>
                </div>

                <div class="rounded-2xl bg-white/80 p-4 shadow-sm ring-1 ring-black/5 backdrop-blur sm:p-5 lg:justify-self-end">
                    <div class="flex items-center gap-4 sm:gap-5">
                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-[#8A486F] text-xl font-bold text-white shadow-sm sm:h-20 sm:w-20 sm:text-2xl">
                            {{ Str::of($user->name)->substr(0, 1)->upper() }}
                        </div>
                        <div class="min-w-0">
                            <h2 class="truncate text-lg font-bold text-[#201A1D] sm:text-xl">{{ $user->name }}</h2>
                            <p class="truncate text-sm text-gray-500">{{ $user->email }}</p>
                            @if ($user->numero_contacto)
                                <p class="mt-1 text-sm text-gray-500">{{ $user->numero_contacto }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-green-700 shadow-sm">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-red-700 shadow-sm">
                <ul class="list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-8 grid gap-6 lg:grid-cols-[minmax(0,1.5fr)_minmax(300px,0.9fr)] lg:items-start">
            <form method="POST" action="{{ route('perfil.update') }}" class="rounded-3xl bg-white p-5 shadow-sm ring-1 ring-black/5 sm:p-6 lg:p-8">
                @csrf
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-bold text-[#8A486F] sm:text-2xl">Información personal</h2>
                        <p class="mt-1 text-sm text-gray-500">Los campos con cambios frecuentes están agrupados arriba para editar más rápido.</p>
                    </div>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <label class="block sm:col-span-2">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Nombre</span>
                        <input name="name" value="{{ old('name', $user->name) }}" required maxlength="255"
                            autocomplete="name"
                            class="w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-base shadow-sm focus:border-[#8A486F] focus:ring-[#8A486F]">
                    </label>
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Correo</span>
                        <input value="{{ $user->email }}" disabled
                            class="w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-base text-gray-500">
                    </label>
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Número de contacto</span>
                        <input name="numero_contacto" value="{{ old('numero_contacto', $user->numero_contacto) }}"
                            maxlength="20" inputmode="tel" autocomplete="tel"
                            class="w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-base shadow-sm focus:border-[#8A486F] focus:ring-[#8A486F]">
                    </label>
                </div>

                <div class="mt-8 rounded-2xl bg-[#FCF7F8] p-4 sm:p-5">
                    <h2 class="text-lg font-bold text-[#8A486F] sm:text-xl">Cambiar contraseña</h2>
                    <p class="mt-1 text-sm text-gray-500">Si no vas a cambiarla, puedes dejar estos campos vacíos.</p>
                    <div class="mt-5 grid gap-4">
                        <label class="block">
                            <span class="mb-1 block text-sm font-semibold text-gray-700">Contraseña actual</span>
                            <input type="password" name="current_password" autocomplete="current-password"
                                class="w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-base shadow-sm focus:border-[#8A486F] focus:ring-[#8A486F]">
                        </label>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span class="mb-1 block text-sm font-semibold text-gray-700">Nueva contraseña</span>
                                <input type="password" name="new_password" autocomplete="new-password"
                                    class="w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-base shadow-sm focus:border-[#8A486F] focus:ring-[#8A486F]">
                            </label>
                            <label class="block">
                                <span class="mb-1 block text-sm font-semibold text-gray-700">Confirmar nueva
                                    contraseña</span>
                                <input type="password" name="new_password_confirmation"
                                    autocomplete="new-password"
                                    class="w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-base shadow-sm focus:border-[#8A486F] focus:ring-[#8A486F]">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-sm text-gray-500">Tus datos se guardan en una sola acción.</p>
                    <button class="inline-flex w-full items-center justify-center rounded-full bg-[#8A486F] px-6 py-3 font-bold text-white transition hover:bg-[#733b5c] sm:w-auto">
                        Guardar cambios
                    </button>
                </div>
            </form>

            <aside class="space-y-6 lg:sticky lg:top-6">
                <section class="rounded-3xl bg-white p-5 shadow-sm ring-1 ring-black/5 sm:p-6">
                    <h2 class="text-lg font-bold text-[#8A486F] sm:text-xl">Resumen</h2>
                    <dl class="mt-5 space-y-4 text-sm">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-start sm:justify-between sm:gap-4">
                            <dt class="text-gray-500">Nombre</dt>
                            <dd class="font-semibold text-[#201A1D] sm:text-right">{{ $user->name }}</dd>
                        </div>
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-start sm:justify-between sm:gap-4">
                            <dt class="text-gray-500">Correo</dt>
                            <dd class="font-semibold text-[#201A1D] sm:max-w-[60%] sm:text-right">{{ $user->email }}</dd>
                        </div>
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-start sm:justify-between sm:gap-4">
                            <dt class="text-gray-500">Contacto</dt>
                            <dd class="font-semibold text-[#201A1D] sm:text-right">{{ $user->numero_contacto ?? 'No registrado' }}</dd>
                        </div>
                    </dl>
                </section>

                <form method="POST" action="{{ route('perfil.destroy') }}" class="rounded-3xl border border-red-100 bg-white p-5 shadow-sm ring-1 ring-black/5 sm:p-6"
                    onsubmit="return confirm('¿Eliminar tu cuenta definitivamente?')">
                    @csrf
                    @method('DELETE')
                    <div class="rounded-2xl bg-red-50 p-4">
                        <h3 class="text-base font-bold text-red-700">Zona de riesgo</h3>
                        <p class="mt-1 text-sm leading-6 text-red-700/80">Esta acción elimina tu cuenta y no se puede deshacer.</p>
                    </div>

                    <label class="mt-5 block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Confirma tu contraseña</span>
                        <input type="password" name="password" required autocomplete="current-password"
                            class="w-full rounded-xl border-gray-300 bg-white px-4 py-3 text-base shadow-sm focus:border-red-400 focus:ring-red-400">
                    </label>
                    <button class="mt-4 inline-flex w-full items-center justify-center rounded-full border border-red-300 px-4 py-3 font-semibold text-red-700 transition hover:bg-red-50">
                        Eliminar cuenta
                    </button>
                </form>
            </aside>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>
