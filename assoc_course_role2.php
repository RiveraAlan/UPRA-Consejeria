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
                            "descripción_c" => $temp, "estatus_c" => $estatus_c, "año_aprobo_c" => $semester[0],"convalidacion_c" => NULL,
                            "equivalencia_c" => NULL, "creditos_c" => $credits[0], "estatus_R" => NULL, "nombre_c" => $course_code[0],
                            "id_rol" => NULL
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
            "descripción_c" => $temp,"estatus_c" => $estatus_c, "año_aprobo_c" => $semester[0],"convalidacion_c" => NULL,
            "equivalencia_c" => NULL, "creditos_c" => $credits[0], "estatus_R" => NULL, "nombre_c" => $course_code[0],
            "id_rol" => NULL
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
}

}

fclose($myfile);








echo "<h2>expediente_fijo:"."</h2>";
foreach($expediente_fijo as $e_f){
    if($e_f["id_fijo"] >= 1 AND $e_f["id_fijo"] <= 30){
        $course = array("id_est" => -1, "id_fijo" => $e_f["id_fijo"], "id_especial" => NULL, "nota_c" => NULL,
            "estatus_c" => 0, "año_aprobo_c" => NULL,"convalidacion_c" => NULL,
            "equivalencia_c" => NULL, "creditos_c" => NULL, "estatus_R" => NULL, "nombre_c" => $e_f["nombre_c"]
                        );
        array_push($courses, $course);
    }
   
}


$e_f_generales = array('ANTR 3006', 'CIPO 3011','CISO 3121',
                       'CISO 3122', 'CISO 3155', 'ECON 3005',
                       'ECON 3021', 'ECON 3022','GEOG 3155',
                       'PSIC 3003', 'PSIC 3005', 'PSIC 3006',
                       'PSIC 3048', 'PSIC 3116', 'SOCI 1001',
                       'SOCI 3245');

$e_f_libres = array('ARTE 3115', 'ARTE 3116', 'ARTE 3118',
                    'FILO 3001', 'FILO 3002', 'FILO 3005',
                    'FILO 4006', 'FILO 4027', 'HIST 3111',
                   'HIST 3112', 'HIST 3165', 'HIST 3177',
                    'HIST 3179', 'HIST 3241', 'HIST 3242',
                    'HUMA 3101', 'HUMA 3102', 'HUMA 3201',
                    'HUMA 3202', 'HUMA 3145', 'INTD 3046',
                    'ESIN 4001', 'LITE 3011', 'LITE 3012',
                    'LITE 3035', 'LITE 3055', 'MUSI 3225',
                    'MUSI 3235', 'TEAT 3025'
);
$e_libres = array();
foreach($courses as $idx => $course){
    if($course["id_fijo"] === NULL){
        //ASIGNA A GENERALES O LIBRES
        if(array_search($course["nombre_c"], $e_f_libres)){
            $course = array("id_rol" => 5, "nombre_c" => $course["nombre_c"], "descripción_c" =>  $course["descripción_c"]);
           array_push($e_libres, $course);
        }
            
    }
}



echo "<h2>courses:"."</h2>";

foreach($courses as $course){
    echo "<p>codigo: ".$course["nombre_c"]. " "."id fijo: ".$course["id_fijo"]." "."nota_c: ".$course["nota_c"]." "."estatus_c: ".$course["estatus_c"]." "."ano_aprobo_c: ".$course["año_aprobo_c"]." "."creditos_c: ".$course["creditos_c"]." "."</p>";
}

echo "<h1>Electivas Libres</h1>";
foreach($e_libres as $e_l){
    echo "<p>".$e_l["nombre_c"]." ".$e_l["id_rol"]."</p>";
}
 // SI LA LIBRE ESTA EN LA BASE DE DATOS AISGNA EL ID_FIJO QUE TENGA SI EMPEZANDO CON ID MAYOR SI LA TABLA ESTA VACIA SI NO PUES COJE EL ULTIMO VALOR Y SUMALE UNO.







