<?php
$local="localhost";
$username="root";
$password="";
$database="bd_compras";



$conexion =new mysqli($local,$username,$password,$database);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>