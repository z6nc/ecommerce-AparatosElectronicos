<?php
// Asegúrate de que la ruta del archivo de conexión sea correcta
include("../config/conexion.php");

// Consulta SQL para obtener el stock de cada producto
$consulta = "SELECT N_PRODUCTO, STOCK FROM producto   ORDER BY
STOCK DESC;";
$resultado = $conexion->query($consulta);

// Verifica si la consulta fue exitosa
if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}

// Obtén los datos para el gráfico
$productos = [];
$stock = [];

while ($fila = $resultado->fetch_assoc()) {
    $productos[] = $fila['N_PRODUCTO'];
    $stock[] = $fila['STOCK'];
}

// Cierra la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfico de Stock de Productos</title>
    <!-- Incluye la biblioteca de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chart-container {
         width: 70%; /* Puedes ajustar este valor según tus necesidades */
         height: 500px;
         
      }
      .graficos {
        box-shadow: 1px 2px 10px gray;
         margin-left: 18%;
         margin-top: 40px;
         padding-left: 10px;
         padding-right: 10px;
         padding-bottom: 100px;
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
        var productos = <?php echo json_encode($productos); ?>;
        var stock = <?php echo json_encode($stock); ?>;

        // Configuración del gráfico
        var config = {
            type: 'bar',
            data: {
                labels: productos,
                datasets: [{
                    label: 'STOCK PRODUCTOS',
                    data: stock,
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
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
