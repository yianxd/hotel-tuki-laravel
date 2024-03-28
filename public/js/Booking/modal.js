//Modal formulario editar
const btnAbrirModal = document.querySelector("#btn-abrir");
const btnCerrarModal = document.querySelector("#btn-cerrar");
const modal = document.querySelector("#modal");
const btnActualizar = document.querySelector("#Actualizar");

btnAbrirModal.addEventListener("click", () => {
    modal.showModal();
});

btnCerrarModal.addEventListener("click", () => {
    modal.close();
});

btnActualizar.addEventListener("click", () => {

    //toma los datos de la habitacion seleccionada en el modal y busca el numero de habitacion
    const habitacionSeleccionada = document.querySelector('input[name="room"]:checked');
    const numero = habitacionSeleccionada.closest("tr").querySelector("#id_number").innerText;
    const capacidad = habitacionSeleccionada.closest("tr").querySelector("#capacity").innerText;
    const tipo = habitacionSeleccionada.closest("tr").querySelector("#type_room").innerText;


    //actualiza los datos de la tabla
    const numeroElemento = document.querySelector("#numero-habitacion");
    const capacidadElemento = document.querySelector("#capacidad-habitacion");
    const tipoElemento = document.querySelector("#tipo-habitacion");




    numeroElemento.innerText = numero;
    capacidadElemento.innerText = capacidad;
    tipoElemento.innerText = tipo;
    //da un value al input
    document.getElementById('id_number').value = numero;

    modal.close()


});
