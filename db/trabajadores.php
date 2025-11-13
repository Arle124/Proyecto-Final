<?php
require_once("../conexion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];
    $primer_nombre = $_POST["primer_nombre"];
    $segundo_nombre = $_POST["segundo_nombre"];
    $primer_apellido = $_POST["primer_apellido"];
    $segundo_apellido = $_POST["segundo_apellido"];
    $telefono = $_POST["telefono"];

    $sql = "INSERT INTO trabajador (cedula, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono) 
            VALUES ('$cedula', '$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$telefono')";
    if ($conexion->query($sql) === TRUE) {
        $mensaje = "✅ Trabajador registrado correctamente.";
    } else {
        $mensaje = "❌ Error: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Trabajadores</title>
  <link rel="stylesheet" href="../css/trabajadores.css?v=1">
</head>
<body>

  <div class="container">
    <h1>🧾 Registro de Trabajadores</h1>

    <form method="POST" action="">
      <input type="number" name="cedula" placeholder="Cédula de Ciudadanía" required min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
      <input type="text" name="primer_nombre" placeholder="Primer Nombre" required>
      <input type="text" name="segundo_nombre" placeholder="Segundo Nombre">
      <input type="text" name="primer_apellido" placeholder="Primer Apellido" required>
      <input type="text" name="segundo_apellido" placeholder="Segundo Apellido">
      <input type="number" name="telefono" placeholder="Teléfono" required min="0" oninput="this.value = this.value.replace(/[^0-9]/g, '');">

      <button type="submit">Registrar</button>
    </form>

    <?php if (isset($mensaje)): ?>
      <p class="msg"><?= $mensaje ?></p>
    <?php endif; ?>

    <a href="../index.php" class="volver">⬅ Volver al menú</a>
  </div>

</body>
</html>