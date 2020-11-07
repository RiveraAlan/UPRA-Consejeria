<?php
session_start();
if (isset($_POST['rec-submit'])) {
require '../../private/dbconnect.php';
    $id_est = mysqli_real_escape_string($conn, $_POST['id_est']);
    $id_fijo = mysqli_real_escape_string($conn, $_POST['id_fijo']);
    $estatus_R = mysqli_real_escape_string($conn, $_POST['estatus_R']);

    $sql="SELECT id_fijo FROM expediente WHERE id_fijo = $id_fijo";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
             
    if($resultCheck > 0){
    $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $id_fijo";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    //exit
    header("Location: ../est_profile.php");
    exit();
    
    }else{
        $stmt = $conn->prepare("INSERT INTO expediente (id_est,	id_fijo, estatus_R) VALUES (?, ?, ?)");
    
        $stmt->bind_param('iii', $id_est, $id_fijo, $estatus_R);
        // Prepare statement
        if ($stmt->execute()) {
            header('Location: ../est_profile.php');
            $stmt->close();
        }else {
            echo "No se pudo procesar su sugerencia.";
        }
        
}
}
?>