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
}
?>