//Modal formulario editar
const btnAbrirModal = document.querySelector("#btn-abrir");
const btnCerrarModal = document.querySelector("#btn-cerrar");
const modal = document.querySelector("#modal");
const btnActualizar = document.querySelector("#btn-actualizar");


btnAbrirModal.addEventListener("click",()=>{
    modal.showModal();
})

btnCerrarModal.addEventListener("click",()=>{
    modal.close();
})

btnActualizar.addEventListener("click",()=>{

});


