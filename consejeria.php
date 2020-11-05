<?php
session_start();
$id= $_SESSION['contrasena_est'];
// Se asegura que el usario que no haya iniciado sesion no pueda acceder a esta pagina.
include_once 'dbconnect.php';
if(!isset($_SESSION['contrasena_est'])){
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
<!-- Aqui llamamos a los distintos css de la pagina y el font que tiene -->
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
<!-- Culmina la parte los css y fonts. -->
      <!-- Font Awesome. -->
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
<!-- Esta area es para que el estudiante cierre su sesion. -->
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
 <!-- Culmina la parte cerrar sesion del estudiante. -->
    <div style="padding-top: 200px; padding-bottom: 20px; margin-left: 15%">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">   
                <div style="margin-right: 30%"><h6>UNIVERSIDAD DE PUERTO RICO EN ARECIBO</h6>
                                    <h6>DEPARTAMENTO DE CIENCIAS DE CÓMPUTOS</h6>
                                    <h6>EVALUACIÓN BACHILLERATO EN CIENCIAS DE CÓMPUTOS</h6></div>
              </div>
                <?php 
                 $sentenciaSQL= " Select SUM(créditos_C_E) FROM expediente WHERE id_est=$id";
                    $resultRecom = mysqli_query($conn, $sentenciaSQL);
                    $reco=mysqli_fetch_assoc($resultRecom);
                
              if ($reco['SUM(créditos_C_E)']=== NULL){
                  $reco['SUM(créditos_C_E)']=0;
              }
                  $mes = date('m');
                  $sem = 1;
                      if($mes >= 6){
                      $sem = 2;
                    }
                 echo "<div class='card-header'>
                    Nombre: <b> {$_SESSION['fullName']} </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Correo: <b>{$_SESSION['email']}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Semestre: <b>$sem</b><br>
                    Número de Estudiante: <b>{$_SESSION['studentNumber']}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Créditos Recomendados: <b>{$reco['SUM(créditos_C_E)']}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Año: <b>{$_SESSION['año_CCOM']}</b><br></div>";?>
                </div>
              </div>
            </div>
 <!-- Aqui se muestran los distinto TABS que estan en la pagina del estudiante. -->
       <div class="container tables">
                <div class="tab">
                    <button class="tablinks active" onclick="openCity(event, 'Citas')">Sacar Cita con su Consejero/a</button>
                    <button class="tablinks" onclick="openCity(event, 'Concentracion')">Realización de Consejería</button>
                     <button class="tablinks" onclick="openCity(event, 'Sugerencias')">Hacer Sugerencias de Clases</button>
                    <button class="tablinks" onclick="openCity(event, 'Comentario')">Comentario del Consejero/a</button>
                  </div>
 <!-- Culmina la parte de los TABS. -->                
 <!-- Comienza el TAB de la realizacion de consejeria donde el estudiante puede ver su expediente y confirmar su consejeria academica y tambien sugerir al momento de darle 'click' en consejeria 'otros cursos'. -->
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
                                        <th><input type='checkbox' class='case' name='case' value='1' /></th>
                                        <th>Cursos</th>
                                        <th>Descripción</th>
                                        <th>Créditos</th>
                                      </tr>
                                      </thead> 
                                    <tbody>";
                                    $sql ="SELECT nombre_c, descripción_c, créditos_c
                                    FROM expediente
                                    INNER JOIN expediente_fijo ON expediente.id_fijo = expediente_fijo.id_fijo 
                                    WHERE expediente.id_est = $id AND (expediente.estatus_R = 1 OR expediente.estatus_c = 3)
                                    UNION(SELECT nombre_c, descripción_c, créditos_c
                                    FROM expediente
                                    INNER JOIN expediente_fijo_generales ON expediente.id_fijo = expediente_fijo_generales.id_fijo
                                    WHERE expediente.id_est = $id AND (expediente.estatus_R = 1 OR expediente.estatus_c = 3))
                                    UNION(SELECT nombre_c, descripción_c, créditos_c
                                    FROM expediente
                                    INNER JOIN expediente_fijo_departamentales ON expediente.id_fijo = expediente_fijo_departamentales.id_fijo
                                    WHERE expediente.id_est = $id AND (expediente.estatus_R = 1 OR expediente.estatus_c = 3))
                                    UNION(SELECT nombre_c, descripción_c, créditos_c
                                    FROM expediente
                                    INNER JOIN expediente_fijo_libre ON expediente.id_fijo = expediente_fijo_libre.id_fijo 
                                    WHERE expediente.id_est = $id AND (expediente.estatus_R = 1 OR expediente.estatus_c = 3))";
                                        $result = mysqli_query($conn, $sql);
                                        $resultCheck = mysqli_num_rows($result);

                                    if($resultCheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){

                                      echo "<tr width='50%' style='background-color: rgb(155,155,155,0.3)'>
                                        <td><input type='checkbox' class='case' name='case' value='1' /> </td>
                                        <td>{$row['nombre_c']}</td>
                                        <td>{$row['descripción_c']}</td>
                                        <td>{$row['créditos_c']}</td>
                                      </tr> ";}}

                                    echo "<tr width='50%' style='background-color: rgb(155,155,155,0.3)'>
                                        <td><input type='checkbox' class='case' name='case' value='1' /> </td>
                                        <td>Otros</td>
                                        <td></td>
                                        <td></td>
                                      </tr> ";

                                    echo "</tbody> 
                                      </table>
                                       Créditos Recomendados: {$reco['SUM(créditos_C_E)']}
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
<!-- Termina el MODAL del boton confirmar. -->
 <!-- Comienza el expediente academico del estudiante. -->
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
                $sql ="SELECT id_est, id_fijo, nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c, estatus_R
                   FROM expediente_fijo INNER JOIN expediente USING (id_fijo) WHERE id_rol = 8 AND id_est = $id
                   ORDER by id_fijo";
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
                $sql ="SELECT id_est, id_fijo, nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c, estatus_R
                   FROM expediente_fijo_generales INNER JOIN expediente USING (id_fijo) WHERE id_rol = 3 OR id_rol = 6 OR id_rol = 7 OR id_rol = 8 OR id_rol = 9 OR id_rol = 10 AND id_est = $id";
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
                $sql ="SELECT id_est, id_fijo, nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c, estatus_R
                   FROM expediente_fijo_libre INNER JOIN expediente USING (id_fijo) WHERE id_rol = 3 OR id_rol = 6 OR id_rol = 7 OR id_rol = 8 OR id_rol = 9 OR id_rol = 10 AND id_est = $id";
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
                $sql ="SELECT id_est, id_fijo, nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c, estatus_R
                   FROM expediente_fijo_departamentales INNER JOIN expediente USING (id_fijo) WHERE id_rol = 11 OR id_rol = 12 OR id_rol = 13 AND id_est = $id";
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
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
<!-- Culmina la parte del expediente academico. -->          
<!-- TAB para Citas. El estudiante puede realizar una cita con la profesora. Escoge el dia y la hora, para sacar la cita. -->
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
<!-- Culmina la parte de los TABS para las Citas. -->          
<!-- Este es el TAB de Sugerencias del estudiante. Donde podra sugerir las clases de Electiva departamentales y confirmar para dejarle saber a la profesora cuales esta el estudiante sugiriendo solo las electivas departamentales. -->
         <div id="Sugerencias" class="tabcontent">
            <form action="private/confirmacion.php" method="post">
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
                                    <th style="background: transparent; border: none" class="column100 column5" data-column="column5"><button onclick="confirmar()" name="confirm-submit" type="submit" class="btn btn-yellow btn-pill">CONFIRMAR</button></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                  <?php
                                    $sql ="SELECT nombre_c, descripción_c, créditos_c, id_fijo
                                    FROM expediente_fijo_departamentales WHERE id_rol = 9";
                                  $result = mysqli_query($conn, $sql);
                                  $resultCheck = mysqli_num_rows($result);
                            
                              if($resultCheck > 0){
                              while($row = mysqli_fetch_assoc($result)){
                                  echo "<tr class='row100'>
                                    <td align='center'>
                                    <input type='checkbox' class='case' name='id_fijo' id='id_fijo' value='{$row['id_fijo']}' /> </td>
                                    <td class='column100 column1' data-column='column1'>{$row['nombre_c']}</td>
                                    <td class='column100 column2' data-column='column2'>{$row['descripción_c']}</td>
                                    <td class='column100 column3' data-column='column3'>{$row['créditos_c']}</td>
                                    <td class='column100 column4' data-column='column4'>Intermedia</td>
                                  </tr>";
                              }
                            }
                                  ?>
                                  
                                </tbody>
                              </table>
                                
                            </div>
                            </div>
                          </div>            
                </div>
                
                </section>    
             </form>
           </div>
<!-- Culmina la parte de los TABS para las Sugerencias. -->           
<!-- Este es el TAB de Comentarios que le hace el consejero/a al estudiante. Donde podra ver que le escribe el/la consejera sobre algun comentario adiconal que tenga que decirle al estudiante. -->           
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
          </div>";}}
          ?>
            </div>
      </div> 
 <!-- Este SCRIPT es para bregar con las citas (en calendario) indicando de que fecha a que fecha estara disponible ese calendario, con las horas y dias disponibles de los consejeros a cargo. -->
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
<!-- Culmina la parte del SCRIPT del calendario para sacar citas -->
<!-- Aqui se encuentran varios SCRIPTS que hacen el funcionamiento de la pagina. -->     
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
<!-- Culmina la parte de los JS. -->
</div>
</body>
</html>