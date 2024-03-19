@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Actualizar Inventario</h4>
        <div class="row">
            <div class="col-xl-12">
                <form id="updateForm" action="{{ route('inventory.update', $inventory->id_inventario) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="id_inventario">ID Inventario</label>
                        <input type="number" class="form-control" name="id_inventario" placeholder="" required value="{{ $inventory->id_inventario }}">
                    </div>

                    <div class="form-group">
                        <label for="id_producto">ID Producto</label>
                        <input type="number" class="form-control" name="id_producto" placeholder="" required value="{{ $inventory->id_producto }}">
                    </div>

                    <div class="form-group">
                        <label for="id_number">ID Habitación</label>
                        <input type="number" class="form-control" name="id_number" placeholder="" required value="{{ $inventory->id_number }}">
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" class="form-control" name="stock" placeholder="" required value="{{ $inventory->stock }}">
                    </div>

                    <div class="form-group">
                        <label for="responsable">Responsable</label>
                        <input type="text" class="form-control" name="responsable" placeholder="" required value="{{ $inventory->responsable }}">
                    </div>

                    <div class="form-group">
                        <label for="nota">Nota</label>
                        <input type="text" class="form-control" name="nota" placeholder="" required value="{{ $inventory->nota }}">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Actualizar" id="updateButton">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('updateButton').addEventListener('click', function(event) {
            event.preventDefault();


            var idInventario = document.querySelector('input[name="id_inventario"]').value;
            var idProducto = document.querySelector('input[name="id_producto"]').value;
            var idNumber = document.querySelector('input[name="id_number"]').value;
            var stock = document.querySelector('input[name="stock"]').value;
            var responsable = document.querySelector('input[name="responsable"]').value;
            var nota = document.querySelector('input[name="nota"]').value;


            var confirmMessage = "¿Estás seguro de actualizar este inventario?\n\n" +
                                 "ID Inventario: " + idInventario + "\n" +
                                 "ID Producto: " + idProducto + "\n" +
                                 "ID Habitación: " + idNumber + "\n" +
                                 "Stock: " + stock + "\n" +
                                 "Responsable: " + responsable + "\n" +
                                 "Nota: " + nota;


            if (confirm(confirmMessage)) {
                document.getElementById('updateForm').submit(); 
            }
        });
    </script>
@endsection
