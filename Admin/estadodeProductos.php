<?php
// Incluye el archivo de conexión
include ("../config/conexion.php");

// Consulta SQL para obtener la cantidad de productos entregados y pendientes
$consulta = "SELECT estado, COUNT(*) as cantidad FROM boleto_compra GROUP BY estado";
$resultado = $conexion->query($consulta);

// Obtén los datos para el gráfico
$labels = [];
$data = [];

while ($fila = $resultado->fetch_assoc()) {
    $labels[] = $fila['estado'];
    $data[] = $fila['cantidad'];
}

// Cierra la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfico de Estado de Productos</title>
    <!-- Incluye la biblioteca de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
    body{
            font-family: 'Montserrat', sans-serif;
           
        }
        #chart-container {
            width: 70%;
            height: 500px; 
        }
        
        .graficos {
            margin-top: 30px;
            box-shadow: 1px 2px 10px gray;
            border-radius: 9px;
          margin-left: 17%;
           
        }

        .graficos h1{
         margin-top: 15px;
         font-weight: 900;
         font-size: 36px;
         letter-spacing: 1px;
        }
        canvas{
            margin-bottom:90px ;
        }
    </style>
</head>
<body >

<?php
  include('../Admin/navbarDasboard.php');
  ?>
    <!-- Contenedor del gráfico -->
    <div class="graficos" id="chart-container">
      <h1 style="text-align: center;">Estado de Entrega</h1>
        <canvas id="grafico"></canvas>
    </div>

    <script>
        // Datos para el gráfico
        var labels = <?php echo json_encode($labels); ?>;
        var data = <?php echo json_encode($data); ?>;

        // Configuración del gráfico
        var config = {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: ['rgba(75, 192, 192, 0.7)', 'rgba(255, 99, 132, 0.7)'], // Colores para entregado y pendiente
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        };

        // Crear el gráfico en el contexto del canvas
        var ctx = document.getElementById('grafico').getContext('2d');
        var myChart = new Chart(ctx, config);
    </script>
</body>
</html>
