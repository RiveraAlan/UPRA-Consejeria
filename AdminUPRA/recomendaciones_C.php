<?php
session_start();
$stdnt_number = $_SESSION['stdnt_number'];
include '../private/dbconnect.php';

//SELECT (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) AS YY FROM student;

// Query para detectar las notas y cursos que esta tomando 

// Query para recomendar CCOM 3001 
    $query = "SELECT crse_label FROM student_record 
                WHERE (crse_label = 1 AND crse_status = 0 AND
                (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W'))"; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 1){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 3002    
    $query = "SELECT crse_label FROM student_record 
                WHERE (crse_label = 2 AND crse_status =0 AND 
                (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W'))
                OR (crse_label= 1 AND ( crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C')) 
                OR (crse_label = 33 AND  (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' ))"; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 3){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 3010    
    $query = " SELECT crse_label FROM student_record 
        WHERE (crse_label = 3 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)  
        AND ( crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 1){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 3020    
    $query = " SELECT crse_label FROM student_record 
                WHERE (crse_label = 5 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)  
                AND (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')
                OR (crse_label = 35 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' ))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 3025 
    $query = "  SELECT crse_label FROM student_record 
                WHERE (crse_label = 6 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) >= 04)  
                AND (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 1){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 3035 
    $query = "  SELECT crse_label FROM student_record 
                WHERE (crse_label = 7 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)  
                AND (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')
                OR (crse_label = 6 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 3041 

    $query = "  SELECT crse_label FROM student_record 
                WHERE (crse_label = 8 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 2 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)  
                AND (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')
                OR (crse_label = 4 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))
                OR (crse_label = 7 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 3){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4005
    $query = " SELECT crse_label FROM student_record 
                WHERE (crse_label = 9 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04 )  
                AND (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')
                OR (crse_label = 2 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4006
    $query = "  SELECT crse_label FROM student_record 
                WHERE (crse_label = 10 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)  
                AND (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')
                OR (crse_label = 9 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C')))"; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4007
    $query = " SELECT crse_label FROM student_record 
                WHERE (crse_label = 11 AND crse_status = 0 
                AND (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')
                OR (crse_label = 5  AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))
                OR (crse_label = 35 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D'))
                OR (crse_label = 10 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 4){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4025
    $query = " SELECT crse_label FROM student_record 
                WHERE (crse_label = 12 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)
                AND (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')
                OR (crse_label = 9 AND (crse_status <> 0  OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4065
    $query = " SELECT crse_label FROM student_record 
                WHERE (crse_label = 13 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
                AND (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')
                OR (crse_label = 9  AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))
                OR (crse_label = 35 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 3){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4115
    $query = " SELECT crse_label FROM student_record 
                WHERE (crse_label = 14 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
                AND (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')
                OR (crse_label = 12 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4075
    $query = " SELECT crse_label FROM student_record 
                WHERE (crse_label = 15 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)
                AND (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')
                OR (crse_label = 8  AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))
                OR (crse_label = 10 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))
                OR (crse_label = 11 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))
                OR (crse_label = 14 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 5){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4095
    $query = " SELECT crse_label FROM student_record 
                WHERE(crse_label = 16 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
                AND (crse_grade IS NULL OR crse_grade = 'D' OR crse_grade = 'F' OR crse_grade = 'ID' OR crse_grade = 'IF' OR crse_grade = 'W')
                OR (crse_label = 15 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))
                OR (crse_label = 14 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 3){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar los cursos de educacion general 

//Query para recomendar Español I
//FALTA DETECTAR EL A~O DEL student 
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 19 OR crse_label = 21 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 1 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04 )
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 1){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar Español II
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 20 OR crse_label = 22 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 1 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')
            OR (crse_label = 19 OR crse_label = 21 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar Español 3208
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 23 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 2 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')
            OR (crse_label = 20 OR crse_label = 22 AND crse_status <> 0 AND (crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D')))"; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar Ingles I 
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 24 OR crse_label = 26 OR crse_label = 29 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 3){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar Ingles II 
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 25 OR crse_label = 28 OR crse_label = 30 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')
            OR (crse_label = 24 OR crse_label = 26 OR crse_label = 29 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar INGL 3015
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 31 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 2 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')
            OR (crse_label = 25 OR crse_label = 26 OR crse_label = 29 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar MATE 3171 
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 33 AND crse_status = 0
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 1){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar MATE 3172
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 34 AND crse_status = 0 
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')
            OR (crse_label = 33 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar MATE 3031
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 35 AND crse_status = 0 
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')
            OR (crse_label = 34 AND ( crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar CISO 
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 17 OR crse_label = 18 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 3 AND crse_status = 0 
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0 AND $resultCheck < 3){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar CIBI 3001 
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 36 AND crse_status = 0 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 1 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04) 
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 1){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar CIBI 3002
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 37 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 1 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11) 
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')
            OR (crse_label = 36 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar FISI 3011 
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 38 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 2 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04) 
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')
            OR (crse_label = 35 AND ( crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar FISI 3013
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 39 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 2 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04) 
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')
            OR (crse_label = 35 AND ( crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D')))";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar FISI 3012
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 40 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 2 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11) 
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')
            OR (crse_label = 38 AND (crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar FISI 3014
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = 41 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 2 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11) 
            AND (crse_grade IS NULL OR crse_grade = 'F' OR crse_grade = 'IF' OR crse_grade = 'W')
            OR (crse_label = 39 AND ( crse_status <> 0 OR crse_grade = 'A' OR crse_grade = 'B' OR crse_grade = 'C' OR crse_grade = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE student_record SET estatus_R = 1 WHERE stdnt_number = $stdnt_number AND crse_label = $row[crse_label]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}

   $estatus_R = 1;
//Query para recomendar ELECTIVA LIBRE
 $query = " SELECT crse_label FROM student_record 
            WHERE (crse_label = -1 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 2 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 2){
         $row = mysqli_fetch_assoc($result);
         $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number,	crse_label, crse_status) VALUES (?, ?, ?)");

$stmt->bind_param('iii', $stdnt_number, $row['crse_label'], $estatus_R);
// Prepare statement    
$stmt->execute();
   $stmt->close();}    

//Query para recomendar ELECTIVA LIBRE
$query = " SELECT crse_label FROM student_record 
   WHERE (crse_label = -2 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 2 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)";
   $result = mysqli_query($conn,$query);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck == 2){
   $row = mysqli_fetch_assoc($result);
   $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number,	crse_label, crse_status) VALUES (?, ?, ?)");

   $stmt->bind_param('iii', $stdnt_number, $row['crse_label'], $estatus_R);
// Prepare statement    
$stmt->execute();
   $stmt->close();}   

//Query para recomendar ELECTIVA LIBRE
$query = " SELECT crse_label FROM student_record 
   WHERE (crse_label = -3 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 3 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)";
   $result = mysqli_query($conn,$query);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck == 2){
   $row = mysqli_fetch_assoc($result);
   $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number,	crse_label, crse_status) VALUES (?, ?, ?)");

   $stmt->bind_param('iii', $stdnt_number, $row['crse_label'], $estatus_R);
// Prepare statement    
$stmt->execute();
   $stmt->close();} 

//Query para recomendar ELECTIVA LIBRE
$query = " SELECT crse_label FROM student_record 
   WHERE (crse_label = -4 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 3 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)";
   $result = mysqli_query($conn,$query);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck == 2){
   $row = mysqli_fetch_assoc($result);
   $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number,	crse_label, crse_status) VALUES (?, ?, ?)");

   $stmt->bind_param('iii', $stdnt_number, $row['crse_label'], $estatus_R);
// Prepare statement    
$stmt->execute();
   $stmt->close();} 

//Query para recomendar ELECTIVA DEPARTAMENTAL
$query = " SELECT crse_label FROM student_record 
   WHERE (crse_label = -5 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 3 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)";
   $result = mysqli_query($conn,$query);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck == 2){
   $row = mysqli_fetch_assoc($result);
   $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number,	crse_label, crse_status) VALUES (?, ?, ?)");

   $stmt->bind_param('iii', $stdnt_number, $row['crse_label'], $estatus_R);
// Prepare statement    
$stmt->execute();
   $stmt->close();}   

//Query para recomendar ELECTIVA DEPARTAMENTALES
$query = " SELECT crse_label FROM student_record 
   WHERE (crse_label = -6 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 1 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)";
   $result = mysqli_query($conn,$query);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck == 2){
   $row = mysqli_fetch_assoc($result);
   $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number,	crse_label, crse_status) VALUES (?, ?, ?)");

   $stmt->bind_param('iii', $stdnt_number, $row['crse_label'], $estatus_R);
// Prepare statement    
$stmt->execute();
   $stmt->close();}  

//Query para recomendar ELECTIVA DEPARTAMENTALES
$query = " SELECT crse_label FROM student_record 
   WHERE (crse_label = -7 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 2 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)";
   $result = mysqli_query($conn,$query);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck == 2){
   $row = mysqli_fetch_assoc($result);
   $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number,	crse_label, crse_status) VALUES (?, ?, ?)");

   $stmt->bind_param('iii', $stdnt_number, $row['crse_label'], $estatus_R);
// Prepare statement    
$stmt->execute();
   $stmt->close();} 

//Query para recomendar ELECTIVA DEPARTAMENTALES
$query = " SELECT crse_label FROM student_record 
   WHERE (crse_label = -8 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 2 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)";
   $result = mysqli_query($conn,$query);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck == 2){
   $row = mysqli_fetch_assoc($result);
   $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number,	crse_label, crse_status) VALUES (?, ?, ?)");

   $stmt->bind_param('iii', $stdnt_number, $row['crse_label'], $estatus_R);
// Prepare statement    
$stmt->execute();
   $stmt->close();} 

//Query para recomendar ELECTIVA HUMA
$query = " SELECT crse_label FROM student_record 
   WHERE (crse_label = -9 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 3 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)";
   $result = mysqli_query($conn,$query);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck == 2){
   $row = mysqli_fetch_assoc($result);
   $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number,	crse_label, crse_status) VALUES (?, ?, ?)");

   $stmt->bind_param('iii', $stdnt_number, $row['crse_label'], $estatus_R);
// Prepare statement    
$stmt->execute();
   $stmt->close();}  

//Query para recomendar ELECTIVA HUMA
$query = " SELECT crse_label FROM student_record 
   WHERE (crse_label = -10 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 3 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)";
   $result = mysqli_query($conn,$query);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck == 2){
   $row = mysqli_fetch_assoc($result);
   $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number,	crse_label, crse_status) VALUES (?, ?, ?)");

   $stmt->bind_param('iii', $stdnt_number, $row['crse_label'], $estatus_R);
// Prepare statement    
$stmt->execute();
   $stmt->close();}  

//Query para recomendar ELECTIVA CISO
$query = " SELECT crse_label FROM student_record 
   WHERE (crse_label = -10 AND (YEAR(CURRENT_DATE)-(SUBSTRING(stdnt_number, 5,2) + 1999)) > 3 AND crse_status = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)";
   $result = mysqli_query($conn,$query);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck == 2){
   $row = mysqli_fetch_assoc($result);
   $stmt = $conn->prepare("INSERT INTO student_record (stdnt_number,	crse_label, crse_status) VALUES (?, ?, ?)");

   $stmt->bind_param('iii', $stdnt_number, $row['crse_label'], $estatus_R);
// Prepare statement    
$stmt->execute();
   $stmt->close();} 

mysqli_close($conn);
