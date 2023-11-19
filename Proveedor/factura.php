<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Factura</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!-- ---------------------------------------------NAVBAR --------------------------------------------------->
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
<!-- ---------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- ----------------------------------------------------------TABLA FACTURA ---------------------------- -->
<!-------- Titulo--------- -->
<div class="contenedorT">
  <h1 class="text-center">Factura</h1>
  <div class="botones">
            <a href="../CRUDPROVEE/agregarFactura.php"class="btn btn-success  text-center ">Agregar Factura </a>
    </div>

  <table class="table  table-hover  text-center">
    <thead class="table-dark">
      <tr >
        <th scope="col">ID FACTURA</th>
        <th scope="col">ID PAGO</th>
        <th scope="col">PRODUCTO</th>
        <th scope="col">MONTO TOTAL</th>
        <th scope="col">CANTIDAD</th>
        <th scope="col">ACCIONES</th>
      </tr>
    </thead>
<!-- ---------------------------------------------------------------------------------- -->

<!---------------------------------- Cuerpo de la tabla ------------------------------------------- -->
    <tbody>
      <?php
       include("../config/conexion.php");
       $sql=$conexion->query("SELECT   factura_proveedor.ID_FACTURA_P  , factura_proveedor.PRODUCTO_P ,factura_proveedor.MONTO_TOTAL ,factura_proveedor.CANTIDAD , pago_proveedor.ID_PAGO_P
       FROM factura_proveedor 
       INNER JOIN pago_proveedor ON factura_proveedor.ID_PAGO_P = pago_proveedor.ID_PAGO_P");


       if($sql){
       while ($resultado=$sql->fetch_assoc()) {
        $idFactura=$resultado['ID_FACTURA_P'];
        $producto=$resultado['PRODUCTO_P'];
        $monto=$resultado['MONTO_TOTAL'];
        $cantidad=$resultado['CANTIDAD'];
        $idPago=$resultado['ID_PAGO_P'];
        
        echo "<tr>";
        echo " <th scope='row'>$idFactura</th>";
        echo"<td>$idPago</td>";
        echo"<td>$producto</td>";
        echo"<td> S/ $monto</td>";
        echo"<td>$cantidad</td>";
        echo "<td>
                    <a href='Formulario/editar.php?id=$idFactura' class=\"btn btn-warning custom-link \"><i class='fas fa-edit'></i> </a>
                    <br>
                    <br>
                    <a href='../CRUDPROVEE/eliminarFactura.php?ID_FACTURA_P=$idFactura'class=\"btn btn-danger custom-link\"><i class='fas fa-trash'></i></a>
                 </td>";
        echo "</tr>";

       }

       } else{
        echo "Error en la consulta: " . $conexion->error;
       }
      
      ?>     

<!-- ------------------------------------------------------------------------------------- -->
      
    </tbody>
  </table>

  </div>
  <!-- -------------------------------------------------------------------------------------------------------------------- -->
<!--------------------------------------------- Estilo de   la pagina web ----------------- -->

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

        .contenedorT{
            display: grid;
          grid-template-rows: 1fr 1fr;
          gap: 18px;
        }
        .contenedorT h1{
            font-weight: bold;
           letter-spacing: 1px;
           text-align: center;
           padding-top: 22px;
           font-size: 35px;
        }
        .contenedorT .botones{
      border: none;
      margin-left: 79%;
      margin-top: 20px;
    }
      .botones a{
        font-weight: bold;
      }
      .general table{
        font-size: 14px;
       
      }
      table td{
        text-align: center;
      }

 </style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>