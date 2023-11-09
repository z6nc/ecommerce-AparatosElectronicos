<?php
// esto sirve para elimar las productos de la base de datos en el formulario listaproductos 
include ("../config/conexion.php");

$idcompras=$_GET['ID_COMPRAS_P'];
$sql="DELETE FROM comprasproveedor where  ID_COMPRAS_P ='$idcompras'";


$query = mysqli_query($conexion,$sql);
if ($query === TRUE) {
    header("Location:../Proveedor/listaCompraProve.php");
}
?>