<?php
	// Crear una sesión PHP
	session_start();
	// Terminar la sesión de PHP
	if(!isset($_SESSION['accesoQueries'])){
		$_SESSION['redireccion'] = $_SERVER['REQUEST_URI'];
		header("Location: http://127.0.0.1:8080/authentication.php");
		die();
	}
?>