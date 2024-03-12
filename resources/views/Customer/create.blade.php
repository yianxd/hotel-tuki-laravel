@extends('layouts.navbar')

@section('title', 'Crear Reserva')

@section('content')
    <h1>Crear Reserva</h1>
    <form class="form-control" action="{{ route('customer.store') }}" method="POST" >
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="document">Documento</label>
            <input  type="text" name="document" class="form-control" value="{{old('document')}}">
            @error('document')
                <br>
                <small style="color:red">{{$message}} </small>
            @enderror
            <label for="">SELECCIONE LA HABITACION</label>
            <div class="col-lx-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>numero</th>
                                <th>tipo</th>
                                <th>capacidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($room)<=0)
                                <tr>
                                    <td colspan="7">No hay resultados</td>
                                </tr>
                            @else
                            @foreach ($room as $room)
                            <tr>
                                <td>
                                    <input type="radio"  name="id_number" value="{{$room->id_number}}">
                                </td>
                                <td>{{$room->id_number}}</td>
                                <td>
                                    @if ($room->id_type==1)
                                        simple
                                    @elseif ($room->id_type==2)
                                        doble
                                    @elseif ($room->id_type==3)
                                        matrimonial
                                    @else
                                        suit
                                    @endif

                                </td>
                                <td>{{$room->capacity}} persona/s</td>

                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
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
            <input type="numeric" name="price" value="1000" hidden>
        </form>
        <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
        </div>
@endsection
