<?php
session_start();
if (isset($_POST['suge-submit'])) {
require 'dbconnect.php';
    $stdnt_number = $_SESSION['stdnt_number'];
    $ids = (isset($_POST['sugerencia'])) ? $_POST['sugerencia'] : array();
    $crse_status = 3;
    if (count($ids) > 0) { 
      foreach ($ids as $crse_label) {  
        $sql ="SELECT  crse_label
        FROM file WHERE stdnt_number = $stdnt_number AND crse_label = $crse_label";
         $result = mysqli_query($conn, $sql);
         $resultCheck = mysqli_num_rows($result);
  
     if($resultCheck > 0){
      echo "No se pudo procesar su sugerencia.";
}  else {
$stmt = $conn->prepare("INSERT INTO file (stdnt_number,	crse_label, crse_status) VALUES (?, ?, ?)");

$stmt->bind_param('iii', $stdnt_number, $crse_label, $crse_status);
// Prepare statement    
if ($stmt->execute()) {
header('Location: ../consejeria.php');
}
$stmt->close();
} 
      }  
  } else { 
      echo "No skill has been selected"; 
  } 
  
   
    
}

?>