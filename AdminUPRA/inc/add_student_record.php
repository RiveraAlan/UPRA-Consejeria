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
if(move_uploaded_file($fileTmpLoc, "../academic_record.txt")){
    
    // UPLOAD IS COMPLETE";
 file_put_contents('../academic_record_formatted.txt',
 preg_replace(
     '~[\r\n]+~',
     "\r\n",
     trim(file_get_contents('../academic_record.txt'))
 )
);

//  ======= REARRANGE ELECTIVES =========


$myfile = fopen("../academic_record_formatted.txt", "r+") or die("Unable to open file!");
//fwrite($myfile, $txt);

$electives = array();
$department_electives = array();
$free_electives = array();
$adv_department_electives = array(
    'CCOM 4019',
    'CCOM 4307',
    'CCOM 3042',
    'CCOM 3115',
    'CCOM 3985',
    'CCOM 4018',
    'CCOM 4125',
    'CCOM 4135',
    'CCOM 4401',
    'CCOM 4420'
    
);

$int_department_electives = array(
    'CCOM 3027',
    'CCOM 3036',
    'CCOM 4305',
    'CCOM 4306',
    'CCOM 4501'
    
);


$delete = FALSE;
while(!feof($myfile)) {
    $line = fgets($myfile);

    if($delete){
     
        array_push($electives, $line);
        $contents = file_get_contents('../academic_record_formatted.txt');
        $contents = str_replace($line, '', $contents);
        file_put_contents('../academic_record_formatted.txt', $contents);
    }elseif(trim($line) === '- - - - - - - - - - - -  ELECTIVAS DIRIGIDAS CCOM - - - - - - - - - - - - -'){
        
        $delete = TRUE;
        array_push($electives, $line);
        $contents = file_get_contents('../academic_record_formatted.txt');
        $contents = str_replace($line, '', $contents);
        file_put_contents('../academic_record_formatted.txt', $contents);
    }
   
  }

fclose($myfile);

 for($i=0; $i < count($electives); $i++){
     $matches = array();
     $temp = ltrim($electives[$i]);
    $course_code;
    $semester;
    $credits;
    $grade;
    
    if(preg_match("/^CCOM/", $temp) AND preg_match("/\s[A-F]{1}\s/", $temp)){

        //Course code
        preg_match("/CCOM \d{4}/", $temp, $course_code);
        $temp = preg_replace("/CCOM \d{4}/", '', $temp);
        //Semester
        preg_match("/[A-Z]\d{2}/", $temp, $semester);
        $temp = preg_replace("/[A-Z]\d{2}/", '', $temp);
        //Amount of Credits
        preg_match("/\d\.\d{1,2}/", $temp, $credits);
        $temp = preg_replace("/\d\.\d{1,2}/", '', $temp);
        // Grade
        preg_match("/\s[A-F]{1}\s/", $temp, $grade);
        $temp = preg_replace("/\s[A-F]{1}\s/", '', $temp);
    
        $department_elective = array("crse_name" => $course_code[0], "crse_description" => trim($temp),
                                     "año_aprobó_c" => $semester[0], "crse_credits" => $credits[0], "crse_grade" => $grade[0]);
        array_push($department_electives, $department_elective);
        unset($electives[$i]);
    } elseif(preg_match("/^[A-Z]{4} \d{4}/", $temp)){
        
         //Course code
         preg_match("/[A-Z]{4} \d{4}/", $temp, $course_code);
         $temp = preg_replace("/[A-Z]{4} \d{4}/", '', $temp);
         //Semester
         preg_match("/[A-Z]\d{2}/", $temp, $semester);
         $temp = preg_replace("/[A-Z]\d{2}/", '', $temp);
         //Amount of Credits
         preg_match("/\d\.\d{1,2}/", $temp, $credits);
         $temp = preg_replace("/\d\.\d{1,2}/", '', $temp);
         // Grade
         preg_match("/\sW\s|\sP\s|\sNP|\sID\s|\sIF\s|\s[A-D]\s/", $temp, $grade);
         $temp = preg_replace("/\sW\s|\sP\s|\sNP|\sID\s|\sIF\s|\s[A-D]\s/", '', $temp);
    
         // MAKE SURE TO TAKE "REGISTERED" INTO CONSIDERATION
        $free_elective = array("crse_name" => $course_code[0], "crse_description" => trim($temp),
                                     "año_aprobó_c" => $semester[0], "crse_credits" => $credits[0], "crse_grade" => $grade[0]);
        array_push($free_electives, $free_elective);
    }       
} 

usort($department_electives, function ($item1, $item2) {
    return $item1["crse_name"] <=> $item2["crse_name"];
});

for($i=0; $i < count($department_electives) - 1; $i++){
    if($department_electives[$i]["crse_name"] === $department_electives[$i+1]["crse_name"] AND $department_electives[$i]["año_aprobó_c"] === $department_electives[$i+1]["año_aprobó_c"]){
        $credits = floatval($department_electives[$i]["crse_credits"]) +  floatval($department_electives[$i+1]["crse_credits"]);
        $credits = number_format($credits, 2);
        $department_electives[$i+1]["crse_credits"] = strval($credits);
        unset($department_electives[$i]);
    }
}

$adv_credits = 0;
$int_credits = 0;

foreach($department_electives as $department_elective_idx => $department_elective_info){
    
    if(in_array(trim($department_elective_info["crse_name"]), $adv_department_electives)){
        $adv_credits += intval($department_elective_info["crse_credits"]);
    } else {
        
    }
}


usort($free_electives, function ($item1, $item2) {
    return $item1["crse_name"] <=> $item2["crse_name"];
});

 for($i=0; $i < count($free_electives) - 1; $i++){
     
    if($free_electives[$i]["crse_name"] === $free_electives[$i+1]["crse_name"] AND $free_electives[$i]["año_aprobó_c"] === $free_electives[$i+1]["año_aprobó_c"]){
        $credits = floatval($free_electives[$i]["crse_credits"]) +  floatval($free_electives[$i+1]["crse_credits"]);
        $credits = number_format($credits, 2);
        $free_electives[$i+1]["crse_credits"] = strval($credits);
        unset($free_electives[$i]);
    }
} 


echo "\n"."<h3>Department electives:</h3>";
foreach($department_electives as $department_elective){
    echo "<p>".$department_elective['crse_name']. " ".$department_elective['crse_description']." ".$department_elective['año_aprobó_c']." ".$department_elective['crse_credits']." ".$department_elective['crse_grade']."</p>";
}
 

echo "\n"."<h3>Free lectives:</h3>";
foreach($free_electives as $free_elective){
    echo "<p>".$free_elective['crse_name']. " ".$free_elective['crse_description']." ".$free_elective['año_aprobó_c']." ".$free_elective['crse_credits']." ".$free_elective['crse_grade']."</p>";
}
echo "<h3>End of Free Electives</h3>";

fclose($myfile); 

$myfile = fopen('../academic_record_formatted.txt', 'a');//opens file in append mode  
  
 

fwrite($myfile, "\n- - - - - - - - - - - -  ELECTIVAS DIRIGIDAS CCOM - - - - - - - - - - - - -\n");
foreach($department_electives as $department_elective){
    fwrite($myfile, "\n".$department_elective['crse_name']. " ".$department_elective['crse_description']." ".$department_elective['año_aprobó_c']." ".$department_elective['crse_credits']." ".$department_elective['crse_grade']."\n");
}

fwrite($myfile, "\n- - - - - - - - - - - - - -  ELECTIVAS LIBRES - - - - - - - - - - - - - - -\n");
foreach($free_electives as $free_elective){
    fwrite($myfile,"\n".$free_elective['crse_name']. " ".$free_elective['crse_description']." ".$free_elective['año_aprobó_c']." ".$free_elective['crse_credits']." ".$free_elective['crse_grade']."\n");
}

$delete = FALSE;
foreach($electives as $course){
    if($delete)
        fwrite($myfile, $course);
    elseif(trim($course) === '***********************************************'){
        $delete = TRUE;
        fwrite($myfile ,"\nSECTION 3 - Work Not Applicable to this Program\n");
        fwrite($myfile ,"\n***********************************************\n");
    }
        
    
}

fclose($myfile); 

/* PUT THIS CODE INSIDE A FUNCTION
$contents = file_get_contents('file_formatted.txt');
        $contents = str_replace($line, '', $contents);
        file_put_contents('file_formatted.txt', $contents);        
*/





// ASSOCIATE COURSE WITH crse_label AND UPLOAD TO DATABASE



$myfile = fopen("file_formatted.txt", "r") or die("Unable to open file!");
$courses = array();
$mandatory_courses = array();
$general_courses = array();
$course_category = array();
$courses_below_section3 = array();

//file FIJO
$query = "SELECT  * FROM mandatory_courses";
$result = mysqli_query($conn,$query);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
  while($row = mysqli_fetch_assoc($result)) {
        $arr = array("crse_label" => $row["crse_label"], "crse_name" => $row["crse_name"], "crse_id" => $row["crse_id"]);
        array_push($mandatory_courses, $arr);
  }
}

 //file FIJO DEPARTAMENTALES
