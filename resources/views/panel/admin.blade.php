@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<div class="p-6 bg-white rounded-xl shadow">
    <h2 class="text-2xl font-bold text-blue-800 mb-4">Panel de Administración</h2>
    <p class="text-gray-700">Bienvenido {{ Auth::user()->nombre ?? 'Administrador' }}</p>

    <div class="mt-6 space-x-4">
        <a href="{{ route('personal.panel') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Ir al Panel de Personal</a>
        <a href="{{ route('invitado.panel') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">Ir al Panel de Invitados</a>
    </div>
</div>
@extends('panel.card_edit_user')

@endsection
