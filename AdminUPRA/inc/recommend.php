<?php
if (isset($_POST['rec-submit'])) {
require '../../private/dbconnect.php';
    $stdnt_number = mysqli_real_escape_string($conn, $_POST['stdnt_number']);
    $crse_label = mysqli_real_escape_string($conn, $_POST['crse_label']);

    $sql = "SELECT crse_label, crseR_status FROM student_record WHERE crse_label = $crse_label";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if($row['crseR_status'] == 0){
        $crseR_status = 1; 
    }else{
        $crseR_status = 0; 
    }

    if($resultCheck > 0){
    $sql = "UPDATE student_record SET crseR_status = $crseR_status WHERE stdnt_number = '$stdnt_number' AND crse_label = $crse_label";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    //exit
    header("Location: ../est_profile.php");
    exit();
    
    }
}
?>