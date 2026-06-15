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

    <main class="mx-auto max-w-4xl px-4 py-10 sm:px-6 lg:px-8">
        <h1 class="font-serif text-4xl font-bold text-[#8A486F]">Mi perfil</h1>

        @if (session('success'))
            <div class="mt-6 rounded-lg bg-green-50 px-4 py-3 text-green-700">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="mt-6 rounded-lg bg-red-50 px-4 py-3 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-8 grid gap-8 lg:grid-cols-[1fr_280px]">
            <form method="POST" action="{{ route('perfil.update') }}" class="rounded-xl bg-white p-6 shadow-sm">
                @csrf
                <h2 class="mb-5 text-xl font-bold text-[#8A486F]">Información personal</h2>
                <div class="grid gap-4 sm:grid-cols-2">
                    <label class="block sm:col-span-2">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Nombre</span>
                        <input name="name" value="{{ old('name', $user->name) }}" required maxlength="255"
                            class="w-full rounded-lg border-gray-300">
                    </label>
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Correo</span>
                        <input value="{{ $user->email }}" disabled
                            class="w-full rounded-lg border-gray-200 bg-gray-50 text-gray-500">
                    </label>
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Número de contacto</span>
                        <input name="numero_contacto" value="{{ old('numero_contacto', $user->numero_contacto) }}"
                            maxlength="20" class="w-full rounded-lg border-gray-300">
                    </label>
                </div>

                <h2 class="mb-5 mt-8 text-xl font-bold text-[#8A486F]">Cambiar contraseña</h2>
                <div class="grid gap-4">
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Contraseña actual</span>
                        <input type="password" name="current_password" class="w-full rounded-lg border-gray-300">
                    </label>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1 block text-sm font-semibold text-gray-700">Nueva contraseña</span>
                            <input type="password" name="new_password" class="w-full rounded-lg border-gray-300">
                        </label>
                        <label class="block">
                            <span class="mb-1 block text-sm font-semibold text-gray-700">Confirmar nueva
                                contraseña</span>
                            <input type="password" name="new_password_confirmation"
                                class="w-full rounded-lg border-gray-300">
                        </label>
                    </div>
                </div>

                <button class="mt-6 rounded-full bg-[#8A486F] px-6 py-3 font-bold text-white hover:bg-[#733b5c]">Guardar
                    cambios</button>
            </form>

            <aside class="h-fit rounded-xl bg-white p-6 shadow-sm">
                <div
                    class="mb-5 flex h-20 w-20 items-center justify-center rounded-full bg-[#8A486F] text-2xl font-bold text-white">
                    {{ Str::of($user->name)->substr(0, 1)->upper() }}
                </div>
                <h2 class="text-xl font-bold">{{ $user->name }}</h2>
                <p class="text-sm text-gray-500">{{ $user->email }}</p>

                <form method="POST" action="{{ route('perfil.destroy') }}" class="mt-8"
                    onsubmit="return confirm('¿Eliminar tu cuenta definitivamente?')">
                    @csrf
                    @method('DELETE')
                    <label class="block">
                        <span class="mb-1 block text-sm font-semibold text-gray-700">Confirma tu contraseña</span>
                        <input type="password" name="password" required class="w-full rounded-lg border-gray-300">
                    </label>
                    <button
                        class="mt-3 w-full rounded-full border border-red-300 px-4 py-2 font-semibold text-red-700 hover:bg-red-50">Eliminar
                        cuenta</button>
                </form>
            </aside>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>