$query = "SELECT  * FROM departmental_courses";
$result = mysqli_query($conn,$query);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
  while($row = mysqli_fetch_assoc($result)) {
        $arr = array("crse_label" => $row["crse_label"], "crse_name" => $row["crse_name"], "crse_id" => $row["crse_id"]);
        array_push($mandatory_courses, $arr);
  }
}

 //file FIJO GENERALES
 $query = "SELECT  * FROM general_courses";
 $result = mysqli_query($conn,$query);
 $resultCheck = mysqli_num_rows($result);
 
 if($resultCheck > 0){
   while($row = mysqli_fetch_assoc($result)) {
         $arr = array("crse_label" => $row["crse_label"], "crse_name" => $row["crse_name"], "crse_id" => $row["crse_id"]);
         array_push($mandatory_courses, $arr);
   }
 }

$isCoursesReached = FALSE;
$isExtrasReached = FALSE;

while(!feof($myfile)){
    $temp = ltrim(fgets($myfile));
    $course_code;
    $semester;
    $credits;
    $grade;
    

     if(preg_match("/SECTION 2 - Academic Requirements Completed or in Progress/", $temp)){
         $isCoursesReached = TRUE;
     }  

     if(preg_match("/SECTION 3 - Work Not Applicable to this Program/", $temp)){
        $isExtrasReached = TRUE;
    }

     if(!$isCoursesReached)
        continue;

     if(!$isExtrasReached){
       
     if(preg_match("/[A-Z]{4} \d{4}/", $temp)){

        //Course code
        preg_match("/[A-Z]{4} \d{4}/", $temp, $course_code);
        $temp = preg_replace("/[A-Z]{4} \d{4}/", '', $temp);
        //Semester
        preg_match("/[A-Z]\d{2}/", $temp, $semester);
        $temp = preg_replace("/[A-Z]\d{2}/", '', $temp);
        //Amount of Credits
        preg_match("/\d{1}\.\d{2}/", $temp, $credits);
        $temp = preg_replace("/\d{1}\.\d{2}/", '', $temp);
        // Grade
        preg_match("/\s[A-F]{1}\s/", $temp, $grade);
        $temp = preg_replace("/\s[A-F]{1}\s/", '', $temp);
        // REMOVE "Meets no requirements"
        if(preg_match("/Meets no requirements/", $temp)){
            $temp = preg_replace("/Meets no requirements/", '', $temp);
        }
        // REMOVE "May not be repeated"
        if(preg_match("/May not be repeated/", $temp)){
            $temp = preg_replace("/May not be repeated/", '', $temp);
        }
        //REMOVE "()"
        if(preg_match("/\( \)/", $temp)){
            $temp = preg_replace("/\( \)/", '', $temp);
        }

        
         // ASSIGN crse_status
         
        if(preg_match("/Registered/", $temp)){
            $temp = preg_replace("/Registered/", '', $temp);
            $crse_status = 2;
            
        }else {
            $crse_status = 1;
        }
               

            $course = array("stdnt_number" => -1, "crse_label" => NULL, "special_id" => NULL, "crse_grade" => $grade[0],
                            "crse_description" => $temp, "crse_status" => $crse_status, "semester_pass" => $semester[0],"convalidacion_c" => NULL,
                            "crse_equivalence" => NULL, "crse_credits" => $credits[0], "estatus_R" => NULL, "crse_name" => $course_code[0],
                            "crse_id" => NULL
                            );

            // ASSIGN crse_label
            foreach($mandatory_courses as $idx => $e_f){
                if($e_f["crse_name"] === $course["crse_name"]){
                    $course["crse_label"] = $e_f["crse_label"];
                    $course["crse_id"] = $e_f["crse_id"];
                    unset($mandatory_courses[$idx]);
                }
                   
            }
            array_push($courses, $course);
    } 
        
} else {
      array_push($courses_below_section3, $temp);
}

}

