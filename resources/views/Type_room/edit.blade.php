@extends('layouts.navbar')

@section('title', 'Editar Tipo de Habitación')

@section('content')
    <h1>Editar Tipo de Habitación</h1>
    <form method="POST" action="{{ route('type_room.update', $typeRoom->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ $typeRoom->name }}" required>

        <label for="description">Descripción:</label>
        <textarea name="description" required>{{ $typeRoom->description }}</textarea>

        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="{{ route('type_room.index') }}">Cancelar</a>
@endsection