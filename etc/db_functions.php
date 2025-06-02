<?php
require("config.php");
function insertar ($tabla, $sentencia, $id) {
    global $bbdd;
    if ($tabla == "dispositivos") {
        return false;
    }
    if (mysqli_num_rows(mysqli_query($bbdd, "SELECT id FROM $tabla WHERE id = $id")) == 1) {
        return null;
    } else {
        if (mysqli_query($bbdd, $sentencia)) {
            return true;
        } else {
            return false;
        }
    }
}
function actualizar ($sentencia) {
    global $bbdd;
    if (mysqli_query($bbdd, $sentencia)) {
        return true;
    } else {
        return false;
    }
}
function eliminar ($tabla, $id) {
    global $bbdd;
    $consulta = mysqli_query($bbdd, "SELECT * FROM " . $tabla . " WHERE id = " . $id);
    if (mysqli_num_rows($consulta) == 0) {
        return null;
    } else {
        $instruccion = "DELETE FROM " . $tabla . " WHERE id = " . $id;
        if (mysqli_query($bbdd, $instruccion)) {
            return true;
        } else {
            return false;
        }
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