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
    
    <div class="container">
        <h1 class="text-center">Buscar Proveedor por ID</h1>
        <form action="../CRUDADMIN/busquedaEmpleado.php" method="POST" class="mb-4">
        <a style="margin-right:20px" >Buscar por:</a>

        <select class="CODIGO" name="CODIGO" id="" style="margin-right:10px">
        <option value="Todos">Código</option>
        </select>
        <input type="text" name="buscar" id="" style="margin-right:10px;border-color:black;">
        <input type="submit"  class="btn btn-primary "  value="Buscar">
        <a href="../Admin/listarEmpleado.php"class="btn btn-primary  text-center   "> Mostrar Todo </a>
        </form>

   



    <table class="table table-bordered table-hover  "  style="background-color:lightgray ; text-align:justify; ">
    <div class="container">
      <h1 class="text-center" >Empleado</h1>
    </div>
    <thead class="text-center"  style="background-color:green; color:white;">
    <tr>
      <th scope="col">ID </th>
      <th scope="col">DNI</th>
      <th scope="col">NOMBRE  </th>
      <th scope="col">USUARIO </th>
      <th scope="col">CONTRASEÑA  </th>
      <th scope="col">ACCIONES </th>

    </tr>
  </thead>

  <tbody   class="text-center" >


  <?php
  //  conexion para mostrar los productos
 require("../config/conexion.php");
 $buscar = $_POST['buscar'];

 $sql = $conexion->query("SELECT empleado.ID_EMPLEADO ,  empleado.DNI,empleado.NOMBRE ,empleado.USUARIO, empleado.CONTRASEÑA  
 FROM empleado  WHERE ID_EMPLEADO LIKE '$buscar' '%'   ");

if ($sql) {
    while ($resultado = $sql->fetch_assoc()) {

        $idEmple = $resultado['ID_EMPLEADO'];
        $dni = $resultado['DNI'];
        $Nombre = $resultado['NOMBRE'];
        $usuario = $resultado['USUARIO'];
        $contraseña = $resultado['CONTRASEÑA'];
       
    
        
    
        // Imprime las filas de la tabla con las columnas específicas
        echo "<tr  data-aos=\"zoom-in-up\"  >";
        echo "<th scope='row'>$idEmple</th>";
        echo "<td>$dni</td>";
        echo "<td>$Nombre</td>";
        echo "<td>$usuario</td>";
        echo "<td>$contraseña</td>";
        echo "<td>
        <a href='Formulario/editar.php?id=$idEmple' class=\"btn btn-warning  custom-link \"><i class='fas fa-edit'></i></a>
        <br>
        <br>
        <a href='../CRUDADMIN/eliminarEmpleado.php?ID_EMPLEADO=$idEmple'class=\"btn btn-danger custom-link\"><i class='fas fa-trash'></i></a>
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
            <a href="../CRUDADMIN/agregarEmple.php"class="btn btn-success  text-center  " style=" background-color:green">Agregar Empleado <i class="fas fa-plus"></i></a>
            </div>
    </table>
    
    </div>



  <style>
  table th{
    background-color:#D53507;
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
