<?php
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idcompras = $_POST["idcompras"];
    $nombreAdmin = $_POST["nombreAdmin"];
    $razonSocialProveedor = $_POST["proveedor"];  // Modificado aquí para usar el nombre correcto del campo del formulario
    $productoP = $_POST["productoP"];
    $descripcionP = $_POST["descripcionP"];
    $precioP = $_POST["precioP"];
    
    $nombreAdmin = mysqli_real_escape_string($conexion, $nombreAdmin);
    $razonSocialProveedor = mysqli_real_escape_string($conexion, $razonSocialProveedor);
    $productoP = mysqli_real_escape_string($conexion, $productoP);
    $descripcionP = mysqli_real_escape_string($conexion, $descripcionP);
    $precioP = mysqli_real_escape_string($conexion, $precioP);

    $sql = "UPDATE comprasproveedor SET ID_ADMIN=?, ID_PROVEEDOR=?, PRODUCTO_P=?, DESCRIPCION_P=? ,PRECIO_P=? WHERE ID_COMPRAS_P=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssi", $nombreAdmin, $razonSocialProveedor, $productoP, $descripcionP, $precioP, $idcompras );
     
    if ($stmt->execute()) {
        echo '<script>';
        echo 'alert("Compra actualizada correctamente.");';
        echo 'window.location.href = "../Proveedor/listaCompraProve.php";';
        echo '</script>';
    } else {
        echo "Error al actualizar la compra: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
} else {
    $idcompras = $_GET["id"];
    $sql = "SELECT a.NOMBRE, p.RAZON_SOCIAL , c.PRODUCTO_P, c.DESCRIPCION_P, c.PRECIO_P
        FROM comprasproveedor c
        INNER JOIN admin a ON c.ID_ADMIN = a.ID_ADMIN
        INNER JOIN proveedor p ON c.ID_PROVEEDOR = p.ID_PROVEEDOR
        WHERE c.ID_COMPRAS_P = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idcompras);
  
    if ($stmt->execute()) {
        $stmt->bind_result($nombreAdmin, $razonSocialProveedor, $productoP, $descripcionP, $precioP);
        $stmt->fetch();
        $stmt->close();
    }
}
?>
