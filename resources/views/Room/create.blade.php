@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Registro De Cama</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('room.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="id_number">Numero Habitacion</label>
                        <input type="number" class="form-control" name="id_number" placeholder="" value="{{ old('id_number') }}" required>
                        @error('id_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_type">tipo de habitacion</label>
                        <select class="form-control" name="id_type" required>
                            <option value="">Seleccionar tipo de habitación</option>
                            <option value="1" {{ old('id_type') == '1' ? 'selected' : '' }}>Habitación Individual</option>
                            <option value="2" {{ old('id_type') == '2' ? 'selected' : '' }}>Habitación Doble</option>
                            <option value="3" {{ old('id_type') == '3' ? 'selected' : '' }}>Suite</option>
                        </select>
                        @error('id_type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="capacity">Capacidad</label>
                        <input type="text" class="form-control" name="capacity" placeholder="" value="{{ old('capacity') }}" required>
                        @error('capacity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
