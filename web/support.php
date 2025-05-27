<html lang="es">
<head>
    <title>Resolve+</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="styles/general.css">
    <script src="scripts/htrequests.js"></script>
    <script src="scripts/menuAndAnimations.js"></script>
    <?php
    require("../etc/session.php");
    require("../etc/config.php");
    include("../etc/db_functions.php");
    ?>
</head>
<body>
    <header id="header" class="body">
        <button onclick="abrirMenu()"><img src="images/menu.png" alt="Abrir menú"></button>
        <h1 class="inline">Bienvenido a Resolve+ <em><?php echo $_SESSION['nombre']; ?></em></h1>
    </header>
    <aside id="menuLateral" class="menuLateral">
        <button class="display-block" onclick="cerrarMenu()"><img src="images/close.png" alt="Cerrar menú"></button>
        <a href="authentication.php?accion=logout">Cerrar sesión</a>
        <a href="php/modify.php?tipo=Usuario">Cambiar contraseña</a>
        <a href="request.php">Solicitar el alta de un dispositivo</a>
    </aside>
    <main id="main" class="body">
        <h2>Registrar una incidencia</h2>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            
        </form>
    </main>
    <br>
    <footer id="footer" class="body">
        <p>Página desarrollada bajo la licencia GPL 2.0</p>
    </footer>
    <?php
    mysqli_close($bbdd);
    ?>
</body>
</html>