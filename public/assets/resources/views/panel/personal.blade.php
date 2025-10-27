@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Gestión de Personal</h2>

    @if(session('success')) <div class="p-2 bg-green-100 text-green-800 mb-3">{{ session('success') }}</div> @endif

    <a href="{{ route('personal.create') }}" class="bg-green-600 text-white px-3 py-1 rounded mb-3 inline-block">➕ Agregar Personal</a>

    <table class="w-full border">
        <thead class="bg-gray-100 text-left">
            <tr><th class="p-2">Nombre</th><th class="p-2">Correo</th><th class="p-2">Cargo</th><th class="p-2">Asistencia</th><th class="p-2">Acciones</th></tr>
        </thead>
        <tbody>
            @foreach($personales as $p)
            <tr class="border-t">
                <td class="p-2">{{ $p->nombre }}</td>
                <td class="p-2">{{ $p->correo }}</td>
                <td class="p-2">{{ $p->cargo }}</td>
                <td class="p-2">{{ $p->asistencia }}</td>
                <td class="p-2">
                    <a href="{{ route('personal.edit', $p->id) }}" class="px-2 py-1 bg-blue-600 text-white rounded">Editar</a>
                    <form action="{{ route('personal.destroy', $p->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="px-2 py-1 bg-red-600 text-white rounded" onclick="return confirm('Eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
