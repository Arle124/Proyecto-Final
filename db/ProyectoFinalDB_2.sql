-- ============================================================
-- PROYECTO FINAL - BASE DE DATOS
-- Estructura inicial optimizada (versión revisada)
-- ============================================================

-- ============================================================
-- 👨‍💻 Tabla: Administradores
-- ============================================================
CREATE TABLE IF NOT EXISTS administradores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL UNIQUE,
  contrasenia VARCHAR(100) NOT NULL
);

-- ============================================================
-- 👥 Tabla: Usuarios
-- ============================================================
CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  contrasenia VARCHAR(100) NOT NULL,
  fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  rol ENUM('usuario', 'admin') DEFAULT 'usuario'
);

-- ============================================================
-- 👷 Tabla: Trabajador
-- ============================================================
CREATE TABLE IF NOT EXISTS trabajador (
  id_trabajador INT AUTO_INCREMENT PRIMARY KEY,
  cedula INT NOT NULL UNIQUE,
  primer_nombre VARCHAR(50) NOT NULL,
  segundo_nombre VARCHAR(50),
  primer_apellido VARCHAR(50) NOT NULL,
  segundo_apellido VARCHAR(50),
  telefono VARCHAR(15) NOT NULL,
  estado ENUM('activo','inactivo','suspendido') DEFAULT 'activo'
);

-- ============================================================
-- 📄 Tabla: Reporte de trabajador
-- ============================================================
CREATE TABLE IF NOT EXISTS reporte_trabajador (
  id_reporte INT AUTO_INCREMENT PRIMARY KEY,
  id_trabajador INT NOT NULL,
  fecha_reporte TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  descripcion TEXT NOT NULL,
  total_toneladas DECIMAL(10,2) NOT NULL,
  total_gasto_acpm DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador)
  ON DELETE NO ACTION
  ON UPDATE CASCADE
);

-- ============================================================
-- 🕓 Tabla: Historial de estados de trabajador
-- ============================================================
CREATE TABLE IF NOT EXISTS historial_estado_trabajador (
  id_historial INT AUTO_INCREMENT PRIMARY KEY,
  id_trabajador INT NOT NULL,
  fecha_cambio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  estado_anterior VARCHAR(20) NOT NULL,
  estado_nuevo VARCHAR(20) NOT NULL,
  motivo TEXT NOT NULL,
  FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador)
);

-- ============================================================
-- 🚗 Tabla: Vehículo
-- ============================================================
CREATE TABLE IF NOT EXISTS vehiculo (
  id_vehiculo INT AUTO_INCREMENT PRIMARY KEY,
  placa VARCHAR(10) NOT NULL UNIQUE,
  tonelaje_maximo DECIMAL(10,2) NOT NULL,
  tipo_vehiculo VARCHAR(50) NOT NULL
);

-- ============================================================
-- 🧳 Tabla: Viaje
-- ============================================================
-- Tabla viaje
CREATE TABLE IF NOT EXISTS viaje (
  id_viaje INT AUTO_INCREMENT PRIMARY KEY,
  id_vehiculo INT NOT NULL,
  id_trabajador INT NOT NULL,
  origen VARCHAR(100) NOT NULL,
  destino VARCHAR(100) NOT NULL,
  tonelaje DECIMAL(10,2) NOT NULL,
  acpm_galones DECIMAL(10,2) NOT NULL,
  precio_acpm DECIMAL(10,2) NOT NULL,
  total_acpm DECIMAL(10,2) NOT NULL,
  fecha_viaje TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_vehiculo) REFERENCES vehiculo(id_vehiculo)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
);


-- ============================================================
-- 📆 Tabla: Reporte mensual de viajes
-- ============================================================
CREATE TABLE IF NOT EXISTS reporte_mensual_viajes (
  id_reporte_mensual INT AUTO_INCREMENT PRIMARY KEY,
  id_trabajador INT NOT NULL,
  mes INT NOT NULL,
  anio INT NOT NULL,
  total_toneladas DECIMAL(10,2) NOT NULL,
  total_gasto_acpm DECIMAL(10,2) NOT NULL,
  cantidad_viajes INT NOT NULL,
  fecha_generacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
);

-- ============================================================
-- FIN DEL SCRIPT
-- ============================================================