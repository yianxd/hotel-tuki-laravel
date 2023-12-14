<!-- resources/views/products/show.blade.php -->
@extends('layouts.navbar')

@section('content')
    <h1>Detalles del Producto</h1>
    <p>Nombre: {{ $product->name }}</p>
    <p>Descripción: {{ $product->description }}</p>
    <p>Precio Unitario: {{ $product->price }}</p>
    <a href="{{ route('products.index') }}">Volver a la lista de productos</a>
@endsection