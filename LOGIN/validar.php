<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

include('../config/conexion.php');

$consulta="SELECT*FROM admin where USUARIO='$usuario' and CONTRASEÑA='$contraseña'"; 
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

