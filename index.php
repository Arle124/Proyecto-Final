<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: public/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css"?v=2>  
    <title>Car Manager</title>
</head>
<body>

    <h1>Administración</h1>

    <!-- Menú -->

    <div class="main_menu">
        <!-- Registrar trabajadores -->

        <button onclick="location.href='db/trabajadores.php'">Registrar Trabajador</button>

        <!-- Registrar vehículos -->

        <button onclick="location.href='db/vehiculos.php'">Registrar Vehículo</button>
        
        <!-- Registrar Viajes -->

        <button onclick="location.href='db/registro_viajes.php'">Registrar Viaje</button>

        <!-- Listar trabajadores -->

        <button id = "listarTrabajadores" type = "button" onclick="listarTrabajadores()">Listar Trabajadores</button>

        <!-- Listar vehículos -->

        <button onclick="location.href='db/listar_vehiculos.php'">Listar Vehículos</button>

        <!-- Consultar registro de viajes -->

        <button onclick="location.href='db/registro_viajes.php'">Consultar Registro de Viajes</button>

        <!-- Consultar nómina -->

        <button onclick="location.href='db/nomina.php'">Consultar Nómina</button>

        <!-- resultado listar trabajadores -->
        <div id = "resultado-listar-trabajadores"></div>

    </div>

    <div id = "logout-btn">
        <button onclick="location.href='public/logout.php'">Cerrar sesión</button>
    </div>

    <script src="js/scripts.js"></script>
</body>
</html>