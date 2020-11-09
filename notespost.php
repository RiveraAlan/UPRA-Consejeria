<?php
if (isset($_POST['notes-submit'])) {
require 'connection.php';
    $stdnt_number = mysqli_real_escape_string($conn, $_POST['stdnt_number']);
    $crse_name = mysqli_real_escape_string($conn, $_POST['crse_name']);
    $estatus_R = mysqli_real_escape_string($conn, $_POST['estatus_R']); 

            if($estatus_R == 0){
                $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_name = '$crse_name'";
            }else{
                $sql = "UPDATE student_record SET estatus_R = 0 WHERE stdnt_number = $stdnt_number AND crse_name = '$crse_name'";
            }
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            //exit
            header("Location: ../est_prostudent_record.php");
            exit();
    
    }
else {
    header("Location: ../est_prostudent_record.php");
    exit();
}
?>