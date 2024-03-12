@extends('layouts.navbar')

@section('title', 'Lista de Servicios')

@section('content')
<div class="col-xl-12">
    <form action="{{ route('booking.index')}}" method="get">
        <div class="form-row">
            <div class="col-sm-3 my-1">
                <input type="text" class="form-control" name="texto" value="{{$texto}}">
            </div>
            <div class="col-auto my-1">
                  <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
            <div class="col-auto my-1">
                <a href="{{route('booking.create')}}" class="btn btn-success">Crear reserva</a>
            </div>
        </div>
    </form>
</div>
<div class="col-lx-12">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>

                    <th>Opciones</th>
                    <th>Numero de Reserva</th>
                    <th>Documento</th>
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
                        <td colspan="7">No hay resultados</td>
                    </tr>
                @else
                @foreach ($booking as $booking)
                <tr>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$booking->id}}">
                            Eliminar
                        </button> |
                        <a href="{{route('booking.edit',$booking->id)}}" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                    <td>{{$booking->id}}</td>
                    <td>{{$booking->document}}</td>
                    <td>{{$booking->id_number}}</td>
                    <td>{{$booking->amount_people}}</td>
                    <td>{{$booking->date_start}}</td>
                    <td>{{$booking->date_end}}</td>
                    <td>{{$booking->price}}</td>
                @include('booking.destroy')
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection
