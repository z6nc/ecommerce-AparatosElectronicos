<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>

<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
      <a class="navbar-brand" id="titulo" href="../Admin/indiceAdmin.html">ElectroTECHZONE - Empleado</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="../Admin/indexEmpleado.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin/listarProducto.php" style="padding-left: 22px;">Producto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Admin/listarProducto.php" style="padding-left: 22px;">Pedidos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../Admin/indexPrincipal.html">cerrar sesion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

        <?php
        include('../CRUDADMIN/ModificarStock.php');
        ?>
        <!-- Formulario de agregar Productos -->

        <div class="containerPrincipal" data-aos="zoom-out">
            <h1 class="text-center">Modificar productos</h1>

            <form action="../CRUDADMIN/ModificarStock.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idProducto" value="<?php echo $idProducto; ?>">
                <div class="mb-3">
                    <label class="form-label">Stock : </label>
                    <input type="text" class="form-control" maxlength="100" name="stockP" value=" <?php echo $stockP; ?> " required>

                </div>
                <div class="botones">
                    <button type="submit" class="btn btn-danger">Guardar</button>
                    <a href="../Admin/listarProducto.php" class="btn btn-dark">Volver</a>
                </div>

            </form>
        </div>

        <!-- Scrip para los datos precio y stock que solo sea numeros  -->



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



            .containerPrincipal {
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

            .containerPrincipal h1 {
                font-weight: 900;
                font-size: 33px;
                color: black;
                margin-top: 38px;

            }

            .containerPrincipal form {
                padding: 10px 73px;
                font-size: 17px;
                margin-bottom: 30px;
            }

            .containerPrincipal input {
                border: 1px solid #4B4B4B;
            }

            form .botones {
                display: grid;
                grid-template-columns: 50% 50%;
                gap: 9px;
            }

            .botones button {
                font-weight: 900;
                box-shadow: 1px 2px 10px black;
                letter-spacing: 2px;
            }

            .botones a {
                font-weight: 900;
                box-shadow: 1px 2px 10px black;
                letter-spacing: 2px;
            }

            form img {
                width: 200px;
            }
        </style>



        <!-- esto son script de boostrap  -->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

        <!-- Incluir Bootstrap JS y jQuery (opcional) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>