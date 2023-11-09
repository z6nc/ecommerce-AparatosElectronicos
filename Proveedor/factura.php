<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Factura</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
  <!-- ---------------------------------------------NAVBAR --------------------------------------------------->
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
                    <a class="btn btn-outline-light" style="margin-left: 10px;" href="../Admin/listarEmpleado.php">Empleado <i class="fas fa-user-shield"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ---------------------------------------------------------------------------------------------------------------------------------------- -->
<div style="display: flex; justify-content: space-between;">
  <a href="../Proveedor/pagos.php" style="text-decoration: none; color: black;margin-left:1em;">
    <i class="fas fa-arrow-circle-left" style="margin-right: 5px;padding-top:2em;"></i> Tabla Anterior
  </a>
  
</div>
<!-- ----------------------------------------------------------TABLA FACTURA ---------------------------- -->
<!-------- Titulo--------- -->
<div class="contenedorT">
  <h1 class="text-center">Factura</h1>
</div>
<!-- ------------------------------ -->

<!-------------------------- Cabezera de  la tabla----------------------- -->
  <table class="table  table-hover  table-bordered text-center">
    <thead>
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
    <div class="contenedor " >
            <a href="../CRUDPROVEE/agregarFactura.php"class="btn btn-success  text-center  " style=" background-color:green">Agregar Factura  <i class="fas fa-plus"></i></a>
    </div>
  </table>
  <!-- -------------------------------------------------------------------------------------------------------------------- -->

  <!--------------------------- scrip de   BOOSTRAP -------------------------------------------->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


<!--------------------------------------------- Estilo de   la pagina web ----------------- -->

 <style>
  .contenedor{
    margin-left:85%;
    margin-bottom:1em;
   }
  .custom-link{
   width:83px;
   height:38px;
   }
  .contenedorT{
    margin-top: 4em;
  }
  .contenedorT h1{
    padding-bottom: 1em;
    color: black;
  }
  .table td{
    background-color:lightgray;
  }
  .table th{
    background-color: green;
    color: bisque;
  }
  body{
   font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
   background-color:#EAE6CA;
  }
  nav {
  background-color:darkgoldenrod;
   }
      
  nav div {
   margin-left: 2em;
   font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
   }     
   nav .btn {
   border: none;
    }
 </style>

</body>


</html>