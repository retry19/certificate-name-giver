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

$zipName = 'certificate-by-re_try.zip';
$zipTmp = 'tmp/' . $zipName;

$zip = new ZipArchive();

if ($zip->open($zipTmp, ZipArchive::OVERWRITE | ZipArchive::CREATE)) {
    foreach ($names as $name) {
        $pdf = new FPDF('L');
        $pdf->AddPage();
        $pdf->Image($imageBase64, 0, 0, 0, 210, 'jpg');
        $pdf->SetFont('Arial', '', $fontSize + 12);
        $pdf->SetXY(10, 210 * $yAxis / 100);
        $pdf->Cell(0, 0, $name, 0, 0, 'C');
        $content = $pdf->Output('F', 'tmp/' . $name . '.pdf');
        $zip->addFile('tmp/' . $name . '.pdf', $name . '.pdf');
    }
} else {
    echo "cant open!!";
    exit;
}

if ($zip->close() === false) {
    exit("Error creating ZIP file");
}

if (file_exists($zipTmp)) {
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename=' . $zipName);
    header('Content-length: ' . filesize($zipTmp));
    header('Pragma: no-cache');
    header('Expires: 0');
    readfile($zipTmp);
} else {
    exit('Could not find zip file to download!');
}
