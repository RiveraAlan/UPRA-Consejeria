<?php
require 'inc/connection.php';

$array = file("Expediente.txt");
// print_r($array);
    
$class = array();
    $Existe = "SELECT * FROM student WHERE stdnt_number = '840-16-4235'";
    $result_E = mysqli_query($conn, $Existe);
    $resultCheck_E = mysqli_num_rows($result_E);  

foreach ($array as $item){
// class code
preg_match_all("/[A-Z]{4}[A-Z0-9]{4}/", $item, $result_code);

$entrada = $result_code[0];
$pattern = "/[A-z]{5} [(] [[][1-90000][\]] [=][>] /i";
$entrada_dos = preg_replace($pattern, NULL, $entrada);
$pattern_dos = "/ [)]/i";
$res_code = preg_replace($pattern_dos, NULL,$entrada_dos);

// num de estudiante 
preg_match_all("/[0-9]{3}[-]{1}[0-9]{2}[-]{1}[0-9]{4}/", $item, $result_num);

$entrada = $result_num[0];
$pattern = "/[A-z]{5} [(] [[][1-90000][\]] [=][>] /i";
$entrada_dos = preg_replace($pattern, NULL, $entrada);
$pattern_dos = "/ [)]/i";
$res_num = preg_replace($pattern_dos, NULL,$entrada_dos);

// class semester
preg_match_all("/^[A-Z]{1}[0-9]{2}[;]/", $item, $result_sem);

$entrada = $result_sem[0];
$pattern = "/^[A-z]{5} [(] [[][1-90000][\]] [=][>] /i";
$entrada_dos = preg_replace($pattern, NULL, $entrada);
$pattern_dos = "/[;]/i";
$res_sem = preg_replace($pattern_dos, NULL,$entrada_dos);

// class grade
if (preg_match_all("/[;][A-Z].[;]{1}/", $item, $result_grade)){
  $entrada = $result_grade[0];
  // $pattern = "/^[A-z]{5} [(] [[][1-90000][\]] [=][>] /i";
  // $entrada_dos = preg_replace($pattern, NULL, $entrada);
  // echo $entrada_dos[0];
  $pattern_dos = "/.[;]/i";
  $entrada_dos = preg_replace($pattern_dos, NULL,$entrada);
  $pattern_tres = "/[;]/";
  $res_grade = preg_replace($pattern_tres, NULL,$entrada_dos);
} else if (preg_match_all("/[;][A-Z]{1}[*].[;]/", $item, $result_grade)){
  $entrada = $result_grade[0];
  $pattern = "/^[A-z]{5} [(] [[][1-90000][\]] [=][>] /i";
  $entrada_dos = preg_replace($pattern, NULL, $entrada);
  $pattern_dos = "/.[;]/i";
  $entrada_tres = preg_replace($pattern_dos, NULL,$entrada_dos);
  $pattern_tres = "/[*]/i";
  $entrada_cuatro = preg_replace($pattern_tres, NULL,$entrada_tres);
  $pattern_cuatro = "/[;]/";
  $res_grade = preg_replace($pattern_cuatro, NULL,$entrada_cuatro);
} else if (preg_match_all("/[;][A-Z]{2}.[;]/", $item, $result_grade)){
  $entrada = $result_grade[0];
  $pattern = "/^[A-z]{5} [(] [[][1-90000][\]] [=][>] /i";
  $entrada_dos = preg_replace($pattern, NULL, $entrada);
  $pattern_dos = "/.[;]/i";
  $entrada_dos = preg_replace($pattern_dos, NULL,$entrada);
  $pattern_tres = "/[;]/";
  $res_grade = preg_replace($pattern_tres, NULL,$entrada_dos);
} 
    
    if($resultCheck_E > 0){
    $Clase = "SELECT *  FROM stdnt_record WHERE crse_code= '".$res_code[0]."' AND stdnt_number = '.$res_num[0]."
    $result_C = mysqli_query($conn, $Clase);
    $resultCheck_C = mysqli_num_rows($result_C);  
         if($resultCheck_C > 0){
         $row_C = mysqli_fetch_assoc($result_C);
             if ($row_C['crse_grade'] != NULL){}
             
         }
    }
    
    else {
        
        $sql = "INSERT INTO stdnt_record (stdnt_number, crse_code, crse_grade, crse_status, semester_pass, crseR_status) 
        VALUES ('".$res_num[0]."','".$res_code[0]."', '".$res_grade[0]."', 1,'".$res_sem[0]."', 0)";
    } 

// Prepare statement
$stmt = $conn->prepare($sql);
// execute the query
$stmt->execute();
echo $sql;
echo "<br>";
}
//exit
// echo '<script type="text/javascript">
//        window.location.href="inicio.php";
//        </script>';
echo "
<form id='myForm' method='POST' action='inc/Cod_Recomendar.php'>
<input type='hidden' name='stdnt_number' value='".$res_num[0]."'>
</form>
<script>
document.getElementById('myForm').submit();
</script>";
exit();
?>