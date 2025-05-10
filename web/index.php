<html lang="es">
   <head>
      <title>Resolve+</title>
      <meta charset="UTF-8">
      <meta viewport="width=device-width, initial-scale=1.0">
      <link rel="icon" href="images/favicon.ico">
      <link rel="stylesheet" href="styles/general.css">
      <script src="scripts/htrequests.js"></script>
      <script src="scripts/menuAndAnimations.js"></script>
      <?php
         require("../etc/session.php");
         require("../etc/config.php");
         include("db_functions.php");
         $consultaUltimoIdIncidencia = mysqli_query($bbdd, "SELECT id FROM incidencias ORDER BY id DESC LIMIT 1;");
         if (mysqli_num_rows($consultaUltimoIdIncidencia) == 0) {
             $idIncidencia = 1;
         } else {
             $ultimoIdIncidencia = mysqli_fetch_array($consultaUltimoIdIncidencia);
             $idIncidencia = $ultimoIdIncidencia['id'] +1;
         }
         $consultarIncidencias = mysqli_query($bbdd, "SELECT id,descripcion,fechaApertura,fechaCierre,fechaCierreEsp,estado,solucion,desplazamiento,duracion FROM incidencias WHERE usuario = " . $_SESSION['usuario']);
      ?>
   </head>
   <body>
      <header id="header" class="body">
         <button onclick="abrirMenu()"><img src="images/menu.png" alt="Abrir menú"></button>
         <h1 class="inline">Bienvenido a Resolve+ <em><?php echo $_SESSION['nombre']; ?></em></h1>
      </header>
      <aside id="menuLateral" class="menuLateral">
         <button class="display-block" onclick="cerrarMenu()"><img src="images/cerrar.png" alt="Cerrar menú"></button>
         <a href="authentication.php?accion=logout">Cerrar sesión</a>
         <a href="modify.php?tipo=usuario">Cambiar contraseña</a>
         <a href="request.php">Solicitar el alta de un dispositivo</a>
         <a href="suggestions.php">Buzón de sugerencias</a>
      </aside>
      <main id="main" class="body">
         <section>
            <?php
            ?>
               <h2>Consulta el estado de tus incidencias</h2>
               <?php
                  if (!consulta("tabla", "incidencias", "SELECT * FROM incidencias")) {
                     echo "<h2>No tienes ninguna incidencia registrada</h2>\n";
                  }
               ?>
         </section>
         <br>
         <section>
            <h2>Registra una incidencia</h2>
            <form method="POST" action="php/register.php?tipo=incidencia">
               <textarea name="descripcion" placeholder="Escribe aquí una descripción acerca de la incidencia" cols="40" rows="15"></textarea>
               <br>
               <label>ID Incidencia: </label><input type="text" name="id" value="<?php echo $idIncidencia; ?>" readonly>
               <br>
               <label>Fecha de apertura: </label><input type="text" name="fechaApertura" value="<?php echo date("Y-m-d"); ?>" readonly>
               <br>
               <label>Fecha esperada de cierre: </label><input type="text" name="fechaCierreEsp" value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" readonly>
               <br>
               <input type="submit" value="Registrar incidencia">
            </form>
         </section>
      </main>
      <br>
      <footer id="footer" class="body">
         <p>Página desarrollada bajo la licencia GPL 2.0</p>
      </footer>
   </body>
</html>