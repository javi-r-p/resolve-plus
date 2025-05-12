<?php
	// Crear una sesión PHP
	session_start();
	// Terminar la sesión de PHP
	if(!isset($_SESSION['tecnico'])){
		header("Location: ../tec/authentication.php?accion=login");
		die();
	}
?>