<?php
require('fpdf.php');
require('inc/connection.php');


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('photos/uprarecibo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,utf8_decode('Expediente Académico'),0,0,'C');
    // Line break
    $this->Ln(20);
    

    
    $this->Cell(40, 10, 'Curso', 1, 0, 'C', 0);
    $this->Cell(105, 10, utf8_decode('Descripción'), 1, 0, 'C', 0);
    $this->Cell(27, 10, utf8_decode('Créditos'), 1, 0, 'C', 0);
    $this->Cell(15, 10, 'Nota', 1, 1, 'C', 0);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,12,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
    
require 'inc/connection.php';
$consulta = "SELECT nombre_c, descripción_c, créditos_c, nota_c FROM expediente";
$resultado = $conn->query($consulta);




$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(40, 10, $row['nombre_c'], 1, 0, 'C', 0);
    $pdf->Cell(105, 10, utf8_decode($row['descripción_c']), 1, 0, 'C', 0);
    $pdf->Cell(27, 10, $row['créditos_c'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['nota_c'], 1, 1, 'C', 0);
}

$pdf->Output();
?>