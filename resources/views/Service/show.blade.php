@extends('layouts.navbar')

@section('title', 'Detalles del Servicio')

@section('content')
    <h1>Detalles del Servicio</h1>
    <p>Nombre: {{ $service->name }}</p>
    <p>Valor: {{ $service->value }}</p>
    <a href="{{ route('service.index') }}">Volver a la lista de servicios</a>
@endsection