@extends('layouts.navbar')

@section('content')

<div class="container">
    <h4>Cama</h4>
    <div class="row">
        <div class="col-xl-12">
            <form action="{{ route('beds.index') }}" method="post">
                <div class="form-row">
                    <div class="col-sm-3 my-1">
                        <input type="text" class="form-control" name="texto" value="{{$texto}}">
                    </div>
                    <div class="col-auto my-1">
                          <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                    <div class="col-auto my-1">
                        <a href="{{route('beds.create')}}" class="btn btn-success">Nuevo registro</a>
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
                            <th>DESCRIPCIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($beds)<=0)
                            <tr>
                                <td colspan="2">No hay resultados</td>
                            </tr>
                        @else
                        @foreach ($beds as $beds)
                        <tr>
                            <td>{{$beds->id_number }}</td>
                            <td>{{$beds->descripcion}}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$beds->id_number}}">
                                    Eliminar
                                </button> |
                                <a href="{{route('beds.edit',$beds->id_number)}} " class="btn btn-warning btn-sm">Editar</a>
                            </td>
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
