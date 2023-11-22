<!DOCTYPE html> 
<html lang="en">
<head>
</head>
<body>
    <div class="container">
        <form action="../Controlador/control_regis_usuario.php" method="POST" class="formulario">
            <h2 class="titulo">REGISTRARSE</h2>
            <link rel="stylesheet" href="register.css">
            <?php
            include("../../config/conexion.php");

            ?>
            <div class="padre">
                <div class="DNI">
                    <label for="">Ingrese D.N.I.</label>
                    <input type="text" name="DNI">
                </div>
                <div class="NOMBRE">
                    <label for="">Ingrese Nombres</label>
                    <input type="text" name="NOMBRE">
                </div>
                <div class="APELLIDO">
                    <label for="">Ingrese Apellidos</label>
                    <input type="text" name="APELLIDO">
                </div>
                <div class="DIRECCION">
                    <label for="">Ingrese Dirección</label>
                    <input type="text" name="DIRECCION">
                </div>
                <div class="CELULAR">
                    <label for="">Ingrese Telefono</label>
                    <input type="text" name="CELULAR">
                </div>
                <div class="EMAIL">
                    <label for="">Ingrese Correo Electronico</label>
                    <input type="text" name="EMAIL">
                </div>
                <div class="PASSWORD">
                    <label for="">Ingrese Contraseña</label>
                    <input type="password" name="PASSWORD">
                </div>
                <div class= "cuenta">
                    <input class="boton" type="submit" value="Registrar" name="registro">
                    <a href="conexion.php"></a>
                </div>
            </div>
        </form>
    </div>
</body>



        