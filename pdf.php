<?php
require('fpdf.php');
require('private/dbconnect.php');
session_start();
$id= $_SESSION['stdnt_number'];


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
    $this->Cell(30,10,utf8_decode('student_record Académico'),0,0,'C');
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
    

$consulta = "SELECT crse_name, crse_description, crse_credits, crse_grade, semester_pass
FROM student_record WHERE stdnt_number = $id";
$resultado = $conn->query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(40, 10, $row['crse_name'], 1, 0, 'C', 0);
    $pdf->Cell(105, 10, utf8_decode($row['crse_description']), 1, 0, 'C', 0);
    $pdf->Cell(27, 10, $row['crse_credits'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['crse_grade'], 1, 1, 'C', 0);
    $pdf->Cell(105, 10, utf8_decode($row['semester_pass']), 1, 0, 'C', 0);
}

$pdf->Output();
?>