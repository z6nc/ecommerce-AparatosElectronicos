<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://www.paypal.com/sdk/js?client-id=Adgp5SYO1WVGdjqrX6Jo15Gda5-OCe9IrESiRrmOkFOQJNwnAxTcprngqFHpXloHbHLTo04rM0lnsigT&currency=USD"></script>
</head>
<body>
    
<div id="paypal-button-conteiner"></div>

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
                    value: 100
                }
            }]
        });
    },

    onApprove: function(data, actions){
        actions.order.capture().then(function (detalles){
            console.log(detalles);
            window.location.href="completado.php"
        });
    },

    onCancel: function(data){
        alert("Pago Cancelado")
        console.log(data);
    }
}).render('#paypal-button-conteiner');
</script>

</body>
</html>