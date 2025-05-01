<?php
    $bbdd = mysqli_connect('bbdd','resolve','resolve','resolve');
    if (isset($_GET['q'])) {
        $termino = $_GET['q'];
        $buscarDispositivos = mysqli_query($bbdd, "SELECT id,marca,modelo FROM dispositivos WHERE marca LIKE '%" . $termino . "%' OR modelo LIKE '%" . $termino . "%'");
        if (mysqli_num_rows($buscarDispositivos) == 0) {
            echo "<h2>No se han encontrado resultados</h2>\n";
        } else {
            while ($dispositivos = mysqli_fetch_array($buscarDispositivos)) {
                echo "<label>" . $dispositivos['marca'] . " - " . $dispositivos['modelo'] . "</label><input type='checkbox' value='" . $dispositivos['id'] . "'oninput='actualizar()'>\n";
            }
        }
    } else {
        echo "<p>No se ha recibido ningún parámetro.</p>\n";
    }
?>