<?php
// TRY TO REARRANGE ELECTIVES DUE TO SITUATION NELSON HAD WITH HIS ELECTIVES.
echo '<h1>Rearrange Electives:</h1>';


$mystudent_record = fopen("student_record_formatted.txt", "r+") or die("Unable to open student_record!");
//fwrite($mystudent_record, $txt);

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
while(!feof($mystudent_record)) {
    $line = fgets($mystudent_record);

    if($delete){
     
        array_push($electives, $line);
        $contents = student_record_get_contents('student_record_formatted.txt');
        $contents = str_replace($line, '', $contents);
        student_record_put_contents('student_record_formatted.txt', $contents);
    }elseif(trim($line) === '- - - - - - - - - - - -  ELECTIVAS DIRIGIDAS CCOM - - - - - - - - - - - - -'){
        
        $delete = TRUE;
        array_push($electives, $line);
        $contents = student_record_get_contents('student_record_formatted.txt');
        $contents = str_replace($line, '', $contents);
        student_record_put_contents('student_record_formatted.txt', $contents);
    }
   
  }

fclose($mystudent_record);

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
    //ccom 4307
    
    if(in_array(trim($department_elective_info["crse_name"]), $adv_department_electives)){
        $adv_credits += intval($department_elective_info["crse_credits"]);
    } else {
        /*  if($int_credits >= 6){
             echo"<h1>Go to Elective: </h1>". $department_elective_info["crse_name"]." ".$department_elective_info["crse_description"];
             $free_elective = $department_elective_info["crse_name"]." ".$department_elective_info["crse_description"]." ".$department_elective_info["año_aprobó_c"]." ".$department_elective_info["crse_credits"]." ".$department_elective_info["crse_grade"];
             array_push($free_electives, $free_elective);
             // Delete course from dept electives.
               unset($department_electives[$department_elective_idx]);

         } else {
            $int_credits += intval($department_elective_info["crse_credits"]);
         } */
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




$mystudent_record = fopen('student_record_formatted.txt', 'a');//opens student_record in append mode  
  
 

fwrite($mystudent_record, "\n- - - - - - - - - - - -  ELECTIVAS DIRIGIDAS CCOM - - - - - - - - - - - - -\n");
foreach($department_electives as $department_elective){
    fwrite($mystudent_record, "\n".$department_elective['crse_name']. " ".$department_elective['crse_description']." ".$department_elective['año_aprobó_c']." ".$department_elective['crse_credits']." ".$department_elective['crse_grade']."\n");
}

fwrite($mystudent_record, "\n- - - - - - - - - - - - - -  ELECTIVAS LIBRES - - - - - - - - - - - - - - -\n");
foreach($free_electives as $free_elective){
    fwrite($mystudent_record,"\n".$free_elective['crse_name']. " ".$free_elective['crse_description']." ".$free_elective['año_aprobó_c']." ".$free_elective['crse_credits']." ".$free_elective['crse_grade']."\n");
}

$delete = FALSE;
foreach($electives as $course){
    if($delete)
        fwrite($mystudent_record, $course);
    elseif(trim($course) === '***********************************************'){
        $delete = TRUE;
        
        fwrite($mystudent_record ,"\nSECTION 3 - Work Not Applicable to this Program\n");
        fwrite($mystudent_record ,"\n***********************************************\n");
    }
        
    
}

fclose($mystudent_record); 


/* PUT THIS CODE INSIDE A FUNCTION
$contents = student_record_get_contents('student_record_formatted.txt');
        $contents = str_replace($line, '', $contents);
        student_record_put_contents('student_record_formatted.txt', $contents);        
*/
