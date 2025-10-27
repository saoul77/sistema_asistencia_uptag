<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <nav class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center shadow-md">
        <h1 class="text-xl font-bold">Sistema de Asistencia UPTAG</h1>
        <div class="flex items-center gap-3">
            <span>👤 {{ Auth::user()->nombre }}</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">Cerrar sesión</button>
            </form>
        </div>
    </nav>

    <div class="flex min-h-screen">
        <aside class="w-64 bg-white shadow-lg p-4 border-r">
            <ul class="space-y-2">
                <li><a href="#" class="block px-3 py-2 rounded hover:bg-blue-100">🏠 Inicio</a></li>
                <li><a href="#" class="block px-3 py-2 rounded hover:bg-blue-100">📅 Asistencias</a></li>
                <li><a href="#" class="block px-3 py-2 rounded hover:bg-blue-100">👥 Usuarios</a></li>
                <li><a href="#" class="block px-3 py-2 rounded hover:bg-blue-100">⚙️ Configuración</a></li>
            </ul>
        </aside>

        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
