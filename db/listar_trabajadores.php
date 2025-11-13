<?php
require_once("../conexion/conexion.php");

$resultado = $conexion->query("SELECT * FROM trabajador");

if ($resultado->num_rows > 0) {
    echo "<table border='1'><tr><th>Id Trabajador</th><th>Cédula</th><th>Primer Nombre</th><th>Segundo Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Teléfono</th><th>Estado</th></tr>";
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_trabajador']}</td>
                <td>{$row['cedula']}</td>
                <td>{$row['primer_nombre']}</td>
                <td>{$row['segundo_nombre']}</td>
                <td>{$row['primer_apellido']}</td>
                <td>{$row['segundo_apellido']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['estado']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay trabajadores registrados.";
}
?>