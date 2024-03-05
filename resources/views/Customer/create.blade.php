@extends('layouts.navbar')

@section('content')
<section>
    <div class="container text-center mt-5 rounded">
        <h4>Registro</h4>
        <div class="row">
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
                        <label for="user_name">Documento</label>
                        <input type="number" class="form-control" name="document" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="type_user" id="" value="5" hidden>
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
                        <input type="submit" class="btn btn-primary my-2 " value="Registro">
                        <input type="reset" class="btn btn-danger my-2" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark my-2'>Volver</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
@endsection
