<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: public/login.php");
    exit();
}
?>
<?php
require_once("conexion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];

    $sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";
    if ($conexion->query($sql) === TRUE) {
        $mensaje = "✅ Usuario registrado correctamente.";
    } else {
        $mensaje = "❌ Error: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Registro de usuarios</title>
</head>
<body>

    <h2>Registro de Usuarios</h2>

    <form method="POST" action="">
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <button type="submit">Registrar</button>
    </form>

    <div id = "logout-btn">
        <a href="public/logout.php">Cerrar sesión</a>
    </div>

    <?php if (isset($mensaje)) echo "<p class='msg'>$mensaje</p>";?>

</body>
</html>