
// Función para enviar la solicitud AJAX al registrar la asistencia
function registrarAsistencia() {
    var form = document.getElementById("attendanceForm");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("attendanceTableContainer").innerHTML = this.responseText;
        }
    };
    xhr.open("POST", "register.php", true);
    xhr.send(formData);
}

// Agregar un evento al formulario para enviar la solicitud AJAX al hacer clic en el botón de registro
document.getElementById("attendanceForm").addEventListener("submit", function (event) {
    event.preventDefault(); 
    registrarAsistencia();
});
