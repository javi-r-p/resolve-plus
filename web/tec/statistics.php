<html lang="es">
<head>
    <title>Estadísticas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/stats.css">
    <script src="../scripts/formsAndCss.js"></script>
    <script src="../scripts/htrequests.js"></script>
    <script src="../scripts/chartsStats.js"></script>
    <script src="../scripts/chartJS.js"></script>
    <script>

    </script>
    <?php
        require("../../etc/sessionTec.php");
        require("../../etc/config.php");
        include("../../etc/db_functions.php");
        $consultaNumeroIncidenciasEstado = mysqli_query($bbdd, "SELECT COUNT(*) AS 'totales', COUNT(CASE WHEN estado = 1 THEN 1 END) AS 'abiertas', COUNT(CASE WHEN estado = 0 THEN 1 END) AS 'cerradas' FROM incidencias");
        $numeroIncidenciasEstado = mysqli_fetch_array($consultaNumeroIncidenciasEstado);
        $consultaNumeroIncidenciasUrgencia = mysqli_query($bbdd, "SELECT COUNT(CASE WHEN urgente = 1 THEN 1 END) AS 'urgentes', COUNT(CASE WHEN urgente = 0 THEN 1 END) AS 'noUrgentes' FROM incidencias");
        $numeroIncidenciasUrgencia = mysqli_fetch_array($consultaNumeroIncidenciasUrgencia);
        $consultaNumeroIncidenciasUrgenciaEstado = mysqli_query($bbdd, "SELECT COUNT(CASE WHEN urgente = 1 THEN 1 END) AS 'urgentes', COUNT(CASE WHEN urgente = 0 THEN 1 END) AS 'noUrgentes' FROM incidencias WHERE estado = 1");
        $numeroIncidenciasUrgenciaEstado = mysqli_fetch_array($consultaNumeroIncidenciasUrgenciaEstado);
        ?>
</head>
<body>
<header id="header">
    <h1>Estadísticas</h1>
</header>
<?php
    include("nav.php");
?>
<main>
    <section>
        <h3>Incidencias totales</h3>
        <p>Hay <?php echo $numeroIncidenciasEstado['totales']; ?> incidencias registradas, <?php echo $numeroIncidenciasEstado['abiertas']; ?> abiertas y <?php echo $numeroIncidenciasEstado['cerradas']; ?> cerradas.</p>
        <p>De las incidencias totales, <?php echo $numeroIncidenciasUrgencia['urgentes']; ?> son urgentes y <?php echo $numeroIncidenciasUrgencia['noUrgentes']; ?> no urgentes.</p>
        <p>De las incidencias urgentes, <?php echo $numeroIncidenciasUrgenciaEstado['urgentes']; ?> de ellas están abiertas, y de las no urgentes, hay abiertas <?php echo $numeroIncidenciasUrgenciaEstado['noUrgentes']; ?>.</p>
    </section>
    <section class="charts chartsStats">
        <h3>Incidencias por área</h3>
        <canvas id="incidenciasAreas"></canvas>
    </section>
    <section class="charts chartsStats">
        <h3>Incidencias por criticidad</h3>
        <canvas id="incidenciasUrgentes"></canvas>
    </section>
    <hr>
    <section class="charts chartsStats">
        <h3>Incidencias por mes</h3>
        <canvas id="incidenciasMes"></canvas>
    </section>
    <section class="charts chartsStats">
        <h3>Incidencias por tipo de dispositivo</h3>
        <canvas id="incidenciasDispositivo"></canvas>
    </section>
</main>
<?php
    include("footer.php");
    mysqli_close($bbdd);
?>
</body>
</html>