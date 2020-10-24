<?php
session_start();

// Make sure if user not signed in they cannot see this page.
include("AdminUPRA/inc/connection.php");
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
      
    <link rel="stylesheet" href="cita.css">
    
    <link rel="stylesheet" href="jqueryui/jquery-ui.css">
    <link rel="stylesheet" href="jqueryui/jquery-ui.structure.css">
    <link rel="stylesheet" href="jqueryui/jquery-ui.theme.css">
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
          <div class="site-logo mr-auto w-25"><a href="index.html"><img src="image/upr.png" alt="">CONSEJERÍA UPRA</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="index.php" class="nav-link">Inicio</a></li>
              </ul>
            </nav>
          </div>

      
        </div>
      </div>
      
    </header>

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('image/lobby.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">

                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                    
                    <form action="private/auth.php" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4">Información del Estudiante:</h3>
             
                <div class="student">
                    <div class="student-info">
                        <div class="name">
                            <p class="h4 text-black mb-4">Nombre: <?php echo $_SESSION['inicial_est']?> </p>
                        </div>
                        <div class="email">
                            <p class="h4 text-black mb-4">Correo Electrónico: <?php echo $_SESSION['email']?></p>
                        </div>
                        <div class="academic-year">
                            <p class="h4 text-black mb-4">Año : <?php echo $_SESSION['año_CCOM']?></p>
                        </div>
                        <div class="student-number">
                            <p class="h4 text-black mb-4">Número de Estudiante: <?php echo $_SESSION['studentNumber']?></p>
                        </div>
                    </div><br>
                    <div class="login-btn-container"><button type="submit" class="btn btn-yellow btn-pill">Cerrar Sesión</button></div>
                </div>
         </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div><br>

    
     <div class="container tables">
                <div class="tab">
                    <button class="tablinks active" onclick="openCity(event, 'Otros')">Sacar Cita con su Consejero/a</button>
                    <button class="tablinks" onclick="openCity(event, 'Concentracion')">Realización de Consejería</button>
                  </div>
                  
                  <!-- Tab content -->
                  <div id="Concentracion" class="tabcontent">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div align='center'><h3>UNIVERSIDAD DE PUERTO RICO EN ARECIBO</h3>
                                    <h3>DEPARTAMENTO DE CIENCIAS DE COMPUTOS</h3>
                                    <h3>EVALUACION BACHILLERATO EN CIENCIAS DE COMPUTOS</h3></div>
              </div>
                <?php 
                $sql = "SELECT id_est, correo_est, num_est, apellido_estU, apellido_estD, nombre_est, inicial_est
                      FROM estudiante WHERE id_est = 2";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                $row = mysqli_fetch_assoc($result);
                 echo "<div class='card-header'>
                    Nombre: <b> {$row['nombre_est']} {$row['inicial_est']} {$row['apellido_estU']} {$row['apellido_estD']} </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Correo: <b>{$row['correo_est']}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Semestre: <b>2</b><br>
                    Número de Estudiante: <b>{$row['num_est']}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Créditos Recomendado: <b>6</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Año: <b>5</b><br>
           
                    </div><br>
                    <div class='btn-group'>
                    
                    <div class='container'>
                      <!-- Trigger the modal with a button -->
                      <button style='float: right;' type='button' class='button inicio' data-toggle='modal' data-target='#myModal'>EDITAR</button>

                      <!-- Modal -->
                      <div class='modal fade' id='myModal' role='dialog'>
                        <div class='modal-dialog'>

                          <!-- Modal content-->
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            </div>
                            <div class='modal-body'>
                              <form action='edtiest.php' method='post'>
                          <div class='input-group mb-3'>
                          <input type='text'' name='item_id' class='form-control' placeholder='CURSO'>
                          <div class='input-group-append'>
                            <div class='input-group-text'>
                              <span class='fas fa-chalkboard-teacher'></span>
                            </div>
                          </div>

                        </div>
                         <div class='input-group mb-3'>
                          <input type='text' name='item_id' class='form-control' placeholder='CAMBIAR NOMBRE AL CURSO'>
                          <div class='input-group-append'>
                            <div class='input-group-text'>
                              <span class='fas fa-chalkboard-teacher'></span>
                            </div>
                          </div>
                        </div>

                          <div class='input-group mb-3'>
                            <label>Description: &nbsp; </label>
                              <textarea rows='4' cols='50' name='description' class='form-control' placeholder='DESCRIPCION' required>
                              </textarea>
                          <div class='input-group-append'>
                            <div class='input-group-text'>
                              <span class='fa fa-font'></span>
                            </div>
                          </div>
                        </div>


                          <div class='input-group mb-3'>
                          <input type='text' name='item_id' class='form-control' placeholder='NOTA'>
                          <div class='input-group-append'>
                            <div class='input-group-text'>
                              <span class='fas fa-clipboard'></span>
                            </div>
                          </div>
                        </div>
                          <div class='input-group mb-3'>
                          <input type='text' name='name' class='form-control' placeholder='MATRICULADO'>
                          <div class='input-group-append'>
                            <div class='input-group-text'>
                              <span class='fas fa-user'></span>
                            </div>
                          </div>
                        </div>
                            <div class='input-group mb-3'>
                          <input type='text' name='name' class='form-control' placeholder='RECOMENDACION'>
                          <div class='input-group-append'>
                            <div class='input-group-text'>
                              <span class='fas fa-comment-dots'></span>
                            </div>
                          </div>
                        </div>
                          <div class='input-group mb-3'>
                          <input type='text' name='name' class='form-control' placeholder='AÑO APROBADO'>
                          <div class='input-group-append'>
                            <div class='input-group-text'>
                              <span class='fas fa-comment-dots'></span>
                            </div>
                          </div>
                        </div>
                          <div class='input-group mb-3'>
                          <input type='text' name='name' class='form-control' placeholder='CONVALIDACION'>
                          <div class='input-group-append'>
                            <div class='input-group-text'>
                              <span class='fas fa-comment-dots'></span>
                            </div>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='col-8'>
                            <div class='icheck-primary'>

                            </div>
                          </div>
                        </div>
                      </form>
                                            </div>
                            <div class='modal-footer'>
                              <button type='button' class='btn btn-default' data-dismiss='modal'>APPLY</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>";}
                ?>
              <!-- /.card-header -->
    
        
              <div class="card-body"> 
                <div align = "center"><h3>Cursos de Concentración</h3></div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr width="50%" bgcolor="yellow">
                    <th>Cursos</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>Nota</th>
                    <th>Matriculado</th>
                    <th>Recomendación</th>
                    <th>Iniciales</th>
                    <th>Año Aprobó</th>
                    <th>Convalidación</th>
                  </tr>
                  </thead> 
                  <tbody>
                <?php 
                $sql ="SELECT nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c
                      FROM expediente WHERE id_rol = 1";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  
                  echo "<tr width='50%'>
                    <td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>
                    <td>{$row['estatus_c']}</td>
                    <td></td>
                    <td></td>
                    <td>{$row['año_aprobo_c']}</td>
                    <td></td>
                  </tr> ";}}?>
                      
                </tbody> 
                  </table>
                  <div align = "center"><h3>Cursos Generales Obligatorios</h3></div>
                    <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr width="50%" bgcolor="yellow">
                    <th>Cursos</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>Nota</th>
                    <th>Matriculado</th>
                    <th>Recomendación</th>
                    <th>Iniciales</th>
                    <th>Año Aprobó</th>
                    <th>Convalidación</th>
                  </tr>
                  </thead> 
                  <tbody>
                <?php 
                $sql ="SELECT nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c
                      FROM expediente WHERE id_rol = 2 OR id_rol = 4";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  
                  echo "<tr width='50%'>
                    <td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>
                    <td>{$row['estatus_c']}</td>
                    <td></td>
                    <td></td>
                    <td>{$row['año_aprobo_c']}</td>
                    <td></td>
                  </tr> ";}}?>
                </tbody>
                  </table>
                   <div align = "center"><h3>Electivas Libres</h3></div>
                    <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr width="50%" bgcolor="yellow">
                    <th>Cursos</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>Nota</th>
                    <th>Matriculado</th>
                    <th>Recomendación</th>
                    <th>Iniciales</th>
                    <th>Año Aprobó</th>
                    <th>Convalidación</th>
                  </tr>
                  </thead> 
                <tbody>
                <?php 
                $sql ="SELECT nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c
                      FROM expediente WHERE id_rol = 3 OR id_rol = 6 OR id_rol = 7 OR id_rol = 8 OR id_rol = 9 OR id_rol = 10";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  
                  echo "<tr width='50%'>
                    <td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>
                    <td>{$row['estatus_c']}</td>
                    <td></td>
                    <td></td>
                    <td>{$row['año_aprobo_c']}</td>
                    <td></td>
                  </tr> ";}}?>
                </tbody> 
                  </table>
                   <div align = "center"><h3>Electivas Departamentales</h3></div>
                    <table id="example2" class="table table-bordered table-hover">
                     <thead>
                  <tr width="50%" bgcolor="yellow">
                    <th>Cursos</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>Nota</th>
                    <th>Matriculado</th>
                    <th>Recomendación</th>
                    <th>Iniciales</th>
                    <th>Año Aprobó</th>
                    <th>Convalidación</th>
                  </tr>
                  </thead> 
                <tbody>
                <?php 
                $sql ="SELECT nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c
                      FROM expediente WHERE id_rol = 11 OR id_rol = 12 OR id_rol = 13 ";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  
                  echo "<tr width='50%'>
                    <td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>
                    <td>{$row['estatus_c']}</td>
                    <td></td>
                    <td></td>
                    <td>{$row['año_aprobo_c']}</td>
                    <td></td>
                  </tr> ";}}?>

                    </table>
                  <b align="right"> Total de Creditos Electivas Departamentales: 14</b>
                  
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
                  
    <div id="Otros" class="tabcontent active">
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
                    echo '<div class="login-btn-container"><button type="submit" class="btn btn-yellow btn-pill">Someter</button></div>';
                                }
                           ?>
                        </form>
                </section>
                  
                  </div>
                  
            </div>
            <!-- Tab links -->


    <div class="site-section bg-image overlay" style="background-image: url('images/bd.jpg');">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-8 text-center testimony">
            <img src="images/profeliana.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
            <h3 class="mb-4">Dra. Eliana Valenzuela Andrade</h3>
            <h3 class="mb-4">Profesora en el Departamento de Ciencias de Cómputos</h3>
            <h3 class="mb-4">Correo Electrónico: eliana.valenzuela@upr.edu</h3>
            <blockquote>
              <p>Eliana Valenzuela-Andrade holds a doctoral degree in Computing, Information Sciences and Engineering, a Masters in Engineering Management Systems from the University of Puerto Rico, Mayagüez Campus and a BS in Industrial Engineering from the Universidad de los Andes, in Bogotá, Colombia. She has nearly fifteen years of teaching experience and ten years of research experience. The research areas of Dr. Valenzuela-Andrade are Database Management System, Datamining, Educational Robotics, Swarm Robotics, and Outreach Strategies for STEM careers, among others.</p>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
     
    <footer class="footer-section bg-white">
      <div class="container">
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a target="_blank" >CONSEJERÍA-UPRA</a><br>
        <a>Teléfono: +1-787-815-0000/ FAX: 787-880-4972</a><br>Correo: oficinadecomunicaciones.arecibo@upr.edu
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