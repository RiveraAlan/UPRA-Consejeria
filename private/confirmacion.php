<?php
session_start();
if (isset($_POST['confirm-submit'])) {
require 'dbconnect.php';
    $id_est = $_SESSION['id_est'];
    $id_fijo = mysqli_real_escape_string($conn, $_POST['id_fijo']);
    $id_especial = NULL;
    $nota_c = NULL;
    $estatus_c = 3;
    $año_aprobo_c = NULL;
    $convalidación_c = NULL;
    $equivalencia_c = NULL;
    $créditos_C_E = NULL;
    $estatus_R = NULL;

    $stmt = $conn->prepare("INSERT INTO expediente (id_est,	id_fijo, id_especial, nota_c, estatus_c, año_aprobo_c, convalidación_c, equivalencia_c, créditos_C_E, estatus_R) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param('iiisisssii', $id_est, $id_fijo, $id_especial, $nota_c, $estatus_c, $año_aprobo_c, $convalidación_c, $equivalencia_c, $créditos_C_E, $estatus_R);
    // Prepare statement    
    if ($stmt->execute()) {
        header('Location: ../consejeria.php');
   } else {
     echo "Unable to create record";
   }
   
       $stmt->close();

}

?>