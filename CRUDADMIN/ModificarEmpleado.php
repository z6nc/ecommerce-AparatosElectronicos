<?php
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idEmple = $_POST["idEmple"];
    $dni = $_POST["dni"];
    $nombreEm = $_POST["nombreEm"];
    $usuarioEm = $_POST["usuarioEm"];
    $contraseñaEm = $_POST["contraseñaEm"];

    // Asegurar y validar los datos (ejemplo utilizando MySQLi)
    $dni = mysqli_real_escape_string($conexion, $dni);
    $nombreEm = mysqli_real_escape_string($conexion, $nombreEm);
    $usuarioEm = mysqli_real_escape_string($conexion, $usuarioEm);
    $contraseñaEm = mysqli_real_escape_string($conexion, $contraseñaEm);

    $sql = "UPDATE empleado SET DNI=?, NOMBRE=?, USUARIO=?, CONTRASEÑA=? WHERE ID_EMPLEADO=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssi", $dni, $nombreEm, $usuarioEm, $contraseñaEm, $idEmple);

    if ($stmt->execute()) {
        echo '<script>';
        echo 'alert("Empleado actualizado correctamente.");';
        echo 'window.location.href = "../Admin/listarEmpleado.php";';
        echo '</script>';
    } else {
        echo "Error al actualizar el empleado: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();

} else {
    $idEmple = $_GET["id"];
    $sql = "SELECT E.DNI, E.NOMBRE, E.USUARIO, E.CONTRASEÑA 
            FROM empleado E
            WHERE E.ID_EMPLEADO = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idEmple);

    if ($stmt->execute()) {
        $stmt->bind_result($dni, $nombreEm, $usuarioEm, $contraseñaEm);
        $stmt->fetch();
        $stmt->close();
    }
}
?>
