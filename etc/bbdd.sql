-- Crear base de datos
CREATE DATABASE resolve;
USE resolve;

-- Tabla empresas
CREATE TABLE empresas (
	id SMALLINT NOT NULL,
    cif VARCHAR(10) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    telefono INT NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    cp INT,
    CONSTRAINT PK_empresas PRIMARY KEY (id)
);

-- Tabla usuarios
CREATE TABLE usuarios (
	id INT NOT NULL,
    empresa SMALLINT NOT NULL,
    nombre VARCHAR(150) NOT NULL,
    nombreUsuario VARCHAR(20) NOT NULL UNIQUE,
    correo VARCHAR(50) NOT NULL UNIQUE,
    contrasenia VARCHAR(256) NOT NULL,
    telefono INT NOT NULL,
    bloqueado BOOLEAN NOT NULL DEFAULT 0, -- Si no está bloqueado 0, si lo está, 1
    CONSTRAINT PK_usuarios PRIMARY KEY (id),
    CONSTRAINT FK_usuariosEmpresa FOREIGN KEY (empresa) REFERENCES empresas (id)
);

-- Tabla dispositivos
CREATE TABLE dispositivos (
	id INT NOT NULL,
    empresa SMALLINT NOT NULL,
    numeroSerie VARCHAR(30) NOT NULL UNIQUE,
    numeroProducto VARCHAR(30) NOT NULL,
    marca VARCHAR(20) NOT NULL,
    modelo VARCHAR(30) NOT NULL,
    CONSTRAINT PK_dispositivos PRIMARY KEY (id),
    CONSTRAINT FK_dispositivosEmpresa FOREIGN KEY (empresa) REFERENCES empresas (id)
);

-- Tabla equipos
CREATE TABLE equipos (
	id INT NOT NULL,
    servidorCliente BOOLEAN NOT NULL, -- Si es cliente 0, si es servidor 1
    procesador VARCHAR(40) NOT NULL,
    memoria VARCHAR(30) NOT NULL,
    almacenamiento VARCHAR(50) NOT NULL,
    sistema VARCHAR(25) NOT NULL,
    version VARCHAR(15) NOT NULL,
    tipo VARCHAR(20) NOT NULL,
    otros VARCHAR(500),
    CONSTRAINT PK_equipos PRIMARY KEY (id),
    CONSTRAINT FK_equiposDispositivo FOREIGN KEY (id) REFERENCES dispositivos (id)
);

-- Tabla impresoras
CREATE TABLE impresoras (
	id INT NOT NULL,
    velocidad FLOAT(2) NOT NULL,
    resolucion FLOAT(2) NOT NULL,
    metodoImpresion VARCHAR(25) NOT NULL,
    color BOOLEAN NOT NULL, -- Si no imprime a color 0, si imprime a color 1
    CONSTRAINT PK_impresoras PRIMARY KEY (id),
    CONSTRAINT FK_impresorasDispositivo FOREIGN KEY (id) REFERENCES dispositivos (id)
);

-- Tabla moviles
CREATE TABLE moviles (
	id INT NOT NULL,
    procesador VARCHAR(40) NOT NULL,
    memoria VARCHAR(30) NOT NULL,
    almacenamiento VARCHAR(50) NOT NULL,
    sistema VARCHAR(25) NOT NULL,
    version VARCHAR(15) NOT NULL,
    CONSTRAINT PK_moviles PRIMARY KEY (id),
    CONSTRAINT FK_movilesDispositivo FOREIGN KEY (id) REFERENCES dispositivos (id)
);

-- Tabla otros
CREATE TABLE otros (
	id INT NOT NULL,
    denominacion VARCHAR(35) NOT NULL,
    caracteristicas VARCHAR(1000) NOT NULL,
    CONSTRAINT PK_otros PRIMARY KEY (id),
    CONSTRAINT FK_otrosDispositivo FOREIGN KEY (id) REFERENCES dispositivos (id)
);

-- Tabla red
CREATE TABLE red (
	id INT NOT NULL,
    producto VARCHAR(40) NOT NULL,
    interfaces TINYINT NOT NULL,
    velocidadMaxima VARCHAR(15) NOT NULL,
    CONSTRAINT PK_red PRIMARY KEY (id),
    CONSTRAINT FK_redDispositivo FOREIGN KEY (id) REFERENCES dispositivos (id)
);

