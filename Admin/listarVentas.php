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
                  <li class="nav-item">
                      <a class="btn btn-outline-light" style="margin-left: 10px;" href="../Admin/listarVentas.php">ventas <i class="fas fa-user-shield"></i></a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
   
 

  
    <!-- Tabla de  lista de  producto  titulo -->
    <br>
    <div class="containerT">
      <h1 class="text-center" style="  padding-top: 12px;"> VENTAS REALIZADAS</h1>
    </div>

    <!-- Tabla de lista de productos  -->
    
    


    <table class="table  table-hover "  >
  <thead >
    <tr>
      <th scope="col">ID</th>
      <th scope="col">fecha</th>
      <th scope="col">id_transaccion</th>
      <th scope="col">STATUS</th>
      <th scope="col">EMAIL</th>
      <th scope="col">TOTAL</th>
      

    </tr>
  </thead>

  <tbody style="font-size:12px;">


  <?php
  //  conexion para mostrar los productos
 require("../config/conexion.php");

 $sql = $conexion->query("SELECT compra.id,  compra.id_transaccion, compra.fecha, compra.status, compra.email, compra.id_Cliente, compra.total
 FROM compra");

if ($sql) {
    while ($resultado = $sql->fetch_assoc()) {

        $idProducto = $resultado['id'];
        $nombreProducto = $resultado['id_transaccion'];
        $facturaProve = $resultado['fecha'];
        $descripcion = $resultado['status'];
        $imagen = $resultado['email'];
        $IDCLIENTE = $resultado['id_Cliente'];
        $stock = $resultado['total'];
       
        
    
        // Imprime las filas de la tabla con las columnas específicas
        echo "<tr  data-aos=\"zoom-in-up\"  >";
        echo "<th scope='row'>$idProducto</th>";
        echo "<td>$facturaProve</td>";
        echo "<td>$nombreProducto</td>";
        echo "<td>$descripcion</td>";
        echo "<td>$imagen</td>";
        
        echo "<td>$stock</td>";

        
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
      background-color:darkorange;
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
