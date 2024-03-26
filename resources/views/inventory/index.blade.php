@extends('layouts.navbar')

@section('content')

<div class="container">
    <h4>Inventario</h4>
    <div class="row">
        <div class="col-xl-12">
            <form action="{{ route('inventory.index') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="col-sm-3 my-1">
                        <input type="text" class="form-control" name="texto" value="{{$texto}}">
                    </div>
                    <div class="col-auto my-1">
                          <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                    <div class="col-auto my-1">
                        <a href="{{route('inventory.create')}}" class="btn btn-success">Nuevo registro</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lx-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Número de Identificación</th>
                            <th>Stock</th>
                            <th>Responsable</th>
                            <th>Nota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($inventory) <= 0)
                            <tr>
                                <td colspan="6">No hay resultados</td>
                            </tr>
                        @else
                            @foreach ($inventory as $inventory)
                            <tr>
                                <td>{{$inventory->id_inventario }}</td>
                                <td>{{$inventory->id_producto}}</td>
                                <td>{{$inventory->id_number}}</td>
                                <td>{{$inventory->stock}}</td>
                                <td>{{$inventory->responsable}}</td>
                                <td>{{$inventory->nota}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$inventory->id_inventario}}">
                                        Eliminar
                                    </button> |
                                    <a href="{{route('inventory.edit',$inventory->id_inventario)}} " class="btn btn-warning btn-sm">Editar</a>
                                </td>
                            </tr>
                            @include('inventory.destroy')
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
