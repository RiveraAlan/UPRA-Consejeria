<?php
if (isset($_POST['rec-submit'])) {
require '../../private/dbconnect.php';
    $stdnt_number = mysqli_real_escape_string($conn, $_POST['stdnt_number']);
    $crse_label = mysqli_real_escape_string($conn, $_POST['crse_label']);

    $sql = "SELECT crse_label, crseR_status FROM student_record WHERE crse_label = $crse_label";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if($row['crseR_status'] === 0){
        $crseR_status = 1; 
    }else{
        $crseR_status = 0; 
    }

    if($resultCheck > 0){
    $sql = "UPDATE student_record SET crseR_status = $crseR_status WHERE stdnt_number = '$stdnt_number' AND crse_label = $crse_label";
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    //exit
    header("Location: ../est_profile.php");
    exit();
    }
}elseif(isset($_POST['rec-adi'])){
    require '../../private/dbconnect.php';
    $stdnt_number = mysqli_real_escape_string($conn, $_POST['stdnt_number']);
    $recomendacion = mysqli_real_escape_string($conn, $_POST['rec-adi']);

    $sql = "SELECT crse_suggestionHUMA, crse_suggestionCISO, crse_suggestionFREE, crse_suggestionDEP FROM counseling_special_details WHERE stdnt_number = '$stdnt_number'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $status = 5;

    if($resultCheck > 0){
        if($recomendacion == 'crse_suggestionHUMA'){
            $sql = "UPDATE counseling_special_details SET  crse_suggestionHUMA = $status WHERE stdnt_number = '$stdnt_number'";
        }elseif($recomendacion == 'crse_suggestionCISO'){
            $sql = "UPDATE counseling_special_details SET  crse_suggestionCISO = $status WHERE stdnt_number = '$stdnt_number'";
        }elseif($recomendacion == 'crse_suggestionFREE'){
            $sql = "UPDATE counseling_special_details SET  crse_suggestionFREE = $status WHERE stdnt_number = '$stdnt_number'";
        }elseif($recomendacion == 'crse_suggestionDEP'){
            $sql = "UPDATE counseling_special_details SET  crse_suggestionDEP = $status WHERE stdnt_number = '$stdnt_number'";
        }

    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    //exit
    header("Location: ../est_profile.php");
    $stmt->close();
    }else{
        if($recomendacion == 'crse_suggestionHUMA'){
            $stmt = $conn->prepare("INSERT INTO counseling_special_details (stdnt_number, crse_suggestionHUMA) VALUES (?, ?)");
        }elseif($recomendacion == 'crse_suggestionCISO'){
            $stmt = $conn->prepare("INSERT INTO counseling_special_details (stdnt_number, crse_suggestionCISO) VALUES (?, ?)");
        }elseif($recomendacion == 'crse_suggestionFREE'){
            $stmt = $conn->prepare("INSERT INTO counseling_special_details (stdnt_number, crse_suggestionFREE) VALUES (?, ?)");
        }elseif($recomendacion == 'crse_suggestionDEP'){
            $stmt = $conn->prepare("INSERT INTO counseling_special_details (stdnt_number, crse_suggestionDEP) VALUES (?, ?)");
        }
        

        // Now we tell the script which variable each placeholder actually refers to using the bindParam() method
        // First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to
        $stmt->bind_param('si', $stdnt_number, $status);
        echo $stdnt_number;
        // Execute the query using the data we just defined
        // The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
        if ($stmt->execute()) {
            header('Location: ../est_profile.php');
        } else {
        echo "Unable to create record";
        }
	    $stmt->close();
    }
}
?>