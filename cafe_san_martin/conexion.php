<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "cafe_san_martin";

$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión al servidor: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>