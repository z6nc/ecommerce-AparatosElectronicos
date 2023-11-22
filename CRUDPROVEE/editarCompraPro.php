<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Compras</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>


<body>
    <!-- Configuración del navbar user y lista -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" id="titulo" href="../Admin/indiceAdmin.html">ElectroTECHZONE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle" style="padding-left: 22px;" href="../Proveedor/listarProveedor.html" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Proveedor
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../Proveedor/listarProveedor.html" style="color: black; text-align:center;">Principal</a></li>
                            <li><a class="dropdown-item" href="../Proveedor/proveedor.php" style="color: black;text-align:center;">Proveedor</a></li>
                            <li><a class="dropdown-item" href="../Proveedor/listaCompraProve.php" style="color: black;text-align:center;">Compra</a></li>
                            <li><a class="dropdown-item" href="../Proveedor/pagos.php" style="color: black;text-align:center;">Pagos</a></li>
                            <li><a class="dropdown-item" href="../Proveedor/factura.php" style="color: black;text-align:center;">Factura</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/indexPrincipal.html">cerrar sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
        include('../CRUDPROVEE/ModificarCompraPro.php');
        ?>

    <div class="containerGeneral" data-aos="zoom-out">
        <h1 class="text-center">Editar Compra</h1>

        <form action="../CRUDPROVEE/ModificarCompraPro.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="idcompras" value="<?php echo $idcompras; ?>">

            <label for="">Nombre Admin :</label>
            <select class="form-select mb-3 " name="nombreAdmin">
                <?php
                // Obtener todas las categorías de la base de datos
                $sqlAdmin = "SELECT ID_ADMIN, NOMBRE FROM admin";
                $resultAdmin = $conexion->query($sqlAdmin);
                while ($rowAdmin = $resultAdmin->fetch_assoc()) {
                    $AdminID = $rowAdmin["ID_ADMIN"];
                    $AdminDescripcion = $rowAdmin["NOMBRE"];
                    $selectedAdmin = ($AdminID == $nombreAdmin) ? "selected" : "";
                    echo "<option value='$AdminID' $selectedAdmin>$AdminDescripcion</option>";
                }
                ?>
            </select>



            <label for="">Nombre Proveedor :</label>
          <select class="form-select mb-3 " name="proveedor">
            <?php
                // Obtener todas las categorías de la base de datos
                $sqlProve = "SELECT ID_PROVEEDOR, RAZON_SOCIAL FROM proveedor";
                $resultProve = $conexion->query($sqlProve);
                while ($rowProve = $resultProve->fetch_assoc()) {
                    $ProveID = $rowProve["ID_PROVEEDOR"];
                    $ProveDescripcion = $rowProve["RAZON_SOCIAL"];
                    $selectedProve = ($ProveID == $proveedor) ? "selected" : "";
                    echo "<option value='$ProveID' $selectedProve>$ProveDescripcion</option>";
                }
                ?>
            </select>

            <div class="mb-3">
                <label class="form-label">Producto : </label>
                <input type="text" class="form-control" minLength="4" maxlength="20" name="productoP" value="<?php echo $productoP; ?>" required>

            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion : </label>
                <input type="text" class="form-control" minLength="4" maxlength="80" name="descripcionP" value="<?php echo $descripcionP; ?>" required>

            </div>
            <div class="mb-3">
                <label class="form-label">Precio : </label>
                <input type="text" class="form-control" minLength="1" name="precioP" value="<?php echo $precioP; ?>" required>

            </div>

            <div class="Botones">
                <button type="submit" class="btn btn-danger">Guardar <i class="fas fa-plus"></i></button>
                <a href="../Proveedor/listaCompraProve.php" class="btn btn-dark">Volver <i class="fas fa-arrow-left"></i></a>
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

        .containerGeneral {
            display: flex;
            background-color: white;
            flex-direction: column;
            gap: 10px;
            justify-content: center;
            width: 45%;
            margin-top: 20px;
            margin-left: 30%;
            box-shadow: 1px 2px 10px black;
            margin-bottom: 30px;
        }

        .containerGeneral h1 {
            font-weight: 900;
            font-size: 33px;
            color: black;
            padding-top: 38px;
        }

        .containerGeneral form {
            padding: 1px 73px;
            font-size: 17px;
            margin-bottom: 30px;
        }

        .containerGeneral input {
            border: 1px solid #4B4B4B;
        }

        .containerGeneral select {
            border: 1px solid #4B4B4B;
        }

        form .Botones {
            display: grid;
            grid-template-columns: 50% 50%;
            gap: 9px;
        }

        .Botones button {
            font-weight: 900;
            box-shadow: 1px 2px 10px black;
            letter-spacing: 2px;
        }

        .Botones a {
            font-weight: 900;
            box-shadow: 1px 2px 10px black;
            letter-spacing: 2px;
        }
    </style>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- Incluir Bootstrap JS y jQuery (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>