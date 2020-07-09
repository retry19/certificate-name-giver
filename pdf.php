<?php
require 'vendor/autoload.php';

use Fpdf\Fpdf;



$pdf = new FPDF('L', 'mm', 'A4');
$pdf->setMargins(23, 44, 11.7);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Hello World!', 0, true, 'C');
$pdf->Output('', 'reza.pdf');
