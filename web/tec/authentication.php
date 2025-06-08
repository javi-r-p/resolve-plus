<!DOCTYPE html>
<html lang="es">
<head>
<title>Resolve+ login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="../images/favicon.ico">
<link rel="stylesheet" href="../styles/auth.css">
<script src="../scripts/formsAndCss.js"></script>
<script>
    window.onload = function() {
        document.getElementById("visibilidadContrasenia").onclick = mostrarContrasenia;
    }
</script>
<?php
// Archivo de conexión a la base de datos
require("../../etc/config.php");
// Iniciar una nueva sesión
session_start();
$error = "";
if (isset($_GET['accion']) AND $_GET['accion'] == "logout") { // Si el parámetro que recibe el archivo via GET es logout, se cierra la sesión y se redirige a la página de inicio de sesión
    if (session_destroy()) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?accion=login");
    }
} else { // En este caso se utiliza else en vez de elseif para que por defecto se muestre el formulario de inicio de sesión
    if (isset($_POST['login'])) { // Si la clave login de $_POST está establecida, se procesarán los datos del formulario
        $correo = mysqli_real_escape_string($bbdd, $_POST['correo']);
        $contrasenia = hash('sha512', mysqli_real_escape_string($bbdd, $_POST['contrasenia'])); // Crear hash en SHA512 de la contraseña que el técnico ha introducido en el formulario para después compararla con el hash de la base de datos
        // Consultar credenciales introducidas por el técnico en la base de datos
        $consultaDatosTecnico = mysqli_query($bbdd, "SELECT id, correo, contrasenia, nombre, bloqueado FROM tecnicos WHERE correo = '$correo' AND contrasenia = '$contrasenia'");
        $datosTecnico = mysqli_fetch_array($consultaDatosTecnico);
        if (mysqli_num_rows($consultaDatosTecnico) == 1) {
            if ($datosTecnico['bloqueado'] == 0) { // Si no está bloqueado, se crean varias variables de sesión
                $_SESSION['correo'] = $datosTecnico['correo'];
                $_SESSION['tecnico'] = $datosTecnico['id'];
                $_SESSION['nombre'] = $datosTecnico['nombre'];
                $_SESSION['accesoQueries'] = 1;
                if (isset($_SESSION['redireccion'])) { // Se redirige al técnico a la página que solicitara desde un principio
                    $redireccion = $_SESSION['redireccion'];
                    unset($_SESSION['redireccion']);
                    header("Location: $redireccion");
                } else { // Si no solicitó ninguna página en concreto, se redirige a la principal: index.php
                    header("Location: index.php");
                }
            } elseif ($datosTecnico['bloqueado'] == 1) { // Si el técnico está bloqueado, se muestra un mensaje
                $error = "Acceso denegado";
            }
        } else {
            $error = "Credenciales incorrectas"; // Se muestra un error si las credenciales son incorrectas
        }
        mysqli_free_result($consultaDatosTecnico); // Liberar memoria del resultado de la consulta
    }
    mysqli_close($bbdd); // Cerrar conexión con la base de datos
}
?>
</head>
<body>
<!-- Formulario de inicio de sesión -->
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <span class="login100-form-title p-b-26">Portal de técnicos Resolve+</span>
                <div class="wrap-input100">
                    <input class="input100" type="text" name="correo" placeholder="Correo electrónico">
                </div>
                <div class="wrap-input100">
                    <input class="input100" type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña"><img id="visibilidadContrasenia" src="../images/visibility.png" alt="Mostrar contraseña" onclick="mostrarContrasenia('tecnico')">
                </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <input type="submit" name="login" value="Iniciar sesión" class="login100-form-btn">
                    </div>
                    <?php echo "<span class='error'>$error</span>\n"; ?>
                    <a href="../index.php">Acceso al portal de usuarios</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>