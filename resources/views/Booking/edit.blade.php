@extends('layouts.navbar')

@section('title', 'Editar reserva')

@section('content')
<h1>Actualizar</h1>
<form class="form-control" action="{{ route('booking.update',$booking->id) }}" method="POST" >
    @csrf
    @method('PUT')
    <div class="col-md-4">
        <label class="form-label" for="amount_rooms">Numero de Habitaciones</label>
        <input type="number" class="form-control"  name="id_number" required value="{{$booking->amount_rooms}}">
        @error('amount_rooms')
            <br>
            <small style="color:red">{{$message}} </small>
        @enderror
        <label class="form-label" for="amount_people">Cantidad de personas</label>
        <input type="number" class="form-control" name="amount_people" value="{{$booking->amount_people}}">
        @error('amount_people')
            <br>
            <small style="color:red">{{$message}} </small>
        @enderror
        <label for="form-control" for="date_start">Fecha Inicio</label>
        <input class="form-check-input" type="date" name="date_start" value="{{$booking->date_start}}">
        @error('date_start')
        <br>
        <small style="color:red">{{$message}} </small>
        @enderror

        <label for="form-control" for="date_end">Fecha Final</label>
        <input type="date" name="date_end" value="{{$booking->date_end}}">
        @error('date_end')
        <br>
        <small style="color:red">{{$message}} </small>
        @enderror

        <input type="submit" class="btn btn-primary" value="Reservar">
    </form>
    <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
    </div>
@endsection
