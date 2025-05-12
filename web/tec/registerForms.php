<html lang="es">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../styles/general.css">
    <script src="../scripts/formsAndCss.js"></script>
    <script src="../scripts/htrequests.js"></script>
    <script>

    </script>
    <?php
        require("../../etc/sessionTec.php");
        require("../../etc/config.php");
        include("../../etc/db_functions.php");
    ?>
</head>
<body>
    <?php
        if (!isset($_GET['tipo']) OR empty($_GET['tipo'])) {
            echo "<h3>Parámetros inválidos</h3>\n";
            echo "<a href='index.php'>Volver a la página de inicio</a>\n";
        } elseif ($_GET['tipo'] == "dispositivo") {
    ?>
    <form method="POST" action="../php/register.php?tipo=dispositivo">
        <label>Identificador: </label><input type="text" name="id" value="<?php echo ultimoId("dispositivos"); ?>" readonly>
        <br>
        <label>Empresa: </label><input type="text" name="empresa">
        <br>
        <label>Número de serie: </label><input type="text" name="numeroSerie">
        <br>
        <label>Número de producto: </label><input type="text" name="numeroProducto">
        <br>
        <label>Marca: </label><input type="text" name="marca">
        <br>
        <label>Modelo: </label><input type="text" name="modelo">
        <br>
        <label for="dispositivo">Selecciona un tipo de dispositivo:</label>
        <select name="tipoDispositivo" id="seleccionDispositivo" oninput="mostrarCampos()">
            <option value="">Selecciona una opción</option>
            <option value="equipos">Equipo</option>
            <option value="impresoras">Impresora</option>
            <option value="moviles">Móvil</option>
            <option value="red">Red</option>
            <option value="otros">Otros</option>
        </select>

        <fieldset id="equipos" class="hidden">
            <label>Servidor:</label><input type="radio" value="0" name="servidor">Cliente: <input type="radio" value="1" name="servidor"><br>
            <label>Procesador: </label><input type="text" name="procesador"><br>
            <label>Memoria: </label><input type="text" name="memoria"><br>
            <label>Almacenamiento: </label><input type="text" name="almacenamiento"><br>
            <label>Sistema: </label><input type="text" name="sistema"><br>
            <label>Versión: </label><input type="text" name="version"><br>
            <label>Tipo: </label><input type="text" name="tipo"><br>
            <label>Otros: </label><textarea name="otros"></textarea><br>
        </fieldset>

        <fieldset id="impresoras" class="hidden">
            <label>Velocidad: </label><input type="text" name="velocidad"><br>
            <label>Resolución: </label><input type="text" name="resolucion"><br>
            <label>Método de Impresión: </label><input type="text" name="metodoImpresion"><br>
            <label>Solo B/N: </label><input type="radio" value="0" name="color">B/N y color: <input type="radio" value="1" name="color"><br>
        </fieldset>

        <fieldset id="moviles" class="hidden">
            <label>Procesador: </label><input type="text" name="procesador"><br>
            <label>Memoria: </label><input type="text" name="memoria"><br>
            <label>Almacenamiento: </label><input type="text" name="almacenamiento"><br>
            <label>Sistema: </label><input type="text" name="sistema"><br>
            <label>Versión: </label><input type="text" name="version"><br>
        </fieldset>

        <fieldset id="red" class="hidden">
            <label>Producto: </label><input type="text" name="producto"><br>
            <label>Interfaces: </label><input type="text" name="interfaces"><br>
            <label>Velocidad Máxima: </label><input type="text" name="velocidadMax"><br>
        </fieldset>

        <fieldset id="otros" class="hidden">
            <label>Denominación: </label><input type="text" name="denominacion"><br>
            <label>Características: </label><textarea name="caracteristicas"></textarea><br>
        </fieldset>
        <br>
        <input type="submit" value="Registrar dispositivo">
    </form>
    <?php
        } elseif ($_GET['tipo'] == "usuario") {

        }
    ?>
    <?php
        mysqli_close($bbdd);
    ?>
</body>
</html>