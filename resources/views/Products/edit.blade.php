@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Actualizar Producto</h4>
        <div class="row">
            <div class="col-xl-12">
                <form id="updateProductForm" action="{{ route('products.update', $products->id_producto) }}" method="post">
                    @csrf
                    @method('PUT')


                    <div class="form-group">
                        <label for="nombre_producto">Nombre del Producto</label>
                        <input type="text" class="form-control" name="nombre_producto" placeholder="" required value="{{ $products->nombre_producto }}">
                    </div>


                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" rows="3" required>{{ $products->description }}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" placeholder="" required value="{{ $products->cantidad }}">
                    </div>


                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" class="form-control" name="price" placeholder="" required value="{{ $products->price }}">
                    </div>


                    <div class="form-group">
                        <input type="button" class="btn btn-primary" value="Actualizar" onclick="confirmUpdate()">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function confirmUpdate() {
            var form = document.getElementById('updateProductForm');
            var nombre_producto = form.nombre_producto.value;
            var description = form.description.value;
            var cantidad = form.cantidad.value;
            var price = form.price.value;

            var confirmation = confirm("¿Está seguro de actualizar el siguiente producto?\n\nNombre del Producto: " + nombre_producto + "\nDescripción: " + description + "\nCantidad: " + cantidad + "\nPrecio: " + price);

            if (confirmation) {
                form.submit();
            }
        }
    </script>
@endsection
