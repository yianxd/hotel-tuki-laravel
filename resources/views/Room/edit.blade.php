@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Actualizar</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('room.update', $rooms->id_number) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="id_number">Numero Habitacion</label>
                        <input type="number" class="form-control" name="id_number" placeholder="" required value="{{ $rooms->id_number }}">
                    </div>

                    <div class="form-group">
                        <label for="id_type">Tipo de habitacion</label>
                        <select class="form-control" name="id_type" required>
                            <option value="">Seleccionar tipo de habitación</option>
                            <option value="1" {{ $rooms->id_type == '1' ? 'selected' : '' }}>Habitación Individual</option>
                            <option value="2" {{ $rooms->id_type == '2' ? 'selected' : '' }}>Habitación Doble</option>
                            <option value="suite" {{ $rooms->id_type == 'suite' ? 'selected' : '' }}>Suite</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="capacity">Capacidad</label>
                        <input type="number" class="form-control" name="capacity" placeholder="" required value="{{ $rooms->capacity }}">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
