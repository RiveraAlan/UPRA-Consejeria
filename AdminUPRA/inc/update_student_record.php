<?php
include_once 'connection.php';
session_start();

 $fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "../student_record.txt")){
    
    // UPLOAD IS COMPLETE";
 file_put_contents('../student_record_formatted.txt',
 preg_replace(
     '~[\r\n]+~',
     "\r\n",
     trim(file_get_contents('../student_record.txt'))
 )
);
  


$mystudent_record = fopen("../student_record_formatted.txt", "r") or die("Unable to open student_record!");

$coursesForNextSemester = array();
$coursesTakenThisSemester = array();
$is2ndSemesterReached = FALSE;
$is1stSemesterReached = FALSE;


while(!feof($mystudent_record)){
    $temp = ltrim(fgets($mystudent_record));
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
            
            $course = array("crse_grade" => $grade[0]);
            $coursesTakenThisSemester[$course_code[0]] = $course;
                
        }

    } else {
        if(preg_match("/[A-Z]{4}\d{4}[A-Z0-9]{3}/", $temp)){
           
            //Course code
            preg_match("/[A-Z]{4}\d{4}[A-Z0-9]{3}/", $temp, $course_code);
            $temp = preg_replace("/[A-Z]{4}\d{4}[A-Z0-9]{3}/", '', $temp);
            
            $course_code[0] = substr_replace( $course_code[0], '', 8, 3);
            $course_code[0] = substr($course_code[0], 0, 4) . " " . substr($course_code[0], 4);
            $course = array("crse_name" => $course_code[0]);

            $course = array("crse_grade" => $grade[0]);
            $coursesForNextSemester[$course_code[0]] = $course;
           
        }
    }

}
fclose($mystudent_record);

$query = "SELECT crse_name, stdnt_number, crse_label, special_id, crse_grade, crse_status, semester_pass, crse_recognition, crse_equivalence, crse_credits_ER, crseR_status FROM (SELECT * FROM student_record JOIN mandatory_courses USING(crse_label)
            UNION 
            SELECT * FROM student_record JOIN departmental_courses USING(crse_label) 
            UNION 
            SELECT * FROM student_record JOIN general_courses USING(crse_label) 
            UNION 
            SELECT * FROM student_record JOIN free_courses USING(crse_label))
                                AS Courses   WHERE crse_name IN (";

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
        
     //  FALTA ANADIR EL SEMESTRE DEL ESTUDIANTE

       $sql = "UPDATE student_record SET crse_grade = '".$coursesTakenThisSemester[$row['crse_name']]['crse_grade']."', semester_pass = '2', crse_status = 1
    WHERE crse_label = $row[crse_label] AND stdnt_number = '$_SESSION[stdnt_number]'";
    echo "<p>$sql</p>";
    mysqli_query($conn, $sql);

    }
}


foreach($coursesForNextSemester as $key => $grade){

   $query = "SELECT * FROM ( SELECT * FROM mandatory_courses
   UNION
   SELECT * FROM departmental_courses 
   UNION 
   SELECT * FROM general_courses 
   UNION 
   SELECT * FROM free_courses) AS Courses
   WHERE crse_name = '$key';
   ";

   $result = mysqli_query($conn, $query);
   $resultCheck = mysqli_num_rows($result);
   
   if($resultCheck === 1){
       while($row = mysqli_fetch_assoc($result)) {
        $query = "INSERT INTO student_record(stdnt_number, crse_label, special_id, crse_grade, crse_status, semester_pass, 
                  crse_recognition, crse_equivalence, crse_credits_ER, crseR_status) 
                  VALUES ('$_SESSION[stdnt_number]', $row[crse_label], NULL, NULL, 2, NULL, NULL, NULL, NULL, 0);";
         echo "<p>$query</p>";
          mysqli_query($conn, $query);
       }
   }
   
}
 } else {
    echo "Error: ";
} 




// A LAS DEL PROXIMO SEMESTRE ASIGNA crse_status = 2 Y MAS NA.
// RECUERDA EL TASK QUE LIZ TE DIO BUSCALO EN TASKS.DOCX


