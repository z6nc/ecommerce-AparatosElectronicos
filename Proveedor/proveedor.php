<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <div class="containerPrin">
    <h1 class="text-center"> Lista de Proveedores</h1>
    <div class="botonAgregar ">
      <a href="../CRUDPROVEE/agregarProveedor.php" class="btn btn-success  text-center" >Agregar Proveedor </a>
    </div>


    <table class="table  table-hover ">
      <thead class="table-dark text-center">
        <tr>
          <th  scope="col">ID </th>
          <th scope="col">RUC </th>
          <th scope="col">RAZON SOCIAL </th>
          <th scope="col">TELEFONO </th>
          <th scope="col">USUARIO </th>
          <th scope="col">CONTRASEÑA </th>
          <th scope="col">ACCIONES </th>

        </tr>
      </thead>

      <tbody class="text-center">


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
            $usuario = $resultado['USUARIO'];
            $contraseña = $resultado['CONTRASEÑA'];



            // Imprime las filas de la tabla con las columnas específicas
            echo "<tr>";
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
    .containerPrin{
      display: grid;
      grid-template-rows: 1fr 1fr;
      gap: 18px;
     
    }
    .containerPrin h1{
      font-weight: bold;
      letter-spacing: 1px;
    }
    .containerPrin table{
      border: px solid darkgray;
    }
    .containerPrin .botonAgregar{
      border: none;
      margin-left: 75%;
      margin-top: 20px;
    }
    .botonAgregar a{
      font-weight: bold;
   
    }
    table th{
      background-color: #212529;
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