<?php
    include("../../../etc/db_functions.php");
    if ($_GET['tipo'] == "DispositivoEquipo") {
        $id = $_POST['id'];
        if (!isset($_POST['servidor'])) {
            $servidor = 0;
        } else {
            $servidor = 0;
        }
        $procesador = $_POST['procesador'];
        $memoria = $_POST['memoria'];
        $almacenamiento = $_POST['almacenamiento'];
        $sistema = $_POST['sistema'];
        $tipo = $_POST['tipo'];
        if (empty($_POST['otros'])) {
            $otros = "-";
        } else {
            $otros = $_POST['otros'];
        }
        if (actualizar("UPDATE equipos SET servidorCliente = '$servidor', procesador = '$procesador', memoria = '$memoria', almacenamiento = '$almacenamiento', sistema = '$sistema', tipo = '$tipo', otros = '$otros' WHERE id = $id")) {
            echo "<h3>Dispositivo con ID " . $id . " actualizado.</h3>\n";
            echo "<a href='management.php?tipo=Dispositivos'>Volver</a>\n";
        } else {
            echo "NO";
        }
    }
?>