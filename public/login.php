<?php
session_start();
require_once("../conexion/conexion.php"); // Conexión a la base de datos

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario = $_POST["usuario"];
    $contrasenia = $_POST["contrasenia"];

    $sql = "SELECT * FROM administradores
    where usuario = '$usuario'"; // Consulta para obtener el usuario

    $resultado = $conexion ->query($sql); // Ejecutar la consulta

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();// Obtener los datos del usuario

        if (password_verify($contrasenia, $row["contrasenia"])) {
            $_SESSION["admin"] = $usuario;
            header("Location: ../index.php");
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta');</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login | Proyecto Final</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

  <h2>Iniciar Sesión</h2>
  <form method="POST">
    <label>Usuario:</label><br>
    <input type="text" name="usuario" required><br><br>
    <label>Contraseña:</label><br>
    <input type="password" name="contrasenia" required><br><br>
    <button type="submit">Entrar</button>
  </form>
  
</body>

</html>