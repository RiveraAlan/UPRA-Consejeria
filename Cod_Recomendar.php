<?php
session_start();
include("inc/connection.php");

if(isset($_GET["stdnt_number"])){
  $student_id = $_GET['stdnt_number'];
} else {
  $student_id = $_SESSION['stdnt_number'];
}
$advisor_id = $_SESSION['adv_email'];

if(!isset($student_id)){
  header("Location: index.php");
    exit();
}

$query = "SELECT * FROM stdnt_record WHERE  stdnt_number = '$_SESSION[stdnt_number]'";
$result = mysqli_query($conn, $query);
$resultCheck = mysqli_num_rows($result);
$isRecordPresentInDB = FALSE;

if($resultCheck > 0)
  $isRecordPresentInDB = TRUE;

    $modal = 'document.getElementById("id03").style.display="block"';
?>

<?php

$mes = date("m");
if ($mes<7)
$semestre = 1;
else 
$semestre = 2;
 
$sql = "SELECT stdnt_number
        FROM student
        WHERE stdnt_number = '$student_id'";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);
                  $row = mysqli_fetch_assoc($result);
$est_year = date('Y')-(substr($row['stdnt_number'], 4,2) + 1999);

$sql_SA =  "SELECT crse_code, crse_year, crse_semester 
            FROM cohort
            WHERE crse_major = 'CC COMS BCN'";
                      $result_SA = mysqli_query($conn, $sql_SA);
                      $resultCheck_SA = mysqli_num_rows($result_SA);

  if($resultCheck_SA > 0){
  while($row_SA = mysqli_fetch_assoc($result_SA)){
$sql_P =  "SELECT crse_code, crse_PRE
            FROM cohort INNER JOIN scheme USING (crse_code)
            WHERE crse_major = 'CC COMS BCN' AND crse_code = '$row_SA['crse_code']'";
                      $result_P = mysqli_query($conn, $sql_P);
                      $resultCheck_P = mysqli_num_rows($result_P); 
                      
     $Pre_disp = 0;
     $Cant_Nota = 0;
      if ($row_SA['crse_year'] >= $est_year && $row_SA['crse_semester'] == $semestre){            
                    if($resultCheck_P > 0){
                    while($row_P = mysqli_fetch_assoc($result_P)){
                    $Pre_disp++;
                    $sql_PG =  "SELECT crse_code, crse_grade
                    FROM stdnt_record
                    WHERE crse_code = '$row_P['crse_code']' AND stdnt_number = '$student_id'";
                      $result_PG = mysqli_query($conn, $sql_PG);
                      $resultCheck_PG = mysqli_num_rows($result_PG);
                      $row_PG = mysqli_fetch_assoc($result_PG);
                        if($resultCheck_PG > 0){
                        if ($row_PG['crse_grade']=='A' || $row_PG['crse_grade']=='B' || $row_PG['crse_grade']=='C' || $row_PG['crse_grade']=='P')
                            $Cant_Nota++;} } }  }
                    if ($Pre_disp ==  $Cant_Nota)  
                    $sql_rec = "UPDATE stdnt_record SET crse_status = 3 WHERE stdnt_number= '$student_id' AND crse_code = '$row_SA['crse_code']' "; }       
          

 ?>