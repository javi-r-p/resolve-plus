<?php
    require_once("../../etc/sessionTec.php")
?>
<footer id="footer" class="body">
    <p>Has iniciado sesión como <?php echo $_SESSION['nombre'] . " (" . $_SESSION['nombreUsuario'] . ")"?></p><a href="#header"><img src="../images/up.png" alt="Subir"></a>
</footer>