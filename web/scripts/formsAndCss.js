// Muestra u oculta los campos según la categoría seleccionada
function mostrarCampos() {
    var valorSeleccionado = document.getElementById("seleccionDispositivo").value;
    var categorias = ["equipos", "impresoras", "moviles", "red", "otros"];
    categorias.forEach(categoria => {
        var fieldset = document.getElementById(categoria);
        if (fieldset) {
            // Oculta el fieldset y deshabilita sus inputs y textareas
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
            // Muestra el fieldset seleccionado y habilita sus inputs y textareas
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

// Cambia la visibilidad de la contraseña (mostrar/ocultar)
function mostrarContrasenia(tipo) {
    var imagen = document.getElementById("visibilidadContrasenia");
    var entrada = document.getElementById("contrasenia");
    if (entrada.type == "password") {
        // Cambia el ícono y muestra la contraseña
        if (tipo == "usuario") {
            imagen.src = "images/noVisibility.png";
        } else {
            imagen.src = "../images/noVisibility.png";
        }
        entrada.type = "text";
    } else {
        // Cambia el ícono y oculta la contraseña
        if (tipo == "usuario") {
            imagen.src = "images/visibility.png";
        } else {
            imagen.src = "../images/visibility.png";
        }
        entrada.type = "password";
    }
}

// Crea un nombre de usuario a partir del correo electrónico
function crearNombreUsuario(contrasenia) {
    var correoElectronico = document.getElementById("correoElectronico").value;
    var nombre = correoElectronico.split("@")[0];
    if (contrasenia) {
        document.getElementById("contrasenia").value = nombre;
    }
}

// Cambia la visibilidad de dos campos de contraseña (mostrar/ocultar)
function mostrarContrasenias(tipo) {
    var imagen = document.getElementById("visibilidadContrasenia");
    var imagen2 = document.getElementById("visibilidadContrasenia2");
    var entrada = document.getElementById("contrasenia");
    var entrada2 = document.getElementById("contrasenia2");
    if (entrada.type == "password" || entrada2.type == "password") {
        // Cambia los íconos y muestra ambas contraseñas
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
        // Cambia los íconos y oculta ambas contraseñas
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

// Compara dos contraseñas y muestra un mensaje si no coinciden
function compararContrasenias() {
    var contrasenia = document.getElementById("contrasenia");
    var contrasenia2 = document.getElementById("contrasenia2");
    var salida = document.getElementById("salida");
    var enviarContrasenia = document.getElementById("enviarContrasenia");
    if (contrasenia.value != contrasenia2.value) {
        salida.innerHTML = "Las contraseñas no coinciden."
        enviarContrasenia.disabled = true;
    } else {
        salida.innerHTML = ""
        enviarContrasenia.disabled = false;
    }
}

// Expande dinámicamente el tamaño de un textarea según su contenido
function expandirTextarea(id) {
    var campo = document.getElementById(id);
    campo.style.height = "auto";
    campo.style.height = campo.scrollHeight + 30 + "px";
}

// Función vacía para añadir un dispositivo (por implementar)
function aniadirDispositivo() {
    
}

// Cuenta los caracteres de un campo y muestra el conteo en otro elemento
function contarCaracteres(id, salida) {
    var campo = document.getElementById(id).value;
    var caracteres = campo.length;
    var conteo = document.getElementById(salida);
    conteo.innerHTML = caracteres;
}