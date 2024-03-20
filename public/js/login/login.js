$('#login').click(function(){
    Swal.fire({
    position: "inherit",
    icon: "success",
    title: "Has iniciado sesion correctamente",
    showConfirmButton: false,
    timer: 2000
});})
function togglePasswordVisibility() {
    var passwordField = document.getElementById("password");
    var icon = document.getElementById("password-toggle-icon");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
