<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require "vendor/autoload.php";
require "credentials.php";

function enviarCorreo($remitente, $destinatario, $asunto, $cuerpo, $datos=[]) {
	//Create an instance; passing `true` enables exceptions
	global $noreply;
	$mail = new PHPMailer(true);
	$contrasenia = $noreply;
	if ($cuerpo == "bienvenida") {
		$mensaje = "<h3>¡Bienvenido a Resolve+!</h3><p>Has sido de alta en nuestro sistema de gestión de incidencias.</p><p>Para gestionar tus incidencias, inicia sesión con tus credenciales en <a href='https://resolveplus.ddns.net' target='_blank'>https://resolveplus.ddns.net</a>.</p><p><strong>Es importante que cambies tu contraseña cuando inicies sesión.</strong></p><p>Tus credenciales son:</p><p>Usuario: " . $datos['nombreUsuario'] . "</p><p>Correo: " . $datos['correo'] . "</p><p>Contraseña: " . $datos['contrasenia'] . "</p><p>Si no puedes iniciar sesión, envía un correo a <a href='mailto:contacto.resolvepluses@gmail.com'>contacto.resolvepluses@gmail.com</a></p>.<br><br><h2>Resolve+</h2><h3>Tu empresa, nuestra gestión.</h3>";
	} elseif ($cuerpo == "incidenciaTramitada") {
		$mensaje = "<h3>Incidencia</h3><p>¡Hola!</p><p>Te comunicamos que tu incidencia con identificador " . $datos['id'] . " ha sido tramitada. Nuestros técnicos la atenderán lo antes posible.<p>¡Gracias!</p><br><br><h2>Resolve+</h2><h3>Tu empresa, nuestra gestión.</h3>";
	} elseif ($cuerpo == "incidenciaResuelta") {
		$mensaje = "<h3>Incidencia</h3><p>¡Hola!</p><p>Te comunicamos que la incidencia que abriste el día " . $datos['fechaApertura'] . " con identificador " . $datos['id'] . " ha sido resuelta.<p>¡Gracias!</p><br><br><h2>Resolve+</h2><h3>Tu empresa, nuestra gestión.</h3>";
	} else {
		$mensaje = $cuerpo;
	}

	try {
		//Server settings
		$mail->SMTPDebug = SMTP::DEBUG_OFF;		            //Enable verbose debug output
		$mail->isSMTP();                                    //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';				//Set the SMTP server to send through
		$mail->SMTPAuth   = true;                           //Enable SMTP authentication
		$mail->Username   = $remitente;						//SMTP username
		$mail->Password   = $contrasenia;					//SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    //Enable implicit TLS encryption
		$mail->Port       = 465;                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		$mail->CharSet	  = 'UTF-8';

		//Recipients
		$mail->setFrom($remitente, 'Resolve+');
		//$mail->addAddress('ellen@example.com', 'Name');     //Add a recipient
		$mail->addAddress($destinatario);					               //Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = $asunto;
		$mail->Body    = $mensaje;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		//echo 'Mensaje enviado';
		$mail->setLanguage('es','vendor/phpmailer/phpmailer/language/phpmailer.lang-es.php');
	} catch (Exception $e) {
		echo "No se ha podido enviar el correo electrónico. Mensaje de error: {$mail->ErrorInfo}";
	}
}
?>