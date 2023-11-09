<?php
// esto sirve para elimar las productos de la base de datos en el formulario listaproductos 
include ("../config/conexion.php");

$idProveedor=$_GET['ID_PROVEEDOR'];
$sql="DELETE FROM proveedor where  ID_PROVEEDOR ='$idProveedor'";


$query = mysqli_query($conexion,$sql);
if ($query === TRUE) {
    header("Location:../Proveedor/proveedor.php");
}
?>