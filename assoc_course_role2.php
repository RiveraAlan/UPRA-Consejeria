<?php
include 'private/dbconnect.php';

 

$myfile = fopen("expediente_formatted.txt", "r") or die("Unable to open file!");
$courses = array();
$expediente_fijo = array();
$expediente_fijo_generales = array();
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

 //EXPEDIENTE FIJO GENERALES
 $query = "SELECT  * FROM expediente_fijo_generales";
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
                            "equivalencia_c" => NULL, "créditos_c" => $credits[0], "estatus_R" => NULL, "nombre_c" => $course_code[0],
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
    if(preg_match("/\sW\s|\sP\s|\sNP|\sID\s|\sIF\s|[A-D]\s/", $temp)){
        
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
         // ASSIGN ESTATUS_C
         if(preg_match("/Registered/", $temp)){
            $temp = preg_replace("/Registered/", '', $temp);
            $estatus_c = 2;
        }else {
            $estatus_c = 1;
        }
        
    
        /* $course = array("code" => $course_code[0], "name" => $temp,
                        "semester" => $semester[0], "credits" => $credits[0], 
                        "grade" => $grade[0], "role" => -1); */
            $course = array("id_est" => -1, "id_fijo" => NULL, "id_especial" => NULL, "nota_c" => $grade[0],
            "descripción_c" => $temp,"estatus_c" => $estatus_c, "año_aprobo_c" => $semester[0],"convalidacion_c" => NULL,
            "equivalencia_c" => NULL, "créditos_c" => $credits[0], "estatus_R" => NULL, "nombre_c" => $course_code[0],
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



foreach($expediente_fijo as $e_f){
    if($e_f["id_fijo"] >= 1 AND $e_f["id_fijo"] <= 30){
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
        //USE THE CODE IN THE LOGIN TO MAKE THIS SAFER!!!!!!!!!!!
        $query1 = "SELECT id_fijo FROM expediente_fijo_libre WHERE nombre_c = '".$course["nombre_c"]."';";
        
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
            // FIX BUG IN HERE: COURSE IS NOT BEING INSERTED IN THE DB AND IS NOT BEING ASSIGNED THE CORRECT ID.
            $course["id_fijo"] = $id_fijo_from_query2["max_id_fijo"] + 1;
            echo "<h1>PUÑETA: ".$course["id_fijo"]."</h1>";
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




echo "<h2>courses:"."</h2>";

foreach($courses as $course){
    echo "<p>codigo: ".$course["nombre_c"]. " "."id fijo: ".$course["id_fijo"]." "."nota_c: ".$course["nota_c"]." "."estatus_c: ".$course["estatus_c"]." "."ano_aprobo_c: ".$course["año_aprobo_c"]." "."creditos_c: ".$course["créditos_c"]." "."</p>";
}


/*

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

foreach($expediente_fijo_generales as $e_f_g){
    if($e_f_g["id_fijo"] >= 57 AND $e_f_g["id_fijo"] <= 99){
        $course = array("id_est" => -1, "id_fijo" => $e_f_g["id_fijo"], "id_especial" => NULL, "nota_c" => NULL,
            "estatus_c" => 0, "año_aprobo_c" => NULL,"convalidacion_c" => NULL,
            "equivalencia_c" => NULL, "creditos_c" => NULL, "estatus_R" => NULL, "nombre_c" => $e_f["nombre_c"]
                        );
        array_push($courses, $course);
    } 
   
}











echo "<h2>courses:"."</h2>";

foreach($courses as $course){
    echo "<p>codigo: ".$course["nombre_c"]. " "."id fijo: ".$course["id_fijo"]." "."nota_c: ".$course["nota_c"]." "."estatus_c: ".$course["estatus_c"]." "."ano_aprobo_c: ".$course["año_aprobo_c"]." "."creditos_c: ".$course["creditos_c"]." "."</p>";
}



$id_fijo_start_point = 100;

echo "<h1>Electivas Libres</h1>";
foreach($courses as $course){
    echo "<p>".$e_l["nombre_c"]." ".$e_l["id_rol"]."</p>";
   
    if($course["id_fijo"] === NULL){
        //USE THE CODE IN THE LOGIN TO MAKE THIS SAFER!!!!!!!!!!!
        $query1 = "SELECT id_fijo FROM expediente_fijo_libre WHERE nombre_c = ".$course["nombre_c"].";";
        $result1 = mysqli_query($conn,$query);
        $resultCheck1 = mysqli_num_rows($result);
        $id_fijo_from_query1 = mysqli_fetch_assoc($result1);
        $query2 = "SELECT MAX(id_fijo) AS max_id_fijo FROM expediente_fijo_libre;";
        $result2 = mysqli_query($conn,$query);
        $resultCheck2 = mysqli_num_rows($result);
        $id_fijo_from_query2 = mysqli_fetch_assoc($result2);

        if($resultCheck1 === 1){
            $course["id_fijo"] = $id_fijo_from_query1["id_fijo"];
            
        } elseif($resultCheck2 === 1) {
            $course["id_fijo"] = $id_fijo_from_query2["id_fijo"] + 1;
        } else {
            $course["id_fijo"] = $id_fijo_start_point;
            $id_fijo_start_point++;
            //INSERT INTO DB
            $query = "INSERT INTO expediente_fijo_libre VALUES(".$course["id_fijo"].",".$course["nombre_c"].",".$course["descripción_c"].",".$course["rol_id"].");";
            mysqli_query($conn,$query);
        }

    }
   
    

}
*/
 
 

 // 2 querys: one for finding id_fijo by looking for nombre_c, another one to get the biggest id_fijo in table.
    // if first query returns result set id_fijo to that tuple.
    // Else if second query returns result add one to the id_fijo and set it.
    // Else the table will be empty so set the id_fijo and increment.

// SI LA LIBRE ESTA EN LA BASE DE DATOS AISGNA EL ID_FIJO QUE TENGA SI EMPEZANDO CON 50 SI LA TABLA ESTA VACIA SI NO PUES COJE EL ULTIMO VALOR Y SUMALE UNO.

 // PROCESAR CURSOS QUE PERTENECEN A EXPEDIENTE_FIJO_GENERALES


// A, B, C, D, ID, IF y cuando es Nulo despues del asterisco ponerlo en CURSOS

//  EL ID ESPECIAL FUNCIONA SOLO FALTA SACAR EL ID ROL PARA QUE FUNCIONE

// SUBIR A LA BASE DE DATOS


mysqli_close($conn);