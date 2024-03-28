@extends('layouts.navbar')

@section('content')

<section>
    <div class="container text-center mt-5 rounded">
        <h4>Registro</h4>
        <div class="row">
            <div class="col-xl-12">

                <form class="needs-validation" action="{{ route('user.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="typeDoc">Tipo de Documento</label>
                        <select class="form-control" name="typeDoc" value="{{ old('typeDoc') }}" required>
                            <option value="">Seleccionar Tipo de Documento</option>
                            <option value="Cedula Ciudadana">Cedula Ciudadana</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Cedula Extranjera">Cedula Extranjera</option>
                            <option value="Documento Nacional de Identidad">Documento Nacional de Identidad</option>
                        </select>
                        <div class="valid-feedback">
                            Todo bien
                        </div>
                        <div class="invalid-feedback">
                            Por favor, selecciona un tipo de documento
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="document">Documento</label>
                        <input type="number" class="form-control" name="document" value="{{ old('document') }}" required>
                        <div class="valid-feedback">
                            Todo bien
                        </div>
                        <div class="invalid-feedback">
                            Este campo es obligatorio y numérico
                        </div>
                    </div>


                    <div class="form-group">
                        <input type="text" class="form-control" name="type_user" id="" value="5" hidden>
                    </div>


                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        <div class="valid-feedback">
                            Todo bien
                        </div>
                        <div class="invalid-feedback">
                            Este campo es obligatorio
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                        <div class="valid-feedback">
                            Todo bien
                        </div>
                        <div class="invalid-feedback">
                            Este campo es obligatorio
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        <div class="valid-feedback">
                            Todo bien
                        </div>
                        <div class="invalid-feedback">
                            Este campo es obligatorio y debe ser un email válido
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                        <div class="valid-feedback">
                            Todo bien
                        </div>
                        <div class="invalid-feedback">
                            Este campo es obligatorio y numérico
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                        </div>
                        <div class="valid-feedback">
                            Todo bien
                        </div>
                        <div class="invalid-feedback">
                            Este campo es obligatorio
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="password_confirmation">Confirma contraseña</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="valid-feedback">
                            Todo bien
                        </div>
                        <div class="invalid-feedback">
                            Las contraseñas no coinciden
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
                    <script src="{{ asset('js/registrarUsuarios/register.js') }}"></script>
                </form>
            </div>

        </div>
    </div>
</section>
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

    function validatePassword() {
        var password = document.querySelector('input[name="password"]');
        var confirmPassword = document.querySelector('input[name="password_confirmation"]');

        if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity("Las contraseñas no coinciden");
        } else {
            confirmPassword.setCustomValidity('');
        }
    }

    // Agregar un event listener para verificar la contraseña cuando cambie
    document.addEventListener('DOMContentLoaded', function () {
        var confirmPassword = document.querySelector('input[name="password_confirmation"]');
        confirmPassword.addEventListener('input', validatePassword);
    });

    function togglePasswordVisibility(button) {
        var passwordField = button.parentNode.previousElementSibling;
        if (passwordField.type === "password") {
            passwordField.type = "text";
            button.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
        } else {
            passwordField.type = "password";
            button.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
        }
    }
</script>

@endsection
