<?php
require("config.php"); // Incluye el archivo de configuración de la base de datos

// Función para insertar un registro en una tabla
function insertar ($tabla, $sentencia, $id = NULL, $indice = NULL) {
    global $bbdd;
    // Define los campos índice para cada tabla
    $camposIndice = ["dispositivos" => "numeroSerie", "usuarios" => "nombreUsuario", "tecnicos" => "nombreUsuario", "empresas" => "cif"];
    // Si se proporciona un índice, verifica si ya existe un registro con ese id o índice
    if ($indice != NULL) {
        $consulta = "SELECT id FROM $tabla WHERE id = $id OR " . $camposIndice[$tabla] . " = '$indice'";
    } elseif ($id != NULL) { // Si solo se proporciona id, verifica si ya existe
        $consulta = "SELECT id FROM $tabla WHERE id = $id";
    }
    // Si se realizó una consulta, comprueba si ya existe el registro
    if (isset($consulta)) {
        if (mysqli_num_rows(mysqli_query($bbdd, $consulta)) == 1) {
            return null; // Si existe, no inserta y retorna null
        }
    }
    // Ejecuta la sentencia de inserción
    if (mysqli_query($bbdd, $sentencia)) {
        return true; // Inserción exitosa
    } else {
        return false; // Error en la inserción
    }
}

// Función para actualizar un registro
function actualizar ($sentencia) {
    global $bbdd;
    // Ejecuta la sentencia de actualización
    if (mysqli_query($bbdd, $sentencia)) {
        return true; // Actualización exitosa
    } else {
        return false; // Error en la actualización
    }
}

// Función para eliminar un registro por id
function eliminar ($tabla, $id) {
    global $bbdd;
    // Verifica si existe el registro a eliminar
    $consulta = mysqli_query($bbdd, "SELECT * FROM " . $tabla . " WHERE id = " . $id);
    if (mysqli_num_rows($consulta) == 0) {
        return null; // No existe el registro
    } else {
        // Ejecuta la sentencia de eliminación
        $instruccion = "DELETE FROM " . $tabla . " WHERE id = " . $id;
        if (mysqli_query($bbdd, $instruccion)) {
            return true; // Eliminación exitosa
        } else {
            return false; // Error en la eliminación
        }
    }
}

// Función para obtener el siguiente id disponible en una tabla
function ultimoId ($tabla) {
    global $bbdd;
    // Obtiene el id más alto de la tabla
    $consulta = mysqli_query($bbdd, "SELECT id FROM $tabla ORDER BY id DESC LIMIT 1");
    if (mysqli_num_rows($consulta) == 0) {
        return 1; // Si no hay registros, retorna 1
    } else {
        $ultimoId = mysqli_fetch_array($consulta);
        return $ultimoId['id'] +1; // Retorna el siguiente id
    }
}
?>