/* The code you provided is a Blade template in a Laravel application. Let me explain what each part
does: */
@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Registro De Cama</h4>
        <div class="row">
            <div class="col-xl-12">
                <form id="bedForm" action="{{ route('beds.store') }}" method="post">
                    @csrf

/* The code snippet you provided is a form field for entering the "Numero Habitacion" (Room Number) in
a registration form for a bed. Let's break down what each part does: */
                    <div class="form-group">
                        <label for="id_number">Numero Habitacion</label>
                        <input type="text" class="form-control" name="id_number" placeholder="Escriba el número de habitación" required>
                        @error('id_numbers')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

/* This code snippet is creating a form field for entering the "Descripción" (Description) in a
registration form for a bed. Let's break down what each part does: */
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="Escriba la descripción" value="{{ old('descripcion') }}" required>
                        @error('descripcion')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

/* This code snippet is creating a section within the form for the bed registration that includes three
elements: */
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Registro" id="submitButton">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('submitButton').addEventListener('click', function(event) {
            event.preventDefault(); //Evita que el formulario se envíe automáticamente

            //Recupera los valores de los campos del formulario
            var idNumber = document.querySelector('input[name="id_number"]').value;
            var descripcion = document.querySelector('input[name="descripcion"]').value;

            //Crea el mensaje de confirmación con la información ingresada
            var confirmMessage = "¿Estás seguro de registrar esta cama?\n\n" +
                                 "Número de habitación: " + idNumber + "\n" +
                                 "Descripción: " + descripcion;

            //Muestra la alerta con el mensaje de confirmación
            if (confirm(confirmMessage)) {
                document.getElementById('bedForm').submit(); //Envía el formulario si se confirma la acción
            }
        });
    </script>
@endsection
