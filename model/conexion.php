<?php
$host = "localhost";
$usuario = "root";
$contrasenia = "";
$base_de_datos = "consultorio";
$conexion = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
if ($conexion->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
return $conexion;
?>