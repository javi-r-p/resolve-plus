<html lang="es">
<head>
    <title><?php echo $_GET['tipo']; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/forms.css">
    <script src="../scripts/formsAndCss.js"></script>
    <script src="../scripts/htrequests.js"></script>
    <script>

    </script>
    <?php
        require("../../etc/config.php");
        require("../../phpmailer/sendmail.php");
        include("../../etc/db_functions.php");
    ?>
</head>
<body>
<header id="header">
    <h1 class="center">Gestión de <?php echo strtolower($_GET['tipo']); ?></h1>
</header>
<?php
    include("nav.php");
?>
<main>
    <?php
        if ($_GET['tipo'] == "Dispositivos") {
            if (isset($_GET['ver'])) {
                $id = $_GET['id'];
                $consulta = mysqli_query($bbdd, "SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'equipos' AS tipo FROM dispositivos JOIN equipos ON dispositivos.id = equipos.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id UNION SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'impresoras' AS tipo FROM dispositivos JOIN impresoras ON dispositivos.id = impresoras.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id UNION SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'moviles' AS tipo FROM dispositivos JOIN moviles ON dispositivos.id = moviles.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id UNION SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'red' AS tipo FROM dispositivos JOIN red ON dispositivos.id = red.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id UNION SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'otros' AS tipo FROM dispositivos JOIN otros ON dispositivos.id = otros.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id");
                $resultados = mysqli_fetch_array($consulta);
                $tipo = $resultados['tipo'];
                echo "<div class='view'>\n";
                    echo "<h3>Datos del dispositivo</h3>\n";
                    echo "<a href='" . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos' class='float-right fixed-button'><img src='../images/close.png' alt='Cerrar ventana'></a>\n";
                    echo "<p>Identificador: " . $resultados['idDispositivo'] . "</p>\n";
                    echo "<p>Tipo: " . $resultados['tipo'] . "</p>\n";
                    echo "<p>Marca: " . $resultados['marca'] . "</p>\n";
                    echo "<p>Modelo: " . $resultados['modelo'] . "</p>\n";
                    echo "<p>Número de producto: " . $resultados['numeroProducto'] . "</p>\n";
                    echo "<p>Número de serie: " . $resultados['numeroSerie'] . "</p>\n";
                    echo "<br>\n";
                    echo "<h3>Datos específicos</h3>\n";
                    switch ($tipo) {
                        case "equipos":
                            $consultaDatosEspecificos = mysqli_query($bbdd, "SELECT * FROM equipos WHERE id = $id");
                            $resultadosDatosEspecificos = mysqli_fetch_array($consultaDatosEspecificos);
                            echo "<p>Servidor: ";
                            if ($resultadosDatosEspecificos['servidorCliente'] == 0) {
                                echo "no";
                            } else {
                                echo "sí";
                            }
                            echo "</p>\n";
                            echo "<p>Procesador: " . $resultadosDatosEspecificos['procesador'] . "</p>\n";
                            echo "<p>Memoria principal (RAM): " . $resultadosDatosEspecificos['memoria'] . "</p>\n";
                            echo "<p>Memoria secundaria (disco duro): " . $resultadosDatosEspecificos['almacenamiento'] . "</p>\n";
                            echo "<p>Sistema operativo: " . $resultadosDatosEspecificos['sistema'] . "</p>\n";
                            echo "<p>Tipo: " . $resultadosDatosEspecificos['tipo'] . "</p>\n";
                            echo "<p>Otras características: ";
                            if (empty($resultadosDatosEspecificos['otros'])) {
                                echo "-";
                            }
                            echo "</p>\n";
                            break;
                        case "impresoras":
                            $consultaDatosEspecificos = mysqli_query($bbdd, "SELECT * FROM impresoras WHERE id = $id");
                            $resultadosDatosEspecificos = mysqli_fetch_array($consultaDatosEspecificos);
                            echo "<p>Velocidad de impresión: " . $resultadosDatosEspecificos['velocidad'] . "m/s</p>\n";
                            echo "<p>Resolución: " . $resultadosDatosEspecificos['resolucion'] . "dpi</p>\n";
                            echo "<p>Método de impresión: " . $resultadosDatosEspecificos['metodoImpresion'] . "</p>\n";
                            echo "<p>Color: ";
                            if ($resultadosDatosEspecificos['color'] == 0) {
                                echo "no";
                            } else {
                                echo "sí";
                            }
                            echo "</p>\n";
                            break;
                        case "moviles":
                            $consultaDatosEspecificos = mysqli_query($bbdd, "SELECT * FROM moviles WHERE id = $id");
                            $resultadosDatosEspecificos = mysqli_fetch_array($consultaDatosEspecificos);
                            echo "<p>Procesador: " . $resultadosDatosEspecificos['procesador'] . "</p>\n";
                            echo "<p>Memoria principal (RAM): " . $resultadosDatosEspecificos['memoria'] . "</p>\n";
                            echo "<p>Memoria secundaria (almacenamiento): " . $resultadosDatosEspecificos['almacenamiento'] . "</p>\n";
                            echo "<p>Sistema operativo: " . $resultadosDatosEspecificos['sistema'] . "</p>\n";
                            break;
                        case "red":
                            $consultaDatosEspecificos = mysqli_query($bbdd, "SELECT * FROM red WHERE id = $id");
                            $resultadosDatosEspecificos = mysqli_fetch_array($consultaDatosEspecificos);
                            echo "<p>Producto: " . $resultadosDatosEspecificos['producto'] . "</p>\n";
                            echo "<p>Número de interfaces: " . $resultadosDatosEspecificos['interfaces'] . "</p>\n";
                            echo "<p>Velocidad máxima: " . $resultadosDatosEspecificos['velocidadMaxima'] . "</p>\n";
                            break;
                        case "otros":
                            $consultaDatosEspecificos = mysqli_query($bbdd, "SELECT * FROM otros WHERE id = $id");
                            $resultadosDatosEspecificos = mysqli_fetch_array($consultaDatosEspecificos);
                            echo "<p>Denominación: " . $resultadosDatosEspecificos['denominacion'] . "</p>\n";
                            echo "<p>Características: " . $resultadosDatosEspecificos['caracteristicas'] . "</p>\n";
                            break;
                    }
                    mysqli_free_result($consultaDatosEspecificos);
                    echo "<br>\n";
                    echo "<h3>Empresa</h3>\n";
                    echo "<p>Identificador: " . $resultados['id'] . "</p>\n";
                    echo "<p>Razón social: " . $resultados['nombre'] . "</p>\n";
                    echo "<p>CIF: " . $resultados['cif'] . "</p>\n";
                    echo "<p>Correo electrónico: " . $resultados['correo'] . "</p>\n";
                    echo "<p>Teléfono: " . $resultados['telefono'] . "</p>\n";
                    echo "<p>Dirección: " . $resultados['direccion'] . "</p>\n";
                    echo "<p>Código postal: " . $resultados['cp'] . "</p>\n";
                    $consultaIncidenciasTotales = mysqli_query($bbdd, "SELECT COUNT(*) AS 'totales' FROM dispositivosIncidencias WHERE dispositivo = $id");
                    $incidenciasTotales = mysqli_fetch_array($consultaIncidenciasTotales);
                    echo "<br>\n";
                    echo "<h3>Histórico de incidencias</h3>\n";
                    if ($incidenciasTotales['totales'] == 0) {
                        echo "<p>Este dispositivo no ha tenido ninguna incidencia.</p>\n";
                    } else {
                        echo "<p>Incidencias totales: " . $incidenciasTotales['totales'] . "</p>";
                        $consultaHistoricoIncidencias = mysqli_query($bbdd, "SELECT id, fechaApertura, fechaCierre FROM incidencias INNER JOIN dispositivosIncidencias ON incidencias.id = dispositivosIncidencias.incidencia WHERE dispositivo = $id");
                        echo "<table>\n";
                        echo "<tr>\n";
                        echo "<th>ID</th>\n";
                        echo "<th>Fecha de apertura</th>\n";
                        echo "<th>Fecha de cierre</th>\n";
                        echo "</tr>\n";
                        while ($historicoIncidencias = mysqli_fetch_array($consultaHistoricoIncidencias)) {
                            echo "<tr>\n";
                            echo "<td><a href='issues.php?id=" . $historicoIncidencias['id'] . "&ver=true'>" . $historicoIncidencias['id'] . "</a></td>\n";
                            echo "<td>" . $historicoIncidencias['fechaApertura'] . "</td>\n";
                            echo "<td>" . $historicoIncidencias['fechaCierre'] . "</td>\n";
                            echo "</tr>\n";
                        }
                        mysqli_free_result($consultaHistoricoIncidencias);
                        mysqli_free_result($consultaIncidenciasTotales);
                        echo "</table>\n";
                    }
                echo "</div>\n";
            }
            if (isset($_GET['aniadir'])) {
                ?>
                <div class="view">
                    <h3>Registrar un dispositivo</h3>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Dispositivos'; ?>" class="float-right fixed-button"><img src="../images/close.png" alt="Cerrar ventana"></a>
                    <form method="POST" action="register.php?tipo=Dispositivo">
                        <input type="text" name="id" value="<?php echo ultimoId("dispositivos"); ?>" readonly required>
                        <br>
                        <select name="empresa" required>
                            <option value="" selected>Empresa*</option>
                            <?php
                                $consultaEmpresas = mysqli_query($bbdd, "SELECT id, nombre FROM empresas");
                                while ($empresas = mysqli_fetch_array($consultaEmpresas)) {
                                    echo "<option value='" . $empresas['id'] . "'>" . $empresas['nombre'] . "</option>\n";
                                }
                            ?>
                        </select>
                        <br>
                        <input type="text" name="numeroSerie" placeholder="Número de serie*" maxlength="30" required>
                        <br>
                        <input type="text" name="numeroProducto" placeholder="Número de producto*" maxlength="30" required>
                        <br>
                        <input type="text" name="marca" placeholder="Marca*" maxlength="20" required>
                        <br>
                        <input type="text" name="modelo" placeholder="Modelo*" maxlength="30" required>
                        <br>
                        <select name="tipoDispositivo" id="seleccionDispositivo" oninput="mostrarCampos()" required>
                            <option value="" selected>Selecciona un tipo de dispositivo*</option>
                            <option value="equipos">Equipo</option>
                            <option value="impresoras">Impresora</option>
                            <option value="moviles">Móvil</option>
                            <option value="red">Red</option>
                            <option value="otros">Otros</option>
                        </select>
                        <br><br>
                        <fieldset id="equipos" class="hidden">
                            <input type="text" name="procesador" placeholder="Procesador*" required><br>
                            <input type="text" name="memoria" placeholder="Memoria RAM*" required><br>
                            <input type="text" name="almacenamiento" placeholder="Almacenamiento*" required><br>
                            <input type="text" name="sistema" placeholder="Sistema operativo*" required><br>
                            <input type="text" name="tipo" placeholder="Tipo (torre, portátil, rack...)*" required><br>
                            <textarea name="otros" placeholder="Otras características"></textarea><br>
                            <div class="check"><input type="checkbox" name="servidor">Servidor</div><br>
                        </fieldset>
                        <fieldset id="impresoras" class="hidden">
                            <input type="text" name="velocidad" placeholder="Velocidad (en m/s)*" pattern="^\d{1,2}\.\d{1,2}$" required><br>
                            <input type="text" name="resolucion" placeholder="Resolución (en dpi)*" pattern="^\d{1,4}$" required><br>
                            <input type="text" name="metodoImpresion" placeholder="Método de impresión*" required><br>
                            <div class="check"><input type="checkbox" name="color">Color</div><br>
                        </fieldset>
                        <fieldset id="moviles" class="hidden">
                            <input type="text" name="procesador" placeholder="Procesador*" required><br>
                            <input type="text" name="memoria" placeholder="Memoria RAM*" required><br>
                            <input type="text" name="almacenamiento" placeholder="Almacenamiento*" required><br>
                            <input type="text" name="sistema" placeholder="Sistema operativo*" required><br>
                        </fieldset>
                        <fieldset id="red" class="hidden">
                            <input type="text" name="producto" placeholder="Producto (router, switch, hub...)*" required><br>
                            <input type="text" name="interfaces" placeholder="Número de interfaces*" required><br>
                            <input type="text" name="velocidadMax" placeholder="Velocidad máxima*" required><br>
                        </fieldset>
                        <fieldset id="otros" class="hidden">
                            <input type="text" name="denominacion" placeholder="Denominación*" required><br>
                            <textarea name="caracteristicas" placeholder="Características*" required></textarea><br>
                        </fieldset>
                        <br>
                        <input type="submit" value="Registrar dispositivo">
                        <p>Los campos marcados con * son obligatorios.</p>
                    </form>
                </div>
            <?php
            }
            if (isset($_GET['editar'])) {
                $id = $_GET['id'];
                $consultaTipoDispositivo = mysqli_query($bbdd, "SELECT id, 'equipos' AS 'tipo' FROM equipos WHERE id = $id UNION SELECT id, 'impresoras' AS 'tipo' FROM impresoras WHERE id = $id UNION SELECT id, 'moviles' AS 'tipo' FROM moviles WHERE id = $id UNION SELECT id, 'red' AS 'tipo' FROM red WHERE id = $id UNION SELECT id, 'otros' AS 'tipo' FROM otros WHERE id = $id");
                $tipoDispositivo = mysqli_fetch_array($consultaTipoDispositivo);
                ?>
                <div class="view">
                    <h3>Editar dispositivo con ID <?php echo $id; ?></h3>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Dispositivos'; ?>" class="float-right fixed-button"><img src="../images/close.png" alt="Cerrar ventana"></a>
                    <p>El número de producto, de serie, la marca, el modelo y la empresa a la que pertenece el dispositivo no se puede editar. Para ello, tendrás que eliminarlo y volverlo a añadir.</p>
                    <?php
                        if ($tipoDispositivo['tipo'] == "equipos") {
                            $consultaDatosActuales = mysqli_query($bbdd, "SELECT servidorCliente, procesador, memoria, almacenamiento, sistema, tipo, otros FROM equipos WHERE id = $id");
                            $datosActuales = mysqli_fetch_array($consultaDatosActuales);
                            mysqli_free_result($consultaDatosActuales);
                    ?>
                            <form method="POST" action="edit.php?tipo=DispositivoEquipo">
                                <input type="text" name="id" value="<?php echo $id ?>" readonly><br>
                                <input type="text" name="procesador" value="<?php echo $datosActuales['procesador']; ?>" required><br>
                                <input type="text" name="memoria" value="<?php echo $datosActuales['memoria']; ?>" required><br>
                                <input type="text" name="almacenamiento" value="<?php echo $datosActuales['almacenamiento']; ?>" required><br>
                                <input type="text" name="sistema" value="<?php echo $datosActuales['sistema']; ?>" required><br>
                                <input type="text" name="tipo" value="<?php echo $datosActuales['tipo']; ?>" required><br>
                                <textarea name="otros" value="<?php echo $datosActuales['otros']; ?>"></textarea><br>
                                <div class="check"><input type="checkbox" name="servidor" <?php if ($datosActuales['servidorCliente'] == 1) {echo "checked"; }?>>Servidor</div><br>
                                <br>
                                <input type="submit" value="Editar dispositivo">
                            </form>
                    <?php
                        } elseif ($tipoDispositivo['tipo'] == "impresoras") {
                    ?>
                            <form method="POST" action="edit.php?tipo=DispositivoImpresora">
                                <input type="text" name="id" value="<?php echo $id ?>" readonly><br>
                                <input type="text" name="velocidad" required><br>
                                <input type="text" name="resolucion" required><br>
                                <input type="text" name="metodoImpresion" required><br>
                                <input type="radio" value="0" name="color">B/N y color: <input type="radio" value="1" name="color" required><br>
                                <br>
                                <input type="submit" value="Editar dispositivo">
                            </form>
                    <?php
                        } elseif ($tipoDispositivo['tipo'] == "moviles") {
                    ?>
                            <form method="POST" action="edit.php?tipo=DispositivoMovil">
                                <input type="text" name="id" value="<?php echo $id ?>" readonly><br>
                                <input type="text" name="procesador" required><br>
                                <input type="text" name="memoria" required><br>
                                <input type="text" name="almacenamiento" required><br>
                                <input type="text" name="sistema" required><br>
                                <input type="text" name="version" required><br>
                                <br>
                                <input type="submit" value="Editar dispositivo">
                            </form>
                    <?php
                        } elseif ($tipoDispositivo['tipo'] == "red") {
                    ?>
                    <form method="POST" action="edit.php?tipo=DispositivoRed">
                        <input type="text" name="id" value="<?php echo $id ?>" readonly><br>
                        <input type="text" name="producto" required><br>
                        <input type="text" name="interfaces" required><br>
                        <input type="text" name="velocidadMax" required><br>
                        <br>
                        <input type="submit" value="Editar dispositivo">
                    </form>
                    <?php
                        } elseif ($tipoDispositivo['tipo'] == "otros") {
                    ?>
                    <form method="POST" action="edit.php?tipo=DispositivoOtros">
                        <input type="text" name="id" value="<?php echo $id ?>" readonly><br>
                        <input type="text" name="denominacion" required><br>
                        <textarea name="caracteristicas" required></textarea><br>
                        <br>
                        <input type="submit" value="Editar dispositivo">
                    </form>
                    <?php
                        } else {
                            echo "<p>Parámetros inválidos</p>";
                        }
                    ?>
                </div>
            <?php
            }
            if (isset($_GET['eliminar'])) {
                $salida = "";
                if (isset($_POST['eliminar'])) {
                    $eliminar = eliminar("dispositivos", $_GET['id']);
                    if ($eliminar) {
                        header("Location: " . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos");
                    } elseif (!$eliminar) {
                        $salida = "Error al eliminar la empresa";
                    } else {
                        $salida = "La empresa que has intentado eliminar no existe";
                    }
                } elseif (isset($_POST['cancelar'])) {
                    header("Location: " . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos");
                }
            ?>
                <div class="view eliminar">
                    <h3>¿Eliminar dispositivo con ID <?php echo $_GET['id']; ?>?</h3>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="confirmar">
                        <input type="submit" name="eliminar" value="Sí">
                        <input type="submit" name="cancelar" value="No">
                    </form>
                    <h4><?php echo $salida; ?></h4>
                </div>
            <?php
            }
            $tiposDispositivo = ["equipos", "impresoras", "moviles", "red", "otros"];
            $consulta = mysqli_query($bbdd, "SELECT id, marca, modelo, numeroSerie FROM dispositivos");
            ?>
            <a href="<?php $_SERVER['PHP_SELF'] ?>?tipo=Dispositivos&aniadir=true" class="add"><img src="../images/add.png" alt="Crear"><h4>Añadir dispositivo</h4></a>
            <?php
            echo "<table class='viewTable'>\n";
            echo "<tr>\n";
            echo "<th>ID</th>\n";
            echo "<th>Número de serie</th>\n";
            echo "<th>Marca</th>\n";
            echo "<th>Modelo</th>\n";
            echo "<th>Tipo</th>\n";
            echo "<th>Ver</th>\n";
            echo "<th>Editar</th>\n";
            echo "<th>Eliminar</th>\n";
            echo "</tr>\n";
            while ($dispositivos = mysqli_fetch_array($consulta)) {
                echo "<tr>\n";
                echo "<td>" . $dispositivos['id'] . "</td>\n";
                echo "<td>" . $dispositivos['numeroSerie'] . "</td>\n";
                echo "<td>" . $dispositivos['marca'] . "</td>\n";
                echo "<td>" . $dispositivos['modelo'] . "</td>\n";
                for ($i = 0; $i < sizeof($tiposDispositivo); $i++) {
                    $tabla = $tiposDispositivo[$i];
                    $consultaTipoDispositivo = mysqli_query($bbdd, "SELECT id FROM $tabla WHERE id = " . $dispositivos['id']);
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
                echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos&id=" . $dispositivos['id'] . "&ver=true'><img src='../images/visibility.png'></a></td>\n";
                echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos&id=" . $dispositivos['id'] . "&editar=true'><img src='../images/edit.png'></a></td>\n";
                echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos&id=" . $dispositivos['id'] . "&eliminar=true'><img src='../images/delete.png' alt='Eliminar'></a></td>\n";
                echo "</tr>\n";
            }
            echo "</table>\n";
            mysqli_free_result($consultaTipoDispositivo);
        } elseif ($_GET['tipo'] == "Usuarios") {
            if (isset($_GET['ver'])) {
                $id = $_GET['id'];
                $consulta = mysqli_query($bbdd, "SELECT us.id AS 'usuario', us.nombre AS 'nombre', nombreUsuario, us.correo AS 'correoUsuario', us.telefono AS 'telefonoUsuario', bloqueado, em.id AS 'empresa', cif, em.nombre AS 'razonSocial', em.correo AS 'correoEmpresa', em.telefono AS 'telefonoEmpresa', direccion, cp FROM usuarios us INNER JOIN empresas em ON us.empresa = em.id WHERE us.id = $id");
                $usuario = mysqli_fetch_array($consulta);
                echo "<div class='view'>\n";
                echo "<a href='" . $_SERVER['PHP_SELF'] . "?tipo=Usuarios' class='float-right fixed-button'><img src='../images/close.png' alt='Cerrar ventana'></a>";
                echo "<h3>Datos del usuario</h3>\n";
                echo "<p>Identificador: " . $usuario['usuario'] . "</p>\n";
                echo "<p>Nombre completo: " . $usuario['nombre'] . "</p>\n";
                echo "<p>Nombre de usuario: " . $usuario['nombreUsuario'] . "</p>\n";
                echo "<p>Correo electrónico: " . $usuario['correoUsuario'] . "</p>\n";
                echo "<p>Teléfono: " . $usuario['telefonoUsuario'] . "</p>\n";
                echo "<p>Habilitado: ";
                if ($usuario['bloqueado'] == 1) {
                    echo "no";
                } else {
                    echo "sí";
                }
                echo "</p>\n";
                echo "<br>\n";
                echo "<h3>Datos de la empresa</h3>\n";
                echo "<p>Identificador: " . $usuario['empresa'] . "</p>\n";
                echo "<p>CIF: " . $usuario['cif'] . "</p>\n";
                echo "<p>Razón social: " . $usuario['razonSocial'] . "</p>\n";
                echo "<p>Correo electrónico: " . $usuario['correoEmpresa'] . "</p>\n";
                echo "<p>Teléfono: " . $usuario['telefonoEmpresa'] . "</p>\n";
                echo "<p>Dirección: " . $usuario['direccion'] . "</p>\n";
                echo "<p>Código postal: " . $usuario['cp'] . "</p>\n";
                echo "</div>\n";
            }
            if (isset($_GET['aniadir'])) {
            ?>
                <div class="view">
                    <h3>Registrar usuario</h3>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Usuarios'; ?>" class="float-right fixed-button"><img src="../images/close.png" alt="Cerrar ventana"></a>
                    <?php
                        $salida = "";
                        if (isset($_POST['aniadir'])) {
                            $idUsuario = $_POST['id'];
                            $empresa = $_POST['empresa'];
                            $nombre = $_POST['nombre'];
                            $nombreUsuario = $_POST['nombreUsuario'];
                            $correo = $_POST['correo'];
                            $contrasenia = $_POST['contrasenia'];
                            $contraseniaCifrada = hash('sha512', $_POST['contrasenia']);
                            $telefono = $_POST['telefono'];
                            if ($_POST['bloqueado'] == "on") {
                                $bloqueado = 1;
                            } else {
                                $bloqueado = 0;
                            }
                            if (insertar("usuarios", "INSERT INTO usuarios VALUES ($idUsuario, $empresa, '$nombre', '$nombreUsuario', '$correo', '$contraseniaCifrada', '$telefono', $bloqueado)", $idUsuario)) {
                                $salida = "Usuario creado.";
                                enviarCorreo("noreply.resolvepluses@gmail.com" , $correo, "Bienvenido a Resolve+", "bienvenida", ["nombreUsuario" => $nombreUsuario, "correo" => $correo, "contrasenia" => $contrasenia]);
                            } else {
                                $salida = "No se ha podido crear el usuario.";
                            }
                        }
                        echo "<br>\n<h4>" . $salida . "</h4>\n";
                    ?>
                    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>?tipo=Usuarios&aniadir=true">
                        <input type="text" name="id" value="<?php echo ultimoId("usuarios") ?>" readonly required><br>
                        <select name="empresa" required>
                            <option value="" selected>Empresa*</option>
                            <?php
                                $consultaEmpresas = mysqli_query($bbdd, "SELECT id, nombre FROM empresas");
                                while ($empresas = mysqli_fetch_array($consultaEmpresas)) {
                                    echo "<option value='" . $empresas['id'] . "'>" . $empresas['nombre'] . "</option>\n";
                                }
                                mysqli_fetch_array($consultaEmpresas);
                            ?>
                        </select><br>
                        <input type="text" name="nombre" placeholder="Nombre completo*" required><br>
                        <input type="text" name="nombreUsuario" id="nombreUsuario" placeholder="Nombre de usuario+" required><br>
                        <input type="text" name="correo" id="correoElectronico" placeholder="Correo electrónico*" oninput="crearNombreUsuario(true)" required><br>
                        <input type="text" name="contrasenia" id="contrasenia" placeholder="Contraseña+" required><br>
                        <input type="text" name="telefono" placeholder="Teléfono*" required><br>
                        <div class="check"><input type="checkbox" name="bloqueado" checked>Habilitar</div><br>
                        <input type="submit" name="aniadir" value="Registrar usuario">
                    </form>
                    <br>
                    <p>Los campos marcados con * son obligatorios.</p>
                    <p>Los campos marcados con + se rellenan automáticamente, aunque son modificables.</p>
                </div>
            <?php
            }
            if (isset($_GET['editar'])) {
            ?>
                <div class="view">
                    <h3>Editar usuario</h3>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Usuarios'; ?>" class="float-right fixed-button"><img src="../images/close.png" alt="Cerrar ventana"></a>
                    <form method="POST" action="register.php?tipo=Usuarios">
                        <br>
                        <input type="submit" value="Editar usuario">
                    </form>
                </div>
            <?php
            }
            if (isset($_GET['eliminar'])) {
                $salida = "";
                if (isset($_POST['eliminar'])) {
                    $eliminar = eliminar("usuarios", $_GET['id']);
                    if ($eliminar) {
                        header("Location: " . $_SERVER['PHP_SELF'] . "?tipo=Usuarios");
                    } elseif (!$eliminar) {
                        $salida = "Error al eliminar el usuario";
                    } else {
                        $salida = "El usuario que has intentado eliminar no existe";
                    }
                } elseif (isset($_POST['cancelar'])) {
                    header("Location: " . $_SERVER['PHP_SELF'] . "?tipo=Usuarios");
                }
            ?>
            <div class="view eliminar">
                <h3>¿Eliminar usuario con ID <?php echo $_GET['id']; ?>?</h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="confirmar">
                    <input type="submit" name="eliminar" value="Sí">
                    <input type="submit" name="cancelar" value="No">
                </form>
                <h4><?php echo $salida; ?></h4>
            </div>
            <?php
            }
            if (isset($_GET['empresa'])) {
                $instruccion = "SELECT id, nombre, correo, telefono FROM usuarios WHERE empresa = " . $_GET['empresa'];
            } else {
                $instruccion = "SELECT id, nombre, correo, telefono FROM usuarios";
            }
            ?>
            <a href="<?php $_SERVER['PHP_SELF'] ?>?tipo=Usuarios&aniadir=true" class="add"><img src="../images/add.png" alt="Crear"><h4>Crear usuario</h4></a>
            <table class="viewTable">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Número de teléfono</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                <tr>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>?tipo=Usuarios" method="POST" class="filter">
                        <td><input type="text" name="id" placeholder="Filtrar por ID"></td>
                        <td><input type="text" name="nombre" placeholder="Filtrar por nombre"></td>
                        <td><input type="text" name="correo" placeholder="Filtrar por correo"></td>
                        <td><input type="text" name="telefono" placeholder="Filtrar por teléfono"></td>
                        <td><input type="submit" name="aplicar" value="Aplicar filtros"></td>
                        <td></td>
                        <td><input type="submit" name="vaciar" value="Vaciar filtros"></td>
                    </form>
                </tr>
            <?php
            if (isset($_POST['aplicar'])) {
                $instruccion = "SELECT id, nombre, correo, telefono, empresa FROM usuarios WHERE 1=1";
                if (isset($_POST['nombre']) AND !empty($_POST['nombre'])) {
                    $instruccion .= " AND nombre LIKE '%" . $_POST['nombre'] . "%'";
                }
                if (isset($_POST['correo']) AND !empty($_POST['correo'])) {
                    $instruccion .= " AND correo LIKE '%" . $_POST['correo'] . "%'";
                }
                if (isset($_POST['telefono']) AND !empty($_POST['telefono'])) {
                    $instruccion .= " AND telefono LIKE '%" . $_POST['telefono'] . "%'";
                }
                if (isset($_POST['id']) AND !empty($_POST['id'])) {
                    $instruccion .= " AND id = " . $_POST['id'];
                }
            }
            $instruccion .= " ORDER BY empresa, nombre";
            $consulta = mysqli_query($bbdd, $instruccion);
            while ($usuarios = mysqli_fetch_array($consulta)) {
                echo "<tr>\n";
                echo "<td>" . $usuarios['id'] . "</td>\n";
                echo "<td>" . $usuarios['nombre'] . "</td>\n";
                echo "<td>" . $usuarios['correo'] . "</td>\n";
                echo "<td>" . $usuarios['telefono'] . "</td>\n";
                    echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Usuarios&id=" . $usuarios['id'] . "&ver=true'><img src='../images/visibility.png' alt='Ver'></a></td>\n";
                echo "<td><img src='../images/edit.png' alt='Editar'></td>\n";
                echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Usuarios&id=" . $usuarios['id'] . "&eliminar=true'><img src='../images/delete.png' alt='Eliminar'></a></td>\n";
                echo "</tr>\n";
            }
            echo "</table>\n";
        } elseif ($_GET['tipo'] == "Empresas") {
            if (isset($_GET['ver'])) {
                $id = $_GET['id'];
                $consulta = mysqli_query($bbdd, "SELECT id, cif, nombre, correo, telefono, direccion, cp FROM empresas WHERE id = $id");
                $empresas = mysqli_fetch_array($consulta);
                echo "<div class='view'>\n";
                echo "<a href='" . $_SERVER['PHP_SELF'] . "?tipo=Empresas' class='float-right fixed-button'><img src='../images/close.png' alt='Cerrar ventana'></a>";
                echo "<h3>Datos de la empresa</h3>\n";
                echo "<p>Identificador: " . $empresas['id'] . "</p>\n";
                echo "<p>CIF: " . $empresas['cif'] . "</p>\n";
                echo "<p>Razón social: " . $empresas['nombre'] . "</p>\n";
                echo "<p>Correo electrónico: " . $empresas['correo'] . "</p>\n";
                echo "<p>Teléfono: " . $empresas['telefono'] . "</p>\n";
                echo "<p>Dirección: " . $empresas['direccion'] . "</p>\n";
                echo "<p>Código postal: " . $empresas['cp'] . "</p>\n";
                echo "<br>\n";
                echo "<p><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Usuarios&empresa=" . $id . "'>Ver usuarios de la empresa</a></p>\n";
                echo "</div>\n";
            }
            if (isset($_GET['aniadir'])) {
            ?>
                <div class="view">
                    <h3>Registrar una empresa</h3>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Empresas'; ?>" class="float-right fixed-button"><img src="../images/close.png" alt="Cerrar ventana"></a>
                    <form method="POST" action="register.php?tipo=Empresas">
                        <input type="text" name="id" value="<?php echo ultimoId("empresas"); ?>" readonly required><br>
                        <input type="text" name="cif" placeholder="CIF*" required><br>
                        <input type="text" name="nombre" placeholder="Razón social*" required><br>
                        <input type="text" name="correo" placeholder="Correo electrónico*" required><br>
                        <input type="text" name="telefono" placeholder="Teléfono*" required><br>
                        <input type="text" name="direccion" placeholder="Dirección*" required><br>
                        <input type="text" name="cp" placeholder="Código postal*" required><br>
                        <br>
                        <input type="submit" value="Registrar empresa">
                    </form>
                    <br>
                    <p>Los campos marcados con * son obligatorios.</p>
                </div>
            <?php
            }
            if (isset($_GET['eliminar'])) {
                $salida = "";
                if (isset($_POST['eliminar'])) {
                    $eliminar = eliminar("empresas", $_GET['id']);
                    if ($eliminar) {
                        header("Location: " . $_SERVER['PHP_SELF'] . "?tipo=Empresas");
                    } elseif (!$eliminar) {
                        $salida = "Error al eliminar el usuario";
                    } else {
                        $salida = "El usuario que has intentado eliminar no existe";
                    }
                } elseif (isset($_POST['cancelar'])) {
                    header("Location: " . $_SERVER['PHP_SELF'] . "?tipo=Empresas");
                }
            ?>
                <div class="view eliminar">
                    <h3>¿Eliminar empresa con ID <?php echo $_GET['id']; ?>?</h3>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="confirmar">
                        <input type="submit" name="eliminar" value="Sí">
                        <input type="submit" name="cancelar" value="No">
                    </form>
                    <h4><?php echo $salida; ?></h4>
                </div>
            <?php
            }
            ?>
            <a href="<?php $_SERVER['PHP_SELF'] ?>?tipo=Empresas&aniadir=true" class="add"><img src="../images/add.png" alt="Crear"><h4>Añadir empresa</h4></a>
            <table class="viewTable">
                <tr>
                    <th>ID</th>
                    <th>CIF</th>
                    <th>Razón social</th>
                    <th>Correo electrónico</th>
                    <th>Ver</th>
                    <th>Eliminar</th>
                </tr>
                <tr>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>?tipo=Empresas" method="POST" class="filter">
                        <td><input type="text" name="id" placeholder="Filtrar por ID"></td>
                        <td><input type="text" name="cif" placeholder="Filtrar por CIF"></td>
                        <td><input type="text" name="nombre" placeholder="Filtrar por razón social"></td>
                        <td><input type="text" name="correo" placeholder="Filtrar por correo"></td>
                        <td><input type="submit" name="aplicar" value="Aplicar filtros"></td>
                        <td><input type="submit" name="vaciar" value="Vaciar filtros"></td>
                    </form>
                </tr>
            <?php
                if (isset($_POST['aplicar'])) {
                    if (isset($_POST['cif'])) {
                        $cif = $_POST['cif'];
                    }
                    if (isset($_POST['nombre'])) {
                        $nombre = $_POST['nombre'];
                    }
                    if (isset($_POST['correo'])) {
                        $correo = $_POST['correo'];
                    }
                    if (isset($_POST['id']) AND !empty($_POST['id'])) {
                        $idFiltro = $_POST['id'];
                        $consulta = mysqli_query($bbdd, "SELECT id, cif, nombre, correo FROM empresas WHERE (cif LIKE '%$cif%' OR nombre LIKE '%$nombre%' OR correo LIKE '%$correo%') AND id = $idFiltro");
                    } else {
                        $consulta = mysqli_query($bbdd, "SELECT id, cif, nombre, correo FROM empresas WHERE cif LIKE '%$cif%' AND nombre LIKE '%$nombre%' AND correo LIKE '%$correo%'");
                    }
                } else {
                    $consulta = mysqli_query($bbdd, "SELECT id, cif, nombre, correo FROM empresas");
                }
                while ($empresas = mysqli_fetch_array($consulta)) {
                    echo "<tr>\n";
                    echo "<td>" . $empresas['id'] . "</td>\n";
                    echo "<td>" . $empresas['cif'] . "</td>\n";
                    echo "<td>" . $empresas['nombre'] . "</td>\n";
                    echo "<td>" . $empresas['correo'] . "</td>\n";
                    echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Empresas&id=" . $empresas['id'] . "&ver=true'><img src='../images/visibility.png' alt='Ver'></a></td>\n";
                    echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Empresas&id=" . $empresas['id'] . "&eliminar=true'><img src='../images/delete.png' alt='Eliminar'></a></td>\n";
                    echo "</tr>\n";
                }
            echo "</table>\n";
        } elseif ($_GET['tipo'] == "Tecnicos") {
            if (isset($_GET['ver'])) {
                $id = $_GET['id'];
                $consulta = mysqli_query($bbdd, "SELECT id, nombre, nombreUsuario, correo, telefono, bloqueado FROM tecnicos WHERE id = $id");
                $tecnico = mysqli_fetch_array($consulta);
                echo "<div class='view'>\n";
                echo "<a href='" . $_SERVER['PHP_SELF'] . "?tipo=Tecnicos' class='float-right fixed-button'><img src='../images/close.png' alt='Cerrar ventana'></a>";
                echo "<h3>Datos del técnico</h3>\n";
                echo "<p>Identificador: " . $tecnico['id'] . "</p>\n";
                echo "<p>Nombre completo: " . $tecnico['nombre'] . "</p>\n";
                echo "<p>Nombre de usuario: " . $tecnico['nombreUsuario'] . "</p>\n";
                echo "<p>Correo electrónico: " . $tecnico['correo'] . "</p>\n";
                echo "<p>Teléfono: " . $tecnico['telefono'] . "</p>\n";
                echo "<p>Habilitado: ";
                if ($tecnico['bloqueado'] == 1) {
                    echo "no";
                } else {
                    echo "sí";
                }
                echo "</p>\n";
                echo "</div>\n";
            }
            if (isset($_GET['aniadir'])) {
            ?>
            <div class="view">
                <h3>Registrar técnico</h3>
                <a href=" <?php echo $_SERVER['PHP_SELF'] . '?tipo=Tecnicos'; ?>" class="float-right fixed-button"><img src="../images/close.png" alt="Cerrar ventana"></a>
                <?php
                    $salida = "";
                    if (isset($_POST['aniadir'])) {
                        $idTecnico = $_POST['id'];
                        $empresa = $_POST['empresa'];
                        $nombre = $_POST['nombre'];
                        $nombreUsuario = $_POST['nombreUsuario'];
                        $correo = $_POST['correo'];
                        $telefono = $_POST['telefono'];
                        if ($_POST['bloqueado'] == "on") {
                            $bloqueado = 1;
                        } else {
                            $bloqueado = 0;
                        }
                        if ($insertar("usuarios", "INSERT INTO tecnicos VALUES ($idTecnico, $empresa, '$nombre', '$nombreUsuario', '$correo', '$telefono', $bloqueado)")) {
                            $salida = "Usuario creado.";
                            
                        } else {
                            $salida = "No se ha podido crear el usuario.";
                        }
                    }
                    echo "<h4>" . $salida . "</h4>\n";
                ?>
                <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <input type="text" name="id" value="<?php echo ultimoId("tecnicos") ?>" readonly><br>
                    <input type="text" name="nombre" placeholder="Nombre completo*"><br>
                    <input type="text" name="nombreTecnico" id="nombreTecnico" placeholder="Nombre de usuario+" readonly><br>
                    <input type="text" name="correo" id="correoElectronico" placeholder="Correo electrónico*" oninput="crearNombreUsuario(true, true)"><br>
                    <input type="text" name="contrasenia" id="contrasenia" placeholder="Contraseña+"><br>
                    <input type="text" name="telefono" placeholder="Teléfono*"><br>
                    <select name="areas">
                        <option value="" selected>Área/s*</option>
                        <?php
                            $consultaAreas = mysqli_query($bbdd, "SELECT id, denominacion FROM areas");
                            while ($areas = mysqli_fetch_array($consultaAreas)) {
                                echo "<option value='" . $areas['id'] . "'>" . $areas['denominacion'] . "</option>\n";
                            }
                            mysqli_free_result($consultaAreas);
                        ?>
                    </select><br>
                    <div class="check"><input type="checkbox" name="bloqueado" checked>Habilitar</div><br>
                    <input type="submit" name="aniadir" value="Registrar usuario">
                </form>
                <br>
                <p>Los campos marcados con * son obligatorios.</p>
                <p>Los campos marcados con + se rellenan automáticamente.</p>
            </div>
            <?php
                }
                if (isset($_GET['editar'])) {
            ?>
            <div class="view">
                <h3>Editar usuario</h3>
                <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Tecnicos'; ?>" class="float-right fixed-button"><img src="../images/close.png" alt="Cerrar ventana"></a>
                <form method="POST" action="register.php?tipo=Tecnicos">
                    <br>
                    <input type="submit" value="Editar técnico">
                </form>
            </div>
            <?php
                }
                if (isset($_GET['eliminar'])) {
                    $salida = "";
                    if (isset($_POST['eliminar'])) {
                        $eliminar = eliminar("tecnicos", $_GET['id']);
                        if ($eliminar) {
                            header("Location: " . $_SERVER['PHP_SELF'] . "?tipo=Tecnicos");
                        } elseif (!$eliminar) {
                            $salida = "Error al eliminar el técnico";
                        } else {
                            $salida = "El técnico que has intentado eliminar no existe";
                        }
                    } elseif (isset($_POST['cancelar'])) {
                        header("Location: " . $_SERVER['PHP_SELF'] . "?tipo=Tecnicos");
                    }
            ?>
            <div class="view eliminar">
                <h3>¿Eliminar técnico con ID <?php echo $_GET['id']; ?>?</h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="confirmar">
                    <input type="submit" name="eliminar" value="Sí">
                    <input type="submit" name="cancelar" value="No">
                </form>
                <h4><?php echo $salida; ?></h4>
            </div>
            <?php
                }
            ?>
            <a href="<?php $_SERVER['PHP_SELF'] ?>?tipo=Tecnicos&aniadir=true" class="add"><img src="../images/add.png" alt="Crear"><h4>Crear tecnico</h4></a>
            <table class="viewTable">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Número de teléfono</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                <tr>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>?tipo=Tecnicos" method="POST" class="filter">
                        <td><input type="text" name="id" placeholder="Filtrar por ID"></td>
                        <td><input type="text" name="nombre" placeholder="Filtrar por nombre"></td>
                        <td><input type="text" name="correo" placeholder="Filtrar por correo"></td>
                        <td><input type="text" name="telefono" placeholder="Filtrar por teléfono"></td>
                        <td><input type="submit" name="aplicar" value="Aplicar filtros"></td>
                        <td></td>
                        <td><input type="submit" name="vaciar" value="Vaciar filtros"></td>
                    </form>
                </tr>
            <?php
                if (isset($_POST['aplicar'])) {
                    $instruccion = "SELECT id, nombre, correo, telefono FROM tecnicos WHERE 1=1";
                    if (isset($_POST['nombre']) AND !empty($_POST['nombre'])) {
                        $instruccion .= " AND nombre LIKE '%" . $_POST['nombre'] . "%'";
                    }
                    if (isset($_POST['correo']) AND !empty($_POST['correo'])) {
                        $instruccion .= " AND correo LIKE '%" . $_POST['correo'] . "%'";
                    }
                    if (isset($_POST['telefono']) AND !empty($_POST['telefono'])) {
                        $instruccion .= " AND telefono LIKE '%" . $_POST['telefono'] . "%'";
                    }
                    if (isset($_POST['id']) AND !empty($_POST['id'])) {
                        $instruccion .= " AND id = " . $_POST['id'];
                    }
                } else {
                    $instruccion = "SELECT id, nombre, correo, telefono FROM tecnicos";
                }
                $consulta = mysqli_query($bbdd, $instruccion);
                while ($tecnicos = mysqli_fetch_array($consulta)) {
                    echo "<tr>\n";
                    echo "<td>" . $tecnicos['id'] . "</td>\n";
                    echo "<td>" . $tecnicos['nombre'] . "</td>\n";
                    echo "<td>" . $tecnicos['correo'] . "</td>\n";
                    echo "<td>" . $tecnicos['telefono'] . "</td>\n";
                        echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Tecnicos&id=" . $tecnicos['id'] . "&ver=true'><img src='../images/visibility.png' alt='Ver'></a></td>\n";
                    echo "<td><img src='../images/edit.png' alt='Editar'></td>\n";
                    echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Tecnicos&id=" . $tecnicos['id'] . "&eliminar=true'><img src='../images/delete.png' alt='Eliminar'></a></td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";
        }
    ?>
    </table>
</main>
<?php
    include("footer.php");
    // mysqli_free_result($consulta);
    mysqli_close($bbdd);
?>
</body>
</html>