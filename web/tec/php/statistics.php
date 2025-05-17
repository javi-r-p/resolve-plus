<html lang="es">
<head>
    <title>Estadísticas</title>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../images/favicon.ico">
    <link rel="stylesheet" href="../../styles/general.css">
    <script src="../../scripts/formsAndCss.js"></script>
    <script src="../../scripts/htrequests.js"></script>
    <script src="../../scripts/menuAndAnimations.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="../../scripts/chartsStats.js"></script>
    <script>

    </script>
    <?php
        require("../../../etc/sessionTec.php");
        require("../../../etc/config.php");
        include("../../../etc/db_functions.php");
    ?>
</head>
<body>
    <header>
        <h1>Estadísticas</h1>
        <button onclick="abrirMenu()"><img src="../../images/menu.png" alt="Abrir menú"></button>
    </header>
    <aside id="menuLateral" class="menuLateral">
        <button class="display-block float-left"><a href="../authentication.php?accion=logout"><img src="../../images/logout.png" alt="Cerrar sesión"></a></button>
        <button class="display-block float-left"><a href="modify.php?tipo=Tecnico"><img src="../../images/password.png" alt="Cambiar contraseña"></a></button>
        <button class="display-block float-right" onclick="cerrarMenu()"><img src="../../images/close.png" alt="Cerrar menú"></button>
        <a href="../index.php">Página principal</a>
        <p>Gestión de dispositivos</p>
        <a href="registerForms.php?tipo=Dispositivo" class="margin-left">Registrar un dispositivo</a>
        <a href="view.php?tipo=Dispositivos" class="margin-left">Ver / modificar dispositivos registrados</a>
        <p>Gestión de empresas</p>
        <a href="registerForms.php?tipo=Empresa" class="margin-left">Registrar una empresa</a>
        <a href="view.php?tipo=Empresas" class="margin-left">Ver / modificar empresas registradas</a>
        <p>Gestión de usuarios</p>
        <a href="registerForms.php?tipo=Usuario" class="margin-left">Registrar un usuario</a>
        <a href="view.php?tipo=Usuarios" class="margin-left">Ver usuarios registrados</a>
        <p>Gestión de técnicos</p>
        <a href="registerForms.php?tipo=Tecnico" class="margin-left">Registrar un técnicos</a>
        <a href="view.php?tipo=Tecnicos" class="margin-left">Ver / modificar técnicos registrados</a>
        <a href="statistics.php">Estadísticas</a>
    </aside>
    <main>
        <section class="charts">
            <canvas id="incidenciasAreas"></canvas>
            <a href="">Generar informe</a>
        </section>
        <section class="charts">
            <canvas id="incidenciasUrgentes"></canvas>
            <a href="">Generar informe</a>
        </section>
    </main>
    <footer>
        
    </footer>
    <?php
        mysqli_close($bbdd);
    ?>
</body>
</html>