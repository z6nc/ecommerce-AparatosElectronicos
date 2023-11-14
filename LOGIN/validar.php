<?php

$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['ID_ADMIN'] = $idAdmin;
$_SESSION['usuario']=$usuario;

include('../config/conexion.php');
$consulta = "SELECT ID_ADMIN, USUARIO, NOMBRE, CONTRASEÑA FROM admin WHERE USUARIO = '$usuario' AND CONTRASEÑA = '$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$fila=mysqli_num_rows($resultado);

if ($fila) {
    header("location:../Admin/indiceAdmin.html");
} else{
    ?>
    <?php
    include("../LOGIN/loginAdmin.php");
    ?>
    
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

