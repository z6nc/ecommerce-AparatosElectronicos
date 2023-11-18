<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Productos</title>
    <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> 
   
</head>    
  <body >
  
  <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
      <a class="navbar-brand" id="titulo" href="../Admin/indiceAdmin.html">ElectroTECHZONE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="../Admin/indiceAdmin.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin/listarProductoAdmin.php" style="padding-left: 22px;">Producto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin/listarEmpleado.php" style="padding-left: 22px;">Empleado</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="padding-left: 22px;" href="../Proveedor/listarProveedor.html"
              id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Proveedor
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
             <li><a class="dropdown-item" href="../Proveedor/listarProveedor.html" style="color: black; text-align:center;">Principal</a></li>
              <li><a class="dropdown-item" href="#" style="color: black;text-align:center;">Proveedor</a></li>
              <li><a class="dropdown-item" href="#" style="color: black;text-align:center;">Compra</a></li>
              <li><a class="dropdown-item" href="#" style="color: black;text-align:center;">Pagos</a></li>
              <li><a class="dropdown-item" href="#" style="color: black;text-align:center;">Factura</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin/indexPrincipal.html">cerrar sesion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
   
      
 
     <br>
    <div class="containerGeneral" data-aos="zoom-out" >
        <h1 class="text-center" >Agregar Empleado</h1>
        <hr>
       <form  action="../CRUDADMIN/insertarEmpleado.php" method="POST" enctype="multipart/form-data" >
    
        <div class="mb-3" >
            <label class="form-label"  >DNI: </label>
            <input type="text" class="form-control"   minlength="8"   maxlength="8"   name="dni" required >
            
        </div>   
      
        <div class="mb-3" >
            <label class="form-label"  >NOMBRE :</label>
            <input type="text" class="form-control"   minlength="8"   maxlength="20"   name="nombreEm" required >
            
        </div>   
    
        <div class="mb-3">
            <label class="form-label " >USUARIO: </label>
            <input type="text" class="form-control"  maxlength="20"  minlength="4"  name="usuarioEm"   required>
            
        </div>
        <div class="mb-3">
            <label class="form-label ">CONTRASEÑA: </label>
            <input type="password" class="form-control"     minlength="4"  maxlength="20"  name="contraseñaEm" required >
            
         </div>
       
        <div class="botones" >
            <button type="submit" class="btn btn-danger"    >Agregar <i class="fas fa-plus"></i></button>
            <a href="../Admin/listarEmpleado.php" class="btn btn-dark">Volver <i class="fas fa-arrow-left"></i></a>
        </div>   
      
    </form>
    </div>
    
   <style>
      body {
      font-family: 'Montserrat', sans-serif;
      margin: 0;
      box-sizing: border-box;
      background-color: whitesmoke;
      padding: 0;
    }

    nav {
      background-color: #dc582a;

    }

    .container-fluid a {
      color: white;
      font-size: 17px;
      padding: 10px 9px;
      font-weight: 300;

    }

    .container-fluid #titulo {
      font-weight: bold;
      font-size: 23px;
      padding-right: 55px;
    }

    .collapse .navbar-nav {
      padding-left: 90px;
      letter-spacing: 1px;
    }

    .collapse .dropdown-menu {
      color: black;
    }

    .containerGeneral{
        display: flex;
        justify-content: center;
        flex-direction: column;
        background-color: white;
        padding-top: 10px;
        padding-bottom: 30px;
        width: 35%;
        margin-left: 35%;
        margin-bottom: 20px;
        box-shadow: 1px 2px 10px black;
    }
    .containerGeneral h1{
        font-weight: 900;
        font-size: 32px;
        padding-top: 14px;
        letter-spacing: 1px;
    }
    .containerGeneral form{
       
        padding: 0px 60px;
    }
    .containerGeneral label{
      color: #4B4B4B;
      letter-spacing: 1px;
    }
    .containerGeneral input{
        border: 1px solid  #4B4B4B ;
    }

    .containerGeneral .botones{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 9px;
    }
    .botones button {
        font-weight: 900;
        letter-spacing: 1px;
    }
    .botones a{
        font-weight: 900;
        letter-spacing: 1px;
    }
   </style>



     <!-- esto son script de boostrap  -->
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

    <!-- Incluir Bootstrap JS y jQuery (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


</body>
</html>