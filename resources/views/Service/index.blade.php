@extends('layouts.navbar')

@section('title', 'Lista de Servicios')

@section('content')
    <h1>Lista de Servicios</h1>
    <a href="{{ route('service.create') }}">Crear Nuevo Servicio</a>

    <ul>
        @foreach($services as $service)
            <li>
                <a href="{{ route('service.show', $service->id) }}">
                    {{ $service->name }} - Valor: {{ $service->value }}
                </a>
                <a href="{{ route('service.edit', $service->id) }}">Editar</a>
                <form method="POST" action="{{ route('service.destroy', $service->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este servicio?')">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection