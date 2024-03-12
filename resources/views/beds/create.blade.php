@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Registro De Cama</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('beds.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="id_number">Numero Habitacion</label>
                        <input type="text" class="form-control" name="id_number" placeholder="Escriba el número de habitación" required>
                        @error('id_numbers')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="Escriba la descripción" value="{{ old('descripcion') }}" required>
                        @error('descripcion')
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