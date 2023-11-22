<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   
</head>
    <title>Lista producto</title>
</head>
<body >

    <!-- Configuración del navbar user y lista -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" id="titulo" href="../Admin/indiceAdmin.html">ElectroTECHZONE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../Admin/indiceAdmin.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/listarProductoAdmin.php" style="padding-left: 22px;">Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/listarEmpleado.php" style="padding-left: 22px;">Empleado</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="padding-left: 22px;" href="../Proveedor/listarProveedor.html" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Proveedor
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../Proveedor/listarProveedor.html" style="color: black; text-align:center;">Principal</a></li>
                            <li><a class="dropdown-item" href="../Proveedor/proveedor.php" style="color: black;text-align:center;">Proveedor</a></li>
                            <li><a class="dropdown-item" href="../Proveedor/listaCompraProve.php" style="color: black;text-align:center;">Compra</a></li>
                            <li><a class="dropdown-item" href="../Proveedor/pagos.php" style="color: black;text-align:center;">Pagos</a></li>
                            <li><a class="dropdown-item" href="../Proveedor/factura.php" style="color: black;text-align:center;">Factura</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/indexPrincipal.html">cerrar sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
 

  
    <!-- Tabla de  lista de  producto  titulo -->
    <br>
    <section >
   
      <h1 class="text-center" > Lista de productos</h1>

      <div class="contenedor" >
            <a href="../CRUDADMIN/agregarProductoAdmin.php"class="btn btn-success  text-center " >Agregar Compra  </a>
    </div>

    <!-- Tabla de lista de productos  -->
    <table class="table  table-hover "  >
  <thead class="table-dark" >
    <tr>
      <th  scope="col">ID</th>
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
        echo "<td><img  style='width: 100px; border-radius: 30px;'  src='data:image/jpg;base64," . base64_encode($imagen) . "'></td>";
        echo "<td><img  style='width: 100px; border-radius: 30px;'  src='data:image/jpg;base64," . base64_encode($imagen2) . "'></td>";
        echo "<td><img  style='width: 100px; border-radius: 30px;'  src='data:image/jpg;base64," . base64_encode($imagen3) . "'></td>";
        echo "<td><img  style='width: 100px; border-radius: 30px;'  src='data:image/jpg;base64," . base64_encode($imagen4) . "'></td>";
        echo "<td>$paginaPrin</td>";
        echo "<td>
        <a href='../CRUDADMIN/editarProductoAdmin.php?id=$idProducto' class=\"btn btn-warning\"><i class='fas fa-edit'></i></a>
        <br>
        <br>
        <a href='../CRUDADMIN/eliminarProductoAdmin.php?ID_PRODUCTO=$idProducto'class=\"btn btn-danger\">X</a>
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
  

  </table>

  </section>


    



  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      margin: 0;
      box-sizing: border-box;
      background-color: whitesmoke;
      padding: 0;
    }

    nav {
      background-color: #dc582a;

    }

    .container-fluid a {
      color: white;
      font-size: 17px;
      padding: 10px 9px;
      font-weight: 300;

    }

    .container-fluid #titulo {
      font-weight: bold;
      font-size: 23px;
      padding-right: 55px;
    }

    .collapse .navbar-nav {
      padding-left: 90px;
      letter-spacing: 1px;
    }

    .collapse .dropdown-menu {
      color: black;
    }

    section{
      display: flex;
      flex-direction: column;
      text-align: center;
      
    }
    section h1{
      font-weight: 900;
      color: black;
      font-size: 35px;
      margin-top: 30px;
     }
      
     section table{
      margin: 0;
      margin-top: 25px;
      font-size: 12px;
    
    
     }
     section .contenedor{
      font-weight: 900;
      margin-left: 75%;
      margin-top: 40px;
     }
     
  </style>



    

    
    
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

    <!-- Incluir Bootstrap JS y jQuery (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>
</html>
