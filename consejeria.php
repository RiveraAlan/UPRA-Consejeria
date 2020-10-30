<?php
session_start();
$id= $_SESSION['id_est'];

// Make sure if user not signed in they cannot see this page.
include("AdminUPRA/inc/connection.php");

if(!isset($_SESSION['id_est'])){
  header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CONSEJERÍA-UPRA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
      
    <link rel="stylesheet" href="css/conse.css">
    
    <link rel="stylesheet" href="css/notes.css">
      
    <link rel="stylesheet" href="cita.css">
    <link rel="stylesheet" href="css/sugerencias.css">
    <link rel="stylesheet" href="css/sugerencias2.css">
    
    
    <link rel="stylesheet" href="jqueryui/jquery-ui.css">
    <link rel="stylesheet" href="jqueryui/jquery-ui.structure.css">
    <link rel="stylesheet" href="jqueryui/jquery-ui.theme.css">

      <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminUPRA/plugins/fontawesome-free/css/all.min.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><img src="image/upraconse.png" alt=""></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="private/logout.php" class="nav-link">Cerrar Sesión</a></li>
              </ul>
            </nav>
          </div>

      
        </div>
      </div>
      
    </header>

    <div style="padding-top: 200px; padding-bottom: 20px; margin-left: 15%">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
                    
                <div style="margin-right: 30%"><h6>UNIVERSIDAD DE PUERTO RICO EN ARECIBO</h6>
                                    <h6>DEPARTAMENTO DE CIENCIAS DE CÓMPUTOS</h6>
                                    <h6>EVALUACIÓN BACHILLERATO EN CIENCIAS DE CÓMPUTOS</h6></div>
              </div>
                <?php 
                
                 echo "<div class='card-header'>
                    Nombre: <b> {$_SESSION['fullName']} </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Correo: <b>{$_SESSION['email']}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Semestre: <b>2</b><br>
                    Número de Estudiante: <b>{$_SESSION['studentNumber']}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Créditos Recomendado: <b>6</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Año: <b>{$_SESSION['año_CCOM']}</b><br>
           
                    </div>";?>
                </div>
              </div>
            </div>
        
       <div class="container tables">
                <div class="tab">
                    <button class="tablinks active" onclick="openCity(event, 'Citas')">Sacar Cita con su Consejero/a</button>
                    <button class="tablinks" onclick="openCity(event, 'Concentracion')">Realización de Consejería</button>
                     <button class="tablinks" onclick="openCity(event, 'Sugerencias')">Hacer Sugerencias de Clases</button>
                    <button class="tablinks" onclick="openCity(event, 'Comentario')">Comentario del Consejero/a</button>
                  </div>
                  
                  <!-- Tab content -->
                  <div id="Concentracion" class="tabcontent">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <?php 
                
                 echo "
                    <div class='btn-group'>
                    
                    <div class='container'>
                      <!-- Trigger the modal with a button -->
                      <div class='login-btn-container'><button style='float: right;' type='button' class='btn btn-yellow btn-pill' data-toggle='modal' data-target='#myModal'>CONFIRMAR</button></div>
        
                      <!-- Modal -->
                      <div class='modal fade' id='myModal' role='dialog'>
                        <div class='modal-dialog'>

                          <!-- Modal content-->
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h3>Próximo Semestre</h3>
                              <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            </div>
                            <div class='modal-body'>
                            <table id='example2' class='table table-bordered table-hover'>
                          <thead>
                          <tr width='50%'' bgcolor='yellow'>
                            <th>Cursos</th>
                            <th>Descripción</th>
                            <th>Créditos</th>
                          </tr>
                          </thead> 
                        <tbody>";
                        $sql ="SELECT nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c
                              FROM expediente WHERE id_est = ".$_SESSION['id_est']." AND estatus_R = 1";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);
                      
                        if($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                          
                          echo "<tr width='50%' style='background-color: rgb(155,155,155,0.3)'>
                            <td>{$row['nombre_c']}</td>
                            <td>{$row['descripción_c']}</td>
                            <td>{$row['créditos_c']}</td>
                          </tr> ";}}
                        echo "</tbody> 
                          </table>
                                            </div>
                            <div class='modal-footer'><br>
                              <div class='login-btn-container'><button style='float: right;' type='button' class='btn btn-yellow btn-pill' data-toggle='modal' data-target='#myModal'>CONFIRMAR</button></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>";
                ?>
              <!-- /.card-header -->
    
        
              <div class="card-body"> 
                <div align = "center"><h3>Cursos de Concentración</h3></div>
                <table id="example2" class="table table-bordered table-hover" style="color:#000">
                  <thead>
                  <tr width="50%" bgcolor="yellow">
                    <th>Cursos</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>Nota</th>
                    <th>Matriculado</th>
                    <th>Recomendación</th>
                    <th>Año Aprobó</th>
                    <th>Convalidación</th>
                  </tr>
                  </thead> 
                  <tbody>
                <?php 
                $sql ="SELECT nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c, estatus_R
                      FROM expediente WHERE id_rol = 1";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  
                  if($row['estatus_c'] == 1){
                    echo "<tr width='50%' style='background-color: rgb(85,255,0,0.3)'>"; 
                  }else if ($row['estatus_c'] == 2){
                    echo "<tr width='50%' style='background-color: rgb(51,85,255,0.3)'>"; 
                  }else{
                  echo "<tr width='50%' style='background-color: rgb(230,0,38,0.3)'>";
                  }
                    echo "<td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>
                    <td>{$row['estatus_c']}</td>";
                    if($row['estatus_R'] == 1){
                    echo "<td>Prox. Semestre</td>";
                    }else{
                    echo "<td></td>";}
                    echo "
                    <td>{$row['año_aprobo_c']}</td>
                    <td></td>
                  </tr> ";}}?>
                      
                </tbody> 
                  </table>
                  <div align = "center"><h3>Cursos Generales Obligatorios</h3></div>
                    <table id="example2" class="table table-bordered table-hover" style="color:#000">
                  <thead>
                  <tr width="50%" bgcolor="yellow">
                    <th>Cursos</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>Nota</th>
                    <th>Matriculado</th>
                    <th>Recomendación</th>
                    <th>Año Aprobó</th>
                    <th>Convalidación</th>
                  </tr>
                  </thead> 
                  <tbody>
                <?php 
                $sql ="SELECT nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c, estatus_R
                      FROM expediente WHERE id_rol = 2 OR id_rol = 4";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  
                  if($row['estatus_c'] == 1){
                    echo "<tr width='50%' style='background-color: rgb(85,255,0,0.3)'>"; 
                  }else if ($row['estatus_c'] == 2){
                    echo "<tr width='50%' style='background-color: rgb(51,85,255,0.3)'>"; 
                  }else{
                  echo "<tr width='50%' style='background-color: rgb(230,0,38,0.3)'>";
                  }
                    echo "<td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>
                    <td>{$row['estatus_c']}</td>";
                    if($row['estatus_R'] == 1){
                      echo "<td>Prox. Semestre</td>";
                      }else{
                      echo "<td></td>";}
                      echo "
                    <td>{$row['año_aprobo_c']}</td>
                    <td></td>
                  </tr> ";}}?>
                </tbody>
                  </table>
                   <div align = "center"><h3>Electivas Libres</h3></div>
                    <table id="example2" class="table table-bordered table-hover" style="color:#000">
                  <thead>
                  <tr width="50%" bgcolor="yellow">
                    <th>Cursos</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>Nota</th>
                    <th>Matriculado</th>
                    <th>Recomendación</th>
                    <th>Año Aprobó</th>
                    <th>Convalidación</th>
                  </tr>
                  </thead> 
                <tbody>
                <?php 
                $sql ="SELECT nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c, estatus_R
                      FROM expediente WHERE id_rol = 3 OR id_rol = 6 OR id_rol = 7 OR id_rol = 8 OR id_rol = 9 OR id_rol = 10";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  
                  if($row['estatus_c'] == 1){
                    echo "<tr width='50%' style='background-color: rgb(85,255,0,0.3)'>"; 
                  }else if ($row['estatus_c'] == 2){
                    echo "<tr width='50%' style='background-color: rgb(51,85,255,0.3)'>"; 
                  }else{
                  echo "<tr width='50%' style='background-color: rgb(230,0,38,0.3)'>";
                  }
                    echo "<td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>
                    <td>{$row['estatus_c']}</td>";
                    if($row['estatus_R'] == 1){
                      echo "<td>Prox. Semestre</td>";
                      }else{
                      echo "<td></td>";}
                      echo "
                    <td>{$row['año_aprobo_c']}</td>
                    <td></td>
                  </tr> ";}}?>
                </tbody> 
                  </table>
                   <div align = "center"><h3>Electivas Departamentales</h3></div>
                    <table id="example2" class="table table-bordered table-hover" style="color:#000">
                     <thead>
                  <tr width="50%" bgcolor="yellow">
                    <th>Cursos</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>Nota</th>
                    <th>Matriculado</th>
                    <th>Recomendación</th>
                    <th>Año Aprobó</th>
                    <th>Convalidación</th>
                  </tr>
                  </thead> 
                <tbody>
                <?php 
                $sql ="SELECT nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c, estatus_R
                      FROM expediente WHERE id_rol = 11 OR id_rol = 12 OR id_rol = 13 ";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  
                  if($row['estatus_c'] == 1){
                    echo "<tr width='50%' style='background-color: rgb(85,255,0,0.3)'>"; 
                  }else if ($row['estatus_c'] == 2){
                    echo "<tr width='50%' style='background-color: rgb(51,85,255,0.3)'>"; 
                  }else{
                  echo "<tr width='50%' style='background-color: rgb(230,0,38,0.3)'>";
                  }
                    echo "<td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>
                    <td>{$row['estatus_c']}</td>";
                    if($row['estatus_R'] == 1){
                      echo "<td>Prox. Semestre</td>";
                      }else{
                      echo "<td></td>";}
                      echo "
                    <td>{$row['año_aprobo_c']}</td>
                    <td></td>
                  </tr> ";}}?>

                    </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    </div>
                  
    <div id="Citas" class="tabcontent active">
    <section class="appointment">
    <h2 class="appointment-form-title">Sacar cita</h2>
    <form action="private/process-appointment.php" method="POST" class="appointment-form">
                       
    <?php 
        include 'private/appointment-status.php';
                                
            if($isAppointmentValid){
                echo '<div class="success-message">La cita con el/la consejero(a) fue separada para el '.$fecha_cita.'.</div>';
                } else {
                    if((isset($_GET['is-date-empty']) AND boolval($_GET['is-date-empty'])) OR (isset($_GET['is-hour-chosen-empty']) AND boolval($_GET['is-hour-chosen-empty']))){
                    echo '<div class="error-message">*Escoga el día y la hora de la cita.</div>';
                        }
                    echo ' 
                    <input type="hidden" name="first-name" value="'.$_SESSION['firstName'].'" placeholder="First Name" class="form-control" readonly>
                    <input type="hidden" name="last-name" value="'.$_SESSION['lastNameU'].' '.$_SESSION['lastNameD'].'" placeholder="Last Name"  class="form-control" readonly>';
                    echo '<div class="form-group">
                                         <input type="hidden" name="email"  value="'. $_SESSION['email'].'" class="form-control" readonly> 
                                         </div>';
                    echo ' <h3>Escoger Fecha y Hora</h3>  <div class="form-group d-flex">
                                         <div class="calendar-box">';

                                                $dateField = '<input type="text" name="date" onchange="getAvailableDates(this.value)" id="datepicker"  type="text" class="form-control"/>';
                                                if(isset($_GET['is-date-empty']) AND boolval($_GET['is-date-empty'])){
                                                    $dateField = '<input type="text" name="date" onchange="getAvailableDates(this.value)" id="datepicker"  type="text" class="invalid"/>';
                                                } 
                                                echo $dateField;
                                            
                                        echo '<div class="hour-chosen-container"></div>
                                            </div>
                                            <div class="spots-available">
                                             </div>
                                             </div>';
                    echo '<div class="login-btn-container"><button type="submit" class="btn btn-yellow btn-pill">Confirmar Cita</button></div>';
                                }
                           ?>
                        </form>
                </section>
                  
                  </div>
         
         <div id="Sugerencias" class="tabcontent">
            <section>
                <div class="table">
                <div class="container-table100">
                    <h2>Electivas Departamentales</h2>
                          <div class="wrap-table100">
                            <div class="table100 ver2 m-b-110">
                              <table data-vertable="ver1">
                                <thead>
                                  <tr class="row100 head">
                                    <th class="column100 column1" data-column="column1">Sugerencias</th>
                                    <th class="column100 column2" data-column="column2">Código</th>
                                    <th class="column100 column3" data-column="column3">Descripción</th>
                                    <th class="column100 column4" data-column="column4">Créditos</th>
                                    <th class="column100 column5" data-column="column5">Clasificación</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3027</td>
                                    <td class="column100 column2" data-column="column2">Prog. Orientada a Objetos</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Intermedia</td>
                                  </tr>
                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3036</td>
                                    <td class="column100 column2" data-column="column2">Programación Visual</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Intermedia</td>
                                  </tr>
                                
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3042</td>
                                    <td class="column100 column2" data-column="column2">Arquitectura de Computadoras</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                  </tr>
                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3115</td>
                                    <td class="column100 column2" data-column="column2">Aplicaciones de Microprocesadores</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                  
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3135</td>
                                    <td class="column100 column2" data-column="column2">Temas en Ciencias de Cómputos</td>
                                    <td class="column100 column3" data-column="column3">1-6</td>
                                    <td class="column100 column4" data-column="column4">Variable</td>
                                  </tr>
                                 
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3985</td>
                                    <td class="column100 column2" data-column="column2">Investigación Sub-graduada</td>
                                    <td class="column100 column3" data-column="column3">2</td>
                                    <td class="column100 column4" data-column="column4">Variable</td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4018</td>
                                    <td class="column100 column2" data-column="column2">Redes de Computadoras</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4019</td>
                                    <td class="column100 column2" data-column="column2">Programación Web</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4125</td>
                                    <td class="column100 column2" data-column="column2">Inteligencia Artificial</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4135</td>
                                    <td class="column100 column2" data-column="column2">Diseño Compiladores</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4305</td>
                                    <td class="column100 column2" data-column="column2">Introducción Diseño Web</td>
                                    <td class="column100 column3" data-column="column3">4</td>
                                    <td class="column100 column4" data-column="column4">Intermedia</td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4306</td>
                                    <td class="column100 column2" data-column="column2">Opt. Gráficas</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Intermedia</td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4307</td>
                                    <td class="column100 column2" data-column="column2">Mantenimiento de PC's</td>
                                    <td class="column100 column3" data-column="column3">4</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4401</td>
                                    <td class="column100 column2" data-column="column2">Desarrollo de Aplicaciones Móviles</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4420</td>
                                    <td class="column100 column2" data-column="column2">Cloud Computing Apps</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4401</td>
                                    <td class="column100 column2" data-column="column2">Robótica</td>
                                    <td class="column100 column3" data-column="column3">4</td>
                                    <td class="column100 column4" data-column="column4">Intermedia</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>             
                </div>
                </section>    
         </div>
            <div id="Comentario" class="tabcontent">
                <!-- Notes -->
             <?php
                $sql ="SELECT comentarios_e
                      FROM exp_detalles WHERE id_est = $id";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                 
                    echo "
            <div class='card'>
              <div class='card-header' style='background: #e0c200'>
                <h3 class='card-title' >Notas</h3>
              </div>
                
              <div>

              <form id='paper' method='get' action=''>
		            <p  id='text' name='text' rows='' style='overflow-y: auto; word-wrap: break-word; resize: none; height: 400px;'>{$row['comentarios_e']}</p>
              </form>
                
            </div>
            <!-- /.card -->
          </div>";
}}
        
          ?>

            </div>
           
      </div>
      <footer class="bg-white">
