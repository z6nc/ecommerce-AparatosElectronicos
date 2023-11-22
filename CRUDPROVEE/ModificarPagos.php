<?php
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idPago = $_POST["idPago"];
    $nombreC = $_POST["nombreC"];
    $formaP = $_POST["formaP"];  // Modificado aquí para usar el nombre correcto del campo del formulario
    $fechaP = $_POST["fechaP"];
   
    $nombreC = mysqli_real_escape_string($conexion, $nombreC);
    $formaP = mysqli_real_escape_string($conexion, $formaP);
    $fechaP = mysqli_real_escape_string($conexion, $fechaP);
   
    $sql = "UPDATE pago_proveedor SET ID_COMPRAS_P=?, FORMA_PAGO_P=?, FECHA_PAGO_P=? WHERE ID_PAGO_P=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssi", $nombreC, $formaP, $fechaP, $idPago );
     
    if ($stmt->execute()) {
        echo '<script>';
        echo 'alert("Pago actualizada correctamente.");';
        echo 'window.location.href = "../Proveedor/pagos.php";';
        echo '</script>';
    } else {
        echo "Error al actualizar la compra: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
} else {
    $idPago = $_GET["id"];
    $sql = "SELECT pa.ID_COMPRAS_P , pa.FORMA_PAGO_P , pa.FECHA_PAGO_P
        FROM pago_proveedor pa
        INNER JOIN comprasproveedor c ON c.ID_COMPRAS_P = pa.ID_COMPRAS_P
        WHERE pa.ID_PAGO_P = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idPago);
  
    if ($stmt->execute()) {
        $stmt->bind_result($nombreC, $formaP, $fechaP );
        $stmt->fetch();
        $stmt->close();
    }
}
?>
