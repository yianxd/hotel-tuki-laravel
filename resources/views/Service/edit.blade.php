@extends('layouts.navbar')

@section('title', 'Editar Servicio')

@section('content')
<h1>Actualizar</h1>
<form class="form-control" action="{{ route('service.update',$service->id_service) }}" method="POST" >
    @csrf
    @method('PUT')
    <div class="col-md-4">
        <label class="form-label" for="name">Nombre</label>
        <input  type="text" name="name" class="form-control" value="{{$service->name}}">
        @error('name')
            <br>
            <small style="color:red">{{$message}} </small>
        @enderror
        <label class="form-label" for="value">Valor</label>
        <input type="text" class="form-control"  name="value" required value="{{$service->value}}">
        @error('value')
            <br>
            <small style="color:red">{{$message}} </small>
        @enderror
        <label class="form-label" for="description">Descripcion</label>
        <input type="textarea" class="form-control" name="description" value="{{$service->description}}" rows="3">
        @error('description')
            <br>
            <small style="color:red">{{$message}} </small>
        @enderror
        <label for="form-control" for="disponibility">Disponibilidad</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="disponibility" value="1" id="flexRadioDefault1" @if ($service->disponibility= 1)
                @checked(true)
            @endif>
            <label class="form-check-label" for="flexRadioDefault1">
              Disponible
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="disponibility" value="0" id="flexRadioDefault2" @if ($service->disponibility= 0 )
            @checked(true)
            @endif>
            <label class="form-check-label" for="flexRadioDefault2">
              No disponible
            </label>
          </div>
        <input type="submit" class="btn btn-primary" value="Registro">
    </form>
    <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
    </div>
@endsection
