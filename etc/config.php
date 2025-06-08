<?php
    $servidor = "bbdd"; // Servidor de bases de datos, puede ser un nombre o una dirección IP
    $usuario ="resolve"; // Usuario de la base de datos
    $contrasenia = "resolve"; // Contraseña del usuario
    $esquema = "resolve"; // Base de datos a la que conectarse
    $bbdd = mysqli_connect($servidor, $usuario, $contrasenia, $esquema) OR die("Error de conexión con la base de datos: " . mysqli_connect_error()); // Si se produce un error en la conexión mostrar el error
?>