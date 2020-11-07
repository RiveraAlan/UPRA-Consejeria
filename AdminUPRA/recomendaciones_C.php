<?php
session_start();
include 'private/dbconnect.php';

//SELECT (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) AS YY FROM estudiante;

// Query para detectar las notas y cursos que esta tomando 

// Query para recomendar CCOM 3001 
    $query = "SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 1 AND estatus_c = 0 AND
                (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W'))"; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 1){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 3002    
    $query = "SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 2 AND estatus_c =0 AND 
                (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W'))
                OR (id_fijo= 1 AND ( estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C')) 
                OR (id_fijo = 33 AND  (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' ))"; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 3){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 3010    
    $query = " SELECT id_fijo FROM expediente 
        WHERE (id_fijo = 3 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)  
        AND ( nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 1){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 3020    
    $query = " SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 5 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)  
                AND (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')
                OR (id_fijo = 35 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' ))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 3025 
    $query = "  SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 6 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) >= 04)  
                AND (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 1){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 3035 
    $query = "  SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 7 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)  
                AND (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')
                OR (id_fijo = 6 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 3041 

    $query = "  SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 8 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 2 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)  
                AND (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')
                OR (id_fijo = 4 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))
                OR (id_fijo = 7 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 3){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4005
    $query = " SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 9 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04 )  
                AND (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')
                OR (id_fijo = 2 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4006
    $query = "  SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 10 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)  
                AND (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')
                OR (id_fijo = 9 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C')))"; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4007
    $query = " SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 11 AND estatus_c = 0 
                AND (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')
                OR (id_fijo = 5  AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))
                OR (id_fijo = 35 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D'))
                OR (id_fijo = 10 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 4){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4025
    $query = " SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 12 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)
                AND (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')
                OR (id_fijo = 9 AND (estatus_c <> 0  OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4065
    $query = " SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 13 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
                AND (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')
                OR (id_fijo = 9  AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))
                OR (id_fijo = 35 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 3){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4115
    $query = " SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 14 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
                AND (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')
                OR (id_fijo = 12 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4075
    $query = " SELECT id_fijo FROM expediente 
                WHERE (id_fijo = 15 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)
                AND (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')
                OR (id_fijo = 8  AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))
                OR (id_fijo = 10 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))
                OR (id_fijo = 11 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))
                OR (id_fijo = 14 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 5){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar CCOM 4095
    $query = " SELECT id_fijo FROM expediente 
                WHERE(id_fijo = 16 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
                AND (nota_c IS NULL OR nota_c = 'D' OR nota_c = 'F' OR nota_c = 'ID' OR nota_c = 'IF' OR nota_c = 'W')
                OR (id_fijo = 15 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))
                OR (id_fijo = 14 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 3){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
// Query para recomendar los cursos de educacion general 

//Query para recomendar Español I
//FALTA DETECTAR EL A~O DEL ESTUDIANTE 
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 19 OR id_fijo = 21 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 1 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04 )
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 1){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar Español II
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 20 OR id_fijo = 22 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 1 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')
            OR (id_fijo = 19 OR id_fijo = 21 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar Español 3208
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 23 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 2 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')
            OR (id_fijo = 20 OR id_fijo = 22 AND estatus_c <> 0 AND (nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D')))"; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar Ingles I 
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 24 OR id_fijo = 26 OR id_fijo = 29 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04)
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 3){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar Ingles II 
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 25 OR id_fijo = 28 OR id_fijo = 30 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')
            OR (id_fijo = 24 OR id_fijo = 26 OR id_fijo = 29 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D'))) "; 
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar INGL 3015
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 31 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 2 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11)
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')
            OR (id_fijo = 25 OR id_fijo = 26 OR id_fijo = 29 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar MATE 3171 
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 33 AND estatus_c = 0
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 1){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar MATE 3172
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 34 AND estatus_c = 0 
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')
            OR (id_fijo = 33 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar MATE 3031
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 35 AND estatus_c = 0 
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')
            OR (id_fijo = 34 AND ( estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar CISO 
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 17 OR id_fijo = 18 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 3 AND estatus_c = 0 
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 1 OR $resultCheck < 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar CIBI 3001 
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 36 AND estatus_c = 0 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 1 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04) 
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 1){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar CIBI 3002
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 37 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 1 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11) 
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')
            OR (id_fijo = 36 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar FISI 3011 
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 38 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 2 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04) 
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')
            OR (id_fijo = 35 AND ( estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar FISI 3013
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 39 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 2 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 01) AND (MONTH(CURRENT_DATE) <= 04) 
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')
            OR (id_fijo = 35 AND ( estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D')))";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar FISI 3012
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 40 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 2 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11) 
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')
            OR (id_fijo = 38 AND (estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}
//Query para recomendar FISI 3014
 $query = " SELECT id_fijo FROM expediente 
            WHERE (id_fijo = 41 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 2 AND estatus_c = 0 AND (MONTH(CURRENT_DATE) >= 08) AND (MONTH(CURRENT_DATE) <= 11) 
            AND (nota_c IS NULL OR nota_c = 'F' OR nota_c = 'IF' OR nota_c = 'W')
            OR (id_fijo = 39 AND ( estatus_c <> 0 OR nota_c = 'A' OR nota_c = 'B' OR nota_c = 'C' OR nota_c = 'D'))) ";
    $result = mysqli_query($conn,$query);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck = 2){
         $row = mysqli_fetch_assoc($result);
         $sql = "UPDATE expediente SET estatus_R = 1 WHERE id_est = $id_est AND id_fijo = $row[id_fijo]";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            $stmt->close();}

   
     /*  if($creditos_huma < 6 AND (YEAR(CURRENT_DATE)-(SUBSTRING(num_est, 5,2) + 1999)) > 3){
         // SQL UPDATE EXPEDIENTE
      } */
mysqli_close($conn);
