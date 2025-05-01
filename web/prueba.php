<html lang="es">
    <head>
        <title>Formularios de prueba de inserción de datos</title>
        <meta charset="UTF-8">
        <meta viewport="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/favicon.ico">
        <link rel="stylesheet" href="styles/general.css">
        <script src="scripts/formsAndCss.js"></script>
        <script>
            window.onload = function () {
                document.getElementById("seleccionDispositivo").oninput = mostrarCampos;
                document.getElementById("correoElectronico").oninput = crearNombreUsuario;
            }
        </script>
        <?php
            require("../etc/session.php");
            require("../etc/config.php");
            $consultaUltimoIdIncidencia = mysqli_query($bbdd, "SELECT id FROM incidencias ORDER BY id DESC LIMIT 1;");
            if (mysqli_num_rows($consultaUltimoIdIncidencia) == 0) {
                $idIncidencia = 1;
            } else {
                $ultimoIdIncidencia = mysqli_fetch_array($consultaUltimoIdIncidencia);
                $idIncidencia = $ultimoIdIncidencia['id'] +1;
            }
            $consultaUltimoIdDispositivo = mysqli_query($bbdd, "SELECT id FROM dispositivos ORDER BY id DESC LIMIT 1");
            if (mysqli_num_rows($consultaUltimoIdDispositivo) == 0) {
                $idDispositivo = 1;
            } else {
                $ultimoIdDispositivo = mysqli_fetch_array($consultaUltimoIdDispositivo);
                $idDispositivo = $ultimoIdDispositivo['id'] +1;
            }
            $consultaUltimoIdUsuario = mysqli_query($bbdd, "SELECT id FROM usuarios ORDER BY id DESC LIMIT 1");
            if (mysqli_num_rows($consultaUltimoIdUsuario) == 0) {
                $idUsuario = 1;
            } else {
                $ultimoIdUsuario = mysqli_fetch_array($consultaUltimoIdUsuario);
                $idUsuario = $ultimoIdUsuario['id'] +1;
            }
            $consultaUltimoIdTecnico = mysqli_query($bbdd, "SELECT id FROM tecnicos ORDER BY id DESC LIMIT 1");
            if (mysqli_num_rows($consultaUltimoIdTecnico) == 0) {
                $idTecnico = 1;
            } else {
                $ultimoIdTecnico = mysqli_fetch_array($consultaUltimoIdTecnico);
                $idTecnico = $ultimoIdTecnico['id'] +1;
            }
            $consultaUltimoIdEmpresa = mysqli_query($bbdd, "SELECT id FROM empresas ORDER BY id DESC LIMIT 1");
            if (mysqli_num_rows($consultaUltimoIdEmpresa) == 0) {
                $idEmpresa = 1;
            } else {
                $ultimoIdEmpresa = mysqli_fetch_array($consultaUltimoIdEmpresa);
                $idEmpresa = $ultimoIdEmpresa['id'] +1;
            }
        ?>
    </head>
    <body>
        <form method="POST" action="php/register.php?tipo=incidencia">
            <textarea name="descripcion" placeholder="Escribe aquí una descripción acerca de la incidencia" cols="40" rows="15"></textarea>
            <br>
            <label>ID Usuario: </label><input type="text" name="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
            <br>
            <label>ID Incidencia: </label><input type="text" name="id" value="<?php echo $idIncidencia; ?>" readonly>
            <br>
            <label>Fecha de registro: </label><input type="text" name="fechaApertura" value="<?php echo date("Y-m-d"); ?>" readonly>
            <br>
            <label>Fecha en la que se espera que la incidencia haya sido resuelta: </label><input type="text" name="fechaCierreEsp" value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" readonly>
            <br>
            <input type="submit" value="Registrar incidencia">
        </form>
        <hr>
        <form method="POST" action="php/register.php?tipo=dispositivo">
            <label>Identificador: </label><input type="text" name="id" value="<?php echo $idDispositivo; ?>" readonly>
            <br>
            <label>Empresa: </label><input type="text" name="empresa">
            <br>
            <label>Número de serie: </label><input type="text" name="numeroSerie">
            <br>
            <label>Número de producto: </label><input type="text" name="numeroProducto">
            <br>
            <label>Marca: </label><input type="text" name="marca">
            <br>
            <label>Modelo: </label><input type="text" name="modelo">
            <br>
            <label for="dispositivo">Selecciona un tipo de dispositivo:</label>
            <select name="tipoDispositivo" id="seleccionDispositivo" oninput="mostrarCampos()">
                <option value="">Selecciona una opción</option>
                <option value="equipos">Equipo</option>
                <option value="impresoras">Impresora</option>
                <option value="moviles">Móvil</option>
                <option value="red">Red</option>
                <option value="otros">Otros</option>
            </select>

            <fieldset id="equipos" class="hidden">
                <label>Servidor:</label><input type="radio" value="0" name="servidor">Cliente: <input type="radio" value="1" name="servidor"><br>
                <label>Procesador: </label><input type="text" name="procesador"><br>
                <label>Memoria: </label><input type="text" name="memoria"><br>
                <label>Almacenamiento: </label><input type="text" name="almacenamiento"><br>
                <label>Sistema: </label><input type="text" name="sistema"><br>
                <label>Versión: </label><input type="text" name="version"><br>
                <label>Tipo: </label><input type="text" name="tipo"><br>
                <label>Otros: </label><textarea name="otros"></textarea><br>
            </fieldset>

            <fieldset id="impresoras" class="hidden">
                <label>Velocidad: </label><input type="text" name="velocidad"><br>
                <label>Resolución: </label><input type="text" name="resolucion"><br>
                <label>Método de Impresión: </label><input type="text" name="metodoImpresion"><br>
                <label>Solo B/N: </label><input type="radio" value="0" name="color">B/N y color: <input type="radio" value="1" name="color"><br>
            </fieldset>

            <fieldset id="moviles" class="hidden">
                <label>Procesador: </label><input type="text" name="procesador"><br>
                <label>Memoria: </label><input type="text" name="memoria"><br>
                <label>Almacenamiento: </label><input type="text" name="almacenamiento"><br>
                <label>Sistema: </label><input type="text" name="sistema"><br>
                <label>Versión: </label><input type="text" name="version"><br>
            </fieldset>

            <fieldset id="red" class="hidden">
                <label>Producto: </label><input type="text" name="producto"><br>
                <label>Interfaces: </label><input type="text" name="interfaces"><br>
                <label>Velocidad Máxima: </label><input type="text" name="velocidadMax"><br>
            </fieldset>

            <fieldset id="otros" class="hidden">
                <label>Denominación: </label><input type="text" name="denominacion"><br>
                <label>Características: </label><textarea name="caracteristicas"></textarea><br>
            </fieldset>
            <br>
            <input type="submit" value="Registrar dispositivo">
        </form>
        <hr>
        <form method="POST" action="php/register.php?tipo=usuario">
            <label>ID: </label><input type="text" name="id" value="<?php echo $idUsuario; ?>" readonly>
            <br>
            <label>Empresa: </label><input type="text" name="empresa">
            <br>
            <label>Nombre: </label><input type="text" name="nombre">
            <br>
            <label>Nombre de usuario: </label><input type="text" name="nombreUsuario" id="nombreUsuario" readonly>
            <br>
            <label>Correo electrónico: </label><input type="text" name="correo" id="correoElectronico">
            <br>
            <label>Contraseña: </label><input type="text" name="contrasenia">
            <br>
            <label>Teléfono: </label><input type="text" name="telefono">
            <br>
            <input type="submit" value="Registrar usuario">
        </form>
        <hr>
        <form method="POST" action="php/register.php?tipo=tecnico">
            <label>ID: </label><input type="text" name="id" value="<?php echo $idTecnico; ?>" readonly>
            <br>
            <label>Nombre: </label><input type="text" name="nombre">
            <br>
            <label>Correo electrónico: </label><input type="text" name="correo">
            <br>
            <label>Contraseña: </label><input type="text" name="contrasenia">
            <br>
            <label>Teléfono: </label><input type="text" name="telefono">
            <br>
            <input type="submit" name="registrar" value="Registrar técnico">
        </form>
        <hr>
        <form method="POST" action="php/register.php?tipo=empresa">
            <label>ID: </label><input type="text" name="id" value="<?php echo $idEmpresa; ?>" readonly>
            <br>
            <label>CIF: </label><input type="text" name="cif">
            <br>
            <label>Nombre: </label><input type="text" name="nombre">
            <br>
            <label>Correo electrónico: </label><input type="text" name="correo">
            <br>
            <label>Teléfono: </label><input type="text" name="telefono">
            <br>
            <label>Dirección: </label><input type="text" name="direccion">
            <br>
            <label>Código postal: </label><input type="text" name="cp">
            <br>
            <input type="submit" value="Registrar empresa">
        </form>
        <hr>
        <a href="../authentication.php?accion=logout">Cerrar sesión</a>
    </body>
</html>