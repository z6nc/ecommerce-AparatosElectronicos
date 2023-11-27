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

  <title>ELECTROTECHZONE</title>
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

  <div id="proveedoresCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex justify-content-between align-items-center">
                    <img src="../imagenes/apple.png" class="d-block" alt="Razer" style="max-height: 60px;">
                    <img src="../imagenes/razer.png" class="d-block" alt="LG" style="max-height: 60px;">
                    <img src="../imagenes/samsung.png" class="d-block" alt="Samsung" style="max-height: 60px;">
                    <img src="../imagenes/logite.png" class="d-block" alt="Apple" style="max-height: 60px;">
                    <img src="../imagenes/asus.png" class="d-block" alt="Logitech" style="max-height: 60px;">
                    <img src="../imagenes/msi.png" class="d-block" alt="Asus" style="max-height: 60px;">
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
    <br>

  <section>
    <div class="f">
      <img src="../imagenes/principal1.png" alt="">
    </div>
    <div class="f">
      <img src="../imagenes/principal2.png" alt="">
    </div>
    <div class="f">
      <img src="../imagenes/principal3.png" alt="">
    </div>
  </section>

  <aside>
    <div>
    <img src="../imagenes/principal4.png" alt="s">
    </div>
    <div>
    <img src="../imagenes/principal5.png" alt="s">
    </div>
    <div>
    <img src="../imagenes/principal6.png" alt="">
    </div>
    <div>
    <img src="../imagenes/principal7.png" alt="">
    </div>
  </aside>

  <br>
  <br>
  <div class="mapas">
    <h2>Ubicanos</h2>
  <div id="mapa" style="height: 400px; margin: 40px 20px;"></div>
  </div>
  




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

    .container h2 {
      text-align: center;
      margin-bottom: 9px;
      padding-bottom: 28px;
      font-weight: bold;
      letter-spacing: 1px;
      color: #1078ff;
      font-size: 5vv;
    }

    section {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      text-align: center;
    }

    section .f {
      border-radius: 100px;
      margin: 10px 20px;

    }

    section img {
      border-radius: 14px;
      width: 410px;
    }
    
    aside{
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      text-align: center;
      margin-bottom: 9px;
    }
    aside img{
      border-radius: 14px;
    }
    .mapas h2{
      text-align: center;
      font-weight: bold;
      letter-spacing: 2px;
      color: #1078ff;
    }


    @media screen and (max-width: 767px) {
      section {
        grid-template-columns: repeat(1, 1fr);

      }
      section .f {
      margin: 10px 9px;

    }

      section img {
        width: 330px;
      }
      aside{
        grid-template-columns: repeat(1, 1fr 1fr);
        gap: 10px;
        
      }
      aside img{
        width: 250px;
      }
    }
  </style>
  
  <script>
  function mostrarMapa() {
    var ubicacion = { lat: -12.0431800, lng:  -77.0282400 }; // Cambia las coordenadas con las de tu ubicación

    var mapa = new google.maps.Map(document.getElementById('mapa'), {
      zoom: 18, // Ajusta el nivel de zoom según tus necesidades
      center: ubicacion
    });

    var marcador = new google.maps.Marker({
      position: ubicacion,
      map: mapa,
      title: ' tu empresa'
    });
  }

  // Llama a la función cuando la página haya cargado
  window.onload = mostrarMapa;
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

</body>

</html>