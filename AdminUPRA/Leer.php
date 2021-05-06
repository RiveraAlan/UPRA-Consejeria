<?php
require 'inc/connection.php';

$array = file("Expediente.txt");
// print_r($array);

$class = array();

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
  $pattern = "/^[A-z]{5} [(] [[][1-90000][\]] [=][>] /i";
  $entrada_dos = preg_replace($pattern, NULL, $entrada);
  $pattern_dos = "/[;]/i";
  $res_grade = preg_replace($pattern_dos, NULL,$entrada_dos);
} else if (preg_match_all("/[;][A-Z]{1}[*].[;]/", $item, $result_grade)){
  $entrada = $result_grade[0];
  $pattern = "/^[A-z]{5} [(] [[][1-90000][\]] [=][>] /i";
  $entrada_dos = preg_replace($pattern, NULL, $entrada);
  $pattern_dos = "/[;]/i";
  $entrada_tres = preg_replace($pattern_dos, NULL,$entrada_dos);
  $pattern_tres = "/[*]/i";
  $res_grade = preg_replace($pattern_tres, NULL,$entrada_tres);
} else if (preg_match_all("/[;][A-Z]{2}[;]/", $item, $result_grade)){
  $entrada = $result_grade[0];
  $pattern = "/^[A-z]{5} [(] [[][1-90000][\]] [=][>] /i";
  $entrada_dos = preg_replace($pattern, NULL, $entrada);
  $pattern_dos = "/[;]/i";
  $res_grade = preg_replace($pattern_dos, NULL,$entrada_dos);
} 
    
$sql = "INSERT INTO stdnt_record (stdnt_number, crse_code, crse_grade, crse_status, semester_pass, crseR_status) 
VALUES ('".$res_num[0]."','".$res_code[0]."', '".$res_grade[0]."', 1,'".$res_sem[0]."', 0)";
// Prepare statement
$stmt = $conn->prepare($sql);
// execute the query
$stmt->execute();
}
//exit
echo '<script type="text/javascript">
       window.location.href="inicio.php";
       </script>';
exit();
?>