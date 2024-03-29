@extends('layouts.navbar')

@section('content')

<div class="container">
    <h4>Habitacion</h4>
    <div class="row">
        <div class="col-xl-12">
            <form action="{{ route('room.index') }}" method="post">
                <div class="form-row">
                    <div class="col-sm-3 my-1">
                        <input type="text" class="form-control" name="texto" value="{{$texto}}">
                    </div>
                    <div class="col-auto my-1">
                          <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                    <div class="col-auto my-1">
                        <a href="{{route('room.create')}}" class="btn btn-success">Nuevo registro</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lx-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NUMERO DE HABITACION</th>
                            <th>TIPO DE HABITACION</th>
                            <th>CAPACIDAD</th>
                            <th>ESTADO</th>
                            <th>PRECIO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($rooms)<=0)
                            <tr>
                                <td colspan="7">No hay resultados</td>
                            </tr>
                        @else
                        @foreach ($rooms as $room)
                        <tr>
                            <td>{{$room->id_number }}</td>
                            <td>
                                @if ($room->id_type==1)
                                    Simple
                                @elseif ($room->id_type==2)
                                    Doble
                                @elseif($room->id_type==3)
                                    suit
                                @endif
                                </td>
                            <td>{{$room->capacity}}</td>
                            <td>
                                @if ($room->state==1)
                                    Disponible

                                @elseif ($room->state==0)
                                    Ocupada
                                @elseif ($room->state==2)
                                    En mantenimiento
                                @endif

                                </td>
                            <td>{{$room->price}}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$room->id_number}}">
                                    Eliminar
                                </button> |
                                <a href="{{route('room.edit',$room->id_number)}} " class="btn btn-warning btn-sm">Editar</a>
                            </td>
                        </tr>
                        @include('room.destroy')
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
