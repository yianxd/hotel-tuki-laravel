@extends('layouts.navbar')

@section('title', 'Editar Servicio')

@section('content')
    <h1>Editar Servicio</h1>
    <form method="POST" action="{{ route('service.update', $service->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ $service->name }}" required>

        <label for="value">Valor:</label>
        <input type="number" step="0.01" name="value" value="{{ $service->value }}" required>

        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="{{ route('service.index') }}">Cancelar</a>
@endsection