<html lang="es">
<head>
    <title>Resolve+</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/forms.css">
    <script src="scripts/htrequests.js"></script>
    <script src="scripts/formsAndCss.js"></script>
    <?php
    require("../etc/session.php");
    require("../etc/config.php");
    include("../etc/db_functions.php");
    ?>
</head>
<body>
<header>
    <h1>Soporte Resolve+</h1>
</header>
<nav>
    <a href="index.php">Soporte</a>
    <a href="authentication.php?accion=logout">Cerrar sesión</a>
    <!-- <a href="index.php?modificar=true">Cambiar contraseña</a> -->
</nav>
<main>
    <?php
        $salida = "";
        if (isset($_GET['modificar'])) {

        }
        if (isset($_POST['registrarIncidencia'])) {
            $descripcion = $_POST['descripcion'];
            if (!isset($_POST['urgente'])) {
                $urgente = 0;
            } else {
                $urgente = 1;
            }
            $fechaApertura = $_POST['fechaApertura'];
            $fechaCierreEsp = date('Y-m-d', strtotime('+7 days'));
            $idIncidencia = ultimoId("incidencias");
            $insertar = insertar("incidencias", "INSERT INTO incidencias (id, descripcion, fechaApertura, fechaCierreEsp, urgente, usuario) VALUES ($idIncidencia, '$descripcion', '$fechaApertura', '$fechaCierreEsp', $urgente" . $_SESSION['usuario'] . ")", $idIncidencia);
            if ($insertar) {
                $salida = "Incidencia creada";
            } elseif (!$insertar) {
                $salida = "No se ha podido crear la incidencia";
            } else {
                $salida = "Ya existe una incidencia con ese ID. Recarga la página e inténtalo de nuevo.";
            }
        }
    ?>
    <div class="viewFullIssue">
        <h2>Registrar una incidencia</h2>
        <br>
        <h3><?php echo $salida; ?></h3>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="smallForm">
            <label>Descripción:</label><textarea name="descripcion" required placeholder="Escribe una descripción acerca de la incidencia."></textarea>
            <br>
            <span class="check"><input type="checkbox" name="urgente">  Urgente</span>
            <label>Fecha de apertura: </label><input type="date" name="fechaApertura" value="<?php echo date('Y-m-d'); ?>" readonly>
            <label>Fecha estimada de cierre: </label><input type="date" name="fechaCierreEsp" value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" readonly>
            <br><br>
            <!-- <p>Áreas:</p> -->
            <?php
                // $consultaAreas = mysqli_query($bbdd, "SELECT id, denominacion FROM areas");
                // while ($areas = mysqli_fetch_array($consultaAreas)) {
                //     echo "<span class='check'><input type='checkbox' name='" . $areas['denominacion'] . "'>  " . $areas['denominacion'] . "</span>\n<br>\n";
                // }
            ?>
            <br>
            <!-- <p>Dispositivos afectados:</p> -->
            <?php
                // $consultaDispositivos = mysqli_query($bbdd, "SELECT id, marca, modelo, numeroSerie, numeroProducto FROM dispositivos WHERE empresa = " . $_SESSION['empresa']);
                // while ($dispositivos = mysqli_fetch_array($consultaDispositivos)) {
                //     echo "<span class='check'><input type='checkbox' name='" . $dispositivos['id'] . "'>  " . $dispositivos['marca'] . " " . $dispositivos['modelo'] . "</span>\n<br>\n";
                // }
            ?>
            <input type="submit" name="registrarIncidencia" value="Registrar incidencia">
        </form>
        <!-- <br>
        <h2>Solicitar el alta de un dispositivo</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    
        </form> -->
    </div>
</main>
<br>
<footer>
    <p>Has iniciado sesión como <?php echo $_SESSION['nombre'] . " (" . $_SESSION['nombreUsuario'] . ")"; ?></p>
    <br>
    <p>Contacto: <a href="mailto:contacto.resolvepluses@gmail.com">contacto.resolvepluses@gmail.com</a></p>
</footer>
<?php
mysqli_close($bbdd);
?>
</body>
</html>