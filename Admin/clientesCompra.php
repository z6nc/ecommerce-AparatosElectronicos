<?php
// Asegúrate de que la ruta del archivo de conexión sea correcta
include("../config/conexion.php");

// Consulta SQL para obtener el nombre del cliente y la cantidad total de compras
$consulta = "
    SELECT
        c.ID_CLIENTE,
        cl.NOMBRE AS NOMBRE_CLIENTE,
        SUM(bc.CANTIDAD) AS TOTAL_COMPRAS
    FROM
        cliente cl
    INNER JOIN
        compra c ON cl.ID_CLIENTE = c.ID_CLIENTE
    INNER JOIN
        boleto_compra bc ON c.ID_COMPRA = bc.ID_COMPRA
    GROUP BY
        c.ID_CLIENTE, cl.NOMBRE
    ORDER BY
        TOTAL_COMPRAS DESC;
";

$resultado = $conexion->query($consulta);

// Verifica si la consulta fue exitosa
if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}

// Obtiene los datos para el gráfico
$labels = [];
$data = [];

while ($fila = $resultado->fetch_assoc()) {
    $labels[] = $fila['NOMBRE_CLIENTE'];
    $data[] = $fila['TOTAL_COMPRAS'];
}

// Cierra la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfico de Compras por Cliente</title>
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
        <h1 style="text-align: center;">Clientes que Han Realizado Compras</h1>
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
                    label: 'TOTAL DE COMPRAS POR CLIENTE',
                    data: data,
                    backgroundColor: 'rgba(75, 122, 192, 0.7)',
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
