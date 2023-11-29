<?php
// Realiza la conexión a la base de datos (ajusta los valores según tu configuración)
include ("../config/conexion.php");

// Consulta SQL para obtener la cantidad vendida de cada producto
$consulta = "SELECT producto.N_PRODUCTO, SUM(boleto_compra.CANTIDAD) as total_vendido
             FROM boleto_compra
             INNER JOIN producto ON boleto_compra.ID_PRODUCTO = producto.ID_PRODUCTO
             GROUP BY boleto_compra.ID_PRODUCTO
             ORDER BY total_vendido DESC
             LIMIT 5";

$resultado = $conexion->query($consulta);

// Obtén los datos para el gráfico
$labels = [];
$data = [];

while ($fila = $resultado->fetch_assoc()) {
    $labels[] = $fila['N_PRODUCTO'];
    $data[] = $fila['total_vendido'];
}

// Cierra la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfico de Producto más Vendido</title>
    <!-- Incluye la biblioteca de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
         #chart-container {
         width: 68%; /* Puedes ajustar este valor según tus necesidades */
         height: auto;
         box-shadow: 1px 2px 10px gray;
         margin-left: 18%;
         padding-left: 10px;
         padding-right: 10px;
      }
     

        .graficos h1{
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
    <!-- Contenedor del gráfico -->
    <div class="graficos" id="chart-container">
    <h1 style="text-align: center;">Productos mas Vendidos</h1>
        <canvas id="grafico"></canvas>
    </div>

    <script>
        // Datos para el gráfico
        var labels = <?php echo json_encode($labels); ?>;
        var data = <?php echo json_encode($data); ?>;

        // Configuración del gráfico
        var config = {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'PRODUCTOS VENDIDOS',
                    data: data,
                    backgroundColor: 'rgba(0, 121, 0, 0.5)',
                    borderColor: 'rgba(0, 121, 0, 2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Crear el gráfico en el contexto del canvas
        var ctx = document.getElementById('grafico').getContext('2d');
        var myChart = new Chart(ctx, config);
    </script>
</body>
</html>
