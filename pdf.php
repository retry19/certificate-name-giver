<?php
require 'vendor/autoload.php';

use Fpdf\Fpdf;

$fontSize = $_POST['fsize'];
$yAxis = $_POST['y'];
$names = explode(PHP_EOL, $_POST['names']);
$imageName = $_FILES['certificate']['name'];
$image = $_FILES['certificate']['tmp_name'];

$imageExt = strtolower(explode('.', $imageName)[1]);

$imaegType = pathinfo($image, PATHINFO_EXTENSION);
$imageData = file_get_contents($image);
$imageBase64 = 'data:image/' . $imaegType . ';base64,' . base64_encode($imageData);

// var_dump(count($names));
// die;

$pdf = new FPDF('L');
for ($i = 0; $i < count($names); $i++) {
    $pdf->AddPage();
    $pdf->Image($imageBase64, 0, 0, 0, 210, 'jpg');
    $pdf->SetFont('Arial', '', $fontSize + 12);
    $pdf->SetXY(10, 210 * $yAxis / 100);
    $pdf->Cell(0, 0, $names[$i], 0, 0, 'C');
}
$pdf->Output('', 'reza.pdf');
