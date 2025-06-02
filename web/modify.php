<html lang="es">
<head>
    <title>Modificar datos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="styles/general.css">
    <script src="scripts/formsAndCss.js"></script>
    <script>
        window.onload = function() {
            document.getElementById("visibilidadContrasenia").onclick = mostrarContrasenias;
            document.getElementById("visibilidadContrasenia2").onclick = mostrarContrasenias;
            document.getElementById("contrasenia").oninput = compararContrasenias;
            document.getElementById("contrasenia2").oninput = compararContrasenias;
        }
    </script>
    <?php
        require("../etc/session.php");
        require("../etc/config.php");
        include("../etc/db_functions.php");
    ?>
</head>
<body>
<header>
    <h1>Cambiar contraseña</h1>
</header>
<nav>
    <a href="support.php">Soporte</a>
    <a href="authentication.php?accion=logout">Cerrar sesión</a>
    <a href="modify.php">Cambiar contraseña</a>
</nav>
<main>
    <?php
        $error = "";
        if (isset($_POST['modificar'])) {
            $contrasenia = hash('sha512', $_POST['contrasenia']);
            $contrasenia2 = hash('sha512', $_POST['contrasenia2']);
            $id = $_SESSION['usuario'];
            if ($contrasenia != $contrasenia2) {
                echo "<h2 id='salida'>Las contraseñas no coinciden.</h2>\n";
            } else {
                if (actualizar("UPDATE usuarios SET contrasenia = '" . $contrasenia . "' WHERE id = $id")) {
                    $error = "Contraseña actualizada";

                } else {
                    $error = "La contraseña no se ha podido actualizar. Inténtalo de nuevo más tarde.";
                }
            }
        }
    ?>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label>Contraseña: </label><input type="password" name="contrasenia" id="contrasenia"><img id="visibilidadContrasenia" src="../images/visibility.png" alt="Mostrar contraseña">
        <br>
        <label>Confirmar contraseña: </label><input type="password" name="contrasenia2" id="contrasenia2"><img id="visibilidadContrasenia2" src="../images/visibility.png" alt="Mostrar contraseña">
        <br>
        <input type="submit" id="enviarContrasenia" name="modificar" value="Modificar contraseña" readonly>
    </form>
    <p><?php echo $error; ?></p>
    <p id="salida"></p>
    <p>Para modificar otros datos, consulte con soporte técnico.</p>
    <?php
    mysqli_close($bbdd);
    ?>
</main>
</body>
</html>