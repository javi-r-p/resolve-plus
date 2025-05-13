<html lang="es">
    <head>
        <title>Modificar datos</title>
        <meta charset="UTF-8">
        <meta viewport="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../images/favicon.ico">
        <link rel="stylesheet" href="../styles/general.css">
        <script src="../scripts/formsAndCss.js"></script>
        <script src="../scripts/menuAndAnimations.js"></script>
        <script>
            window.onload = function() {
                document.getElementById("visibilidadContrasenia").onclick = mostrarContrasenias;
                document.getElementById("visibilidadContrasenia2").onclick = mostrarContrasenias;
                document.getElementById("contrasenia").oninput = compararContrasenias;
                document.getElementById("contrasenia2").oninput = compararContrasenias;
            }
        </script>
        <?php
            require("../../etc/sessionTec.php");
            require("../../etc/config.php");
        ?>
    </head>
    <body>
        <header>
            <h1>Modificar datos del técnico <?php echo $_SESSION['nombre']; ?></h1>
            <button onclick="abrirMenu()"><img src="../images/menu.png" alt="Abrir menú"></button>
        </header>
        <aside id="menuLateral" class="menuLateral">
            <button class="display-block float-left"><a href="authentication.php?accion=logout"><img src="../images/logout.png" alt="Cerrar sesión"></a></button>
            <button class="display-block float-left"><a href="modify.php?tipo=tecnico"><img src="../images/password.png" alt="Cambiar contraseña"></a></button>
            <button class="display-block float-right" onclick="cerrarMenu()"><img src="../images/cerrar.png" alt="Cerrar menú"></button>
            <p>Gestión de dispositivos</p>
            <a href="registerForms.php?tipo=dispositivo" class="margin-left">Registrar un dispositivo</a>
            <a href="delete.php?tipo=dispositivo" class="margin-left">Eliminar un dispositivo</a>
            <a href="view.php?tipo=dispositivos" class="margin-left">Ver / modificar dispositivos registrados</a>
            <p>Gestión de empresas</p>
            <a href="registerForms.php?tipo=empresas" class="margin-left">Registrar una empresa</a>
            <a href="delete.php?tipo=empresas" class="margin-left">Eliminar una empresa</a>
            <a href="view.php?tipo=empresas" class="margin-left">Ver / modificar empresas registradas</a>
            <p>Gestión de usuarios</p>
            <a href="registerForms.php?tipo=usuario" class="margin-left">Registrar un usuario</a>
            <a href="delete.php?tipo=usuario" class="margin-left">Eliminar un usuario</a>
            <a href="view.php?tipo=usuario" class="margin-left">Ver usuarios registrados</a>
            <p>Gestión de técnicos</p>
            <a href="registerForms.php?tipo=tecnico" class="margin-left">Registrar un técnicos</a>
            <a href="delete.php?tipo=tecnico" class="margin-left">Eliminar un técnicos</a>
            <a href="view.php?tipo=tecnico" class="margin-left">Ver / modificar técnicos registrados</a>
        </aside>
        <main>
            <?php
                if ($_GET['tipo'] == "tecnico") {
                    if (isset($_POST['modificar'])) {
                        $contrasenia = hash('sha512', $_POST['contrasenia']);
                        $contrasenia2 = hash('sha512', $_POST['contrasenia2']);
                        $id = $_SESSION['usuario'];
                        if ($contrasenia != $contrasenia2) {
                            echo "<h2 id='salida'>Las contraseñas no coinciden.</h2>\n";
                            echo "<a href='modify.php?tipo=usuario'>Volver a modificación de perfil</a>\n";
                        } else {
                            $modificacion = mysqli_query($bbdd, "UPDATE usuarios SET contrasenia = '$contrasenia' WHERE id = '$id'");
                            if ($modificacion) {
                                echo "<h2>Contraseña actualizada correctamente.</h2>";
                                echo "<a href='index.php'>Volver a la página principal</a>\n";
                            } else {
                                echo "<h2>La contraseña no se ha podido actualizar. Inténtalo de nuevo más tarde.</h2>";
                                echo "<a href='modify.php?tipo=tecnico'>Volver a modificación de perfil</a>\n";
                            }
                        }
                    } else {
            ?>
                        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                            <label>Contraseña: </label><input oninput="" type="password" name="contrasenia" id="contrasenia"><img id="visibilidadContrasenia" src="../images/visibility.png" alt="Mostrar contraseña">
                            <br>
                            <label>Confirmar contraseña: </label><input type="password" name="contrasenia2" id="contrasenia2"><img id="visibilidadContrasenia2" src="../images/visibility.png" alt="Mostrar contraseña">
                            <br>
                            <input type="submit" id="enviarContrasenia" class="hidden" name="modificar" value="Modificar contraseña">
                        </form>
                        <p id="salida"></p>
            <?php
                    }
                } else {
                    die();
                }
            ?>
        </main>
    </body>
</html>