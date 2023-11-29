<?php
// Incluye el archivo de conexión
include ("../config/conexion.php");

// Consulta SQL con JOIN para obtener la cantidad de productos comprados por fecha
$consulta = "SELECT c.fecha, COUNT(b.CANTIDAD) as CANTIDAD
             FROM boleto_compra b
             INNER JOIN compra c ON b.ID_COMPRA = c.ID_COMPRA
             GROUP BY c.fecha";
$resultado = $conexion->query($consulta);

// Obtén los datos para el gráfico
$fechas = [];
$cantidades = [];

while ($fila = $resultado->fetch_assoc()) {
    $fechas[] = $fila['fecha'];
    $cantidades[] = $fila['CANTIDAD'];
}

// Cierra la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfico de Compras por Fecha</title>
    <!-- Incluye la biblioteca de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
         #chart-container {
            width: 70%;
            height: 500px; 
         
      }
     
      .graficos {
            margin-top: 30px;
            box-shadow: 1px 2px 10px gray;
            border-radius: 9px;
          margin-left: 17%;
          padding-bottom: 120px;
           padding-left: 10px;
           padding-right: 10px;
        }



        .graficos h1{
         margin-top: 15px;
         font-weight: 900;
         font-size: 36px;
         letter-spacing: 1px;
         padding-top: 10px;
         padding-bottom: 10px;
        }
    </style>
</head>
<body>
<?php
   include('../Admin/navbarDasboard.php');
   ?>

    <!-- Contenedor del gráfico -->
    <div class="graficos" id="chart-container">
    <h1 style="text-align: center;">Compras Diarias</h1>
        <canvas id="grafico"></canvas>
    </div>

    <script>
        // Datos para el gráfico
        var fechas = <?php echo json_encode($fechas); ?>;
        var cantidades = <?php echo json_encode($cantidades); ?>;

        // Configuración del gráfico
        var config = {
            type: 'line',
            data: {
                labels: fechas,
                datasets: [{
                    label: 'COMPRAS DIARIAS',
                    data: cantidades,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
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
