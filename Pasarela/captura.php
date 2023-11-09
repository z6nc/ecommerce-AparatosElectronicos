<?php
session_start();
include ("../config/conexion.php");

$json = file_get_contents('php://input');
$datos = json_decode($json, true);


if (is_array($datos)) {
    $id_transaccion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];

    $sql = $conexion->prepare("INSERT INTO compra (id_transaccion, fecha, status, email, id_cliente, total) VALUES (?,?,?,?,?,?)");
    $sql->bind_param("sssssd", $id_transaccion, $fecha_nueva, $status, $email, $id_cliente, $total);
    $sql->execute();
    $id = $conexion->insert_id;
    include 'invoice.php';
    include '../completado.php';
    include 'enviar_confirmacion.php';
}
?>
