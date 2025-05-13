<html lang="es">
<head>
    <title>Portal de técnicos</title>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../styles/general.css">
    <script>

    </script>
    <script src="../scripts/menuAndAnimations.js"></script>
    <?php
        require("../../etc/config.php");
        require("../../etc/sessionTec.php");
        include("../../etc/db_functions.php");
    ?>
</head>
<body>
    <header>
        <h1>Portal de técnicos</h1>
        <button onclick="abrirMenu()"><img src="../images/menu.png" alt="Abrir menú"></button>
    </header>
    <aside id="menuLateral" class="menuLateral">
        <button class="display-block float-left"><a href="authentication.php?accion=logout"><img src="../images/logout.png" alt="Cerrar sesión"></a></button>
        <button class="display-block float-left"><a href="modify.php?tipo=tecnico"><img src="../images/password.png" alt="Cambiar contraseña"></a></button>
        <button class="display-block float-right" onclick="cerrarMenu()"><img src="../images/cerrar.png" alt="Cerrar menú"></button>
        <p>Gestión de dispositivos</p>
        <a href="registerForms.php?tipo=dispositivo" class="margin-left">Registrar un dispositivo</a>
        <a href="delete.php?tipo=dispositivo" class="margin-left">Eliminar un dispositivo</a>
        <a href="view.php?tipo=dispositivos" class="margin-left">Ver / modificar dispositivos registrados</a>
        <p>Gestión de empresas</p>
        <a href="registerForms.php?tipo=empresas" class="margin-left">Registrar una empresa</a>
        <a href="delete.php?tipo=empresas" class="margin-left">Eliminar una empresa</a>
        <a href="view.php?tipo=empresas" class="margin-left">Ver / modificar empresas registradas</a>
        <p>Gestión de usuarios</p>
        <a href="registerForms.php?tipo=usuario" class="margin-left">Registrar un usuario</a>
        <a href="delete.php?tipo=usuario" class="margin-left">Eliminar un usuario</a>
        <a href="view.php?tipo=usuario" class="margin-left">Ver usuarios registrados</a>
        <p>Gestión de técnicos</p>
        <a href="registerForms.php?tipo=tecnico" class="margin-left">Registrar un técnicos</a>
        <a href="delete.php?tipo=tecnico" class="margin-left">Eliminar un técnicos</a>
        <a href="view.php?tipo=tecnico" class="margin-left">Ver / modificar técnicos registrados</a>
    </aside>
    <main>

    </main>
    <footer>

    </footer>
</body>
</html>