<?php
include 'private/dbconnect.php';

 file_put_contents('expediente_formatted.txt',
    preg_replace(
        '~[\r\n]+~',
        "\r\n",
        trim(file_get_contents('expediente.txt'))
    )
);
 
$concentration_requisites = ['CCOM 3002','CCOM 3010','CCOM 3015',
                             'CCOM 3020', 'CCOM 3025', 'CCOM 3035',
                             'CCOM 3041', 'CCOM 4005', 'CCOM 4006',
                             'CCOM 4007', 'CCOM 4025', 'CCOM 4065',
                             'CCOM 4115', 'CCOM 4075','CCOM 4095'];


$myfile = fopen("expediente_formatted.txt", "r") or die("Unable to open file!");
$courses = array();
$expediente_fijo = array();
$posicion_cursos = array();

// ============= FALTA COLOCAR LAS QUE SOBRAN EN EXP_FIJO Y COLOCAR ID_ROL 


//EXPEDIENTE FIJO
$query = "SELECT  * FROM expediente_fijo";
$result = mysqli_query($conn,$query);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
  while($row = mysqli_fetch_assoc($result)) {
        $arr = array("id_fijo" => $row["id_fijo"], "nombre_c" => $row["nombre_c"]);
        array_push($expediente_fijo, $arr);
  }
}

 //EXPEDIENTE FIJO DEPARTAMENTALES
$query = "SELECT  * FROM expediente_fijo_departamentales";
$result = mysqli_query($conn,$query);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
  while($row = mysqli_fetch_assoc($result)) {
        $arr = array("id_fijo" => $row["id_fijo"], "nombre_c" => $row["nombre_c"]);
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

     // FALTA ASIGNAR ROL 1 Y 7 AL 13. ALAN SE VA A ENCARGAR DE ESO MIRA SU TASK.
     //ASSIGN ID_FIJO EN LAS EXTRAS!!!!!!!!!!!!!!!!!!!!!!!!!
     // ESTE CODIGO PUEDE SER MUCHO MAS SENCILLO PORQUE COMO NO SE ASIGNA  ROL_ID NO TENGO QUE DIVIDIR
     // EXPRESION REGULAR ENTRE CCOM, CISO, ESPA, HUMA ETC.
      
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
    
         // ASSIGN ESTATUS_C
        if(preg_match("/Registered/", $temp)){
            $temp = preg_replace("/Registered/", '', $temp);
            $estatus_c = 2;
        }else {
            $estatus_c = 1;
        }
        
       /*  $course = array("code" => $course_code[0], "name" => $temp,
                        "semester" => $semester[0], "credits" => $credits[0], 
                        "grade" => $grade[0], "role" => 8); */
            $course = array("id_est" => -1, "id_fijo" => NULL, "id_especial" => NULL, "nota_c" => $grade[0],
                            "estatus_c" => $estatus_c, "año_aprobo_c" => $semester[0],"convalidacion_c" => NULL,
                            "equivalencia_c" => NULL, "creditos_c" => $credits[0], "estatus_R" => NULL, "nombre_c" => $course_code[0]
                            );
            // ASSIGN ID_FIJO
            foreach($expediente_fijo as $idx => $e_f){
                if($e_f["nombre_c"] === $course["nombre_c"]){
                    $course["id_fijo"] = $e_f["id_fijo"];
                    unset($expediente_fijo[$idx]);
                }
                   
            }
           

            array_push($courses, $course);
        
    } 
        
} else {
    if(preg_match("/\sW\s|\sP\s|\sNP\s/", $temp)){
        
        //Course code
        preg_match("/[A-Z]{4} \d{4}/", $temp, $course_code);
        $temp = preg_replace("/[A-Z]{4} \d{4}/", '', $temp);
        //Semester
        preg_match("/[A-Z]\d{2}/", $temp, $semester);
        $temp = preg_replace("/[A-Z]\d{2}/", '', $temp);
        //Amount of Credits
        preg_match("/\( \d{1}\.\d{1,2}\)/", $temp, $credits);
        $temp = preg_replace("/\( \d{1}\.\d{1,2}\)/", '', $temp);
        // Grade
        preg_match("/\sW\s|\sP\s|\sNP\s/", $temp, $grade);
        $temp = preg_replace("/\s[G-Z]{1}\s/", '', $temp);
    
        /* $course = array("code" => $course_code[0], "name" => $temp,
                        "semester" => $semester[0], "credits" => $credits[0], 
                        "grade" => $grade[0], "role" => -1); */
            $course = array("id_est" => -1, "id_fijo" => -1, "id_especial" => NULL, "nota_c" => $grade[0],
            "estatus_c" => $estatus_c, "año_aprobo_c" => $semester,"convalidacion_c" => NULL,
            "equivalencia_c" => NULL, "creditos_c" => $credits[0], "estatus_R" => NULL, "nombre_c" => $course_code[0]
                        );
                        
                 // ASSIGN ID_FIJO
            foreach($expediente_fijo as $idx => $e_f){
                if($e_f["nombre_c"] === $course["nombre_c"]){
                    $course["id_fijo"] = $e_f["id_fijo"];
                    unset($expediente_fijo[$idx]);
                }
                   
            }

    
    }
}

   
       
}
fclose($myfile);

$creditos_ciso = 0;
$creditos_huma= 0;
$creditos_intermedias = 0;

foreach($courses as $course ){
if ($course['nombre_c'] == "MATE 3026" OR 
    $course['nombre_c'] == "BIOL 3011" OR 
    $course['nombre_c'] == "BIOL 3012" OR 
    $course['nombre_c'] == "FISI 3171" OR 
    $course['nombre_c'] == "FISI 3172" OR 
    $course['nombre_c'] == "FISI 3173" OR 
    $course['nombre_c'] == "MATE 3174" OR   
    $course['nombre_c'] == "CCOM 3135"){ 
        $array['id_especial'] = 2;}
        else {
if ($course['id_rol'] == 5 AND $credito_ciso >= 6){ 
    $course['id_especial'] = 1; }
    else{
if ($course['id_rol'] == 5 AND $credito_ciso < 6){
$credito_ciso +=$course['créditos_c']; }
    else{
if ($course['id_rol'] == 6 AND $credito_huma >= 6){ 
    $course['id_especial'] = 1;}
    else{
if ($course['id_rol'] == 5 AND $credito_huma < 6){
$credito_huma +=$array['créditos_c']; }
    else{
if ($course['id_rol'] == 9 AND $credito_intermedias >= 6){ 
    $course['id_especial'] = 1;} 
    else{
if ($course['id_rol'] == 9 AND 
    $course['nombre_c'] == "CCOM 3027" OR 
    $course['nombre_c'] == "CCOM 3036" OR 
    $course['nombre_c'] == "CCOM 4305" OR 
    $course['nombre_c'] == "CCOM 4306" OR
    $course['nombre_c'] == "CCOM 4501" AND 
    $credito_intermedias < 6) { 
$credito_intermedias +=$array['créditos_c'];}
    else{
        $course['codigo_especial'] = NULL;}}}}}}}

echo "<h2>expediente_fijo:"."</h2>";
foreach($expediente_fijo as $e_f){
    echo "<p>".$e_f["nombre_c"]."</p>";
}


echo "<h2>courses:"."</h2>";

foreach($courses as $course){
    echo "<p>".$course["nombre_c"]."</p>";
}




