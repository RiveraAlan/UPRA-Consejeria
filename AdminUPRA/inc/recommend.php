<?php
if (isset($_POST['rec-submit'])) {
require 'connection.php';
    $id_est = mysqli_real_escape_string($conn, $_POST['id_est']);
    $id_fijo = mysqli_real_escape_string($conn, $_POST['id_fijo']);
    $estatus_R = mysqli_real_escape_string($conn, $_POST['estatus_R']); 

            if($estatus_R == 0){
                $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = '$id_fijo'";
            }else{
                $sql = "UPDATE expediente SET estatus_R = 0 WHERE id_est = $id_est AND id_fijo = '$id_fijo'";
            }
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            //exit
            header("Location: ../est_profile.php");
            exit();
    
    }
else {
    header("Location: ../est_profile.php");
    exit();
}
?>