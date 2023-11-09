<?php
// esto sirve para elimar las productos de la base de datos en el formulario listaproductos 
include ("../config/conexion.php");

$idEmple=$_GET['ID_EMPLEADO'];
$sql="DELETE FROM empleado where  ID_EMPLEADO ='$idEmple'";


$query = mysqli_query($conexion,$sql);
if ($query === TRUE) {
    header("Location:../Admin/listarEmpleado.php")  ;
}
?>