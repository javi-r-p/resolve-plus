<?php
	// Crear una sesión PHP
	session_start();
	// Terminar la sesión de PHP
	if(!isset($_SESSION['usuario'])){
		header("Location: http://127.0.0.1:8080/authentication.php?accion=login");
		die();
	}
?>