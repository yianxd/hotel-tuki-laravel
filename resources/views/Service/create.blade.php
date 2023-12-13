@extends('layouts.navbar')

@section('title', 'Crear Nuevo Servicio')

@section('content')
    <h1>Crear Nuevo Servicio</h1>
    <form method="POST" action="{{ route('service.store') }}">
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" name="name" required>

        <label for="value">Valor:</label>
        <input type="number" step="0.01" name="value" required>

        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('service.index') }}">Cancelar</a>
@endsection