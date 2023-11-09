<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LISTA DE PAGOS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   
  <!-- ------------------------------------------ Navbar  de la pagina web ---------------------------------------- -->
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
<!-- ------------------------------------------------------------------------------------------------------------------------------------------- -->

<div style="display: flex; justify-content: space-between;">
  <a href="../Proveedor/listaCompraProve.php" style="text-decoration: none; color: black;margin-left:1em;">
    <i class="fas fa-arrow-circle-left" style="margin-right: 5px;padding-top:2em;"></i> Tabla Anterior
  </a>
  <a href="../Proveedor/factura.php" style="text-decoration: none; color: black;margin-left:1em;">
    Siguiente Tabla <i class="fas fa-arrow-circle-right" style="margin-left: 5px;padding-top:2em;"></i>
  </a>
</div>
<!------------------------------------------------------------------Listado de pagos ---------------------------------------- -->
   <div class="general">
    <div class="titulo text-center">
        <h1> Lista de pagos </h1>
    </div>
    <table class="table   table-hover  table-bordered text-center"  >
        <thead class="text-center" >
          <tr >
            <th scope="col" >ID PAGO</th>
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
        $sql=$conexion->query("SELECT pago_proveedor.ID_PAGO_P ,comprasproveedor.ID_COMPRAS_P ,comprasproveedor.PRODUCTO_P, pago_proveedor.FORMA_PAGO_P, pago_proveedor.FECHA_PAGO_P
        FROM pago_proveedor 
        INNER JOIN comprasproveedor on pago_proveedor.ID_COMPRAS_P = comprasproveedor.ID_COMPRAS_P");

        if ($sql) {
          while ($resultado=$sql->fetch_assoc()) {
           $idPago =$resultado['ID_PAGO_P'];
           $idcompras=$resultado['ID_COMPRAS_P'];
           $productoP=$resultado['PRODUCTO_P'];
           $formasPago=$resultado['FORMA_PAGO_P'];
           $fechaPago=$resultado['FECHA_PAGO_P'];
          
           echo "<tr  class='text-center' data-aos=\"zoom-in-up\"   >";
            echo "<th scope='row'>$idPago</th>";
            echo "<td>$idcompras</td>";
            echo "<td>$productoP</td>";
            echo"<td>$formasPago</td>";
            echo "<td>$fechaPago</td>";
            echo "<td>
            <a href='Formulario/editar.php?id=$idPago' class=\"btn btn-warning custom-link \"><i class='fas fa-edit'></i> </a>
                    <br>
                    <br>
            <a href='../CRUDPROVEE/eliminarPago.php?ID_PAGO_P=$idPago'class=\"btn btn-danger custom-link \"> <i class='fas fa-trash'></i></a>
            </td>";

            echo"</tr>";
            
          }

        } else {
          echo "Error en la consulta: " . $conexion->error;
        }
        $conexion->close();
        ?>

        </tbody>
        <div class="contenedor " >
            <a href="../CRUDPROVEE/agregarPago.php"class="btn btn-success  text-center  " style=" background-color:green">Agregar Pago <i class="fas fa-plus"></i></a>
            </div>
      </table>
   </div>

<!-- -------------------------------------------------------------------------------------------------------------------------------- -->

    
<!----------------------------------------------------------------- Estilos  para el proyecto  -------------------------------------- -->
    <style>

      body{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        background-color:#EAE6CA;
      }
.titulo{
  margin-bottom:3em;
  
}
.titulo h1{
  padding-top:1em;
  color:black;
}

.table td{
  background-color:lightgray;
}
       
.table  th {
  background-color:green;
  color:white;

}
       td .custom-link{
            width:83px;
            height:38px;
        }  /* color de navbar */
          nav {
         background-color:darkgoldenrod;
       }
      
       /* posicion de los div dentro de n navbar y sus estilo de letra */
       nav div {
            margin-left: 2em;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;


        }
        /* para quitar los bordes de boton */
        nav .btn {
            border: none;
        }
        .contenedor{
          margin-left:85%;
          margin-bottom:10px;
        }
    </style>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
  
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>