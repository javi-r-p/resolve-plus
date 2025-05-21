<?php
require("../../../tfpdf/tfpdf.php");
require("../../../etc/config.php");

if (mysqli_connect_error()) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$pdf = new tFPDF();
$pdf->AddPage();
$pdf->SetFont('Helvetica', 'B', 16);
$pdf->Cell(190, 10, "Informe de " . $_GET['tipo'], 0, 1, 'C');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(190, 10, "Fecha y hora: " . date('d\/m\/y - H:i:s') , 0, 1, 'C');
$pdf->Ln(10);
$pdf->Write(0, iconv("UTF-8", "windows-1252//TRANSLIT", "Tenga en cuenta la fecha de creación del informe. Los datos pueden estar obsoletos."));

if ($_GET['tipo'] == "Incidencias") {
    $consulta = mysqli_query($bbdd, "SELECT estado, urgente FROM incidencias");
    
    $pdf->Ln();
    $pdf->Cell(60, 10, "Incidencias abiertas:", 0);
    $pdf->Cell(60, 10, "", 0);
    $pdf->Ln();
        
    while ($resultados = mysqli_fetch_array($consulta)) {
        $pdf->Cell(60, 10, $resultados['estado'], 1);
        $pdf->Cell(60, 10, $resultados['urgente'], 1);
        $pdf->Ln();
    }
    mysqli_free_result($consulta);
}

// Cerrar la conexión
mysqli_close($bbdd);

// Exportar el PDF
$pdf->Output('D', "Informe de " . strtolower($_GET['tipo']) . " - " . date('d-m-Y - H.i.s') . ".pdf", TRUE);
?>