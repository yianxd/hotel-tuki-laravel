@extends('layouts.navbar')

@section('content')
    <h1>Crear Nuevo Producto</h1>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <label for="name">Nombre del Producto:</label>
        <input type="text" name="name" required>

        <label for="description">Descripción:</label>
        <textarea name="description" required></textarea>

        <label for="price">Precio Unitario:</label>
        <input type="number" step="0.01" name="price" required>

        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('products.index') }}">Cancelar</a>
@endsection