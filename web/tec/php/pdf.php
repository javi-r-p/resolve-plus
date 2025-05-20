<?php
require("../../../fpdf/fpdf.php");
require("../../../etc/config.php");

if (mysqli_connect_error()) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener datos de la tabla de incidencias
$consulta = mysqli_query($bbdd, "SELECT id, estado, urgente, fechaApertura, fechaCierreEsp, fechaCierre FROM incidencias");

// Crear un nuevo documento PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, 'Informe de incidencias', 0, 1, 'C');
$pdf->SetFont('Arial','','12');
$pdf->Cell(190, 10, "Fecha: " . date('d-m-y'), 0, 1, 'C');
$pdf->Ln(10);

// Agregar encabezados de la tabla
$pdf->Cell(60, 10, "Ten en cuenta la fecha de creación del informe. Los datos pueden estar obsoletos.");
$pdf->Ln();
$pdf->Cell(60, 10, "Incidencias abiertas:", 0);
$pdf->Cell(60, 10, "", 0);
$pdf->Ln();

// Agregar datos desde la base de datos
while ($resultados = mysqli_fetch_array($consulta)) {
    $pdf->Cell(60, 10, $resultados['estado'], 1);
    $pdf->Cell(60, 10, $resultados['urgente'], 1);
    $pdf->Ln();
}
mysqli_free_result($consulta);

// Cerrar la conexión
mysqli_close($bbdd);

// Exportar el PDF
$pdf->Output(/*'D', 'Informe de incidencias.pdf'*/);
?>