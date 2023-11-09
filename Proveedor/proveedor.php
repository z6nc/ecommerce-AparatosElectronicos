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
    <title>Lista Proveedores</title>
</head>
<body >

    <!-- Configuración del navbar user y lista -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
        <a class="navbar-brand" href="../Admin/indiceAdmin.html"> <img src="../imagenes/logo2.png" class=" " alt="..."  height="70px" style="border-radius: 12px;"></a>
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
                        <a class="btn btn-outline-light" style="margin-left: 10px;" href="../Admin/listarEmpleado.php">Empleado <i class="fas fa-user-shield"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
 

  
    <!-- Tabla de  lista de  producto  titulo -->
    <br>
    

    <!-- Tabla de lista de productos  -->
    
    

    <a href="../Proveedor/listaCompraProve.php" style="text-decoration: none;color:black;margin-left:1em;">
    Siguiente Tabla <i class="fas fa-arrow-circle-right" style="margin-left: 5px; padding-bottom:3em;"></i>
    </a>

    <table class="table table-bordered table-hover  "  style="background-color:lightgray ; text-align:justify; ">
    <div class="container">
      <h1 class="text-center" > Lista de Proveedores</h1>
    </div>
    <thead class="text-center"  style="background-color:green; color:white;">
    <tr>
      <th scope="col">ID </th>
      <th scope="col">RUC  </th>
      <th scope="col">RAZON SOCIAL </th>
      <th scope="col">TELEFONO  </th>
      <th scope="col">USUARIO </th>
      <th scope="col">CONTRASEÑA </th>
      <th scope="col">ACCIONES </th>

    </tr>
  </thead>

  <tbody   class="text-center" >


  <?php
  //  conexion para mostrar los productos
 require("../config/conexion.php");

 $sql = $conexion->query("SELECT proveedor.ID_PROVEEDOR,  proveedor.RUC, proveedor.RAZON_SOCIAL, proveedor.TELEFONO  , proveedor.USUARIO,  proveedor.CONTRASEÑA
 FROM proveedor ");

if ($sql) {
    while ($resultado = $sql->fetch_assoc()) {

        $idProveedor = $resultado['ID_PROVEEDOR'];
        $ruc = $resultado['RUC'];
        $razonSocial = $resultado['RAZON_SOCIAL'];
        $telefono = $resultado['TELEFONO'];
        $usuario =$resultado['USUARIO'];
        $contraseña=$resultado['CONTRASEÑA'];
    
        
    
        // Imprime las filas de la tabla con las columnas específicas
        echo "<tr  data-aos=\"zoom-in-up\"  >";
        echo "<th scope='row'>$idProveedor</th>";
        echo "<td>$ruc</td>";
        echo "<td>$razonSocial</td>";
        echo "<td>$telefono</td>";
        echo "<td>$usuario</td>";
        echo "<td>$contraseña</td>";
        echo "<td>
        <a href='Formulario/editar.php?id=$idProveedor' class=\"btn btn-warning  custom-link \"><i class='fas fa-edit'></i></a>
        <br>
        <br>
        <a href='../CRUDPROVEE/eliminarProvee.php?ID_PROVEEDOR=$idProveedor'class=\"btn btn-danger custom-link\"><i class='fas fa-trash'></i></a>
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
            <a href="../CRUDPROVEE/agregarProveedor.php"class="btn btn-success  text-center  " style=" background-color:green">Agregar Proveedor <i class="fas fa-plus"></i></a>
            </div>
    </table>
    
    



  <style>
  table th{
    background-color:green;
    color:white;
  }
   td .custom-link{
            width:98px;
            height:38px;
        }

   body{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
   background-color:#EAE6CA;
}
   .contenedor{
            margin-left:85%;
            margin-bottom:1em;
        }

    .container h1{
     font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
     
     color:black; 
     height: 80px; 
     padding-top: 12px;
    }

  th a{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    letter-spacing: 2px;
     
 }

        nav {
         background-color:darkgoldenrod;
       }
      

       nav div {
            margin-left: 2em;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;


        }
        /* para quitar los bordes de boton */
        nav .btn {
            border: none;
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
