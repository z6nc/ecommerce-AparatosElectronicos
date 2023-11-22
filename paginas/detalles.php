
<?php
    include ("../config/conexion.php");
    $id=$_GET["id"];
    $sql=$conexion->query ("SELECT * FROM producto WHERE ID_PRODUCTO= $id");
?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="es"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Título del Producto 1">
    <meta name="description" content="">
    <title>Casa</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Casa.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.0.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    
  <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="es">




  <?php 
    $buscardor=mysqli_query($conexion,"SELECT * FROM producto WHERE ID_PRODUCTO = '$id'"); 
    while($resultado = mysqli_fetch_assoc($buscardor)){ 
               ?>
    <section class="u-align-center u-clearfix u-section-1" id="sec-15bd">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-valign-middle-xs u-sheet-1"><!--product--><!--product_options_json--><!--{"source":""}--><!--/product_options_json-->
        <div class="u-container-style u-expanded-width u-product u-product-1" data-products-datasource="site" data-product-id="6">
          <div class="u-container-layout u-valign-middle-xl u-container-layout-1"><!--product_gallery--><!--options_json--><!--{"maxItems":""}--><!--/options_json-->
            <div class="u-carousel u-gallery u-layout-thumbnails u-lightbox u-no-transition u-product-control u-show-text-none u-thumbnails-position-left u-gallery-1" data-interval="5000" data-u-ride="carousel" id="carousel-7f5a">
              <div class="u-carousel-inner u-gallery-inner" role="listbox"><div class="u-carousel-item u-gallery-item u-active">
                  <div class="u-back-slide">
                    <img class="u-back-image u-expanded u-image-contain" src="data:image/jpeg;base64,<?php echo base64_encode($resultado['IMG']); ?>">
                  </div>
                  <div class="u-over-slide u-over-slide-1">
                    <h3 class="u-gallery-heading">Sample Title</h3>
                    <p class="u-gallery-text">Sample Text</p>
                  </div>
                </div><div class="u-carousel-item u-gallery-item">
                  <div class="u-back-slide">
                    <img class="u-back-image u-expanded u-image-contain" src="data:image/jpeg;base64,<?php echo base64_encode($resultado['IMAGEN2']); ?>">
                  </div>
                  <div class="u-over-slide u-over-slide-1">
                    <h3 class="u-gallery-heading">Sample Title</h3>
                    <p class="u-gallery-text">Sample Text</p>
                  </div>
                </div>

                <div class="u-carousel-item u-gallery-item">
                  <div class="u-back-slide">
                    <img class="u-back-image u-expanded u-image-contain" src="data:image/jpeg;base64,<?php echo base64_encode($resultado['IMAGEN3']); ?>">
                  </div>
                  <div class="u-over-slide u-over-slide-1">
                    <h3 class="u-gallery-heading">Sample Title</h3>
                    <p class="u-gallery-text">Sample Text</p>
                  </div>
                </div>
                <div class="u-carousel-item u-gallery-item">
                  <div class="u-back-slide">
                    <img class="u-back-image u-expanded u-image-contain" src="data:image/jpeg;base64,<?php echo base64_encode($resultado['IMAGEN4']); ?>">
                  </div>
                  <div class="u-over-slide u-over-slide-1">
                    <h3 class="u-gallery-heading">Sample Title</h3>
                    <p class="u-gallery-text">Sample Text</p>
                  </div>
                </div>
              
              
              </div>
              <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-icon-rectangle u-opacity u-opacity-70 u-spacing-10 u-text-hover-grey-80 u-white u-carousel-control-1" href="#carousel-7f5a" role="button" data-u-slide="prev">
                <span aria-hidden="true">
                  <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
                </span>
                <span class="sr-only">
                  <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
                </span>
              </a>
              <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-icon-rectangle u-opacity u-opacity-70 u-spacing-10 u-text-hover-grey-80 u-white u-carousel-control-2" href="#carousel-7f5a" role="button" data-u-slide="next">
                <span aria-hidden="true">
                  <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
                </span>
                <span class="sr-only">
                  <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
                </span>
              </a>

<!--imagenes pequeñas-->


              <ol class="u-carousel-thumbnails u-spacing-15 u-vertical-spacing u-carousel-thumbnails-1"><li class="u-carousel-thumbnail u-carousel-thumbnail-1 u-active" data-u-target="#carousel-7f5a" data-u-slide-to="0">
                  <img class="u-carousel-thumbnail-image u-image" src="data:image/jpeg;base64,<?php echo base64_encode($resultado['IMAGEN2']); ?>">
                </li><li class="u-carousel-thumbnail u-carousel-thumbnail-1" data-u-target="#carousel-7f5a" data-u-slide-to="1">
                  <img class="u-carousel-thumbnail-image u-image" src="data:image/jpeg;base64,<?php echo base64_encode($resultado['IMAGEN3']); ?>">
                  </li><li class="u-carousel-thumbnail u-carousel-thumbnail-1" data-u-target="#carousel-7f5a" data-u-slide-to="2">
                  <img class="u-carousel-thumbnail-image u-image" src="data:image/jpeg;base64,<?php echo base64_encode($resultado['IMAGEN4']); ?>">
                </li></ol>


                
            </div><!--/product_gallery--><!--product_title-->
            <h2 class="u-align-left u-product-control u-text u-text-1"><?php echo $resultado["N_PRODUCTO"]; ?></h2><!--/product_title--><!--product_price-->
            <div class="u-product-control u-product-price u-product-price-1" data-add-zero-cents="false">
              <div class="u-price-wrapper u-spacing-10"><!--product_old_price-->
                <div class="u-hide-price u-old-price" style="text-decoration: line-through !important;">$20</div><!--/product_old_price--><!--product_regular_price-->
                <div class="u-price u-text-palette-2-base" style="font-size: 1.875rem; font-weight: 700;">S/.<?php echo $resultado["PRECIO"]; ?></div><!--/product_regular_price-->
              </div>
            </div><!--/product_price--><!--product_content-->
            <div class="u-align-left u-product-control u-product-desc u-text u-text-2"><?php echo $resultado["DESCRIPCION"]; ?></div><!--/product_content--><!--product_button--><!--options_json--><!--{"clickType":"buy-now","content":"Add to Cart"}--><!--/options_json-->
            <a href="#" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-product-control u-text-black u-text-hover-white u-btn-1 u-dialog-link u-payment-button"  onclick=" envia_carrito($('#ref<?php echo $resultado['ID_PRODUCTO']; ?>').val(),$('#titulo<?php echo $resultado['ID_PRODUCTO']; ?>').val(),$('#precio<?php echo $resultado['ID_PRODUCTO']; ?>').val(),$('#cantidad<?php echo $resultado['ID_PRODUCTO']; ?>').val());"><!--product_button_content-->Anadir al Carrito<!--/product_button_content--></a><!--/product_button-->
          <!--No afecta para el uso-->         <input name="ref" type="hidden" id="ref<?php echo $resultado["ID_PRODUCTO"]; ?>" value="<?php echo $resultado["ID_PRODUCTO"]; ?>" />                           
          <input name="precio" type="hidden" id="precio<?php echo $resultado["ID_PRODUCTO"]; ?>" value="<?php echo $resultado["PRECIO"]; ?>" />
                        <input name="titulo" type="hidden" id="titulo<?php echo $resultado["ID_PRODUCTO"]; ?>" value="<?php echo $resultado["N_PRODUCTO"]; ?>" />
                        <input name="cantidad" type="hidden" id="cantidad<?php echo $resultado["ID_PRODUCTO"]; ?>" value="1" class="pl-2" />

          </div>
        </div><!--/product-->
      </div>
    </section>
    
    <?php } ?>
    <div class="container"> 
        <div class="row justify-content-center mb-5">
            <?php 
            $buscardor=mysqli_query($conexion,"SELECT *FROM producto WHERE PAGPRIN = 'Si' ORDER BY RAND() LIMIT 3;"); 
            while($resultado = mysqli_fetch_assoc($buscardor)){ 
               ?>
               <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="#"><img src="data:image/jpeg;base64,<?php echo base64_encode($resultado['IMG']); ?>" alt="" class="card-img-top" height="200px" wigth="100px"></a>
                        <div class="card-body">
                            <h5  class="card-title"><a href="detalles.php?id=<?php echo $resultado["ID_PRODUCTO"]; ?>"><?php echo $resultado["N_PRODUCTO"]; ?></a></h5>
                            <!--ACA FALTAL AÑADIR DETALLES DE PRODUCTOS. buscar solucion-->
                            <p class="card-text">S/.<?php echo $resultado["PRECIO"]; ?></p>
                            <div class="text-center">
                        <button type="submit" class="btn btn-primary"  onclick=" envia_carrito($('#ref<?php echo $resultado['ID_PRODUCTO']; ?>').val(),$('#titulo<?php echo $resultado['ID_PRODUCTO']; ?>').val(),$('#precio<?php echo $resultado['ID_PRODUCTO']; ?>').val(),$('#cantidad<?php echo $resultado['ID_PRODUCTO']; ?>').val());">Añadir al carrito</button>
                            <!--No afecta para el uso-->         <input name="ref" type="hidden" id="ref<?php echo $resultado["ID_PRODUCTO"]; ?>" value="<?php echo $resultado["ID_PRODUCTO"]; ?>" />                           
                        <input name="precio" type="hidden" id="precio<?php echo $resultado["ID_PRODUCTO"]; ?>" value="<?php echo $resultado["PRECIO"]; ?>" />
                        <input name="titulo" type="hidden" id="titulo<?php echo $resultado["ID_PRODUCTO"]; ?>" value="<?php echo $resultado["N_PRODUCTO"]; ?>" />
                        <input name="cantidad" type="hidden" id="cantidad<?php echo $resultado["ID_PRODUCTO"]; ?>" value="1" class="pl-2" />


                        </div>
                        </div>
                    </div>
                </div>
              <?php } ?>
              <div class="Espacio"></div>
        </div>
    </div>
    
    <?php 
    include ("../cabeza/footer.html");
    ?>


</body></html>