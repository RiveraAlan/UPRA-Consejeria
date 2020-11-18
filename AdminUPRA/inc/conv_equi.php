<?php
if (isset($_POST['conv_env-submit'])) {
require 'connection.php';
session_start();
    $student_id = $_SESSION['stdnt_number'];
    $tipo = $_POST['tipo'];
    $tabla = $_POST['conv_env-submit'];
    $og_crse = $_POST['og_crse'];
    
    if($tabla == "mandatory_courses"){
        $clase = mysqli_real_escape_string($conn, $_POST['course_mand']);
    }else if($tabla == "general_courses"){
        $clase = mysqli_real_escape_string($conn, $_POST['course_gen']);
    }else if($tabla == "departamental_courses"){
        $clase = mysqli_real_escape_string($conn, $_POST['course_dept']);
    }
        // query para verificar si clase ya ha sido equi/conv anteriormente (si ha sido anterior se le dara update y no insert)
            $sql ="SELECT crse_label, crse_recognition, crse_equivalence crse_creditsER FROM `student_record` WHERE crse_label = $clase AND stdnt_number = '$student_id'";
                                    $result = mysqli_query($conn, $sql);
                                    $resultCheck = mysqli_num_rows($result);
        // query para obtener datos de la clase que esta siendo utilizada como equi/conv 
            $sql_free ="SELECT * FROM `free_courses` WHERE crse_label = $og_crse";
                $result_free = mysqli_query($conn, $sql);
                $resultCheck_free = mysqli_num_rows($result_free);
                if($resultCheck_free > 0){
                    $row_free = mysqli_fetch_assoc($result_free); // variables de tabla free_courses para los creditos
                }
                        if($resultCheck === 0){
                             // query para sacar nota de curso siendo equi/conva 
                             $sql ="SELECT crse_grade FROM `student_record` WHERE crse_label = $og_crse AND stdnt_number = '$student_id'";
                             $result = mysqli_query($conn, $sql);
                             $resultCheck = mysqli_num_rows($result);
                             $row = mysqli_fetch_assoc($result);  // nota de curso siendo equi/conva 
                         
                            if($resultCheck_free > 0){ 

                                if($tabla == 'mandatory_courses' && ($row['crse_grade'] === 'A' || $row['crse_grade'] === 'B' || $row['crse_grade'] === 'C')){
                                    $nota = "P";
                                }elseif($tabla == "departamenta_courses" && ($row['crse_grade'] === 'A' || $row['crse_grade'] === 'B' || $row['crse_grade'] === 'C')){
                                    $nota = "P";
                                }elseif($tabla == "general_courses" && ($row['crse_grade'] === 'A' || $row['crse_grade'] === 'B' || $row['crse_grade'] === 'C' || $row['crse_grade'] === 'D')){
                                    $nota = "P";
                                }
                                if($tipo == 'crse_equivalence'){
                                    $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number, crse_label, crse_grade, crse_status, semeste_pass, crse_equivalence, crse_credits_ER) VALUES (?, ?, ?, ?, ?, ?, ?)");
                                }else if ($tipo == 'crse_recognition'){
                                    $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number, crse_label, crse_grade, crse_status, semeste_pass, crse_recognition, crse_credits_ER) VALUES (?, ?, ?, ?, ?, ?, ?)");
                                }
                                $crse_name = "{$row_free['crse_name']} {$row_free['crse_description']}";
                                $crse_status = 1;
                                $stmt->bind_param('sisissi', $student_id, $clase, $nota, $crse_status, $row['semester_pass'], $crse_name, $row_free['crse_credits']);
                                // Prepare statement
                                if ($stmt->execute()) {
                                    // borrar la clase siendo equi/conv del expediente
                                    $sql = "DELETE FROM student_record WHERE stdnt_number = '$student_id' AND crse_label = $og_crse";
                                    $del_stmt = $conn->prepare($sql);
                                    if ($del_stmt->execute()) {
                                    header('Location: ../est_profile.php');
                                    $stmt->close();
                                    $del_stmt->close();
                                }else {
                                    echo "No se pudo procesar su $tipo.";
                                }
                                }else {
                                    echo "No se pudo procesar su $tipo.";
                                }
            
                            
                        }
                    }elseif($resultCheck > 0){
                            $class_row = mysqli_fetch_assoc($result);
                            if($resultCheck_free > 0){
                                $crse_name = "{$row_free['crse_name']} {$row_free['crse_description']}";
                                if($tabla == 'mandatory_courses' && ($row['crse_grade'] === 'A' || $row['crse_grade'] === 'B' || $row['crse_grade'] === 'C')){
                                    $nota = "P";
                                }elseif($tabla == "departamenta_courses" && ($row['crse_grade'] === 'A' || $row['crse_grade'] === 'B' || $row['crse_grade'] === 'C')){
                                    $nota = "P";
                                }elseif($tabla == "general_courses" && ($row['crse_grade'] === 'A' || $row['crse_grade'] === 'B' || $row['crse_grade'] === 'C' || $row['crse_grade'] === 'D')){
                                    $nota = "P";
                                }else{
                                    $nota = "NP";
                                }
                                if($tipo == 'crse_equivalence'){
                                    $año = "{$row_free['semester_pass']}";
                                    $pre_clase = "{$class_row['crse_equivalence']}";
                                    $sql = "UPDATE student_record 
                                    SET crs_grade = '$nota', semester_pass = '$año',  crse_equivalence = '$pre_clase | $crse_name', crse_credits_ER = ({$class_row['crse_credits_ER']} + {$row_free['crse_credits']})
                                    WHERE stdnt_number = '$student_id' AND crse_label = $clase";
                                    $stmt = $conn->prepare($sql);
                                }else if ($tipo == 'crse_recognition'){
                                    $año = "{$row_free['semester_pass']}";
                                    $pre_clase = "{$class_row['crse_recognition']}";
                                    $sql = "UPDATE student_record 
                                    SET crs_grade = '$nota', semester_pass = '$año',  crse_recognnition = '$pre_clase | $crse_name', crse_credits_ER = ({$class_row['crse_credits_ER']} + {$row_free['crse_credits']})
                                    WHERE stdnt_number = '$student_id' AND crse_label = $clase";
                                    $stmt = $conn->prepare($sql);
                                }
                                // Prepare statement
                                if ($stmt->execute()) {
                                    // borrar la clase siendo equi/conv del expediente
                                    $sql = "DELETE FROM student_record WHERE stdnt_number = '$student_id' AND crse_label = $og_crse";
                                    $del_stmt = $conn->prepare($sql);
                                    if ($del_stmt->execute()) {
                                    header('Location: ../est_profile.php');
                                    $stmt->close();
                                    $del_stmt->close();
                                }else {
                                    echo "No se pudo procesar su $tipo.";
                                }
                                }else {
                                    echo "No se pudo procesar su $tipo.";
                                }
            
                            }
                        }
                
                    }
?>