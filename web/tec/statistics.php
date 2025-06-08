<!DOCTYPE html>
<html lang="es">

<head>
    <title>Estadísticas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/stats.css">
    <link rel="stylesheet" href="../styles/responsive.css">
    <script src="../scripts/formsAndCss.js"></script>
    <script src="../scripts/htrequests.js"></script>
    <script src="../scripts/chartsStats.js"></script>
    <script src="../scripts/chartJS.js"></script>
    <script>

    </script>
    <?php
    // Incluir archivos de sesión, configuración y funciones de base de datos
    require("../../etc/sessionTec.php");
    require("../../etc/config.php");
    include("../../etc/db_functions.php");

    // Consulta para obtener el número total de incidencias, abiertas y cerradas
    $consultaNumeroIncidencias = mysqli_query($bbdd, "SELECT COUNT(*) AS 'totales', COUNT(CASE WHEN estado = 1 THEN 1 END) AS 'abiertas', COUNT(CASE WHEN estado = 0 THEN 1 END) AS 'cerradas' FROM incidencias");
    $numeroIncidencias = mysqli_fetch_array($consultaNumeroIncidencias);

    // Consulta para obtener la media de intervenciones por incidencia
    $consultaMediaIntervenciones = mysqli_query($bbdd, "SELECT ROUND(COUNT(*) / COUNT(DISTINCT incidencia)) AS 'media' FROM intervenciones");
    $mediaIntervenciones = mysqli_fetch_array($consultaMediaIntervenciones);
    ?>
</head>

<body>
    <?php
    // Incluir barra de navegación
    include("nav.php");
    ?>
    <main>
        <section class="dataContainer">
            <section class="data">
                <span>Incidencias abiertas</span>
                <!-- Mostrar número de incidencias abiertas -->
                <span class="numbers"><?php echo $numeroIncidencias['abiertas']; ?></span>
            </section>
            <section class="data">
                <span>Incidencias cerradas</span>
                <!-- Mostrar número de incidencias cerradas -->
                <span class="numbers"><?php echo $numeroIncidencias['cerradas']; ?></span>
            </section>
            <section class="data">
                <span>Incidencias totales</span>
                <!-- Mostrar número total de incidencias -->
                <span class="numbers"><?php echo $numeroIncidencias['totales']; ?></span>
            </section>
            <section class="data">
                <span>Media de intervenciones por incidencia</span>
                <!-- Mostrar media de intervenciones por incidencia -->
                <span class="numbers"><?php echo $mediaIntervenciones['media']; ?></span>
            </section>
        </section>
        <div class="charts">
            <p>Incidencias por área</p>
            <!-- Gráfico de incidencias por área -->
            <canvas id="incidenciasAreas"></canvas>
        </div>
        <div class="charts">
            <p>Incidencias por criticidad</p>
            <!-- Gráfico de incidencias por criticidad -->
            <canvas id="incidenciasUrgentes"></canvas>
        </div>
        <div class="charts">
            <p>Incidencias por mes</p>
            <!-- Gráfico de incidencias por mes -->
            <canvas id="incidenciasMes"></canvas>
        </div>
        <div class="charts">
            <p>5 técnicos con más intervenciones</p>
            <!-- Gráfico de los 5 técnicos con más intervenciones -->
            <canvas id="intervenciones5Tecnicos"></canvas>
        </div>
    </main>
    <?php
    // Cerrar conexión con la base de datos
    mysqli_close($bbdd);
    ?>
</body>

</html>