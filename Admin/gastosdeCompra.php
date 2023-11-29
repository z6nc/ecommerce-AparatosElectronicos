<?php
include ("../config/conexion.php");

// Obtener datos de la base de datos
$query = "SELECT PRODUCTO_P, MONTO_TOTAL FROM factura_proveedor ORDER BY MONTO_TOTAL DESC LIMIT 5";
$result = $conexion->query($query);

// Procesar datos para el gráfico
$labels = [];
$montos = [];

while ($row = $result->fetch_assoc()) {
   $labels[] = $row['PRODUCTO_P'];
   $montos[] = $row['MONTO_TOTAL'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <title>Gráfico de Producto</title>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <style>
      /* Establecer el tamaño del contenedor */
      #chart-container {
         width: 68%; /* Puedes ajustar este valor según tus necesidades */
         height: auto;
         box-shadow: 1px 2px 10px gray;
         margin-left: 18%;
         padding-left: 10px;
         padding-right: 10px;
      }
     

        .grafico h1{
         margin-top: 15px;
         font-weight: 900;
         font-size: 36px;
         letter-spacing: 1px;
        }
       
   </style>
</head>
<body>
<?php
   include('../Admin/navbarDasboard.php');
   ?>

   <div  class="grafico" id="chart-container">
   <h1 style="text-align: center;">Monto total por Producto</h1>
      <canvas id="myChart"></canvas>
   </div>

   <script>
       var ctx = document.getElementById('myChart').getContext('2d');
       var myChart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: <?php echo json_encode($labels); ?>,
               datasets: [{
                   label: 'MONTO TOTAL',
                   data: <?php echo json_encode($montos); ?>,
                   backgroundColor: 'rgba(255, 165, 0, 0.3)',
                   borderColor: 'rgba(255, 165, 0, 1)',
                   borderWidth: 1
               }]
           }
       });
   </script>
</body>
</html>
