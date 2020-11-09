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
    
        $department_elective = array("nombre_c" => $course_code[0], "descripción_c" => trim($temp),
                                     "año_aprobó_c" => $semester[0], "créditos_c" => $credits[0], "nota_c" => $grade[0]);
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
        $free_elective = array("nombre_c" => $course_code[0], "descripción_c" => trim($temp),
                                     "año_aprobó_c" => $semester[0], "créditos_c" => $credits[0], "nota_c" => $grade[0]);
        array_push($free_electives, $free_elective);
    }       
} 

usort($department_electives, function ($item1, $item2) {
    return $item1["nombre_c"] <=> $item2["nombre_c"];
});

for($i=0; $i < count($department_electives) - 1; $i++){
    if($department_electives[$i]["nombre_c"] === $department_electives[$i+1]["nombre_c"] AND $department_electives[$i]["año_aprobó_c"] === $department_electives[$i+1]["año_aprobó_c"]){
        $credits = floatval($department_electives[$i]["créditos_c"]) +  floatval($department_electives[$i+1]["créditos_c"]);
        $credits = number_format($credits, 2);
        $department_electives[$i+1]["créditos_c"] = strval($credits);
        unset($department_electives[$i]);
    }
}

$adv_credits = 0;
$int_credits = 0;

foreach($department_electives as $department_elective_idx => $department_elective_info){
    
    if(in_array(trim($department_elective_info["nombre_c"]), $adv_department_electives)){
        $adv_credits += intval($department_elective_info["créditos_c"]);
    } else {
        
    }
}


usort($free_electives, function ($item1, $item2) {
    return $item1["nombre_c"] <=> $item2["nombre_c"];
});

 for($i=0; $i < count($free_electives) - 1; $i++){
     
    if($free_electives[$i]["nombre_c"] === $free_electives[$i+1]["nombre_c"] AND $free_electives[$i]["año_aprobó_c"] === $free_electives[$i+1]["año_aprobó_c"]){
        $credits = floatval($free_electives[$i]["créditos_c"]) +  floatval($free_electives[$i+1]["créditos_c"]);
        $credits = number_format($credits, 2);
        $free_electives[$i+1]["créditos_c"] = strval($credits);
        unset($free_electives[$i]);
    }
} 


echo "\n"."<h3>Department electives:</h3>";
foreach($department_electives as $department_elective){
    echo "<p>".$department_elective['nombre_c']. " ".$department_elective['descripción_c']." ".$department_elective['año_aprobó_c']." ".$department_elective['créditos_c']." ".$department_elective['nota_c']."</p>";
}
 

echo "\n"."<h3>Free lectives:</h3>";
foreach($free_electives as $free_elective){
    echo "<p>".$free_elective['nombre_c']. " ".$free_elective['descripción_c']." ".$free_elective['año_aprobó_c']." ".$free_elective['créditos_c']." ".$free_elective['nota_c']."</p>";
}
echo "<h3>End of Free Electives</h3>";

fclose($myfile); 

$myfile = fopen('../academic_record_formatted.txt', 'a');//opens file in append mode  
  
 

fwrite($myfile, "\n- - - - - - - - - - - -  ELECTIVAS DIRIGIDAS CCOM - - - - - - - - - - - - -\n");
foreach($department_electives as $department_elective){
    fwrite($myfile, "\n".$department_elective['nombre_c']. " ".$department_elective['descripción_c']." ".$department_elective['año_aprobó_c']." ".$department_elective['créditos_c']." ".$department_elective['nota_c']."\n");
}

fwrite($myfile, "\n- - - - - - - - - - - - - -  ELECTIVAS LIBRES - - - - - - - - - - - - - - -\n");
foreach($free_electives as $free_elective){
    fwrite($myfile,"\n".$free_elective['nombre_c']. " ".$free_elective['descripción_c']." ".$free_elective['año_aprobó_c']." ".$free_elective['créditos_c']." ".$free_elective['nota_c']."\n");
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
$contents = file_get_contents('expediente_formatted.txt');
        $contents = str_replace($line, '', $contents);
        file_put_contents('expediente_formatted.txt', $contents);        
*/





// ASSOCIATE COURSE WITH ID_FIJO AND UPLOAD TO DATABASE



$myfile = fopen("expediente_formatted.txt", "r") or die("Unable to open file!");
$courses = array();
$expediente_fijo = array();
$expediente_fijo_generales = array();
$posicion_cursos = array();
$courses_below_section3 = array();

//EXPEDIENTE FIJO
$query = "SELECT  * FROM expediente_fijo";
$result = mysqli_query($conn,$query);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
  while($row = mysqli_fetch_assoc($result)) {
        $arr = array("id_fijo" => $row["id_fijo"], "nombre_c" => $row["nombre_c"], "id_rol" => $row["id_rol"]);
        array_push($expediente_fijo, $arr);
  }
}

 //EXPEDIENTE FIJO DEPARTAMENTALES
