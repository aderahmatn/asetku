<?php
$pdf = new PDF_Code128('l', 'mm', array(20, 60));
// $pdf = new FPDF('l', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetTitle("Barcode Aset", 1);
$pdf->SetFont('Arial', '', 11);


$pdf->Image(base_url() . "assets/images/logogisakavertical.png", 1, 1, 6, 0, 'PNG');
$pdf->Code128(9, 1, $code, 49, 13);
$pdf->Text(17, 18, $code);


$pdf->Output();
