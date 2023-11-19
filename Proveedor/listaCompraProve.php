<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compras</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- Banner   -->
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
    <!-- -------------------------------------------------------------------------------------------------- -->

    <!--------------------- Tabla   de registro de compras proveedor  ------------------------ -->

    <div class="tableGeneral">
        <h1>Compras Proveedor</h1>
        <div class="botones ">
            <a href="../CRUDPROVEE/agregarCompra.php" class="btn btn-success  text-center ">Agregar Compra </a>
        </div>

        <table class="table  table-hover ">
            <thead class="text-center table-dark">
                <tr style="background-color:green;">
                    <th scope="col">ID COMPRA </th>
                    <th scope="col">NOMBRE ADMIN</th>
                    <th scope="col">NOMBRE PROVEEDOR</th>
                    <th scope="col">PRODUCTO</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">PRECIO</th>
                    <th scope="col">ACCION</th>
                </tr>
            </thead>
            <!-- ------------------------------------------------------------------------------------ -->

            <!------------------------------- contenido con php para  listar los productos--------------------- -->

            <tbody class="text-center">
                <?php
                include("../config/conexion.php");

                $sql = $conexion->query("SELECT comprasproveedor.ID_COMPRAS_P, admin.NOMBRE, proveedor.RAZON_SOCIAL, comprasproveedor.PRODUCTO_P, comprasproveedor.DESCRIPCION_P, comprasproveedor.PRECIO_P            
              from comprasproveedor 
              INNER JOIN admin ON comprasproveedor.ID_ADMIN = admin.ID_ADMIN
              INNER JOIN proveedor ON comprasproveedor.ID_PROVEEDOR = proveedor.ID_PROVEEDOR");

                if ($sql) {
                    while ($resultado = $sql->fetch_assoc()) {
                        $idcompras = $resultado['ID_COMPRAS_P'];
                        $idAdmin = $resultado['NOMBRE'];
                        $idProveedor = $resultado['RAZON_SOCIAL'];
                        $producto = $resultado['PRODUCTO_P'];
                        $descripcion = $resultado['DESCRIPCION_P'];
                        $precio = $resultado['PRECIO_P'];

                        echo "<tr>";
                        echo "<th scope='row'>$idcompras</th>";
                        echo "<td>$idAdmin</td>";
                        echo "<td>$idProveedor</td>";
                        echo "<td>$producto</td>";
                        echo "<td>$descripcion</td>";
                        echo "<td>S/ $precio</td>";
                        echo "<th>
                    <a href='Formulario/editar.php?id=$idcompras' class=\"btn btn-warning custom-link \"><i class='fas fa-edit'></i> </a>
                    <br>
                    <br>
                    <a href='../CRUDPROVEE/eliminarCompra.php?ID_COMPRAS_P=$idcompras'class=\"btn btn-danger custom-link\"><i class='fas fa-trash'></i></a>
                 </th>";
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
    <!-- ------------------------------------------------------------------------------------------------------------------- -->

    <!--------------------------------- Esilos  --------------------------------->
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

        .tableGeneral{
            display: grid;
          grid-template-rows: 1fr 1fr;
          gap: 18px;
        }
        .tableGeneral h1{
            font-weight: bold;
           letter-spacing: 1px;
           text-align: center;
           padding-top: 22px;
           font-size: 35px;
        }
        .tableGeneral .botones{
      border: none;
      margin-left: 79%;
      margin-top: 20px;
    }
      .botones a{
        font-weight: bold;
      }
      .tableGeneral table{
        font-size: 14px;
       
      }
      table td{
        text-align: center;
      }

    </style>

    <!-- script  de  boostrap y aos para estilo y efectos -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>