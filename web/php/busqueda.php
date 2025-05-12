<?php
    require("../../etc/config.php");
    if (isset($_GET['q'])) {
        $q = $_GET['q'];
        $tipo = $_GET['tipo'];
        $tabla = $_GET['tabla'];
        $consulta = mysqli_query($bbdd, "SELECT id, nombre FROM $tabla WHERE nombre LIKE '%$q%'");
        echo "<select name='" . $tipo . "'>\n";
        echo "<option value='-'>-</option>\n";
        while ($resultados = mysqli_fetch_array($consulta)) {
            echo "<option value='" . $resultados['id'] . "'>" . $resultados['nombre'] . "</option>\n";
        }
        echo "</select>\n";
    } else {
        echo "<p>No se ha recibido ningún parámetro.</p>\n";
    }
?>