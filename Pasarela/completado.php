<?php
session_start();
include("../config/conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<?php 
include ("../cabeza/cabeza.html");
?>
 <main>
<div class="d-flex justify-content-center" >
<div class="card text-center">
                  <div class="card-info">

    <h2>GRACIAS POR SU COMPRA!!!</h2>
    <p>porfavor imprima su boleta</p>

    <form class="d-flex justify-content-center" action="invoice.php" method="post">
        <input type="submit" value="Generar PDF">
    </form>
    </div>
</div>
    </div>
    </main>
</body>
</html>
