@extends('layouts.navbar')

@section('title', 'Detalles del Tipo de Habitación')

@section('content')
    <h1>Detalles del Tipo de Habitación</h1>
    <p>Nombre: {{ $typeRoom->name }}</p>
    <p>Descripción: {{ $typeRoom->description }}</p>
    
    <a href="{{ route('type_room.index') }}">Volver a la lista de Tipos de Habitación</a>
@endsection