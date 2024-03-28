function descomponer(){
    const habitacionSeleccionada = document.querySelector('input[name="id_number"]:checked');
    const numero = habitacionSeleccionada.closest("tr").querySelector("#room").innerText;
    document.getElementById('id_number').value = numero;
    alert(numero);
};
