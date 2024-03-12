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
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="" required value="{{ $rooms->descripcion }}">
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
