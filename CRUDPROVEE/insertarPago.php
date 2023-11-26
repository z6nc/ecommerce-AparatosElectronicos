<?php

include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"]=="POST") {
   $nombreCompra=mysqli_real_escape_string($conexion,$_POST['nombreC']);
   $formaPago=mysqli_real_escape_string($conexion,$_POST['formaP']);
   $fechaPago=mysqli_real_escape_string($conexion,$_POST['fechaP']);
   $sql="INSERT INTO pago_proveedor (ID_COMPRAS_P, FORMA_PAGO_P, FECHA_PAGO_P) VALUES (?,?,?)";
   $stmt= mysqli_prepare($conexion,$sql);
   mysqli_stmt_bind_param($stmt,"sss",$nombreCompra,$formaPago,$fechaPago);

   if (mysqli_stmt_execute($stmt)) {
      echo '<script>';
      echo 'alert("Factura registrado correctamente.");';
      echo 'window.location.href = "../Proveedor/pagos.php";';
      echo '</script>';
    
   } else {
    echo "error  al insertar datos ". mysqli_error($conexion);
   }


}

?>