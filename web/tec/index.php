<html lang="es">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../styles/general.css">
    <!-- <script src="../scripts/menuAndAnimations.js"></script> -->
    <script src="../scripts/chartsDashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>

    </script>
    <?php
        require("../../etc/config.php");
        require("../../etc/sessionTec.php");
        include("../../etc/db_functions.php");
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
    <header>
        <h1>Dashboard</h1>
        <button class="display-block float-right"><a href="authentication.php?accion=logout"><img src="../images/logout.png" alt="Cerrar sesión"></a></button>
        <button class="display-block float-right"><a href="php/modify.php?tipo=Tecnico"><img src="../images/password.png" alt="Cambiar contraseña"></a></button>
    </header>
    <nav>
        <hr>
        <a href="index.php">Dashboard</a>
        <hr>
        <p>Gestión</p>
        <hr class="sameType">
        <a href="php/management.php?tipo=Dispositivos">Dispositivos</a>
        <a href="php/management.php?tipo=Usuarios">Usuarios</a>
        <a href="php/management.php?tipo=Empresas">Empresas</a>
        <a href="php/management.php?tipo=Tecnicos">Técnicos</a>
        <hr>
        <p>Otros</p>
        <hr class="sameType">
        <a href="php/statistics.php">Estadísticas</a>
        <hr>
    </nav>
    <main class="w-88">
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
        <section id="listadoIncidencias">
            <h2>Incidencias</h2>
            <button class="display-block float-right"><a href="php/view.php?tipo=Incidencias"><img src="../images/unfold.png" alt="Expandir"></a></button>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Urgente</th>
                    <th>Fecha de apertura</th>
                </tr>
            <?php
                $consultaIncidencias = mysqli_query($bbdd, "SELECT id, urgente, fechaApertura FROM incidencias WHERE estado = 1 ORDER BY urgente DESC, id");
                while ($incidencias = mysqli_fetch_array($consultaIncidencias)) {
                    echo "<tr>\n";
                    echo "<td>" . $incidencias['id'] . "</td>\n";
                    if ($incidencias['urgente'] == 1) {
                        echo "<td>SÍ</td>\n";
                    } else {
                        echo "<td>NO</td>\n";
                    }
                    echo "<td>" . date_format(date_create($incidencias['fechaApertura']), "d/m/Y") . "</td>\n";
                    echo "</tr>\n";
                }
            ?>
            </table>
        </section>
    </main>
    <footer class="w-88">
        <p>Página desarrollada bajo la licencia GPL2.0</p>
    </footer>
</body>
</html>