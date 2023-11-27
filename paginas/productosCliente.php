<?php session_start();
include ("../config/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <title>Productos</title>
</head>
<body>
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid ">
    <a class="navbar-brand"  style="color: black; padding: 23px 40px;" href="../paginas/inicio.php">ELECTROTECHZONE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
      <ul class="navbar-nav "   >
        <li class="nav-item" >
          <a class="nav-link " style="color: black; letter-spacing: 2px;"  aria-current="page" href="#">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: black;letter-spacing: 2px;" href="#">PRODUCTOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: black;letter-spacing: 2px;" href="#">ACERCA DE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " style="color: black;letter-spacing: 2px;" aria-disabled="true">CONTACTO <i class="fab fa-whatsapp"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <br>
  <br>
    <h1>Productos</h1>
    <br>
   <br>
    <div id="proveedoresCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex justify-content-between align-items-center">
                    <img src="../imagenes/apple.png" class="d-block" alt="Razer" style="max-height: 50px;">
                    <img src="../imagenes/razer.png" class="d-block" alt="LG" style="max-height: 50px;">
                    <img src="../imagenes/samsung.png" class="d-block" alt="Samsung" style="max-height: 50px;">
                    <img src="../imagenes/logite.png" class="d-block" alt="Apple" style="max-height: 50px;">
                    <img src="../imagenes/asus.png" class="d-block" alt="Logitech" style="max-height: 50px;">
                    <img src="../imagenes/msi.png" class="d-block" alt="Asus" style="max-height: 50px;">
                    <!-- Agrega más logos aquí según sea necesario -->
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-between align-items-center">
                    <img src="../imagenes/acer.png" class="d-block" alt="Apple" style="max-height: 50px;">
                    <img src="../imagenes/zowii.png" class="d-block" alt="Logitech" style="max-height: 50px;">
                    <img src="../imagenes/lenovo.png" class="d-block" alt="Asus" style="max-height: 50px;">
                    <img src="../imagenes/alcatel.png" class="d-block" alt="Apple" style="max-height: 50px;">
                    <img src="../imagenes/reddragon.png" class="d-block" alt="Logitech" style="max-height: 50px;">
                    <img src="../imagenes/amazon.png" class="d-block" alt="Asus" style="max-height: 50px;">
                    <!-- Agrega más logos aquí según sea necesario -->
                </div>
            </div>
            <!-- Agrega más elementos carousel-item según sea necesario -->
        </div>
        <a class="carousel-control-prev" href="#proveedoresCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#proveedoresCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <br>
    <section >
            <?php 
            $buscardor=mysqli_query($conexion,"SELECT * FROM producto "); 
            while($resultado = mysqli_fetch_assoc($buscardor)){ 
               ?>
               <div class="container1" data-aos="zoom-in-up">
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



    <?php
  include("../cabeza/footer.html");
  ?>
    <style>
      body {
        margin: 0;
        box-sizing: border-box;     
        font-family: 'Montserrat', sans-serif;
        background-color: #fff9f9;
      }

      section {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 3px;
      }

      section .container1 {
        text-align: center;
        border: 1px solid lightgray;
        border-radius: 7px;
        margin: 20px 50px;
        background-color: white;
       
      }

      .container1 a {
        text-decoration: none;
        color: #1078ff;
        font-size: 16px;
        letter-spacing: 2px;
      }

      section .container1:hover {
        box-shadow: 1px 2px 10px gray;
      }

      .container1 button {
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

      .container1 button:hover {
        background-color: #1078ff;
        color: whitesmoke;
        box-shadow: 0px 0px 10px black;
      }

      .container1 p {
        color: black;     
        letter-spacing: 1px;
      }

      .container1 img {
        padding-top: 10px;
        max-width: 70%;
        height: auto;
       
      }
      nav{
        background-color:whitesmoke;
       
        text-align: center;
        padding: 20px 100px;
       
       
      }
      nav a{
        color: white;
      }
      
      h1{
        text-align: center;
        font-weight: 900;
        color: #0455bd;
        font-size: 45px;
        letter-spacing: 2px;
      }

      @media screen and (max-width: 767px) {
        section {
          grid-template-columns: repeat(1, 1fr);
        }
      }
     
    </style>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  <script>
    AOS.init();
  </script>
</body>
</html>