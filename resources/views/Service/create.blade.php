@extends('layouts.navbar')

@section('title', 'Crear Nuevo Servicio')

@section('content')
    <h1>Crear Nuevo Servicio</h1>
    <form class="form-control" action="{{ route('service.store') }}" method="POST" >
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="name">Nombre</label>
            <input  type="text" name="name" class="form-control" value="{{old('name')}}">
            @error('name')
                <br>
                <small style="color:red">{{$message}} </small>
            @enderror
            <label class="form-label" for="value">Valor</label>
            <input type="text" class="form-control"  name="value" required value="{{old('value')}}">
            @error('value')
                <br>
                <small style="color:red">{{$message}} </small>
            @enderror
            <label class="form-label" for="description">Descripcion</label>
            <input type="textarea" class="form-control" name="description" value="{{old('description')}}" rows="3">
            @error('description')
                <br>
                <small style="color:red">{{$message}} </small>
            @enderror
            <input type="text" class="form-control " name="disponibility" hidden value="1">
            <input type="submit" class="btn btn-primary" value="Registro">
        </form>
        <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
        </div>
@endsection
