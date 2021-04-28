<?php
session_start();
if (isset($_POST['confirm-submit'])) {
require 'dbconnect.php';
    $stdnt_number = $_SESSION['stdnt_number'];
    $ids = $_POST['crse_code'];
    print_r($_POST);
//  $clase = mysqli_real_escape_ string($conn, $_POST['clase']);
// echo $clase;
// SELECT crse_code 
// FROM stdnt_record
// WHERE stdnt_number = ' ' AND crse_code = ' '
    // if (count($ids) > 0) { 
    //   foreach ($ids as $crse_code) {  
    //     echo "hey";
      //           //chequear si existe en el expediente
      //           // si existe le damos update
      //           // si no, le damos insert 
      //   if(existe){
      //     $sql = "INSERT INTO stdnt_record (stdnt_number, crse_code, crse_status)
      //             VALUES ('$stdnt_number', '$crse_code', 4)";
      //             // Prepare statement
      //             $stmt = $conn->prepare($sql);
      //             // execute the query
      //             $stmt->execute();
      //   }elseif(no existe){
      //     $sql = "UPDATE stdnt_record SET crse_status = 4 WHERE crse_code = '$crse_code' AND stdnt_number = '$stdnt_number'";
      //             // Prepare statement
      //             $stmt = $conn->prepare($sql);
      //             // execute the query
      //             $stmt->execute();
      //   }
        
      //             //exit
      }

    //   $sql = "UPDATE record_details SET record_status = 1 WHERE stdnt_number = '$stdnt_number'";
    //               // Prepare statement
    //               $stmt = $conn->prepare($sql);
    //               // execute the query
    //               $stmt->execute();
    //   header("Location: ../consejeria.php");
    //               exit();
    // }
   
//     }
// }
?>