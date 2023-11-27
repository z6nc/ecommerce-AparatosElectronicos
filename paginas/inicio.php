<?php session_start();
include("../config/conexion.php");
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
  <script src="https://maps.googleapis.com/maps/api/js"></script>

  <title>ELECTROTECHZONe</title>
</head>

<body>
  <?php
  include("../cabeza/cabeza.html");
  ?>


  <main>
    <div id="carouselExample" class="carousel slide mb-5">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../imagenes/banner3.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="../imagenes/bannerPrimero.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="../imagenes/banner2.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </main>



  <div class="container">
    <h2>Mejores Productos</h2>
    <div class="row justify-content-center mb-5">
      <?php
      $buscardor = mysqli_query($conexion, "SELECT * FROM producto WHERE PAGPRIN = 'Si'");
      while ($resultado = mysqli_fetch_assoc($buscardor)) {
      ?>
        <div class="col-md-4 mb-3">
          <div class="card">
            <a href="#"><img src="data:image/jpeg;base64,<?php echo base64_encode($resultado['IMG']); ?>" alt="" class="card-img-top" height="200px" wigth="100px"></a>
            <div class="card-body">
              <h5 class="card-title"><a href="detalles.php?id=<?php echo $resultado["ID_PRODUCTO"]; ?>"><?php echo $resultado["N_PRODUCTO"]; ?></a></h5>
              <!--ACA FALTAL AÑADIR DETALLES DE PRODUCTOS. buscar solucion-->
              <p class="card-text">S/.<?php echo $resultado["PRECIO"]; ?></p>
              <div class="text-center">
                <button type="submit" class="btn btn-primary" onclick=" envia_carrito($('#ref<?php echo $resultado['ID_PRODUCTO']; ?>').val(),$('#titulo<?php echo $resultado['ID_PRODUCTO']; ?>').val(),$('#precio<?php echo $resultado['ID_PRODUCTO']; ?>').val(),$('#cantidad<?php echo $resultado['ID_PRODUCTO']; ?>').val());">Añadir al carrito</button>
                <!--No afecta para el uso--> <input name="ref" type="hidden" id="ref<?php echo $resultado["ID_PRODUCTO"]; ?>" value="<?php echo $resultado["ID_PRODUCTO"]; ?>" />
                <input name="precio" type="hidden" id="precio<?php echo $resultado["ID_PRODUCTO"]; ?>" value="<?php echo $resultado["PRECIO"]; ?>" />
                <input name="titulo" type="hidden" id="titulo<?php echo $resultado["ID_PRODUCTO"]; ?>" value="<?php echo $resultado["N_PRODUCTO"]; ?>" />
                <input name="cantidad" type="hidden" id="cantidad<?php echo $resultado["ID_PRODUCTO"]; ?>" value="1" class="pl-2" />

                <h1>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="Espacio"></div>
    </div>
  </div>
  <br>
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>