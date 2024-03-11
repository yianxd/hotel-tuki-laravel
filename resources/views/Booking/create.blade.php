@extends('layouts.navbar')

@section('title', 'Crear Reserva')

@section('content')
    <h1>Crear Reserva</h1>
    <form class="form-control" action="{{ route('booking.store') }}" method="POST" >
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="document">Documento</label>
            <input  type="text" name="document" class="form-control" value="{{old('document')}}">
            @error('document')
                <br>
                <small style="color:red">{{$message}} </small>
            @enderror
            <label class="form-label" for="amount_rooms">Cantidad de habitaciones</label>
            <input type="number" class="form-control"  name="amount_rooms" required value="{{old('amount_people')}}">
            @error('amount_rooms')
                <br>
                <small style="color:red">{{$message}} </small>
            @enderror
            <label class="form-label" for="amount_people">Cantidad de personas</label>
            <input type="number" class="form-control" name="amount_people" value="{{old('amount_people')}}" rows="3">
            @error('amount_people')
                <br>
                <small style="color:red">{{$message}} </small>
            @enderror
            <label class="form-label" for="date_start">Fecha inicio</label>
            <input type="date" class="form-control " name="date_start">
            <label class="form-label" for="date_end">Fecha final</label>
            <input type="date" class="form-control " name="date_end">
            <input type="submit" class="btn btn-primary" value="Reservar">
        </form>
        <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
        </div>
@endsection
