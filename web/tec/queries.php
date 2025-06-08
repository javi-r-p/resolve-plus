<?php
// Incluye el archivo de configuración
require("../../etc/config.php");
// Incluye el archivo de sesión compartida
require("../../etc/sessionShared.php");

// Inicializa el array para la respuesta JSON
$json = [];

// Verifica el parámetro 'q' en la URL para determinar la consulta a ejecutar
if ($_GET['q'] == "incidenciasAreasAbiertas") {
    // Consulta para obtener incidencias abiertas por área
    $consulta = mysqli_query($bbdd, "SELECT a.denominacion, COUNT(ia.incidencia) AS 'conteo' FROM areas a JOIN incidenciasAreas ia ON a.id = ia.area JOIN incidencias i ON ia.incidencia = i.id WHERE i.estado = 1 GROUP BY a.denominacion");
} elseif ($_GET['q'] == "incidenciasAbiertas") {
    // Consulta para contar incidencias abiertas agrupadas por urgencia
    $consulta = mysqli_query($bbdd, "SELECT COUNT(id) AS 'conteo' FROM incidencias WHERE estado = 1 GROUP BY urgente ORDER BY urgente DESC");
} elseif ($_GET['q'] == "incidenciasAreas") {
    // Consulta para obtener incidencias por área (todas, sin filtrar por estado)
    $consulta = mysqli_query($bbdd, "SELECT a.denominacion, COUNT(ia.incidencia) AS 'conteo' FROM areas a JOIN incidenciasAreas ia ON a.id = ia.area JOIN incidencias i ON ia.incidencia = i.id GROUP BY a.denominacion");
} elseif ($_GET['q'] == "incidencias") {
    // Consulta para contar todas las incidencias agrupadas por urgencia
    $consulta = mysqli_query($bbdd, "SELECT COUNT(id) AS 'conteo' FROM incidencias GROUP BY urgente");
} elseif ($_GET['q'] == "incidenciasMes") {
    // Consulta para contar incidencias por mes y año de apertura
    $consulta = mysqli_query($bbdd, "SELECT DATE_FORMAT(fechaApertura, '%m-%Y') AS 'denominacion', COUNT(*) AS 'conteo' FROM incidencias GROUP BY denominacion ORDER BY denominacion");
} elseif ($_GET['q'] == "intervenciones5Tecnicos") {
    // Consulta para obtener los 5 técnicos con más intervenciones
    $consulta = mysqli_query($bbdd, "SELECT nombre, COUNT(intervenciones.id) AS 'conteo' FROM intervenciones INNER JOIN tecnicos ON intervenciones.tecnico = tecnicos.id GROUP BY nombre ORDER BY conteo DESC LIMIT 5");
} else {
    // Si el parámetro no es válido, muestra un mensaje y termina la ejecución
    echo "Parámetros no válidos";
    die();
}

// Recorre los resultados de la consulta y los agrega al array JSON
while ($resultados = mysqli_fetch_array($consulta)) {
    array_push($json, $resultados);
}

// Devuelve la respuesta en formato JSON
echo json_encode($json);

// Libera la memoria asociada al resultado
mysqli_free_result($consulta);
// Cierra la conexión a la base de datos
mysqli_close($bbdd);
