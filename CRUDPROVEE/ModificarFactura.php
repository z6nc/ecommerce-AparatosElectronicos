<?php
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idFactura = $_POST["idFactura"];
    $pagoID = $_POST["pagoID"];
    $productoP = $_POST["productoP"];
    $cantidadP = $_POST["cantidadP"];
    $montoP = $_POST["montoP"];



   
   
    $pagoID = mysqli_real_escape_string($conexion, $pagoID);
    $productoP = mysqli_real_escape_string($conexion, $productoP);
    $cantidadP = mysqli_real_escape_string($conexion, $cantidadP);
    $montoP = mysqli_real_escape_string($conexion, $montoP);
   


   
    $sql = "UPDATE factura_proveedor SET ID_PAGO_P=?, PRODUCTO_P=?, CANTIDAD=?, MONTO_TOTAL=? WHERE ID_FACTURA_P=?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssi", $pagoID, $productoP, $cantidadP, $montoP, $idFactura);

     
    if ($stmt->execute()) {
        echo '<script>';
        echo 'alert("factura actualizada correctamente.");';
        echo 'window.location.href = "../Proveedor/factura.php";';
        echo '</script>';
    } else {
        echo "Error al actualizar la compra: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
} else {
    $idFactura = $_GET["id"];
    $sql = "SELECT f.ID_PAGO_P  ,f.PRODUCTO_P , f.CANTIDAD ,f.MONTO_TOTAL
        FROM factura_proveedor f
        INNER JOIN pago_proveedor p ON p.ID_PAGO_P = f.ID_PAGO_P
        WHERE f.ID_FACTURA_P = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idFactura);
  
    if ($stmt->execute()) {
        $stmt->bind_result($pagoID ,$productoP, $cantidadP,$montoP);
        $stmt->fetch();
        $stmt->close();
    }
}
?>
