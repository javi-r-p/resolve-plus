<?php
require("config.php");
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
            case "desplegable":

                break;
        }
        mysqli_free_result($consulta);
        return true;
    }
}
function insercion ($tabla, $sentencia) {
    global $bbdd;
    if ($tabla == "dispositivo") {

    } else {

    }
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
function ultimoId ($tabla) {
    global $bbdd;
    $consulta = mysqli_query($bbdd, "SELECT id FROM $tabla ORDER BY id DESC LIMIT 1");
    if (mysqli_num_rows($consulta) == 0) {
        return 1;
    } else {
        $ultimoId = mysqli_fetch_array($consulta);
        return $ultimoId['id'] +1;
    }
}
?>