@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h4>Actualizar Cama</h4>
        <div class="row">
            <div class="col-xl-12">
               /* The code snippet you provided is creating a form in a Laravel Blade template for
               updating a bed entry. Let me break down the purpose of each part of the form: */
                <form id="updateBedForm" action="{{ route('beds.update', $bed->id) }}" method="post">
                    @csrf
                    @method('PUT')

/* The code snippet you provided is creating a form input field for updating the "Numero Habitacion"
(Room Number) of a bed entry. Let's break down the purpose of each part of this specific form input
field: */
                    <div class="form-group">
                        <label for="id_number">Numero Habitacion</label>
                        <input type="text" class="form-control" name="id_number" placeholder="Escriba el número de habitación" required value="{{ $bed->id_number }}">
                    </div>

/* The code snippet you provided is creating a form input field for updating the "Descripción"
(Description) of a bed entry. Let's break down the purpose of each part of this specific form input
field: */
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="Escriba la descripción" required value="{{ $bed->descripcion }}">
                    </div>

/* This part of the code snippet is creating a section within the form for the user to interact with
buttons. Let's break down the purpose of each element within this section: */
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Actualizar" id="submitButton">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <a href="javascript:history.back()" class='btn btn-dark'>Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('submitButton').addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el formulario se envíe automáticamente

            // Recupera los valores de los campos del formulario
            var idNumber = document.querySelector('input[name="id_number"]').value;
            var descripcion = document.querySelector('input[name="descripcion"]').value;

            // Crea el mensaje de confirmación con la información ingresada
            var confirmMessage = "¿Estás seguro de actualizar esta cama?\n\n" +
                                 "Número de habitación: " + idNumber + "\n" +
                                 "Descripción: " + descripcion;

            // Muestra la alerta con el mensaje de confirmación
            if (confirm(confirmMessage)) {
                document.getElementById('updateBedForm').submit(); // Envía el formulario si se confirma la acción
            }
        });
    </script>
@endsection