$query = "SELECT  * FROM expediente_fijo_departamentales";
$result = mysqli_query($conn,$query);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
  while($row = mysqli_fetch_assoc($result)) {
        $arr = array("id_fijo" => $row["id_fijo"], "nombre_c" => $row["nombre_c"], "id_rol" => $row["id_rol"]);
        array_push($expediente_fijo, $arr);
  }
}

 //EXPEDIENTE FIJO GENERALES
 $query = "SELECT  * FROM expediente_fijo_generales";
 $result = mysqli_query($conn,$query);
 $resultCheck = mysqli_num_rows($result);
 
 if($resultCheck > 0){
   while($row = mysqli_fetch_assoc($result)) {
         $arr = array("id_fijo" => $row["id_fijo"], "nombre_c" => $row["nombre_c"], "id_rol" => $row["id_rol"]);
         array_push($expediente_fijo, $arr);
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

        
         // ASSIGN ESTATUS_C
         
        if(preg_match("/Registered/", $temp)){
            $temp = preg_replace("/Registered/", '', $temp);
            $estatus_c = 2;
            
        }else {
            $estatus_c = 1;
        }
               

            $course = array("id_est" => -1, "id_fijo" => NULL, "id_especial" => NULL, "nota_c" => $grade[0],
                            "descripción_c" => $temp, "estatus_c" => $estatus_c, "año_aprobo_c" => $semester[0],"convalidacion_c" => NULL,
                            "equivalencia_c" => NULL, "créditos_c" => $credits[0], "estatus_R" => NULL, "nombre_c" => $course_code[0],
                            "id_rol" => NULL
                            );

            // ASSIGN ID_FIJO
            foreach($expediente_fijo as $idx => $e_f){
                if($e_f["nombre_c"] === $course["nombre_c"]){
                    $course["id_fijo"] = $e_f["id_fijo"];
                    $course["id_rol"] = $e_f["id_rol"];
                    unset($expediente_fijo[$idx]);
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

         // ASSIGN ESTATUS_C
         if(preg_match("/Registered/", $courses_below_section3[$i + 1])){
            $estatus_c = 2;
        }else {
            $estatus_c = 1;
        }
         if(preg_match("/EDFU 3005|INGL 0060/", $course_code[0])){
            continue;
        } 
        
            $course = array("id_est" =>-1, "id_fijo" => NULL, "id_especial" => NULL, "nota_c" => $grade[0],
            "descripción_c" => $temp,"estatus_c" => $estatus_c, "año_aprobo_c" => $semester[0],"convalidacion_c" => NULL,
            "equivalencia_c" => NULL, "créditos_c" => $credits[0], "estatus_R" => NULL, "nombre_c" => $course_code[0],
            "id_rol" => NULL
                        );
                        
            foreach($expediente_fijo as $idx => $e_f){
                if($e_f["nombre_c"] === $course["nombre_c"]){
                    $course["id_fijo"] = $e_f["id_fijo"];
                    $course["id_rol"] = $e_f["id_rol"];
                    unset($expediente_fijo[$idx]);
                }
                   
            }
               
               array_push($courses, $course);
    }
}


foreach($expediente_fijo as $e_f){
    if($e_f["id_fijo"] >= 1 AND $e_f["id_fijo"] <= 40){
        $course = array("id_est" => -1, "id_fijo" => $e_f["id_fijo"], "id_especial" => NULL, "nota_c" => NULL,
            "estatus_c" => 0, "año_aprobo_c" => NULL,"convalidacion_c" => NULL,
            "equivalencia_c" => NULL, "créditos_c" => NULL, "estatus_R" => NULL, "nombre_c" => $e_f["nombre_c"]
                        );
        array_push($courses, $course);
    } 
}

$id_fijo_start_point = 100;

echo "<h1>Electivas Libres</h1>";
foreach($courses as &$course){
   
    if($course["id_fijo"] === NULL){
        $course["id_rol"] = 7;
        //USE THE CODE IN THE LOGIN TO MAKE THIS SAFER!!!!!!!!!!!
        $query1 = "SELECT id_fijo FROM expediente_fijo_libre WHERE nombre_c = '".$course["nombre_c"]."';";

        //  =====LA BASE DATOS NO ESTA USANDO EL 100, ESTA AUTO INCREMENTANDOSE Y YA NO EMPIEZA EN 100. =======

        $result1 = mysqli_query($conn,$query1);
        $resultCheck1 = mysqli_num_rows($result1);
        $id_fijo_from_query1 = mysqli_fetch_assoc($result1);
        $query2 = "SELECT MAX(id_fijo)AS max_id_fijo FROM expediente_fijo_libre;";
        $result2 = mysqli_query($conn,$query2);
        $resultCheck2 = mysqli_num_rows($result2);
        
        $id_fijo_from_query2 = mysqli_fetch_assoc($result2);

        if($resultCheck1 === 1){
            $course["id_fijo"] = $id_fijo_from_query1["id_fijo"];
            
        } elseif($resultCheck2 === 1 AND $id_fijo_from_query2["max_id_fijo"] !== NULL) {
            $course["id_fijo"] = $id_fijo_from_query2["max_id_fijo"] + 1;
            
            $query = "INSERT INTO expediente_fijo_libre(id_fijo, nombre_c, descripción_c, créditos_c, id_rol) 
            VALUES(".$course["id_fijo"].", '".$course["nombre_c"]."','".$course["descripción_c"]."',".$course["créditos_c"].", 7);";
            echo "<h1>".$query."</h1>";

            mysqli_query($conn,$query);
            
        } else {
            $course["id_fijo"] = $id_fijo_start_point;
            $id_fijo_start_point++;
            //INSERT INTO DB
            $query = "INSERT INTO expediente_fijo_libre(nombre_c, descripción_c, créditos_c, id_rol) 
            VALUES('".$course["nombre_c"]."','".$course["descripción_c"]."',".$course["créditos_c"].
             ", 7);";
        
            mysqli_query($conn,$query);
        }
    }
}

$creditos_ciso = 0;
$creditos_huma= 0;
$creditos_intermedias = 0;

foreach($courses as &$course){
    if($course["id_rol"] !== NULL){
    if($course['nombre_c'] === 'MATE 3026' OR 
        $course['nombre_c'] === 'BIOL 3011' OR 
        $course['nombre_c'] === 'BIOL 3012' OR 
        $course['nombre_c'] === 'FISI 3171' OR 
        $course['nombre_c'] === 'FISI 3172' OR 
        $course['nombre_c'] === 'FISI 3173' OR 
        $course['nombre_c'] === 'MATE 3174' OR   
        $course['nombre_c'] === 'CCOM 3135')
            $course['id_especial'] = 2;
        
       elseif($course['id_rol'] === 5 AND $creditos_ciso >= 6) {
            $course['id_especial'] = 1;
        }
        elseif($course['id_rol'] === 5 AND $creditos_ciso < 6){
            $creditos_ciso +=$course['créditos_c'];       
        }
        elseif($course['id_rol'] === 6 AND $creditos_huma >= 6) {
            $course['id_especial'] = 1;
        }
        elseif($course['id_rol'] === 5 AND $creditos_huma < 6) {
            $creditos_huma +=$course['créditos_c']; 
        }
        elseif($course['id_rol'] === 9 AND ($course['nombre_c'] === 'CCOM 3027' OR 
                $course['nombre_c'] === 'CCOM 3036' OR 
                $course['nombre_c'] === 'CCOM 4305' OR 
                $course['nombre_c'] === 'CCOM 4306' OR
                $course['nombre_c'] === 'CCOM 4501') AND 
                $creditos_intermedias > 6){
                   $course['id_especial'] = 1;
        }
        elseif($course['id_rol'] === 9 AND
                ($course['nombre_c'] === 'CCOM 3027' OR 
                $course['nombre_c'] === 'CCOM 3036' OR 
                $course['nombre_c'] === 'CCOM 4305' OR 
                $course['nombre_c'] === 'CCOM 4306' OR
                $course['nombre_c'] === 'CCOM 4501') AND 
                $creditos_intermedias < 6){
                    $creditos_intermedias +=$course['créditos_c'];
        }
        else {
            
        }
     }

    }
   
echo "<h2>courses:"."</h2>";

foreach($courses as $course){
    echo "<p>codigo: ".$course["nombre_c"]. " "."id fijo: ".$course["id_fijo"]." "."nota_c: ".$course["nota_c"]." "."estatus_c: ".$course["estatus_c"]." "."ano_aprobo_c: ".$course["año_aprobo_c"]." "."creditos_c: ".$course["créditos_c"]." "."id_rol: ".$course["id_rol"]." "."id_especial: ".$course["id_especial"]."</p>";
   
}

$sql ="SELECT id_est FROM expediente";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

                if($resultCheck === 0){
                    foreach($courses as $course){
                        if (($course["nombre_c"] !== "INGL 3113") AND ($course["nombre_c"] !== "INGL 3114") AND ($course["nombre_c"] !== "EDFU 3005") AND ($course["nombre_c"] !== "INGL 0060")){
                            $stmt = $conn->prepare("INSERT INTO expediente (id_est,	id_fijo, id_especial, nota_c, estatus_c, año_aprobo_c) VALUES (?, ?, ?, ?, ?, ?)");

                $stmt->bind_param('iiisis', $_SESSION['id_est'], $course['id_fijo'], $course['id_especial'], $course['nota_c'], $course['estatus_c'], $course['año_aprobo_c']);
                        
               
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


