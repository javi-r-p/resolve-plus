<?php
	require("../config/config.php");
	if ($_GET['tipo'] == "usuario") {
	    $json = base64_decode($_GET['b64']);
	    if ($json === false) {
	        echo "Error: Cadena Base64 no válida.";
	        exit;
	    }
	    $array = json_decode($json, TRUE);
	    if (json_last_error() !== JSON_ERROR_NONE) {
	        echo "Error: JSON no válido.";
	        exit;
	    }
	    $id = $array['id'];
	    $empresa = $array['empresa'];
	    $nombre = $array['nombre'];
	    $nombreUsuario = $array['nombreUsuario'];
	    $correo = $array['correo'];
	    $contrasenia = hash('sha256',$array['contrasenia']);
	    $telefono = $array['telefono'];
	    $insercion = mysqli_query($bbdd, "INSERT INTO usuarios (id,empresa,nombre,nombreUsuario,correo,contrasenia,telefono) VALUES ($id,$empresa,'$nombre','$nombreUsuario','$correo','$contrasenia','$telefono')");
	    if ($insercion) {
	        echo "Usuario $id con nombre $nombre insertado correctamente.";
	    } else {
	        echo "Error al insertar el usuario.";
	    }
	} else {
	    die();
	}
?>