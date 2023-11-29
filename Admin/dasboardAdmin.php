<?php
include("../config/conexion.php");

// Ejemplo de consulta para obtener los gastos totales
$query = "SELECT SUM(monto_total) as total_gastos FROM factura_proveedor";
$result = $conexion->query($query);

// Procesa los datos
$row = $result->fetch_assoc();
$totalGastos = $row['total_gastos'];




// Ejemplo de consulta para obtener los ingresos totales
$querys = "SELECT SUM(precio_compra) as total_ingresos FROM boleto_compra";
$resulta = $conexion->query($querys);

// Procesa los datos
$rows = $resulta->fetch_assoc();
$totalingresos = $rows['total_ingresos'];

$conexion->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Enlace a Bootstrap CSS (desde un CDN) -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Tu propio CSS personalizado (si es necesario) -->

</head>

<body>

  <?php
  include('../Admin/navbarDasboard.php');
  ?>
  <main>
    <h1>Contenido Principal</h1>
    <h4>Administrador</h4>
    <br>
    <div class="admin">
      <div class="info">
        <p>Productos por Marca </p>
        <img src="../imagenes/graficoCircular.png" alt="" srcset="">
        <a href="../Admin/gestionAdmin.php">Ver Detalle</a>
      </div>
      <div class="pagos">
        <div class="info2" id="gastosContainer">
          <h4>Compras</h4>
          <p>Total de Gastos: S/<?php echo number_format($totalGastos, 2); ?></p>
          
          <a href="../Admin/gastosdeCompra.php">Ver Detalle</a>
        </div>
        <div class="info2">
          <h4>Ventas</h4>
          <p>Total de ingresos: S/<?php echo number_format($totalingresos, 2); ?></p>
          <a href="../Admin/ingresoVenta.php">Ver Detalle</a>
        </div>
      </div>

      <div class="info">
        <p>Estado de Entrega de Productos</p>
        <img src="../imagenes/graficoCircular.png" alt="" srcset="">
        <a href="../Admin/estadodeProductos.php">Ver Detalle</a>
      </div>
      <div class="info">
        <p>Registro de Compras Diarias</p>
        <img src="../imagenes/graficoCircular.png" alt="" srcset="">
        <a href="../Admin/fechaVentas.php">Ver Detalle</a>
      </div>
    </div>

  </main>


  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      margin: 0;
      box-sizing: border-box;
      background-color: #f3f4f6;
    }

    .admin {
      display: grid;
      grid-template-columns: 40% 60% ;
      gap: 10px;
      margin-left: 40px;
      margin-right: 40px;

    }

    .admin .info {
      display: flex;
      border-radius: 12px;
      flex-direction: column;
      align-items: center;
      border: 1px solid #babebe;
      padding-bottom: 45px;
      background-color: white;
      justify-content: center;
    }

    .info p {
      padding-top: 36px;
      color: #555;
      padding-left: 30px;
      font-size: 25px;
      letter-spacing: 1px;
    }

    .admin .info:hover {
      box-shadow: 1px 2px 10px gray;
    }

    .info img {
      width: 35%;
      border-radius: 50%;
     
    }

    .info a {
      background-color: #dc582a;
      border-radius: 5px;
      margin-left: 17px;
      margin-top: 27px;
      padding: 9px 25px;
      text-decoration: none;
      color: white;
       box-shadow: 1px 2px 10px black;
      font-weight: 900;
    }
    .info a:hover{
      letter-spacing: 1px;
      background-color: orangered;
    }

    .admin .pagos{
      display: grid;
      grid-template-rows: 1f 1fr;
      gap: 20px;
      background-color: white;
      
    }

    .pagos .info2{
      border: 1px solid #babebe;
      border-radius: 10px;
      padding-left: 20px;
      padding-top: 20px;
    }
   
    .pagos .info2:hover{
      box-shadow: 1px 2px 10px gray;
    }


    .info2 h4{
      font-size: 25px;
      letter-spacing: 1px;
      color: #555;
    }
    .info2 p{
      letter-spacing: 2px;
      font-size: 19px;
      padding-top: 8px;
      padding-bottom: 10px;
    }
    .info2 a{
      background-color: #dc582a;
      border-radius: 5px;
      padding: 7px 20px;
      text-decoration: none;
      color: white;
      font-weight: 500;
      margin-top: 20px;
      font-size: 14px;
    }
    .info2 a:hover{
      background-color:orangered;
      letter-spacing: 1px;
    }
  
  </style>







  <!-- Enlace a Bootstrap JS (desde un CDN) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>