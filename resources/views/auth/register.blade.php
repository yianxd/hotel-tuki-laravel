@extends('layouts.navbar')

@section('content')
<Section>
   <form action="{{ route('user.store') }}" method="post">
    @csrf

    @if (session('mensaje'))
        <h6>{{ session('mensaje') }}</h6>
    @endif
    <div class="container text-center mt-5 rounded">
        <h4>Registro</h4>
        <div class="row text-center">
            <div class="col-xl-12">
                <form action="{{route('customer.store')}}" method="post">
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
                        <input type="date" class="form-control" name="registration_date" >
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
</Section>
@endsection
