<?php
if (isset($_POST['edit_crse-submit'])) {
require '../../private/dbconnect.php';
session_start();

    $stdnt_number = $_SESSION['stdnt_number'];
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);

    $sql = "SELECT crse_label, crseR_status FROM student_record WHERE crse_label = $course";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    
    if($resultCheck > 0){
    $sql = "UPDATE student_record SET crse_grade = '$grade', semester_pass = '$semester' WHERE stdnt_number = '$stdnt_number' AND crse_label = $course";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    //exit
    header("Location: ../est_profile.php");
    exit(); 
    }else{
        header("Location: ../est_profile.php?=ERROR:UPDATE-FAILED");
        exit();   
    }
}
?>