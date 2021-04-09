<?php
session_start();
include 'private/dbconnect.php';

$mystdnt_record = fopen("stdnt_record_formatted.txt", "r") or die("Unable to open stdnt_record!");
$courses = array();
$mandatory_courses = array();
$general_courses = array();
$course_category = array();
$courses_below_section3 = array();

//stdnt_record FIJO
$query = "SELECT  * FROM mandatory_courses";
$result = mysqli_query($conn,$query);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
  while($row = mysqli_fetch_assoc($result)) {
        $arr = array("crse_code" => $row["crse_code"], "crse_name" => $row["crse_name"], "crse_id" => $row["crse_id"]);
        array_push($mandatory_courses, $arr);
  }
}

 //stdnt_record FIJO DEPARTAMENTALES
$query = "SELECT  * FROM departmental_courses";
$result = mysqli_query($conn,$query);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
  while($row = mysqli_fetch_assoc($result)) {
        $arr = array("crse_code" => $row["crse_code"], "crse_name" => $row["crse_name"], "crse_id" => $row["crse_id"]);
        array_push($mandatory_courses, $arr);
  }
}

 //stdnt_record FIJO GENERALES
 $query = "SELECT  * FROM general_courses";
 $result = mysqli_query($conn,$query);
 $resultCheck = mysqli_num_rows($result);
 
 if($resultCheck > 0){
   while($row = mysqli_fetch_assoc($result)) {
         $arr = array("crse_code" => $row["crse_code"], "crse_name" => $row["crse_name"], "crse_id" => $row["crse_id"]);
         array_push($mandatory_courses, $arr);
   }
 }

$isCoursesReached = FALSE;
$isExtrasReached = FALSE;