<br>

<div class="grid-container">
  <div class="grid-item">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60546.43133375424!2d-66.7486562!3d18.47677480000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c02e71441a83073%3A0xf81fe612f4f1f3f7!2sUniversidad+de+Puerto+Rico+-+Recinto+de+Arecibo!5e0!3m2!1ses-419!2spr!4v1560197851966!5m2!1ses-419!2spr" width="600" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="grid-item">
<ul>
<i class="fas fa-route">&nbsp;&nbsp;Carr. 653 Km. 0.8 Sector Las Dunas, Arecibo
P.O. Box 4010 Arecibo P.R. 00614</i><br><br>
<i class="fas fa-phone-alt">&nbsp;&nbsp;787-815-0000 / Fax 787-880-4972</i><br><br>
<i class="fas fa-envelope-open">&nbsp;&nbsp;oficinadecomunicaciones.arecibo@upr.edu</i>
</ul>
</div>
</div>
      <div class="container">
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a target="_blank" >CONSEJERÍA-UPRA</a>
        <br>Página Oficial: <a href="http://upra.edu/">http://upra.edu/</a>
      </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>
  </div> <!-- .site-wrap -->
      
      
      
  <script src="index.js"></script> 
        <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
        <script src="jqueryui/jquery-ui.js"></script>
        <script>
            $("#datepicker").datepicker({
                changeMonth: true,
                minDate: new Date(2020, 09, 4),
                maxDate: new Date(2020, 12, 15)
            });
        </script>

        <script>
            function getAvailableDates(date){
                var xmlhttp = new XMLHttpRequest();
                 xmlhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
               document.querySelector('.spots-available').innerHTML  =  this.responseText;
             
            }
      }
      let dateFormatted = date.split('/').reverse();
      const temp = dateFormatted[1];
      dateFormatted[1] = dateFormatted[2];
      dateFormatted[2] = temp;
      dateFormatted = dateFormatted.join('-');
      
      xmlhttp.open("GET", "private/get-available-dates.php?date=" + dateFormatted, true);
      xmlhttp.send();
    };
    
       function getHourOfMeeting(hour){
        let editHour = hour.split(' ');
        editHour = editHour[0];
        
        
        let input = document.createElement("INPUT");
        input.setAttribute("type", "text");
        input.className = 'hour-chosen';
        input.name = "hour-chosen";
        input.setAttribute('value', editHour);
        input.readOnly = true;
        document.querySelector('.hour-chosen-container').innerHTML = 'Hour: ';
        document.querySelector('.hour-chosen-container').appendChild(input);
       }
        </script>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>
  <script src="js/consejeria.js"></script>
  </body>
</html>