<?php
    require_once("../../etc/sessionTec.php");
?>
<nav id="top">
    <a href="index.php"><img src="../images/dashboard.png" alt="Panel">Dashboard</a>
    <a href="issues.php"><img src="../images/issue.png" alt="Incidencias">Incidencias</a>
    <a href="management.php?tipo=Dispositivos"><img src="../images/devices.png" alt="Dispositivos">Dispositivos</a>
    <a href="management.php?tipo=Usuarios"><img src="../images/users.png" alt="Usuarios">Usuarios</a>
    <a href="management.php?tipo=Empresas"><img src="../images/corporation.png" alt="Empresa">Empresas</a>
    <a href="management.php?tipo=Tecnicos"><img src="../images/technician.png" alt="Técnico">Técnicos</a>
    <a href="statistics.php"><img src="../images/monitoring.png" alt="Gráfico">Estadísticas</a>
    <a href="management.php?tipo=Tecnicos&id=<?php echo $_SESSION['tecnico']; ?>&editar=true"><img src="../images/user.png" alt="Perfil" class="float-right"></a>
    <a href="authentication.php?accion=logout"><img src="../images/logout.png" alt="Cerrar sesión" class="float-right"></a>
</nav>