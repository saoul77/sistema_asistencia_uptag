@extends('layouts.app')

@section('title', 'Panel de Invitado')

@section('content')
<div class="p-6 bg-white rounded-xl shadow">
    <h2 class="text-2xl font-bold text-indigo-700 mb-4">Panel de Invitado</h2>
    <p class="text-gray-700">Bienvenido {{ Auth::user()->nombre ?? 'Invitado' }}</p>

    <div class="mt-6">
        <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Volver al Panel Admin</a>
    </div>
</div>
@endsection
