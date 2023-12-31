<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LISTA DE PAGOS</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <!-- ------------------------------------------ Navbar  de la pagina web ---------------------------------------- -->
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
  <!-- ------------------------------------------------------------------------------------------------------------------------------------------- -->

  <!------------------------------------------------------------------Listado de pagos ---------------------------------------- -->
  <div class="general">
    <h1> Lista de pagos </h1>
    <div class="ConteBuscador">
      <div class="as">
        <label class="Emple"> Producto </label>
        <input type="search" class="producto" id="producto" name="producto">
        <a href="#"><i class="fas fa-search"></i></a>
      </div>
      <div class="as">
        <label class="Emple"> Forma Pago </label>
        <input type="search" class="pago" id="pago" name="pago">
        <a href="#"><i class="fas fa-search"></i></a>
      </div>
      <div class="as">
        <label class="Emple"> Fecha</label>
        <input type="search" class="fecha" id="fecha" name="fecha">
        <a href="#"><i class="fas fa-search"></i></a>
      </div>
    </div>

    <div class="botones ">
      <a href="../CRUDPROVEE/agregarPago.php" class="btn btn-success  text-center ">Agregar Pago </a>
    </div>
    <table class="table   table-hover   text-center">
      <thead class="text-center table-dark">
        <tr>
          <th scope="col">ID PAGO</th>
          <th scope="col">ID COMPRA</th>
          <th scope="col">NOMBRE COMPRA</th>
          <th scope="col">FORMA DE PAGO</th>
          <th scope="col">FECHA DE PAGO</th>
          <th scope="col">ACCIONES</th>
        </tr>
      </thead>
      <tbody>

        <?php
        include("../config/conexion.php");
        $sql = $conexion->query("SELECT pago_proveedor.ID_PAGO_P ,comprasproveedor.ID_COMPRAS_P ,comprasproveedor.PRODUCTO_P, pago_proveedor.FORMA_PAGO_P, pago_proveedor.FECHA_PAGO_P
        FROM pago_proveedor 
        INNER JOIN comprasproveedor on pago_proveedor.ID_COMPRAS_P = comprasproveedor.ID_COMPRAS_P");

        if ($sql) {
          while ($resultado = $sql->fetch_assoc()) {
            $idPago = $resultado['ID_PAGO_P'];
            $idcompras = $resultado['ID_COMPRAS_P'];
            $productoP = $resultado['PRODUCTO_P'];
            $formasPago = $resultado['FORMA_PAGO_P'];
            $fechaPago = $resultado['FECHA_PAGO_P'];

            echo "<tr  class='text-center'>";
            echo "<th scope='row'>$idPago</th>";
            echo "<td>$idcompras</td>";
            echo "<td class=\"article\" >$productoP</td>";
            echo "<td class=\"forms\" >$formasPago</td>";
            echo "<td  class=\"date\">$fechaPago</td>";
            echo "<td>
            <a href='../CRUDPROVEE/editarPagos.php?id=$idPago' class=\"btn btn-warning custom-link \"><i class='fas fa-edit'></i> </a>
                    <br>
                    <br>
            <a href='../CRUDPROVEE/eliminarPago.php?ID_PAGO_P=$idPago'class=\"btn btn-danger custom-link \"> <i class='fas fa-trash'></i></a>
            </td>";

            echo "</tr>";
          }
        } else {
          echo "Error en la consulta: " . $conexion->error;
        }
        $conexion->close();
        ?>

      </tbody>
    </table>
  </div>

  <!-- -------------------------------------------------------------------------------------------------------------------------------- -->


  <!----------------------------------------------------------------- Estilos  para el proyecto  -------------------------------------- -->
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

    .general {
      display: grid;
      grid-template-rows: 1fr 1fr;
      gap: 18px;
    }

    .general h1 {
      font-weight: bold;
      letter-spacing: 1px;
      text-align: center;
      padding-top: 22px;
      font-size: 35px;
    }

    .general .botones {
      border: none;
      margin-left: 79%;
      margin-top: 20px;
    }

    .botones a {
      font-weight: bold;
    }

    .general table {
      font-size: 14px;

    }

    table td {
      text-align: center;
    }

    .filtro {
      display: none;
    }
    .ConteBuscador {
      display: grid;
      grid-template-columns:  34% 33% 33%;
      color: black;
      font-weight: 400;      
      margin: 0;
      
     
    }
    .ConteBuscador input{
      margin-left: 10px;
      border: 1px solid lightgray;
      border-radius: 7px;

    }
    .ConteBuscador .as{
      padding: 15px 40px;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .as a{
      background-color: #dc582a;
      color: white;
      margin-left: 2px;
      padding: 6px 13px;
      border-radius: 9px;
    }
    .as i{
      font-size: 12px;
    }
  </style>
  <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
  <script src="../Javascrip/buscadorPagos.js"> </script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>