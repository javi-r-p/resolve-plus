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
    <script src="../../scripts/utils.js"></script>
    <script>

    </script>
    <?php
        require("../../../etc/config.php");
        include("../../../etc/db_functions.php")
    ?>
</head>
<body>
    <header>
        <button class="float-left"><a href="../authentication.php?accion=logout"><img src="../../images/white/logout.png" alt="Cerrar sesión"></a></button>
        <button class="float-left"><a href="modify.php?tipo=tecnico"><img src="../../images/white/password.png" alt="Cambiar contraseña"></a></button>
        <h1 class="center">Gestión de <?php echo strtolower($_GET['tipo']); ?></h1>
        <button class="float-right"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?tipo=Dispositivos&aniadir=true">Añadir dispositivo<img src="../../images/white/add.png" alt="Añadir dispositivo"></a></button>
    </header>
    <nav>
        <hr>
        <a href="../index.php">Dashboard</a>
        <hr>
        <p><strong>Gestión</strong></p>
        <hr class="sameType">
        <a href="management.php?tipo=Dispositivos">Dispositivos</a>
        <a href="management.php?tipo=Usuarios">Usuarios</a>
        <a href="management.php?tipo=Empresas">Empresas</a>
        <a href="management.php?tipo=Tecnicos">Técnicos</a>
        <hr>
        <p><strong>Otros</strong></p>
        <hr class="sameType">
        <a href="statistics.php">Estadísticas</a>
        <hr>
    </nav>
    <main>
        <?php
            if ($_GET['tipo'] == "Dispositivos") {
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $consulta = mysqli_query($bbdd, "SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'equipos' AS tipo FROM dispositivos JOIN equipos ON dispositivos.id = equipos.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id UNION SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'impresoras' AS tipo FROM dispositivos JOIN impresoras ON dispositivos.id = impresoras.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id UNION SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'moviles' AS tipo FROM dispositivos JOIN moviles ON dispositivos.id = moviles.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id UNION SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'red' AS tipo FROM dispositivos JOIN red ON dispositivos.id = red.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id UNION SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'otros' AS tipo FROM dispositivos JOIN otros ON dispositivos.id = otros.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id");
                    $resultados = mysqli_fetch_array($consulta);
                    $tipo = $resultados['tipo'];
                    echo "<div class='view'>\n";
                        echo "<h3>Datos del dispositivo</h3>\n";
                        echo "<a href='" . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos' class='float-right fixed-button'><img src='../../images/close.png' alt='Cerrar ventana'></a>\n";
                        echo "<p>Identificador: " . $resultados['idDispositivo'] . "</p>\n";
                        echo "<p>Tipo: " . $resultados['tipo'] . "</p>\n";
                        echo "<p>Marca: " . $resultados['marca'] . "</p>\n";
                        echo "<p>Modelo: " . $resultados['modelo'] . "</p>\n";
                        echo "<p>Número de producto: " . $resultados['numeroProducto'] . "</p>\n";
                        echo "<p>Número de serie: <span id='numeroSerie'>" . $resultados['numeroSerie'] . "</span><img src='../../images/copy.png' alt='Copiar' onclick='copiar(\"numeroSerie\")'></p>\n";
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
                                echo "<p>Memoria secundaria (disco duro): " . $resultadosDatosEspecificos['almacenamiento'] . "</p>\n";
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
                                echo "<td>" . $historicoIncidencias['id'] . "</td>\n";
                                echo "<td>" . $historicoIncidencias['fechaApertura'] . "</td>\n";
                                echo "<td>" . $historicoIncidencias['fechaCierre'] . "</td>\n";
                                echo "</tr>\n";
                            }
                            echo "</table>\n";
                        }
                    echo "</div>\n";
                }
                if (isset($_GET['aniadir'])) {
                    ?>
                    <div class="view">
                        <h3>Registrar un dispositivo</h3>
                        <a href=" <?php echo $_SERVER['PHP_SELF'] . '?tipo=Dispositivos'; ?>" class="float-right fixed-button"><img src="../../images/close.png" alt="Cerrar ventana"></a>
                        <form method="POST" action="register.php?tipo=Dispositivo">
                            <label>Identificador: </label><input type="text" name="id" value="<?php echo ultimoId("dispositivos"); ?>" readonly required>
                            <br>
                            <label>Empresa: </label><select name="empresa" required>
                                <option value="" selected>Selecciona una empresa</option>
                                <?php
                                    $consultaEmpresas = mysqli_query($bbdd, "SELECT id, nombre FROM empresas");
                                    while ($empresas = mysqli_fetch_array($consultaEmpresas)) {
                                        echo "<option value='" . $empresas['id'] . "'>" . $empresas['nombre'] . "</option>\n";
                                    }
                                ?>
                            </select>
                            <br>
                            <label>Número de serie: </label><input type="text" name="numeroSerie" required>
                            <br>
                            <label>Número de producto: </label><input type="text" name="numeroProducto" required>
                            <br>
                            <label>Marca: </label><input type="text" name="marca" required>
                            <br>
                            <label>Modelo: </label><input type="text" name="modelo" required>
                            <br>
                            <label for="dispositivo">Selecciona un tipo de dispositivo:</label>
                            <select name="tipoDispositivo" id="seleccionDispositivo" oninput="mostrarCampos()" required>
                                <option value="">Selecciona una opción</option>
                                <option value="equipos">Equipo</option>
                                <option value="impresoras">Impresora</option>
                                <option value="moviles">Móvil</option>
                                <option value="red">Red</option>
                                <option value="otros">Otros</option>
                            </select>

                            <fieldset id="equipos" class="hidden">
                                <label>Servidor:</label><input type="radio" value="0" name="servidor">Cliente: <input type="radio" value="1" name="servidor" required><br>
                                <label>Procesador: </label><input type="text" name="procesador" required><br>
                                <label>Memoria: </label><input type="text" name="memoria" required><br>
                                <label>Almacenamiento: </label><input type="text" name="almacenamiento" required><br>
                                <label>Sistema: </label><input type="text" name="sistema" required><br>
                                <label>Versión: </label><input type="text" name="version" required><br>
                                <label>Tipo: </label><input type="text" name="tipo" required><br>
                                <label>Otros: </label><textarea name="otros"></textarea><br>
                            </fieldset>

                            <fieldset id="impresoras" class="hidden">
                                <label>Velocidad: </label><input type="text" name="velocidad" required><br>
                                <label>Resolución: </label><input type="text" name="resolucion" required><br>
                                <label>Método de Impresión: </label><input type="text" name="metodoImpresion" required><br>
                                <label>Solo B/N: </label><input type="radio" value="0" name="color">B/N y color: <input type="radio" value="1" name="color" required><br>
                            </fieldset>

                            <fieldset id="moviles" class="hidden">
                                <label>Procesador: </label><input type="text" name="procesador" required><br>
                                <label>Memoria: </label><input type="text" name="memoria" required><br>
                                <label>Almacenamiento: </label><input type="text" name="almacenamiento" required><br>
                                <label>Sistema: </label><input type="text" name="sistema" required><br>
                                <label>Versión: </label><input type="text" name="version" required><br>
                            </fieldset>

                            <fieldset id="red" class="hidden">
                                <label>Producto: </label><input type="text" name="producto" required><br>
                                <label>Interfaces: </label><input type="text" name="interfaces" required><br>
                                <label>Velocidad Máxima: </label><input type="text" name="velocidadMax" required><br>
                            </fieldset>

                            <fieldset id="otros" class="hidden">
                                <label>Denominación: </label><input type="text" name="denominacion" required><br>
                                <label>Características: </label><textarea name="caracteristicas" required></textarea><br>
                            </fieldset>
                            <br>
                            <input type="submit" value="Registrar dispositivo">
                        </form>
                    </div>
                <?php
                }
                if (isset($_GET['editar'])) {
                    $consultaTipoDispositivo = mysqli_query($bbdd, "SELECT id, 'equipos' AS 'tipo' FROM equipos WHERE id = $id UNION SELECT id, 'impresoras' AS 'tipo' FROM impresoras WHERE id = $id UNION SELECT id, 'moviles' AS 'tipo' FROM moviles WHERE id = $id UNION SELECT id, 'red' AS 'tipo' FROM red WHERE id = $id UNION SELECT id, 'otros' AS 'tipo' FROM otros WHERE id = $id");
                    $tipoDispositivo = mysqli_fetch_array($consultaTipoDispositivo);
                    ?>
                    <div class="view">
                        <h3>Editar dispositivo con ID <?php echo $id; ?></h3>
                        <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Dispositivos'; ?>" class="float-right fixed-button"><img src="../../images/close.png" alt="Cerrar ventana"></a>
                        <?php
                            if ($tipoDispositivo['tipo'] == "equipos") {
                                $consultaDatosActuales = mysqli_query($bbdd, "SELECT servidorCliente, procesador, memoria, almacenamiento, sistema, tipo, otros FROM equipos WHERE id = $id");
                                $datosActuales = mysqli_fetch_array($consultaDatosActuales);
                        ?>
                                <form method="POST" action="edit.php?tipo=DispositivoEquipo">
                                    <label>ID: </label><input type="text" name="id" value="<?php echo $id ?>" readonly><br>
                                    <label>¿Servidor? </label><input type="checkbox" name="servidor" <?php if ($datosActuales['servidorCliente'] == 1) {echo "checked"; } ?>><br>
                                    <label>Procesador: </label><input type="text" name="procesador" value="<?php echo $datosActuales['procesador']; ?>" required><br>
                                    <label>Memoria: </label><input type="text" name="memoria" value="<?php echo $datosActuales['memoria']; ?>" required><br>
                                    <label>Almacenamiento: </label><input type="text" name="almacenamiento" value="<?php echo $datosActuales['almacenamiento']; ?>" required><br>
                                    <label>Sistema: </label><input type="text" name="sistema" value="<?php echo $datosActuales['sistema']; ?>" required><br>
                                    <label>Tipo: </label><input type="text" name="tipo" value="<?php echo $datosActuales['tipo']; ?>" required><br>
                                    <label>Otros: </label><textarea name="otros" value="<?php echo $datosActuales['otros']; ?>"></textarea><br>
                                    <br>
                                    <input type="submit" value="Editar dispositivo">
                                </form>
                        <?php
                            } elseif ($tipoDispositivo['tipo'] == "impresoras") {
                        ?>
                                <form method="POST" action="edit.php?tipo=DispositivoImpresora">
                                    <label>Velocidad: </label><input type="text" name="velocidad" required><br>
                                    <label>Resolución: </label><input type="text" name="resolucion" required><br>
                                    <label>Método de Impresión: </label><input type="text" name="metodoImpresion" required><br>
                                    <label>Solo B/N: </label><input type="radio" value="0" name="color">B/N y color: <input type="radio" value="1" name="color" required><br>
                                    <br>
                                    <input type="submit" value="Editar dispositivo">
                                </form>
                        <?php
                            } elseif ($tipoDispositivo['tipo'] == "moviles") {
                        ?>
                                <form method="POST" action="edit.php?tipo=DispositivoMovil">
                                    <label>Procesador: </label><input type="text" name="procesador" required><br>
                                    <label>Memoria: </label><input type="text" name="memoria" required><br>
                                    <label>Almacenamiento: </label><input type="text" name="almacenamiento" required><br>
                                    <label>Sistema: </label><input type="text" name="sistema" required><br>
                                    <label>Versión: </label><input type="text" name="version" required><br>
                                    <br>
                                    <input type="submit" value="Editar dispositivo">
                                </form>
                        <?php
                            } elseif ($tipoDispositivo['tipo'] == "red") {
                        ?>
                        <form method="POST" action="edit.php?tipo=DispositivoRed">
                            <label>Producto: </label><input type="text" name="producto" required><br>
                            <label>Interfaces: </label><input type="text" name="interfaces" required><br>
                            <label>Velocidad Máxima: </label><input type="text" name="velocidadMax" required><br>
                            <br>
                            <input type="submit" value="Editar dispositivo">
                        </form>
                        <?php
                            } elseif ($tipoDispositivo['tipo'] == "otros") {
                        ?>
                        <form method="POST" action="edit.php?tipo=DispositivoOtros">
                            <label>Denominación: </label><input type="text" name="denominacion" required><br>
                            <label>Características: </label><textarea name="caracteristicas" required></textarea><br>
                            <br>
                            <input type="submit" value="Editar dispositivo">
                        </form>
                        <?php
                            } elseif ($tipoDispositivo == "impresora") {
                                echo "<p>Parámetros inválidos</p>";
                            }
                        ?>
                    </div>
                <?php
                }
                $tiposDispositivo = ["equipos", "impresoras", "moviles", "red", "otros"];
                $consulta = mysqli_query($bbdd, "SELECT id, marca, modelo, numeroSerie FROM dispositivos");
                echo "<table class='viewTable'>\n";
                echo "<tr>\n";
                echo "<th>ID</th>\n";
                echo "<th>Número de serie</th>\n";
                echo "<th>Marca</th>\n";
                echo "<th>Modelo</th>\n";
                echo "<th>Tipo de dispositivo</th>\n";
                echo "<th>Ver</th>\n";
                echo "<th>Editar</th>\n";
                echo "<th>Eliminar</th>\n";
                echo "</tr>\n";
                while ($resultados = mysqli_fetch_array($consulta)) {
                    echo "<tr>\n";
                    echo "<td><a href='management.php?tipo=Dispositivos&id=" . $resultados['id'] . "'>" . $resultados['id'] . "</a></td>\n";
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
                    echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos&id=" . $resultados['id'] . "'><img src='../../images/visibility.png'></a></td>\n";
                    echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos&id=" . $resultados['id'] . "&editar=true'><img src='../../images/edit.png'></a></td>\n";
                    echo "<td><a href='delete.php?id=" . $resultados['id'] . "&tipo=" . $_GET['tipo'] . "'><img src='../../images/delete.png'></a></td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";
            }
        ?>
    </main>
    <footer>
        <p>Página desarrollada bajo la licencia GPL2.0</p>
    </footer>
    <?php
        mysqli_free_result($consulta);
        mysqli_close($bbdd);
    ?>
</body>
</html>