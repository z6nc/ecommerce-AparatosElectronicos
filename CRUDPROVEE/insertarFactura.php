<?php
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $idpago=mysqli_real_escape_string($conexion,$_POST['pagoID']);
    $idfactura=mysqli_real_escape_string($conexion,$_POST['facturaID']);
    $producto=mysqli_real_escape_string($conexion,$_POST['productoP']);
    $precioF=mysqli_real_escape_string($conexion,$_POST['precioF']);
    $cantidad=mysqli_real_escape_string($conexion,$_POST['cantidadP']);
    $monto=mysqli_real_escape_string($conexion,$_POST['montoP']);

    $sql="INSERT INTO factura_proveedor (ID_PAGO_P, ID_FACTURA_P, PRODUCTO_P ,PRECIO_F ,CANTIDAD, MONTO_TOTAL) VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conexion,$sql);
    mysqli_stmt_bind_param($stmt,"ssssss", $idpago, $idfactura, $producto,$precioF ,$cantidad, $monto );
    if (mysqli_stmt_execute($stmt)) {
        echo '<script>';
        echo 'alert("Factura registrado correctamente.");';
        echo 'window.location.href = "../Proveedor/factura.php";';
        echo '</script>';
        

    } else{
        echo "ERROR AL INSERTAR DATOS " . mysqli_error($conexion);
    }

}



?>