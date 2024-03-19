@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Registro De Inventario</h4>
        <div class="row">
            <div class="col-xl-12">
                <form id="inventoryForm" action="{{ route('inventory.store') }}" method="post">
                    @csrf


                    <div class="form-group">
                        <label for="id_inventario">ID Inventario</label>
                        <input type="number" class="form-control" name="id_inventario" placeholder="" value="{{ old('id_inventario') }}" required>
                        @error('id_inventario')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="id_producto">ID Producto</label>
                        <input type="number" class="form-control" name="id_producto" placeholder="" value="{{ old('id_producto') }}" required>
                        @error('id_producto')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="id_number">ID Habitación</label>
                        <input type="number" class="form-control" name="id_number" placeholder="" value="{{ old('id_number') }}" required>
                        @error('id_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" class="form-control" name="stock" placeholder="" value="{{ old('stock') }}" required>
                        @error('stock')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="responsable">Responsable</label>
                        <input type="text" class="form-control" name="responsable" placeholder="" value="{{ old('responsable') }}" required>
                        @error('responsable')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="nota">Nota</label>
                        <input type="text" class="form-control" name="nota" placeholder="" value="{{ old('nota') }}" required>
                        @error('nota')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Registro" id="submitButton">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('submitButton').addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el formulario se envíe automáticamente

            // Recupera los valores de los campos del formulario
            var idInventario = document.querySelector('input[name="id_inventario"]').value;
            var idProducto = document.querySelector('input[name="id_producto"]').value;
            var idNumber = document.querySelector('input[name="id_number"]').value;
            var stock = document.querySelector('input[name="stock"]').value;
            var responsable = document.querySelector('input[name="responsable"]').value;
            var nota = document.querySelector('input[name="nota"]').value;

            // Crea el mensaje de confirmación con la información ingresada
            var confirmMessage = "¿Estás seguro de registrar este inventario?\n\n" +
                                 "ID Inventario: " + idInventario + "\n" +
                                 "ID Producto: " + idProducto + "\n" +
                                 "ID Habitación: " + idNumber + "\n" +
                                 "Stock: " + stock + "\n" +
                                 "Responsable: " + responsable + "\n" +
                                 "Nota: " + nota;


            if (confirm(confirmMessage)) {
                document.getElementById('inventoryForm').submit();
            }
        });
    </script>
@endsection
