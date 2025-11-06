<?php
require_once("../conexion/conexion.php");

$usuario = "admin";
$contrasenia = "1234";
$hash = password_hash($contrasenia, PASSWORD_DEFAULT);

// Consulta para insertar el nuevo administrador
$sql = "INSERT INTO administradores (usuario, contrasenia) VALUES ('$usuario', '$hash')";
if ($conexion->query($sql) === TRUE) {
    echo "Administrador creado correctamente";
} else {
    echo "Error: " . $conexion->error;
}
?>