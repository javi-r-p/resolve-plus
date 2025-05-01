<?php
    require("../../etc/config.php");
    require("../../etc/session.php");
    if (!isset($_GET['tipo'])) {
        die();
    } elseif ($_GET['tipo'] == "incidencia") {
        $id = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $fechaApertura = $_POST['fechaApertura'];
        $fechaCierreEsp = $_POST['fechaCierreEsp'];
        $usuario = $_SESSION['usuario'];
        $insercion = mysqli_query($bbdd, "INSERT INTO incidencias (id,descripcion,fechaApertura,fechaCierreEsp,usuario) VALUES ($id,'$descripcion','$fechaApertura','$fechaCierreEsp',$usuario)");
        if ($insercion) {
            echo "<h1>La incidencia se ha registrado en el sistema</h1>";
            echo "<a href='../index.php'>Volver a la página principal</a>";
        } else {
            echo "<h1>Ha habido un error en el registro. Inténtalo de nuevo más tarde.";
        }
    } elseif ($_GET['tipo'] == "dispositivo") {
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
    } elseif ($_GET['tipo'] == "usuario") {
        $id = $_POST['id'];
        $empresa = $_POST['empresa'];
        $nombre = $_POST['nombre'];
        $nombreUsuario = $_POST['nombreUsuario'];
        $correo = $_POST['correo'];
        $contrasenia = hash('sha512', $_POST['contrasenia']);
        $telefono = $_POST['telefono'];
        $insercion = mysqli_query($bbdd, "INSERT INTO usuarios (id,empresa,nombre,nombreUsuario,correo,contrasenia,telefono) VALUES ($id,$empresa,'$nombre','$nombreUsuario','$correo','$contrasenia','$telefono')");
        if ($insercion == TRUE) {
            echo "<h1>El usuario se ha registrado en el sistema</h1>";
            echo "<a href='../index.php'>Volver a la página principal</a>";
        } else {
            echo "<h1>Ha habido un error en el registro. Inténtalo de nuevo más tarde.";
        }
    } elseif ($_GET['tipo'] == "tecnico") {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contrasenia = hash('sha256', $_POST['contrasenia']);
        $telefono = $_POST['telefono'];
        $insercion = mysqli_query($bbdd, "INSERT INTO tecnicos (id,nombre,correo,contrasenia,telefono) VALUES ($id,'$nombre','$correo','$contrasenia',$telefono)");
        if ($insercion == TRUE) {
            echo "<h1>El técnico se ha registrado en el sistema</h1>";
            echo "<a href='../index.php'>Volver a la página principal</a>";
        } else {
            echo "<h1>Ha habido un error en el registro. Inténtalo de nuevo más tarde.";
        }
    } elseif ($_GET['tipo'] == "empresa") {
        $id = $_POST['id'];
        $cif = $_POST['cif'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $cp = $_POST['cp'];
        $insercion = mysqli_query($bbdd, "INSERT INTO empresas (id,cif,nombre,correo,direccion,telefono,cp) VALUES ($id,'$cif','$nombre','$correo','$direccion',$telefono,$cp)");
        if ($insercion == TRUE) {
            echo "<h1>La empresa se ha registrado en el sistema</h1>";
            echo "<a href='../index.php'>Volver a la página principal</a>";
        } else {
            echo "<h1>Ha habido un error en el registro. Inténtalo de nuevo más tarde.";
        }
    } else {
        die();
    }
?>