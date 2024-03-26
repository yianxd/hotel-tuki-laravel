@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Registro De Productos</h4>
        <div class="row">
            <div class="col-xl-12">
                <form id="productForm" action="{{ route('products.store') }}" method="post">
                    @csrf

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
                        <input type="submit" class="btn btn-primary" value="Registro" onclick="return confirmSubmit();">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function confirmSubmit() {
            var nombre_producto = $("input[name='nombre_producto']").val();
            var description = $("textarea[name='description']").val();
            var cantidad = $("input[name='cantidad']").val();
            var price = $("input[name='price']").val();

            var confirmationMessage = "¿Está seguro de agregar el siguiente producto?\n\n" +
                                    "Nombre del Producto: " + nombre_producto + "\n" +
                                    "Descripción: " + description + "\n" +
                                    "Cantidad: " + cantidad + "\n" +
                                    "Precio: " + price + "\n";

            return confirm(confirmationMessage);
        }
    </script>
@endsection
