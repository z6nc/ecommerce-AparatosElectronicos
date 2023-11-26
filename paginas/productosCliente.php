<?php session_start();
include ("../config/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <title>Productos</title>
</head>
<body>
    
<?php
  include("../cabeza/cabeza.html");
  ?>


    <section >
            <?php 
            $buscardor=mysqli_query($conexion,"SELECT * FROM producto "); 
            while($resultado = mysqli_fetch_assoc($buscardor)){ 
               ?>
               <div class="container" data-aos="zoom-in-up">
                        <a href="#"><img src="data:image/jpeg;base64,<?php echo base64_encode($resultado['IMG']); ?>" alt="" class="card-img-top" height="200px" wigth="100px"></a>
                        
                            <h5  class="card-title"><a href="detalles.php?id=<?php echo $resultado["ID_PRODUCTO"]; ?>"><?php echo $resultado["N_PRODUCTO"]; ?></a></h5>
                            <!--ACA FALTAL AÑADIR DETALLES DE PRODUCTOS. buscar solucion-->
                            <p class="card-text">S/.<?php echo $resultado["PRECIO"]; ?></p>
                            
                        <button type="submit" class="btn btn-primary"  onclick=" envia_carrito($('#ref<?php echo $resultado['ID_PRODUCTO']; ?>').val(),$('#titulo<?php echo $resultado['ID_PRODUCTO']; ?>').val(),$('#precio<?php echo $resultado['ID_PRODUCTO']; ?>').val(),$('#cantidad<?php echo $resultado['ID_PRODUCTO']; ?>').val());">Añadir Carrito <i class="fas fa-shopping-cart"></i> </button>
                            <!--No afecta para el uso-->         <input name="ref" type="hidden" id="ref<?php echo $resultado["ID_PRODUCTO"]; ?>" value="<?php echo $resultado["ID_PRODUCTO"]; ?>" />                           
                        <input name="precio" type="hidden" id="precio<?php echo $resultado["ID_PRODUCTO"]; ?>" value="<?php echo $resultado["PRECIO"]; ?>" />
                        <input name="titulo" type="hidden" id="titulo<?php echo $resultado["ID_PRODUCTO"]; ?>" value="<?php echo $resultado["N_PRODUCTO"]; ?>" />
                        <input name="cantidad" type="hidden" id="cantidad<?php echo $resultado["ID_PRODUCTO"]; ?>" value="1" class="pl-2" />
                        
                       
                    
                </div>
              <?php } ?>
              
    </section>
    <style>
      body {
        margin: 0;
        box-sizing: border-box;     
        font-family: 'Montserrat', sans-serif;
        background-color: #fff9f9;
      }

      section {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 20px;
      }

      section .container {
        text-align: center;
        border: 1px solid lightgray;
        border-radius: 7px;
        margin: 20px 30px;
        background-color: white;
      }

      .container a {
        text-decoration: none;
        color: #1078ff;
        font-size: 16px;
        letter-spacing: 2px;
      }

      section .container:hover {
        box-shadow: 1px 2px 10px gray;
      }

      .container button {
        cursor: pointer;
        padding: 10px 32px;
        border-radius: 9px;
        color: whitesmoke;
        background-color: #0455bd;
        font-weight: 900;
        border: none;
        white-space: nowrap;
        letter-spacing: 1px;
        margin-bottom: 12px;
      }

      .container button:hover {
        background-color: #1078ff;
        color: whitesmoke;
        box-shadow: 0px 0px 10px black;
      }

      .container p {
        color: black;     
        letter-spacing: 1px;
      }

      .container img {
        padding-top: 10px;
        max-width: 100%;
        height: auto;
      }

      @media screen and (max-width: 767px) {
        section {
          grid-template-columns: repeat(1, 1fr);
        }
      }
     
    </style>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>