fclose($myfile);

// ADD COURSES FROM SECTION 3 TO COURSES ARRAY
for($i=0; $i < count($courses_below_section3); $i++){
    $temp = trim($courses_below_section3[$i]);
    $course_code;
    $semester;
    $credits;
    $grade;
    
    if(preg_match("/[A-Z]{4} \d{4}/", $temp)){
        
        //Course code
        preg_match("/[A-Z]{4} \d{4}/", $temp, $course_code);
        $temp = preg_replace("/[A-Z]{4} \d{4}/", '', $temp);
        //Semester
        preg_match("/[A-Z]\d{2}/", $temp, $semester);
        $temp = preg_replace("/[A-Z]\d{2}/", '', $temp);
        //Amount of Credits
        preg_match("/\d\.\d{1,2}/", $temp, $credits);
        $temp = preg_replace("/\d\.\d{1,2}/", '', $temp);
        // Grade
         preg_match("/\sW\s|\sP\s|\sNP|\sID\s|\sIF\s|\s[A-F]\s/", $temp, $grade);
         $temp = preg_replace("/\sW\s|\sP\s|\sNP|\sID\s|\sIF\s|\s[A-F]\s/", '', $temp);

         // REMOVE "Meets no requirements"
         if(preg_match("/Meets no requirements/", $temp)){
            $temp = preg_replace("/Meets no requirements/", '', $temp);
        }
        // REMOVE "May not be repeated"
        if(preg_match("/May not be repeated/", $temp)){
            $temp = preg_replace("/May not be repeated/", '', $temp);
        }
        //REMOVE "()"
        if(preg_match("/\( \)/", $temp)){
            $temp = preg_replace("/\( \)/", '', $temp);
        }

         // ASSIGN crse_status
         if(preg_match("/Registered/", $courses_below_section3[$i + 1])){
            $crse_status = 2;
        }else {
            $crse_status = 1;
        }
         if(preg_match("/EDFU 3005|INGL 0060/", $course_code[0])){
            continue;
        } 
        
            $course = array("stdnt_number" =>-1, "crse_label" => NULL, "special_id" => NULL, "crse_grade" => $grade[0],
            "crse_description" => $temp,"crse_status" => $crse_status, "semester_pass" => $semester[0],"convalidacion_c" => NULL,
            "crse_equivalence" => NULL, "crse_credits" => $credits[0], "estatus_R" => NULL, "crse_name" => $course_code[0],
            "crse_id" => NULL
                        );
                        
            foreach($mandatory_courses as $idx => $e_f){
                if($e_f["crse_name"] === $course["crse_name"]){
                    $course["crse_label"] = $e_f["crse_label"];
                    $course["crse_id"] = $e_f["crse_id"];
                    unset($mandatory_courses[$idx]);
                }
                   
            }
               
               array_push($courses, $course);
    }
}


