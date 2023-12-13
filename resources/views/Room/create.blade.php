@extends('layouts.navbar')

@section('title', 'Crear Nueva Habitación')

@section('content')
    <h1>Crear Nueva Habitación</h1>
    <form method="POST" action="{{ route('room.store') }}">
        @csrf

        <label for="number">Número:</label>
        <input type="number" name="number" required>
        <label for="id_type">Tipo de Habitación:</label>
        <select name="id_type" required>
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>

        <label for="fee">Tarifa:</label>
        <input type="number" name="fee" step="0.01" required>

        <label for="capacity">Capacidad:</label>
        <input type="number" name="capacity" required>

        <label for="image">Imagen:</label>
        <input type="text" name="image" required>

        <button type="submit">Crear Habitación</button>
    </form>

    <a href="{{ route('room.index') }}">Volver a la lista de Habitaciones</a>
@endsection