<!DOCTYPE html>
<html lang="es">
<head>
<title>Resolve+</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="images/favicon.ico">
<link rel="stylesheet" href="styles/general.css">
<link rel="stylesheet" href="styles/index.css">
<link rel="stylesheet" href="styles/forms.css">
<link rel="stylesheet" href="styles/responsive.css">
<script src="scripts/htrequests.js"></script>
<script src="scripts/formsAndCss.js"></script>
<?php
    // Incluir archivos de sesión, configuración, funciones de base de datos y envío de correo
    require("../etc/session.php");
    require("../etc/config.php");
    include("../etc/db_functions.php");
    require("../phpmailer/sendmail.php");
    // Obtener el nombre del archivo actual
    $paginaActual = basename($_SERVER['SCRIPT_NAME']);
?>
</head>
<body>
<nav>
    <a href="index.php">Soporte</a>
    <a href="authentication.php?accion=logout">Cerrar sesión</a>
</nav>
<main>
<?php
    $salidaIncidencia = "";
    // Procesar el formulario de registro de incidencia
    if (isset($_POST['registrarIncidencia'])) {
        $descripcion = $_POST['descripcion'];
        // Comprobar si la incidencia es urgente
        if (!isset($_POST['urgente'])) {
            $urgente = 0;
        } else {
            $urgente = 1;
        }
        $fechaApertura = $_POST['fechaApertura'];
        // Calcular fecha estimada de cierre (+7 días)
        $fechaCierreEsp = date('Y-m-d', strtotime('+7 days'));
        $usuario = $_SESSION['usuario'];
        // Obtener el último ID de incidencia
        $idIncidencia = ultimoId("incidencias");
        // Insertar la incidencia en la base de datos
        $insertarIncidencia = insertar("incidencias", "INSERT INTO incidencias (id, descripcion, fechaApertura, fechaCierreEsp, urgente, usuario) VALUES ($idIncidencia, '$descripcion', '$fechaApertura', '$fechaCierreEsp', $urgente, $usuario)", $idIncidencia);
        if ($insertarIncidencia) {
            // Asociar la incidencia a las áreas seleccionadas
            $consultaAreas = mysqli_query($bbdd, "SELECT id, denominacion FROM areas");
            while ($areas = mysqli_fetch_array($consultaAreas)) {
                if (isset($_POST[$areas['denominacion']])) {
                    $idArea = $areas['id'];
                    $insertar = insertar("incidenciasAreas", "INSERT INTO incidenciasAreas VALUES ($idIncidencia, $idArea)");
                }
            }
            mysqli_free_result($consultaAreas);
            $salidaIncidencia = "<p class='ok'>Incidencia registrada</p>\n";
            // Enviar correo de confirmación
            enviarCorreo("noreply.resolvepluses@gmail.com", $_SESSION['correo'], "Incidencia tramitada", "incidenciaTramitada", ["id" => $idIncidencia]);
        } elseif ($insertarIncidencia == NULL) {
            $salidaIncidencia = "<p class='error'>Ya existe una incidencia con ese identificador. Recarga la página e inténtalo de nuevo.</p>\n";
        } else {
            $salidaIncidencia = "<p class='error'>No se ha podido registrar la incidencia. Inténtalo de nuevo más tarde.</p>\n";
        }
    }
