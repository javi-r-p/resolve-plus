<?php
	// Crear una sesión PHP
	session_start();
	// Terminar la sesión de PHP
	if(!isset($_SESSION['usuario'])){
		header("Location: ../authentication.php?accion=login");
		die();
	}
?>