-- Tabla areas
CREATE TABLE areas (
	id TINYINT NOT NULL,
    denominacion VARCHAR(50) NOT NULL,
    CONSTRAINT PK_areas PRIMARY KEY (id)
);

-- Tabla tecnicos
CREATE TABLE tecnicos (
	id SMALLINT NOT NULL,
    nombre VARCHAR(150) NOT NULL,
	nombreUsuario VARCHAR(20),
    correo VARCHAR(50) NOT NULL,
    contrasenia VARCHAR(256) NOT NULL,
    telefono INT NOT NULL,
    bloqueado BOOLEAN NOT NULL,
    CONSTRAINT PK_tecnicos PRIMARY KEY (id)
);

-- Tabla areasTecnicos
CREATE TABLE areasTecnicos (
	area TINYINT NOT NULL,
    tecnico SMALLINT NOT NULL,
    CONSTRAINT PK_areasTecnicos PRIMARY KEY (area, tecnico),
    CONSTRAINT FK_areasTecnicosArea FOREIGN KEY (area) REFERENCES areas (id),
    CONSTRAINT FK_areasTecnicosTecnico FOREIGN KEY (tecnico) REFERENCES tecnicos (id)
);

-- Tabla incidencias
CREATE TABLE incidencias (
	id INT NOT NULL,
    usuario INT NOT NULL,
    descripcion VARCHAR(1000) NOT NULL,
    fechaApertura DATE NOT NULL,
    fechaCierreEsp DATE,
    fechaCierre DATE,
    estado BOOLEAN NOT NULL DEFAULT 1, -- Si la incidencia está cerrada es 0, si está abierta es 1
    solucion VARCHAR(2000),
    desplazamiento BOOLEAN, -- Si no hay desplazamiento es 0, si lo hay es 1
    duracion TIME,
    CONSTRAINT PK_incidencias PRIMARY KEY (id),
    CONSTRAINT FK_incidenciasUsuario FOREIGN KEY (usuario) REFERENCES usuarios (id)
);

-- Tabla incidenciasAreas
CREATE TABLE incidenciasAreas (
	incidencia INT NOT NULL,
    area TINYINT NOT NULL,
    CONSTRAINT PK_incidenciasAreas PRIMARY KEY (incidencia, area),
    CONSTRAINT FK_incidenciasAreasIncidencia FOREIGN KEY (incidencia) REFERENCES incidencias (id),
    CONSTRAINT FK_incidenciasAreasArea FOREIGN KEY (area) REFERENCES areas (id)
);

-- Tabla dispositivosIncidencias
CREATE TABLE dispositivosIncidencias (
	dispositivo INT NOT NULL,
    incidencia INT NOT NULL,
    CONSTRAINT PK_dispositivosIncidencias PRIMARY KEY (dispositivo, incidencia),
    CONSTRAINT FK_dispositivosIncidenciasDispositivo FOREIGN KEY (dispositivo) REFERENCES dispositivos (id),
    CONSTRAINT FK_dispositivosIncidenciasIncidencia FOREIGN KEY (incidencia) REFERENCES incidencias (id)
);

-- Tabla intervenciones
CREATE TABLE intervenciones (
	id INT NOT NULL,
    incidencia INT NOT NULL,
    descripcion VARCHAR(2000) NOT NULL,
	fechaInicio DATE NOT NULL,
    fechaFin DATE,
    duracion TIME,
    CONSTRAINT PK_intervenciones PRIMARY KEY (id),
    CONSTRAINT FK_intervencionesIncidencia FOREIGN KEY (incidencia) REFERENCES incidencias (id)
);

-- Tabla intervencionesTecnicos
CREATE TABLE intervencionesTecnicos (
	intervencion INT NOT NULL,
    tecnico SMALLINT NOT NULL,
    descripcion VARCHAR(2000) NOT NULL,
	fechaInicio DATE NOT NULL,
    fechaFin DATE,
    duracion TIME,
    CONSTRAINT PK_intervencionesTecnicos PRIMARY KEY (intervencion, tecnico),
    CONSTRAINT FK_intervencionesTecnicosIncidencia FOREIGN KEY (intervencion) REFERENCES intervenciones (id),
    CONSTRAINT FK_intervencionesTecnicosTecnico FOREIGN KEY (tecnico) REFERENCES tecnicos (id)
);

