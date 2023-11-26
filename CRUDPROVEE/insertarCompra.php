<?php
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreAdmin = mysqli_real_escape_string($conexion, $_POST['nombreAdmin']);
    $proveedor = mysqli_real_escape_string($conexion, $_POST['proveedor']);
    $producto = mysqli_real_escape_string($conexion, $_POST['productoP']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcionP']);
    $precio = mysqli_real_escape_string($conexion,$_POST['precioP']);
    
    $sql = "INSERT INTO comprasproveedor (ID_ADMIN, ID_PROVEEDOR, PRODUCTO_P, DESCRIPCION_P, PRECIO_P) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ssssd", $nombreAdmin, $proveedor, $producto, $descripcion, $precio);
    
    try {
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>';
            echo 'alert("Compra registrado correctamente.");';
            echo 'window.location.href = "../Proveedor/listaCompraProve.php";';
            echo '</script>';
            
        } else {
            echo "Error al insertar: " . mysqli_error($conexion);
        }
    } catch (Exception $e) {
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            echo "El  atributo  se repite. Por favor, agregue otro.";
        } else {
            echo "Error al insertar: " . $e->getMessage();
        }
    }
}



?>