?>
<div class="viewFullIssue alignedForms">
    <!-- Formulario para registrar una incidencia -->
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="incidencia" class="mediumForm">
        <h2>Registrar una incidencia</h2>
        <p>Los campos marcados con * son obligatorios.</p>
        <?php echo $salidaIncidencia; ?>
        <fieldset>
            <legend>Datos generales</legend>
            <label>Descripción:*</label><span><span id="conteoDescripcionIncidencia">0</span>/1000</span><textarea name="descripcion" id="descripcionIncidencia" required maxlength="1000" oninput="expandirTextarea('descripcionIncidencia'); contarCaracteres(this.id, 'conteoDescripcionIncidencia')"></textarea>
            <div class="check"><input type="checkbox" name="urgente">Urgente</div>
            <label>Fecha de apertura:</label><input type="date" name="fechaApertura" value="<?php echo date('Y-m-d'); ?>" readonly>
            <label>Fecha estimada de cierre:</label><input type="date" name="fechaCierreEsp" value="<?php echo date('Y-m-d', strtotime('+2 days')); ?>" readonly>
        </fieldset>
        <br>
        <fieldset>
            <legend>Áreas</legend>
            <p>Debes asociar la incidencia a al menos un área.</p>
            <?php
                // Mostrar las áreas disponibles como checkboxes
                $consultaAreas = mysqli_query($bbdd, "SELECT id, denominacion FROM areas");
                while ($areas = mysqli_fetch_array($consultaAreas)) {
                    echo "<div class='check'><input type='checkbox' name='" . $areas['denominacion'] . "'>" . $areas['denominacion'] . "</div>\n<br>\n";
                }
                mysqli_free_result($consultaAreas);
            ?>
        </fieldset>
        <br>
        <input type="submit" name="registrarIncidencia" value="Registrar incidencia">
        <input type="reset" name="vaciar" value="Vaciar campos" onclick="location.reload();">
    </form>
    <hr id="formDivision">
    <?php
        $salidaSolicitud = "";
        // Procesar el formulario de solicitud de alta de dispositivo
        if (isset($_POST['tipoDispositivo'])) {
            $idDispositivo = ultimoId("dispositivos");
            $empresa = $_SESSION['empresa'];
            // Escapar los datos recibidos del formulario
            $numeroSerie = mysqli_real_escape_string($bbdd, $_POST['numeroSerie']);
            $numeroProducto = mysqli_real_escape_string($bbdd, $_POST['numeroProducto']);
            $marca = mysqli_real_escape_string($bbdd, $_POST['marca']);
            $modelo = mysqli_real_escape_string($bbdd, $_POST['modelo']);
            $activo = 0;
            // Insertar el dispositivo en la base de datos
            $insertarDispositivo = insertar("dispositivos", "INSERT INTO dispositivos VALUES ($idDispositivo, $empresa, '$numeroSerie', '$numeroProducto', '$marca', '$modelo', $activo)", $idDispositivo, $numeroSerie);
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
                    $salidaSolicitud = "<p class='ok'>Solicitud enviada.</p>\n";
                } elseif ($insertarTipoDispositivo == NULL) {
                    $salidaSolicitud = "<span class='error'>Ya existe un dispositivo con este ID. Recarga la página e inténtalo de nuevo.</span>";
                } else {
                    $salidaSolicitud = "<span class='error'>No se ha podido añadir el dispositivo.</span>";
                }
            } elseif ($insertarDispositivo == NULL) {
                $salidaSolicitud = "<p class='error'>Ya existe un dispositivo con ese número de serie. Recarga la página e inténtalo de nuevo.</p>\n";
            } else {
                $salidaSolicitud = "<p class='error'>No se ha podido enviar la solicitud. Inténtalo de nuevo más tarde.</p>\n";
            }
        }
    ?>
    <!-- Formulario para solicitar el alta de un dispositivo -->
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="dispositivo" class="mediumForm">
        <h2>Solicitar el alta de un dispositivo</h2>
        <?php echo $salidaSolicitud; ?>
        <p>Los campos marcados con * son obligatorios.</p>
        <fieldset>
            <legend>Datos generales</legend>
            <label>Número de serie*:</label>
            <input type="text" name="numeroSerie" required maxlength="30" id="numeroSerie">
            <label>Número de producto*:</label>
            <input type="text" name="numeroProducto" required maxlength="30">
            <label>Marca*:</label>
            <input type="text" name="marca" required maxlength="20">
            <label>Modelo*:</label>
            <input type="text" name="modelo" required maxlength="30">
            <label>Tipo de dispositivo*:</label>
            <select name="tipoDispositivo" id="seleccionDispositivo" oninput="mostrarCampos()" required>
                <option value="" selected>-</option>
                <option value="equipos">Equipo</option>
                <option value="impresoras">Impresora</option>
                <option value="moviles">Móvil</option>
                <option value="red">Red</option>
                <option value="otros">Otros</option>
            </select>
        </fieldset>
        <!-- Campos específicos para cada tipo de dispositivo -->
        <fieldset id="equipos" class="hidden">
            <legend>Datos específicos</legend>
            <div class="check"><input type="checkbox" name="servidor">Servidor</div>
            <label>Procesador*:</label>
            <input type="text" name="procesador" maxlength="40">
            <label>Almacenamiento principal (RAM)*:</label>
            <input type="text" name="memoria" maxlength="30">
            <label>Almacenamiento secundario (disco/s duro/s)*:</label>
            <input type="text" name="almacenamiento" maxlength="50">
            <label>Sistema operativo*:</label>
            <input type="text" name="sistema" maxlength="40">
            <label>Tipo (torre, portátil, rack...)*:</label>
            <input type="text" name="tipo" maxlength="20">
            <label>Otras características:</label>
            <textarea name="otros" id="otrasCaracteristicas" maxlength="500" oninput="expandirTextarea('otrasCaracteristicas')"></textarea>
            <label></label>
        </fieldset>
        <fieldset id="impresoras" class="hidden">
            <legend>Datos específicos</legend>
            <label>Velocidad de impresión (en m/s)*:</label>
            <input type="text" name="velocidad" pattern="^\d{1,2}\.\d{1,2}$">
            <label>Resolución (en dpi)*:</label>
            <input type="text" name="resolucion" pattern="^\d{1,4}$">
            <label>Método de impresión*:</label>
            <input type="text" name="metodoImpresion" maxlength="25">
            <div class="check"><input type="checkbox" name="color">Color</div>
        </fieldset>
        <fieldset id="moviles" class="hidden">
            <legend>Datos específicos</legend>
            <label>Procesador*:</label>
            <input type="text" name="procesador" maxlength="40">
            <label>Memoria RAM*:</label>
            <input type="text" name="memoria" maxlength="30">
            <label>Almacenamiento*:</label>
            <input type="text" name="almacenamiento" maxlength="50">
            <label>Sistema operativo*:</label>
            <input type="text" name="sistema" maxlength="40">
        </fieldset>
        <fieldset id="red" class="hidden">
            <legend>Datos específicos</legend>
            <label>Producto (switch, router, hub...)*:</label>
            <input type="text" name="producto" maxlength="40">
            <label>Número de interfaces*:</label>
            <input type="text" name="interfaces">
            <label>Velocidad máxima*:</label>
            <input type="text" name="velocidadMax" maxlength="15">
        </fieldset>
        <fieldset id="otros" class="hidden">
            <legend>Datos específicos</legend>
            <label>Denominación*:</label>
            <input type="text" name="denominacion" maxlength="35">
            <label>Características*:</label>
            <textarea name="caracteristicas" id="caracteristicas" placeholder="Características" maxlength="1000" oninput="expandirTextarea('caracteristicas')"></textarea>
        </fieldset>
        <br>
        <input type="submit" value="Solicitar alta">
        <input type="reset" name="vaciar" value="Vaciar campos" onclick="location.reload();">
    </form>
</div>
</main>
<?php
// Cerrar la conexión con la base de datos
mysqli_close($bbdd);
?>
</body>
</html>