while(!feof($mystdnt_record)){
    $temp = ltrim(fgets($mystdnt_record));
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
               

            $course = array("stdnt_number" => -1, "crse_code" => NULL, "special_id" => NULL, "crse_grade" => $grade[0],
                            "crse_description" => $temp, "crse_status" => $crse_status, "semester_pass" => $semester[0],"convalidacion_c" => NULL,
                            "crse_equivalence" => NULL, "crse_credits" => $credits[0], "crseR_status" => NULL, "crse_name" => $course_code[0],
                            "crse_id" => NULL
                            );

            // ASSIGN crse_code
            foreach($mandatory_courses as $idx => $e_f){
                if($e_f["crse_name"] === $course["crse_name"]){
                    $course["crse_code"] = $e_f["crse_code"];
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

fclose($mystdnt_record);

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
        
            $course = array("stdnt_number" =>-1, "crse_code" => NULL, "special_id" => NULL, "crse_grade" => $grade[0],
            "crse_description" => $temp,"crse_status" => $crse_status, "semester_pass" => $semester[0],"convalidacion_c" => NULL,
            "crse_equivalence" => NULL, "crse_credits" => $credits[0], "crseR_status" => NULL, "crse_name" => $course_code[0],
            "crse_id" => NULL
                        );
                        
            foreach($mandatory_courses as $idx => $e_f){
                if($e_f["crse_name"] === $course["crse_name"]){
                    $course["crse_code"] = $e_f["crse_code"];
                    $course["crse_id"] = $e_f["crse_id"];
                    unset($mandatory_courses[$idx]);
                }
                   
            }
               
               array_push($courses, $course);
    }
}


foreach($mandatory_courses as $e_f){
    if($e_f["crse_code"] >= 1 AND $e_f["crse_code"] <= 30){
        $course = array("stdnt_number" => -1, "crse_code" => $e_f["crse_code"], "special_id" => NULL, "crse_grade" => NULL,
            "crse_status" => 0, "semester_pass" => NULL,"convalidacion_c" => NULL,
            "crse_equivalence" => NULL, "crse_credits" => NULL, "crseR_status" => NULL, "crse_name" => $e_f["crse_name"]
                        );
        array_push($courses, $course);
    } 
}

$crse_code_start_point = 100;

echo "<h1>Electivas Libres</h1>";
foreach($courses as &$course){
   
    if($course["crse_code"] === NULL){
        $course["crse_id"] = 7;
        //USE THE CODE IN THE LOGIN TO MAKE THIS SAFER!!!!!!!!!!!
        $query1 = "SELECT crse_code FROM free_courses WHERE crse_name = '".$course["crse_name"]."';";

        //  =====LA BASE DATOS NO ESTA USANDO EL 100, ESTA AUTO INCREMENTANDOSE Y YA NO EMPIEZA EN 100. =======

        $result1 = mysqli_query($conn,$query1);
        $resultCheck1 = mysqli_num_rows($result1);
        $crse_code_from_query1 = mysqli_fetch_assoc($result1);
        $query2 = "SELECT MAX(crse_code)AS max_crse_code FROM free_courses;";
        $result2 = mysqli_query($conn,$query2);
        $resultCheck2 = mysqli_num_rows($result2);
        
        $crse_code_from_query2 = mysqli_fetch_assoc($result2);

        if($resultCheck1 === 1){
            $course["crse_code"] = $crse_code_from_query1["crse_code"];
            
        } elseif($resultCheck2 === 1 AND $crse_code_from_query2["max_crse_code"] !== NULL) {
            $course["crse_code"] = $crse_code_from_query2["max_crse_code"] + 1;
            
            $query = "INSERT INTO free_courses(crse_code,  crse_description, crse_credits, crse_id) 
            VALUES(".$course["crse_code"].", '".$course["crse_name"]."','".$course["crse_description"]."',".$course["crse_credits"].", 7);";
            echo "<h1>".$query."</h1>";

            mysqli_query($conn,$query);
            
        } else {
            $course["crse_code"] = $crse_code_start_point;
            $crse_code_start_point++;
            //INSERT INTO DB
            $query = "INSERT INTO free_courses( crse_description, crse_credits, crse_id) 
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
    echo "<p>codigo: ".$course["crse_name"]. " "."id fijo: ".$course["crse_code"]." "."crse_grade: ".$course["crse_grade"]." "."crse_status: ".$course["crse_status"]." "."ano_aprobo_c: ".$course["semester_pass"]." "."creditos_c: ".$course["crse_credits"]." "."crse_id: ".$course["crse_id"]." "."special_id: ".$course["special_id"]."</p>";
   
}

$sql ="SELECT stdnt_number FROM stdnt_record";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

                if($resultCheck === 0){
                    foreach($courses as $course){
                        if (($course["crse_name"] !== "INGL 3113") AND ($course["crse_name"] !== "INGL 3114") AND ($course["crse_name"] !== "EDFU 3005") AND ($course["crse_name"] !== "INGL 0060")){
                            $stmt = $conn->prepare("INSERT INTO stdnt_record (stdnt_number, crse_code, special_id, crse_grade, crse_status, semester_pass) VALUES (?, ?, ?, ?, ?, ?)");

                $stmt->bind_param('iiisis', $_SESSION['stdnt_number'], $course['crse_code'], $course['special_id'], $course['crse_grade'], $course['crse_status'], $course['semester_pass']);
                        
               
                if ($stmt->execute()) {
                    //  header('Location: ../est_prostdnt_record.php');
                    echo "Uploaded to Database successfully";
                } else {
                echo "Unable to create record";
                }

                    $stmt->close();
                        
                        }
                    }
                }
                    
mysqli_close($conn);



/*
if(preg_match("/\sW\s|\sP\s|\sNP|\sID\s|\sIF\s|\s[A-D]\s/", $temp)){
        
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
        if((preg_match("/\sF\s|\sW\s|\sID\s|\sIF\s/", $grade[0])) OR (is_null($grade[0]) AND $crse_status !== 2)){
            continue;
        }
        
            $course = array("stdnt_number" =>-1, "crse_code" => NULL, "special_id" => NULL, "crse_grade" => $grade[0],
            "crse_description" => $temp,"crse_status" => $crse_status, "semester_pass" => $semester[0],"convalidacion_c" => NULL,
            "crse_equivalence" => NULL, "crse_credits" => $credits[0], "crseR_status" => NULL, "crse_name" => $course_code[0],
            "crse_id" => NULL
                        );
                        
            foreach($mandatory_courses as $idx => $e_f){
                if($e_f["crse_name"] === $course["crse_name"]){
                    $course["crse_code"] = $e_f["crse_code"];
                    $course["crse_id"] = $e_f["crse_id"];
                    unset($mandatory_courses[$idx]);
                }
                   
            }
               array_push($courses, $course);
    }
*/
 


