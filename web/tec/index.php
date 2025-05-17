<html lang="es">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../styles/general.css">
    <script src="../scripts/menuAndAnimations.js"></script>
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
        $consultaIncidenciasAntiguas = mysqli_query($bbdd, "SELECT COUNT(*) as 'conteo' FROM incidencias WHERE fechaApertura < DATE_SUB(NOW(), INTERVAL 4 DAY) AND estado = 1");
        $incidenciasAntiguas = mysqli_fetch_array($consultaIncidenciasAntiguas);
    ?>
</head>
<body>
    <header>
        <h1>Dashboard</h1>
        <button onclick="abrirMenu()"><img src="../images/menu.png" alt="Abrir menú"></button>
    </header>
    <aside id="menuLateral" class="menuLateral">
        <button class="display-block float-left"><a href="authentication.php?accion=logout"><img src="../images/logout.png" alt="Cerrar sesión"></a></button>
        <button class="display-block float-left"><a href="php/modify.php?tipo=Tecnico"><img src="../images/password.png" alt="Cambiar contraseña"></a></button>
        <button class="display-block float-right" onclick="cerrarMenu()"><img src="../images/close.png" alt="Cerrar menú"></button>
        <a href="index.php">Dashboard</a>
        <p>Gestión de dispositivos</p>
        <a href="php/registerForms.php?tipo=Dispositivo" class="margin-left">Registrar un dispositivo</a>
        <a href="php/view.php?tipo=Dispositivos" class="margin-left">Ver dispositivos registrados</a>
        <p>Gestión de empresas</p>
        <a href="php/registerForms.php?tipo=Empresa" class="margin-left">Registrar una empresa</a>
        <a href="php/view.php?tipo=Empresa" class="margin-left">Ver empresas registradas</a>
        <p>Gestión de usuarios</p>
        <a href="php/registerForms.php?tipo=Usuario" class="margin-left">Registrar un usuario</a>
        <a href="php/view.php?tipo=Usuario" class="margin-left">Ver usuarios registrados</a>
        <p>Gestión de técnicos</p>
        <a href="php/registerForms.php?tipo=Tecnico" class="margin-left">Registrar un técnicos</a>
        <a href="php/view.php?tipo=Tecnico" class="margin-left">Ver técnicos registrados</a>
        <a href="php/statistics.php">Estadísticas</a>
    </aside>
    <main>
        <section>
            <p>Hay <?php echo $numeroIncidencias['totales'] ?> incidencias abierta/s, <?php echo $numeroIncidencias['urgentes'] ?> urgente/s, y  <?php echo $numeroIncidencias['noUrgentes'] ?> no urgente/s.</p>
            <hr>
            <p>Hay <?php echo $incidenciasAntiguas['conteo'] ?> incidencia/s abiertas más de 4 días.</p>
        </section>
        <section class="charts">
            <canvas id="incidenciasAreas"></canvas>
        </section>
        <section class="charts">
            <canvas id="incidenciasUrgentes"></canvas>
        </section>
        <section id="listadoIncidencias">
            <h2>Listado de incidencias</h2>
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
    <footer>
        <p>Página desarrollada bajo la licencia GPL2.0</p>
    </footer>
</body>
</html>