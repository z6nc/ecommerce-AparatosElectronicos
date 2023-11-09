<?php
// biblioteca PHPMailer
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// nueva instancia de PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Configurar servidor de correo saliente (SMTP)
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Reemplaza con la dirección del servidor SMTP
$mail->Port = 587; // Puerto SMTP (por defecto es 587)
$mail->SMTPAuth = true;
$mail->Username = 'fap12241@gmail.com'; // dirección de correo
$mail->Password = 'qlbajsjhiscwowyr'; // contraseña de correo
$mail->SMTPSecure = 'tls'; // TLS o SSL, dependiendo de la configuración del servidor

// Configurar el remitente y destinatario
$mail->setFrom('fap12241@gmail.com', 'NovoTech'); // dirección de correo y nombre remitente
$mail->addAddress($email); // dirección de correo y nombre del destinatario

// Configurar el contenido del correo
$mail->isHTML(true);
$mail->Subject = 'Se ha realizado con exito su pedido - NovoTech'; // Asunto del correo

$cuerpo = '<h4>"¡Gracias por comprar con NovoTech!</h4>';
$cuerpo .= '<p> A continuacion le adjuntamos los datos de su compra.';
$cuerpo .= '<p> ID de la compra: <b>' . $id_transaccion . '</b></p>';
$cuerpo .= '<p> Fecha de la compra: <b>' . $fecha . '</b></p>';
$cuerpo .= '<p> Estado del pago: <b>' . $status . '</b></p>';
$cuerpo .= '<p> ID del cliente: <b>' . $id_cliente . '</b></p>';
$cuerpo .= '<p> Total del monto a pagar: S/. <b>' . $total . '</b></p>';

$mail->Body = utf8_decode($cuerpo);
$mail->AltBody = 'Adjuntamos los detalles de su compra.';

$mail->setLanguage('es', '/PHPMailer/language/phpmailer.lang-es.php');


// Enviar el correo
if ($mail->send()) {
  echo 'Correo enviado correctamente';
} else {
  echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}

?>

