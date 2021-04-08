<?php
// if (isset($_POST['submitAll'])) {
require '../../private/dbconnect.php';
    $dept = mysqli_real_escape_string($conn, $_POST['dept']);
    $cohort_year = mysqli_real_escape_string($conn, $_POST['cohort_year']);
    $concentracion = mysqli_real_escape_string($conn, $_POST['concentracion']);
    $general = mysqli_real_escape_string($conn, $_POST['general']);
    $cred_dept = mysqli_real_escape_string($conn, $_POST['cred_dept']);
    $cred_free = mysqli_real_escape_string($conn, $_POST['cred_free']);
    $cred_ciso = mysqli_real_escape_string($conn, $_POST['cred_ciso']);
    $pre_co = mysqli_real_escape_string($conn, $_POST['pre_co']);
    $class_arr = mysqli_real_escape_string($conn, $_POST['class_arr']);
    
    echo $dept, " ", $cohort_year, " ", $concentracion, " ", $general, " ", $cred_dept;
    
// }
?>