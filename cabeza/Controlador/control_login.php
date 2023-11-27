<?php
include("../../config/conexion.php");

?>
<?php
$errores = array();

if (!empty($_POST["btningresar"])) {
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

        $email = $_POST["EMAIL"];
        $contraseña = $_POST["PASSWORD"];

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }


        $stmt = $conexion->prepare("INSERT INTO cliente(DNI, NOMBRE, APELLIDO, DIRECCION, CELULAR, EMAIL, PASSWORD) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $email, $contraseña);


        $resultado = $stmt->execute();
     

        if ($resultado) {
            echo '<div class="success">Usuario registrado correctamente</div>';
            header("location: ../../paginas/inicio.php");
        } else {
            echo '<div class="alerta">Acceso denegado</div>';
        }


        $stmt->close();
        $conexion->close();
    }
}
?>