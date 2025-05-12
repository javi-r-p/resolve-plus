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
        <button class="display-block" onclick="cerrarMenu()"><img src="../images/cerrar.png" alt="Cerrar menú"></button>
        <a href="authentication.php?accion=logout">Cerrar sesión</a>
        <a href="modify.php?tipo=tecnico">Cambiar contraseña</a>
        <a>Gestión de dispositivos</a>
        <a href="registerForms.php?tipo=dispositivo" class="padding-left">Registrar un dispositivo</a>
        <a href="delete.php?tipo=dispositivo" class="padding-left">Eliminar un dispositivo</a>
        <a href="view.php?tipo=dispositivos" class="padding-left">Ver dispositivos registrados</a>
        <a>Gestión de empresas</a>
        <a href="registerForms.php?tipo=empresas" class="padding-left">Registrar una empresa</a>
        <a href="delete.php?tipo=empresas" class="padding-left">Eliminar una empresa</a>
        <a href="view.php?tipo=empresas" class="padding-left">Ver empresas registradas</a>
        <a href="registerForms.php?tipo=usuario">Registrar un usuario</a>
        <a href="registerForms.php?tipo=tecnico">Registrar un nuevo técnico</a>
    </aside>
    <main>

    </main>
    <footer>

    </footer>
</body>
</html>