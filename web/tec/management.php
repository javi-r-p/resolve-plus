<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Título de la página según el parámetro GET 'tipo' -->
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
    // Inclusión de archivos de configuración y funciones
    require("../../etc/config.php");
    require("../../phpmailer/sendmail.php");
    include("../../etc/db_functions.php");
    ?>
</head>

<body>
    <?php
    // Inclusión de la barra de navegación
    include("nav.php");
    ?>
    <main>
        <?php
        // Gestión de la vista de dispositivos
        if ($_GET['tipo'] == "Dispositivos") {
        ?>
            <!-- Botón para añadir un nuevo dispositivo -->
            <br>
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?tipo=Dispositivos&aniadir=true" class="add">Añadir dispositivo</a>
            <?php
            // Vista de un dispositivo concreto
            if (isset($_GET['ver'])) {
                $id = $_GET['id'];
                // Consulta para obtener los datos del dispositivo según su tipo
                $consulta = mysqli_query($bbdd, "SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'equipos' AS tipo FROM dispositivos JOIN equipos ON dispositivos.id = equipos.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id UNION SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'impresoras' AS tipo FROM dispositivos JOIN impresoras ON dispositivos.id = impresoras.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id UNION SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'moviles' AS tipo FROM dispositivos JOIN moviles ON dispositivos.id = moviles.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id UNION SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'red' AS tipo FROM dispositivos JOIN red ON dispositivos.id = red.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id UNION SELECT dispositivos.id AS 'idDispositivo', dispositivos.*, empresas.*, 'otros' AS tipo FROM dispositivos JOIN otros ON dispositivos.id = otros.id JOIN empresas ON dispositivos.empresa = empresas.id WHERE dispositivos.id = $id");
                $resultados = mysqli_fetch_array($consulta);
                $tipo = $resultados['tipo'];
                echo "<div class='view'>\n";
                echo "<h3>Datos del dispositivo</h3>\n";
                echo "<a href='" . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos' class='float-right fixed-button'><img src='../images/close.png' alt='Cerrar ventana'></a>\n";
                // Datos generales del dispositivo
                echo "<p>Identificador: " . $resultados['idDispositivo'] . "</p>\n";
                echo "<p>Tipo: " . $resultados['tipo'] . "</p>\n";
                echo "<p>Marca: " . $resultados['marca'] . "</p>\n";
                echo "<p>Modelo: " . $resultados['modelo'] . "</p>\n";
                echo "<p>Número de producto: " . $resultados['numeroProducto'] . "</p>\n";
                echo "<p>Número de serie: " . $resultados['numeroSerie'] . "</p>\n";
                echo "<br>\n";
                echo "<h3>Datos específicos</h3>\n";
                // Mostrar datos específicos según el tipo de dispositivo
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
                // Liberar resultados de la consulta
                mysqli_free_result($consultaDatosEspecificos);
                echo "<br>\n";
                echo "<h3>Empresa</h3>\n";
                // Mostrar datos de la empresa asociada
                echo "<p>Identificador: " . $resultados['id'] . "</p>\n";
                echo "<p>Razón social: " . $resultados['nombre'] . "</p>\n";
                echo "<p>CIF: " . $resultados['cif'] . "</p>\n";
                echo "<p>Correo electrónico: " . $resultados['correo'] . "</p>\n";
                echo "<p>Teléfono: " . $resultados['telefono'] . "</p>\n";
                echo "<p>Dirección: " . $resultados['direccion'] . "</p>\n";
                echo "<p>Código postal: " . $resultados['cp'] . "</p>\n";
                echo "</div>\n";
            }
            // Formulario para añadir un nuevo dispositivo
            if (isset($_GET['aniadir'])) {
                if (isset($_POST['tipoDispositivo'])) {
                    // Procesamiento del formulario de alta de dispositivo
                    $idDispositivo = ultimoId("dispositivos");
                    $empresa = mysqli_real_escape_string($bbdd, $_POST['empresa']);
                    $numeroSerie = mysqli_real_escape_string($bbdd, $_POST['numeroSerie']);
                    $numeroProducto = mysqli_real_escape_string($bbdd, $_POST['numeroProducto']);
                    $marca = mysqli_real_escape_string($bbdd, $_POST['marca']);
                    $modelo = mysqli_real_escape_string($bbdd, $_POST['modelo']);
                    $insertarDispositivo = insertar("dispositivos", "INSERT INTO dispositivos VALUES ($idDispositivo, $empresa, '$numeroSerie', '$numeroProducto', '$marca', '$modelo', 1)");
                    if ($insertarDispositivo) {
                        $tipoDispositivo = mysqli_real_escape_string($bbdd, $_POST['tipoDispositivo']);
                        // Ajuste de valores para campos booleanos
                        if ($tipoDispositivo == "impresoras" && !isset($_POST['color'])) {
                            $_POST['color'] = 1;
                        } elseif ($tipoDispositivo == "impresoras" && $_POST['color'] == "on") {
                            $_POST['color'] = 0;
                        } elseif ($tipoDispositivo == "equipos" && !isset($_POST['servidor'])) {
                            $_POST['servidor'] = 0;
                        } elseif ($tipoDispositivo == "equipos" && $_POST['servidor'] == "on") {
                            $_POST['servidor'] = 1;
                        }
                        // Construcción de la consulta de inserción para el tipo específico
                        $claveInicial = "tipoDispositivo";
                        $claves = array_keys($_POST);
                        $indiceInicial = array_search($claveInicial, $claves);
                        if ($indiceInicial !== false) {
                            $arrayRecorrido = array_slice($_POST, $indiceInicial + 1, null, true);
                            $valoresComillas = array_map(function ($value) {
                                return "'" . $value . "'"; // Añadir comillas a cada valor
                            }, $arrayRecorrido);
                            $datos = implode(",", $valoresComillas);
                        }
                        $insertarTipoDispositivo = insertar($tipoDispositivo, "INSERT INTO $tipoDispositivo VALUES(" . $idDispositivo . "," . $datos . ")", $idDispositivo);
                        if ($insertarTipoDispositivo) {
                            $salidaAniadirDispositivo = "<span class='ok'>Dispositivo añadido.</span>";
                        } elseif ($insertarTipoDispositivo == NULL) {
                            $salidaAniadirDispositivo = "<span class='error'>Ya existe un dispositivo con este ID. Recarga la página e inténtalo de nuevo.</span>";
                        } else {
                            $salidaAniadirDispositivo = "<span class='error'>No se ha podido añadir el dispositivo.</span>";
                        }
                    } elseif ($insertarDispositivo == NULL) {
                        $salidaAniadirDispositivo = "<span class='error'>Ya existe un dispositivo con este ID. Recarga la página e inténtalo de nuevo.</span>";
                    } else {
                        $salidaAniadirDispositivo = "<span class='error'>No se ha podido añadir el dispositivo.</span>";
                    }
                }
            ?>
                <!-- Formulario de registro de dispositivo -->
                <div class="view">
                    <h3>Registrar un dispositivo</h3>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Dispositivos'; ?>" class="float-right fixed-button"><img src="../images/close.png" alt="Cerrar ventana"></a>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Dispositivos&aniadir=true'; ?>">
                        <input type="text" name="id" value="<?php echo ultimoId("dispositivos"); ?>" readonly required>
                        <br>
                        <select name="empresa" required>
                            <option value="" selected>Empresa*</option>
                            <?php
                            // Listado de empresas para seleccionar
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
                        <!-- Selección del tipo de dispositivo -->
                        <select name="tipoDispositivo" id="seleccionDispositivo" oninput="mostrarCampos()" required>
                            <option value="" selected>Selecciona un tipo de dispositivo*</option>
                            <option value="equipos">Equipo</option>
                            <option value="impresoras">Impresora</option>
                            <option value="moviles">Móvil</option>
                            <option value="red">Red</option>
                            <option value="otros">Otros</option>
                        </select>
                        <br><br>
                        <!-- Campos específicos para cada tipo de dispositivo -->
                        <fieldset id="equipos" class="hidden">
                            <select name="servidorCliente" required>
                                <option value="">Elige una opción*</option>
                                <option value="1">Servidor</option>
                                <option value="0">Cliente</option>
                            </select>
                            <br>
                            <input type="text" name="procesador" placeholder="Procesador*" required><br>
                            <input type="text" name="memoria" placeholder="Memoria RAM*" required><br>
                            <input type="text" name="almacenamiento" placeholder="Almacenamiento*" required><br>
                            <input type="text" name="sistema" placeholder="Sistema operativo*" required><br>
                            <input type="text" name="tipo" placeholder="Tipo (torre, portátil, rack...)*" required><br>
                            <textarea name="otros" placeholder="Otras características"></textarea><br>
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
            // Formulario para editar un dispositivo
            if (isset($_GET['editar'])) {
                $id = $_GET['id'];
                // Consulta para saber el tipo de dispositivo
                $consultaTipoDispositivo = mysqli_query($bbdd, "SELECT id, 'equipos' AS 'tipo' FROM equipos WHERE id = $id UNION SELECT id, 'impresoras' AS 'tipo' FROM impresoras WHERE id = $id UNION SELECT id, 'moviles' AS 'tipo' FROM moviles WHERE id = $id UNION SELECT id, 'red' AS 'tipo' FROM red WHERE id = $id UNION SELECT id, 'otros' AS 'tipo' FROM otros WHERE id = $id");
                $tipoDispositivo = mysqli_fetch_array($consultaTipoDispositivo);
            ?>
                <!-- Formulario de edición según el tipo de dispositivo -->
                <div class="view">
                    <h3>Editar dispositivo con ID <?php echo $id; ?></h3>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Dispositivos'; ?>" class="float-right fixed-button"><img src="../images/close.png" alt="Cerrar ventana"></a>
                    <p>El número de producto, de serie, la marca, el modelo y la empresa a la que pertenece el dispositivo no se puede editar. Para ello, tendrás que eliminarlo y volverlo a añadir.</p>
                    <?php
                    // Formulario específico para cada tipo
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
                            <div class="check"><input type="checkbox" name="servidor" <?php if ($datosActuales['servidorCliente'] == 1) {
                                                                                            echo "checked";
                                                                                        } ?>>Servidor</div><br>
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
            // Confirmación para eliminar un dispositivo
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
                <div class="eliminar">
                    <h3>¿Eliminar dispositivo con ID <?php echo $_GET['id']; ?>?</h3>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="confirmar">
                        <input type="submit" name="eliminar" value="Sí">
                        <input type="submit" name="cancelar" value="No">
                    </form>
                    <h4><?php echo $salida; ?></h4>
                </div>
            <?php
            }
            // Tabla de dispositivos
            $tiposDispositivo = ["equipos", "impresoras", "moviles", "red", "otros"];
            $consulta = mysqli_query($bbdd, "SELECT id, marca, modelo, numeroSerie FROM dispositivos WHERE activo = 1");
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
                // Determinar el tipo de dispositivo
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
                                break;
                        }
                        echo "<td>" . $tipo . "</td>\n";
                    }
                }
                // Acciones: ver, editar, eliminar
                echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos&id=" . $dispositivos['id'] . "&ver=true'><img src='../images/visibility.png'></a></td>\n";
                echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos&id=" . $dispositivos['id'] . "&editar=true'><img src='../images/edit.png'></a></td>\n";
                echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Dispositivos&id=" . $dispositivos['id'] . "&eliminar=true'><img src='../images/delete.png' alt='Eliminar'></a></td>\n";
                echo "</tr>\n";
            }
            echo "</table>\n";
            // Liberar resultados de la consulta
            mysqli_free_result($consultaTipoDispositivo);
        } elseif ($_GET['tipo'] == "Usuarios") {
            ?>
            <!-- Botón para crear usuario -->
            <br>
            <a href="<?php $_SERVER['PHP_SELF'] ?>?tipo=Usuarios&aniadir=true" class="add">Crear usuario</a>
            <?php
            // Vista de usuario
            if (isset($_GET['ver'])) {
                $id = $_GET['id'];
                // Consulta para obtener datos del usuario y su empresa
                $consulta = mysqli_query($bbdd, "SELECT us.id AS 'usuario', us.nombre AS 'nombre', nombreUsuario, us.correo AS 'correoUsuario', us.telefono AS 'telefonoUsuario', bloqueado, em.id AS 'empresa', cif, em.nombre AS 'razonSocial', em.correo AS 'correoEmpresa', em.telefono AS 'telefonoEmpresa', direccion, cp FROM usuarios us INNER JOIN empresas em ON us.empresa = em.id WHERE us.id = $id");
                $usuario = mysqli_fetch_array($consulta);
                echo "<div class='view'>\n";
                echo "<a href='" . $_SERVER['PHP_SELF'] . "?tipo=Usuarios' class='float-right fixed-button'><img src='../images/close.png' alt='Cerrar ventana'></a>";
                echo "<h3>Datos del usuario</h3>\n";
                echo "<p>Identificador: " . $usuario['usuario'] . "</p>\n";
                echo "<p>Nombre completo: " . $usuario['nombre'] . "</p>\n";
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
            // Formulario para registrar usuario
            if (isset($_GET['aniadir'])) {
            ?>
                <div class="view">
                    <h3>Registrar usuario</h3>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Usuarios'; ?>" class="float-right fixed-button"><img src="../images/close.png" alt="Cerrar ventana"></a>
                    <?php
                    $salida = "";
                    // Procesamiento del formulario de alta de usuario
                    if (isset($_POST['aniadir'])) {
                        $idUsuario = $_POST['id'];
                        $empresa = $_POST['empresa'];
                        $nombre = $_POST['nombre'];
                        $correo = $_POST['correo'];
                        $contrasenia = $_POST['contrasenia'];
                        $contraseniaCifrada = hash('sha512', $_POST['contrasenia']);
                        $telefono = $_POST['telefono'];
                        if ($_POST['bloqueado'] == "on") {
                            $bloqueado = 0;
                        } else {
                            $bloqueado = 1;
                        }
                        if (insertar("usuarios", "INSERT INTO usuarios VALUES ($idUsuario, $empresa, '$nombre', '$correo', '$contraseniaCifrada', '$telefono', $bloqueado)", $idUsuario)) {
                            $salida = "Usuario creado.";
                            enviarCorreo("noreply.resolvepluses@gmail.com", $correo, "Bienvenido a Resolve+", "bienvenida", ["correo" => $correo, "contrasenia" => $contrasenia]);
                        } else {
                            $salida = "No se ha podido crear el usuario.";
                        }
                    }
                    echo "<br>\n<h4>" . $salida . "</h4>\n";
                    ?>
                    <!-- Formulario de registro de usuario -->
                    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>?tipo=Usuarios&aniadir=true">
                        <input type="text" name="id" value="<?php echo ultimoId("usuarios") ?>" readonly required><br>
                        <select name="empresa" required>
                            <option value="" selected>Empresa*</option>
                            <?php
                            // Listado de empresas
                            $consultaEmpresas = mysqli_query($bbdd, "SELECT id, nombre FROM empresas");
                            while ($empresas = mysqli_fetch_array($consultaEmpresas)) {
                                echo "<option value='" . $empresas['id'] . "'>" . $empresas['nombre'] . "</option>\n";
                            }
                            mysqli_fetch_array($consultaEmpresas);
                            ?>
                        </select><br>
                        <input type="text" name="nombre" placeholder="Nombre completo*" required><br>
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
            // Formulario para editar usuario
            if (isset($_GET['editar'])) {
                $id = $_GET['id'];
                $consultaUsuario = mysqli_query($bbdd, "SELECT * FROM usuarios WHERE id = $id");
                $usuario = mysqli_fetch_array($consultaUsuario);
                // Procesamiento del formulario de edición
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['id'];
                    $empresa = $_POST['empresa'];
                    $nombre = $_POST['nombre'];
                    $correo = $_POST['correo'];
                    $telefono = $_POST['telefono'];
                    $bloqueado = isset($_POST['bloqueado']) ? 0 : 1;
                    if (!empty($_POST['contrasenia'])) {
                        $contrasenia = hash('sha512', $_POST['contrasenia']);
                        $sql = "UPDATE usuarios SET empresa='$empresa', nombre='$nombre', correo='$correo', contrasenia='$contrasenia', telefono='$telefono', bloqueado='$bloqueado' WHERE id=$id";
                    } else {
                        $sql = "UPDATE usuarios SET empresa='$empresa', nombre='$nombre', correo='$correo', telefono='$telefono', bloqueado='$bloqueado' WHERE id=$id";
                    }
                    mysqli_query($bbdd, $sql);
                }
            ?>
                <div class="view">
                    <h3>Editar usuario</h3>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Usuarios'; ?>" class="float-right fixed-button"><img src="../../images/close.png" alt="Cerrar ventana"></a>
                    <!-- Formulario de edición de usuario -->
                    <form method="POST" action="">
                        <input type="text" name="id" value="<?php echo $usuario['id']; ?>" readonly>
                        <br>
                        <select name="empresa">
                            <option value="" disabled>Empresa*</option>
                            <?php
                            $consultaEmpresas = mysqli_query($bbdd, "SELECT id, nombre FROM empresas");
                            while ($empresa = mysqli_fetch_array($consultaEmpresas)) {
                                $selected = ($empresa['id'] == $usuario['empresa']) ? 'selected' : '';
                                echo "<option value='" . $empresa['id'] . "' $selected>" . $empresa['nombre'] . "</option>\n";
                            }
                            ?>
                        </select><br>
                        <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" placeholder="Nombre completo*" required><br>
                        <input type="text" name="correo" value="<?php echo $usuario['correo']; ?>" placeholder="Correo electrónico*" required><br>
                        <input type="password" name="contrasenia" placeholder="Nueva contraseña (déjalo vacío para no cambiar)"><br>
                        <input type="text" name="telefono" value="<?php echo $usuario['telefono']; ?>" placeholder="Teléfono*" required><br>
                        <div class="check">
                            <input type="checkbox" name="bloqueado" <?php echo ($usuario['bloqueado'] == 0) ? 'checked' : ''; ?>>Habilitar
                        </div>
                        <br>
                        <input type="submit" value="Editar usuario">
                    </form>
                </div>
            <?php
            }
            // Confirmación para eliminar usuario
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
                <div class="eliminar">
                    <h3>¿Eliminar usuario con ID <?php echo $_GET['id']; ?>?</h3>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="confirmar">
                        <input type="submit" name="eliminar" value="Sí">
                        <input type="submit" name="cancelar" value="No">
                    </form>
                    <h4><?php echo $salida; ?></h4>
                </div>
            <?php
            }
            // Filtros y tabla de usuarios
            if (isset($_GET['empresa'])) {
                $instruccion = "SELECT id, nombre, correo, telefono FROM usuarios WHERE empresa = " . $_GET['empresa'];
            } else {
                $instruccion = "SELECT id, nombre, correo, telefono FROM usuarios";
            }
            ?>
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
                    <!-- Formulario de filtros -->
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
                // Aplicar filtros si corresponde
                if (isset($_POST['aplicar'])) {
                    $instruccion = "SELECT id, nombre, correo, telefono, empresa FROM usuarios WHERE 1=1";
                    if (isset($_POST['nombre']) and !empty($_POST['nombre'])) {
                        $instruccion .= " AND nombre LIKE '%" . $_POST['nombre'] . "%'";
                    }
                    if (isset($_POST['correo']) and !empty($_POST['correo'])) {
                        $instruccion .= " AND correo LIKE '%" . $_POST['correo'] . "%'";
                    }
                    if (isset($_POST['telefono']) and !empty($_POST['telefono'])) {
                        $instruccion .= " AND telefono LIKE '%" . $_POST['telefono'] . "%'";
                    }
                    if (isset($_POST['id']) and !empty($_POST['id'])) {
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
                    echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Usuarios&id=" . $usuarios['id'] . "&editar=true'><img src='../images/edit.png' alt='Editar'></a></td>\n";
                    echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Usuarios&id=" . $usuarios['id'] . "&eliminar=true'><img src='../images/delete.png' alt='Eliminar'></a></td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";
            } elseif ($_GET['tipo'] == "Empresas") {
                ?>
                <!-- Botón para añadir empresa -->
                <br>
                <a href="<?php $_SERVER['PHP_SELF'] ?>?tipo=Empresas&aniadir=true" class="add">Añadir empresa</a>
                </a>
                <?php
                // Vista de empresa
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
                // Formulario para registrar empresa
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
                // Confirmación para eliminar empresa
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
                    <div class="eliminar">
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
                <!-- Tabla de empresas con filtros -->
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
                    // Aplicar filtros a la consulta de empresas
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
                        if (isset($_POST['id']) and !empty($_POST['id'])) {
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
                    ?>
                    <!-- Botón para crear técnico -->
                    <br>
                    <a href="<?php $_SERVER['PHP_SELF'] ?>?tipo=Tecnicos&aniadir=true" class="add">Crear técnico</a>
                    <?php
                    // Vista de técnico
                    if (isset($_GET['ver'])) {
                        $id = $_GET['id'];
                        $consulta = mysqli_query($bbdd, "SELECT id, nombre, correo, telefono, bloqueado FROM tecnicos WHERE id = $id");
                        $tecnico = mysqli_fetch_array($consulta);
                        echo "<div class='view'>\n";
                        echo "<a href='" . $_SERVER['PHP_SELF'] . "?tipo=Tecnicos' class='float-right fixed-button'><img src='../images/close.png' alt='Cerrar ventana'></a>";
                        echo "<h3>Datos del técnico</h3>\n";
                        echo "<p>Identificador: " . $tecnico['id'] . "</p>\n";
                        echo "<p>Nombre completo: " . $tecnico['nombre'] . "</p>\n";
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
                    // Formulario para registrar técnico
                    if (isset($_GET['aniadir'])) {
                    ?>
                        <div class="view">
                            <h3>Registrar técnico</h3>
                            <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Tecnicos'; ?>" class="float-right fixed-button"><img src="../images/close.png" alt="Cerrar ventana"></a>
                            <br>
                            <?php
                            $salida = "";
                            // Procesamiento del formulario de alta de técnico
                            if (isset($_POST['aniadir'])) {
                                $idTecnico = ultimoId("tecnicos");
                                $nombre = mysqli_real_escape_string($bbdd, $_POST['nombre']);
                                $correo = mysqli_real_escape_string($bbdd, $_POST['correo']);
                                $contrasenia = hash('sha512', mysqli_real_escape_string($bbdd, $_POST['contrasenia']));
                                $telefono = mysqli_real_escape_string($bbdd, $_POST['telefono']);
                                $insertar = insertar("tecnicos", "INSERT INTO tecnicos (id, nombre, correo, contrasenia, telefono) VALUES ($idTecnico, '$nombre', '$correo', '$contrasenia', '$telefono')", $idTecnico);
                                if ($insertar) {
                                    $salida = "<h4 class='ok'>Técnico creado.</h4>";
                                } elseif ($insertar == NULL) {
                                    $salida = "<h4 class='error'>Ya existe un técnico con este ID.</h4>";
                                } else {
                                    $salida = "<h4 class='error'>No se ha podido crear el técnico.</h4>";
                                }
                            }
                            echo "<h4>" . $salida . "</h4>\n";
                            ?>
                            <!-- Formulario de registro de técnico -->
                            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" class="bigForm">
                                <fieldset>
                                    <legend>Datos generales</legend>
                                    <label>ID*:</label>
                                    <input type="text" name="id" value="<?php echo ultimoId("tecnicos") ?>" readonly required>
                                    <label>Nombre completo*:</label>
                                    <input type="text" name="nombre" required>
                                    <label>Correo electrónico*:</label>
                                    <input type="text" name="correo" id="correoElectronico" required oninput="crearNombreUsuario(true)">
                                    <label>Contraseña*:</label>
                                    <input type="text" name="contrasenia" id="contrasenia" required>
                                    <label>Teléfono*:</label>
                                    <input type="text" name="telefono" required>
                                    <label></label>
                                </fieldset>
                                <fieldset>
                                    <legend>Áreas</legend>
                                    <?php
                                    // Listado de áreas para seleccionar
                                    $consultaAreas = mysqli_query($bbdd, "SELECT id, denominacion FROM areas");
                                    while ($areas = mysqli_fetch_array($consultaAreas)) {
                                        echo "<div class='check'><input type='checkbox' name='" . $areas['denominacion'] . "'>" . $areas['denominacion'] . "</div>\n<br>\n";
                                    }
                                    mysqli_free_result($consultaAreas);
                                    ?>
                                </fieldset>
                                <input type="submit" name="aniadir" value="Registrar técnico">
                            </form>
                            <br>
                            <p>Los campos marcados con * son obligatorios.</p>
                            <p>Los campos marcados con + se rellenan automáticamente.</p>
                        </div>
                    <?php
                    }
                    // Formulario para editar técnico
                    if (isset($_GET['editar'])) {
                        $id = $_GET['id'];
                        $consultaTecnico = mysqli_query($bbdd, "SELECT * FROM tecnicos WHERE id = $id");
                        $tecnico = mysqli_fetch_array($consultaTecnico);
                    ?>
                        <div class="view">
                            <h3>Editar técnico</h3>
                            <a href="<?php echo $_SERVER['PHP_SELF'] . '?tipo=Tecnicos'; ?>" class="float-right fixed-button"><img src="../../images/close.png" alt="Cerrar ventana"></a>
                            <!-- Formulario de edición de técnico -->
                            <form method="POST" action="">
                                <input type="text" name="id" value="<?php echo $tecnico['id']; ?>" readonly><br>
                                <input type="text" name="nombre" value="<?php echo $tecnico['nombre']; ?>" placeholder="Nombre completo" required><br>
                                <input type="email" name="correo" value="<?php echo $tecnico['correo']; ?>" placeholder="Correo electrónico" required><br>
                                <input type="password" name="contrasenia" placeholder="Nueva contraseña (déjalo vacío para no cambiar)"><br>
                                <input type="text" name="telefono" value="<?php echo $tecnico['telefono']; ?>" placeholder="Teléfono" required><br>
                                <input type="submit" value="Editar técnico">
                            </form>
                        </div>
                    <?php
                    }

                    // Consulta para mostrar todos los técnicos
                    $consulta = mysqli_query($bbdd, "SELECT * FROM tecnicos");

                    // Procesamiento del formulario de edición de técnico
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $id = $_POST['id'];
                        $nombre = $_POST['nombre'];
                        $correo = $_POST['correo'];
                        $telefono = $_POST['telefono'];

                        if (!empty($_POST['contrasenia'])) {
                            $contrasenia = hash('sha512', $_POST['contrasenia']);
                            $sql = "UPDATE tecnicos SET nombre='$nombre', correo='$correo', contrasenia='$contrasenia', telefono='$telefono' WHERE id=$id";
                        } else {
                            $sql = "UPDATE tecnicos SET nombre='$nombre', correo='$correo', telefono='$telefono' WHERE id=$id";
                        }

                        mysqli_query($bbdd, $sql);
                    }
                    // Confirmación para eliminar técnico
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
                        <div class="eliminar">
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
                    <!-- Tabla de técnicos con filtros -->
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
                    // Aplicar filtros a la consulta de técnicos
                    if (isset($_POST['aplicar'])) {
                        $instruccion = "SELECT id, nombre, correo, telefono FROM tecnicos WHERE 1=1";
                        if (isset($_POST['nombre']) and !empty($_POST['nombre'])) {
                            $instruccion .= " AND nombre LIKE '%" . $_POST['nombre'] . "%'";
                        }
                        if (isset($_POST['correo']) and !empty($_POST['correo'])) {
                            $instruccion .= " AND correo LIKE '%" . $_POST['correo'] . "%'";
                        }
                        if (isset($_POST['telefono']) and !empty($_POST['telefono'])) {
                            $instruccion .= " AND telefono LIKE '%" . $_POST['telefono'] . "%'";
                        }
                        if (isset($_POST['id']) and !empty($_POST['id'])) {
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
                        echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Tecnicos&id=" . $tecnicos['id'] . "&editar=true'><img src='../images/edit.png' alt='Editar'></a></td>\n";
                        echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?tipo=Tecnicos&id=" . $tecnicos['id'] . "&eliminar=true'><img src='../images/delete.png' alt='Eliminar'></a></td>\n";
                        echo "</tr>\n";
                    }
                    echo "</table>\n";
                }
                    ?>
                    </table>
    </main>
    <?php
    // Inclusión del pie de página y cierre de conexión
    include("footer.php");
    mysqli_free_result($consulta);
    mysqli_close($bbdd);
    ?>
</body>

</html>