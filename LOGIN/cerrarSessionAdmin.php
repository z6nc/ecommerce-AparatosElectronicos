<?php
// Inicia la sesión
session_start();

// Destruye la sesión
session_destroy();

// Redirige a la página de inicio de sesión o a la que prefieras
header('Location: ../LOGIN/loginAdmin.php');
?>