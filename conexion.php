<?php

$host = "localhost";
$usuario = "root";
$password = "";
$bd = "inventario";

// Conectar al servidor MySQL sin seleccionar la BD para crearla si hace falta
$conexion = mysqli_connect($host, $usuario, $password);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Crear la base de datos si no existe y seleccionarla
if (!mysqli_select_db($conexion, $bd)) {
    $createdb_sql = "CREATE DATABASE IF NOT EXISTS `$bd` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
    if (!mysqli_query($conexion, $createdb_sql)) {
        die("Error al crear la base de datos: " . mysqli_error($conexion));
    }
    mysqli_select_db($conexion, $bd);
}

// Establecer el conjunto de caracteres
mysqli_set_charset($conexion, "utf8mb4");

// Crear la tabla `productos` si no existe
$crear_tabla = "CREATE TABLE IF NOT EXISTS `productos` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL,
    `precio` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    `cantidad` INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if (!mysqli_query($conexion, $crear_tabla)) {
    die("Error al crear la tabla productos: " . mysqli_error($conexion));
}

?>