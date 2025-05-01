<html lang="es">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/general.css">
    <script>

    </script>
    <?php
        require("../../etc/config.php");
        require("../../etc/session.php");
    ?>
</head>
<body>
    <?php
        echo "<h1>Portal de técnicos de Resolve+. Bienvenido " . $_SESSION['nombre'] . "</h1>\n";
    ?>
    <a href="authentication.php?accion=logout">Cerrar sesión</a>
</body>
</html>