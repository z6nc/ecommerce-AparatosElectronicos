<?php
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProveedor = $_POST["idProveedor"];
    $rucPro = $_POST["rucPro"];
    $razonPro = $_POST["razonPro"];
    $telefonoPro = $_POST["telefonoPro"];
    $usuarioPro = $_POST["usuarioPro"];
    $contraseñaPro = $_POST["contraseñaPro"];

    // Asegurar y validar los datos (ejemplo utilizando MySQLi)
    $rucPro = mysqli_real_escape_string($conexion, $rucPro);
    $razonPro = mysqli_real_escape_string($conexion, $razonPro);
    $telefonoPro = mysqli_real_escape_string($conexion, $telefonoPro);
    $usuarioPro = mysqli_real_escape_string($conexion, $usuarioPro);
    $contraseñaPro = mysqli_real_escape_string($conexion, $contraseñaPro);


    $sql = "UPDATE proveedor SET RUC=?, RAZON_SOCIAL=?, TELEFONO=?,USUARIO=? ,CONTRASEÑA=? WHERE ID_PROVEEDOR=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssi", $rucPro, $razonPro, $telefonoPro, $usuarioPro,$contraseñaPro ,$idProveedor);

    if ($stmt->execute()) {
        echo '<script>';
        echo 'alert("Empleado actualizado correctamente.");';
        echo 'window.location.href = "../Proveedor/proveedor.php";';
        echo '</script>';
    } else {
        echo "Error al actualizar el empleado: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();

} else {
    $idProveedor = $_GET["id"];
    $sql = "SELECT pro.RUC, pro.RAZON_SOCIAL, pro.TELEFONO,pro.USUARIO ,pro.CONTRASEÑA 
            FROM proveedor pro
            WHERE pro.ID_PROVEEDOR = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idProveedor);

    if ($stmt->execute()) {
        $stmt->bind_result($rucPro, $razonPro, $telefonoPro, $usuarioPro,$contraseñaPro);
        $stmt->fetch();
        $stmt->close();
    }
}
?>
