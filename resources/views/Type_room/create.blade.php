@extends('layouts.navbar')

@section('title', 'Crear Nuevo Tipo de Habitación')

@section('content')
    <h1>Crear Nuevo Tipo de Habitación</h1>
    <form method="POST" action="{{ route('type_room.store') }}">
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" name="name" required>

        <label for="description">Descripción:</label>
        <textarea name="description" required></textarea>

        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('type_room.index') }}">Cancelar</a>
@endsection