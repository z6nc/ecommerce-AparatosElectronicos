<?php
if (!empty($_POST["registro"])) {
    if (!empty($_POST["DNI"]) or empty($_POST["NOMBRE"]) or empty($_POST["APELLIDO"]) or empty($_POST["DIRECCION"]) or empty($_POST["CELULAR"]) or empty($_POST["EMAIL"]) or empty($_POST["PASSWORD"])) {
        echo '<div class="alerta">No haz llenado alguno de los campos</div>';
    } else {
        $dni=$_POST["DNI"];
        $nombre=$_POST["NOMBRE"];
        $apellido=$_POST["APELLIDO"];
        $direccion=$_POST["DIRECCION"];
        $celular=$_POST["CELULAR"];
        $email=$_POST["EMAIL"];
        $contraseña=$_POST["PASSWORD"];
        $sql=$conexion ->query ("insert into cliente(DNI,NOMBRE,APELLIDO,DIRECCION,CELULAR,EMAIL,PASSWORD)values('$dni','$nombre','$apellido','$direccion','$celular','$email','$contraseña')");
        if ($sql==1) {
            echo '<div class="success">Usuario registrado correctamenet</div>';
        } else {
            echo '<div class="alerta">Error al registrarse</div>';
            echo
        }
        
    }
    
}
?>