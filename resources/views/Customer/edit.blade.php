@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Actualizar</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('user.update',$user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" required value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" name="last_name" required value="{{$user->last_name}}">
                    </div>
                    <div class="form-group">
                        <label for="user_name">Nombre de usuario</label>
                        <input type="text" class="form-control" name="user_name" placeholder="Ejemplo=persona123" value="{{$user->user_name}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="type_user" id="" value="1" hidden>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" required value="{{$user->password}}">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Registro">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection
