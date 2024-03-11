@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Actualizar</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('user.update',$user->document)}}" method="post">
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
                        <label for="type_user">Tipo Usuario</label>
                        <select name="type_user" class="form-select">
                            <option name="type_user" value="1">Cliente</option>
                            <option name="type_user" value="2">Administrador</option>
                            <option name="type_user" value="3">Recepcionista</option>
                            <option name="type_user" value="4">Mesero</option>
                            <option name="type_user"value="5">Roomservice</option>
                        </select>
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
                            <input type="text" class="form-control" name="phone" value="{{$user->password}}">


                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection

