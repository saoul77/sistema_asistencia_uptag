@extends('layouts.app')
@section('content')
<div class="p-6 bg-white rounded shadow">
    <h2 class="text-xl mb-4">Horario de Asistencias</h2>

    @if(session('success')) <div class="p-2 bg-green-100 mb-3">{{ session('success') }}</div> @endif

    <form action="{{ route('asistencia.store') }}" method="POST" class="mb-4">
        @csrf
        <select name="personal_id">
            @foreach($personales as $p)
                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
            @endforeach
        </select>
        <input type="date" name="fecha" required>
        <button class="bg-green-600 text-white px-3 py-1 rounded">Agregar registro</button>
    </form>

    <div class="space-y-3">
        @foreach($personales as $p)
            <div class="border p-2">
                <h3 class="font-semibold">{{ $p->nombre }}</h3>
                <ul>
                    @foreach($p->asistencias as $a)
                        <li>{{ $a->fecha }} — {{ $a->hora_entrada ?: '—' }} / {{ $a->hora_salida ?: '—' }}
                        <a href="{{ route('asistencia.edit', $a->id) }}" class="text-blue-600">Editar</a></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>
@endsection
