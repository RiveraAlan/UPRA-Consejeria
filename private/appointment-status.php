<?php
include 'dbconnect.php';

$stmt = $conn->prepare("SELECT fecha_cita FROM citas WHERE est_id = ?");

$stmt->bind_param('i', $_SESSION['est_id']);

$stmt->execute();

$stmt->store_result();
  
$isAppointmentValid = FALSE;

if ($stmt->num_rows > 0) {
    $stmt->bind_result($fecha_cita);
    $stmt->fetch();
    
    $current_date= date_create();
    $current_date = date_format($current_date,"Y-m-d H:i:s");
   

    if($fecha_cita > $current_date){
        $isAppointmentValid  = TRUE;
       
    } else {
         // DELETE APPOINTMENT FROM DATABASE
         $stmt = $conn->prepare("DELETE FROM citas WHERE est_id = ?");

         $stmt->bind_param('i', $_SESSION['est_id']);

         $stmt->execute();
    }
    
}

$stmt->close();
