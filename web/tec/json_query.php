<?php
    require("../../etc/config.php");
    $json = [];
    if ($_GET['q'] == "incidenciasAreasAbiertas") {
        $consulta = mysqli_query($bbdd, "SELECT a.denominacion, COUNT(ia.incidencia) AS 'conteo' FROM areas a JOIN incidenciasAreas ia ON a.id = ia.area JOIN incidencias i ON ia.incidencia = i.id WHERE i.estado = 1 GROUP BY a.denominacion");
    } elseif ($_GET['q'] == "incidenciasAbiertas") {
        $consulta = mysqli_query($bbdd, "SELECT COUNT(id) AS 'conteo' FROM incidencias WHERE estado = 1 GROUP BY urgente");
    } elseif ($_GET['q'] == "incidenciasAreas") {
        $consulta = mysqli_query($bbdd, "SELECT a.denominacion, COUNT(ia.incidencia) AS 'conteo' FROM areas a JOIN incidenciasAreas ia ON a.id = ia.area JOIN incidencias i ON ia.incidencia = i.id GROUP BY a.denominacion");
    } elseif ($_GET['q'] == "incidencias") {
        $consulta = mysqli_query($bbdd, "SELECT COUNT(id) AS 'conteo' FROM incidencias GROUP BY urgente");
    } elseif ($_GET['q'] == "incidenciasMes") {
        $consulta = mysqli_query($bbdd, "SELECT DATE_FORMAT(fechaApertura, '%m-%Y') AS 'denominacion', COUNT(*) AS 'conteo' FROM incidencias GROUP BY denominacion ORDER BY denominacion");
    } elseif ($_GET['q'] == "incidenciasDispositivo") {
        $consulta = mysqli_query($bbdd, "SELECT 'red' AS 'denominacion', COUNT(*) AS 'conteo' FROM red r JOIN dispositivosIncidencias id ON r.id = id.dispositivo UNION ALL SELECT 'equipos', COUNT(*) FROM equipos e JOIN dispositivosIncidencias id ON e.id = id.dispositivo UNION ALL SELECT 'impresoras', COUNT(*) FROM impresoras i JOIN dispositivosIncidencias id ON i.id = id.dispositivo UNION ALL SELECT 'moviles', COUNT(*) FROM moviles m JOIN dispositivosIncidencias id ON m.id = id.dispositivo UNION ALL SELECT 'otros', COUNT(*)  FROM otros o JOIN dispositivosIncidencias id ON o.id = id.dispositivo");
    } else {
        echo "Parámetros no válidos";
        die();
    }
    while ($resultados = mysqli_fetch_array($consulta)) {
        array_push($json, $resultados);
    }
    echo json_encode($json);
?>