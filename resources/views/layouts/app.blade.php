<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Personal UPTAG</title>
    <link href="/resources/css/app.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- 🔹 Navbar principal --}}
    <nav class="bg-blue-700 text-white px-6 py-3 shadow-md flex justify-between items-center">
        <div class="text-lg font-bold">🕒 Sistema de Contorl-Personal - UPTAG</div>

        @auth
        <div class="flex items-center space-x-3">
            <span class="text-sm">👋 Hola, {{ Auth::user()->nombre ?? Auth::user()->email }}</span>

            @if (Auth::user()->rol === 'admin')
                <button onclick="mostrarSeccion('panel')" class="bg-blue-600 hover:bg-blue-800 px-3 py-1 rounded text-sm">Panel Admin</button>
                <button onclick="mostrarSeccion('personal')" class="bg-green-600 hover:bg-green-800 px-3 py-1 rounded text-sm">Personal</button>
                <button onclick="mostrarSeccion('invitados')" class="bg-indigo-600 hover:bg-indigo-800 px-3 py-1 rounded text-sm">Invitados</button>
                <button onclick="mostrarSeccion('asistencia')" class="bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded text-sm">🕒 Horario</button>
            @endif

            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-sm">Salir</button>
            </form>
        </div>
        @endauth
    </nav>

    {{-- 🔹 Contenedor principal con secciones dinámicas --}}
    <main class="p-6 space-y-8">

        {{-- Sección Panel --}}
        <section id="panel" class="seccion-activa">
            <h1 class="text-2xl font-bold text-blue-700 mb-4">Panel de Administración</h1>
            <p class="text-gray-700">Bienvenido, {{ Auth::user()->nombre ?? Auth::user()->email }}.</p>
        </section>

        {{-- Sección Personal --}}
        <section id="personal" class="hidden">
    <h2 class="text-xl font-bold text-green-700 mb-4">Gestión de Personal</h2>

    <div class="overflow-x-auto shadow-lg rounded-lg border bg-white p-4">
        <table class="min-w-full text-sm text-center border-collapse border border-gray-300">
            <thead class="bg-green-100 text-gray-700 uppercase">
                <tr>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Correo</th>
                    <th class="border px-4 py-2">Cargo</th>
                    <th class="border px-4 py-2">Asistencia</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- 🔹 Ejemplo de datos (puedes reemplazarlos luego por los datos reales de la BD) --}}
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">Prof. Ana Castillo</td>
                    <td class="border px-4 py-2">ana.castillo@uptag.edu.ve</td>
                    <td class="border px-4 py-2">Docente</td>
                    <td class="border px-4 py-2 text-green-600 font-semibold">Presente</td>
                    <td class="border px-4 py-2">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Editar</button>
                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded ml-1">Eliminar</button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">Ing. Rafael Jiménez</td>
                    <td class="border px-4 py-2">rjimenez@uptag.edu.ve</td>
                    <td class="border px-4 py-2">Asistente Técnico</td>
                    <td class="border px-4 py-2 text-red-600 font-semibold">Ausente</td>
                    <td class="border px-4 py-2">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Editar</button>
                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded ml-1">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mt-4 flex justify-end">
            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">➕ Agregar Personal</button>
        </div>
    </div>
</section>


        {{-- Sección Invitados --}}
        <section id="invitados" class="hidden">
            <h2 class="text-xl font-bold text-indigo-700 mb-4">Gestión de Invitados</h2>
            <p class="text-gray-700">Controla el acceso temporal y las visitas registradas.</p>
        </section>

        {{-- Sección Asistencia --}}
        <section id="asistencia" class="hidden">
            <h2 class="text-xl font-bold text-yellow-700 mb-4">🕒 Horario de Asistencia</h2>

            <div class="overflow-x-auto shadow-lg rounded-lg border bg-white p-4">
                <table class="min-w-full text-sm text-center border-collapse border border-gray-300">
                    <thead class="bg-yellow-100 text-gray-700 uppercase">
                        <tr>
                            <th class="border px-4 py-2">Día</th>
                            <th class="border px-4 py-2">Hora Entrada</th>
                            <th class="border px-4 py-2">Hora Salida</th>
                            <th class="border px-4 py-2">Personal</th>
                            <th class="border px-4 py-2">Estado</th>
                            <th class="border px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Ejemplo de datos (luego se reemplazará con datos reales) --}}
                        <tr class="hover:bg-gray-100">
                            <td class="border px-4 py-2">Lunes</td>
                            <td class="border px-4 py-2">07:00 AM</td>
                            <td class="border px-4 py-2">12:00 PM</td>
                            <td class="border px-4 py-2">Prof. Carlos Gómez</td>
                            <td class="border px-4 py-2 text-green-600 font-semibold">Presente</td>
                            <td class="border px-4 py-2">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Editar</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-100">
                            <td class="border px-4 py-2">Martes</td>
                            <td class="border px-4 py-2">07:00 AM</td>
                            <td class="border px-4 py-2">12:00 PM</td>
                            <td class="border px-4 py-2">Prof. María Pérez</td>
                            <td class="border px-4 py-2 text-red-600 font-semibold">Ausente</td>
                            <td class="border px-4 py-2">
                                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Editar</button>

                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </section>


    </main>

    {{-- Script para alternar secciones --}}
    <script>
        function mostrarSeccion(id) {
            document.querySelectorAll('main section').forEach(sec => sec.classList.add('hidden'));
            document.getElementById(id).classList.remove('hidden');
        }
    </script>
</body>
</html>
