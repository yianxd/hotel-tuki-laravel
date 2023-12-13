@extends('layouts.navbar')

@section('title', 'Editar Habitación')

@section('content')
    <h1>Editar Habitación</h1>
    <form method="POST" action="{{ route('room.update', $room->id) }}">
        @csrf
        @method('PUT')

        <label for="number">Número:</label>
        <input type="number" name="number" value="{{ $room->number }}" required>

        <label for="id_type">Tipo de Habitación:</label>
        <select name="id_type" required>
            @foreach($types as $type)
                <option value="{{ $type->id }}" {{ $room->id_type === $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
            @endforeach
        </select>

        <label for="fee">Tarifa:</label>
        <input type="number" name="fee" value="{{ $room->fee }}" step="0.01" required>

        <label for="capacity">Capacidad:</label>
        <input type="number" name="capacity" value="{{ $room->capacity }}" required>

        <label for="image">Imagen:</label>
        <input type="text" name="image" value="{{ $room->image }}" required>

        <button type="submit">Actualizar Habitación</button>
    </form>

    <a href="{{ route('room.index') }}">Volver a la lista de Habitaciones</a>
@endsection