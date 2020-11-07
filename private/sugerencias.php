<?php
session_start();
if (isset($_POST['suge-submit'])) {
require 'dbconnect.php';
    $id_est = $_SESSION['id_est'];
    $ids = (isset($_POST['sugerencia'])) ? $_POST['sugerencia'] : array();
    $estatus_c = 3;
    if (count($ids) > 0) { 
      foreach ($ids as $id_fijo) {  
        $sql ="SELECT  id_fijo
        FROM expediente WHERE id_est = $id_est AND id_fijo = $id_fijo";
         $result = mysqli_query($conn, $sql);
         $resultCheck = mysqli_num_rows($result);
  
     if($resultCheck > 0){
      echo "No se pudo procesar su sugerencia.";
}  else {
$stmt = $conn->prepare("INSERT INTO expediente (id_est,	id_fijo, estatus_c) VALUES (?, ?, ?)");

$stmt->bind_param('iii', $id_est, $id_fijo, $estatus_c);
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