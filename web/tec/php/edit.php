<html lang="es">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="styles/general.css">
    <script src="scripts/formsAndCss.js"></script>
    <script src="scripts/htrequests.js"></script>
    <script src="scripts/menuAndAnimations.js"></script>
    <script>

    </script>
    <?php
    ?>
</head>
<body>
    <header>
        <h1>Editar <?php echo strtolower($_GET['tipo']); ?></h1>
        <button onclick="abrirMenu()"><img src="../../images/menu.png" alt="Abrir menú"></button>
    </header>
    <aside id="menuLateral" class="menuLateral">
        <button class="display-block float-left"><a href="../authentication.php?accion=logout"><img src="../../images/logout.png" alt="Cerrar sesión"></a></button>
        <button class="display-block float-left"><a href="modify.php?tipo=Tecnico"><img src="../../images/password.png" alt="Cambiar contraseña"></a></button>
        <button class="display-block float-right" onclick="cerrarMenu()"><img src="../../images/close.png" alt="Cerrar menú"></button>
        <a href="../index.php">Dashboard</a>
        <p>Gestión de dispositivos</p>
        <a href="registerForms.php?tipo=Dispositivos" class="margin-left">Registrar un dispositivo</a>
        <a href="view.php?tipo=Dispositivos" class="margin-left">Ver / modificar dispositivos registrados</a>
        <p>Gestión de empresas</p>
        <a href="registerForms.php?tipo=Empresas" class="margin-left">Registrar una empresa</a>
        <a href="view.php?tipo=Empresas" class="margin-left">Ver / modificar empresas registradas</a>
        <p>Gestión de usuarios</p>
        <a href="registerForms.php?tipo=Usuarios" class="margin-left">Registrar un usuario</a>
        <a href="view.php?tipo=Usuarios" class="margin-left">Ver usuarios registrados</a>
        <p>Gestión de técnicos</p>
        <a href="registerForms.php?tipo=Tecnicos" class="margin-left">Registrar un técnicos</a>
        <a href="view.php?tipo=Tecnicos" class="margin-left">Ver / modificar técnicos registrados</a>
        <a href="statistics.php">Estadísticas</a>
    </aside>
    <main>

    </main>
    <footer>
        
    </footer>
    <?php
        mysqli_close($bbdd);
    ?>
</body>
</html>