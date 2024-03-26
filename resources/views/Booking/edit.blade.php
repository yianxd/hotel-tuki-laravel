@extends('layouts.navbar')

@section('title', 'Editar reserva')

@section('content')

<h1>Actualizar reserva</h1>
<form class="form-control" action="{{ route('booking.update',$booking->id_booking) }}" method="POST" >
    @csrf
    @method('PUT')
    <div class="col-md-4">
        <label for="form-control">Documento</label>
        <label type="text" class="form-control">{{$booking->document}}</label>
        <div class="col-lx-12">
            <div class="table-responsive">
                    <label for="">Habitacion</label>
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

                        @foreach ($rooms as $room)
                        <tr>
                            @if($room->id_number==$booking->id_number)
                            <td>
                                <input name="id_number" value=102 hidden>
                            </td>
                            <td>{{$room->id_number}}</td>
                            <td id="type_room">
                                @if ($room->id_type==1)
                                    simple
                                @elseif ($room->id_type==2)
                                    doble
                                @elseif ($room->id_type==3)
                                    matrimonial
                                @else
                                    suit
                                @endif

                            </td >
                            <td id="capacity">{{$room->capacity}} persona/s</td>
                            @endif
                        </tr>
                        @endforeach
                </table>
            </div>
            <!--Button-->
            <button type="button" class="btn btn-success" id="btn-abrir">Cambiar habitacion</button>
        @include('Booking.changeRoom')
        @error('amount_rooms')
            <br>
            <small style="color:red">{{$message}} </small>
        @enderror
        <label class="form-label" for="amount_people">Cantidad de personas</label>
        <input type="number" class="form-control" name="amount_people" value="{{$booking->amount_people}}" rows="3">
        @error('amount_people')
            <br>
            <small style="color:red">{{$message}} </small>
        @enderror
        <label class="form-label" for="date_start" >Fecha inicio</label>
        <input type="date" class="form-control " name="date_start" value="{{$booking->date_start}}">
        <label class="form-label" for="date_end">Fecha final</label>
        <input type="date" class="form-control " name="date_end" value="{{$booking->date_end}}">
        <input type="numeric" name="price" value="1000" hidden>


    </form>
    <button type="submit" class="btn btn-primary" value="Reservar" id="guardar">Reservar</button>
    <a  href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
    </div>
    <script src="{{asset('js/Booking/btn.js')}}"></script>
    <script src="{{asset('js/Booking/modal.js')}}"></script>





@endsection
