<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- Banner   -->

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
<!-- -------------------------------------------------------------------------------------------------- -->

 <!--------------------- Tabla   de registro de compras proveedor  ------------------------ -->
        
 <div style="display: flex; justify-content: space-between;">
  <a href="../Proveedor/proveedor.php" style="text-decoration: none; color: black;margin-left:1em;">
    <i class="fas fa-arrow-circle-left" style="margin-right: 5px;padding-top:2em;"></i> Tabla Anterior
  </a>
  <a href="../Proveedor/pagos.php" style="text-decoration: none; color: black;margin-left:1em;">
    Siguiente Tabla <i class="fas fa-arrow-circle-right" style="margin-left: 5px;padding-top:2em;"></i>
  </a>
</div>


    <div class="tableGeneral">
        <div class="titulo">
          <h1>Compras Proveedor</h1>
        </div>
        <table class="table table-bordered   table-hover " >
            <thead class="text-center"  >
                <tr style="background-color:green;">
                    <th scope="col"  style="background-color:green; color:white">ID COMPRA </th>
                    <th scope="col" style="background-color:green; color:white">NOMBRE ADMIN</th>
                    <th scope="col"style="background-color:green; color:white">NOMBRE PROVEEDOR</th>
                    <th scope="col"style="background-color:green; color:white">PRODUCTO</th>
                    <th scope="col"style="background-color:green; color:white">DESCRIPCION</th>
                    <th scope="col"style="background-color:green; color:white">PRECIO</th>
                    <th scope="col"style="background-color:green; color:white">ACCION</th>
                </tr>
            </thead>
<!-- ------------------------------------------------------------------------------------ -->
  
<!------------------------------- contenido con php para  listar los productos--------------------- -->
         
            <tbody  class="text-center">
            <?php
            include("../config/conexion.php");

            $sql=$conexion->query("SELECT comprasproveedor.ID_COMPRAS_P, admin.NOMBRE, proveedor.RAZON_SOCIAL, comprasproveedor.PRODUCTO_P, comprasproveedor.DESCRIPCION_P, comprasproveedor.PRECIO_P            
              from comprasproveedor 
              INNER JOIN admin ON comprasproveedor.ID_ADMIN = admin.ID_ADMIN
              INNER JOIN proveedor ON comprasproveedor.ID_PROVEEDOR = proveedor.ID_PROVEEDOR");
            
            if ($sql) {
                  while($resultado=$sql->fetch_assoc()){
                 $idcompras=$resultado['ID_COMPRAS_P'];
                 $idAdmin=$resultado['NOMBRE'];
                 $idProveedor=$resultado['RAZON_SOCIAL'];
                 $producto=$resultado['PRODUCTO_P'];
                 $descripcion=$resultado['DESCRIPCION_P'];
                 $precio=$resultado['PRECIO_P'];

                 echo"<tr data-aos=\"zoom-in-up\">";
                 echo"<th scope='row' style='background-color:green; color:white'>$idcompras</th>";
                 echo"<td>$idAdmin</td>";
                 echo"<td>$idProveedor</td>";
                 echo"<td>$producto</td>";
                 echo"<td>$descripcion</td>";
                 echo"<td>S/ $precio</td>";   
                 echo "<th>
                    <a href='Formulario/editar.php?id=$idcompras' class=\"btn btn-warning custom-link \"><i class='fas fa-edit'></i> </a>
                    <br>
                    <br>
                    <a href='../CRUDPROVEE/eliminarCompra.php?ID_COMPRAS_P=$idcompras'class=\"btn btn-danger custom-link\"><i class='fas fa-trash'></i></a>
                 </th>";
                  echo"</tr>";
                  }
            } else {
                echo "Error en la consulta: " . $conexion->error;
            }

            $conexion->close();
            ?> 
            </tbody>
            <div class="contenedor " >
            <a href="../CRUDPROVEE/agregarCompra.php"class="btn btn-success  text-center  " style=" background-color:green">Agregar Compra  <i class="fas fa-plus"></i></a>
            </div>
        </table>
    </div>
<!-- ------------------------------------------------------------------------------------------------------------------- -->

<!--------------------------------- Esilos  --------------------------------->
    <style>
        table th{
            color:white;
        }
        .contenedor{
            margin-left:85%;
            margin-bottom:1em;
        }


        /* estilo para el bton editar */
        th .custom-link{
            width:83px;
            height:38px;
        }
        /* estilo de letra para todo la pagina */
        body{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
             background-color:#EAE6CA;
}
          

       /* posicion del contendor del titulo */
        .titulo{
            margin-bottom:2em;
        }
        /* posicion de la letra para que se centrado  */
        .titulo h1{
            padding-top:1em;
            text-align: center;
            color:black;
            
        }

        /* color de navbar */
        nav {
            background-color: darkgoldenrod;
 
        }

        /* estilo de letra y para dar espacio en los botones de navbar */
        nav div {
            margin-left: 2em;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;


        }
        /* para quitar los bordes de boton */
        nav .btn {
            border: none;
        }
    </style>

    <!-- script  de  boostrap y aos para estilo y efectos -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>