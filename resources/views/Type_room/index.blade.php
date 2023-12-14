@extends('layouts.navbar')

@section('title', 'Lista de Tipos de Habitación')

@section('content')
    <h1>Lista de Tipos de Habitación</h1>
    <a href="{{ route('type_room.create') }}">Crear Nuevo Tipo de Habitación</a>

    <ul>
        @foreach($typeRooms as $typeRoom)
            <li>
                <a href="{{ route('type_room.show', $typeRoom->id) }}">
                    {{ $typeRoom->name }} - {{ $typeRoom->description }}
                </a>
                <a href="{{ route('type_room.edit', $typeRoom->id) }}">Editar</a>
                <form method="POST" action="{{ route('type_room.destroy', $typeRoom->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo de habitación?')">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection