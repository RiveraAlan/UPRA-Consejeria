<!DOCTYPE html>
<html>
	<head>
		<title>Select Dinamico</title>
		
		<style type="text/css">
		.seleccion{
			border: 3px solid #58ACFA;
			background-color:#cfcfcf;
			color:black;
			font-size:17px;
			width:150px;
			height:35px;
		}
	</style>
	</head>
	<body>
		<form name="formulario1" action="#">
			<select class="seleccion" id="department" name="cosa" onchange="cambia()">
				<option value="0">Seleccione
				<option value="1">Ciencias de Cómputos
			</select>
			
			<select class="seleccion" id="year" name="opt">
				<option value="-">-
			</select>
			
		</form>
		
		<script type="text/javascript">
			//1) Definir Las Variables Correspondintes
			var opt_1 = new Array ("-", "Cohorte 2017", "Cohorte 2021");
			// 2) crear una funcion que permita ejecutar el cambio dinamico
			
			function cambia(){
				var cosa;
				//Se toma el vamor de la "cosa seleccionada"
				cosa = document.formulario1.cosa[document.formulario1.cosa.selectedIndex].value;
				//se chequea si la "cosa" esta definida
				if(cosa!=0){
					//selecionamos las cosas Correctas
					mis_opts=eval("opt_" + cosa);
					//se calcula el numero de cosas
					num_opts=mis_opts.length;
					//marco el numero de opt en el select
					document.formulario1.opt.length = num_opts;
					//para cada opt del array, la pongo en el select
					for(i=0; i<num_opts; i++){
						document.formulario1.opt.options[i].value=mis_opts[i];
						document.formulario1.opt.options[i].text=mis_opts[i];
					}
					}else{
						//si no habia ninguna opt seleccionada, elimino las cosas del select
						document.formulario1.opt.length = 1;
						//ponemos un guion en la unica opt que he dejado
						document.formulario1.opt.options[0].value="-";
						document.formulario1.opt.options[0].text="-";
					}
					//hacer un reset de las opts
					document.formulario1.opt.options[0].selected = true;
					
				}
            function myFunction() {
                year = document.getElementById("year").value;
                document.getElementById("demo").innerHTML = `<div id="Cohorte"> 
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
</div>`;
                }
</script>
        <div id="demo"></div>
        <br>
        <div class="login-btn-container"><button onclick="myFunction()" type="submit" class="btn btn-yellow btn-pill">Confirmar</button></div>
	</body>
</html>