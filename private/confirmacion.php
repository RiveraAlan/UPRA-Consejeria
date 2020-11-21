<?php
session_start();
if (isset($_POST['confirm-submit'])) {
require 'dbconnect.php';
    $stdnt_number = $_SESSION['stdnt_number'];
    $ids = (isset($_POST['crse_label'])) ? $_POST['crse_label'] : array();
  
    if (count($ids) > 0) { 
      foreach ($ids as $crse_label) {          
        $sql = "UPDATE student_record SET crse_status = 4 WHERE stdnt_number = '$stdnt_number' AND crse_label = $crse_label";
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