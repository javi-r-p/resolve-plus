<!DOCTYPE html>
<html lang="es">

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/stats.css">
    <link rel="stylesheet" href="../styles/responsive.css">
    <script src="../scripts/chartsDashboard.js"></script>
    <script src="../scripts/chartJS.js"></script>
    <script>
    </script>
    <?php
    // Cargar configuración y sesión
    require("../../etc/config.php");
    include("../../etc/sessionTec.php");

    // Consultar incidencias abiertas (totales, urgentes, no urgentes)
    $consultaNumeroIncidencias = mysqli_query($bbdd, "SELECT COUNT(*) AS 'totales', COUNT(CASE WHEN urgente = 1 THEN 1 END) AS 'urgentes', COUNT(CASE WHEN urgente = 0 THEN 1 END) AS 'noUrgentes' FROM incidencias WHERE estado = 1");
    $numeroIncidencias = mysqli_fetch_array($consultaNumeroIncidencias);

    // Consultar incidencias abiertas hace más de 4 días
    $consultaIncidenciasAntiguas = mysqli_query($bbdd, "SELECT COUNT(*) as 'totales' FROM incidencias WHERE fechaApertura < DATE_SUB(NOW(), INTERVAL 4 DAY) AND estado = 1");
    $incidenciasAntiguas = mysqli_fetch_array($consultaIncidenciasAntiguas);

    // Consultar incidencias abiertas hoy
    $consultaIncidenciasActuales = mysqli_query($bbdd, "SELECT COUNT(*) as 'totales' FROM incidencias WHERE fechaApertura = NOW() AND estado = 1");
    $incidenciasActuales = mysqli_fetch_array($consultaIncidenciasActuales);

    // Consultar incidencias cerradas hoy
    $consultaIncidenciasActualesCerradas = mysqli_query($bbdd, "SELECT COUNT(*) as 'totales' FROM incidencias WHERE fechaCierre = '" . date("Y-m-d") . "' AND estado = 0");
    $incidenciasActualesCerradas = mysqli_fetch_array($consultaIncidenciasActualesCerradas);
    ?>
</head>

<body>
    <?php
    // Incluir barra de navegación
    include("nav.php");
    ?>
    <main>
        <h2>Datos</h2>
        <section class="dataContainer">
            <!-- Mostrar incidencias abiertas -->
            <section class="data">
                <span>Incidencias abiertas</span>
                <span class="numbers"><?php echo $numeroIncidencias['totales'] ?></span>
            </section>
            <!-- Mostrar incidencias abiertas hoy -->
            <section class="data">
                <span>Incidencias abiertas hoy</span>
                <span class="numbers"><?php echo $incidenciasActuales['totales']; ?></span>
            </section>
            <!-- Mostrar incidencias abiertas hace más de 4 días -->
            <section class="data">
                <span>Incidencias abiertas más de 4 días</span>
                <span class="numbers"><?php echo $incidenciasAntiguas['totales']; ?></span>
            </section>
            <!-- Mostrar incidencias cerradas hoy -->
            <section class="data">
                <span>Incidencias cerradas hoy</span>
                <span class="numbers"><?php echo $incidenciasActualesCerradas['totales']; ?></span>
            </section>
        </section>
        <!-- Gráficos de incidencias -->
        <div class="charts">
            <p>Incidencias por área</p>
            <canvas id="incidenciasAreas"></canvas>
        </div>
        <div class="charts">
            <p>Incidencias por criticidad</p>
            <canvas id="incidenciasUrgentes"></canvas>
        </div>
        <h2>Dispositivos pendientes de aprobar</h2>
        <?php
        // Activar dispositivo si se envía el formulario correspondiente
        if (isset($_POST['activar']) && isset($_POST['activar_id'])) {
            $id = intval($_POST['activar_id']);
            $update = "UPDATE dispositivos SET activo = 1 WHERE id = $id";
            if (mysqli_query($bbdd, $update)) {
                echo "<h3 class='ok'>Dispositivo activado correctamente.</h3>";
            } else {
                echo "<h3 class='error'>Error al activar el dispositivo: " . mysqli_error($bbdd) . "</h3>";
            }
        }
        // Eliminar dispositivo si se envía el formulario correspondiente
        if (isset($_POST['eliminar']) && isset($_POST['eliminar_id'])) {
            $id = intval($_POST['eliminar_id']);
            $delete = "DELETE FROM dispositivos WHERE id = $id";
            if (mysqli_query($bbdd, $delete)) {
                echo "<h3 class='ok'>Dispositivo eliminado correctamente.</h3>";
            } else {
                echo "<h3 class='error'>Error al eliminar el dispositivo: " . mysqli_error($bbdd) . "</h3>";
            }
        }
        // Consultar dispositivos inactivos
        $consulta = "SELECT * FROM dispositivos WHERE activo = 0";
        $resultado = mysqli_query($bbdd, $consulta);
        if (mysqli_num_rows($resultado) > 0) {
            // Mostrar tabla de dispositivos pendientes de aprobar
            echo "<table class='viewTable'>\n";
            echo "<tr>\n";
            echo "<th>ID</th>\n";
            echo "<th>Empresa</th>\n";
            echo "<th>Número de Serie</th>\n";
            echo "<th>Número de Producto</th>\n";
            echo "<th>Marca</th>\n";
            echo "<th>Modelo</th>\n";
            echo "<th>Acción</th>\n";
            echo "</tr>\n";
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<tr>\n";
                echo "<td>{$fila['id']}</td>\n";
                echo "<td>{$fila['empresa']}</td>\n";
                echo "<td>{$fila['numeroSerie']}</td>\n";
                echo "<td>{$fila['numeroProducto']}</td>\n";
                echo "<td>{$fila['marca']}</td>\n";
                echo "<td>{$fila['modelo']}</td>\n";
                echo "<td>\n";
                // Formulario para activar dispositivo
                echo "<form method='post' action=''>\n";
                echo "<input type='hidden' name='activar_id' value='{$fila['id']}'>\n";
                echo "<input type='submit' name='activar' value='Activar'>\n";
                echo "</form>\n";
                // Formulario para eliminar dispositivo
                echo "<form method='post' action=''>\n";
                echo "<input type='hidden' name='eliminar_id' value='{$fila['id']}'>\n";
                echo "<input type='submit' name='eliminar' value='Eliminar'>\n";
                echo "</form>\n";
                echo "</td>\n";
                echo "</tr>\n";
            }
            echo "</table>";
        } else {
            // No hay dispositivos inactivos
            echo "<h3 class='error'>No hay dispositivos inactivos.</h3>";
        }
        ?>
    </main>
</body>

</html>