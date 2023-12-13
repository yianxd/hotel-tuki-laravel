<!-- resources/views/products/edit.blade.php -->
@extends('layouts.navbar')

@section('content')
    <h1>Editar Producto</h1>
    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Nombre del Producto:</label>
        <input type="text" name="name" value="{{ $product->nombre_producto }}" required>

        <label for="description">Descripción:</label>
        <textarea name="description" required>{{ $product->descripcion }}</textarea>

        <label for="price">Precio Unitario:</label>
        <input type="number" step="0.01" name="price" value="{{ $product->precio_unitario }}" required>

        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="{{ route('products.index') }}">Cancelar</a>
@endsection