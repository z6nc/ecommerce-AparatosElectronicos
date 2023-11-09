<?php
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ruc = mysqli_real_escape_string($conexion, $_POST['rucPro']);
    $razonSocial = mysqli_real_escape_string($conexion, $_POST['razonPro']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefonoPro']);
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuarioPro']);
    $contraseña = mysqli_real_escape_string($conexion,$_POST['contraseñaPro']);
    
    $sql = "INSERT INTO proveedor (RUC, RAZON_SOCIAL, TELEFONO, USUARIO, CONTRASEÑA) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $ruc, $razonSocial, $telefono, $usuario, $contraseña);
    
    if (mysqli_stmt_execute($stmt)) {
        header("location:../Proveedor/proveedor.php");
    } else {
        echo "Error al insertar datos: " . mysqli_error($conexion);
    }
    
    mysqli_stmt_close($stmt);
} else {
    echo "Error al cargar la imagen.";
}

?>
