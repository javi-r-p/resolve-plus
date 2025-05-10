<?php
require("../etc/config.php");
function obtenerCampos ($tabla) {
    global $bbdd;
    $consulta = mysqli_query($bbdd, "SELECT * FROM " . $tabla);
    $campos = mysqli_fetch_fields($consulta);
    return $campos;
}
function consulta ($formato, $tabla, $sentencia) {
    global $bbdd;
    $consulta = mysqli_query($bbdd,$sentencia);
    if (mysqli_num_rows($consulta) == 0) {
        return false;
    } else {
        switch ($formato) {
            case "tabla":
                echo "<table>\n";
                echo "<tr>\n";
                foreach (obtenerCampos($tabla) as $campo) {
                    echo "<th>" . $campo->name . "</th>\n";
                }
                echo "</tr>\n";
                while ($resultados = mysqli_fetch_array($consulta)) {
                    echo "<tr>\n";
                    foreach (obtenerCampos($tabla) as $campo) {
                        $nombreCampo = $campo->name;
                        echo "<td>" . $resultados[$nombreCampo] . "</td>\n";
                    }
                    echo "</tr>\n";
                }
                echo "</table>\n";
                break;
            case "lista":

                break;
            case "desplegable":

                break;
        }
        return true;
    }
}
function insercion ($sentencia) {
    global $bbdd;
    $insercion = mysqli_query($bbdd,$sentencia);
    if ($insercion) {
        return true;
    } else {
        return false;
    }
}
function actualizar ($sentencia) {
    global $bbdd;
    $actualizacion = mysqli_query($bbdd,$sentencia);
    if ($actualizacion) {
        return true;
    } else {
        return false;
    }
}
?>