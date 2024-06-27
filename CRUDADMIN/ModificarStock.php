
<?php 
  include("../config/conexion.php");

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $idProducto = $_POST["idProducto"];
    $stockP = $_POST["stockP"];
   
    $stockP = intval($stockP);
   
    

    // Realizar la actualización en la base de datos
    $sql = "UPDATE producto SET  STOCK=? WHERE ID_PRODUCTO=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ii",  $stockP,$idProducto);
                      

    // Agrega mensajes de depuración aquí

    if ($stmt->execute()) {
      // JavaScript para mostrar la ventana emergente y redirigir
      echo '<script>';
      echo 'alert("Producto actualizado correctamente.");';
      echo 'window.location.href = "../Admin/listarProducto.php";';
      echo '</script>';
    } else {
      echo "Error al actualizar el producto: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
  } else {
    $idProducto = $_GET["id"];
    $sql = "SELECT  p.STOCK
            FROM producto p
            WHERE p.ID_PRODUCTO = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idProducto);

    if ($stmt->execute()) {
      $stmt->bind_result( $stockP );
      $stmt->fetch();
      $stmt->close();
    }
   
  }
  ?>