@extends('layouts.navbar')

@section('content')
<div class="cotainer">
    <h4>Users</h4>
    <div class="row">
        <div class="col-xl-12">
            <form action="{{ route('user.index')}}" method="get">
                <div class="form-row">
                    <div class="col-sm-3 my-1">
                        <input type="text" class="form-control" name="texto" value="{{$texto}}">
                    </div>
                    <div class="col-auto my-1">
                          <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                    <div class="col-auto my-1">
                        <a href="{{route('user.create')}}" class="btn btn-success">Nuevo registro</a>
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
                            <th>Tipo de usuario</th>
                            <th>Tipo Documento</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Email</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (count($user)<=0)
                            <tr>
                                <td colspan="7">No hay resultados</td>
                            </tr>
                        @else
                        @foreach ($user as $user)
                        <tr>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$user->document}}">
                                    Eliminar
                                </button> |
                                <a href="{{route('user.edit',$user->document)}} " class="btn btn-warning btn-sm">Editar</a>
                            </td>
                            <td>{{$user->typeDoc}}</td>
                            <td>{{$user->document}}</td>
                            <td>{{$user->id_rol}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>

                        </tr>
                        @include('user.destroy')
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
