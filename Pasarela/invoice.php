<?php
include("../config/conexion.php");

# Incluyendo librerias necesarias #
require "./code128.php";

$pdf = new PDF_Code128('P','mm','Letter');
$pdf->SetMargins(17,17,17);
$pdf->AddPage();

# Logo de la empresa formato png #
$pdf->Image('./img/logo.png',165,12,35,35,'PNG');

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial','B',16);
$pdf->SetTextColor(32,100,210);
$pdf->Cell(150,10,utf8_decode(strtoupper("ELECTROTCHZONE")),0,0,'L');

$pdf->Ln(9);

$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(39,39,51);
$pdf->Cell(150,9,utf8_decode("RUC: 10733791697"),0,0,'L');

$pdf->Ln(5);

$pdf->Cell(150,9,utf8_decode("Direccion Ctra. Panamericana S km 16, Villa EL Salvador 15842"),0,0,'L');

$pdf->Ln(5);

$pdf->Cell(150,9,utf8_decode("Teléfono: 963810360"),0,0,'L');

$pdf->Ln(5);

$pdf->Cell(150,9,utf8_decode("Email: fap12241@gmail.com"),0,0,'L');

$pdf->Ln(10);

$pdf->SetFont('Arial','',10);
$pdf->Cell(30,7,utf8_decode("Fecha de emisión:"),0,0);
$pdf->SetTextColor(97,97,97);
$pdf->Cell(116,7,utf8_decode(date("d/m/Y", strtotime("13-09-2022"))." ".date("h:s A")),0,0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(39,39,51);
$pdf->Cell(35,7,utf8_decode(strtoupper("Factura Nro.")),0,0,'C');

$pdf->Ln(7);

$pdf->SetFont('Arial','',10);
$pdf->Cell(12,7,utf8_decode("Cajero:"),0,0,'L');
$pdf->SetTextColor(97,97,97);
$pdf->Cell(134,7,utf8_decode("ELECTROTCHZONE Payments"),0,0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(97,97,97);
$pdf->Cell(35,7,utf8_decode(strtoupper("1")),0,0,'C');

$pdf->Ln(10);

$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(39,39,51);
$pdf->Cell(13,7,utf8_decode("Cliente:"),0,0);
$pdf->SetTextColor(97,97,97);

// Consulta SQL para obtener la última entrada
$consulta = "SELECT * FROM compra ORDER BY fecha DESC LIMIT 1";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
  // Obtener los datos de la última entrada
  $fila = $resultado->fetch_assoc();
  $id = $fila['id'];
  $id_transaccion = $fila['id_transaccion'];
  $status = $fila['status'];
  $email = $fila['email'];
  $total = $fila['total'];

  // Mostrar los datos en el PDF
  $pdf->Cell(60,7,utf8_decode($id),0,0,'L');
  $pdf->SetTextColor(39,39,51);
  $pdf->Cell(8,7,utf8_decode("Pago: "),0,0,'L');
  $pdf->SetTextColor(98,98,98);
  $pdf->Cell(60,7,utf8_decode($id_transaccion),0,0,'L');
  $pdf->SetTextColor(39,39,51);
  $pdf->Cell(7,7,utf8_decode("Tel:"),0,0,'L');
  $pdf->SetTextColor(97,97,97);
  $pdf->Cell(35,7,utf8_decode("964820350"),0,0);
  $pdf->SetTextColor(39,39,51);
} else {
  echo "No se encontraron entradas en la tabla 'compra'.";
}

// Cerrar la conexión a la base de datos
$conexion->close();

$pdf->Ln(7);

$pdf->SetTextColor(39,39,51);
$pdf->Cell(6,7,utf8_decode("Dir:"),0,0);
$pdf->SetTextColor(97,97,97);
$pdf->Cell(109,7,utf8_decode("Peru, Lima, UTP"),0,0);

$pdf->Ln(9);

# Tabla de productos #
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(23,83,201);
$pdf->SetDrawColor(23,83,201);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(90,8,utf8_decode("Descripción"),1,0,'C',true);
$pdf->Cell(15,8,utf8_decode("Cant."),1,0,'C',true);
$pdf->Cell(25,8,utf8_decode("Precio"),1,0,'C',true);
$pdf->Cell(19,8,utf8_decode("Desc."),1,0,'C',true);
$pdf->Cell(32,8,utf8_decode("Subtotal"),1,0,'C',true);

$pdf->Ln(8);

$pdf->SetTextColor(39,39,51);

/*----------  Detalles de la tabla  ----------*/
$pdf->Cell(90,7,utf8_decode("Productos Electronicos varios"),'L',0,'C');
$pdf->Cell(15,7,utf8_decode("5"),'L',0,'C');
$pdf->Cell(25,7,utf8_decode("S/. $total"),'L',0,'C');
$pdf->Cell(19,7,utf8_decode("S/. 0.00 PEN"),'L',0,'C');
$pdf->Cell(32,7,utf8_decode("s/. $total"),'LR',0,'C');
$pdf->Ln(7);
/*----------  Fin Detalles de la tabla  ----------*/

$pdf->SetFont('Arial','B',9);

# Impuestos & totales #
$pdf->Cell(100,7,utf8_decode(''),'T',0,'C');
$pdf->Cell(15,7,utf8_decode(''),'T',0,'C');
$pdf->Cell(32,7,utf8_decode("SUBTOTAL"),'T',0,'C');
$pdf->Cell(34,7,utf8_decode("S/. $total"),'T',0,'C');

$pdf->Ln(7);

$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
$pdf->Cell(32,7,utf8_decode("IVA (13%)"),'',0,'C');
$pdf->Cell(34,7,utf8_decode("+ S/. 0.00 PEN"),'',0,'C');

$pdf->Ln(7);

$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
$pdf->Cell(15,7,utf8_decode(''),'',0,'C');


$pdf->Cell(32,7,utf8_decode("TOTAL A PAGAR"),'T',0,'C');
$pdf->Cell(34,7,utf8_decode("S/. $total"),'T',0,'C');

$pdf->Ln(7);

$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
$pdf->Cell(32,7,utf8_decode("ESTADO"),'',0,'C');
$pdf->Cell(34,7,utf8_decode("$status"),'',0,'C');

$pdf->Ln(7);

$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
$pdf->Cell(32,7,utf8_decode("CAMBIO"),'',0,'C');
$pdf->Cell(34,7,utf8_decode("S/. 0.00 PEN"),'',0,'C');

$pdf->Ln(7);

$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
$pdf->Cell(32,7,utf8_decode("USTED AHORRA"),'',0,'C');
$pdf->Cell(34,7,utf8_decode("S/. 0.00 PEN"),'',0,'C');

$pdf->Ln(12);

$pdf->SetFont('Arial','',9);

$pdf->SetTextColor(39,39,51);
$pdf->MultiCell(0,9,utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"),0,'C',false);

$pdf->Ln(9);

# Codigo de barras #
$pdf->SetFillColor(39,39,51);
$pdf->SetDrawColor(23,83,201);
$pdf->Code128(72,$pdf->GetY(),"COD000001V0001",70,20);
$pdf->SetXY(12,$pdf->GetY()+21);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);

# Nombre del archivo PDF #
$pdf->Output("I","Factura_Nro_1.pdf",true);

?>  
