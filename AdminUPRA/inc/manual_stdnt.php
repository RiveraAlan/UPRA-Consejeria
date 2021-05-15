<?php
if (isset($_POST['Manual'])) {
session_start();
    require 'connection.php';
    $advisor_id = $_SESSION['adv_email'];

    $sql = "SELECT adv_major FROM `advisor` WHERE adv_email = '$advisor_id'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
    $row = mysqli_fetch_assoc($result);
    $cohort = $row['adv_major'];
    }
    $stdnt_email = mysqli_real_escape_string($conn, $_POST['stdnt_email']);
    $stdnt_password = mysqli_real_escape_string($conn, $_POST['stdnt_password']);
    $stdnt_number = mysqli_real_escape_string($conn, $_POST['stdnt_number']);
    $stdnt_name = mysqli_real_escape_string($conn, $_POST['stdnt_name']);
    $stdnt_initial = mysqli_real_escape_string($conn, $_POST['stdnt_initial']);
    $stdnt_lastname1 = mysqli_real_escape_string($conn, $_POST['stdnt_lastname1']);
    $stdnt_lastname2 = mysqli_real_escape_string($conn, $_POST['stdnt_lastname2']);
    $cohort_year = mysqli_real_escape_string($conn, $_POST['cohort_year']);
    $stdnt_origin = mysqli_real_escape_string($conn, $_POST['inicio']);

    $date=getdate(date("U"));

    $sql = "SELECT stdnt_number FROM `student` WHERE stdnt_number = '$stdnt_number'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        $sql = "UPDATE student SET stdnt_email = $stdnt_email, stdnt_password = $stdnt_password, stdnt_lastname1 = $stdnt_lastname1, 
        stdnt_lastname2 = $stdnt_lastname2, stdnt_name = $stdnt_name, stdnt_initial = $stdnt_initial, stdnt_major = $cohort, cohort_year =  $cohort_year WHERE stdnt_number = '$stdnt_number'";
        echo $sql;
        echo "<br>";
        // Prepare statement
        // $stmt = $conn->prepare($sql);
        // execute the query
        // $stmt->execute();
        //exit
        // header("Location: ../inicio.php");
        // exit();
    }else {
        $sql = "INSERT INTO Student (stdnt_email,stdnt_password,stdnt_number, stdnt_lastname1, stdnt_lastname2,stdnt_name, stdnt_initial, stdnt_major, cohort_year, stdnt_origin) 
        values('$stdnt_email', '$stdnt_password' ,'$stdnt_number', '$stdnt_lastname1', '$stdnt_lastname2', '$stdnt_name', '$stdnt_initial', '$cohort', $cohort_year, '$stdnt_origin');";
        // Prepare statement
        // $stmt = $conn->prepare($sql);
        // execute the query
        // $stmt->execute();
        echo $sql;
        echo "<br>";
        $sql = "INSERT INTO record_details (stdnt_number, performed_date, modify_date, adv_comments, conducted_counseling, record_status) 
        values('$stdnt_number','{$date['year']}-{$date['mon']}-{$date['mday']}', '{$date['year']}-{$date['mon']}-{$date['mday']}',NULL,0, 1);";
        echo $sql;
        echo "<br>";
        // Prepare statement
        // $stmt = $conn->prepare($sql);
        // execute the query
        // $stmt->execute();
        //exit
        // header("Location: ../inicio.php");
        // exit();
    }
    }
?>