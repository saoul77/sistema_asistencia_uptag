
    <div class="p-6 bg-white rounded shadow">
        <h2 class="text-xl font-bold mb-4">Gestión de Personal</h2>

        @if(session('success')) <div class="p-2 bg-green-100 text-green-800 mb-3">{{ session('success') }}</div> @endif


        <table class="min-w-full text-sm text-center border-collapse border border-gray-300"">
            <thead class="bg-blue-100 text-gray-700 uppercase">
                <tr><th class="border px-4 py-2">Nombre</th><th class="border px-4 py-2">Correo</th><th class="border px-4 py-2">Cargo</th><th class="border px-4 py-2">Asistencia</th><th class="border px-4 py-2">Acciones</th></tr>
            </thead>
            <tbody>
                @foreach($personal as $p)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $p->nombre }}</td>
                        <td class="border px-4 py-2">{{ $p->correo }}</td>
                        <td class="border px-4 py-2">{{ $p->cargo }}</td>
                        <td class="border px-4 py-2 text-green-600 font-semibold">{{ $p->asistencia }}</td>
                        <td class="border px-4 py-2">
                            <button class="px-2 py-1 bg-blue-600 text-white rounded">Editar</button>
                            <form action="{{ route('personal.destroy', $p->id) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($personal->isEmpty())
                    <tr>
                        <td colspan="5" class="border px-4 py-2">No hay personal registrado.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="mt-4 flex justify-end">
            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded" id="hide_card_create_user">➕ Agregar Personal</button>
        </div>

    @include('panel.card_edit_user')
    </div>
