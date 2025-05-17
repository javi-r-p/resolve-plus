<?php
    require("../../etc/config.php");
    if (isset($_GET['id']) AND isset($_GET['tipo'])) {
        //if ($_GET['tipo'] == "Dispositivos") {
            $consulta = mysqli_query($bbdd, "SELECT * FROM " . strtolower($_GET['tipo']) . " WHERE id = " . $_GET['id']);
            if (mysqli_num_rows($consulta) == 1) {
                $eliminacion = mysqli_query($bbdd, "DELETE FROM " . strtolower($_GET['tipo']) . " WHERE id = " . $_GET['id']);
                if (!$eliminacion) {
                    echo "Error al eliminar: " . mysqli_error($bbdd);
                }
            } else {
                echo "<h2>El " . strtolower($_GET['tipo']) . " que intentas eliminar no existe.</h2>\n";
            }
        //}
    }
?>