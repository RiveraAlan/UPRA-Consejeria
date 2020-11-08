<?php
session_start();
if (isset($_POST['confirm-submit'])) {
require 'dbconnect.php';
    $id_est = $_SESSION['id_est'];
    $ids = (isset($_POST['id_fijo'])) ? $_POST['id_fijo'] : array();
  
    if (count($ids) > 0) { 
      foreach ($ids as $id_fijo) {          
        $sql = "UPDATE expediente SET estatus_R = 0 WHERE id_est = $id_est AND id_fijo = $id_fijo";
                  // Prepare statement
                  $stmt = $conn->prepare($sql);
                  // execute the query
                  $stmt->execute();
        $sql = "UPDATE expediente SET estatus_c = 4 WHERE id_est = $id_est AND id_fijo = $id_fijo";
                  // Prepare statement
                  $stmt = $conn->prepare($sql);
                  // execute the query
                  $stmt->execute();
                  //exit
                  
      }
      header("Location: ../consejeria.php");
                  exit();
    }
   
    
}
?>