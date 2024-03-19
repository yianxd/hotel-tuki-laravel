@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Registro De Productos</h4>
        <div class="row">
            <div class="col-xl-12">
                <form id="productForm" action="{{ route('product.store') }}" method="post">
                    @csrf
/*formulario para inserta un producto*/
                    <div class="form-group">
                        <label for="nombre_producto">Nombre del Producto</label>
                        <input type="text" class="form-control" name="nombre_producto" placeholder="" value="{{ old('nombre_producto') }}" required>
                        @error('nombre_producto')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" rows="3" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" placeholder="" value="{{ old('cantidad') }}" required>
                        @error('cantidad')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" class="form-control" name="price" placeholder="" value="{{ old('price') }}" required>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="button" class="btn btn-primary" value="Registro" onclick="confirmSubmit()">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmSubmit() {
            var form = document.getElementById('productForm');
            var nombre_producto = form.nombre_producto.value;
            var description = form.description.value;
            var cantidad = form.cantidad.value;
            var price = form.price.value;

            var confirmation = confirm("¿Está seguro de agregar el siguiente producto?\n\nNombre del Producto: " + nombre_producto + "\nDescripción: " + description + "\nCantidad: " + cantidad + "\nPrecio: " + price);

            if (confirmation) {
                form.submit();
            }
        }
    </script>
@endsection
