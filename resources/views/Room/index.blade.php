@extends('layouts.navbar')

@section('title', 'Lista de Habitaciones')

@section('content')
    <h1>Lista de Habitaciones</h1>
    <a href="{{ route('room.create') }}">Crear Nueva Habitación</a>

    <ul>
        @foreach($rooms as $room)
            <li>
                <a href="{{ route('room.show', $room->id) }}">
                    Habitación {{ $room->number }} - Tipo: {{ $room->typeRoom->name }}
                </a>
                <a href="{{ route('room.edit', $room->id) }}">Editar</a>
                <form method="POST" action="{{ route('room.destroy', $room->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta habitación?')">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
