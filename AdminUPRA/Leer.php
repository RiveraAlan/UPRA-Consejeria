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

$Existe = "SELECT * FROM student WHERE stdnt_number = '{$res_num[0]}'";
$result_E = mysqli_query($conn, $Existe);
$resultCheck_E = mysqli_num_rows($result_E);  

echo $Existe;
    if($resultCheck_E > 0){
    $Clase = "SELECT *  FROM stdnt_record WHERE crse_code = '".$res_code[0]."' AND stdnt_number = '{$res_num[0]}'";
    $result_C = mysqli_query($conn, $Clase);
    $resultCheck_C = mysqli_num_rows($result_C);  
         if($resultCheck_C > 0){
         $row_C = mysqli_fetch_assoc($result_C);
         if($row_C['crse_grade'] == 'A'){
          $grade_old = 1;
         }elseif ($row_C['crse_grade'] == 'P') {
          $grade_old = 2;
        }elseif ($row_C['crse_grade'] == 'B') {
          $grade_old = 3;
         }elseif ($row_C['crse_grade'] == 'C') {
          $grade_old = 5;
        }elseif ($row_C['crse_grade'] == 'D') {
          $grade_old = 7;
        }elseif ($row_C['crse_grade'] == 'F') {
          $grade_old = 10;
        }elseif ($row_C['crse_grade'] == 'NP') {
          $grade_old = 9;
        }elseif ($row_C['crse_grade'] == 'IB') {
          $grade_old = 4;
        }elseif ($row_C['crse_grade'] == 'IC') {
          $grade_old = 6;
        }elseif ($row_C['crse_grade'] == 'ID') {
          $grade_old = 8;
        }elseif ($row_C['crse_grade'] == 'IF') {
          $grade_old = 11;
        }

        if($res_grade[0] == 'A'){
          $grade_new = 1;
         }elseif ($res_grade[0] == 'P') {
          $grade_new = 2;
        }elseif ($res_grade[0] == 'B') {
          $grade_new = 3;
         }elseif ($res_grade[0] == 'C') {
          $grade_new = 5;
        }elseif ($res_grade[0] == 'D') {
          $grade_new = 7;
        }elseif ($res_grade[0] == 'F') {
          $grade_new = 10;
        }elseif ($res_grade[0] == 'NP') {
          $grade_new = 9;
        }elseif ($res_grade[0] == 'IB') {
          $grade_new= 4;
        }elseif ($res_grade[0] == 'IC') {
          $grade_new= 6;
        }elseif ($res_grade[0] == 'ID') {
          $grade_new = 8;
        }elseif ($res_grade[0] == 'IF') {
          $grade_new = 11;
        }
        
         if ($row_C['crse_grade'] == NULL || $grade_new < $grade_old){
            $sql = " UPDATE stdnt_record SET crse_grade = '".$res_grade[0]."' WHERE crse_code = 'CCOM3001' AND stdnt_number = '".$res_num[0]."'" ;
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            echo $sql;
            echo "<br>";
          }    
         
    } else {
        $sql = "INSERT INTO stdnt_record (stdnt_number, crse_code, crse_grade, crse_status, semester_pass, crseR_status) 
        VALUES ('".$res_num[0]."','".$res_code[0]."', '".$res_grade[0]."', 1,'".$res_sem[0]."', 0)";
        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();
        echo $sql;
        echo "<br>";
    } 
        
      $Subir_Free = "SELECT crse_code FROM mandatory_courses WHERE crse_code = '".$res_code[0]."'
                    UNION 
                    SELECT crse_code FROM general_courses   WHERE crse_code = '".$res_code[0]."'
                    UNION 
                    SELECT crse_code FROM general_education_huma WHERE crse_code = '".$res_code[0]."'
                    UNION 
                    SELECT crse_code FROM general_education_ciso WHERE crse_code = '".$res_code[0]."'
                    UNION 
                    SELECT crse_code FROM departmental_courses WHERE crse_code = '".$res_code[0]."'
                    UNION 
                    SELECT crse_code FROM free_courses WHERE crse_code = '".$res_code[0]."'";
                        $result_Free = mysqli_query($conn, $Subir_Free);
                        $resultCheck_Free = mysqli_num_rows($result_Free); 
                        $row_Free = mysqli_fetch_assoc($result_Free);
        if ($row_Free == 0 ){
            $sql = "INSERT INTO free_courses(crse_code, crse_description, crse_credits) VALUES('".$res_code[0]."',NULL, NULL)";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            echo $sql;
            echo "<br>";
        }

}
}
//exit
// echo '<script type="text/javascript">
//        window.location.href="inicio.php";
//        </script>';
// echo "
// <form id='myForm' method='POST' action='inc/Cod_Recomendar.php'>
// <input type='hidden' name='stdnt_number' value='".$res_num[0]."'>
// </form>
// <script>
// document.getElementById('myForm').submit();
// </script>";
// exit();
?>