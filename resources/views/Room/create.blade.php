@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Registro de Habitación</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('room.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="id_number">Número de Habitación</label>
                        <input type="number" class="form-control" name="id_number" placeholder="" required value="{{ old('id_number') }}">
                        @error('id_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_type">Tipo de Habitación</label>
                        <select class="form-control" name="id_type" required>
                            <option value="">Seleccionar tipo de habitación</option>
                            <option value="1">Habitación Individual</option>
                            <option value="2">Habitación Doble</option>
                            <option value="3">Suite</option>
                        </select>
                        @error('id_type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="capacity">Capacidad</label>
                        <input type="number" class="form-control" name="capacity" placeholder="" required value="{{ old('capacity') }}">
                        @error('capacity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="state">Estado</label>
                        <select class="form-control" name="state" required>
                            <option value="">Seleccionar estado</option>
                            <option value="Disponible">Disponible</option>
                            <option value="Mantenimiento">Mantenimiento</option>
                            <option value="No Disponible">No Disponible</option>
                        </select>
                        @error('state')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" class="form-control" name="price" placeholder="" required value="{{ old('price') }}">
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
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function confirmSubmit() {
        var id_number = $("input[name='id_number']").val();
        var id_type = $("select[name='id_type']").val();
        var capacity = $("input[name='capacity']").val();
        var state = $("select[name='state']").val();
        var price = $("input[name='price']").val();

        var confirmationMessage = "¿Estás seguro de crear la habitación con los siguientes detalles?\n\n" +
                                    "Número de Habitación: " + id_number + "\n" +
                                    "Tipo de Habitación: " + id_type + "\n" +
                                    "Capacidad: " + capacity + "\n" +
                                    "Estado: " + state + "\n" +
                                    "Precio: " + price + "\n";

        return confirm(confirmationMessage);
    }
</script>
@endsection
