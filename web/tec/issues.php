<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/forms.css">
    <script src="../scripts/formsAndCss.js"></script>
    <script src="../scripts/htrequests.js"></script>
    <script>

    </script>
    <?php
        require("../../etc/config.php");
        require("../../etc/sessionTec.php");
        include("../../etc/db_functions.php");
        echo "<title>";
        if (isset($_GET['ver'])) {
            $id = $_GET['id'];
            echo "Incidencia Nº$id";
        } else {
            echo "Incidencias";
        }
        echo "</title>\n";
    ?>
</head>
<body>
<header id="header">
    <h1>
    <?php
        if (isset($_GET['ver'])) {
            echo "Incidencia Nº$id";
        } else {
            echo "Incidencias";
        }
    ?>
    </h1>
</header>
<?php
    include("nav.php");
?>
<main>
    <?php
        if (isset($_GET['ver'])) {
            echo "<div class='viewFullIssue'>\n";
            $consulta = mysqli_query($bbdd, "SELECT ic.id AS 'idIncidencia', descripcion, urgente, fechaApertura, fechaCierreEsp, fechaCierre, estado, solucion, desplazamiento, us.nombre AS 'nombre', us.correo AS 'correo', us.telefono AS 'telefono', em.nombre AS 'razonSocial' FROM incidencias ic JOIN usuarios us ON ic.usuario = us.id JOIN empresas em ON us.empresa = em.id WHERE ic.id = $id");
            $incidencia = mysqli_fetch_array($consulta);
            echo "<h2>Datos de la incidencia</h2>\n";
            echo "<p>ID: " . $incidencia['idIncidencia'] . "</p>\n";
            echo "<p>Estado: ";
            if ($incidencia['estado'] == 1) {
                echo "abierta";
            } else {
                echo "cerrada";
            }
            echo "</p>\n";
            echo "<p>Urgente: ";
            if ($incidencia['urgente'] == 1) {
                echo "sí";
            } else {
                echo "no";
            }
            echo "</p>\n";
            echo "<p>Fecha apertura: " . date("d/m/Y", strtotime($incidencia['fechaApertura'])) . "</p>\n";
            echo "<p>Descripción: " . $incidencia['descripcion'] . "</p>\n";
            echo "<p>Fecha de cierre estimada: " . date("d/m/Y", strtotime($incidencia['fechaCierreEsp'])) . "</p>\n";
            if ($incidencia['estado'] == 0) {
                echo "<h4>Solución</h4>\n";
                echo "<p>Fecha de cierre: " . date("d/m/Y", strtotime($incidencia['fechaCierre'])) . "</p>\n";
                echo "<p>Desplazamiento: ";
                if ($incidencia['desplazamiento'] == 1) {
                    echo "sí";
                } else {
                    echo "no";
                }
                echo "</p>\n";
                echo "<p>Solución: " . $incidencia['solucion'] . "</p>\n";
            }
            echo "<br>\n";
            echo "<h3>Datos de contacto</h3>\n";
            echo "<p>Nombre: " . $incidencia['nombre'] . "</p>\n";
            echo "<p>Correo: " . $incidencia['correo'] . "</p>\n";
            echo "<p>Teléfono: " . $incidencia['telefono'] . "</p>\n";
            echo "<p>Empresa: " . $incidencia['razonSocial'] . "</p>\n";
            echo "<br>\n";
            echo "<h3>Áreas</h3>\n";
            $consultaAreas = mysqli_query($bbdd, "SELECT denominacion FROM areas INNER JOIN incidenciasAreas ON areas.id = area WHERE incidencia = $id");
            if (mysqli_num_rows($consultaAreas) == 0) {
                echo "<p>Esta incidencia no está asociada a ningún área.</p>\n";
            } else {
                echo "<ul>\n";
                while ($areas = mysqli_fetch_array($consultaAreas)) {
                    echo "<li>" . $areas['denominacion'] . "</li>\n";
                }
                echo "</ul>\n";
            }
            mysqli_free_result($consultaAreas);
            echo "<br>\n";
            echo "<h3>Dispositivos asociados</h3>\n";
            $consultaDispositivos = mysqli_query($bbdd, "SELECT id, marca, modelo, numeroProducto, COUNT(*) AS 'incidencias' FROM dispositivos INNER JOIN dispositivosIncidencias ON dispositivos.id = dispositivosIncidencias.dispositivo WHERE incidencia = $id GROUP BY id");
            if (mysqli_num_rows($consultaDispositivos) == 0) {
                echo "<p>Esta incidencia no está asociada a ningún dispositivo.</p>\n";
            } else {
                echo "<table class='viewTableSmall'>\n";
                echo "<tr>\n";
                echo "<th>ID</th>\n";
                echo "<th>Marca</th>\n";
                echo "<th>Modelo</th>\n";
                echo "<th>Número de producto</th>\n";
                echo "<th>Incidencias</th>\n";
                echo "</tr>\n";
                while ($dispositivos = mysqli_fetch_array($consultaDispositivos)) {
                    echo "<tr>\n";
                    echo "<td>" . $dispositivos['id'] . "</td>\n";
                    echo "<td>" . $dispositivos['marca'] . "</td>\n";
                    echo "<td>" . $dispositivos['modelo'] . "</td>\n";
                    echo "<td>" . $dispositivos['numeroProducto'] . "</td>\n";
                    echo "<td>" . $dispositivos['incidencias'] . "</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";
            }
            mysqli_free_result($consultaDispositivos);
            echo "<br>\n";
            echo "<h2 id='intervenciones'>Intervenciones</h2>\n";
            $consultaIntervenciones = mysqli_query($bbdd, "SELECT intervenciones.id  AS 'id', tecnicos.nombre AS 'tecnico', descripcion, fechaInicio, fechaFin, duracion FROM intervenciones INNER JOIN tecnicos ON intervenciones.tecnico = tecnicos.id WHERE incidencia = $id");
            if (mysqli_num_rows($consultaIntervenciones) == 0) {
                echo "<p>Esta incidencia no tiene ninguna intervención todavía.</p>\n";
            } else {
    ?>
    <table class="viewTableSmall w-80">
        <tr>
            <th>ID</th>
            <th>Técnico</th>
            <th>Fecha de inicio</th>
            <th>Fecha de fin</th>
            <th>Duración</th>
            <th>Descripción</th>
        </tr>
    <?php
                while ($intervenciones = mysqli_fetch_array($consultaIntervenciones)) {
                    echo "<tr>\n";
                    echo "<td>" . $intervenciones['id'] . "</td>\n";
                    echo "<td>" . $intervenciones['tecnico'] . "</td>\n";
                    echo "<td>" . date("d/m/Y", strtotime($intervenciones['fechaInicio'])) . "</td>\n";
                    echo "<td>" . date("d/m/Y", strtotime($intervenciones['fechaFin'])) . "</td>\n";
                    echo "<td>" . $intervenciones['duracion'] . "</td>\n";
                    echo "<td>" . $intervenciones['descripcion'] . "</td>\n";
                    echo "</tr>\n";
                }
                mysqli_free_result($consultaIntervenciones);
                echo "</table>\n<br>\n";
            }
            if ($incidencia['estado'] == 1) {
                $salida = "";
                if (isset($_POST['crearIntervencion'])) {
                    $idIntervencion = $_POST['id'];
                    $tecnico = $_SESSION['tecnico'];
                    $descripcion = $_POST['descripcion'];
                    $fechaInicio = $_POST['fechaInicio'];
                    $fechaFin = $_POST['fechaFin'];
                    $duracion = $_POST['duracion'];
                    $insertar = insertar("intervenciones", "INSERT INTO intervenciones VALUES ($idIntervencion, $tecnico, $id, '$descripcion', '$fechaInicio', '$fechaFin', '$duracion')", $idIntervencion);
                    if ($insertar) {
                        $salida = "Intervención creada";
                        header("Location: " . $_SERVER['PHP_SELF'] . "?id=$id&ver=true#intervenciones");
                    } elseif (!$insertar) {
                        $salida = "No se ha podido crear la intervención";
                    } else {
                        $salida = "Ya existe una intervención con este ID. Recarga la página y créala de nuevo.";
                    }
                }
    ?>
    <p>Si la incidencia solo require una intervención, puedes adjuntar la solución a la solución de la incidencia y cerrarla.</p>
    <br>
    <form action="<?php $_SERVER['PHP_SELF'] . "?id=" . $id . "&ver=true" ?>" method="POST" class="smallForm">
        <h4>Crear intervención</h4>
        <h4><?php echo $salida; ?></h4>
        <label>Identificador:</label><input type="text" name="id" value="<?php echo ultimoId("intervenciones") ?>" readonly>
        <br>
        <label>Descripción:</label><textarea name="descripcion" maxlength="2000"></textarea>
        <br>
        <label>Fecha de inicio:</label><input type="date" name="fechaInicio" value="<?php echo date('Y-m-d'); ?>">
        <br>
        <label>Fecha de fin:</label><input type="date" name="fechaFin" value="<?php echo date('Y-m-d'); ?>">
        <br>
        <label>Duración:</label><input type="time" name="duracion">
        <br>
        <input type="submit" name="crearIntervencion" value="Crear intervención">
    </form>
    <?php
            } else {
                echo "<h4>La incidencia ya está cerrada, por lo que no puedes crear nuevas intervenciones.</h4>\n";
            }
            echo "<br>\n";
            if ($incidencia['estado'] == 1) {
                echo "<h2>Cerrar incidencia</h2>\n";
                echo "<p>Si la incidencia solo require una intervención, puedes adjuntar la solución a la solución de la incidencia y cerrarla.</p>\n<br>\n";
                if (isset($_POST['cerrarIncidencia'])) {
                    $solucion = $_POST['solucion'];
                    $fechaCierre = $_POST['fechaCierre'];
                    $duracion = $_POST['duracion'];
                    if (!isset($_POST['desplazamiento'])) {
                        $desplazamiento = 0;
                    } else {
                        $desplazamiento = 1;
                    }
                    if (actualizar("UPDATE incidencias SET solucion = '$solucion', fechaCierre = '$fechaCierre', duracion = '$duracion', estado = 0 WHERE id = $id")) {
                        header("Location: " . $_SERVER['PHP_SELF'] . "?id=$id&ver=true");
                    }
                }
            $consultaDuracionTotal = mysqli_query($bbdd, "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duracion))) AS 'duracion' FROM intervenciones WHERE incidencia = $id");
            $duracionTotal = mysqli_fetch_array($consultaDuracionTotal);
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] . "?id=" . $id . "&ver=true" ?>" method="POST" class="smallForm">
        <label>Solución:</label><textarea name="solucion" placeholder="En este campo debes poner un resumen de todas las intervenciones de esta incidencia" required></textarea>
        <span class="check" >¿Desplazamiento?<input type="checkbox" name="desplazamiento"></span>
        <label>Fecha de cierre:</label><input type="date" name="fechaCierre" value="<?php echo date('Y-m-d'); ?>" readonly required>
        <label>Duración:</label><input type="time" name="duracion" value="<?php echo $duracionTotal['duracion']; ?>" required>
        <br>
        <input type="submit" name="cerrarIncidencia" value="Cerrar incidencia">
    </form>
    <?php
            }
            echo "</div>\n";
        } else {
            if (isset($_GET['todas']) AND $_GET['todas'] == "true") {
                echo "<h4>Se están mostrando todas las incidencias. <a href='" . $_SERVER['PHP_SELF'] . "'>Mostrar solo las abiertas</a></h4>\n";
                $instruccion = "SELECT ic.id AS 'id', us.nombre AS 'usuario', urgente, fechaApertura FROM incidencias ic INNER JOIN usuarios us ON us.id = ic.usuario ORDER BY urgente DESC, fechaApertura";
            } else {
                $instruccion = "SELECT ic.id AS 'id', us.nombre AS 'usuario', urgente, fechaApertura FROM incidencias ic INNER JOIN usuarios us ON us.id = ic.usuario WHERE estado = 1 ORDER BY urgente DESC, fechaApertura";
                echo "<h4>Solo se estrán mostrando las incidencias abiertas. <a href='" . $_SERVER['PHP_SELF'] . "?todas=true'>Mostrarlas todas</a></h4>\n";
            }
    ?>
    <table class="viewTable">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Urgente</th>
            <th>Fecha de apertura</th>
            <th>Gestionar</th>
        </tr>
    <?php
            $consulta = mysqli_query($bbdd, $instruccion);
            while ($incidencias = mysqli_fetch_array($consulta)) {
                echo "<tr>\n";
                echo "<td>" . $incidencias['id'] . "</td>\n";
                echo "<td>" . $incidencias['usuario'] . "</td>\n";
                if ($incidencias['urgente'] == 1) {
                    echo "<td class='red'>SÍ";
                } else {
                    echo "<td class='green'>NO";
                }
                echo "</td>\n";
                echo "<td>" . date("d/m/Y", strtotime($incidencias['fechaApertura'])) . "</td>\n";
                echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?id=" . $incidencias['id'] . "&ver=true'><img src='../images/visibility.png' alt='Ver'></a></td>\n";
                echo "</tr>\n";
            }
        }
    ?>
    </table>
</main>
<?php
    include("footer.php");
    mysqli_free_result($consulta);
    mysqli_close($bbdd);
?>
</body>
</html>