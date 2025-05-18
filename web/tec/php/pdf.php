<?php
require("../../../fpdf/fpdf.php");

//echo "<title>" . $_GET['nombre'] . "</title>\n";

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Hello, World!');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'This is an FPDF example.');
    $pdf->Output();
?>