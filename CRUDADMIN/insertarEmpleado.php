<?php
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = mysqli_real_escape_string($conexion, $_POST['dni']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombreEm']);
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuarioEm']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseñaEm']);

    $sql = "INSERT INTO empleado (DNI ,NOMBRE, USUARIO, CONTRASEÑA) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);

    // Aquí es donde se deben especificar los tipos de datos y las variables en el mismo orden que en la consulta
    mysqli_stmt_bind_param($stmt, 'ssss', $dni, $nombre, $usuario, $contraseña);
    try {
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>';
            echo 'alert("Empleado registrado correctamente.");';
            echo 'window.location.href = "../Admin/listarEmpleado.php";';
            echo '</script>';
           
        } else {
            echo "Error al insertar: " . mysqli_error($conexion);
        }
    } catch (Exception $e) {
        if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
            echo "El  atributo  se repite. Por favor, agregue otro.";
        } else {
            echo "Error al insertar: " . $e->getMessage();
        }
    }
}

?>
