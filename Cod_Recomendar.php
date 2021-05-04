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
$semestre = 2;
else 
$semestre = 1;
 
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
                      
$sql_C =  "SELECT crse_code, crse_CO
            FROM cohort INNER JOIN scheme USING (crse_code)
            WHERE crse_major = 'CC COMS BCN' AND crse_code = '$row_SA['crse_code']'";
                      $result_C = mysqli_query($conn, $sql_C);
                      $resultCheck_C = mysqli_num_rows($result_C);
                      $row_C = mysqli_fetch_assoc($result_C); 
      
      if ($row_SA['crse_year'] >= $est_year && $row_SA['crse_semester'] == $semestre){            
            }
                      
          else{          
          $sql_rec = "UPDATE stdnt_record SET crse_status = 3 WHERE stdnt_number= '$student_id' AND crse_code = '$row_SA['crse_code']' ";}
   
             
                    
                    
  }
  
                }

 

 $sql_PG =  "SELECT crse_grade
            FROM stdnt_record
            WHERE crse_code = 'PRE-RE' AND stdnt_number = '840-16-4235'";
                      $result_PG = mysqli_query($conn, $sql_PG);
                      $resultCheck_PG = mysqli_num_rows($result_PG);
                      $row_PG = mysqli_fetch_assoc($result_PG);

 $sql_CG =  "SELECT crse_grade
            FROM stdnt_record
            WHERE crse_code = 'PRE-CO' AND stdnt_number = '840-16-4235'";
                      $result_CG = mysqli_query($conn, $sql_CG);
                      $resultCheck_CG = mysqli_num_rows($result_CG);
                      $row_CG = mysqli_fetch_assoc($result_CG);





?>