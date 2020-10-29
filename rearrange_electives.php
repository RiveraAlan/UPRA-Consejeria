<?php
// TRY TO REARRANGE ELECTIVES DUE TO SITUATION NELSON HAD WITH HIS ELECTIVES.
echo '<h1>Rearrange Electives:</h1>';


$myfile = fopen("expediente_formatted.txt", "r+") or die("Unable to open file!");
//fwrite($myfile, $txt);

$electives = array();
$department_electives = array();
$free_electives = array();
$adv_department_electives = array(
    'PROGRAMACION PARA WEB',
    'MANT. DE PCS Y REDES'
);

$int_department_electives = array(
    'PROG OBJ ORIENT OB',
    'TEMAS CIENCIAS COMPUT',
    'INTRO DISENO PAGINAS',
    'GRAFICOS PARA LA INTE'
);


$delete = FALSE;
while(!feof($myfile)) {
    $line = fgets($myfile);

    if($delete){
     
        array_push($electives, $line);
        $contents = file_get_contents('expediente_formatted.txt');
        $contents = str_replace($line, '', $contents);
        file_put_contents('expediente_formatted.txt', $contents);
    }elseif(trim($line) === '- - - - - - - - - - - -  ELECTIVAS DIRIGIDAS CCOM - - - - - - - - - - - - -'){
        
        $delete = TRUE;
        array_push($electives, $line);
        $contents = file_get_contents('expediente_formatted.txt');
        $contents = str_replace($line, '', $contents);
        file_put_contents('expediente_formatted.txt', $contents);
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
        preg_match("/\d{1}\.\d{2}/", $temp, $credits);
        $temp = preg_replace("/\d{1}\.\d{2}/", '', $temp);
        // Grade
        preg_match("/\s[A-F]{1}\s/", $temp, $grade);
        $temp = preg_replace("/\s[A-F]{1}\s/", '', $temp);
    
        $department_elective = array("code" => $course_code[0], "name" => trim($temp),
                                     "semester" => $semester[0], "credits" => $credits[0], "grade" => $grade[0]);
        array_push($department_electives, $department_elective);
        unset($electives[$i]);
    } elseif(preg_match("/^[A-Z]{4} \d{4}/", $temp)){
        array_push($free_electives, $temp);
    }       
} 


usort($department_electives, function ($item1, $item2) {
    return $item1["code"] <=> $item2["code"];
});


for($i=0; $i < count($department_electives) - 1; $i++){
    if($department_electives[$i]["code"] === $department_electives[$i+1]["code"] AND $department_electives[$i]["semester"] === $department_electives[$i+1]["semester"]){
        $credits = floatval($department_electives[$i]["credits"]) +  floatval($department_electives[$i+1]["credits"]);
        $credits = number_format($credits, 2);
        $department_electives[$i+1]["credits"] = strval($credits);
        unset($department_electives[$i]);
    }
}


$adv_credits = 0;
$int_credits = 0;
$coursesToDel = array();

foreach($department_electives as $department_elective_idx => $department_elective_info){
    
    if(in_array($department_elective_info["name"], $adv_department_electives)){
        $adv_credits += intval($department_elective_info["credits"]);
    } else {
         if($int_credits >= 6){
             $free_elective = $department_elective_info["code"]." ".$department_elective_info["name"]." ".$department_elective_info["semester"]." ".$department_elective_info["credits"]." ".$department_elective_info["grade"];
             array_push($free_electives, $free_elective);
             // Delete course from dept electives.
               unset($department_electives[$department_elective_idx]);
              // array_push($coursesToDel, $department_elective["code"]);

         } else {
            $int_credits += intval($department_elective_info["credits"]);
         }
    }
}


echo "\n"."<h3>Department electives:</h3>";
foreach($department_electives as $department_elective){
    echo "<p>".$department_elective['code']. " ".$department_elective['name']." ".$department_elective['semester']." ".$department_elective['credits']." ".$department_elective['grade']."</p>";
}

echo "\n"."<h3>Free lectives:</h3>";
foreach($free_electives as $free_elective){
    echo "<p>".$free_elective."</p>";
}




$myfile = fopen('expediente_formatted.txt', 'a');//opens file in append mode  
  
 

fwrite($myfile, "\n- - - - - - - - - - - -  ELECTIVAS DIRIGIDAS CCOM - - - - - - - - - - - - -\n");
foreach($department_electives as $department_elective){
    fwrite($myfile, "\n".$department_elective["code"]." ".$department_elective["name"]. " ".$department_elective["semester"]." ".$department_elective["credits"]." ".$department_elective["grade"]."\n");
}

fwrite($myfile, "\n- - - - - - - - - - - - - -  ELECTIVAS LIBRES - - - - - - - - - - - - - - -\n");
foreach($free_electives as $free_elective){
    fwrite($myfile,"\n$free_elective\n");
}

$delete = FALSE;
foreach($electives as $course){
    if($delete)
        fwrite($myfile, $course);
    elseif(trim($course) === '***********************************************'){
        $delete = TRUE;
        fwrite($myfile ,"\n***********************************************\n");
    }
        
    
}

fclose($myfile); 


/* PUT THIS CODE INSIDE A FUNCTION
$contents = file_get_contents('expediente_formatted.txt');
        $contents = str_replace($line, '', $contents);
        file_put_contents('expediente_formatted.txt', $contents);        
*/

/*
SEIS CREDITOS INTERMEDIA LAS DEMAS SE VAN PARA ELECTIVA LIBRE
SEIS CREDITOS MINIMO EN AVANZADA
CASO ESPECIAL: INVESTIGACION TRES VECES ES EL MISMO CODIGO
COMPARAR CODIGO Y SEMESTRE 

FALTA QUITAR MEETING REQUIREMENTS AL NOMBRE DEL CURSO Y COLOCAR LAS EXTRAS DESPUES DE LIBRES
*/