-- Crear empresas
INSERT INTO empresas (id, cif, nombre, correo, telefono, direccion, cp) VALUES
(0, '0', 'Empresa de prueba 0', 'info@resolveplus.local', '123456789', '-', '00000'),
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

-- Crear usuarios
INSERT INTO usuarios VALUES
(0, 0, 'Usuario de prueba 0', 'usuario0', 'usuario0@resolveplus.local', '*', '123456789', 0),
(1, 1, 'Carlos Fernández', 'cfernandez', 'cfernandez@gourmetdelicias.com', '*', '912345001', 1),
(2, 2, 'Ana López', 'alopez', 'alopez@autorapido.com', '*', '934567002', 1),
(3, 3, 'Javier Martínez', 'jmartinez', 'jmartinez@ecohogar.com', '*', '956789003', 1),
(4, 4, 'Sofía Gómez', 'sgomez', 'sgomez@globalmoda.com', '*', '900123004', 1),
(5, 5, 'Miguel Rodríguez', 'mrodriguez', 'mrodriguez@creativemedia.com', '*', '921234005', 1),
(6, 6, 'Laura Sánchez', 'lsanchez', 'lsanchez@agrofinca.com', '*', '912345006', 1),
(7, 7, 'David Jiménez', 'djimenez', 'djimenez@viajesfantasticos.com', '*', '934567007', 1),
(8, 8, 'Elena Díaz', 'ediaz', 'ediaz@saludvital.com', '*', '956789008', 1),
(9, 9, 'Pablo Ruiz', 'pruiz', 'pruiz@construccionesseguras.com', '*', '900123009', 1),
(10, 10, 'Carmen Moreno', 'cmoreno', 'cmoreno@deporteselite.com', '*', '921234010', 1),
(11, 11, 'Isabel Castro', 'icastro', 'icastro@agenciadeeventos.com', '*', '921234050', 1);

-- Crear áreas
INSERT INTO areas VALUES
(0, 'Área de prueba 0'),
(1, 'Redes'),
(2, 'Sistemas'),
(3, 'Seguridad'),
(4, 'Microinformática (equipos, móviles, impresoras...'),
(5, 'Aplicaciones');

-- Crear técnicos
INSERT INTO tecnicos VALUES
(0, 'Técnico de prueba 0', 'tecnico0', 'tecnico0@resolveplus.local', '*', '123456789', 0),
(1, 'Luis Ramírez', 'lramirez', 'lramirez@resolveplus.es', '*', '912345001', 1),
(2, 'Andrea Torres', 'atorres', 'atorres@resolveplus.es', '*', '934567002', 1),
(3, 'Fernando Martínez', 'fmartinez', 'fmartinez@resolveplus.es', '*', '956789003', 1),
(4, 'Sofía Ruiz', 'sruiz', 'sruiz@resolveplus.es', '*', '900123004', 1),
(5, 'Daniel Gómez', 'dgomez', 'dgomez@resolveplus.es', '*', '921234005', 1),
(6, 'Beatriz Sánchez', 'bsanchez', 'bsanchez@resolveplus.es', '*', '912345006', 1),
(7, 'Alejandro López', 'alopez', 'alopez@resolveplus.es', '*', '934567007', 1),
(8, 'Natalia Castillo', 'ncastillo', 'ncastillo@resolveplus.es', '*', '956789008', 1),
(9, 'Emilio Hernández', 'ehernandez', 'ehernandez@resolveplus.es', '*', '900123009', 1),
(10, 'Carla Domínguez', 'cdominguez', 'cdominguez@resolveplus.es', '*', '921234010', 1),
(11, 'Roberto Vázquez', 'rvazquez', 'rvazquez@resolveplus.es', '*', '912345011', 1),
(12, 'Esther Ramos', 'eramos', 'eramos@resolveplus.es', '*', '934567012', 1),
(13, 'Lucía Salas', 'lsalas', 'lsalas@resolveplus.es', '*', '956789013', 1),
(14, 'Pablo Aguilar', 'paguilar', 'paguilar@resolveplus.es', '*', '900123014', 1),
(15, 'Irene Navarro', 'inavarro', 'inavarro@resolveplus.es', '*', '921234015', 1);

-- Asociar áreas con técnicos
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