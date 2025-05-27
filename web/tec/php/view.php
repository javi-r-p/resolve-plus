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
    </header>
    <nav>
        <hr>
        <strong><a href="../index.php">Dashboard</a></strong>
        <hr>
        <p>Gestión</p>
        <hr class="sameType">
        <a href="management.php?tipo=Dispositivos">Dispositivos</a>
        <a href="management.php?tipo=Usuarios">Usuarios</a>
        <a href="management.php?tipo=Empresas">Empresas</a>
        <a href="management.php?tipo=Tecnicos">Técnicos</a>
        <hr>
        <p>Otros</p>
        <hr class="sameType">
        <a href="statistics.php">Estadísticas</a>
        <hr>
    </nav>
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
                if (isset($_GET['id'])) {
                    $consulta = mysqli_query($bbdd, "SELECT ic.id, urgente, descripcion, us.nombre AS 'usuario', empresa, fechaApertura, fechaCierreEsp FROM incidencias ic, usuarios us WHERE empresa = (SELECT id FROM empresas WHERE id = 1) AND ic.id = " . $_GET['id']);
                    $resultados = mysqli_fetch_array($consulta);
                    echo "<p>Identificador: " . $resultados['id'] . "</p>\n";
                    echo "<p>Urgente: ";
                    if ($resultados['urgente'] == 0) {
                        echo "NO";
                    } else {
                        echo "SÍ";
                    }
                    echo "</p>\n";
                    echo "<p>Usuario: " . $resultados['usuario'];
                    echo "<p>Descripción: " . $resultados['descripcion'] . "</p>\n";
                    echo "";
                } else {
                    ?>
                    <h4>Filtros y orden</h4>
                    <label for="orden">Ordenar por</label><select id="orden">
                        <option value="id">Identificador</option>
                        <option value="urgente">Urgencia</option>
                        <option value="fechaApertura">Fecha de apertura</option>
                        <option value="Usuario">Usuario</option>
                    </select>
                    <label for="id">ID</label><input type="text" id="id">
                    <label for="fechaApertura">Fecha de apertura</label><input type="date" id="fechaApertura">
                    <label for="usuario">Usuario</label><input type="text" id="usuario">
                    <hr>
                    <?php
                        $consulta = mysqli_query($bbdd, "SELECT ic.id AS 'id', urgente, fechaApertura, fechaCierreEsp, nombre, usuario FROM incidencias ic INNER JOIN usuarios us ON usuario = us.id WHERE estado = 1 ORDER BY urgente DESC");
                        echo "<table>\n";
                        echo "<tr>\n";
                        echo "<th>ID</th>\n";
                        echo "<th>Urgente</th>\n";
                        echo "<th>Fecha de apertura</th>\n";
                        echo "<th>Fecha de cierre estimada</th>\n";
                        echo "<th>Usuario</th>\n";
                        echo "<th></th>\n";
                        echo "</tr>\n";
                        while ($resultados = mysqli_fetch_array($consulta)) {
                            echo "<tr>\n";
                            echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Incidencias&id=" . $resultados['id'] . "'>" . $resultados['id'] . "</a></td>\n";
                            if ($resultados['urgente'] == 0) {
                                echo "<td>NO</td>\n";
                            } else {
                                echo "<td>SÍ</td>\n";
                            }
                            echo "<td>" . date_format(date_create($resultados['fechaApertura']), "d/m/Y") . "</td>\n";
                            echo "<td>" . date_format(date_create($resultados['fechaCierreEsp']), "d/m/Y") . "</td>\n";
                            echo "<td>" . $resultados['nombre'] . "</td>\n";
                            echo "<td><a href='edit.php?id=" . $resultados['id'] . "&tipo=" . $_GET['tipo'] . "'><img src='../../images/edit.png'></a></td>\n";
                            echo "</tr>\n";
                        }
                        echo "</table>\n";
                }
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