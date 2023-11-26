<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>
<title>Lista Proveedores</title>
</head>

<body>

  <!-- Configuración del navbar user y lista -->
  <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" id="titulo" href="../Admin/indiceAdmin.html">ElectroTECHZONE-Administrador</a>
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
   







  <div class="containerTotal">
    

    <div class="container">
    <h1 class="text-center">Empleado</h1>
      <p>Buscar Empleado por ID</p>
      <form action="../CRUDADMIN/busquedaEmpleado.php" method="POST" >
        <a >Buscar por:</a>
        <select class="CODIGO" name="CODIGO" id="" >
          <option value="Todos">Código</option>
        </select>
        <input type="text" name="buscar" id="" >
        <input type="submit" class="btn btn-primary"  style="font-weight: 900;"  value="Buscar">
        <a href="../Admin/listarEmpleado.php" class="btn btn-primary " style="font-weight: 900;"> Mostrar Todo </a>
      </form>
      <a href="../CRUDADMIN/agregarEmple.php" class="boton" >Agregar Empleado <i class="fas fa-plus"></i></a>
    </div>



    <table class="table table-hover text-center">

      <thead  class="table-dark" >
        <tr>
          <th scope="col">ID </th>
          <th scope="col">DNI</th>
          <th scope="col">NOMBRE </th>
          <th scope="col">USUARIO </th>
          <th scope="col">CONTRASEÑA </th>
          <th scope="col">ACCIONES </th>

        </tr>
      </thead>

      <tbody class="text-center">


        <?php
        //  conexion para mostrar los productos
        require("../config/conexion.php");

        $sql = $conexion->query("SELECT empleado.ID_EMPLEADO,  empleado.DNI, empleado.NOMBRE, empleado.USUARIO ,empleado.CONTRASEÑA  
 FROM empleado ");

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
        <a href='../CRUDADMIN/EditarEmpleado.php?id=$idEmple' class=\"btn btn-warning  custom-link \"><i class='fas fa-edit'></i></a>
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
    </table>


  </div>


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

    .containerTotal{
     display: grid;
     grid-template-columns: 48% 52%;
     justify-content: center;
     align-items: center;
    }
    .containerTotal .container{
     max-width: 100%;
     height: 100%;
     display: flex;
     flex-direction: column;
     justify-content: center;
     margin-bottom: 60px;
     background-color: whitesmoke;
      
    }
    .container h1{
      font-weight: 900;
      margin-bottom: 40px;
     letter-spacing: 2px;
     font-size: 37px;
    }
    .container p{
     margin-bottom: 20px;
     padding-left: 10px;
      font-size: 16px;
    }
    .container form{
      margin-bottom: 80px; 
      padding-left: 10px;
      font-size: 16px;

    }
    .container .boton{
      margin: 2px 10px;
      background-color: #008F39;
      text-align: center;
      margin-left: 200px;
      margin-right: 200px;
      padding: 9px 0px;
      border-radius: 9px;
      text-decoration: none;
      color: white;
      font-weight: 900;
    }
    .container .boton:hover{
      background-color: #5cb85c;
    }

  </style>








  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!-- Incluir Bootstrap JS y jQuery (opcional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>