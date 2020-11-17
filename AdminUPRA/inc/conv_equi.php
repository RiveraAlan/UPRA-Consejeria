<?php
if (isset($_POST['conv_env-submit'])) {
require 'connection.php';
session_start();
    $student_id = $_SESSION['stdnt_number'];
    $tipo = $_POST['tipo'];
    $tabla = $_POST['conv_env-submit'];
    
    if($tabla == "mandatory_courses"){
        $clase = mysqli_real_escape_string($conn, $_POST['course_mand']);
    }else if($tabla == "general_courses"){
        $clase = mysqli_real_escape_string($conn, $_POST['course_gen']);
    }else if($tabla == "departamental_courses"){
        $clase = mysqli_real_escape_string($conn, $_POST['course_dept']);
    }

        $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number, crse_label, crseR_status) VALUES (?, ?, ?)");
    
        $stmt->bind_param('iii', $stdnt_number, $crse_label, $crseR_status);
        // Prepare statement
        if ($stmt->execute()) {
            header('Location: ../est_prostudent_record.php');
            $stmt->close();
        }else {
            echo "No se pudo procesar su sugerencia.";
        }
        

}
?>