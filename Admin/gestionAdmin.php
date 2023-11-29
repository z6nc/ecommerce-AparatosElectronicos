<?php
include ("../config/conexion.php");

// Ejemplo de consulta para obtener la cantidad de productos por marca
$query = "SELECT MARCA, COUNT(*) as cantidad FROM producto GROUP BY MARCA";
$result = $conexion->query($query);

// Procesa los datos
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard de Productos por Marca</title>
    <!-- Agrega la biblioteca Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    
    <style>
        body{
            font-family: 'Montserrat', sans-serif;
            background-color: whitesmoke;
        }
        #chart-container {
            width: 70%;
            height: 500px; 
        }
        
        .grafico {
            margin-top: 30px;
            box-shadow: 1px 2px 10px gray;
            border-radius: 9px;
          margin-left: 17%;
           
        }

        .grafico h1{
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
<body>
   <?php
   include('../Admin/navbarDasboard.php');
   ?>
    <div class="grafico" id="chart-container">
        <h1 style="text-align: center;">Productos por Marca</h1>
        <canvas  id="myChart"></canvas>
    </div>

    <!-- Agrega el script de Chart.js para visualizar los datos -->
    <script>
        // Inserta los datos obtenidos de la consulta
        var labels = <?php echo json_encode(array_column($data, 'MARCA')); ?>;
        var data = <?php echo json_encode(array_column($data, 'cantidad')); ?>;

        // Configura el gráfico con Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        'rgba(135, 160, 228, 1)', // Color más claro
                        'rgba(255, 107, 125, 1)', // Color más claro
                        'rgba(229, 114, 137, 1)', // Color más claro
                        'rgba(155, 229, 245, 1)', // Color más claro
                        'rgb(102, 204, 102)' // Color más claro
                        
                        // Agrega más colores según sea necesario
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'bottom'
                    
                }
                
            }
        });
    </script>
</body>
</html>
