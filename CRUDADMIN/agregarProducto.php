<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Productos</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
                                   <!-- el diseño esta hecho con boostrap  --> 
                                 <!-- el styleLista.css es solo para el banner --> 
                                   
  <body style="background-color:#EAE6CA;">
    <!-- Configuración del navbar user y lista -->

    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
      <a class="navbar-brand" href="../Admin/indexEmpleado.html"> <img src="../imagenes/logo2.png" class=" " alt="..."  height="70px" style="border-radius: 12px;"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="btn btn-outline-light " href="../Admin/indexEmpleado.html">Inicio <i class="fas fa-home"></i></a>
                  </li>
                  <li class="nav-item">
                      <a class="btn btn-outline-light" style="margin-left: 10px;" href="../Admin/listarProducto.php">Producto <i class="fas fa-shopping-bag"></i> </a>
                  </li>
                  <li class="nav-item">
                    <a class="btn btn-outline-light" style="margin-left: 10px;" href="../Admin/indexPrincipal.html">cerrar session <i class="fas fa-shopping-bag"></i> </a>
                </li>
              </ul>
          </div>
      </div>
  </nav>
   
      
 <!-- Formulario de agregar Productos -->
     <br>
    <div class="container " >
        <h1 class="text-center"style=" background-color:black;color:white;">Agregar productos</h1>
    <form style=" margin-left:3em;margin-right:3em;" action="../CRUDADMIN/insertarProducto.php" method="POST" enctype="multipart/form-data" >
      
    <label for=""  style="margin-left:1em;font-size:20px;letter-spacing:2px;"  >Factura Proveedor :</label>
    <select class="form-select mb-3 " style="background-color:#EAE6CA;border-color:black;"   name="nombreFactura">
        <option     selected disabled>-- Selecciona el nombre del articulo comprado --</option>
        <?php
         include ("../config/conexion.php");
         $sql = $conexion-> query("SELECT*fROM factura_proveedor");
         while($resultado=$sql->fetch_assoc()){
            echo "<option value='".$resultado['ID_FACTURA_P']."'>".$resultado['PRODUCTO_P']."</option> ";
         }
        
        ?>
    </select>  

        <div class="mb-3"  style="margin-left:3em;margin-right:3em;">
            <label class="form-label"  style="margin-left:1em;font-size:20px;"  >Nombre Producto : </label>
            <input type="text" class="form-control" style="background-color:#EAE6CA;border-color:black;"   name="nombreP" minLength="2" maxlength="25" required>
            
        </div>   
        <div class="mb-3" style="margin-left:3em;margin-right:3em;">
            <label class="form-label" style="margin-left:1em;font-size:20px;"  >Descripcion : </label>
            <input type="text" class="form-control"  style="background-color:#EAE6CA;border-color:black;"  name="descripcionP"  minLength="4" maxlength="80" required>
            
        </div>
        <div class="mb-3" style="margin-left:3em;margin-right:3em;">
            <label class="form-label" style="margin-left:1em;font-size:20px;"  >Precio : </label>
            <input type="text" class="form-control" style="background-color:#EAE6CA;border-color:black;"   name="precioP"  minLength="1"   required>
            
        </div>
        <div class="mb-3" style="margin-left:3em;margin-right:3em;">
            <label class="form-label" style="margin-left:1em;font-size:20px;" >Stock : </label>
            <input type="text" class="form-control"  style="background-color:#EAE6CA;border-color:black;"  name="stockP" maxlength="10000" required >
            
        </div> 
        <div class="mb-3" style="margin-left:3em;margin-right:3em;">
            <label class="form-label"style="margin-left:1em;font-style:italic;font-size:20px;">Marca  : </label>
            <input type="text" class="form-control" name="marcaP"  style="background-color:#EAE6CA;border-color:black;" minLength="3" maxlength="20"  required>
            
        </div> 
        <div class="mb-3" style="margin-left:3em;margin-right:3em;">
            <label class="form-label"style="margin-left:1em;font-size:20px;">Pagina Principal  : </label>
            <input type="text" class="form-control" name="paginaPrin"  style="background-color:#EAE6CA;border-color:black;"   placeholder=" Si / No" minLength="2" maxlength="2"  required>
            
        </div> 
        <!-- en este apartado se agrega la imagen de los productos   -->
        <div class="mb-3" style="margin-left:3em;margin-right:3em;">
            <label for="imagen" class="form-label" style="margin-left:1em;font-size:20px;"> Imagen del producto :</label>
            <input type="file" name="imagenP" id="imagen"  style="background-color:#EAE6CA;border-color:black;"  class="form-control" required>
        </div>
        <div class="mb-3" style="margin-left:3em;margin-right:3em;">
            <label for="imagen" class="form-label" style="margin-left:1em;font-size:20px;"> Imagen del producto 2 :</label>
            <input type="file" name="imagenP2" id="imagen"  style="background-color:#EAE6CA;border-color:black;"  class="form-control">
        </div>  
        <div class="mb-3" style="margin-left:3em;margin-right:3em;">
            <label for="imagen" class="form-label" style="margin-left:1em;font-size:20px;"> Imagen del producto 3:</label>
            <input type="file" name="imagenP3" id="imagen"  style="background-color:#EAE6CA;border-color:black;"  class="form-control">
        </div>
        <div class="mb-3" style="margin-left:3em;margin-right:3em;">
            <label for="imagen" class="form-label" style="margin-left:1em;font-size:20px;"> Imagen del producto 4 :</label>
            <input type="file" name="imagenP4" id="imagen"  style="background-color:#EAE6CA;border-color:black;"  class="form-control">
        </div>
     
        <!-- este boton agregar sirve apra agregar  a la base de datos   -->
        <!-- este boton volver te redirecciona a la lista de productos , por ello dice
         listaproductos.php  -->
        <div class="text-center" style="margin-bottom:1em;">
            <button type="submit" class="btn btn-danger"    >Agregar <i class="fas fa-plus"></i></button>
            <a href="../Admin/listarProducto.php" class="btn btn-dark">Volver <i class="fas fa-arrow-left"></i></a>
        </div>   
      
    </form>
    </div>
    
   <style>
    .container{
        background-color:lightgray;
        border: 1px solid black;
        
    }
    .container h1{
     
      padding-top:10px;
      padding-bottom:12px;
    }
    body{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    nav {
   background-color: #0d47a1;
   }
   nav div {
   
   margin-left: 2em;
   font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
   }     
   nav .btn {
   border: none;
    }

    .container .mb-3{
        margin-left:"10px;"
    }
   </style>



     <!-- esto son script de boostrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>