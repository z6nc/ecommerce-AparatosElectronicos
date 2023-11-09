<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   
</head>
    <title>Lista producto</title>
</head>
<body >

    <!-- Configuración del navbar user y lista -->
    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
      <a class="navbar-brand" href="../Admin/indiceAdmin.html"> <img src="../imagenes/logo2.png" class=" " alt="..."  height="70px" style="border-radius: 12px;"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="btn btn-outline-light " href="../Admin/indiceAdmin.html">Inicio <i class="fas fa-home"></i></a>
                  </li>
                  <li class="nav-item">
                      <a class="btn btn-outline-light" style="margin-left: 10px;" href="../Admin/listarProductoAdmin.php">Producto <i class="fas fa-shopping-bag"></i> </a>
                  </li>
                  <li class="nav-item">
                      <a class="btn btn-outline-light" style="margin-left: 10px;" href="../Proveedor/listarProveedor.html">Proveedor  <i class="fas fa-truck"></i> </a>
                  </li>
                  <li class="nav-item">
                      <a class="btn btn-outline-light" style="margin-left: 10px;" href="../Admin/listarEmpleado.php">empleado <i class="fas fa-user-shield"></i></a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
   
 

  
    <!-- Tabla de  lista de  producto  titulo -->
    <br>
    <div class="containerT">
      <h1 class="text-center" style="  padding-top: 12px;"> Lista de productos</h1>
    </div>

    <!-- Tabla de lista de productos  -->
    
    


    <table class="table  table-hover "  >
  <thead >
    <tr>
      <th scope="col">ID</th>
      <th scope="col">FACTURA PROVEEDOR</th>
      <th scope="col">NOMBRE DEL PRODUCTO</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">PRECIO</th>
      <th scope="col">STOCK</th>
      <th scope="col">MARCA</th>
      <th scope="col">IMAGEN</th>
      <th scope="col">IMAGEN 2</th>
      <th scope ="col">IMAGEN 3 </th>
      <th scope="col">IMAGEN 4</th>
      <th scope="col">PAGINA PRINCIPAL</th>
      <th scope="col">ACCIONES</th>

    </tr>
  </thead>

  <tbody style="font-size:12px;">


  <?php
  //  conexion para mostrar los productos
 require("../config/conexion.php");

 $sql = $conexion->query("SELECT producto.ID_PRODUCTO,  producto.N_PRODUCTO, factura_proveedor.ID_FACTURA_P, producto.DESCRIPCION, producto.IMG, producto.PRECIO, producto.STOCK, producto.PAGPRIN, producto.MARCA, producto.IMAGEN2, producto.IMAGEN3, producto.IMAGEN4
 FROM PRODUCTO
 INNER JOIN factura_proveedor ON PRODUCTO.ID_FACTURA_P = factura_proveedor.ID_FACTURA_P ");

if ($sql) {
    while ($resultado = $sql->fetch_assoc()) {

        $idProducto = $resultado['ID_PRODUCTO'];
        $nombreProducto = $resultado['N_PRODUCTO'];
        $facturaProve = $resultado['ID_FACTURA_P'];
        $descripcion = $resultado['DESCRIPCION'];
        $imagen = $resultado['IMG'];
        $precio = $resultado['PRECIO'];
        $stock = $resultado['STOCK'];
        $paginaPrin =$resultado['PAGPRIN'];
        $marca =$resultado['MARCA'];
        $imagen2 =$resultado['IMAGEN2'];
        $imagen3=$resultado['IMAGEN3'];
        $imagen4=$resultado['IMAGEN4'];
        
    
        // Imprime las filas de la tabla con las columnas específicas
        echo "<tr  data-aos=\"zoom-in-up\"  >";
        echo "<th scope='row'>$idProducto</th>";
        echo "<td>$facturaProve</td>";
        echo "<td>$nombreProducto</td>";
        echo "<td>$descripcion</td>";
        echo "<td> S/  $precio</td>";
        echo "<td>$stock</td>";
        echo "<td>$marca</td>";
        echo "<td><img  style='width: 120px; border-radius: 30px;'  src='data:image/jpg;base64," . base64_encode($imagen) . "'></td>";
        echo "<td><img  style='width: 120px; border-radius: 30px;'  src='data:image/jpg;base64," . base64_encode($imagen2) . "'></td>";
        echo "<td><img  style='width: 120px; border-radius: 30px;'  src='data:image/jpg;base64," . base64_encode($imagen3) . "'></td>";
        echo "<td><img  style='width: 120px; border-radius: 30px;'  src='data:image/jpg;base64," . base64_encode($imagen4) . "'></td>";
        echo "<td>$paginaPrin</td>";
        echo "<td>
        <a href='Formulario/editar.php?id=$idProducto' class=\"btn btn-warning\"><i class='fas fa-edit'></i></a>
        <br>
        <br>
        <a href='../CRUDADMIN/eliminarProductoAdmin.php?ID_PRODUCTO=$idProducto'class=\"btn btn-danger\"><i class='fas fa-trash'></a>
      </td>";
       echo "</tr>";
    }
} else {
    // Maneja el error si la consulta no se ejecuta correctamente
    echo "Error en la consulta: " . $conexion->error;
}

// Cierra la conexión a la base de datos cuando hayas terminado
$conexion->close();
?>

  </tbody>
  <div class="contenedor " >
            <a href="../CRUDADMIN/agregarProductoAdmin.php"class="btn btn-success  text-center  " style=" background-color:green">Agregar Compra  <i class="fas fa-plus"></i></a>
    </div>

  </table>
    


    



  <style>
    table{
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
      background-color:#EAE6CA;
      font-size: 12px;
      text-align:center;
      margin:auto;
    }


    .contenedor{
    margin-left:85%;
    margin-bottom:1em;
   }
    body{
      color:black;
      background-color:#EAE6CA;
    }
    .containerT{
      margin-top:1em;
      margin-bottom:1em;
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    table th{
      background-color:#0d47a1;
      color:white;
    }
    table td{
      background-color:#EAE6CA;
    }

   nav {
   background-color: darkgoldenrod;
   }
   nav div {
   margin-left: 2em;
   font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
   }     
   nav .btn {
   border: none;
    }

    #columna{
    margin-top: 5em;
    margin-left: 10em;;
    }
       
  </style>



    

    
    
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

    <!-- Incluir Bootstrap JS y jQuery (opcional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
