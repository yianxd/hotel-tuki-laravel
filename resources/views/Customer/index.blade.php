@extends('layouts.navbar')

@section('title', 'Crear Nuevo Servicio')

@auth
@section('content')
<section>

    <a href="{{route('customer.create')}}" class="btn btn-success">hacer reserva</a>

    <h1>Mis reservas</h1>

    <div class="col-lx-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>Opciones</th>
                        <th>Numero de Reserva</th>
                        <th>Numero de habitacion</th>
                        <th>Cantidad de personas</th>
                        <th>Fecha inicio</th>
                        <th>Fecha final</th>
                        <th>precio</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($booking)<=0)
                        <tr>
                            <td colspan="7">No hay reservas aun c: </td>
                        </tr>
                    @else
                    @foreach ($booking as $booking)
                    @if ( auth()->user()->document==$booking->document)
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ asset($booking->id_booking)}}">
                                        Cancelar Reserva
                                    </button>|
                                    @include('Booking.destroy')
                                    <div>
                                        <a href="{{ route('booking.edit',$booking->id_booking) }}" class="btn btn-warning btn-sm">Actualizar reserva</a>
                                    </div>
                                </td>
                                <td>{{$booking->id_booking}}</td>
                                <td>{{$booking->id_number}}</td>
                                <td>{{$booking->amount_people}}</td>
                                <td>{{$booking->date_start}}</td>
                                <td>{{$booking->date_end}}</td>
                                <td>{{$booking->price}}</td>
                            </tr>

                    @endif
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>
    </div>
    </div>
    @if (Session::has('succes'))
        <script src="{{asset('js/Customer/btn.js')}}">

        </script>
    @endif
</section>

@endsection

@endauth
