<?php
require('fpdf.php');
require('private/dbconnect.php');
session_start();
$id= $_SESSION['stdnt_number'];
$sql = "SELECT stdnt_name,stdnt_lastname1,stdnt_lastname2 FROM student WHERE stdnt_number = '840-16-4235'";
                 $result = mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);
                 $nombre_est = mysqli_fetch_assoc($result);

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
    $this->Cell(30,10,utf8_decode('Expediente Académico de: '),0,0,'C');
    // Line break
    $this->Ln(8);
    $this->Cell(80);
    $this->Cell(30,10,utf8_decode("$nombre_est['stdnt_name']"),0,0,'C');
    $this->Ln(10);
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


$consulta = "SELECT crse_label, crse_name, crse_description, crse_credits, crse_grade
                                    FROM student_record
                                    INNER JOIN mandatory_courses USING (crse_label)
                                    WHERE student_record.stdnt_number = '840-16-4235'
                                    UNION(SELECT crse_label, crse_name, crse_description, crse_credits, crse_grade
                                    FROM student_record
                                    INNER JOIN general_courses USING (crse_label)
                                    WHERE student_record.stdnt_number = '840-16-4235')
                                    UNION(SELECT crse_label, crse_name, crse_description, crse_credits, crse_grade
                                    FROM student_record
                                    INNER JOIN departmental_courses USING (crse_label)
                                    WHERE student_record.stdnt_number = '840-16-4235')
                                    UNION(SELECT crse_label, crse_name, crse_description, crse_credits, crse_grade
                                    FROM student_record
                                    INNER JOIN free_courses USING (crse_label)
                                    WHERE student_record.stdnt_number = '840-16-4235')
                                    ORDER BY crse_label";

$confirmar = "SELECT crse_label, crse_name, crse_description, crse_credits, crse_grade
                                    FROM student_record
                                    INNER JOIN mandatory_courses USING (crse_label)
                                    WHERE student_record.stdnt_number = '840-16-4235' AND (student_record.crse_status = 4)
                                    UNION(SELECT crse_label, crse_name, crse_description, crse_credits, crse_grade
                                    FROM student_record
                                    INNER JOIN general_courses USING (crse_label)
                                    WHERE student_record.stdnt_number = '840-16-4235' AND (student_record.crse_status = 4))
                                    UNION(SELECT crse_label, crse_name, crse_description, crse_credits, crse_grade
                                    FROM student_record
                                    INNER JOIN departmental_courses USING (crse_label)
                                    WHERE student_record.stdnt_number = '840-16-4235' AND (student_record.crse_status = 4))
                                    UNION(SELECT crse_label, crse_name, crse_description, crse_credits, crse_grade
                                    FROM student_record
                                    INNER JOIN free_courses USING (crse_label)
                                    WHERE student_record.stdnt_number = '840-16-4235' AND (student_record.crse_status = 4))
                                    ORDER BY crse_label";



$resultado1 = $conn->query($confirmar);
$resultado2 = $conn->query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado1->fetch_assoc()){
    $pdf->Cell(40, 10, $row['crse_name'], 3, 0, 'C', 0);
    $pdf->Cell(105, 10, utf8_decode($row['crse_description']), 3, 0, 'C', 0);
    $pdf->Cell(27, 10, $row['crse_credits'], 3, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['crse_grade'], 3, 1, 'C', 0);
}

while($row = $resultado2->fetch_assoc()){
    $pdf->Cell(40, 10, $row['crse_name'], 1, 0, 'C', 0);
    $pdf->Cell(105, 10, utf8_decode($row['crse_description']), 1, 0, 'C', 0);
    $pdf->Cell(27, 10, $row['crse_credits'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['crse_grade'], 1, 1, 'C', 0);
}

$pdf->Output();
?>