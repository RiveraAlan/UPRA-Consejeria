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
    $sql ="SELECT * FROM `free_courses` WHERE crse_label = $og_crse";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                         if($resultCheck > 0){
                            $row = mysqli_fetch_assoc($result);
                            if($tipo == 'crse_equivalence'){
                                $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number, crse_label, crse_grade, crse_status, crse_equivalence, crse_credits_ER) VALUES (?, ?, ?, ?, ?, ?)");
                                echo "hello there";
                            }else if ($tipo == 'crse_recognition'){
                                $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number, crse_label, crse_grade, crse_status, crse_recognition, crse_credits_ER) VALUES (?, ?, ?, ?, ?, ?)");
                                echo "over here";
                            }
                            $crse_name = "{$row['crse_name']} {$row['crse_description']}";
                            $crse_status = 1;
                            $stmt->bind_param('sisisi', $student_id, $clase, $row['crse_grade'], $crse_status, $crse_name, $row['crse_credits']);
                            // Prepare statement
                            if ($stmt->execute()) {
                                header('Location: ../est_profile.php');
                                $stmt->close();
                            }else {
                                echo "No se pudo procesar su $tipo.";
                            }
        
    }
}
?>