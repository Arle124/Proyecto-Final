<?php
$host = "127.0.0.1"; // localhost
$usuario = "root"; // usuario de MySQL
$contraseña = "1234"; 
$base_datos = "proyecto_final"; 

$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

// verificar si hay un error en la conexion
if ($conexion->connect_error) {
    die("❌ Error al conectar con la base de datos: " . $conexion->connect_error);
}
?>