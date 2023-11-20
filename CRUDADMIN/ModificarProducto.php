
<?php
  $imagenExistente = "";
  $imagenExistente2 = "";
  $imagenExistente3 = "";
  $imagenExistente4 = "";
  
  include("../config/conexion.php");

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["nuevaImagenP"]["tmp_name"]) {
      $imagenP = $_FILES["nuevaImagenP"]["tmp_name"];
      $imagenData = file_get_contents($imagenP);
  } else {
      // Si no se cargó una nueva imagen, utiliza la imagen existente.
      $imagenData = $imagenExistente;
  }

  // Repite la lógica para las demás imágenes (imagenP2, imagenP3, imagenP4)
  if ($_FILES["nuevaImagenP2"]["tmp_name"]) {
      $imagenP2 = $_FILES["nuevaImagenP2"]["tmp_name"];
      $imagenData2 = file_get_contents($imagenP2);
  } else {
      $imagenData2 = $imagenExistente2; // Asegúrate de tener $imagenExistente2 definido en tu código.
  }

  if ($_FILES["nuevaImagenP3"]["tmp_name"]) {
      $imagenP3 = $_FILES["nuevaImagenP3"]["tmp_name"];
      $imagenData3 = file_get_contents($imagenP3);
  } else {
      $imagenData3 = $imagenExistente3; // Asegúrate de tener $imagenExistente3 definido en tu código.
  }

  if ($_FILES["nuevaImagenP4"]["tmp_name"]) {
      $imagenP4 = $_FILES["nuevaImagenP4"]["tmp_name"];
      $imagenData4 = file_get_contents($imagenP4);
  } else {
      $imagenData4 = $imagenExistente4; // Asegúrate de tener $imagenExistente4 definido en tu código.
  }


    $idProducto = $_POST["idProducto"];
    $nombreFactura = $_POST["nombreFactura"];
    $nombreP = $_POST["nombreP"];
    $descripcionP = $_POST["descripcionP"];
    $precioP = $_POST["precioP"];
    $stockP = $_POST["stockP"];
    $marcaP = $_POST["marcaP"];
    $paginaPrin = $_POST["paginaPrin"];



    // Asegurar y validar los datos (ejemplo utilizando MySQLi)
    $nombreFactura = mysqli_real_escape_string($conexion, $nombreFactura);
    $nombreP = mysqli_real_escape_string($conexion, $nombreP);
    $descripcionP = mysqli_real_escape_string($conexion, $descripcionP);
    // No es necesario para valores numéricos, asignar directamente
    $precioP = mysqli_real_escape_string($conexion, $precioP);
    $stockP = intval($stockP);
    $marcaP = mysqli_real_escape_string($conexion, $marcaP);
    $paginaPrin = mysqli_real_escape_string($conexion, $paginaPrin);
    

    // Realizar la actualización en la base de datos
    $sql = "UPDATE producto SET ID_FACTURA_P=?, N_PRODUCTO=?, DESCRIPCION=?, PRECIO=?, STOCK=?, MARCA=?, PAGPRIN=?,IMG=?, IMAGEN2=?, IMAGEN3=?, IMAGEN4=? WHERE ID_PRODUCTO=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssissbbbbi", $nombreFactura ,$nombreP, $descripcionP, $precioP, $stockP, $marcaP, $paginaPrin, $imagenData, $imagenData2, $imagenData3, $imagenData4 ,$idProducto);
                      

    // Agrega mensajes de depuración aquí

    if ($stmt->execute()) {
      // JavaScript para mostrar la ventana emergente y redirigir
      echo '<script>';
      echo 'alert("Producto actualizado correctamente.");';
      echo 'window.location.href = "../Admin/listarProductoAdmin.php";';
      echo '</script>';
    } else {
      echo "Error al actualizar el producto: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
  } else {
    $idProducto = $_GET["id"];
    $sql = "SELECT p.N_PRODUCTO, p.DESCRIPCION, p.PRECIO, p.STOCK, p.ID_FACTURA_P, p.IMG,p.IMAGEN2,p.IMAGEN3,p.IMAGEN4,p.PAGPRIN, p.MARCA ,f.PRODUCTO_P
            FROM producto p
            INNER JOIN factura_proveedor f  ON p.ID_FACTURA_P = f.ID_FACTURA_P
            WHERE p.ID_PRODUCTO = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idProducto);

    if ($stmt->execute()) {
      $stmt->bind_result($nombreP, $descripcionP, $precioP, $stockP, $nombreFactura, $imagenData,$imagenData2,$imagenData3,$imagenData4,$paginaPrin, $marcaP,  $idProducto);
      $stmt->fetch();
      $stmt->close();
    }
   
   // Aquí, obtén los datos de la primera imagen existente y almacénalos en $imagenExistente
$sqlImagenExistente = "SELECT IMG FROM producto WHERE ID_PRODUCTO = ?";
$stmtImagenExistente = $conexion->prepare($sqlImagenExistente);
$stmtImagenExistente->bind_param("i", $idProducto);

if ($stmtImagenExistente->execute()) {
    $stmtImagenExistente->bind_result($imagenExistente);
    $stmtImagenExistente->fetch();
    $stmtImagenExistente->close();
}

// Repite la lógica para obtener los datos de las demás imágenes existentes (imagenExistente2, imagenExistente3, imagenExistente4)
$sqlImagenExistente2 = "SELECT IMAGEN2 FROM producto WHERE ID_PRODUCTO = ?";
$stmtImagenExistente2 = $conexion->prepare($sqlImagenExistente2);
$stmtImagenExistente2->bind_param("i", $idProducto); // Asegúrate de tener $idProducto2 definido en tu código.

if ($stmtImagenExistente2->execute()) {
    $stmtImagenExistente2->bind_result($imagenExistente2);
    $stmtImagenExistente2->fetch();
    $stmtImagenExistente2->close();
}

$sqlImagenExistente3 = "SELECT IMAGEN3 FROM producto WHERE ID_PRODUCTO = ?";
$stmtImagenExistente3 = $conexion->prepare($sqlImagenExistente3);
$stmtImagenExistente3->bind_param("i", $idProducto); // Asegúrate de tener $idProducto3 definido en tu código.

if ($stmtImagenExistente3->execute()) {
    $stmtImagenExistente3->bind_result($imagenExistente3);
    $stmtImagenExistente3->fetch();
    $stmtImagenExistente3->close();
}

$sqlImagenExistente4 = "SELECT IMAGEN4 FROM producto WHERE ID_PRODUCTO = ?";
$stmtImagenExistente4 = $conexion->prepare($sqlImagenExistente4);
$stmtImagenExistente4->bind_param("i", $idProducto); // Asegúrate de tener $idProducto4 definido en tu código.

if ($stmtImagenExistente4->execute()) {
    $stmtImagenExistente4->bind_result($imagenExistente4);
    $stmtImagenExistente4->fetch();
    $stmtImagenExistente4->close();
}

  }
  ?>