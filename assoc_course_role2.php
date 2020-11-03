<?php
session_start();
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
        
    
            $course = array("id_est" =>-1, "id_fijo" => NULL, "id_especial" => NULL, "nota_c" => $grade[0],
            "descripción_c" => $temp,"estatus_c" => $estatus_c, "año_aprobo_c" => $semester[0],"convalidacion_c" => NULL,
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
        $course["id_rol"] = 7;
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
                $course['nombre_c'] === 'CCOM 3027' OR 
                $course['nombre_c'] === 'CCOM 3036' OR 
                $course['nombre_c'] === 'CCOM 4305' OR 
                $course['nombre_c'] === 'CCOM 4306' OR
                $course['nombre_c'] === 'CCOM 4501' AND 
                $creditos_intermedias < 6){
            
                    $creditos_intermedias +=$course['créditos_c'];
        }
        else {
            
        }
     }

    }
   
    // CON ID FIJO CONSIGUE EL ID ROL PARA PODER ASIGNAR ID ESPECIAL  Y LUEGO SUBIR A LA BASE DE DATOS






echo "<h2>courses:"."</h2>";

foreach($courses as $course){
    echo "<p>codigo: ".$course["nombre_c"]. " "."id fijo: ".$course["id_fijo"]." "."nota_c: ".$course["nota_c"]." "."estatus_c: ".$course["estatus_c"]." "."ano_aprobo_c: ".$course["año_aprobo_c"]." "."creditos_c: ".$course["créditos_c"]." "."id_rol: ".$course["id_rol"]." "."id_especial: ".$course["id_especial"]."</p>";
   
  

}

            $sql ="SELECT id_est FROM expediente";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck === 0){
                    foreach($courses as $course){
                    $stmt = $conn->prepare("INSERT INTO expediente (id_est,	id_fijo, id_especial, nota_c, estatus_c, año_aprobo_c) VALUES (?, ?, ?, ?, ?, ?)");

// Now we tell the script which variable each placeholder actually refers to using the bindParam() method
// First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to


$stmt->bind_param('iiisis', $_SESSION['id_est'], $course['id_fijo'], $course['id_especial'], $course['nota_c'], $course['estatus_c'], $course['año_aprobo_c']);
echo $_SESSION['id_est'], $course['id_fijo'], $course['id_especial'], $course['nota_c'], $course['estatus_c'], $course['año_aprobo_c'];

// Execute the query using the data we just defined
// The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
if ($stmt->execute()) {
    //  header('Location: ../est_profile.php');
    echo "Uploaded to Database successfully";
} else {
  echo "Unable to create record";
}


	$stmt->close();
                }}


mysqli_close($conn);
