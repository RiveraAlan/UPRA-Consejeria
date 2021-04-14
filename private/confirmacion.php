<?php
session_start();
if (isset($_POST['confirm-submit'])) {
require 'dbconnect.php';
    $stdnt_number = $_SESSION['stdnt_number'];
    $ids = (isset($_POST['crse_code'])) ? $_POST['crse_code'] : array();
    $clase = mysqli_real_escape_string($conn, $_POST['clase']);
  
    if (count($ids) > 0) { 
      foreach ($ids as $crse_code) {          
        if($clase == 'general'){
          $sql = "UPDATE stdnt_record SET crse_status = 4 WHERE stdnt_number = '$stdnt_number' AND crse_code = $crse_code";
                  // Prepare statement
                  $stmt = $conn->prepare($sql);
                  // execute the query
                  $stmt->execute();
        }elseif($clase == 'HUMA'){
          $sql = "UPDATE counseling_special_details SET crse_confirmation = 1 WHERE stdnt_number = '$stdnt_number' AND crse_code = $crse_code";
                  // Prepare statement
                  $stmt = $conn->prepare($sql);
                  // execute the query
                  $stmt->execute();
        }elseif($clase == 'CISO'){
          $sql = "UPDATE counseling_special_details SET crse_confirmation = 1 WHERE stdnt_number = '$stdnt_number' AND crse_code = $crse_code";
                  // Prepare statement
                  $stmt = $conn->prepare($sql);
                  // execute the query
                  $stmt->execute();
        }elseif($clase == 'FREE'){
          $sql = "UPDATE counseling_special_details SET crse_confirmation = 1 WHERE stdnt_number = '$stdnt_number' AND crse_code = $crse_code";
                  // Prepare statement
                  $stmt = $conn->prepare($sql);
                  // execute the query
                  $stmt->execute();
        }elseif($clase == 'DEP'){
          $sql = "UPDATE counseling_special_details SET crse_confirmation = 1 WHERE stdnt_number = '$stdnt_number' AND crse_code = $crse_code";
                  // Prepare statement
                  $stmt = $conn->prepare($sql);
                  // execute the query
                  $stmt->execute();
        }
        
                  //exit
      }

      $sql = "UPDATE stdnt_record_details SET conducted_counseling = 1 WHERE stdnt_number = '$stdnt_number'";
                  // Prepare statement
                  $stmt = $conn->prepare($sql);
                  // execute the query
                  $stmt->execute();
      header("Location: ../consejeria.php");
                  exit();
    }
   
    
}
?>