<html lang="es">
<head>
    <title>Modificar datos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../images/favicon.ico">
    <link rel="stylesheet" href="../../styles/general.css">
    <script src="../../scripts/formsAndCss.js"></script>
    <script src="../../scripts/htrequests.js"></script>
    <script src="../../scripts/menuAndAnimations.js"></script>
    <script>
        window.onload = function() {
            document.getElementById("visibilidadContrasenia").onclick = mostrarContrasenias;
            document.getElementById("visibilidadContrasenia2").onclick = mostrarContrasenias;
            document.getElementById("contrasenia").oninput = compararContrasenias;
            document.getElementById("contrasenia2").oninput = compararContrasenias;
        }
    </script>
    <?php
        require("../../../etc/sessionTec.php");
        require("../../../etc/config.php");
        include("../../../etc/db_functions.php");
    ?>
</head>
<body>
    <header>
        <h1>Modificar datos del técnico <?php echo $_SESSION['nombre']; ?></h1>
    </header>
    <nav>
        <hr>
        <strong><a href="../index.php">Dashboard</a></strong>
        <hr>
        <p>Gestión</p>
        <hr class="sameType">
        <a href="management.php?tipo=Dispositivos">Dispositivos</a>
        <a href="management.php?tipo=Usuarios">Usuarios</a>
        <a href="management.php?tipo=Empresas">Empresas</a>
        <a href="management.php?tipo=Tecnicos">Técnicos</a>
        <hr>
        <p>Otros</p>
        <hr class="sameType">
        <a href="statistics.php">Estadísticas</a>
        <hr>
    </nav>
    <main>
        <?php
            if ($_GET['tipo'] == "tecnico") {
                if (isset($_POST['modificar'])) {
                    $contrasenia = hash('sha512', $_POST['contrasenia']);
                    $contrasenia2 = hash('sha512', $_POST['contrasenia2']);
                    $id = $_SESSION['usuario'];
                    if ($contrasenia != $contrasenia2) {
                        echo "<h2 id='salida'>Las contraseñas no coinciden.</h2>\n";
                        echo "<a href='php/modify.php?tipo=Tecnico'>Volver a modificación de perfil</a>\n";
                    } else {
                        $modificacion = mysqli_query($bbdd, "UPDATE usuarios SET contrasenia = '$contrasenia' WHERE id = '$id'");
                        if ($modificacion) {
                            echo "<h2>Contraseña actualizada correctamente.</h2>";
                            echo "<a href='index.php'>Volver a la página principal</a>\n";
                        } else {
                            echo "<h2>La contraseña no se ha podido actualizar. Inténtalo de nuevo más tarde.</h2>";
                            echo "<a href='php/modify.php?tipo=Tecnico'>Volver a modificación de perfil</a>\n";
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