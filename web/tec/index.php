<html lang="es">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../styles/general.css">
    <script>

    </script>
    <script src="../scripts/menuAndAnimations.js"></script>
    <?php
        require("../../etc/config.php");
        require("../../etc/session.php");
    ?>
</head>
<body>
    <header>
        <?php
            echo "<h1>Portal de técnicos de Resolve+. Bienvenido " . $_SESSION['nombre'] . "</h1>\n";
        ?>
        <button onclick="abrirMenu()"><img src="../images/menu.png" alt="Abrir menú"></button>
    </header>
    <aside id="menuLateral" class="menuLateral">
        <button class="display-block" onclick="cerrarMenu()"><img src="../images/cerrar.png" alt="Cerrar menú"></button>
        <a href="authentication.php?accion=logout">Cerrar sesión</a>
        <a href="modify.php?tipo=usuario">Cambiar contraseña</a>
        <a href="">Gestión de incidencias</a>
        <a href="">Registrar un dispositivo</a>
        <a href="">Registrar una nueva empresa</a>
        <a href="">Registrar un usuario</a>
        <a href="">Registrar un nuevo técnico</a>
    </aside>
    <main>

    </main>
    <footer>

    </footer>
</body>
</html>