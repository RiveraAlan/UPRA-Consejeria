<?php
if (isset($_POST['notes-submit'])) {
require 'connection.php';
    $note = mysqli_real_escape_string($conn, $_POST['text']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    $sql = "SELECT comentarios_e FROM exp_detalles WHERE id_est = $id";
    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
    $sql = "UPDATE exp_detalles SET comentarios_e = '$note' WHERE id_est = $id";
                    
    }
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