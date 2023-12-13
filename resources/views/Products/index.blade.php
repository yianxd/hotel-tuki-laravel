
@extends('layouts.navbar')

@section('content')
    <h1>Lista de Productos</h1>
    <a href="{{ route('products.create') }}">Crear Nuevo Producto</a>

    <ul>
        @foreach($products as $product)
            <li>
                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                </form>
                <!-- Agrega más acciones según sea necesario -->
            </li>
        @endforeach
    </ul>
@endsection