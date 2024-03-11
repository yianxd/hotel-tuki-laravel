@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Registro De Habitaciones</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('room.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="id_number">Numero Habitacion</label>
                        <input type="number" class="form-control" name="id_number" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label for="id_type">tipo de habitacion</label>
                        <select class="form-control" name="id_type" required>
                            <option value="">Seleccionar tipo de habitación</option>
                            <option value="1">Habitación Individual</option>
                            <option value="2">Habitación Doble</option>
                            <option value="suite">Suite</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="capacity">capacidad</label>
                        <input type="number" class="form-control" name="capacity" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Registro">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection
