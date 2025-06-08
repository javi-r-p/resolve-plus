<?php
	// Crear una sesión PHP
	session_start();
	// Terminar la sesión de PHP
	if(!isset($_SESSION['tecnico'])){
		$_SESSION['redireccionTec'] = $_SERVER['REQUEST_URI'];
		header("Location: http://127.0.0.1:8080/tec/authentication.php");
		die();
	}
?>