<html lang="es">
<head>
    <title>Resolve+ login</title>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
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
    include("../../phpmailer/sendmail.php");
    session_start();
    $error = "";
    if ($_GET['accion'] == "logout") {
        if (session_destroy()) {
            header("Location: " . $_SERVER['PHP_SELF'] . "?accion=login");
        }
    } else {
        if (isset($_POST['login'])) {
            $usuario = $_POST['usuario'];
            $contrasenia = hash('sha512', $_POST['contrasenia']);
            // Consultar credenciales introducidas por el usuario en la base de datos
            $consulta = mysqli_query($bbdd, "SELECT id,correo,contrasenia,nombre,nombreUsuario FROM tecnicos WHERE correo = '$usuario' AND contrasenia = '$contrasenia'");
            $datosTecnico = mysqli_fetch_array($consulta);
            if (mysqli_num_rows($consulta) == 1) {
                $consultaTecnicoBloqueado = mysqli_query($bbdd, "SELECT bloqueado FROM tecnicos WHERE id = '" . $datosTecnico['id'] . "'");
                $tecnicoBloqueado = mysqli_fetch_array($consultaTecnicoBloqueado);
                if ($tecnicoBloqueado['bloqueado'] == 0) {       
                    $_SESSION['correo'] = $datosTecnico['correo'];
                    $_SESSION['tecnico'] = $datosTecnico['id'];
                    $_SESSION['nombreUsuario'] = $datosTecnico['nombreUsuario'];
                    $_SESSION['nombre'] = $datosTecnico['nombre'];
                    header("Location: index.php");
                } else {
                    $error = "Acceso denegado";
                }
            } else {
                $error = "Credenciales incorrectas";
            }
        }
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
                        <input class="input100" type="text" name="usuario" placeholder="Correo electrónico" autocomplete="off">
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña" autocomplete="off"><img id="visibilidadContrasenia" src="../images/visibility.png" alt="Mostrar contraseña">
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
    <?php
        mysqli_close($bbdd);
    ?>
</body>
</html>