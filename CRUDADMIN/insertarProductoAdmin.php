<?php
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombref = $_POST['nombreFactura'];
    $nombre = $_POST['nombreP'];
    $descripcion = $_POST['descripcionP'];
    $precio = $_POST['precioP'];
    $stock = $_POST['stockP'];
    $marca = $_POST['marcaP'];
    $pagiPrin = $_POST['paginaPrin'];

    if (isset($_FILES['imagenP']) && $_FILES['imagenP']['error'] === UPLOAD_ERR_OK) {
        $imagenP = file_get_contents($_FILES['imagenP']['tmp_name']);
    } else {
        echo "Error al cargar la imagen principal: " . $_FILES['imagenP']['error'];
        exit;
    }

    // Las imágenes adicionales pueden ser nulas, así que verificamos su existencia
    $imagenP2 = null;
    $imagenP3 = null;
    $imagenP4 = null;

    if (isset($_FILES['imagenP2']) && $_FILES['imagenP2']['error'] === UPLOAD_ERR_OK) {
        $imagenP2 = file_get_contents($_FILES['imagenP2']['tmp_name']);
    }

    if (isset($_FILES['imagenP3']) && $_FILES['imagenP3']['error'] === UPLOAD_ERR_OK) {
        $imagenP3 = file_get_contents($_FILES['imagenP3']['tmp_name']);
    }

    if (isset($_FILES['imagenP4']) && $_FILES['imagenP4']['error'] === UPLOAD_ERR_OK) {
        $imagenP4 = file_get_contents($_FILES['imagenP4']['tmp_name']);
    }

    // Inserta los datos en la base de datos
    $sql = "INSERT INTO producto (ID_FACTURA_P, N_PRODUCTO, DESCRIPCION, PRECIO, STOCK, MARCA, PAGPRIN, IMG, IMAGEN2, IMAGEN3, IMAGEN4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssissssss", $nombref, $nombre, $descripcion, $precio, $stock, $marca, $pagiPrin, $imagenP, $imagenP2, $imagenP3, $imagenP4);

        if (mysqli_stmt_execute($stmt)) {
            header("location:../Admin/listarProductoAdmin.php");
        } else {
            echo "Error al insertar datos: " . mysqli_error($conexion);
        }

        // Cierra la declaración
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la declaración.";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
}
?>
