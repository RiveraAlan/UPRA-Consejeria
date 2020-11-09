<?php
session_start();
if (isset($_POST['rec-submit'])) {
require '../../private/dbconnect.php';
    $stdnt_number = mysqli_real_escape_string($conn, $_POST['stdnt_number']);
    $crse_label = mysqli_real_escape_string($conn, $_POST['crse_label']);
    $estatus_R = mysqli_real_escape_string($conn, $_POST['estatus_R']);

    $sql="SELECT crse_label FROM student_record WHERE crse_label = $crse_label";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
             
    if($resultCheck > 0){
    $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $crse_label";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    //exit
    header("Location: ../est_prostudent_record.php");
    exit();
    
    }else{
        $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number,	crse_label, estatus_R) VALUES (?, ?, ?)");
    
        $stmt->bind_param('iii', $stdnt_number, $crse_label, $estatus_R);
        // Prepare statement
        if ($stmt->execute()) {
            header('Location: ../est_prostudent_record.php');
            $stmt->close();
        }else {
            echo "No se pudo procesar su sugerencia.";
        }
        
}
}
?>