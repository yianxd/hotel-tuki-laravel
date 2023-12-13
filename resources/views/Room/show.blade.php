@extends('layouts.navbar')

@section('title', 'Detalles de la Habitación')

@section('content')
    <h1>Detalles de la Habitación</h1>
    <p>Número: {{ $room->number }}</p>
    <p>Tipo de Habitación: {{ $room->typeRoom->name }}</p>
    <p>Tarifa: {{ $room->fee }}</p>
    <p>Capacidad: {{ $room->capacity }}</p>
    <p>Imagen: {{ $room->image }}</p>

    <a href="{{ route('room.index') }}">Volver a la lista de Habitaciones</a>
@endsection