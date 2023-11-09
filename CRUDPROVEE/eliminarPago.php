<?php
// esto sirve para elimar las productos de la base de datos en el formulario listaproductos 
include ("../config/conexion.php");

$idPago=$_GET['ID_PAGO_P'];
$sql="DELETE FROM pago_proveedor where  ID_PAGO_P ='$idPago'";


$query = mysqli_query($conexion,$sql);
if ($query === TRUE) {
    header("Location:../Proveedor/pago.php");
}
?>