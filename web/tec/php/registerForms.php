<html lang="es">
<head>
    <title>Registro</title>
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
        require("../../../etc/sessionTec.php");
        require("../../../etc/config.php");
        include("../../../etc/db_functions.php");
    ?>
</head>
<body>
    <header>
        <h1>Registrar <?php echo $_GET['tipo']; ?></h1>
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
            if (!isset($_GET['tipo']) OR empty($_GET['tipo'])) {
                echo "<h3>Parámetros inválidos</h3>\n";
                echo "<a href='index.php'>Volver a la página de inicio</a>\n";
            } elseif ($_GET['tipo'] == "Dispositivo") {
        ?>
        <form method="POST" action="register.php?tipo=Dispositivo">
            <label>Identificador: </label><input type="text" name="id" value="<?php echo ultimoId("dispositivos"); ?>" readonly required>
            <br>
            <label>Empresa: </label><input type="text" name="empresa" required>
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
        <?php
            } elseif ($_GET['tipo'] == "Empresa") {
        ?>
        <form method="POST" action="register.php?tipo=Empresa">
            <label>Identificador: </label><input type="text" name="id" value="<?php echo ultimoId("empresas") ?>" readonly>
            <br>
            <label>Código de identificación fiscal (CIF): </label><input type="text" name="cif">
            <br>
            <label>Nombre completo: </label><input type="text" name="nombre">
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
        <?php
            } elseif ($_GET['tipo'] == "Usuario") {
        ?>
        <form method="POST" action="register.php?tipo=Usuario">
            <label>Identificador: </label><input type="text" name="id" value="<?php echo ultimoId("usuarios"); ?>" readonly>
            <br>
            <label>Empresa: </label><input type="search" oninput="busqueda(this.value, 'empresa', 'empresas')"><span id="salida"></span>
            <br>
            <label>Nombre: </label><input type="text" name="nombre">
            <br>
            <label>Nombre de usuario: </label><input type="text" name="nombreUsuario" id="nombreUsuario" readonly>
            <br>
            <label>Correo electrónico: </label><input type="text" name="correo" id="correoElectronico" oninput="crearNombreUsuario()">
            <br>
            <label>Contraseña: </label><input type="text" name="contrasenia">
            <br>
            <label>Teléfono: </label><input type="text" name="telefono">
            <br>
            <input type="submit" value="Registrar usuario">
        </form>
        <?php
            }
        ?>
        <?php
            mysqli_close($bbdd);
        ?>
    </main>
    <footer>

    </footer>
</body>
</html>