foreach($mandatory_courses as $e_f){
    if($e_f["crse_label"] >= 1 AND $e_f["crse_label"] <= 30){
        $course = array("stdnt_number" => -1, "crse_label" => $e_f["crse_label"], "special_id" => NULL, "crse_grade" => NULL,
            "crse_status" => 0, "semester_pass" => NULL,"convalidacion_c" => NULL,
            "crse_equivalence" => NULL, "crse_credits" => NULL, "estatus_R" => NULL, "crse_name" => $e_f["crse_name"]
                        );
        array_push($courses, $course);
    } 
}

$crse_label_start_point = 100;

echo "<h1>Electivas Libres</h1>";
foreach($courses as &$course){
   
    if($course["crse_label"] === NULL){
        $course["crse_id"] = 7;
        //USE THE CODE IN THE LOGIN TO MAKE THIS SAFER!!!!!!!!!!!
        $query1 = "SELECT crse_label FROM free_courses WHERE crse_name = '".$course["crse_name"]."';";

        //  =====LA BASE DATOS NO ESTA USANDO EL 100, ESTA AUTO INCREMENTANDOSE Y YA NO EMPIEZA EN 100. =======

        $result1 = mysqli_query($conn,$query1);
        $resultCheck1 = mysqli_num_rows($result1);
        $crse_label_from_query1 = mysqli_fetch_assoc($result1);
        $query2 = "SELECT MAX(crse_label)AS max_crse_label FROM free_courses;";
        $result2 = mysqli_query($conn,$query2);
        $resultCheck2 = mysqli_num_rows($result2);
        
        $crse_label_from_query2 = mysqli_fetch_assoc($result2);

        if($resultCheck1 === 1){
            $course["crse_label"] = $crse_label_from_query1["crse_label"];
            
        } elseif($resultCheck2 === 1 AND $crse_label_from_query2["max_crse_label"] !== NULL) {
            $course["crse_label"] = $crse_label_from_query2["max_crse_label"] + 1;
            
            $query = "INSERT INTO free_courses(crse_label, crse_name, crse_description, crse_credits, crse_id) 
            VALUES(".$course["crse_label"].", '".$course["crse_name"]."','".$course["crse_description"]."',".$course["crse_credits"].", 7);";
            echo "<h1>".$query."</h1>";

            mysqli_query($conn,$query);
            
        } else {
            $course["crse_label"] = $crse_label_start_point;
            $crse_label_start_point++;
            //INSERT INTO DB
            $query = "INSERT INTO free_courses(crse_name, crse_description, crse_credits, crse_id) 
            VALUES('".$course["crse_name"]."','".$course["crse_description"]."',".$course["crse_credits"].
             ", 7);";
        
            mysqli_query($conn,$query);
        }
    }
}

$creditos_ciso = 0;
$creditos_huma= 0;
$creditos_intermedias = 0;

foreach($courses as &$course){
    if($course["crse_id"] !== NULL){
    if($course['crse_name'] === 'MATE 3026' OR 
        $course['crse_name'] === 'BIOL 3011' OR 
        $course['crse_name'] === 'BIOL 3012' OR 
        $course['crse_name'] === 'FISI 3171' OR 
        $course['crse_name'] === 'FISI 3172' OR 
        $course['crse_name'] === 'FISI 3173' OR 
        $course['crse_name'] === 'MATE 3174' OR   
        $course['crse_name'] === 'CCOM 3135')
            $course['special_id'] = 2;
        
       elseif($course['crse_id'] === 5 AND $creditos_ciso >= 6) {
            $course['special_id'] = 1;
        }
        elseif($course['crse_id'] === 5 AND $creditos_ciso < 6){
            $creditos_ciso +=$course['crse_credits'];       
        }
        elseif($course['crse_id'] === 6 AND $creditos_huma >= 6) {
            $course['special_id'] = 1;
        }
        elseif($course['crse_id'] === 5 AND $creditos_huma < 6) {
            $creditos_huma +=$course['crse_credits']; 
        }
        elseif($course['crse_id'] === 9 AND ($course['crse_name'] === 'CCOM 3027' OR 
                $course['crse_name'] === 'CCOM 3036' OR 
                $course['crse_name'] === 'CCOM 4305' OR 
                $course['crse_name'] === 'CCOM 4306' OR
                $course['crse_name'] === 'CCOM 4501') AND 
                $creditos_intermedias > 6){
                   $course['special_id'] = 1;
        }
        elseif($course['crse_id'] === 9 AND
                ($course['crse_name'] === 'CCOM 3027' OR 
                $course['crse_name'] === 'CCOM 3036' OR 
                $course['crse_name'] === 'CCOM 4305' OR 
                $course['crse_name'] === 'CCOM 4306' OR
                $course['crse_name'] === 'CCOM 4501') AND 
                $creditos_intermedias < 6){
                    $creditos_intermedias +=$course['crse_credits'];
        }
        else {
            
        }
     }

    }
   
echo "<h2>courses:"."</h2>";

foreach($courses as $course){
    echo "<p>codigo: ".$course["crse_name"]. " "."id fijo: ".$course["crse_label"]." "."crse_grade: ".$course["crse_grade"]." "."crse_status: ".$course["crse_status"]." "."ano_aprobo_c: ".$course["semester_pass"]." "."creditos_c: ".$course["crse_credits"]." "."crse_id: ".$course["crse_id"]." "."special_id: ".$course["special_id"]."</p>";
   
}

$sql ="SELECT stdnt_number FROM file";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

                if($resultCheck === 0){
                    foreach($courses as $course){
                        if (($course["crse_name"] !== "INGL 3113") AND ($course["crse_name"] !== "INGL 3114") AND ($course["crse_name"] !== "EDFU 3005") AND ($course["crse_name"] !== "INGL 0060")){
                            $stmt = $conn->prepare("INSERT INTO file (stdnt_number,	crse_label, special_id, crse_grade, crse_status, semester_pass) VALUES (?, ?, ?, ?, ?, ?)");

                $stmt->bind_param('iiisis', $_SESSION['stdnt_number'], $course['crse_label'], $course['special_id'], $course['crse_grade'], $course['crse_status'], $course['semester_pass']);
                        
               
                if ($stmt->execute()) {
                    //  header('Location: ../est_profile.php');
                    echo "Uploaded to Database successfully";
                } else {
                echo "Unable to create record";
                }

                    $stmt->close();
                        
                        }
                    }
                }
                    
mysqli_close($conn);







    
   //header('Location: ../est_profile.php');
} else {
    echo "move_uploaded_file function failed";
}


