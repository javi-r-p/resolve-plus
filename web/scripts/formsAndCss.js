function updateTheme() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    if ((hours > 21 || (hours === 21 && minutes >= 15)) || hours < 7) {
        document.body.style.backgroundColor = "#121212";
        document.body.style.color = "#FFFFFF";
    }
}
updateTheme();
setInterval(updateTheme, 60000);
function mostrarCampos() {
    var valorSeleccionado = document.getElementById("seleccionDispositivo").value;
    var categorias = ["equipos", "impresoras", "moviles", "red", "otros"];

    categorias.forEach(categoria => {
        var fieldset = document.getElementById(categoria);
        if (fieldset) {
            fieldset.classList.add("hidden");
            Array.from(fieldset.querySelectorAll("input")).forEach(input => {
                input.disabled = true;
            });
            Array.from(fieldset.querySelectorAll("textarea")).forEach(textarea => {
                textarea.disabled = true;
            });
        }
    });

    if (valorSeleccionado) {
        var selectedFieldset = document.getElementById(valorSeleccionado);
        if (selectedFieldset) {
            selectedFieldset.classList.remove("hidden");
            Array.from(selectedFieldset.querySelectorAll("input")).forEach(input => {
                input.disabled = false;
            });
            Array.from(selectedFieldset.querySelectorAll("textarea")).forEach(textarea => {
                textarea.disabled = false;
            });
        }
    }
}
function mostrarContrasenia (tipo) {
    var imagen = document.getElementById("visibilidadContrasenia");
    var entrada = document.getElementById("contrasenia");
    if (entrada.type == "password") {
        if (tipo == "usuario") {
            imagen.src = "images/noVisibility.png";
        } else {
            imagen.src = "../images/noVisibility.png";
        }
        entrada.type = "text";
    } else {
        if (tipo == "usuario") {
            imagen.src = "images/visibility.png";
        } else {
            imagen.src = "../images/visibility.png";
        }
        entrada.type = "password";
    }
}
function crearNombreUsuario () {
    var correoElectronico = document.getElementById("correoElectronico").value;
    var nombreUsuario = correoElectronico.split("@")[0];
    document.getElementById("nombreUsuario").value = nombreUsuario;
}
function mostrarContrasenias (tipo) {
    var imagen = document.getElementById("visibilidadContrasenia");
    var imagen2 = document.getElementById("visibilidadContrasenia2");
    var entrada = document.getElementById("contrasenia");
    var entrada2 = document.getElementById("contrasenia2");
    if (entrada.type == "password" || entrada2.type == "password") {
        if (tipo == "usuario") {
            imagen.src = "images/noVisibility.png";
            imagen2.src = "images/noVisibility.png";
        } else {
            imagen.src = "../images/noVisibility.png";
            imagen2.src = "../images/noVisibility.png";
        }
        entrada.type = "text";
        entrada2.type = "text";
    } else {
        if (tipo == "usuario") {
            imagen.src = "images/visibility.png";
            imagen2.src = "images/visibility.png";
        } else {
            imagen.src = "../../images/visibility.png";
            imagen2.src = "../../images/visibility.png";
        }
        entrada.type = "password";
        entrada2.type = "password";
    }
}
function compararContrasenias() {
    var contrasenia = document.getElementById("contrasenia");
    var contrasenia2 = document.getElementById("contrasenia2");
    var salida = document.getElementById("salida");
    var enviarContrasenia = document.getElementById("enviarContrasenia");
    if (contrasenia.value != contrasenia2.value) {
        salida.innerHTML = "Las contraseñas no coinciden."
        enviarContrasenia.classList.add("hidden");
    } else {
        salida.innerHTML = ""
        enviarContrasenia.classList.remove("hidden");
    }
}