<?php
// esto sirve para elimar las productos de la base de datos en el formulario listaproductos 
include ("../config/conexion.php");

$idFactura=$_GET['ID_FACTURA_P'];
$sql="DELETE FROM factura_proveedor where  ID_FACTURA_P ='$idFactura'";


$query = mysqli_query($conexion,$sql);
if ($query === TRUE) {
    header("Location:../Proveedor/factura.php");
}
?>