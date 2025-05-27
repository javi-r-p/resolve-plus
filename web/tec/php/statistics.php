<html lang="es">
<head>
    <title>Estadísticas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../images/favicon.ico">
    <link rel="stylesheet" href="../../styles/general.css">
    <script src="../../scripts/formsAndCss.js"></script>
    <script src="../../scripts/htrequests.js"></script>
    <script src="../../scripts/menuAndAnimations.js"></script>
    <script src="../../scripts/chartsStats.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>

    </script>
    <?php
        require("../../../etc/sessionTec.php");
        require("../../../etc/config.php");
        include("../../../etc/db_functions.php");
        $consultaNumeroIncidenciasEstado = mysqli_query($bbdd, "SELECT COUNT(*) AS 'totales', COUNT(CASE WHEN estado = 1 THEN 1 END) AS 'abiertas', COUNT(CASE WHEN estado = 0 THEN 1 END) AS 'cerradas' FROM incidencias");
        $numeroIncidenciasEstado = mysqli_fetch_array($consultaNumeroIncidenciasEstado);
        $consultaNumeroIncidenciasUrgencia = mysqli_query($bbdd, "SELECT COUNT(CASE WHEN urgente = 1 THEN 1 END) AS 'urgentes', COUNT(CASE WHEN urgente = 0 THEN 1 END) AS 'noUrgentes' FROM incidencias");
        $numeroIncidenciasUrgencia = mysqli_fetch_array($consultaNumeroIncidenciasUrgencia);
        $consultaNumeroIncidenciasUrgenciaEstado = mysqli_query($bbdd, "SELECT COUNT(CASE WHEN urgente = 1 THEN 1 END) AS 'urgentes', COUNT(CASE WHEN urgente = 0 THEN 1 END) AS 'noUrgentes' FROM incidencias WHERE estado = 1");
        $numeroIncidenciasUrgenciaEstado = mysqli_fetch_array($consultaNumeroIncidenciasUrgenciaEstado);
        ?>
</head>
<body>
    <header>
        <button class="display-block float-right"><a href="../authentication.php?accion=logout"><img src="../../images/logout.png" alt="Cerrar sesión"></a></button>
        <button class="display-block float-right"><a href="modify.php?tipo=Tecnico"><img src="../../images/password.png" alt="Cambiar contraseña"></a></button>
    </header>
    <nav>
        <hr>
        <a href="../index.php">Dashboard</a>
        <hr>
        <p>Gestión</p>
        <hr class="sameType">
        <a href="management.php?tipo=Dispositivos">Gestión de dispositivos</a>
        <a href="management.php?tipo=Usuarios">Gestión de usuarios</a>
        <a href="management.php?tipo=Empresas">Gestión de empresas</a>
        <a href="management.php?tipo=Tecnicos">Gestión de técnicos</a>
        <hr>
        <p>Otros</p>
        <hr class="sameType">
        <strong><a href="statistics.php">Estadísticas</a></strong>
        <hr>
    </nav>
    <main class="w-88">
        <section>
            <h3>Incidencias totales</h3>
            <p>Hay <?php echo $numeroIncidenciasEstado['totales']; ?> incidencias registradas, <?php echo $numeroIncidenciasEstado['abiertas']; ?> abiertas y <?php echo $numeroIncidenciasEstado['cerradas']; ?> cerradas.</p>
            <p>De las incidencias totales, <?php echo $numeroIncidenciasUrgencia['urgentes']; ?> son urgentes y <?php echo $numeroIncidenciasUrgencia['noUrgentes']; ?> no urgentes.</p>
            <p>De las incidencias urgentes, <?php echo $numeroIncidenciasUrgenciaEstado['urgentes']; ?> de ellas están abiertas, y de las no urgentes, hay abiertas <?php echo $numeroIncidenciasUrgenciaEstado['noUrgentes']; ?>.</p>
        </section>
        <h4><a href="pdf.php?tipo=Incidencias" target="_blank">Generar un informe de incidencias</a></h4>
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
    <footer>
        
    </footer>
    <?php
        mysqli_close($bbdd);
    ?>
</body>
</html>