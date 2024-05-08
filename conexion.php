<?php
require("configuracion.php");

// Establecer conexión usando mysqli
$conexion = new mysqli($server, $user, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>
