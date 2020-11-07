<?php
session_start();
if (isset($_POST['rec-submit'])) {
require '../../private/dbconnect.php';
    $id_est = mysqli_real_escape_string($conn, $_POST['id_est']);
    $id_fijo = mysqli_real_escape_string($conn, $_POST['id_fijo']);
    $estatus_R = mysqli_real_escape_string($conn, $_POST['estatus_R']);

    $stmt = $conn->prepare("INSERT INTO expediente (id_est,	id_fijo, estatus_R) VALUES (?, ?, ?)");
    
    $stmt->bind_param('iii', $id_est, $id_fijo, $estatus_R);
    // Prepare statement    
    if ($stmt->execute()) {
        header('Location: ../consejeria.php');
   }else {
     echo "No se pudo procesar su sugerencia.";
   }
$stmt->close();
    
}

?>