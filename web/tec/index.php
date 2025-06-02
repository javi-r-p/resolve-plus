<html lang="es">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/stats.css">
    <script src="../scripts/chartsDashboard.js"></script>
    <script src="../scripts/chartJS.js"></script>
    <script>

    </script>
    <?php
        require("../../etc/config.php");
        include("../../etc/sessionTec.php");
        $consultaNumeroIncidencias = mysqli_query($bbdd, "SELECT COUNT(*) AS 'totales', COUNT(CASE WHEN urgente = 1 THEN 1 END) AS 'urgentes', COUNT(CASE WHEN urgente = 0 THEN 1 END) AS 'noUrgentes' FROM incidencias WHERE estado = 1");
        $numeroIncidencias = mysqli_fetch_array($consultaNumeroIncidencias);
        $consultaIncidenciasAntiguas = mysqli_query($bbdd, "SELECT COUNT(*) as 'totales' FROM incidencias WHERE fechaApertura < DATE_SUB(NOW(), INTERVAL 4 DAY) AND estado = 1");
        $incidenciasAntiguas = mysqli_fetch_array($consultaIncidenciasAntiguas);
        $consultaIncidenciasActuales = mysqli_query($bbdd, "SELECT COUNT(*) as 'totales' FROM incidencias WHERE fechaApertura = NOW() AND estado = 1");
        $incidenciasActuales = mysqli_fetch_array($consultaIncidenciasActuales);
        $consultaIncidenciasActualesCerradas = mysqli_query($bbdd, "SELECT COUNT(*) as 'totales' FROM incidencias WHERE fechaCierre = '" . date("Y-m-d") . "' AND estado = 0");
        $incidenciasActualesCerradas = mysqli_fetch_array($consultaIncidenciasActualesCerradas);
    ?>
</head>
<body>
<header id="header">
    <h1 class="center">Dashboard</h1>
</header>
<?php
    include("nav.php");
?>
<main>
    <section class="dataContainer">
        <section class="data">
            <span>Incidencias abiertas</span>
            <span class="numbers"><?php echo $numeroIncidencias['totales'] ?></span>
        </section>
        <section class="data">
            <span>Incidencias abiertas hoy</span>
            <span class="numbers"><?php echo $incidenciasActuales['totales']; ?></span>
        </section>
        <section class="data">
            <span>Incidencias abiertas más de 4 días</span>
            <span class="numbers"><?php echo $incidenciasAntiguas['totales']; ?></span>
        </section>
        <section class="data">
            <span>Incidencias cerradas hoy</span>
            <span class="numbers"><?php echo $incidenciasActualesCerradas['totales']; ?></span>
        </section>
    </section>
    <section class="charts">
        <p>Incidencias por área</p>
        <canvas id="incidenciasAreas"></canvas>
    </section>
    <section class="charts">
        <p>Incidencias por criticidad</p>
        <canvas id="incidenciasUrgentes"></canvas>
    </section>
    <section class="charts">
        <p>Incidencias por tipo de dispositivo</p>
        <canvas id="incidenciasDispositivo"></canvas>
    </section>
</main>
<?php
    include("footer.php");
?>
</body>
</html>