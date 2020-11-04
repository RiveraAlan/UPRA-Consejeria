<?php
// TRY TO REARRANGE ELECTIVES DUE TO SITUATION NELSON HAD WITH HIS ELECTIVES.
echo '<h1>Rearrange Electives:</h1>';


$myfile = fopen("expediente_formatted.txt", "r+") or die("Unable to open file!");
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
         preg_match("/\sW\s|\sP\s|\sNP|\sID\s|\sIF\s|[A-D]\s/", $temp, $grade);
         $temp = preg_replace("/\sW\s|\sP\s|\sNP|\sID\s|\sIF\s|[A-D]\s/", '', $temp);
    
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
    //ccom 4307
    
    if(in_array(trim($department_elective_info["nombre_c"]), $adv_department_electives)){
        $adv_credits += intval($department_elective_info["créditos_c"]);
    } else {
        /*  if($int_credits >= 6){
             echo"<h1>Go to Elective: </h1>". $department_elective_info["nombre_c"]." ".$department_elective_info["descripción_c"];
             $free_elective = $department_elective_info["nombre_c"]." ".$department_elective_info["descripción_c"]." ".$department_elective_info["año_aprobó_c"]." ".$department_elective_info["créditos_c"]." ".$department_elective_info["nota_c"];
             array_push($free_electives, $free_elective);
             // Delete course from dept electives.
               unset($department_electives[$department_elective_idx]);

         } else {
            $int_credits += intval($department_elective_info["créditos_c"]);
         } */
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




$myfile = fopen('expediente_formatted.txt', 'a');//opens file in append mode  
  
 

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