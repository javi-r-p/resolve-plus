<html lang="es">
   <head>
      <title>Resolve+</title>
      <meta charset="UTF-8">
      <meta viewport="width=device-width, initial-scale=1.0">
      <link rel="icon" href="images/favicon.ico">
      <link rel="stylesheet" href="styles/general.css">
      <?php
         require("php/session.php");
         require("config/config.php");
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
      <header>
         <h1 class="inline">Bienvenido a Resolve+ <em><?php echo $_SESSION['nombre']; ?></em></h1>
         <button class="generalButton float-right"><a href="authentication.php?accion=logout">Cerrar sesión</a></button>
         <button class="generalButton float-right"><a href="php/modify.php?tipo=usuario">Modificar perfil</a></button>
      </header>
      <main>
         <section>
            <?php
               if (mysqli_num_rows($consultarIncidencias) == 0) {
                  echo "<h2>No tienes ninguna incidencia registrada</h2>";
               } else {
            ?>
                  <h2>Consulta el estado de tus incidencias</h2>
                  <table>
                     <tr>
                        <th>ID</th>
                        <th>Estado</th>
                        <th>Descripción</th>
                        <th>Fecha de apertura</th>
                        <th>Fecha esperada de cierre</th>
                        <th>Fecha de cierre</th>
                        <th>Solución</th>
                        <th>Desplazamiento</th>
                        <th>Duración</th>
                     </tr>
                     <?php
                           while ($incidencias = mysqli_fetch_array($consultarIncidencias)) {
                              echo "<tr>\n";
                              echo "<td>" . $incidencias['id'] .  "</td>\n";
                              echo "<td>";
                              if ($incidencias['estado'] == 0) {
                                 echo "CERRADA";
                              } else {
                                 echo "ABIERTA";
                              }
                              echo "</td>\n";
                              echo "<td>" . $incidencias['descripcion'] . "</td>\n";
                              echo "<td>" . date('d/m/Y', strtotime($incidencias['fechaApertura'])) .  "</td>\n";
                              echo "<td>" . date('d/m/Y', strtotime($incidencias['fechaCierreEsp'])) .  "</td>\n";
                              echo "<td>";
                              if ($incidencias['fechaCierre'] == NULL) {
                                 echo "-";
                              } else {
                                 echo date('d/m/Y', strtotime($incidencias['fechaCierre']));
                              }
                              echo "</td>\n";
                              echo "<td>";
                              if ($incidencias['solucion'] == NULL) {
                                 echo "-";
                              } else {
                                 echo $incidencias['solucion'];
                              }
                              echo "</td>\n";
                              echo "<td>";
                              if ($incidencias['desplazamiento'] == NULL) {
                                 echo "-";
                              } elseif ($incidencias['desplazamiento'] == 0) {
                                 echo "NO";
                              } else {
                                 echo "SÍ";
                              }
                              echo "</td>\n";
                              echo "<td>";
                              if ($incidencias['duracion'] == NULL) {
                                 echo "-";
                              } else {
                                 $arrayDuracion = explode(":",$incidencias['duracion']);
                                 echo $arrayDuracion[0] . "h y " . $arrayDuracion[1] . "min";
                              }
                              echo "</td>\n";
                              echo "</tr>\n";
                           }
                        }
                     ?>
                  </table>
         </section>
         <br>
         <section>
            <h2>Registra una incidencia</h2>
            <form method="POST" action="php/register.php?tipo=incidencia">
               <textarea name="descripcion" placeholder="Escribe aquí una descripción acerca de la incidencia" cols="40" rows="15"></textarea>
               <br>
               <label>ID Usuario: </label><input type="text" name="usuario" value="<?php echo $_SESSION['usuario'] ?>" readonly>
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
      <footer>
         <p>Página desarrollada bajo la licencia GPL 2.0</p>
      </footer>
   </body>
</html>