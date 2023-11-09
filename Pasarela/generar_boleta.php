<?php 

require 'fpdf.php';

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',15);

$pdf->Cell(100, 10, 'BOLETA DE VENTAS', 1, 0, 'C');
$pdf->Cell(15,7,utf8_decode($email),'',0,'C');

$pdf->Output();

?>