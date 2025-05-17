<?php
    require("../../etc/config.php");
    if (isset($_GET['termino'])) {
        $termino = $_GET['termino'];
        $tipo = $_GET['tipo'];
        $tabla = $_GET['tabla'];
        $consulta = mysqli_query($bbdd, "SELECT id, nombre FROM $tabla WHERE nombre LIKE '%$termino%'");
        if (mysqli_num_rows($consulta) == 0) {
            echo "No se han encontrado resultados.\n";
        } else {
            echo "<select name='" . $tipo . "'>\n";
            echo "<option value='-'>-</option>\n";
            while ($resultados = mysqli_fetch_array($consulta)) {
                echo "<option value='" . $resultados['id'] . "'>" . $resultados['nombre'] . "</option>\n";
            }
            echo "</select>\n";
        }
    } else {
        echo "No se ha recibido ningún parámetro.\n";
    }
?>