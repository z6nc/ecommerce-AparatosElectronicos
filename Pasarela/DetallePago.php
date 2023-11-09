<?php session_start();
include ("../config/conexion.php");
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://www.paypal.com/sdk/js?client-id=Adgp5SYO1WVGdjqrX6Jo15Gda5-OCe9IrESiRrmOkFOQJNwnAxTcprngqFHpXloHbHLTo04rM0lnsigT&currency=USD"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

</head>
<body>
    

    <?php 
    include ("../cabeza/cabeza.html");
    ?>

    <main>
        <h4 style="text-align: center; ">Detalles de Pago</h4>

        <div class="container text-center d-block mx-auto ">
            <div class="row">
                <div class="col-2">

                
                </div>
                <div class="col-6">
                    <div class="table-responsive ">
                        <table class="table">
                            <tbody>
                            <div class="container d-flex justify-content-center">
    <?php
    if (isset($_SESSION['carrito'])) {
        $carrito_mio = $_SESSION['carrito'];
    }

    $totalcantidad = 0;
    if (isset($_SESSION['carrito'])) {
        for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
            if (isset($carrito_mio[$i]) && $carrito_mio[$i] != NULL) {
                if (!isset($carrito_mio[$i]['cantidad'])) {
                    $carrito_mio[$i]['cantidad'] = 0;
                }
                $total_cantidad = $carrito_mio[$i]['cantidad'];
                $totalcantidad += $total_cantidad;
            }
        }
    }
    ?>

    <ul class="list-group text-center">
        <?php
        if (isset($_SESSION['carrito'])) {
            $total = 0;
            for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                if (isset($carrito_mio[$i]) && $carrito_mio[$i] != NULL) {
                    ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-2">Cantidad: <?php echo $carrito_mio[$i]['cantidad']; ?></div>
                                <div><?php echo $carrito_mio[$i]['titulo']; ?></div>
                            </div>
                            <div class="col-6">
                                <span class="text-muted"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']; ?> soles</span>
                            </div>
                        </div>
                    </li>
                    <?php
                    $total += $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];
                }
            }
        }
        ?>
    </ul>

    <li class="list-group-item">
        <div class="row">
            <div class="col-6">
                <span style="text-align: left; color: #000000;">Cantidad: <?php echo $totalcantidad; ?></span>
            </div>
            <div class="col-6">
                <strong style="text-align: right; color: #000000;">
                    Total (PEN): <?php echo $total; ?> S/
                </strong>
            </div>
        </div>
        
    </li>
    
</div> 


                                 
        <div id="paypal-button-conteiner"></div>
    </main>
</body>

<script>
paypal.Buttons({
    style:{
        color: 'blue',
        shape: 'pill',
        label: 'pay'
    },
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: <?php echo$total; ?>
                }
            }]
        });
    },

    onApprove: function(data, actions){
        let URL = 'captura.php'
        actions.order.capture().then(function (detalles) {
            
            console.log(detalles)

            let url = 'captura.php'

            return fetch(url, {
                method: 'post',
                headers: {
                    'content-type': 'application/json'
                },
                body: JSON.stringify({
                    detalles: detalles
                })
            }).then(function(response){
                window.location.href = "completado.php"
            })
        });
    },

    onCancel: function(data){
        alert("Pago Cancelado")
        console.log(data);
    }
}).render('#paypal-button-conteiner');
</script>

