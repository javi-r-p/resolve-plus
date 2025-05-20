<html lang="es">
<head>
    <title><?php echo $_GET['tipo']; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../images/favicon.ico">
    <link rel="stylesheet" href="../../styles/general.css">
    <script src="../../scripts/formsAndCss.js"></script>
    <script src="../../scripts/htrequests.js"></script>
    <script src="../../scripts/menuAndAnimations.js"></script>
    <script>

    </script>
    <?php
        require("../../../etc/config.php");
        require("../../../etc/sessionTec.php");
        include("../../../etc/db_functions.php");
    ?>
</head>
<body>
    <header>
        <h1>Gestión de <?php echo strtolower($_GET['tipo']); ?></h1>
        <button onclick="abrirMenu()"><img src="../../images/menu.png" alt="Abrir menú"></button>
    </header>
    <aside id="menuLateral" class="menuLateral">
        <button class="display-block float-left"><a href="../authentication.php?accion=logout"><img src="../../images/logout.png" alt="Cerrar sesión"></a></button>
        <button class="display-block float-left"><a href="modify.php?tipo=Tecnico"><img src="../../images/password.png" alt="Cambiar contraseña"></a></button>
        <button class="display-block float-right" onclick="cerrarMenu()"><img src="../../images/close.png" alt="Cerrar menú"></button>
        <a href="../index.php">Dashboard</a>
        <p>Gestión de dispositivos</p>
        <a href="registerForms.php?tipo=Dispositivo" class="margin-left">Registrar un dispositivo</a>
        <a href="view.php?tipo=Dispositivos" class="margin-left">Ver / modificar dispositivos registrados</a>
        <p>Gestión de empresas</p>
        <a href="registerForms.php?tipo=Empresa" class="margin-left">Registrar una empresa</a>
        <a href="view.php?tipo=Empresas" class="margin-left">Ver / modificar empresas registradas</a>
        <p>Gestión de usuarios</p>
        <a href="registerForms.php?tipo=Usuario" class="margin-left">Registrar un usuario</a>
        <a href="view.php?tipo=Usuarios" class="margin-left">Ver usuarios registrados</a>
        <p>Gestión de técnicos</p>
        <a href="registerForms.php?tipo=Tecnico" class="margin-left">Registrar un técnicos</a>
        <a href="view.php?tipo=Tecnicos" class="margin-left">Ver / modificar técnicos registrados</a>
        <a href="statistics.php">Estadísticas</a>
    </aside>
    <main>
        <?php
            if ($_GET['tipo'] == "Dispositivos") {
                $tiposDispositivo = ["equipos", "impresoras", "moviles", "red", "otros"];
                $consulta = mysqli_query($bbdd, "SELECT id, marca, modelo, numeroSerie FROM dispositivos");
                echo "<table>\n";
                echo "<tr>\n";
                echo "<th>ID</th>\n";
                echo "<th>Número de serie</th>\n";
                echo "<th>Marca</th>\n";
                echo "<th>Modelo</th>\n";
                echo "<th>Tipo de dispositivo</th>\n";
                echo "<th></th>\n";
                echo "<th></th>\n";
                echo "</tr>\n";
                while ($resultados = mysqli_fetch_array($consulta)) {
                    echo "<tr>\n";
                    echo "<td>" . $resultados['id'] . "</td>\n";
                    echo "<td>" . $resultados['numeroSerie'] . "</td>\n";
                    echo "<td>" . $resultados['marca'] . "</td>\n";
                    echo "<td>" . $resultados['modelo'] . "</td>\n";
                    for ($i = 0; $i < sizeof($tiposDispositivo); $i++) {
                        $tabla = $tiposDispositivo[$i];
                        $consultaTipoDispositivo = mysqli_query($bbdd, "SELECT id FROM $tabla WHERE id = " . $resultados['id']);
                        if (mysqli_num_rows($consultaTipoDispositivo) == 1) {
                            switch ($tabla) {
                                case "equipos":
                                    $tipo = "Equipo";
                                    break;
                                case "impresoras":
                                    $tipo = "Impresora";
                                    break;
                                case "moviles":
                                    $tipo = "Teléfono móvil";
                                    break;
                                case "red":
                                    $tipo = "Red";
                                    break;
                                case "otros":
                                    $tipo = "Otros";
                                    break;
                                default:
                                    $tipo = "Desconocido";
                            }
                            echo "<td>" . $tipo . "</td>\n";
                        }
                    }
                    echo "<td><a href='edit.php?id=" . $resultados['id'] . "&tipo=" . $_GET['tipo'] . "'><img src='../../images/edit.png'></a></td>\n";                         
                    echo "<td><a href='delete.php?id=" . $resultados['id'] . "&tipo=" . $_GET['tipo'] . "'><img src='../../images/delete.png'></a></td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";
            } elseif ($_GET['tipo'] == "Empresas") {
                $consulta = mysqli_query($bbdd, "SELECT id, cif, nombre, correo, telefono FROM empresas");
                echo "<table>\n";
                echo "<tr>\n";
                echo "<th>ID</th>\n";
                echo "<th>CIF</th>\n";
                echo "<th>Razón social</th>\n";
                echo "<th>Correo electrónico</th>\n";
                echo "<th>Teléfono</th>\n";
                echo "<th></th>\n";
                echo "<th></th>\n";
                echo "</tr>\n";
                while ($resultados = mysqli_fetch_array($consulta)) {
                    echo "<tr>\n";
                    echo "<td>" . $resultados['id'] . "</td>\n";
                    echo "<td>" . $resultados['cif'] . "</td>\n";
                    echo "<td>" . $resultados['nombre'] . "</td>\n";
                    echo "<td>" . $resultados['correo'] . "</td>\n";
                    echo "<td>" . $resultados['telefono'] . "</td>\n";
                    echo "<td><a href='edit.php?id=" . $resultados['id'] . "&tipo=" . $_GET['tipo'] . "'><img src='../../images/edit.png'></a></td>\n";                         
                    echo "<td><a href='delete.php?id=" . $resultados['id'] . "&tipo=" . $_GET['tipo'] . "'><img src='../../images/delete.png'></a></td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";
            } elseif ($_GET['tipo'] == "Incidencias") {
                $consulta = mysqli_query($bbdd, "SELECT ic.id AS 'id', fechaApertura, fechaCierreEsp, nombre, usuario FROM incidencias ic INNER JOIN usuarios us ON usuario = us.id WHERE estado = 1");
                echo "<table>\n";
                echo "<tr>\n";
                echo "<th>ID</th>\n";
                echo "<th>Fecha de apertura</th>\n";
                echo "<th>Fecha de cierre estimada</th>\n";
                echo "<th>Usuario</th>\n";
                echo "<th></th>\n";
                echo "</tr>\n";
                while ($resultados = mysqli_fetch_array($consulta)) {
                    echo "<tr>\n";
                    echo "<td>" . $resultados['id'] . "</td>\n";
                    echo "<td>" . date_format(date_create($resultados['fechaApertura']), "d/m/Y") . "</td>\n";
                    echo "<td>" . date_format(date_create($resultados['fechaCierreEsp']), "d/m/Y") . "</td>\n";
                    echo "<td>" . $resultados['nombre'] . " (" . $resultados['usuario'] . ")" ."</td>\n";
                    echo "<td><a href='edit.php?id=" . $resultados['id'] . "&tipo=" . $_GET['tipo'] . "'><img src='../../images/edit.png'></a></td>\n";                         
                    echo "</tr>\n";
                }
                echo "</table>\n"; 
            } else {
                echo "<span>Los parámetros recibidos no son válidos.</span>\n";
            }
        ?>
    </main>
    <footer>
        
    </footer>
    <?php
        mysqli_close($bbdd);
    ?>
</body>
</html>