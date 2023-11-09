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
      <a class="navbar-brand" href="../Admin/indiceAdmin.html"> <img src="../imagenes/logo2.png" class=" " alt="..."  height="70px" style="border-radius: 12px;"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="btn btn-outline-light " href="../Admin/indiceAdmin.html">Inicio <i class="fas fa-home"></i></a>
                  </li>
                  
              </ul>
          </div>
      </div>
  </nav>
   
      
 
     <br>
    <div class="container " >
        <h1 class="text-center"style=" background-color:black;color:white;">Agregar Empleado</h1>
    <form style=" margin-left:3em;margin-right:3em;" action="../CRUDADMIN/insertarEmpleado.php" method="POST" enctype="multipart/form-data" >
    
        <div class="mb-3"  style="margin-left:3em;margin-right:3em;">
            <label class="form-label"  style="margin-left:1em;font-size:20px;"  >DNI: </label>
            <input type="text" class="form-control" style="background-color:#EAE6CA;border-color:black;"  minlength="8"   maxlength="8"   name="dni" required >
            
        </div>   
      
        <div class="mb-3"  style="margin-left:3em;margin-right:3em;">
            <label class="form-label"  style="margin-left:1em;font-size:20px;"  >NOMBRE :</label>
            <input type="text" class="form-control" style="background-color:#EAE6CA;border-color:black;"  minlength="8"   maxlength="20"   name="nombreEm" required >
            
        </div>   
    
        <div class="mb-3" style="margin-left:3em;margin-right:3em;">
            <label class="form-label" style="margin-left:1em;font-size:20px;"  >USUARIO: </label>
            <input type="text" class="form-control" style="background-color:#EAE6CA;border-color:black;" maxlength="20"  minlength="4"  name="usuarioEm"   required>
            
        </div>
        <div class="mb-3" style="margin-left:3em;margin-right:3em;">
            <label class="form-label" style="margin-left:1em;font-size:20px;" >CONTRASEÑA: </label>
            <input type="password" class="form-control"  style="background-color:#EAE6CA;border-color:black;"   minlength="4"  maxlength="20"  name="contraseñaEm" required >
            
         </div>
       
        <div class="text-center" style="margin-bottom:1em;">
            <button type="submit" class="btn btn-danger"    >Agregar <i class="fas fa-plus"></i></button>
            <a href="../Admin/listarEmpleado.php" class="btn btn-dark">Volver <i class="fas fa-arrow-left"></i></a>
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
   background-color: #D53507;
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