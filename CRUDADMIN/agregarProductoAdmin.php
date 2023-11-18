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
    <!-- Configuración del navbar user y lista -->
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
              <li><a class="dropdown-item" href="#" style="color: black;">1-proveedor</a></li>
              <li><a class="dropdown-item" href="#" style="color: black;">2-compra</a></li>
              <li><a class="dropdown-item" href="#" style="color: black;">3-pagos</a></li>
              <li><a class="dropdown-item" href="#" style="color: black;">4-factura</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin/indexPrincipal.html">cerrar sesion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
      
 <!-- Formulario de agregar Productos -->
    
    <div class="containerPrincipal">
        <h1 class="text-center">Agregar productos</h1>
        
    <form  action="../CRUDADMIN/insertarProductoAdmin.php" method="POST" enctype="multipart/form-data" >
    <label for="" >Factura Proveedor :</label>
    <select class="form-select mb-3 "    name="nombreFactura">
        <option     selected disabled>-- Selecciona el nombre del articulo comprado --</option>
        <?php
         include ("../config/conexion.php");
         $sql = $conexion-> query("SELECT*fROM factura_proveedor");
         while($resultado=$sql->fetch_assoc()){
            echo "<option value='".$resultado['ID_FACTURA_P']."'>".$resultado['PRODUCTO_P']."</option> ";
         }
        
        ?>
    </select>  

        <div class="mb-3">
            <label class="form-label"   >Nombre Producto : </label>
            <input type="text" class="form-control"  minLength="4" maxlength="25"  name="nombreP" required>
            
        </div>   
        <div class="mb-3" >
            <label class="form-label"   >Descripcion : </label>
            <input type="text" class="form-control"   minLength="4" maxlength="80" name="descripcionP" required>
            
        </div>
        <div class="mb-3" >
            <label class="form-label"   >Precio : </label>
            <input type="text" class="form-control"  minLength="2"  name="precioP" required>
            
        </div>
        <div class="mb-3" >
            <label class="form-label"  >Stock : </label>
            <input type="text" class="form-control"   maxlength="100"   name="stockP" required>
            
        </div> 
        <div class="mb-3" >
            <label class="form-label">Marca  : </label>
            <input type="text" class="form-control" name="marcaP"   minLength="2" maxlength="20" required>
            
        </div> 
        <div class="mb-3" >
            <label class="form-label">Pagina Principal  : </label>
            <input type="text" class="form-control" name="paginaPrin"   minLength="2" maxlength="2"   placeholder=" Si / No" required>
            
        </div> 
        <!-- en este apartado se agrega la imagen de los productos   -->
        <div class="mb-3">
            <label for="imagen" class="form-label" > Imagen del producto :</label>
            <input type="file" name="imagenP" id="imagen"    class="form-control" required>
        </div>
        <div class="mb-3" >
            <label for="imagen" class="form-label" > Imagen del producto 2 :</label>
            <input type="file" name="imagenP2" id="imagen"    class="form-control">
        </div>  
        <div class="mb-3" >
            <label for="imagen" class="form-label" > Imagen del producto 3:</label>
            <input type="file" name="imagenP3" id="imagen"    class="form-control">
        </div>
        <div class="mb-3" >
            <label for="imagen" class="form-label" > Imagen del producto 4 :</label>
            <input type="file" name="imagenP4" id="imagen"    class="form-control">
        </div>
     
    
        <div class="botones" >
            <button type="submit" class="btn btn-danger"    >Agregar <i class="fas fa-plus"></i></button>
            <a href="../Admin/listarProductoAdmin.php" class="btn btn-dark">Volver <i class="fas fa-arrow-left"></i></a>
        </div>   
      
    </form>
    </div>

<!-- Scrip para los datos precio y stock que solo sea numeros  -->
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const precioInput = document.querySelector('input[name="precioP"]');
        const stockInput = document.querySelector('input[name="stockP"]');

        precioInput.addEventListener('input', function () {
          // Reemplaza cualquier caracter que no sea un número o punto decimal por una cadena vacía
          this.value = this.value.replace(/[^0-9.]/g, '');
        });

        stockInput.addEventListener('input', function () {
          // Reemplaza cualquier caracter que no sea un número por una cadena vacía
          this.value = this.value.replace(/[^0-9]/g, '');
        });

        const formulario = document.querySelector('form');

        formulario.addEventListener('submit', function (event) {
          // Verifica si el valor del precio es un número válido (puede contener decimales)
          if (!/^\d+(\.\d+)?$/.test(precioInput.value)) {
            alert('El precio debe ser un número válido.');
            event.preventDefault(); // Evita que se envíe el formulario
          }

          // Verifica si el valor del stock es un número válido
          if (!/^\d+$/.test(stockInput.value)) {
            alert('El stock debe ser un número válido.');
            event.preventDefault(); // Evita que se envíe el formulario
          }
        });
      });
    </script>

    
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

    .collapse ul {
      padding-left: 90px;
      letter-spacing: 1px;
    }

    .collapse .dropdown-menu {
      color: black;
    }


    .containerPrincipal{
     display: flex;
     background-color: white;
     flex-direction: column;
      gap: 30px;
     align-items: center;
     justify-content: center;
     width: 45%;
     margin-top: 20px;
     margin-left: 30%;
     box-shadow: 1px 2px 10px black;
     margin-bottom: 30px;
    }

    .containerPrincipal h1{
        font-weight: 900;
        font-size: 33px;
        color: black;
        margin-top: 38px;
       
    }
    .containerPrincipal form{
        padding: 10px 73px;
        font-size: 17px;
        margin-bottom: 30px;
    }

    form .botones{
       display: grid;
       grid-template-columns: 50% 50%;
       gap: 9px;
    }
    .botones button{
       font-weight: 900;
       box-shadow: 1px 2px 10px black;
       letter-spacing: 2px;
    }
    .botones a{
        font-weight: 900;
       box-shadow: 1px 2px 10px black;
       letter-spacing: 2px;  
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