<?php
if (isset($_POST['notes-submit'])) {
require 'connection.php';
    $id_est = mysqli_real_escape_string($conn, $_POST['id_est']);
    $nombre_c = mysqli_real_escape_string($conn, $_POST['nombre_c']);
    $estatus_R = mysqli_real_escape_string($conn, $_POST['estatus_R']); 

            if($estatus_R == 0){
                $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND nombre_c = '$nombre_c'";
            }else{
                $sql = "UPDATE expediente SET estatus_R = 0 WHERE id_est = $id_est AND nombre_c = '$nombre_c'";
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