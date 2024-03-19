@extends('layouts.navbar')

@section('content')

<section>
    <div class="container text-center mt-5 rounded">
        <h4>Registro</h4>
        <div class="row">
            <div class="col-xl-12">

                    <form class="needs-validation" action="{{route('user.store')}}" method="POST" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="typeDoc">Tipo de Documento</label>
                            <input type="text" class="form-control" name="typeDoc" required>
                            <div class="valid-feedback">
                                Todo bien
                            </div>
                            <div class="invalid-feedback">
                                Este campo es obligatorio
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="document">Documento</label>
                            <input type="number" class="form-control" name="document" required>
                            <div class="valid-feedback">
                                Todo bien
                            </div>
                            <div class="invalid-feedback">
                                Este campo es obligatorio y numerico
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control" name="type_user" id="" value="5" hidden>
                        </div>


                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" required>
                            <div class="valid-feedback">
                                Todo bien
                            </div>
                            <div class="invalid-feedback">
                                Este campo es obligatorio
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="last_name">Apellido</label>
                            <input type="text" class="form-control" name="last_name" required>
                            <div class="valid-feedback">
                                Todo bien
                            </div>
                            <div class="invalid-feedback">
                                Este campo es obligatorio
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required>
                            <div class="valid-feedback">
                                Todo bien
                            </div>
                            <div class="invalid-feedback">
                                Este campo es obligatorio y debe ser un email valido
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" required>
                            <div class="valid-feedback">
                                Todo bien
                            </div>
                            <div class="invalid-feedback">
                                Este campo es obligatorio y numerico
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password" required>
                            <div class="valid-feedback">
                                Todo bien
                            </div>
                            <div class="invalid-feedback">
                                Este campo es obligatorio
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password_confirm">Confirma contraseña</label>
                            <input type="password" class="form-control" name="password_confirm" required>
                            <div class="valid-feedback">
                                Todo bien
                            </div>
                            <div class="invalid-feedback">
                                Este campo es obligatorio
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-primary my-2 " value="Registro">
                            <input type="reset" class="btn btn-danger my-2" value="Cancelar">
                            <a href="javascript:history.back()" class='btn btn-dark my-2'>Volver</a>
                        </div>

                    </form>
                    <form action="{{ route('register.admin.create') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link">Registrar Administrador</button>
                        <script src="{{asset(js/registrarUsuarios/register.js)}}"></script>
                    </form>
            </div>

        </div>
    </div>
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()  
</script>


@endsection
