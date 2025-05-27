-- Inserción de datos en la base de datos resolve
USE resolve;

-- Tabla empresas
INSERT INTO empresas (id, cif, nombre, correo, telefono, direccion, cp) VALUES
(0, '0', 'Empresa de prueba 0', 'info@resolveplus.es', '123456789', '-', '00000'),
(1, 'B12345601', 'Gourmet Delicias S.L.', 'info@gourmetdelicias.com', '912345001', 'Calle Sabores, 15', '28001'),
(2, 'A87654302', 'AutoRápido S.A.', 'info@autorapido.com', '934567002', 'Av. Velocidad, 45', '08002'),
(3, 'B23456703', 'EcoHogar Distribuciones', 'info@ecohogar.com', '956789003', 'Paseo Sostenible, 78', '41003'),
(4, 'B34567804', 'GlobalModa Ltd.', 'info@globalmoda.com', '900123004', 'Calle Estilo, 101', '29004'),
(5, 'A98765405', 'CreativeMedia Producciones', 'info@creativemedia.com', '921234005', 'Plaza Creativa, 23', '46005'),
(6, 'B12345606', 'AgroFinca España S.L.', 'info@agrofinca.com', '912345006', 'Camino Rural, 30', '28002'),
(7, 'A87654307', 'Viajes Fantásticos S.A.', 'info@viajesfantasticos.com', '934567007', 'Av. Turismo, 12', '08003'),
(8, 'B23456708', 'Salud Vital Ltd.', 'info@saludvital.com', '956789008', 'Paseo Bienestar, 56', '41004'),
(9, 'B34567809', 'Construcciones Seguras', 'info@construccionesseguras.com', '900123009', 'Calle Obras, 200', '29005'),
(10, 'A98765410', 'Deportes Élite S.L.', 'info@deporteselite.com', '921234010', 'Plaza Atlético, 89', '46006'),
(11, 'B12345611', 'Librería Aurora S.L.', 'info@libreriaaurora.com', '912345011', 'Calle Letras, 34', '28007'),
(12, 'A87654312', 'Jardines Encantados S.A.', 'info@jardinesencantados.com', '934567012', 'Paseo Floral, 88', '08009'),
(13, 'B23456713', 'Restaurantes Delicias', 'info@restaurantesdelicias.com', '956789013', 'Plaza Sabor, 65', '41010'),
(14, 'B34567814', 'Muebles Elegantes S.L.', 'info@muebleselegantes.com', '900123014', 'Avenida Diseño, 74', '29011'),
(15, 'A98765415', 'Transportes Rápidos', 'info@transportesrapidos.com', '921234015', 'Calle Logística, 23', '46012'),
(16, 'B12345616', 'Floristería Bella Vida', 'info@floristeriabellavida.com', '912345016', 'Calle Rosales, 78', '28008'),
(17, 'A87654317', 'Hotel Paraíso Azul', 'info@hotelparaisoazul.com', '934567017', 'Av. Costera, 34', '08011'),
(18, 'B23456718', 'Carnes Premium España', 'info@carnespremium.com', '956789018', 'Paseo Gourmet, 21', '41012'),
(19, 'B34567819', 'Arte y Decoración S.L.', 'info@arteydecoracion.com', '900123019', 'Plaza Estilo, 45', '29013'),
(20, 'A98765420', 'Supermercado Familiar', 'info@superfamilia.com', '921234020', 'Calle Alimentos, 23', '46014');

-- Tabla usuarios
INSERT INTO usuarios VALUES
(0, 0, 'Usuario de prueba 0', 'usuario0', 'usuario0@resolveplus.es', 'c6496f9cad0e4f745ae1db2fdd60e50f64aca986da7b0ddf2668a824148d0e7c6bc5997e276890eff406ca4426a4009a1567e80842b095a7eaa2551bff87c66f', '123456789', 0),
(1, 1, 'Carlos Fernández', 'cfernandez', 'cfernandez@gourmetdelicias.com', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '912345001', 1),
(2, 2, 'Ana López', 'alopez', 'alopez@autorapido.com', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '934567002', 1),
(3, 3, 'Javier Martínez', 'jmartinez', 'jmartinez@ecohogar.com', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '956789003', 1),
(4, 4, 'Sofía Gómez', 'sgomez', 'sgomez@globalmoda.com', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '900123004', 1),
(5, 5, 'Miguel Rodríguez', 'mrodriguez', 'mrodriguez@creativemedia.com', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '921234005', 1),
(6, 6, 'Laura Sánchez', 'lsanchez', 'lsanchez@agrofinca.com', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '912345006', 1),
(7, 7, 'David Jiménez', 'djimenez', 'djimenez@viajesfantasticos.com', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '934567007', 1),
(8, 8, 'Elena Díaz', 'ediaz', 'ediaz@saludvital.com', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '956789008', 1),
(9, 9, 'Pablo Ruiz', 'pruiz', 'pruiz@construccionesseguras.com', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '900123009', 1),
(10, 10, 'Carmen Moreno', 'cmoreno', 'cmoreno@deporteselite.com', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '921234010', 1),
(11, 11, 'Isabel Castro', 'icastro', 'icastro@agenciadeeventos.com', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '921234050', 1);

-- Tabla areas
INSERT INTO areas VALUES
(0, 'Área de prueba 0'),
(1, 'Redes'),
(2, 'Sistemas'),
(3, 'Seguridad'),
(4, 'Microinformática'),
(5, 'Aplicaciones');

