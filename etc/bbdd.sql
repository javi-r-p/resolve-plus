-- Crear base de datos
CREATE DATABASE resolve;
USE resolve;

-- Tabla empresas
CREATE TABLE empresas (
	id SMALLINT UNSIGNED NOT NULL,
    cif VARCHAR(10) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    telefono INT UNSIGNED NOT NULL,
    direccion VARCHAR(200) NOT NULL,
    cp INT UNSIGNED,
    CONSTRAINT PK_empresas PRIMARY KEY (id)
);

-- Tabla usuarios
CREATE TABLE usuarios (
	id INT UNSIGNED NOT NULL,
    empresa SMALLINT UNSIGNED NOT NULL,
    nombre VARCHAR(150) NOT NULL,
    nombreUsuario VARCHAR(20) NOT NULL UNIQUE,
    correo VARCHAR(50) NOT NULL UNIQUE,
    contrasenia VARCHAR(256) NOT NULL,
    telefono INT UNSIGNED NOT NULL,
    bloqueado BOOLEAN NOT NULL DEFAULT 0, -- Si no está bloqueado 0, si lo está, 1
    CONSTRAINT PK_usuarios PRIMARY KEY (id),
    CONSTRAINT FK_usuariosEmpresa FOREIGN KEY (empresa) REFERENCES empresas (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Tabla dispositivos
CREATE TABLE dispositivos (
	id INT UNSIGNED NOT NULL,
    empresa SMALLINT UNSIGNED NOT NULL,
    numeroSerie VARCHAR(30) NOT NULL UNIQUE,
    numeroProducto VARCHAR(30) NOT NULL,
    marca VARCHAR(20) NOT NULL,
    modelo VARCHAR(30) NOT NULL,
    CONSTRAINT PK_dispositivos PRIMARY KEY (id),
    CONSTRAINT FK_dispositivosEmpresa FOREIGN KEY (empresa) REFERENCES empresas (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Tabla equipos
CREATE TABLE equipos (
	id INT UNSIGNED NOT NULL,
    servidorCliente BOOLEAN NOT NULL, -- Si es cliente 0, si es servidor 1
    procesador VARCHAR(40) NOT NULL,
    memoria VARCHAR(30) NOT NULL,
    almacenamiento VARCHAR(50) NOT NULL,
    sistema VARCHAR(40) NOT NULL,
    tipo VARCHAR(20) NOT NULL,
    otros VARCHAR(500),
    CONSTRAINT PK_equipos PRIMARY KEY (id),
    CONSTRAINT FK_equiposDispositivo FOREIGN KEY (id) REFERENCES dispositivos (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Tabla impresoras
CREATE TABLE impresoras (
	id INT UNSIGNED NOT NULL,
    velocidad FLOAT(2) NOT NULL,
    resolucion FLOAT(2) NOT NULL,
    metodoImpresion VARCHAR(25) NOT NULL,
    color BOOLEAN NOT NULL, -- Si no imprime a color 0, si imprime a color 1
    CONSTRAINT PK_impresoras PRIMARY KEY (id),
    CONSTRAINT FK_impresorasDispositivo FOREIGN KEY (id) REFERENCES dispositivos (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Tabla moviles
CREATE TABLE moviles (
	id INT UNSIGNED NOT NULL,
    procesador VARCHAR(40) NOT NULL,
    memoria VARCHAR(30) NOT NULL,
    almacenamiento VARCHAR(50) NOT NULL,
    sistema VARCHAR(40) NOT NULL,
    CONSTRAINT PK_moviles PRIMARY KEY (id),
    CONSTRAINT FK_movilesDispositivo FOREIGN KEY (id) REFERENCES dispositivos (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Tabla otros
CREATE TABLE otros (
	id INT UNSIGNED NOT NULL,
    denominacion VARCHAR(35) NOT NULL,
    caracteristicas VARCHAR(1000) NOT NULL,
    CONSTRAINT PK_otros PRIMARY KEY (id),
    CONSTRAINT FK_otrosDispositivo FOREIGN KEY (id) REFERENCES dispositivos (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Tabla red
CREATE TABLE red (
	id INT UNSIGNED NOT NULL,
    producto VARCHAR(40) NOT NULL,
    interfaces TINYINT UNSIGNED NOT NULL,
    velocidadMaxima VARCHAR(15) NOT NULL,
    CONSTRAINT PK_red PRIMARY KEY (id),
    CONSTRAINT FK_redDispositivo FOREIGN KEY (id) REFERENCES dispositivos (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Tabla areas
CREATE TABLE areas (
	id TINYINT UNSIGNED NOT NULL,
    denominacion VARCHAR(50) NOT NULL,
    CONSTRAINT PK_areas PRIMARY KEY (id)
);

-- Tabla tecnicos
CREATE TABLE tecnicos (
	id SMALLINT UNSIGNED NOT NULL,
    nombre VARCHAR(150) NOT NULL,
	nombreUsuario VARCHAR(20),
    correo VARCHAR(50) NOT NULL,
    contrasenia VARCHAR(256) NOT NULL,
    telefono INT UNSIGNED NOT NULL,
    bloqueado BOOLEAN NOT NULL,
    CONSTRAINT PK_tecnicos PRIMARY KEY (id)
);

-- Tabla areasTecnicos
CREATE TABLE areasTecnicos (
	area TINYINT UNSIGNED NOT NULL,
    tecnico SMALLINT UNSIGNED NOT NULL,
    CONSTRAINT PK_areasTecnicos PRIMARY KEY (area, tecnico),
    CONSTRAINT FK_areasTecnicosArea FOREIGN KEY (area) REFERENCES areas (id) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_areasTecnicosTecnico FOREIGN KEY (tecnico) REFERENCES tecnicos (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Tabla incidencias
CREATE TABLE incidencias (
	id INT UNSIGNED NOT NULL,
    usuario INT UNSIGNED NOT NULL,
    descripcion VARCHAR(1000) NOT NULL,
    urgente BOOLEAN, -- Si no es urgente 0, si lo es 1
    fechaApertura DATE NOT NULL,
    fechaCierreEsp DATE,
    fechaCierre DATE,
    estado BOOLEAN NOT NULL DEFAULT 1, -- Si la incidencia está cerrada es 0, si está abierta es 1
    solucion VARCHAR(2000),
    desplazamiento BOOLEAN, -- Si no hay desplazamiento es 0, si lo hay es 1
    duracion TIME,
    CONSTRAINT PK_incidencias PRIMARY KEY (id),
    CONSTRAINT FK_incidenciasUsuario FOREIGN KEY (usuario) REFERENCES usuarios (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Tabla incidenciasAreas
CREATE TABLE incidenciasAreas (
	incidencia INT UNSIGNED NOT NULL,
    area TINYINT UNSIGNED NOT NULL,
    CONSTRAINT PK_incidenciasAreas PRIMARY KEY (incidencia, area),
    CONSTRAINT FK_incidenciasAreasIncidencia FOREIGN KEY (incidencia) REFERENCES incidencias (id) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_incidenciasAreasArea FOREIGN KEY (area) REFERENCES areas (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Tabla dispositivosIncidencias
CREATE TABLE dispositivosIncidencias (
	dispositivo INT UNSIGNED NOT NULL,
    incidencia INT UNSIGNED NOT NULL,
    CONSTRAINT PK_dispositivosIncidencias PRIMARY KEY (dispositivo, incidencia),
    CONSTRAINT FK_dispositivosIncidenciasDispositivo FOREIGN KEY (dispositivo) REFERENCES dispositivos (id) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_dispositivosIncidenciasIncidencia FOREIGN KEY (incidencia) REFERENCES incidencias (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Tabla intervenciones
CREATE TABLE intervenciones (
	id INT UNSIGNED NOT NULL,
    incidencia INT UNSIGNED NOT NULL,
    descripcion VARCHAR(2000) NOT NULL,
	fechaInicio DATE NOT NULL,
    fechaFin DATE,
    duracion TIME,
    CONSTRAINT PK_intervenciones PRIMARY KEY (id),
    CONSTRAINT FK_intervencionesIncidencia FOREIGN KEY (incidencia) REFERENCES incidencias (id)
);

-- Tabla intervencionesTecnicos
CREATE TABLE intervencionesTecnicos (
	intervencion INT UNSIGNED NOT NULL,
    tecnico SMALLINT UNSIGNED NOT NULL,
    descripcion VARCHAR(2000) NOT NULL,
	fechaInicio DATE NOT NULL,
    fechaFin DATE,
    duracion TIME,
    CONSTRAINT PK_intervencionesTecnicos PRIMARY KEY (intervencion, tecnico),
    CONSTRAINT FK_intervencionesTecnicosIncidencia FOREIGN KEY (intervencion) REFERENCES intervenciones (id),
    CONSTRAINT FK_intervencionesTecnicosTecnico FOREIGN KEY (tecnico) REFERENCES tecnicos (id)
);