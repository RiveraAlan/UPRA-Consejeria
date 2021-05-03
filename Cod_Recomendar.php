<?php

 $sql_SA =  "SELECT crse_code, crse_year, crse_semester 
            FROM cohort
            WHERE crse_major = 'CC COMS BCN'";
                      $result_SA = mysqli_query($conn, $sql_SA);
                      $resultCheck_SA = mysqli_num_rows($result_SA);
                      $row_SA = mysqli_fetch_assoc($result_SA);

 $sql_PC =  "SELECT crse_code, crse_PRE, crse_CO
            FROM cohort INNER JOIN scheme USING (crse_code)
            WHERE crse_major = 'CC COMS BCN' AND crse_code = 'CCOM4007'";
                      $result_PC = mysqli_query($conn, $sql_PC);
                      $resultCheck_PC = mysqli_num_rows($result_PC);
                      $row_PC = mysqli_fetch_assoc($result_PC);

 $sql_PG =  "SELECT crse_grade
            FROM stdnt_record
            WHERE crse_code = 'PRE-RE' AND stdnt_number = '840-16-4235'";
                      $result_PG = mysqli_query($conn, $sql_PG);
                      $resultCheck_PG = mysqli_num_rows($result_PG);
                      $row_PG = mysqli_fetch_assoc($result_PG);

 $sql_CG =  "SELECT crse_grade
            FROM stdnt_record
            WHERE crse_code = 'PRE-CO' AND stdnt_number = '840-16-4235'";
                      $result_CG = mysqli_query($conn, $sql_CG);
                      $resultCheck_CG = mysqli_num_rows($result_CG);
                      $row_CG = mysqli_fetch_assoc($result_CG);





?>