-- Tabla tecnicos
INSERT INTO tecnicos VALUES
(0, 'Técnico de prueba 0', 'tecnico0', 'tecnico0@resolveplus.es', 'c6496f9cad0e4f745ae1db2fdd60e50f64aca986da7b0ddf2668a824148d0e7c6bc5997e276890eff406ca4426a4009a1567e80842b095a7eaa2551bff87c66f', '123456789', 0),
(1, 'Luis Ramírez', 'lramirez', 'lramirez@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '912345001', 1),
(2, 'Andrea Torres', 'atorres', 'atorres@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '934567002', 1),
(3, 'Fernando Martínez', 'fmartinez', 'fmartinez@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '956789003', 1),
(4, 'Sofía Ruiz', 'sruiz', 'sruiz@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '900123004', 1),
(5, 'Daniel Gómez', 'dgomez', 'dgomez@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '921234005', 1),
(6, 'Beatriz Sánchez', 'bsanchez', 'bsanchez@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '912345006', 1),
(7, 'Alejandro López', 'alopez', 'alopez@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '934567007', 1),
(8, 'Natalia Castillo', 'ncastillo', 'ncastillo@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '956789008', 1),
(9, 'Emilio Hernández', 'ehernandez', 'ehernandez@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '900123009', 1),
(10, 'Carla Domínguez', 'cdominguez', 'cdominguez@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '921234010', 1),
(11, 'Roberto Vázquez', 'rvazquez', 'rvazquez@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '912345011', 1),
(12, 'Esther Ramos', 'eramos', 'eramos@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '934567012', 1),
(13, 'Lucía Salas', 'lsalas', 'lsalas@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '956789013', 1),
(14, 'Pablo Aguilar', 'paguilar', 'paguilar@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '900123014', 1),
(15, 'Irene Navarro', 'inavarro', 'inavarro@resolveplus.es', '0439434dae91c10c3bc073af1e76addf8f57a30ce0a7de0438b3aaad34b85200d41d01078f2ee786b3130b4ed4e39e3e26090da5d9f87420454dfdd182761cce', '921234015', 1);

-- Tabla areasTecnicos
INSERT INTO areasTecnicos VALUES
(0, 0),
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(1, 1),
(1, 4),
(2, 1),
(2, 2),
(3, 2),
(2, 3),
(5, 3),
(3, 4),
(1, 5),
(5, 6),
(4, 7),
(2, 8),
(4, 8),
(1, 9),
(2, 10),
(3, 10),
(4, 11),
(5, 12),
(2, 13),
(3, 13),
(1, 14),
(2, 14),
(3, 14),
(2, 15);

-- Tabla incidencias
INSERT INTO incidencias VALUES
(1, 3, 'Problema con el inicio de sesión en la aplicación principal.', 1, '2025-05-07', '2025-05-14', '2025-05-07', 0, 'Restablecer la contraseña del usuario.', 0, '00:45:00'),
(2, 7, 'El equipo se reinicia inesperadamente varias veces al día.', 1, '2025-05-07', '2025-05-14', '2025-05-09', 0, 'Revisar los registros del sistema y actualizar los drivers de la tarjeta gráfica.', 0, '01:30:00'),
(3, 1, 'No se puede acceder a la carpeta compartida en la red.', 1, '2025-05-08', '2025-05-15', '2025-05-08', 1, 'Verificar los permisos de la carpeta compartida y la conexión de red del usuario.', 1, '02:15:00'),
(4, 9, 'La impresora no responde y muestra un error de atasco de papel.', 0, '2025-05-08', '2025-05-15', '2025-05-10', 0, 'Limpiar la impresora y revisar si hay obstrucciones en la bandeja de papel.', 0, '00:30:00'),
(5, 5, 'El correo electrónico no se sincroniza correctamente en el dispositivo móvil.', 0, '2025-05-09', '2025-05-16', '2025-05-09', 0, 'Reconfigurar la cuenta de correo electrónico en el dispositivo.', 0, '01:00:00'),
(6, 2, 'El navegador web se cierra inesperadamente al visitar ciertas páginas.', 0, '2025-05-09', '2025-05-16', '2025-05-11', 0, 'Borrar la caché y las cookies del navegador. Actualizar a la última versión.', 0, '00:50:00'),
(7, 10, 'Problemas de rendimiento lentitud general del sistema.', 0, '2025-05-10', '2025-05-17', '2025-05-10', 0, 'Ejecutar un análisis de malware y liberar espacio en el disco duro.', 0, '01:45:00'),
(8, 4, 'No se puede conectar al servidor VPN.', 1, '2025-05-10', '2025-05-17', '2025-05-12', 1, 'Verificar la configuración de la VPN y la conexión a internet del usuario.', 1, '02:30:00'),
(9, 6, 'Fallo al intentar guardar un documento en la unidad de red.', 0, '2025-05-11', '2025-05-18', '2025-05-11', 0, 'Comprobar el espacio disponible en la unidad de red y los permisos de escritura.', 0, '00:35:00'),
(10, 11, 'El ratón y el teclado inalámbricos no responden.', 1, '2025-05-11', '2025-05-18', '2025-05-13', 0, 'Reemplazar las baterías de los dispositivos y reiniciar el receptor USB.', 0, '00:40:00'),
(11, 8, 'La aplicación de contabilidad muestra errores al generar informes.', 1, '2025-05-12', '2025-05-19', '2025-05-12', 1, 'Revisar la integridad de la base de datos de la aplicación y reinstalar si es necesario.', 1, '02:00:00'),
(12, 3, 'No se escucha ningún sonido desde los altavoces del ordenador.', 0, '2025-05-12', '2025-05-19', '2025-05-14', 0, 'Verificar la conexión de los altavoces y la configuración de audio del sistema.', 0, '01:10:00'),
(13, 7, 'Problemas con la conexión a internet intermitente.', 1, '2025-05-13', '2025-05-20', '2025-05-13', 0, 'Reiniciar el router y el módem. Contactar con el proveedor de internet si persiste.', 0, '01:25:00'),
(14, 1, 'El antivirus ha detectado una amenaza potencial.', 1, '2025-05-13', '2025-05-20', '2025-05-15', 0, 'Poner en cuarentena y eliminar la amenaza detectada. Ejecutar un análisis completo del sistema.', 0, '00:55:00'),
(15, 9, 'No se pueden abrir archivos PDF.', 0, '2025-05-07', '2025-05-14', '2025-05-07', 0, 'Reinstalar o actualizar el lector de archivos PDF.', 0, '00:30:00'),
(16, 5, 'La pantalla del portátil parpadea.', 1, '2025-05-07', '2025-05-14', '2025-05-09', 1, 'Actualizar los drivers de la tarjeta gráfica. Si persiste, podría ser un problema de hardware.', 1, '02:45:00'),
(17, 2, 'El programa de edición de imágenes se bloquea al guardar.', 0, '2025-05-08', '2025-05-15', '2025-05-08', 0, 'Verificar la compatibilidad del archivo y reinstalar el programa si el problema continúa.', 0, '01:50:00'),
(18, 10, 'Teclado escribe caracteres incorrectos.', 0, '2025-05-08', '2025-05-15', '2025-05-10', 0, 'Verificar la configuración del idioma del teclado y limpiar las teclas.', 0, '00:40:00'),
(19, 4, 'No se puede acceder a la base de datos interna.', 1, '2025-05-09', '2025-05-16', '2025-05-09', 1, 'Verificar el estado del servidor de la base de datos y la conexión de red.', 1, '03:00:00'),
(20, 6, 'La cámara web no funciona.', 0, '2025-05-09', '2025-05-16', '2025-05-11', 0, 'Verificar la conexión de la cámara y la configuración de privacidad del sistema.', 0, '00:35:00'),
(21, 11, 'El disco duro externo no es reconocido por el ordenador.', 0, '2025-05-10', '2025-05-17', '2025-05-10', 0, 'Probar con otro cable USB y en otro puerto. Verificar los drivers del dispositivo.', 0, '01:05:00'),
(22, 8, 'Problemas al imprimir a doble cara.', 0, '2025-05-10', '2025-05-17', '2025-05-12', 0, 'Revisar la configuración de impresión y los controladores de la impresora.', 0, '00:55:00'),
(23, 3, 'La aplicación móvil de la empresa no se abre.', 0, '2025-05-11', '2025-05-18', '2025-05-11', 0, 'Borrar la caché de la aplicación y reinstalar si persiste.', 0, '00:45:00'),
(24, 7, 'El protector de pantalla no se desactiva al mover el ratón.', 0, '2025-05-11', '2025-05-18', '2025-05-13', 0, 'Verificar la configuración del protector de pantalla y los drivers del ratón.', 0, '00:30:00'),
(25, 1, 'No se pueden adjuntar archivos grandes al correo electrónico.', 0, '2025-05-12', '2025-05-19', '2025-05-12', 0, 'Comprobar el límite de tamaño de los archivos adjuntos del servidor de correo.', 0, '00:30:00'),
(26, 9, 'El sonido del micrófono es muy bajo.', 0, '2025-05-12', '2025-05-19', '2025-05-14', 0, 'Verificar la configuración del micrófono en el sistema.', 0, '00:35:00'),
(27, 5, 'El ordenador se queda bloqueado al ejecutar varias aplicaciones a la vez.', 0, '2025-05-13', '2025-05-20', '2025-05-13', 0, 'Cerrar aplicaciones innecesarias y considerar una ampliación de la memoria RAM.', 0, '01:20:00'),
(28, 2, 'No se puede acceder a la página web de la empresa.', 1, '2025-05-13', '2025-05-20', '2025-05-15', 0, 'Verificar la conexión a internet y el estado del servidor web.', 0, '00:40:00'),
(29, 10, 'La barra de tareas de Windows no responde.', 1, '2025-05-07', '2025-05-14', '2025-05-07', 0, 'Reiniciar el Explorador de Windows desde el Administrador de tareas.', 0, '00:50:00'),
(30, 4, 'Problemas con la sincronización de archivos en la nube.', 1, '2025-05-07', '2025-05-14', '2025-05-09', 1, 'Verificar la conexión a internet y la configuración de la aplicación de la nube.', 1, '02:10:00'),
(31, 6, 'El programa de facturación muestra errores de cálculo.', 1, '2025-05-08', '2025-05-15', '2025-05-08', 0, 'Revisar la configuración del programa y los datos introducidos.', 0, '01:15:00'),
(32, 11, 'El fondo de pantalla vuelve al predeterminado.', 0, '2025-05-08', '2025-05-15', '2025-05-10', 0, 'Establecer nuevamente el fondo de pantalla y verificar si hay alguna política de grupo que lo esté modificando.', 0, '00:30:00'),
(33, 8, 'No se pueden crear nuevas carpetas en el escritorio.', 0, '2025-05-09', '2025-05-16', '2025-05-09', 0, 'Verificar los permisos de escritura en el escritorio.', 0, '00:35:00'),
(34, 3, 'La conexión WiFi se desconecta constantemente.', 1, '2025-05-09', '2025-05-16', '2025-05-11', 0, 'Reiniciar el router y el módem. Verificar los drivers de la tarjeta de red inalámbrica.', 0, '01:00:00'),
(35, 7, 'El corrector ortográfico no funciona en el editor de texto.', 0, '2025-05-10', '2025-05-17', '2025-05-10', 0, 'Verificar la configuración del idioma y del corrector ortográfico en el programa.', 0, '00:40:00'),
(36, 1, 'No se pueden reproducir vídeos online.', 0, '2025-05-10', '2025-05-17', '2025-05-12', 0, 'Verificar la conexión a internet y actualizar los plugins del navegador.', 0, '00:55:00'),
(37, 9, 'El sistema operativo no arranca correctamente.', 1, '2025-05-11', '2025-05-18', '2025-05-11', 1, 'Intentar arrancar en modo seguro y realizar una reparación del inicio.', 1, '02:30:00'),
(38, 5, 'La pantalla azul de Windows aparece de forma recurrente.', 1, '2025-05-11', '2025-05-18', '2025-05-13', 0, 'Revisar los registros del sistema para identificar la causa del error. Actualizar drivers.', 0, '01:40:00'),
(39, 2, 'El antivirus bloquea una aplicación legítima.', 0, '2025-05-12', '2025-05-19', '2025-05-12', 0, 'Añadir la aplicación a la lista de excepciones del antivirus.', 0, '00:30:00'),
(40, 10, 'No se puede acceder a la unidad USB.', 0, '2025-05-12', '2025-05-19', '2025-05-14', 0, 'Probar en otro puerto USB y verificar los drivers del dispositivo en el Administrador de dispositivos.', 0, '00:45:00'),
(41, 4, 'Problemas con la calidad de la videollamada (imagen y sonido).', 0, '2025-05-13', '2025-05-20', '2025-05-13', 0, 'Verificar la conexión a internet y la configuración de la cámara y el micrófono.', 0, '01:05:00'),
(42, 6, 'El programa de diseño gráfico se cuelga al realizar acciones complejas.', 0, '2025-05-13', '2025-05-20', '2025-05-15', 0, 'Asegurarse de que el equipo cumple con los requisitos del programa y actualizar los drivers de la tarjeta gráfica.', 0, '01:55:00'),
(43, 11, 'El teclado virtual no aparece en la pantalla táctil.', 1, '2025-05-07', '2025-05-14', '2025-05-07', 0, 'Verificar la configuración de accesibilidad y reiniciar el servicio del teclado táctil.', 0, '00:30:00'),
(44, 8, 'No se pueden instalar nuevas aplicaciones.', 1, '2025-05-07', '2025-05-14', '2025-05-09', 1, 'Verificar los permisos de administrador y el espacio disponible en el disco duro.', 1, '02:20:00'),
(45, 3, 'El brillo de la pantalla no se ajusta correctamente.', 0, '2025-05-08', '2025-05-15', '2025-05-08', 0, 'Verificar la configuración de pantalla y actualizar los drivers de la tarjeta gráfica.', 0, '00:35:00'),
(46, 3, 'No funciona la impresora.', 0, '2025-05-18', '2025-05-25', '2025-05-19', 0, 'Limpiar cabezales de impresión y reemplazar tóner', 1, '01:15:00'),
(47, 6, 'El sistema de gestión de proyectos online no carga, impidiendo el seguimiento de tareas.', 1, '2025-01-07', '2025-01-11', '2025-01-09', 0, 'Verificar el estado del servidor de la aplicación y la conexión a internet.', 0, '01:30:00'),
(48, 11, 'El programa de diseño gráfico se cierra inesperadamente al guardar archivos grandes.', 1, '2025-02-19', '2025-02-23', '2025-02-21', 0, 'Revisar los requisitos del sistema del programa y liberar memoria RAM.', 0, '02:00:00'),
(49, 3, 'No se puede acceder a la base de datos de clientes, esencial para la facturación.', 1, '2025-03-12', '2025-03-16', '2025-03-14', 0, 'Verificar la conexión de red y las credenciales de acceso a la base de datos.', 1, '01:45:00'),
(50, 8, 'La impresora departamental imprime con la calidad muy baja y los colores distorsionados.', 0, '2025-01-22', '2025-01-26', '2025-01-24', 0, 'Limpiar los cabezales de impresión y verificar los niveles de tinta.', 0, '00:55:00'),
(51, 1, 'El navegador muestra constantemente errores de certificado de seguridad al acceder a páginas internas.', 1, '2025-04-02', '2025-04-06', '2025-04-04', 0, 'Verificar la fecha y hora del sistema y la configuración del navegador.', 0, '00:40:00'),
(52, 9, 'El ordenador se bloquea por completo al intentar abrir varios documentos a la vez.', 1, '2025-02-09', '2025-02-13', '2025-02-11', 0, 'Aumentar la memoria virtual del sistema y cerrar aplicaciones innecesarias.', 0, '01:15:00'),
(53, 4, 'Problemas con el sonido en los auriculares durante las llamadas con clientes.', 1, '2025-03-25', '2025-03-29', '2025-03-27', 0, 'Verificar la conexión de los auriculares y la configuración de audio del sistema.', 0, '00:30:00'),
(54, 7, 'No se puede acceder al servidor de archivos donde se guardan los documentos de marketing.', 1, '2025-01-15', '2025-01-19', '2025-01-17', 0, 'Comprobar la conexión a la red interna y los permisos de acceso al servidor.', 0, '01:00:00'),
(55, 2, 'Fallo al importar un archivo CSV grande a la aplicación de gestión contable.', 0, '2025-04-15', '2025-04-19', '2025-04-17', 0, 'Verificar el formato del archivo CSV y la estructura esperada por la aplicación.', 0, '00:45:00'),
(56, 10, 'El teclado escribe símbolos incorrectos al pulsar algunas teclas.', 0, '2025-03-05', '2025-03-09', '2025-03-07', 0, 'Verificar la configuración regional del teclado en el sistema operativo.', 0, '00:30:00'),
(57, 5, 'La pantalla externa conectada al portátil no se detecta.', 0, '2025-02-22', '2025-02-26', '2025-02-24', 0, 'Verificar la conexión del cable y la configuración de pantalla del portátil.', 0, '00:35:00'),
(58, 6, 'Problemas al intentar usar la herramienta de escritorio remoto para ayudar a un compañero.', 0, '2025-01-30', '2025-02-03', '2025-02-01', 0, 'Verificar la conexión de red en ambos equipos y la configuración del software remoto.', 0, '01:10:00'),
(59, 11, 'No se pueden guardar los cambios realizados en la configuración de la aplicación.', 0, '2025-04-25', '2025-04-29', '2025-04-27', 0, 'Verificar los permisos de escritura en la carpeta de configuración de la aplicación.', 0, '00:40:00'),
(60, 3, 'El antivirus ha puesto en cuarentena un archivo que parece ser importante para una aplicación.', 1, '2025-03-18', '2025-03-22', '2025-03-20', 0, 'Restaurar el archivo desde la cuarentena y añadir una excepción en el antivirus si es necesario.', 0, '00:50:00'),
(61, 8, 'Problemas al escanear documentos a color, salen en blanco y negro.', 0, '2025-02-02', '2025-02-06', '2025-02-04', 0, 'Verificar la configuración de escaneo y los drivers del escáner.', 0, '00:30:00'),
(62, 1, 'La conexión a internet es muy inestable, se cae con frecuencia.', 1, '2025-01-10', '2025-01-14', '2025-01-12', 0, 'Reiniciar el router y el módem y verificar la conexión física.', 0, '01:20:00'),
(63, 9, 'El portátil se calienta mucho y el ventilador hace mucho ruido.', 0, '2025-04-19', '2025-04-23', '2025-04-21', 0, 'Limpiar los conductos de ventilación del portátil y verificar si hay procesos consumiendo muchos recursos.', 0, '00:45:00'),
(64, 4, 'No se pueden crear nuevas carpetas en el disco duro local.', 1, '2025-03-01', '2025-03-05', '2025-03-03', 0, 'Verificar los permisos de escritura en el disco duro del usuario.', 1, '01:05:00'),
(65, 7, 'La aplicación web interna para la gestión de vacaciones no responde.', 1, '2025-02-12', '2025-02-16', '2025-02-14', 0, 'Verificar el estado del servidor de la aplicación web y la conexión de red.', 0, '00:35:00'),
(66, 2, 'Problemas al intentar importar contactos desde un archivo .vcf al gestor de correo.', 0, '2025-01-25', '2025-01-29', '2025-01-27', 0, 'Verificar el formato del archivo .vcf y la estructura esperada por el gestor de correo.', 0, '00:50:00'),
(67, 10, 'El ratón inalámbrico consume la batería muy rápido, incluso con poco uso.', 0, '2025-04-08', '2025-04-12', '2025-04-10', 0, 'Reemplazar las pilas del ratón por unas nuevas y verificar si hay algún software que interfiera.', 0, '00:30:00'),
(68, 5, 'La barra de tareas de Windows desaparece y no se puede acceder al menú inicio.', 1, '2025-03-22', '2025-03-26', '2025-03-24', 0, 'Reiniciar el explorador de Windows desde el administrador de tareas.', 0, '00:40:00'),
(69, 6, 'No se puede acceder a los archivos guardados en la unidad de red personal.', 1, '2025-02-05', '2025-02-09', '2025-02-07', 0, 'Verificar la conexión a la red y los permisos de acceso a la unidad de red.', 0, '01:10:00'),
(70, 11, 'Problemas con la configuración de doble monitor, una de las pantallas no se enciende.', 0, '2025-01-18', '2025-01-22', '2025-01-20', 0, 'Verificar la conexión de los cables y la configuración de pantalla en el sistema operativo.', 0, '00:35:00'),
(71, 3, 'El programa de contabilidad muestra errores al intentar generar un informe específico.', 0, '2025-04-22', '2025-04-26', '2025-04-24', 0, 'Verificar la integridad de los datos introducidos y la configuración del informe.', 0, '01:00:00'),
(72, 8, 'La calidad de las fotos escaneadas es muy baja y borrosa.', 0, '2025-03-08', '2025-03-12', '2025-03-10', 0, 'Verificar la resolución de escaneo y limpiar el cristal del escáner.', 0, '00:30:00'),
(73, 1, 'El acceso a un servidor FTP específico falla, impidiendo la descarga de archivos necesarios.', 1, '2025-02-15', '2025-02-19', '2025-02-17', 0, 'Verificar la configuración del cliente FTP, la dirección del servidor y las credenciales de acceso.', 1, '01:25:00'),
(74, 9, 'El sistema operativo se congela completamente al intentar abrir varias aplicaciones pesadas a la vez.', 1, '2025-01-03', '2025-01-07', '2025-01-05', 0, 'Cerrar aplicaciones innecesarias y verificar las especificaciones del equipo.', 0, '01:50:00'),
(75, 4, 'No se puede cambiar la contraseña de la cuenta de usuario desde el panel de control.', 0, '2025-04-12', '2025-04-16', '2025-04-14', 0, 'Informar al usuario sobre el procedimiento correcto para cambiar la contraseña.', 0, '00:30:00'),
(76, 7, 'La página web interna de la empresa se muestra con errores de diseño.', 0, '2025-03-29', '2025-04-02', '2025-03-31', 0, 'Limpiar la caché del navegador y verificar si otros usuarios experimentan el mismo problema.', 0, '00:35:00'),
(77, 2, 'Problemas al exportar un informe en formato PDF desde la aplicación principal.', 0, '2025-02-19', '2025-02-23', '2025-02-21', 0, 'Verificar la configuración de exportación y probar con otro formato si es posible.', 0, '00:40:00'),
(78, 10, 'El sonido del sistema se distorsiona al reproducir archivos de audio.', 0, '2025-01-28', '2025-02-01', '2025-01-30', 0, 'Verificar la configuración del ecualizador y actualizar los drivers de sonido.', 0, '00:30:00'),
(79, 5, 'La aplicación móvil de la empresa no se actualiza automáticamente.', 0, '2025-04-05', '2025-04-09', '2025-04-07', 0, 'Verificar la conexión a internet del dispositivo móvil y la configuración de actualizaciones de la aplicación.', 0, '00:35:00'),
(80, 6, 'No se puede acceder a un recurso compartido específico en la red local.', 1, '2025-03-15', '2025-03-19', '2025-03-17', 0, 'Verificar los permisos de acceso al recurso compartido y la conexión de red del usuario.', 1, '01:15:00'),
(81, 11, 'Problemas con la sincronización horaria del sistema, la hora es incorrecta.', 0, '2025-02-09', '2025-02-13', '2025-02-11', 0, 'Verificar la configuración de la zona horaria y la sincronización con un servidor de hora.', 0, '00:30:00'),
(82, 3, 'El programa de edición de vídeo va muy lento al realizar tareas básicas.', 0, '2025-01-22', '2025-01-26', '2025-01-24', 0, 'Verificar los requisitos del sistema del programa y cerrar otras aplicaciones.', 0, '01:05:00'),
(83, 8, 'La impresora no reconoce un nuevo cartucho de tóner.', 0, '2025-04-29', '2025-05-03', '2025-05-01', 0, 'Verificar la compatibilidad del cartucho y reiniciar la impresora.', 0, '00:30:00'),
(84, 1, 'El navegador no guarda las contraseñas de los sitios web.', 0, '2025-03-05', '2025-03-09', '2025-03-07', 0, 'Verificar la configuración de privacidad y seguridad del navegador.', 0, '00:35:00'),
(85, 9, 'El ordenador no reconoce una unidad flash USB.', 0, '2025-02-12', '2025-02-16', '2025-02-14', 0, 'Verificar la conexión USB y probar con otro puerto o unidad flash.', 0, '00:30:00'),
(86, 4, 'No se pueden instalar nuevas aplicaciones en el equipo.', 1, '2025-01-01', '2025-01-05', '2025-01-03', 0, 'Verificar los permisos de administrador y el espacio disponible en el disco duro.', 0, '01:10:00'),
(87, 7, 'La página web interna muestra errores de JavaScript que impiden la funcionalidad.', 1, '2025-04-12', '2025-04-16', '2025-04-14', 0, 'Limpiar la caché del navegador y contactar con el administrador de la web.', 0, '00:45:00');

-- Tabla incidenciasAreas
INSERT INTO incidenciasAreas (incidencia, area) VALUES
(1, 5),
(2, 2),
(3, 1),
(4, 4),
(5, 5),
(6, 5),
(7, 2),
(8, 1),
(9, 1),
(10, 4),
(11, 5),
(12, 4),
(13, 1),
(14, 3),
(15, 5),
(16, 4),
(17, 5),
(18, 4),
(19, 2),
(20, 4),
(21, 4),
(22, 4),
(23, 5),
(24, 4),
(25, 5),
(26, 4),
(27, 2),
(28, 1),
(29, 2),
(30, 1),
(31, 5),
(32, 2),
(33, 2),
(34, 1),
(35, 5),
(36, 5),
(37, 2),
(38, 2),
(39, 3),
(40, 4),
(41, 4),
(42, 5),
(43, 4),
(44, 2),
(45, 4);

-- Tabla dispositivos, equipos, impresoras, moviles y red
-- Dispositivos y Equipos
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (2, 5, 'SNX789A2BC', 'PNX789A2BC', 'Dell', 'OptiPlex 7010');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (2, 0, 'Intel Core i5-12400', '16GB DDR4', '512GB NVMe SSD', 'Windows 11 Pro', 'Torre');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (3, 12, 'SNHPPROB450', 'PNHPPROB450', 'HP', 'ProBook 450 G10');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (3, 0, 'AMD Ryzen 5 7530U', '16GB DDR4', '512GB PCIe NVMe SSD', 'Windows 11 Pro', 'Portátil');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (4, 1, 'SNLENOVT14', 'PNLENOVT14', 'Lenovo', 'ThinkPad T14 Gen 4');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (4, 0, 'Intel Core i7-1355U', '32GB DDR5', '1TB NVMe SSD', 'Windows 11 Pro', 'Portátil');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (5, 18, 'SNAPLMACMINI', 'PNAPLMACMINI', 'Apple', 'Mac Mini M2');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (5, 0, 'Apple M2', '8GB Unified Memory', '256GB SSD', 'macOS Sonoma', 'Mini PC');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (6, 7, 'SNDELLSERV', 'PNDELLSERV', 'Dell', 'PowerEdge R660');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (6, 1, 'Intel Xeon Gold 5416S', '64GB DDR5 ECC', '2x 1TB NVMe SSD RAID1', 'VMware ESXi 8.0', 'Servidor Rack');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (7, 15, 'SNMSILAP001', 'PNMSILAP001', 'MSI', 'Creator Z16');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (7, 0, 'Intel Core i9-13950HX', '32GB DDR5', '2TB NVMe SSD', 'Windows 11 Pro', 'Portátil');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (8, 3, 'SNACERASPIRE', 'PNACERASPIRE', 'Acer', 'Aspire TC-1780');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (8, 0, 'Intel Core i5-13400', '16GB DDR4', '1TB HDD + 256GB SSD', 'Windows 11 Home', 'Torre');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (9, 9, 'SNHPELITE800', 'PNHPELITE800', 'HP', 'EliteDesk 800 G9');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (9, 0, 'Intel Core i7-13700', '16GB DDR5', '512GB NVMe SSD', 'Ubuntu 22.04 LTS', 'Mini PC');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (10, 20, 'SNASUSROG', 'PNASUSROG', 'ASUS', 'ROG Strix G16');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (10, 0, 'Intel Core i7-13650HX', '16GB DDR5', '1TB PCIe 4.0 SSD', 'Windows 11 Home', 'Portátil');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (11, 2, 'SNLENOVOTC', 'PNLENOVOTC', 'Lenovo', 'ThinkCentre M70q');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (11, 0, 'Intel Core i3-12100T', '8GB DDR4', '256GB SSD M.2', 'Windows 10 Pro', 'Mini PC');

-- (Continuar con 40 más de Equipos, variando los datos)
-- ... (Ejemplos adicionales de Equipos)
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (12, 11, 'SNSRVHP001', 'PNSRVHP001', 'HP', 'ProLiant ML350 Gen10');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (12, 1, 'Intel Xeon Silver 4210R', '32GB ECC DDR4', '4TB SAS HDD', 'Windows Server 2022', 'Servidor Torre');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (13, 6, 'SNAPPLEIMAC27', 'PNAPPLEIMAC27', 'Apple', 'iMac 27 Retina 5K');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (13, 0, 'Intel Core i7 10th Gen', '16GB DDR4', '1TB Fusion Drive', 'macOS Ventura', 'All-in-One');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (14, 14, 'SNDELLALIEN', 'PNDELLALIEN', 'Dell', 'Alienware Aurora R15');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (14, 0, 'AMD Ryzen 9 7900X', '32GB DDR5', '1TB NVMe SSD + 2TB HDD', 'Windows 11 Pro', 'Torre');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (15, 8, 'SNMSISURFACE', 'PNMSISURFACE', 'Microsoft', 'Surface Laptop Studio');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (15, 0, 'Intel Core i7-11370H', '16GB LPDDR4x', '512GB SSD', 'Windows 11 Pro', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (16, 19, 'SNLENOVOFLEX', 'PNLENOVOFLEX', 'Lenovo', 'Yoga 7i');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (16, 0, 'Intel Core i5-1335U', '8GB LPDDR5', '512GB SSD', 'Windows 11 Home', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (17, 4, 'SNASUSZEN', 'PNASUSZEN', 'ASUS', 'Zenbook 14 OLED');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (17, 0, 'AMD Ryzen 7 7730U', '16GB LPDDR4X', '1TB SSD', 'Windows 11 Pro', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (18, 10, 'SNHPENVY', 'PNHPENVY', 'HP', 'Envy x360');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (18, 0, 'Intel Core i7-1355U', '16GB DDR4', '1TB SSD', 'Windows 11 Home', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (19, 17, 'SNDELLXPS13', 'PNDELLXPS13', 'Dell', 'XPS 13 Plus');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (19, 0, 'Intel Core i7-1360P', '32GB LPDDR5', '1TB NVMe SSD', 'Ubuntu 22.04 LTS', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (20, 13, 'SNACERPRED', 'PNACERPRED', 'Acer', 'Predator Helios 300');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (20, 0, 'Intel Core i9-12900H', '32GB DDR5', '2TB NVMe SSD', 'Windows 11 Pro', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (21, 1, 'SNLENOVOLEGION', 'PNLENOVOLEGION', 'Lenovo', 'Legion Tower 5i');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (21, 0, 'Intel Core i5-13600K', '16GB DDR5', '512GB SSD + 1TB HDD', 'Windows 11 Home', 'Torre');
-- ... (Añadir 29 inserciones más para equipos para llegar a 50)
-- Placeholder for 29 more 'equipos'
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (22, 5, 'SNEQP22SRN', 'PNEQP22PRN', 'HP', 'OMEN 45L');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (22, 0, 'AMD Ryzen 7 7700X', '32GB DDR5', '1TB NVMe SSD', 'Windows 11 Pro', 'Torre');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (23, 12, 'SNEQP23SRN', 'PNEQP23PRN', 'Dell', 'Inspiron 15');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (23, 0, 'Intel Core i5-1135G7', '8GB DDR4', '256GB SSD', 'Windows 10 Home', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (24, 1, 'SNEQP24SRN', 'PNEQP24PRN', 'Lenovo', 'IdeaPad Slim 5');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (24, 0, 'AMD Ryzen 5 5500U', '12GB DDR4', '512GB SSD', 'Windows 11 Home', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (25, 18, 'SNEQP25SRN', 'PNEQP25PRN', 'Apple', 'MacBook Air M1');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (25, 0, 'Apple M1', '8GB Unified Memory', '256GB SSD', 'macOS Monterey', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (26, 7, 'SNEQP26SRN', 'PNEQP26PRN', 'Acer', 'Chromebook Spin 311');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (26, 0, 'MediaTek MT8183', '4GB LPDDR4X', '64GB eMMC', 'Chrome OS', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (27, 15, 'SNEQP27SRN', 'PNEQP27PRN', 'ASUS', 'VivoBook 15');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (27, 0, 'Intel Core i3-1005G1', '8GB DDR4', '128GB SSD', 'Windows 10 S', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (28, 3, 'SNEQP28SRN', 'PNEQP28PRN', 'HP', 'Pavilion Aero 13');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (28, 0, 'AMD Ryzen 7 5825U', '16GB DDR4', '1TB SSD', 'Windows 11 Pro', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (29, 9, 'SNEQP29SRN', 'PNEQP29PRN', 'Dell', 'Vostro 3910');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (29, 0, 'Intel Core i7-12700', '16GB DDR4', '512GB SSD', 'Ubuntu 20.04 LTS', 'Torre');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (30, 20, 'SNEQP30SRN', 'PNEQP30PRN', 'Lenovo', 'ThinkStation P360');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (30, 0, 'Intel Core i9-12900K', '64GB DDR5', '2TB NVMe SSD', 'Windows 11 Pro WS', 'Workstation');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (31, 2, 'SNEQP31SRN', 'PNEQP31PRN', 'Supermicro', 'SYS-510T-MR');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (31, 1, 'Intel Xeon E-2324G', '32GB ECC DDR4', '1TB SATA HDD', 'CentOS Stream 9', 'Servidor Rack');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (32, 11, 'SNEQP32SRN', 'PNEQP32PRN', 'Apple', 'Mac Pro');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (32, 0, 'Apple M2 Ultra', '128GB Unified Memory', '4TB SSD', 'macOS Sonoma', 'Workstation');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (33, 6, 'SNEQP33SRN', 'PNEQP33PRN', 'Microsoft', 'Surface Pro 9');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (33, 0, 'Intel Core i5-1235U', '8GB LPDDR5', '256GB SSD', 'Windows 11 Home', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (34, 14, 'SNEQP34SRN', 'PNEQP34PRN', 'Samsung', 'Galaxy Book3 Pro');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (34, 0, 'Intel Core i7-1360P', '16GB LPDDR5', '1TB NVMe SSD', 'Windows 11 Pro', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (35, 8, 'SNEQP35SRN', 'PNEQP35PRN', 'Gigabyte', 'AORUS 17X');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (35, 0, 'Intel Core i9-13980HX', '32GB DDR5', '2TB SSD Gen4', 'Windows 11 Pro', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (36, 19, 'SNEQP36SRN', 'PNEQP36PRN', 'Razer', 'Blade 15');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (36, 0, 'Intel Core i7-13800H', '16GB DDR5', '1TB SSD', 'Windows 11 Home', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (37, 4, 'SNEQP37SRN', 'PNEQP37PRN', 'LG', 'Gram 17');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (37, 0, 'Intel Core i7-1360P', '16GB LPDDR5', '1TB NVMe SSD', 'Windows 11 Home', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (38, 10, 'SNEQP38SRN', 'PNEQP38PRN', 'Fujitsu', 'Lifebook U7411');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (38, 0, 'Intel Core i5-1145G7', '16GB DDR4', '512GB SSD', 'Windows 10 Pro', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (39, 17, 'SNEQP39SRN', 'PNEQP39PRN', 'Panasonic', 'Toughbook CF-31');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (39, 0, 'Intel Core i5-5300U', '8GB DDR3', '256GB SSD Rugged', 'Windows 10 Pro', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (40, 13, 'SNEQP40SRN', 'PNEQP40PRN', 'Getac', 'B360');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (40, 0, 'Intel Core i7-10510U', '16GB DDR4', '512GB PCIe SSD', 'Windows 10 Pro', 'Portátil');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (41, 1, 'SNEQP41SRN', 'PNEQP41PRN', 'Zotac', 'ZBOX Magnus One');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (41, 0, 'Intel Core i7-10700', '16GB DDR4 SO-DIMM', '1TB M.2 SSD + 1TB HDD', 'Windows 10 Home', 'Mini PC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (42, 5, 'SNEQP42SRN', 'PNEQP42PRN', 'Intel', 'NUC 11 Pro');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (42, 0, 'Intel Core i5-1135G7', '8GB DDR4', '250GB NVMe SSD', 'No OS', 'Mini PC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (43, 12, 'SNEQP43SRN', 'PNEQP43PRN', 'Shuttle', 'XPC slim DH670');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (43, 0, 'Intel Core i3-1215U', '8GB DDR4', '128GB SSD', 'Linux Mint', 'Mini PC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (44, 1, 'SNEQP44SRN', 'PNEQP44PRN', 'ASRock', 'DeskMini X300');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (44, 0, 'AMD Ryzen 5 5600G', '16GB DDR4 SO-DIMM', '500GB M.2 NVMe SSD', 'Fedora Workstation', 'Mini PC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (45, 18, 'SNEQP45SRN', 'PNEQP45PRN', 'HP', 'Chromebase AIO 21.5');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (45, 0, 'Intel Core i3-10110U', '8GB DDR4', '128GB PCIe NVMe SSD', 'Chrome OS', 'All-in-One');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (46, 7, 'SNEQP46SRN', 'PNEQP46PRN', 'Dell', 'OptiPlex 7410 AIO');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (46, 0, 'Intel Core i7-13700', '16GB DDR5', '512GB SSD', 'Windows 11 Pro', 'All-in-One');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (47, 15, 'SNEQP47SRN', 'PNEQP47PRN', 'Lenovo', 'IdeaCentre AIO 3');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (47, 0, 'AMD Ryzen 3 7330U', '8GB DDR4', '256GB SSD', 'Windows 11 Home', 'All-in-One');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (48, 3, 'SNEQP48SRN', 'PNEQP48PRN', 'MSI', 'PRO AP242');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (48, 0, 'Intel Pentium Gold 7505', '4GB DDR4', '120GB SSD', 'Windows 10 S', 'All-in-One');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (49, 9, 'SNEQP49SRN', 'PNEQP49PRN', 'Cisco', 'UCS C220 M6');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (49, 1, 'Intel Xeon Scalable 3rd Gen', '128GB DDR4 ECC', '4x 1.2TB SAS RAID5', 'Red Hat Ent. Linux', 'Servidor Rack');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (50, 20, 'SNEQP50SRN', 'PNEQP50PRN', 'Dell', 'Precision 7920 Tower');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (50, 0, 'Intel Xeon W-3335', '64GB DDR4 ECC', '1TB NVMe SSD + 4TB HDD', 'Windows 11 Pro WS', 'Workstation');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (51, 2, 'SNEQP51SRN', 'PNEQP51PRN', 'HP', 'ZBook Fury G10');
INSERT INTO equipos (id, servidorCliente, procesador, memoria, almacenamiento, sistema, tipo) VALUES (51, 0, 'Intel Core i9-13950HX', '64GB DDR5 ECC', '2TB NVMe SSD', 'Windows 11 Pro WS', 'Portátil');


-- Dispositivos y Impresoras
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (52, 4, 'SNIMP001HP', 'PNIMP001HP', 'HP', 'LaserJet Pro M404n');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (52, 1.5, 1200.0, 'Láser', 0);

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (53, 11, 'SNIMP002EPS', 'PNIMP002EPS', 'Epson', 'EcoTank ET-2800');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (53, 0.5, 600.0, 'Inyección de tinta', 1);

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (54, 16, 'SNIMP003CAN', 'PNIMP003CAN', 'Canon', 'PIXMA G3270');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (54, 0.4, 4800.0, 'Inyección de tinta', 1); -- Resolucion maxima de ejemplo.

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (55, 7, 'SNIMP004BRO', 'PNIMP004BRO', 'Brother', 'HL-L2390DW');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (55, 1.2, 2400.0, 'Láser', 0);

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (56, 19, 'SNIMP005XER', 'PNIMP005XER', 'Xerox', 'B210');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (56, 1.0, 600.0, 'Láser', 0);

-- (Continuar con 45 más de Impresoras, variando los datos)
-- ... (Ejemplos adicionales de Impresoras)
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (57, 2, 'SNIMP006HP', 'PNIMP006HP', 'HP', 'OfficeJet Pro 8025e');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (57, 0.8, 1200.0, 'Inyección de tinta', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (58, 10, 'SNIMP007EPS', 'PNIMP007EPS', 'Epson', 'WorkForce Pro WF-3820');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (58, 0.7, 4800.0, 'Inyección de tinta', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (59, 15, 'SNIMP008CAN', 'PNIMP008CAN', 'Canon', 'imageCLASS MF455dw');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (59, 1.8, 600.0, 'Láser', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (60, 5, 'SNIMP009BRO', 'PNIMP009BRO', 'Brother', 'MFC-L8900CDW');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (60, 2.5, 2400.0, 'Láser', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (61, 13, 'SNIMP010LEX', 'PNIMP010LEX', 'Lexmark', 'C3326dw');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (61, 1.0, 600.0, 'Láser', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (62, 8, 'SNIMP011KYO', 'PNIMP011KYO', 'Kyocera', 'ECOSYS P5026cdw');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (62, 1.1, 1200.0, 'Láser', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (63, 17, 'SNIMP012HP', 'PNIMP012HP', 'HP', 'Color LaserJet Pro M255dw');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (63, 0.9, 600.0, 'Láser', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (64, 1, 'SNIMP013EPS', 'PNIMP013EPS', 'Epson', 'Expression Photo XP-8700');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (64, 0.3, 5760.0, 'Inyección de tinta', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (65, 9, 'SNIMP014CAN', 'PNIMP014CAN', 'Canon', 'MAXIFY GX6021');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (65, 0.6, 600.0, 'Inyección de tinta', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (66, 20, 'SNIMP015BRO', 'PNIMP015BRO', 'Brother', 'HL-L3270CDW');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (66, 1.3, 2400.0, 'LED', 1);
-- ... (Añadir 35 inserciones más para impresoras para llegar a 50)
-- Placeholder for 35 more 'impresoras'
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (67, 4, 'SNIMP016ZEB', 'PNIMP016ZEB', 'Zebra', 'ZD421');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (67, 2.0, 300.0, 'Térmica directa', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (68, 11, 'SNIMP017DYM', 'PNIMP017DYM', 'Dymo', 'LabelWriter 450');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (68, 0.2, 600.0, 'Térmica directa', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (69, 16, 'SNIMP018OKI', 'PNIMP018OKI', 'OKI', 'C834nw');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (69, 1.6, 1200.0, 'LED', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (70, 7, 'SNIMP019RIC', 'PNIMP019RIC', 'Ricoh', 'IM C300');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (70, 1.4, 1200.0, 'Láser', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (71, 19, 'SNIMP020PAN', 'PNIMP020PAN', 'Panasonic', 'KX-MB2170');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (71, 1.0, 600.0, 'Láser', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (72, 2, 'SNIMP021HP', 'PNIMP021HP', 'HP', 'DesignJet T250');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (72, 0.1, 2400.0, 'Inyección de tinta', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (73, 10, 'SNIMP022EPS', 'PNIMP022EPS', 'Epson', 'SureColor P900');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (73, 0.1, 5760.0, 'Inyección de tinta', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (74, 15, 'SNIMP023CAN', 'PNIMP023CAN', 'Canon', 'imagePROGRAF TA-30');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (74, 0.2, 2400.0, 'Inyección de tinta', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (75, 5, 'SNIMP024BRO', 'PNIMP024BRO', 'Brother', 'PT-P900W');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (75, 0.3, 360.0, 'Transferencia térmica', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (76, 13, 'SNIMP025FAR', 'PNIMP025FAR', 'Fargo', 'HDP5000');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (76, 0.1, 300.0, 'Retransferencia', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (77, 8, 'SNIMP026EVO', 'PNIMP026EVO', 'Evolis', 'Primacy 2');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (77, 0.2, 300.0, 'Sublimación de tinta', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (78, 17, 'SNIMP027MAT', 'PNIMP027MAT', 'Printronix', 'P8000');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (78, 2.9, 200.0, 'Matricial de líneas', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (79, 1, 'SNIMP028EPS', 'PNIMP028EPS', 'Epson', 'LQ-590II');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (79, 2.8, 360.0, 'Matricial de impacto', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (80, 9, 'SNIMP029HP', 'PNIMP029HP', 'HP', 'PageWide Pro 477dw');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (80, 2.2, 1200.0, 'PageWide (Inyección)', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (81, 20, 'SNIMP030LEX', 'PNIMP030LEX', 'Lexmark', 'MS821dn');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (81, 2.0, 1200.0, 'Láser', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (82, 4, 'SNIMP031BRO', 'PNIMP031BRO', 'Brother', 'QL-800');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (82, 0.4, 300.0, 'Térmica directa', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (83, 11, 'SNIMP032CAN', 'PNIMP032CAN', 'Canon', 'SELPHY CP1500');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (83, 0.1, 300.0, 'Sublimación de tinta', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (84, 16, 'SNIMP033HP', 'PNIMP033HP', 'HP', 'Sprocket Studio');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (84, 0.1, 313.0, 'ZINK (Zero Ink)', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (85, 7, 'SNIMP034EPS', 'PNIMP034EPS', 'Epson', 'TM-T88VI');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (85, 1.5, 180.0, 'Térmica para recibos', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (86, 19, 'SNIMP035STAR', 'PNIMP035STAR', 'Star Micronics', 'TSP143III');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (86, 1.3, 203.0, 'Térmica para recibos', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (87, 2, 'SNIMP036CIT', 'PNIMP036CIT', 'Citizen', 'CT-S310II');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (87, 1.0, 203.0, 'Térmica POS', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (88, 10, 'SNIMP037POS', 'PNIMP037POS', 'POS-X', 'EVO HiSpeed');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (88, 1.2, 203.0, 'Térmica', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (89, 15, 'SNIMP038BIX', 'PNIMP038BIX', 'Bixolon', 'SRP-350plusIII');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (89, 1.4, 180.0, 'Térmica directa', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (90, 5, 'SNIMP039TSC', 'PNIMP039TSC', 'TSC', 'TE200');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (90, 2.0, 203.0, 'Transferencia térmica', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (91, 13, 'SNIMP040HON', 'PNIMP040HON', 'Honeywell', 'PC42t');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (91, 1.8, 203.0, 'Transferencia térmica', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (92, 8, 'SNIMP041SAT', 'PNIMP041SAT', 'SATO', 'CL4NX Plus');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (92, 2.5, 609.0, 'Térmica / Transf. T.', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (93, 17, 'SNIMP042HP', 'PNIMP042HP', 'HP', 'ENVY Inspire 7255e');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (93, 0.5, 1200.0, 'Inyección de tinta', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (94, 1, 'SNIMP043CAN', 'PNIMP043CAN', 'Canon', 'PIXMA TR150');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (94, 0.3, 4800.0, 'Inyección de tinta', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (95, 9, 'SNIMP044BRO', 'PNIMP044BRO', 'Brother', 'VC-500W');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (95, 0.1, 313.0, 'ZINK (Zero Ink)', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (96, 20, 'SNIMP045XEROX', 'PNIMP045XEROX', 'Xerox', 'VersaLink C405');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (96, 1.7, 600.0, 'Láser', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (97, 4, 'SNIMP046EPSON', 'PNIMP046EPSON', 'Epson', 'EcoTank ET-M1170');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (97, 0.8, 1200.0, 'Inyección de tinta', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (98, 11, 'SNIMP047KYOCERA', 'PNIMP047KYOCERA', 'Kyocera', 'ECOSYS M5521cdw');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (98, 1.0, 1200.0, 'Láser', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (99, 16, 'SNIMP048RICOH', 'PNIMP048RICOH', 'Ricoh', 'SP C261SFNw');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (99, 0.9, 2400.0, 'Láser', 1);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (100, 7, 'SNIMP049LEXMARK', 'PNIMP049LEXMARK', 'Lexmark', 'MB2236adw');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (100, 1.6, 600.0, 'Láser', 0);
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (101, 19, 'SNIMP050HP', 'PNIMP050HP', 'HP', 'DeskJet 2755e');
INSERT INTO impresoras (id, velocidad, resolucion, metodoImpresion, color) VALUES (101, 0.3, 1200.0, 'Inyección de tinta', 1);


-- Dispositivos y Moviles
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (102, 6, 'SNMOV001SAM', 'PNMOV001SAM', 'Samsung', 'Galaxy S23');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (102, 'Snapdragon 8 Gen 2 for Galaxy', '8GB RAM', '256GB UFS 4.0', 'Android 14');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (103, 14, 'SNMOV002APL', 'PNMOV002APL', 'Apple', 'iPhone 15 Pro');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (103, 'Apple A17 Bionic', '8GB RAM', '256GB NVMe', 'iOS 17');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (104, 10, 'SNMOV003GOO', 'PNMOV003GOO', 'Google', 'Pixel 8');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (104, 'Google Tensor G3', '8GB RAM', '128GB UFS 3.1', 'Android 14');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (105, 3, 'SNMOV004XIA', 'PNMOV004XIA', 'Xiaomi', '13T Pro');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (105, 'MediaTek Dimensity 9200+', '12GB RAM', '512GB UFS 4.0', 'Android 13');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (106, 18, 'SNMOV005ONE', 'PNMOV005ONE', 'OnePlus', '11');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (106, 'Snapdragon 8 Gen 2', '16GB RAM', '256GB UFS 4.0', 'Android 13');

-- (Continuar con 45 más de Moviles, variando los datos)
-- ... (Ejemplos adicionales de Moviles)
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (107, 1, 'SNMOV006SAM', 'PNMOV006SAM', 'Samsung', 'Galaxy A54');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (107, 'Exynos 1380', '6GB RAM', '128GB UFS 2.2', 'Android 14');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (108, 9, 'SNMOV007APL', 'PNMOV007APL', 'Apple', 'iPhone SE (3rd gen)');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (108, 'Apple A15 Bionic', '4GB RAM', '128GB NVMe', 'iOS 17');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (109, 12, 'SNMOV008GOO', 'PNMOV008GOO', 'Google', 'Pixel 7a');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (109, 'Google Tensor G2', '8GB RAM', '128GB UFS 3.1', 'Android 14');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (110, 17, 'SNMOV009XIA', 'PNMOV009XIA', 'Xiaomi', 'Redmi Note 12 Pro');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (110, 'MediaTek Dimensity 1080', '8GB RAM', '256GB UFS 2.2', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (111, 5, 'SNMOV010OPP', 'PNMOV010OPP', 'Oppo', 'Find X5 Pro');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (111, 'Snapdragon 8 Gen 1', '12GB RAM', '256GB UFS 3.1', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (112, 20, 'SNMOV011VIV', 'PNMOV011VIV', 'Vivo', 'X90 Pro');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (112, 'MediaTek Dimensity 9200', '12GB RAM', '256GB UFS 4.0', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (113, 2, 'SNMOV012MOT', 'PNMOV012MOT', 'Motorola', 'Edge 30 Ultra');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (113, 'Snapdragon 8+ Gen 1', '12GB RAM', '256GB UFS 3.1', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (114, 11, 'SNMOV013REA', 'PNMOV013REA', 'Realme', 'GT 2 Pro');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (114, 'Snapdragon 8 Gen 1', '8GB RAM', '128GB UFS 3.1', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (115, 16, 'SNMOV014SON', 'PNMOV014SON', 'Sony', 'Xperia 1 V');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (115, 'Snapdragon 8 Gen 2', '12GB RAM', '256GB UFS 4.0', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (116, 7, 'SNMOV015ASU', 'PNMOV015ASU', 'ASUS', 'ROG Phone 7');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (116, 'Snapdragon 8 Gen 2 for ROG', '16GB RAM', '512GB UFS 4.0', 'Android 13');
-- ... (Añadir 35 inserciones más para moviles para llegar a 50)
-- Placeholder for 35 more 'moviles'
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (117, 19, 'SNMOV016NOK', 'PNMOV016NOK', 'Nokia', 'G400 5G');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (117, 'Snapdragon 480+ 5G', '4GB RAM', '64GB UFS 2.1', 'Android 12');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (118, 4, 'SNMOV017HON', 'PNMOV017HON', 'Honor', 'Magic5 Pro');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (118, 'Snapdragon 8 Gen 2', '12GB RAM', '512GB UFS 4.0', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (119, 13, 'SNMOV018SAM', 'PNMOV018SAM', 'Samsung', 'Galaxy Z Flip 5');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (119, 'Snapdragon 8 Gen 2 for Galaxy', '8GB RAM', '256GB UFS 4.0', 'Android 14');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (120, 8, 'SNMOV019APL', 'PNMOV019APL', 'Apple', 'iPhone 14 Plus');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (120, 'Apple A15 Bionic', '6GB RAM', '128GB NVMe', 'iOS 17');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (121, 1, 'SNMOV020GOO', 'PNMOV020GOO', 'Google', 'Pixel Fold');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (121, 'Google Tensor G2', '12GB RAM', '256GB UFS 3.1', 'Android 14');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (122, 9, 'SNMOV021XIA', 'PNMOV021XIA', 'Xiaomi', 'Poco X5 Pro');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (122, 'Snapdragon 778G 5G', '6GB RAM', '128GB UFS 2.2', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (123, 12, 'SNMOV022ONE', 'PNMOV022ONE', 'OnePlus', 'Nord N30 5G');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (123, 'Snapdragon 695 5G', '8GB RAM', '128GB UFS 2.2', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (124, 17, 'SNMOV023OPP', 'PNMOV023OPP', 'Oppo', 'Reno10 Pro');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (124, 'MediaTek Dimensity 8200', '12GB RAM', '256GB UFS 3.1', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (125, 5, 'SNMOV024VIV', 'PNMOV024VIV', 'Vivo', 'V29');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (125, 'Snapdragon 778G+ 5G', '8GB RAM', '256GB UFS 2.2', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (126, 20, 'SNMOV025MOT', 'PNMOV025MOT', 'Motorola', 'Razr+ 2023');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (126, 'Snapdragon 8+ Gen 1', '8GB RAM', '256GB UFS 3.1', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (127, 2, 'SNMOV026REA', 'PNMOV026REA', 'Realme', '11 Pro+');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (127, 'MediaTek Dimensity 7050', '12GB RAM', '512GB UFS 3.1', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (128, 11, 'SNMOV027SON', 'PNMOV027SON', 'Sony', 'Xperia 5 V');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (128, 'Snapdragon 8 Gen 2', '8GB RAM', '128GB UFS 3.1', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (129, 16, 'SNMOV028ASU', 'PNMOV028ASU', 'ASUS', 'Zenfone 10');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (129, 'Snapdragon 8 Gen 2', '8GB RAM', '256GB UFS 4.0', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (130, 7, 'SNMOV029NOK', 'PNMOV029NOK', 'Nokia', 'XR21');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (130, 'Snapdragon 695 5G', '6GB RAM', '128GB UFS 2.1', 'Android 12');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (131, 19, 'SNMOV030HON', 'PNMOV030HON', 'Honor', '90');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (131, 'Snapdragon 7 Gen 1 Accel. Ed.', '12GB RAM', '256GB UFS 3.1', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (132, 4, 'SNMOV031NOT', 'PNMOV031NOT', 'Nothing', 'Phone (2)');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (132, 'Snapdragon 8+ Gen 1', '12GB RAM', '256GB UFS 3.1', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (133, 13, 'SNMOV032CAT', 'PNMOV032CAT', 'CAT', 'S62 Pro');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (133, 'Snapdragon 660', '6GB RAM', '128GB eMMC', 'Android 11');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (134, 8, 'SNMOV033BLA', 'PNMOV033BLA', 'Blackview', 'BV9200');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (134, 'MediaTek Helio G96', '8GB RAM', '256GB UFS 2.1', 'Android 12');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (135, 1, 'SNMOV034ULE', 'PNMOV034ULE', 'Ulefone', 'Armor 17 Pro');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (135, 'MediaTek Helio G99', '8GB RAM', '256GB UFS 2.2', 'Android 12');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (136, 9, 'SNMOV035DOO', 'PNMOV035DOO', 'Doogee', 'V Max');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (136, 'MediaTek Dimensity 1080', '12GB RAM', '256GB UFS 3.1', 'Android 12');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (137, 12, 'SNMOV036FAIR', 'PNMOV036FAIR', 'Fairphone', '5');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (137, 'Qualcomm QCM6490', '8GB RAM', '256GB UFS 2.2', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (138, 17, 'SNMOV037GIG', 'PNMOV037GIG', 'Gigaset', 'GX6');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (138, 'MediaTek Dimensity 900', '6GB RAM', '128GB UFS 2.1', 'Android 12');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (139, 5, 'SNMOV038TEC', 'PNMOV038TEC', 'Tecno', 'Phantom X2 Pro');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (139, 'MediaTek Dimensity 9000', '12GB RAM', '256GB UFS 3.1', 'Android 12');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (140, 20, 'SNMOV039INF', 'PNMOV039INF', 'Infinix', 'Zero Ultra');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (140, 'MediaTek Dimensity 920', '8GB RAM', '256GB UFS 2.2', 'Android 12');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (141, 2, 'SNMOV040SAM', 'PNMOV040SAM', 'Samsung', 'Galaxy M34');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (141, 'Exynos 1280', '6GB RAM', '128GB UFS 2.2', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (142, 11, 'SNMOV041APL', 'PNMOV041APL', 'Apple', 'iPhone 13 mini');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (142, 'Apple A15 Bionic', '4GB RAM', '128GB NVMe', 'iOS 16');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (143, 16, 'SNMOV042GOO', 'PNMOV042GOO', 'Google', 'Pixel 6a');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (143, 'Google Tensor', '6GB RAM', '128GB UFS 3.1', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (144, 7, 'SNMOV043XIA', 'PNMOV043XIA', 'Xiaomi', 'Redmi 12C');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (144, 'MediaTek Helio G85', '4GB RAM', '64GB eMMC 5.1', 'Android 12');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (145, 19, 'SNMOV045ONE', 'PNMOV045ONE', 'OnePlus', 'Nord CE 3 Lite');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (145, 'Snapdragon 695', '8GB RAM', '128GB UFS 2.2', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (146, 4, 'SNMOV046OPP', 'PNMOV046OPP', 'Oppo', 'A78 5G');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (146, 'MediaTek Dimensity 700', '4GB RAM', '128GB UFS 2.2', 'Android 12');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (147, 13, 'SNMOV047VIV', 'PNMOV047VIV', 'Vivo', 'Y22s');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (147, 'Snapdragon 680', '6GB RAM', '128GB UFS 2.1', 'Android 12');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (148, 8, 'SNMOV048MOT', 'PNMOV048MOT', 'Motorola', 'Moto G Power (2023)');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (148, 'MediaTek Dimensity 930', '6GB RAM', '256GB UFS 2.2', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (149, 1, 'SNMOV049REA', 'PNMOV049REA', 'Realme', 'C55');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (149, 'MediaTek Helio G88', '8GB RAM', '256GB eMMC 5.1', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (150, 9, 'SNMOV050SON', 'PNMOV050SON', 'Sony', 'Xperia 10 V');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (150, 'Snapdragon 695 5G', '6GB RAM', '128GB UFS 2.2', 'Android 13');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (151, 12, 'SNMOV051ASU', 'PNMOV051ASU', 'ASUS', 'ROG Phone 6D');
INSERT INTO moviles (id, procesador, memoria, almacenamiento, sistema) VALUES (151, 'MediaTek Dimensity 9000+', '12GB RAM', '256GB UFS 3.1', 'Android 12');


-- Dispositivos y Red
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (152, 5, 'SNRED001CIS', 'PNRED001CIS', 'Cisco', 'Catalyst 9300');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (152, 'Switch', 24, '10Gbps');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (153, 12, 'SNRED002NET', 'PNRED002NET', 'Netgear', 'Nighthawk RAX50');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (153, 'Router', 4, '5.4Gbps AX');

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (154, 18, 'SNRED003TPL', 'PNRED003TPL', 'TP-Link', 'Omada EAP660 HD');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (154, 'Punto de acceso inalámbrico', 2, '3.6Gbps AX'); -- Interfaces LAN

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (155, 2, 'SNRED004UBI', 'PNRED004UBI', 'Ubiquiti', 'EdgeRouter X');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (155, 'Router', 5, '1Gbps'); -- 5 puertos ethernet

INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (156, 15, 'SNRED005DLK', 'PNRED005DLK', 'D-Link', 'DGS-1210-28MP');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (156, 'Switch', 28, '1Gbps');

-- (Continuar con 45 más de Red, variando los datos)
-- ... (Ejemplos adicionales de Red)
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (157, 7, 'SNRED006ASU', 'PNRED006ASU', 'ASUS', 'RT-AX88U');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (157, 'Router', 8, '6Gbps AX');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (158, 1, 'SNRED007LIN', 'PNRED007LIN', 'Linksys', 'WRT3200ACM');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (158, 'Router', 4, '3.2Gbps AC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (159, 9, 'SNRED008MIK', 'PNRED008MIK', 'MikroTik', 'RB4011iGS+RM');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (159, 'Router', 10, '10Gbps SFP+');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (160, 11, 'SNRED009ARU', 'PNRED009ARU', 'Aruba', 'Instant On AP22');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (160, 'Punto de acceso inalámbrico', 1, '1.77Gbps AX');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (161, 14, 'SNRED010CIS', 'PNRED010CIS', 'Cisco', 'Meraki MS120-8LP');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (161, 'Switch', 8, '1Gbps PoE');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (162, 3, 'SNRED011NET', 'PNRED011NET', 'Netgear', 'Orbi RBK852');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (162, 'Router Mesh', 4, '6Gbps AX'); -- (por nodo)
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (163, 16, 'SNRED012TPL', 'PNRED012TPL', 'TP-Link', 'Deco X60');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (163, 'Punto de acceso inalámbrico', 2, '3Gbps AX'); -- (mesh)
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (164, 6, 'SNRED013UBI', 'PNRED013UBI', 'Ubiquiti', 'UniFi Switch Lite 16 PoE');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (164, 'Switch', 16, '1Gbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (165, 10, 'SNRED014DLK', 'PNRED014DLK', 'D-Link', 'DIR-X5460');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (165, 'Router', 6, '5.4Gbps AX');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (166, 19, 'SNRED015Zyx', 'PNRED015Zyx', 'Zyxel', 'GS1900-24HP');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (166, 'Switch', 24, '1Gbps PoE');
-- ... (Añadir 35 inserciones más para red para llegar a 50)
-- Placeholder for 35 more 'red'
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (167, 5, 'SNRED016CISCO', 'PNRED016CISCO', 'Cisco', 'ISR 4331');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (167, 'Router', 4, '300Mbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (168, 12, 'SNRED017NETGEAR', 'PNRED017NETGEAR', 'Netgear', 'GS308');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (168, 'Switch', 8, '1Gbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (169, 18, 'SNRED018TPLINK', 'PNRED018TPLINK', 'TP-Link', 'Archer C80');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (169, 'Router', 4, '1.9Gbps AC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (170, 2, 'SNRED019UBIQUI', 'PNRED019UBIQUI', 'Ubiquiti', 'AmpliFi HD');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (170, 'Router Mesh', 4, '1.75Gbps AC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (171, 15, 'SNRED020DLINK', 'PNRED020DLINK', 'D-Link', 'DGS-1008G');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (171, 'Switch', 8, '1Gbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (172, 7, 'SNRED021ASUS', 'PNRED021ASUS', 'ASUS', 'ZenWiFi AX (XT8)');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (172, 'Punto de acceso inalámbrico', 4, '6.6Gbps AX');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (173, 1, 'SNRED022LINKSYS', 'PNRED022LINKSYS', 'Linksys', 'Velop MX10');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (173, 'Router Mesh', 4, '5.3Gbps AX');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (174, 9, 'SNRED023MIKROTIK', 'PNRED023MIKROTIK', 'MikroTik', 'hAP ac3');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (174, 'Router', 5, '1.2Gbps AC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (175, 11, 'SNRED024ARUBA', 'PNRED024ARUBA', 'Aruba', '2530 24G PoE+');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (175, 'Switch', 24, '1Gbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (176, 14, 'SNRED025FORTINET', 'PNRED025FORTINET', 'Fortinet', 'FortiGate 60F');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (176, 'Firewall', 10, '10Gbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (177, 3, 'SNRED026SONICWALL', 'PNRED026SONICWALL', 'SonicWall', 'TZ270');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (177, 'Firewall', 5, '1Gbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (178, 16, 'SNRED027PALOALTO', 'PNRED027PALOALTO', 'Palo Alto', 'PA-220');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (178, 'Firewall', 8, '500Mbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (179, 6, 'SNRED028NETGEAR', 'PNRED028NETGEAR', 'Netgear', 'MS510TXPP');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (179, 'Switch', 8, '10Gbps MultiGig');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (180, 10, 'SNRED029TPLINK', 'PNRED029TPLINK', 'TP-Link', 'TL-SG105');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (180, 'Hub', 5, '1Gbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (181, 19, 'SNRED030QNAP', 'PNRED030QNAP', 'QNAP', 'QSW-M408-4C');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (181, 'Switch', 12, '10GbE SFP+');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (182, 5, 'SNRED031CISCOSB', 'PNRED031CISCOSB', 'Cisco', 'SG350-28');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (182, 'Switch', 28, '1Gbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (183, 12, 'SNRED032NETGEAR', 'PNRED032NETGEAR', 'Netgear', 'WAX610');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (183, 'Punto de acceso inalámbrico', 2, '1.8Gbps AX');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (184, 18, 'SNRED033TPLINK', 'PNRED033TPLINK', 'TP-Link', 'EAP225-Outdoor');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (184, 'Punto de acceso inalámbrico', 1, '1.2Gbps AC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (185, 2, 'SNRED034UBIQUI', 'PNRED034UBIQUI', 'Ubiquiti', 'UniFi AP AC Pro');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (185, 'Punto de acceso inalámbrico', 2, '1.75Gbps AC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (186, 15, 'SNRED035DLINK', 'SNRED035DLINK', 'D-Link', 'DAP-2610');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (186, 'Punto de acceso inalámbrico', 1, '1.3Gbps AC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (187, 7, 'SNRED036ASUS', 'SNRED036ASUS', 'ASUS', 'Lyra Voice');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (187, 'Router Mesh AP', 2, '2.2Gbps AC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (188, 1, 'SNRED037LINKSYS', 'SNRED037LINKSYS', 'Linksys', 'LAPN600');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (188, 'Punto de acceso inalámbrico', 1, '600Mbps N');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (189, 9, 'SNRED038MIKROTIK', 'SNRED038MIKROTIK', 'MikroTik', 'cAP ac');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (189, 'Punto de acceso inalámbrico', 2, '1.2Gbps AC');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (190, 11, 'SNRED039ENGENIUS', 'SNRED039ENGENIUS', 'EnGenius', 'EWS377AP');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (190, 'Punto de acceso inalámbrico', 2, '2.5Gbps AX');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (191, 14, 'SNRED040TRENDNET', 'PNRED040TRENDNET', 'TRENDnet', 'TEG-S50g');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (191, 'Switch', 5, '1Gbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (192, 3, 'SNRED041ALLIED', 'PNRED041ALLIED', 'Allied Telesis', 'AT-GS910/8');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (192, 'Switch', 8, '1Gbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (193, 16, 'SNRED042BUFFALO', 'PNRED042BUFFALO', 'Buffalo', 'BS-GS2016');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (193, 'Switch', 16, '1Gbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (194, 6, 'SNRED043EDIMAX', 'PNRED043EDIMAX', 'Edimax', 'GS-1008P V2');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (194, 'Switch', 8, '1Gbps PoE');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (195, 10, 'SNRED044HPENT', 'PNRED044HPENT', 'HPE', 'Aruba 2930F 48G');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (195, 'Switch', 48, '1Gbps');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (196, 19, 'SNRED045JUNIPER', 'PNRED045JUNIPER', 'Juniper', 'EX2300-C-12P');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (196, 'Switch', 12, '1Gbps PoE+');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (197, 5, 'SNRED046DELLNET', 'PNRED046DELLNET', 'Dell', 'N1548P');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (197, 'Switch', 48, '1Gbps PoE+');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (198, 12, 'SNRED047BROCADE', 'PNRED047BROCADE', 'Brocade', 'ICX 7150-C12P');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (198, 'Switch', 12, '1Gbps PoE+');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (199, 18, 'SNRED048ADTRAN', 'PNRED048ADTRAN', 'Adtran', 'NetVanta 1534P');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (199, 'Switch', 24, '1Gbps PoE');
INSERT INTO dispositivos (id, empresa, numeroSerie, numeroProducto, marca, modelo) VALUES (200, 2, 'SNRED049CISCO', 'PNRED049CISCO', 'Cisco', 'C1000-8P-2G-L');
INSERT INTO red (id, producto, interfaces, velocidadMaxima) VALUES (200, 'Switch', 8, '1Gbps');

-- Extra
UPDATE incidencias SET solucion = NULL, fechaCierre = NULL, desplazamiento = NULL, duracion = NULL WHERE estado = 1;
INSERT INTO intervenciones VALUES (1, 3, 'Reinstalar servicio samba', '2025-05-27', '2025-05-27', '00:30');
INSERT INTO intervenciones VALUES (2, 3, 'Almacenar las nuevas credenciales en todos los ordenadores de los usuarios', '2025-05-27', '2025-05-27', '02:00');
INSERT INTO intervencionesTecnicos VALUES (1, 0, '', '1970-01-01', '1970-01-01', '00:00');
INSERT INTO intervencionesTecnicos VALUES (2, 0, '', '1970-01-01', '1970-01-01', '00:00');
UPDATE incidencias
SET fechaCierre = '2025-05-27',
	estado = 0,
    solucion = 'No se ha podido encontrar el problema, por lo que se ha reinstalado el servicio preservando la configuración.',
    desplazamiento = 0,
    duracion = '02:30'
WHERE id = 3;
INSERT INTO dispositivos VALUES (201, 1, 'SRV00011', 'SRV01002', 'Dell', 'PowerEdge 160 4U');
INSERT INTO equipos VALUES (201, 1, 'Intel Xeon 6745P', '128GB DDR5 7000MHz ECC', '16 x 4TB HDD SAS 20K RPM', 'Windows server 2025 Datacenter', 'Rack', NULL);