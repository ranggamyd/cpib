<?php

require('./fpdf.php');
$font = 'C:\xampp\htdocs\cpib\fpdf185\HELVETICA.TTF';
$image = imagecreatefromjpeg('template1.jpg');
$color = imagecolorallocate($image, 19, 21, 22);
imagettftext($image, 18, 0, 580, 475, $color, $font, '1001/CPIB-PN 37/III/2022');
imagettftext($image, 18, 0, 560, 743, $color, $font, 'PT COBABABA');
imagettftext($image, 18, 0, 560, 840, $color, $font, 'JL. CENTONG NO 79 CIREBON');
imagettftext($image, 18, 0, 560, 937, $color, $font, 'IKAN SEGAR, UDANG SEGAR');
imagettftext($image, 18, 0, 560, 1033, $color, $font, wordwrap('PENERIMAAN - PENAMPUNGAN - PENCUCIAN I - SORTASI - PENCUCIAN II - PENIMBANGAN - PENGEPAKAN - PENGANGKUTAN - PENGIRIMAN', 50));
imagettftext($image, 18, 0, 560, 1128, $color, $font, 'BAIK');
imagettftext($image, 18, 0, 560, 1224, $color, $font, '02 MARET 2022');
imagettftext($image, 18, 0, 390, 1580, $color, $font, '07 MARET 2026');
imagettftext($image, 18, 0, 910, 1580, $color, $font, 'CIREBON');
imagettftext($image, 18, 0, 910, 1674, $color, $font, '07 MARET 2026');
imagettftext($image, 20, 0, 890, 1823, $color, $font, 'R. RUDI BARMARA');
imagettftext($image, 18, 0, 1145, 1854, $color, $font, 'Cirebon');
imagejpeg($image, 'certificates/certificate.jpg');
$pdf = new FPDF('P', 'in', [8.27, 11.7]);
$pdf->AddPage();
$pdf->Image('certificates/certificate.jpg', 0, 0, 8.27, 11.7);
$title = 'Sertifikat CPIB';
$pdf->SetTitle($title);
$pdf->SetAuthor('Badan Karantina Ikan Pengendalian Mutu');
$pdf->Output('certificates/certificate.pdf', 'F');
imagedestroy($image);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img src="certificates/certificate.jpg" alt="">
</body>

</html>