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

// ROLES 
$query = "SELECT  * FROM posición_cursos";
$result = mysqli_query($conn,$query);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
  while($row = mysqli_fetch_assoc($result)) {
        $arr = array("id_rol" => $row["id_rol"]);
        array_push($posicion_cursos, $arr);
  }
}
var_dump($posicion_cursos);

$isCoursesReached = FALSE;
$isExtrasReached = FALSE;
while(!feof($myfile)){
    $temp = ltrim(fgets($myfile));
    $course_code;
    $semester;
    $credits;
    $grade;

     // FALTA ASIGNAR ROL 1 Y 7 AL 13. ALAN SE VA A ENCARGAR DE ESO MIRA SU TASK.
     // CONSIDERA LOS "REGISTERED", "NOTA CON P(MEETS NO REQUIREMENTS)", "MAY NOT BE REPEATED"
      
     if(preg_match("/SECTION 2 - Academic Requirements Completed or in Progress/", $temp)){
         $isCoursesReached = TRUE;
     }  

     if(preg_match("/SECTION 3 - Work Not Applicable to this Program/", $temp)){
        $isExtrasReached = TRUE;
    }


     if(!$isCoursesReached)
        continue;

     if(!$isExtrasReached){

     if(preg_match("/^CCOM/", $temp)){

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
                            "estatus_c" => $estatus_c, "año_aprobo_c" => NULL,"convalidacion_c" => NULL,
                            "equivalencia_c" => NULL, "creditos_c" => $credits[0], "estatus_R" => NULL, "code" => $course_code[0]
                            );
            // ASSIGN ID_FIJO
            foreach($expediente_fijo as $idx => $e_f){
                if($e_f["nombre_c"] === $course["code"]){
                    $course["id_fijo"] = $e_f["id_fijo"];
                    unset($expediente_fijo[$idx]);
                }
                   
            }
            array_push($courses, $course);
        
    } elseif(preg_match("/^ESPA/", $temp)){

        //Course code
        preg_match("/ESPA \d{4}/", $temp, $course_code);
        $temp = preg_replace("/ESPA \d{4}/", '', $temp);
        //Semester
        preg_match("/[A-Z]\d{2}/", $temp, $semester);
        $temp = preg_replace("/[A-Z]\d{2}/", '', $temp);
        //Amount of Credits
        preg_match("/\d{1}\.\d{2}/", $temp, $credits);
        $temp = preg_replace("/\d{1}\.\d{2}/", '', $temp);
        // Grade
        preg_match("/\s[A-F]{1}\s/", $temp, $grade);
        $temp = preg_replace("/\s[A-F]{1}\s/", '', $temp);
    
        if(preg_match("/Registered/", $temp)){
            $temp = preg_replace("/Registered/", '', $temp);
            $estatus_c = 2;
        } else {
            $estatus_c = 1;
        }

       /*  $course = array("code" => $course_code[0], "name" => $temp,
                        "semester" => $semester[0], "credits" => $credits[0], 
                        "grade" => $grade[0], "role" => 2); */
            $course = array("id_est" => -1, "id_fijo" => 2, "id_especial" => NULL, "nota_c" => $grade[0],
            "estatus_c" => $estatus_c, "año_aprobo_c" => NULL,"convalidacion_c" => NULL,
            "equivalencia_c" => NULL, "creditos_c" => $credits[0], "estatus_R" => NULL, "code" => $course_code[0]
                );
            array_push($courses, $course);
        
    }  elseif(preg_match("/^INGL/", $temp)){

        //Course code
        preg_match("/INGL \d{4}/", $temp, $course_code);
        $temp = preg_replace("/INGL \d{4}/", '', $temp);
        //Semester
        preg_match("/[A-Z]\d{2}/", $temp, $semester);
        $temp = preg_replace("/[A-Z]\d{2}/", '', $temp);
        //Amount of Credits
        preg_match("/\d{1}\.\d{2}/", $temp, $credits);
        $temp = preg_replace("/\d{1}\.\d{2}/", '', $temp);
        // Grade
        preg_match("/\s[A-F]{1}\s/", $temp, $grade);
        $temp = preg_replace("/\s[A-F]{1}\s/", '', $temp);
    
        if(preg_match("/Registered/", $temp)){
            $temp = preg_replace("/Registered/", '', $temp);
            $estatus_c = 2;
        }else {
            $estatus_c = 1;
        }

        /* $course = array("code" => $course_code[0], "name" => $temp,
                        "semester" => $semester[0], "credits" => $credits[0], 
                        "grade" => $grade[0], "role" => 3); */
            $course = array("id_est" => -1, "id_fijo" => 3, "id_especial" => NULL, "nota_c" => $grade[0],
            "estatus_c" => $estatus_c, "año_aprobo_c" => NULL,"convalidacion_c" => NULL,
            "equivalencia_c" => NULL, "creditos_c" => $credits[0], "estatus_R" => NULL, "code" => $course_code[0]
                        );
            array_push($courses, $course);
        
    }  elseif(preg_match("/^MATE/", $temp)){

        //Course code
        preg_match("/MATE \d{4}/", $temp, $course_code);
        $temp = preg_replace("/MATE \d{4}/", '', $temp);
        //Semester
        preg_match("/[A-Z]\d{2}/", $temp, $semester);
        $temp = preg_replace("/[A-Z]\d{2}/", '', $temp);
        //Amount of Credits
        preg_match("/\d{1}\.\d{2}/", $temp, $credits);
        $temp = preg_replace("/\d{1}\.\d{2}/", '', $temp);
        // Grade
        preg_match("/\s[A-F]{1}\s/", $temp, $grade);
        $temp = preg_replace("/\s[A-F]{1}\s/", '', $temp);
    
        if(preg_match("/Registered/", $temp)){
            $temp = preg_replace("/Registered/", '', $temp);
            $estatus_c = 2;
        }else {
            $estatus_c = 1;
        }

       /*  $course = array("code" => $course_code[0], "name" => $temp,
                        "semester" => $semester[0], "credits" => $credits[0], 
                        "grade" => $grade[0], "role" => 4); */
            $course = array("id_est" => -1, "id_fijo" => 4, "id_especial" => NULL, "nota_c" => $grade[0],
            "estatus_c" => $estatus_c, "año_aprobo_c" => NULL,"convalidacion_c" => NULL,
            "equivalencia_c" => NULL, "creditos_c" => $credits[0], "estatus_R" => NULL, "code" => $course_code[0]
                        );
            array_push($courses, $course);
        
    }  elseif(preg_match("/^CISO/", $temp)){

        //Course code
        preg_match("/CISO \d{4}/", $temp, $course_code);
        $temp = preg_replace("/CISO \d{4}/", '', $temp);
        //Semester
        preg_match("/[A-Z]\d{2}/", $temp, $semester);
        $temp = preg_replace("/[A-Z]\d{2}/", '', $temp);
        //Amount of Credits
        preg_match("/\d{1}\.\d{2}/", $temp, $credits);
        $temp = preg_replace("/\d{1}\.\d{2}/", '', $temp);
        // Grade
        preg_match("/\s[A-F]{1}\s/", $temp, $grade);
        $temp = preg_replace("/\s[A-F]{1}\s/", '', $temp);
    
        if(preg_match("/Registered/", $temp)){
            $temp = preg_replace("/Registered/", '', $temp);
            $estatus_c = 2;
        }else {
            $estatus_c = 1;
        }

        /* $course = array("code" => $course_code[0], "name" => $temp,
                        "semester" => $semester[0], "credits" => $credits[0], 
                        "grade" => $grade[0], "role" => 5); */
           $course = array("id_est" => -1, "id_fijo" => 5, "id_especial" => NULL, "nota_c" => $grade[0],
           "estatus_c" => $estatus_c, "año_aprobo_c" => NULL,"convalidacion_c" => NULL,
           "equivalencia_c" => NULL, "creditos_c" => $credits[0], "estatus_R" => NULL, "code" => $course_code[0]
                        );
            array_push($courses, $course);
        
    }  elseif(preg_match("/^HUMA/", $temp)){

        //Course code
        preg_match("/HUMA \d{4}/", $temp, $course_code);
        $temp = preg_replace("/HUMA \d{4}/", '', $temp);
        //Semester
        preg_match("/[A-Z]\d{2}/", $temp, $semester);
        $temp = preg_replace("/[A-Z]\d{2}/", '', $temp);
        //Amount of Credits
        preg_match("/\d{1}\.\d{2}/", $temp, $credits);
        $temp = preg_replace("/\d{1}\.\d{2}/", '', $temp);
        // Grade
        preg_match("/\s[A-F]{1}\s/", $temp, $grade);
        $temp = preg_replace("/\s[A-F]{1}\s/", '', $temp);
    
        if(preg_match("/Registered/", $temp)){
            $temp = preg_replace("/Registered/", '', $temp);
            $estatus_c = 2;
        }else {
            $estatus_c = 1;
        }

       /*  $course = array("code" => $course_code[0], "name" => $temp,
                        "semester" => $semester[0], "credits" => $credits[0], 
                        "grade" => $grade[0], "role" => 6); */
                        $course = array("id_est" => -1, "id_fijo" => 6, "id_especial" => NULL, "nota_c" => $grade[0],
                        "estatus_c" => $estatus_c, "año_aprobo_c" => NULL,"convalidacion_c" => NULL,
                        "equivalencia_c" => NULL, "creditos_c" => $credits[0], "estatus_R" => NULL,"code" => $course_code[0]
                        );
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
            "estatus_c" => $estatus_c, "año_aprobo_c" => NULL,"convalidacion_c" => NULL,
            "equivalencia_c" => NULL, "creditos_c" => $credits[0], "estatus_R" => NULL, "code" => $course_code[0]
                        );
                        
                //ASSIGN ROLE BASED ON $course["code"]
            if(preg_match("/MATE/", $course["code"])){
                $course["id_fijo"] = 4;
                array_push($courses, $course);
            } elseif(preg_match("/CCOM/", $course["code"])){
                $course["id_fijo"] = 8;
                array_push($courses, $course);
            }

            //EDFU NO SE VA A INSERTAR EN EL ARREGLO
            
    }
}
    
   
       
}





fclose($myfile);



