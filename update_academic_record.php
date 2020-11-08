<?php
include_once 'private/dbconnect.php';
session_start();
$myfile = fopen("expediente_formatted.txt", "r") or die("Unable to open file!");

$coursesForNextSemester = array();
$coursesTakenThisSemester = array();
$is2ndSemesterReached = FALSE;
$is1stSemesterReached = FALSE;

// =============== SEMESTER DOES NOT APPEAR IN COURSES ====================

while(!feof($myfile)){
    $temp = ltrim(fgets($myfile));
    $course_code;
    $semester;
    $credits;
    $grade;

    if(preg_match("/^---------------- 2DO SEMESTRE \d{4}-\d{4} -----------------$/", trim($temp))){
        $is2ndSemesterReached = TRUE;
    }  
    if(preg_match("/^---------------- 1ER SEMESTRE \d{4}-\d{4} -----------------$/", trim($temp))){
        $is1stSemesterReached = TRUE;
    }  
    if(!$is2ndSemesterReached)
        continue;

    if(!$is1stSemesterReached){
        if(preg_match("/[A-Z]{4}\d{4}[A-Z0-9]{3}/", $temp)){
           
            //Course code
            preg_match("/[A-Z]{4}\d{4}[A-Z0-9]{3}/", $temp, $course_code);
            $temp = preg_replace("/[A-Z]{4}\d{4}[A-Z0-9]{3}/", '', $temp);
            // Grade
            preg_match("/\sW\s|\sP\s|\sNP\s|\sIC\s|\sID\s|\sIF\s|\s[A-F]\s/", $temp, $grade);
            $temp = preg_replace("/\sW\s|\sP\s|\sNP|\sID\s|\sIF\s|\s[A-F]\s/", '', $temp);
            
            $course_code[0] = substr_replace( $course_code[0], '', 8, 3);
            $course_code[0] = substr($course_code[0], 0, 4) . " " . substr($course_code[0], 4);
            
            $course = array("nota_c" => $grade[0]);
            $coursesTakenThisSemester[$course_code[0]] = $course;
            //array_push($coursesTakenThisSemester, $course);       
        }

        
    } else {
        if(preg_match("/[A-Z]{4}\d{4}[A-Z0-9]{3}/", $temp)){
           
            //Course code
            preg_match("/[A-Z]{4}\d{4}[A-Z0-9]{3}/", $temp, $course_code);
            $temp = preg_replace("/[A-Z]{4}\d{4}[A-Z0-9]{3}/", '', $temp);
            
            $course_code[0] = substr_replace( $course_code[0], '', 8, 3);
            $course_code[0] = substr($course_code[0], 0, 4) . " " . substr($course_code[0], 4);
            $course = array("nombre_c" => $course_code[0]);

            $course = array("nota_c" => $grade[0]);
            $coursesForNextSemester[$course_code[0]] = $course;
            //array_push($coursesForNextSemester, $course);
            
        }
    }

}


$query = "SELECT nombre_c, id_est, id_fijo, id_especial, nota_c, estatus_c, año_aprobo_c, convalidación_c, equivalencia_c, créditos_C_E, estatus_R FROM (SELECT * FROM expediente JOIN expediente_fijo USING(id_fijo)
            UNION 
            SELECT * FROM expediente JOIN expediente_fijo_departamentales USING(id_fijo) 
            UNION 
            SELECT * FROM expediente JOIN expediente_fijo_generales USING(id_fijo) 
            UNION 
            SELECT * FROM expediente JOIN expediente_fijo_libre USING(id_fijo))
                                AS Courses   WHERE nombre_c IN (";

foreach($coursesTakenThisSemester as $course_name => $course_grade){
    $query .= "'$course_name', ";
}

$query = substr_replace($query, '', strlen($query) - 2);
$query .= ");";

echo $query;

$result = mysqli_query($conn, $query);
$resultCheck = mysqli_num_rows($result);


if($resultCheck > 0){
    $coursesFromDB = array();
    while($row = mysqli_fetch_assoc($result)) {
        
       $sql = "UPDATE expediente SET nota_c = ".$coursesTakenThisSemester[$row['nombre_c']]['nota_c'].", año_aprobo_c = value 2, estatus_c = 1
    WHERE id_fijo = $row[id_fijo] AND est_id = 1";
    echo "<p>$sql</p>";
    // USE SESSION INSTEAD OF HARDCODED NUMBER
    }


}

// A LAS DEL PROXIMO SEMESTRE ASIGNA ESTATUS_C = 2 Y MAS NA.
// RECUERDA EL TASK QUE LIZ TE DIO BUSCALO EN TASKS.DOCX



/*
SELECT id_est, id_fijo, id_especial, nota_c, estatus_c, año_aprobo_c, convalidación_c, equivalencia_c, créditos_C_E, estatus_R FROM (SELECT * FROM expediente JOIN expediente_fijo USING(id_fijo)
UNION 
 SELECT * FROM expediente JOIN expediente_fijo_departamentales USING(id_fijo) 
UNION 
 SELECT * FROM expediente JOIN expediente_fijo_generales USING(id_fijo) 
UNION 
 SELECT * FROM expediente JOIN expediente_fijo_libre USING(id_fijo))
 AS Courses  WHERE nombre_c IN ('ESPA 3208', 'CCOM 3015', 'MATE 3031', 'HIST 3241', 'INGL 3104');
*/

/*
SELECT ALL COURSES FROM DB BY PUTTING THEM IN A ASSOC ARRARY("NOMBRE_C" => $COURSE);
FOR EVERY COURSE IN ARRAYS $coursesForNextSemester and $coursesTakenThisSemester CHECK
IF NOMBRE_C  IS A KEY IN ASSOC ARRAY. CHANGE THE COURSE INFO IF KEY IS FOUND.
UPLOAD ONLY THE COURSES IN WHICH THEYRE INFO WAS CHANGED.
*/

fclose($myfile);
