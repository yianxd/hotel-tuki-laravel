@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Registro</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('customer.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="user_name">Nombre de usuario</label>
                        <input type="text" class="form-control" name="user_name" placeholder="Ejemplo=persona123">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="type_user" id="" value="1" hidden>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="registration_date">Fecha de registro</label>
                        <input type="date" class="form-control" name="registration_date">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Registro">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
