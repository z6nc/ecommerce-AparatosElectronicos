<?php
include("../../config/conexion.php");

?>
<?php
$errores = array();

if (!empty($_POST["registro"])) {
    if (empty($_POST["DNI"])) {
        $errores[] = 'El campo DNI no ha sido completado.';
    }

    if (empty($_POST["NOMBRE"])) {
        $errores[] = 'El campo NOMBRE no ha sido completado.';
    }

    if (empty($_POST["APELLIDO"])) {
        $errores[] = 'El campo APELLIDO no ha sido completado.';
    }

    if (empty($_POST["DIRECCION"])) {
        $errores[] = 'El campo DIRECCION no ha sido completado.';
    }

    if (empty($_POST["CELULAR"])) {
        $errores[] = 'El campo CELULAR no ha sido completado.';
    }

    if (empty($_POST["EMAIL"])) {
        $errores[] = 'El campo EMAIL no ha sido completado.';
    }

    if (empty($_POST["PASSWORD"])) {
        $errores[] = 'El campo PASSWORD no ha sido completado.';
    }



    if (!empty($errores)) {

        foreach ($errores as $error) {
            echo '<div class="alerta">' . $error . '</div>';
        }
    } else {

        $dni = $_POST["DNI"];
        $nombre = $_POST["NOMBRE"];
        $apellido = $_POST["APELLIDO"];
        $direccion = $_POST["DIRECCION"];
        $celular = $_POST["CELULAR"];
        $email = $_POST["EMAIL"];
        $contraseña = $_POST["PASSWORD"];

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }


        $stmt = $conexion->prepare("INSERT INTO cliente(DNI, NOMBRE, APELLIDO, DIRECCION, CELULAR, EMAIL, PASSWORD) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $dni, $nombre, $apellido, $direccion, $celular, $email, $contraseña);


        $resultado = $stmt->execute();
     

        if ($resultado) {
            echo '<div class="success">Usuario registrado correctamente</div>';
            header("location: ../../paginas/inicio.php");
        } else {
            echo '<div class="alerta">Error al registrarse en la base de datos</div>';
        }


        $stmt->close();
        $conexion->close();
    }
}
?>
