<html lang="es">
    <head>
        <title>Modificar datos</title>
        <meta charset="UTF-8">
        <meta viewport="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../images/favicon.ico">
        <link rel="stylesheet" href="../styles/general.css">
        <script src="../scripts/formsAndCss.js"></script>
        <script>
            window.onload = function() {
                document.getElementById("visibilidadContrasenia").onclick = mostrarContrasenias;
                document.getElementById("visibilidadContrasenia2").onclick = mostrarContrasenias;
                document.getElementById("contrasenia").oninput = compararContrasenias;
                document.getElementById("contrasenia2").oninput = compararContrasenias;
            }
        </script>
        <?php
            require("session.php");
            require("../config/config.php");
        ?>
    </head>
    <body>
        <header>
            <h3 class="inline">Modificar datos del usuario <?php echo $_SESSION['nombreUsuario']; ?></h3>
            <button class="generalButton float-right"><a href="../authentication.php?accion=logout">Cerrar sesión</a></button>
            <button class="generalButton float-right"><a href="../index.php">Página principal</a></button>
        </header>
        <main>

        </main>
        <?php
            if ($_GET['tipo'] == "usuario") {
                if (isset($_POST['modificar'])) {
                    $contrasenia = hash('sha256', $_POST['contrasenia']);
                    $contrasenia2 = hash('sha256', $_POST['contrasenia2']);
                    $id = $_SESSION['usuario'];
                    if ($contrasenia != $contrasenia2) {
                        echo "<h2 id='salida'>Las contraseñas no coinciden.</h2>\n";
                        echo "<a href='modify.php?tipo=usuario'>Volver a modificación de perfil</a>\n";
                    } else {
                        $modificacion = mysqli_query($bbdd, "UPDATE usuarios SET contrasenia = '$contrasenia' WHERE id = '$id'");
                        if ($modificacion) {
                            echo "<h2>Contraseña actualizada correctamente.</h2>";
                            echo "<a href='../index.php'>Volver a la página principal</a>\n";
                        } else {
                            echo "<h2>La contraseña no se ha podido actualizar. Inténtalo de nuevo más tarde.</h2>";
                            echo "<a href='modify.php?tipo=usuario'>Volver a modificación de perfil</a>\n";
                        }
                    }
                } else {
        ?>
                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                        <label>Contraseña: </label><input type="password" name="contrasenia" id="contrasenia"><img id="visibilidadContrasenia" src="../images/visible.png" alt="Mostrar contraseña">
                        <br>
                        <label>Confirmar contraseña: </label><input type="password" name="contrasenia2" id="contrasenia2"><img id="visibilidadContrasenia2" src="../images/visible.png" alt="Mostrar contraseña">
                        <br>
                        <input type="submit" id="enviarContrasenia" class="hidden" name="modificar" value="Modificar contraseña">
                    </form>
                    <p id="salida"></p>
                    <p>Para modificar otros datos, consulte con soporte técnico.</p>
        <?php
                }
            } else {
                die();
            }
        ?>
    </body>
</html>