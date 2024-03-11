@extends('layouts.navbar')

@section('title', 'Lista de Servicios')

@section('content')
<div class="col-xl-12">
    <form action="{{ route('service.index')}}" method="get">
        <div class="form-row">
            <div class="col-sm-3 my-1">
                <input type="text" class="form-control" name="texto" value="{{$texto}}">
            </div>
            <div class="col-auto my-1">
                  <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
            <div class="col-auto my-1">
                <a href="{{route('service.create')}}" class="btn btn-success">Nuevo servicio</a>
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
                    <th>numero</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Detalles</th>
                    <th>Disponibilidad</th>
                </tr>
            </thead>
            <tbody>
                @if (count($service)<=0)
                    <tr>
                        <td colspan="7">No hay resultados</td>
                    </tr>
                @else
                @foreach ($service as $service)
                <tr>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$service->id_service}}">
                            Eliminar
                        </button> |
                        <a href="{{route('service.edit',$service->id_service)}}" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                    <td>{{$service->id_service}}</td>
                    <td>{{$service->name}}</td>
                    <td>{{$service->value}}</td>
                    <td>{{$service->description}}</td>
                    <td>
                        @if ($service->disponibility==1)
                            disponible
                        @else
                            no disponible
                        @endif

                    </td>
                @include('service.destroy')
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
