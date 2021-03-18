<body>
<button onclick="myFunction()">Ciencias de Cómputos</button>
<p id="demo"></p>

<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "<div id="Cohorte"> 
             <div class="tab" id="tabla-cohorte" style="display:none">
              <button class="tablinks" onclick="openCity(event, 'Primer')">Primer Año</button>
              <button class="tablinks" onclick="openCity(event, 'Segundo')">Segundo Año</button>
              <button class="tablinks" onclick="openCity(event, 'Tercero')">Tercer Año</button>
              <button class="tablinks" onclick="openCity(event, 'Cuarto')">Cuarto Año</button>
              <button class="tablinks" onclick="openCity(event, 'HUMA')">Humanidades </button>
              <button class="tablinks" onclick="openCity(event, 'CISO')">Ciencias Sociales</button>
              <button class="tablinks" onclick="openCity(event, 'ElectDept')">Electivas Departamentales</button>
            </div>
                                    <!-- Comienza el TAB del First Year -->
<div id="Primer" class="tabcontent">
  <section>
<table>
  <tr class="bordeC size"><h3>Primer Año - Primer Semestre</h3>
    <th>Código</th>
    <th>Descripción</th>
    <th>Créditos</th>
  </tr>
      
 <tbody>
                                  <?php
                                    
                                    $sql ="SELECT crse_code, crse_description, crse_credits
                                            FROM mandatory_courses
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 1 AND crse_semester = 1
                                            UNION
                                            SELECT crse_code, crse_description, crse_credits
                                            FROM general_courses INNER JOIN general_courses_major USING (crse_code)
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 1 AND crse_semester = 1";
                                  $result = mysqli_query($conn, $sql);
                                  $resultCheck = mysqli_num_rows($result);                                

                              if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                              $sql_grade =" SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'
                                            UNION
                                            SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'";
                                  $result_grade = mysqli_query($conn, $sql_grade);
                                  $resultCheck_grade = mysqli_num_rows($result_grade);                                   
                                  
                                  if($resultCheck_grade > 0){
                                  $row_grade = mysqli_fetch_assoc($result_grade);
                                  
                                  if(      $row_grade['crse_grade'] == 'A' OR $row_grade['crse_grade'] == 'B' OR
                                           $row_grade['crse_grade'] == 'C'){
                                       echo " <tr class='tablaC' width='50%' style='background-color: rgb(0,204,0,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}
                                         else{
                                      echo " <tr class='tablaC' width='50%' style='background-color: rgb(255,153,51,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}} 
                                  else {
                                        echo " <tr class='tablaC'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}}}
                                  
                                                        
                                
?>
</tbody>
</table>
<table>
 <tr class="bordeC size"><h3>Primer Año - Segundo Semestre</h3>
    <th>Código</th>
    <th>Descripción</th>
    <th>Créditos</th>
  </tr>
      
 <tbody>
                                  <?php
                                    
                                   $sql ="SELECT crse_code, crse_description, crse_credits
                                            FROM mandatory_courses
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 1 AND crse_semester = 2
                                            UNION
                                            SELECT crse_code, crse_description, crse_credits
                                            FROM general_courses INNER JOIN general_courses_major USING (crse_code)
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 1 AND crse_semester = 2";
                                  $result = mysqli_query($conn, $sql);
                                  $resultCheck = mysqli_num_rows($result);
                            
                           if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                              $sql_grade =" SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'
                                            UNION
                                            SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'";
                                  $result_grade = mysqli_query($conn, $sql_grade);
                                  $resultCheck_grade = mysqli_num_rows($result_grade);                                   
                                  
                                  if($resultCheck_grade > 0){
                                  $row_grade = mysqli_fetch_assoc($result_grade);
                                  
                                  if(      $row_grade['crse_grade'] == 'A' OR $row_grade['crse_grade'] == 'B' OR
                                           $row_grade['crse_grade'] == 'C'){
                                       echo " <tr class='tablaC' width='50%' style='background-color: rgb(0,204,0,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}
                                         else{
                                      echo " <tr class='tablaC' width='50%' style='background-color: rgb(255,153,51,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}} 
                                  else {
                                        echo " <tr class='tablaC'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}}}
                              
                              
                              
                            
?>
</tbody>
</table>
        </section> 
</div>
<!-- Termina el TAB del First Year -->
                                    <!-- Comienza el TAB del Second Year -->
<div id="Segundo" class="tabcontent">
    <section>
<table>
  <tr class="bordeC size"><h3>Segundo Año - Primer Semestre</h3>
    <th>Código</th>
    <th>Descripción</th>
    <th>Créditos</th>
  </tr>
      
 <tbody>
                                  <?php
                                    
                                    $sql ="SELECT crse_code, crse_description, crse_credits
                                            FROM mandatory_courses
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 2 AND crse_semester = 1
                                            UNION
                                            SELECT crse_code, crse_description, crse_credits
                                            FROM general_courses INNER JOIN general_courses_major USING (crse_code)
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 2 AND crse_semester = 1";
                                  $result = mysqli_query($conn, $sql);
                                  $resultCheck = mysqli_num_rows($result);
                                  
           if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                              $sql_grade =" SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'
                                            UNION
                                            SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'";
                                  $result_grade = mysqli_query($conn, $sql_grade);
                                  $resultCheck_grade = mysqli_num_rows($result_grade);                                   
                                  
                                  if($resultCheck_grade > 0){
                                  $row_grade = mysqli_fetch_assoc($result_grade);
                                  
                                  if(      $row_grade['crse_grade'] == 'A' OR $row_grade['crse_grade'] == 'B' OR
                                           $row_grade['crse_grade'] == 'C'){
                                       echo " <tr class='tablaC' width='50%' style='background-color: rgb(0,204,0,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}
                                         else{
                                      echo " <tr class='tablaC' width='50%' style='background-color: rgb(255,153,51,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}} 
                                  else {
                                        echo " <tr class='tablaC'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}}}
?>
</tbody>
</table>
<table>
 <tr class="bordeC size"><h3>Segundo Año - Segundo Semestre</h3>
    <th>Código</th>
    <th>Descripción</th>
    <th>Créditos</th>
  </tr>
      
 <tbody>
                                  <?php
                                    
                                   $sql ="SELECT crse_code, crse_description, crse_credits
                                            FROM mandatory_courses
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 2 AND crse_semester = 2
                                            UNION
                                            SELECT crse_code, crse_description, crse_credits
                                            FROM general_courses INNER JOIN general_courses_major USING (crse_code)
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 2 AND crse_semester = 2";
                                  $result = mysqli_query($conn, $sql);
                                  $resultCheck = mysqli_num_rows($result);
                            
                                   if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                              $sql_grade =" SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'
                                            UNION
                                            SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'";
                                  $result_grade = mysqli_query($conn, $sql_grade);
                                  $resultCheck_grade = mysqli_num_rows($result_grade);                                   
                                  
                                  if($resultCheck_grade > 0){
                                  $row_grade = mysqli_fetch_assoc($result_grade);
                                  
                                  if(      $row_grade['crse_grade'] == 'A' OR $row_grade['crse_grade'] == 'B' OR
                                           $row_grade['crse_grade'] == 'C'){
                                       echo " <tr class='tablaC' width='50%' style='background-color: rgb(0,204,0,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}
                                         else{
                                      echo " <tr class='tablaC' width='50%' style='background-color: rgb(255,153,51,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}} 
                                  else {
                                        echo " <tr class='tablaC'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}}}
?>
</tbody>
</table>
        </section>  
</div>
<!-- Termina el TAB del Second Year -->
<div id="Tercero" class="tabcontent">
    <section>
<table>
  <tr class="bordeC size"><h3>Tercer Año - Primer Semestre</h3>
    <th>Código</th>
    <th>Descripción</th>
    <th>Créditos</th>
  </tr>
      
 <tbody>
                                  <?php
                                    
                                    $sql ="SELECT crse_code, crse_description, crse_credits
                                            FROM mandatory_courses
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 3 AND crse_semester = 1
                                            UNION
                                            SELECT crse_code, crse_description, crse_credits
                                            FROM general_courses INNER JOIN general_courses_major USING (crse_code)
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 3 AND crse_semester = 1";
                                  $result = mysqli_query($conn, $sql);
                                  $resultCheck = mysqli_num_rows($result);
                            
                                    if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                              $sql_grade =" SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'
                                            UNION
                                            SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'";
                                  $result_grade = mysqli_query($conn, $sql_grade);
                                  $resultCheck_grade = mysqli_num_rows($result_grade);                                   
                                  
                                  if($resultCheck_grade > 0){
                                  $row_grade = mysqli_fetch_assoc($result_grade);
                                  
                                  if(      $row_grade['crse_grade'] == 'A' OR $row_grade['crse_grade'] == 'B' OR
                                           $row_grade['crse_grade'] == 'C'){
                                       echo " <tr class='tablaC' width='50%' style='background-color: rgb(0,204,0,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}
                                         else{
                                      echo " <tr class='tablaC' width='50%' style='background-color: rgb(255,153,51,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}} 
                                  else {
                                        echo " <tr class='tablaC'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}}}
?>
</tbody>
</table>
<table>
 <tr class="bordeC size"><h3>Tercer Año - Segundo Semestre</h3>
    <th>Código</th>
    <th>Descripción</th>
    <th>Créditos</th>
  </tr>
      
 <tbody>
                                  <?php
                                    
                                   $sql ="SELECT crse_code, crse_description, crse_credits
                                            FROM mandatory_courses
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 3 AND crse_semester = 2
                                            UNION
                                            SELECT crse_code, crse_description, crse_credits
                                            FROM general_courses INNER JOIN general_courses_major USING (crse_code)
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 3 AND crse_semester = 2";
                                  $result = mysqli_query($conn, $sql);
                                  $resultCheck = mysqli_num_rows($result);
                            
                                  if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                              $sql_grade =" SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'
                                            UNION
                                            SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'";
                                  $result_grade = mysqli_query($conn, $sql_grade);
                                  $resultCheck_grade = mysqli_num_rows($result_grade);                                   
                                  
                                  if($resultCheck_grade > 0){
                                  $row_grade = mysqli_fetch_assoc($result_grade);
                                  
                                  if(      $row_grade['crse_grade'] == 'A' OR $row_grade['crse_grade'] == 'B' OR
                                           $row_grade['crse_grade'] == 'C'){
                                       echo " <tr class='tablaC' width='50%' style='background-color: rgb(0,204,0,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}
                                         else{
                                      echo " <tr class='tablaC' width='50%' style='background-color: rgb(255,153,51,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}} 
                                  else {
                                        echo " <tr class='tablaC'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}}}
?>
</tbody>
</table>
        </section>  
</div>
<div id="Cuarto" class="tabcontent">
<section>
<table>
  <tr class="bordeC size"><h3>Cuarto Año - Primer Semestre</h3>
    <th>Código</th>
    <th>Descripción</th>
    <th>Créditos</th>
  </tr>
      
 <tbody>
                                  <?php
                                    
                                    $sql ="SELECT crse_code, crse_description, crse_credits
                                            FROM mandatory_courses
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 4 AND crse_semester = 1
                                            UNION
                                            SELECT crse_code, crse_description, crse_credits
                                            FROM general_courses INNER JOIN general_courses_major USING (crse_code)
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 4 AND crse_semester = 1";
                                  $result = mysqli_query($conn, $sql);
                                  $resultCheck = mysqli_num_rows($result);
                            
                                    if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                              $sql_grade =" SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'
                                            UNION
                                            SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'";
                                  $result_grade = mysqli_query($conn, $sql_grade);
                                  $resultCheck_grade = mysqli_num_rows($result_grade);                                   
                                  
                                  if($resultCheck_grade > 0){
                                  $row_grade = mysqli_fetch_assoc($result_grade);
                                  
                                  if(      $row_grade['crse_grade'] == 'A' OR $row_grade['crse_grade'] == 'B' OR
                                           $row_grade['crse_grade'] == 'C'){
                                       echo " <tr class='tablaC' width='50%' style='background-color: rgb(0,204,0,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}
                                         else{
                                      echo " <tr class='tablaC' width='50%' style='background-color: rgb(255,153,51,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}} 
                                  else {
                                        echo " <tr class='tablaC'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}}}
?>
</tbody>
</table>
<table>
 <tr class="bordeC size"><h3>Cuarto Año - Segundo Semestre</h3>
    <th>Código</th>
    <th>Descripción</th>
    <th>Créditos</th>
  </tr>
      
 <tbody>
                                  <?php
                                    
                                   $sql ="SELECT crse_code, crse_description, crse_credits
                                            FROM mandatory_courses
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 4 AND crse_semester = 2
                                            UNION
                                            SELECT crse_code, crse_description, crse_credits
                                            FROM general_courses INNER JOIN general_courses_major USING (crse_code)
                                            WHERE crse_major = 'CC COMS BCN' AND crse_year = 4 AND crse_semester = 2";
                                  $result = mysqli_query($conn, $sql);
                                  $resultCheck = mysqli_num_rows($result);
                                      if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                              $sql_grade =" SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'
                                            UNION
                                            SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'";
                                  $result_grade = mysqli_query($conn, $sql_grade);
                                  $resultCheck_grade = mysqli_num_rows($result_grade);                                   
                                  
                                  if($resultCheck_grade > 0){
                                  $row_grade = mysqli_fetch_assoc($result_grade);
                                  
                                  if(      $row_grade['crse_grade'] == 'A' OR $row_grade['crse_grade'] == 'B' OR
                                           $row_grade['crse_grade'] == 'C'){
                                       echo " <tr class='tablaC' width='50%' style='background-color: rgb(0,204,0,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}
                                         else{
                                      echo " <tr class='tablaC' width='50%' style='background-color: rgb(255,153,51,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}} 
                                  else {
                                        echo " <tr class='tablaC'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}}}
     
        
?>
</tbody>
</table>
        </section>  
</div>

               
               
<div id="HUMA" class="tabcontent">
<section>
<table>
  <tr class="bordeC size"><h3>Educación General Humanidades</h3>
    <th>Código</th>
    <th>Descripción</th>
    <th>Créditos</th>
  </tr>
      
 <tbody>
                                  <?php
                                    
                                    $sql ="SELECT crse_code, crse_description, crse_credits
                                            FROM general_education_huma";
                                  $result = mysqli_query($conn, $sql);
                                  $resultCheck = mysqli_num_rows($result);
                            
                                    if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                              $sql_grade =" SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'
                                            UNION
                                            SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'";
                                  $result_grade = mysqli_query($conn, $sql_grade);
                                  $resultCheck_grade = mysqli_num_rows($result_grade);                                   
                                  
                                  if($resultCheck_grade > 0){
                                  $row_grade = mysqli_fetch_assoc($result_grade);
                                  
                                  if(      $row_grade['crse_grade'] == 'A' OR $row_grade['crse_grade'] == 'B' OR
                                           $row_grade['crse_grade'] == 'C'){
                                       echo " <tr class='tablaC' width='50%' style='background-color: rgb(0,204,0,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}
                                         else{
                                      echo " <tr class='tablaC' width='50%' style='background-color: rgb(255,153,51,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}} 
                                  else {
                                        echo " <tr class='tablaC'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}}}
?>
</tbody>
</table>
        </section>
</div>

               
<div id="CISO" class="tabcontent">
<section>
<table>
  <tr class="bordeC size"><h3>Educación General Ciencias Sociales</h3>
    <th>Código</th>
    <th>Descripción</th>
    <th>Créditos</th>
  </tr>
      
 <tbody>
                                  <?php
                                    
                                    $sql ="SELECT crse_code, crse_description, crse_credits
                                            FROM general_education_ciso";
                                  $result = mysqli_query($conn, $sql);
                                  $resultCheck = mysqli_num_rows($result);
                            
                                    if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                              $sql_grade =" SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'
                                            UNION
                                            SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'";
                                  $result_grade = mysqli_query($conn, $sql_grade);
                                  $resultCheck_grade = mysqli_num_rows($result_grade);                                   
                                  
                                  if($resultCheck_grade > 0){
                                  $row_grade = mysqli_fetch_assoc($result_grade);
                                  
                                  if(      $row_grade['crse_grade'] == 'A' OR $row_grade['crse_grade'] == 'B' OR
                                           $row_grade['crse_grade'] == 'C'){
                                       echo " <tr class='tablaC' width='50%' style='background-color: rgb(0,204,0,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}
                                         else{
                                      echo " <tr class='tablaC' width='50%' style='background-color: rgb(255,153,51,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}} 
                                  else {
                                        echo " <tr class='tablaC'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}}}
?>
</tbody>
</table>
</section>
</div>         
               
<style>
    .tablaC {
        border: 5px solid #bda400;
        color: black;
    }
    .bordeC{
        border: 5px double #bda400;
      }
    .size {
       font-size: 21px;
        color: black;
    }
</style>
<div id="ElectDept" class="tabcontent">
  <h3>Electivas Departamentales</h3>
    <section>
<table>
  <tr class="bordeC size">
    <th>Código</th>
    <th>Descripción</th>
    <th>Créditos</th>
  </tr>
      
 <tbody>
                                  <?php
                                    
                                    //CAMBIAR PARA TODOS 
                                    $sql ="SELECT crse_code, crse_description, crse_credits
                                    FROM departmental_courses WHERE crse_major = 'CC COMS BCN'";
                                  $result = mysqli_query($conn, $sql);
                                  $resultCheck = mysqli_num_rows($result);
                            
                              if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                                 echo " <tr class='tablaC'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";
                                        if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                              $sql_grade =" SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'
                                            UNION
                                            SELECT crse_code, crse_grade
                                            FROM stdnt_record 
                                            WHERE crse_code = '{$row['crse_code']}' AND stdnt_number = '840-16-4235'";
                                  $result_grade = mysqli_query($conn, $sql_grade);
                                  $resultCheck_grade = mysqli_num_rows($result_grade);                                   
                                  
                                  if($resultCheck_grade > 0){
                                  $row_grade = mysqli_fetch_assoc($result_grade);
                                  
                                  if(      $row_grade['crse_grade'] == 'A' OR $row_grade['crse_grade'] == 'B' OR
                                           $row_grade['crse_grade'] == 'C'){
                                       echo " <tr class='tablaC' width='50%' style='background-color: rgb(0,204,0,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}
                                         else{
                                      echo " <tr class='tablaC' width='50%' style='background-color: rgb(255,153,51,0.3)'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}} 
                                  else {
                                        echo " <tr class='tablaC'>
                                        <td>{$row['crse_code']}</td>
                                        <td>{$row['crse_description']}</td>
                                        <td>{$row['crse_credits']}</td>
                                        </tr>";}}}}}
?>
</tbody>
    
</table>
</div>
</div>;
}
</script>
</body>