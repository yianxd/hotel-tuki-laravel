@extends('layouts.navbar')

@section('content')

<div class="container">
    <h4>Cama</h4>
    <div class="row">
        <div class="col-xl-12">
            <!-- Formulario de búsqueda -->
            <form action="{{ route('beds.index') }}" method="post">
                <div class="form-row">
                    <div class="col-sm-3 my-1">
                        <!-- Campo de texto para búsqueda -->
                        <input type="text" class="form-control" name="texto" value="{{$texto}}">
                    </div>
                    <div class="col-auto my-1">
                          <!-- Botón para enviar formulario de búsqueda -->
                          <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                    <div class="col-auto my-1">
                        <!-- Enlace para crear un nuevo registro -->
                        <a href="{{route('beds.create')}}" class="btn btn-success">Nuevo registro</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lx-12">
            <!-- Tabla de resultados -->
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
                            <!-- Mensaje de "No hay resultados" si no hay registros -->
                            <tr>
                                <td colspan="2">No hay resultados</td>
                            </tr>
                        @else
                        <!-- Ciclo para mostrar los registros -->
                        @foreach ($beds as $bed)
                        <tr>
                            <!-- Mostrar datos de cada registro -->
                            <td>{{$bed->id_number }}</td>
                            <td>{{$bed->descripcion}}</td>
                            <td>
                                <!-- Botón para abrir modal de eliminación -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$bed->id_number}}">
                                    Eliminar
                                </button> |
                                <!-- Enlace para editar el registro -->
                                <a href="{{route('beds.edit',$bed->id_number)}} " class="btn btn-warning btn-sm">Editar</a>
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

<!-- Modal de eliminación -->
@foreach ($beds as $bed)
<div class="modal fade" id="modal-delete-{{$bed->id_number}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Cama</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que quieres eliminar esta cama?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <!-- Formulario para enviar solicitud de eliminación -->
        <form action="{{ route('beds.destroy', $bed->id_number) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- Script de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

@endsection
