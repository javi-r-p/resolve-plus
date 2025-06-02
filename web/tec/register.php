<?php
    require("../../etc/config.php");
    require("../../etc/sessionTec.php");
    include("../../etc/db_functions.php");
    if (!isset($_GET['tipo'])) {
        die();
    } elseif ($_GET['tipo'] == "Dispositivos") {
        $id = $_POST['id'];
        $empresa = $_POST['empresa'];
        $numeroSerie = $_POST['numeroSerie'];
        $numeroProducto = $_POST['numeroProducto'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $insercionDispositivo = mysqli_query($bbdd, "INSERT INTO dispositivos (id,empresa,numeroSerie,numeroProducto,marca,modelo) VALUES ($id,$empresa,'$numeroSerie','$numeroProducto','$marca','$modelo')");
        if ($insercionDispositivo == TRUE) {
            $tipoDispositivo = $_POST['tipoDispositivo'];
            if ($tipoDispositivo == "impresoras" && !isset($_POST['color'])) {
                $_POST['color'] = 1;
            } elseif ($tipoDispositivo == "impresoras" && $_POST['color'] == "on") {
                $_POST['color'] = 0;
            } elseif ($tipoDispositivo == "equipos" && !isset($_POST['servidor'])) {
                $_POST['servidor'] = 0;
            } elseif ($tipoDispositivo == "equipos" && $_POST['servidor'] == "on") {
                $_POST['servidor'] = 1;
            }
            $claveInicial = "tipoDispositivo";
            $claves = array_keys($_POST);
            $indiceInicial = array_search($claveInicial, $claves);
            if ($indiceInicial !== false) {
                $arrayRecorrido = array_slice($_POST, $indiceInicial + 1, null, true);
                $valoresComillas = array_map(function ($value) {
                    return "'" . $value . "'"; // Add quotes around each value
                }, $arrayRecorrido);
                $datos = implode(",", $valoresComillas);
            }
            echo "INSERT INTO $tipoDispositivo VALUES(" . $id . "," . $datos . ")";
            $insercionTipoDispositivo = mysqli_query($bbdd, "INSERT INTO $tipoDispositivo VALUES(" . $id . "," . $datos . ")");
            if ($insercionTipoDispositivo == TRUE) {
                echo "<h1>El dispositivo se ha registrado en el sistema</h1>";
                echo "<br><a href='../index.php'>Volver a la página principal</a>";
            } else {
                echo "<h1>Ha habido un error en el registro. Inténtalo de nuevo más tarde.";
            }
        } else {
            echo "<h1>Ha habido un error en el registro. Inténtalo de nuevo más tarde.";
        }
    } else {
        echo "Parámetros inválidos.";
        die();
    }
?>