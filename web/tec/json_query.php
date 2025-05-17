<?php
    require("../../etc/config.php");
    $json = [];
    if ($_GET['tabla'] == "incidenciasAreasAbiertas") {
        $consulta = mysqli_query($bbdd, "SELECT a.denominacion, COUNT(ia.incidencia) AS 'conteo' FROM areas a JOIN incidenciasAreas ia ON a.id = ia.area JOIN incidencias i ON ia.incidencia = i.id WHERE i.estado = 1 GROUP BY a.denominacion");
    } elseif ($_GET['tabla'] == "incidenciasAbiertas") {
        $consulta = mysqli_query($bbdd, "SELECT COUNT(id) AS 'conteo' FROM incidencias WHERE estado = 1 GROUP BY urgente");
    } elseif ($_GET['tabla'] == "incidenciasAreas") {
        $consulta = mysqli_query($bbdd, "SELECT a.denominacion, COUNT(ia.incidencia) AS 'conteo' FROM areas a JOIN incidenciasAreas ia ON a.id = ia.area JOIN incidencias i ON ia.incidencia = i.id GROUP BY a.denominacion");
    } elseif ($_GET['tabla'] == "incidencias") {
        $consulta = mysqli_query($bbdd, "SELECT COUNT(id) AS 'conteo' FROM incidencias GROUP BY urgente");
    }
    while ($resultados = mysqli_fetch_array($consulta)) {
        array_push($json, $resultados);
    }
    echo json_encode($json);
?>