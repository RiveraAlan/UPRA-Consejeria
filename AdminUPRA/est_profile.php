<?php
session_start();
include("inc/connection.php");
$id = $_SESSION['id_est'];
$id= $_SESSION['id'];
$name = $_SESSION['name'];

if(!isset($_SESSION['id'])){
  header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONSEJERIA-UPRA | EXP.ESTUDIANTE</title>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- page css -->
  <link rel="stylesheet" href="dist/css/adminlte.css">

   <link rel="stylesheet" href="../css/conse.css">

  <style>
    #drop_zone {
            background-color: #EEE;
            border: #999 5px dashed;
            width: 100%;
            height: 30rem;
            padding: 8px;
            font-size: 18px;
        }
  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand upra-amarillo navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.html" class="nav-link">Inicio</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio.php" class="brand-link">
      <img src="img/university.jpg" alt="UPRA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CONSEJERIA UPRA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
        <?php $sql = "SELECT nombre_conse, apellido_conseU, apellido_conseD FROM `consejero` WHERE id_conse = $id";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                $row = mysqli_fetch_assoc($result);
                ;}
            ?>
          <?php echo "<a class='d-block'>{$row['nombre_conse']} {$row['apellido_conseU']} {$row['apellido_conseD']}</a>" ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="inicio.php" class="nav-link">
               <i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <p>Inicio</p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="lista.php" class="nav-link">
               <i class="fas fa-stopwatch-20"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <p>Lista de Conteo de Clases</p>
            </a>
          </li>
           <li class="nav-item has-treeview menu-open">
            <a href="calendar.php" class="nav-link">
               <i class="far fa-calendar-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <p>Calendario</p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open"><a href="../private/logout_admin.php" class="nav-link">
              <i class="fa fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <p>Cerrar Sesión</p>
            </a></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Expediente Académico del Estudiante</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
              <li class="breadcrumb-item active">Expediente Académico del Estudiante</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary" style="border-top: 3px solid #e0c200;">
              <div class="card-body box-profile">
                    <?php
                    $sql = "SELECT id_est, correo_est, num_est, apellido_estU, apellido_estD, nombre_est, inicial_est
                    FROM estudiante WHERE id_est = $id";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);
            
                $sentenciaSQL= "SELECT SUM(créditos_C_E) FROM expediente WHERE id_est=$id";
                $resultSUM = mysqli_query($conn, $sentenciaSQL);
                $creditos=mysqli_fetch_assoc($resultSUM);
                if ($creditos['SUM(créditos_C_E)']=== NULL){
                  $creditos['SUM(créditos_C_E)']=0;
              }
               
           
              if($resultCheck > 0){
              $row = mysqli_fetch_assoc($result);
               echo "<h3 class='profile-username text-center'>{$row['nombre_est']} {$row['apellido_estU']} {$row['apellido_estD']}</h3>

                <p class='text-muted text-center'>{$row['correo_est']}</p>
                <p class='text-muted text-center'>{$row['num_est']}</p>

                <ul class='list-group list-group-unbordered mb-3'>
                  <li class='list-group-item'>
                    <b>Créditos Aprobados</b> <a class='float-right'>{$creditos['SUM(créditos_C_E)']}</a>
                  </li>
                  <li class='list-group-item'>
                    <b>Año</b> <a class='float-right'>4</a>
                  </li>
                  <li class='list-group-item'>
                    <b>Secuencia Curricular</b> <a class='float-right'>2017</a>
                  </li>
                   
                </ul>";?>
                <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-round-xlarge upra-amarillo" style="color:white; width : 100%">Actualizar Expediente</button>
              <?php
                echo "</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           
            <!-- About Me Box -->
            <div class='card' >
              <div class='card-header' style='background: #e0c200'>
                <h3 class='card-title' >Notas</h3>
              </div>
              <!-- /.card-header -->
              <div>

              <form id='paper' method='get' action=''>
           <textarea placeholder='Escribe una nota aqui.' id='text' name='text' rows='' style='overflow-y: auto; word-wrap: break-word; resize: none; height: 400px;'></textarea>
              </div><button type='submit' class='w3-button w3-round-xlarge upra-amarillo' style='color:white; width : 100%;'>Crear</button>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>";
              }
          ?>
          <script>
              $(document).ready(function(){
                 $('#text').autosize();
            });
            </script>
          <!-- /.col -->
          <div class="card" id="style-2" style="overflow-y: scroll; overflow-x: auto; height: 850px; width: 75%;border-top: 3px solid #e0c200;">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div align='center'><h3>UNIVERSIDAD DE PUERTO RICO EN ARECIBO</h3>
                                    <h3>DEPARTAMENTO DE CIENCIAS DE COMPUTOS</h3>
                                    <h3>EVALUACION BACHILLERATO EN CIENCIAS DE COMPUTOS</h3></div>
            </div>
                
                <!-- /.Comienzo de Expediente del Estudiante -->
            <div class="container tables">
                <div class="tab">
                    <button class="tablinks active" onclick="openCity(event, 'Expediente')">Expediente del Estudiante</button>
                    <button class="tablinks" onclick="openCity(event, 'Examinar')">Cursos a Examinar</button>
                  </div>
                
                  <!-- Tab content -->
    <div id="Expediente" class="tabcontent active">
    <section class="content">
      <div class="card-body">
                <div align = "center"><h3>Cursos de Concentración <a href="#"><i class="far fa-edit" onclick="document.getElementById('id01').style.display='block'"></i></a></h3></div>
<!-- </div>   -->
                <br>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr width="50%" bgcolor="#e0c200">
                    <th>Cursos</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>Nota</th>
                    <th>Recomendación</th>
                    <th>Año Aprobó</th>
                    <th>Convalidación/Equivalencia</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                   $sql =" SELECT id_est, id_fijo, nombre_c, descripción_c, créditos_c, nota_c, estatus_c, año_aprobo_c, estatus_R
                   FROM expediente_fijo INNER JOIN expediente USING (id_fijo) WHERE id_rol = 8 AND id_est = $id
                   ORDER by id_fijo";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
             
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                 
                  if($row['estatus_c'] == 1){
                    echo "<tr width='50%' style='background-color: rgb(100,149,237,0.3)'>";
                  }else if ($row['estatus_c'] == 2){
                    echo "<tr width='50%' style='background-color: rgb(237,99,124,0.3)'>";
                  }else{
                  echo "<tr width='50%'>";}
                    echo "<td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>";
                    if($row['estatus_R'] == 1){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='id_est' name='id_est' value='{$row['id_est']}'>
                      <input type='hidden' id='id_fijo' name='id_fijo' value='{$row['id_fijo']}'>
                      <input type='hidden' id='estatus_R' name='estatus_R' value='{$row['estatus_R']}'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#c72837;  width : 100%'>recomendada</button></td>
                      </form>";
                    }else if($row['estatus_c'] == 0){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='id_est' name='id_est' value='{$row['id_est']}'>
                      <input type='hidden' id='id_fijo' name='id_fijo' value='{$row['id_fijo']}'>
                      <input type='hidden' id='estatus_R' name='estatus_R' value='{$row['estatus_R']}'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#10c13f;  width : 100%'>recomendar</button></td>
                      </form>";
                    }else{
                      echo "<td><p style= 'margin-left : 50%'>—</p></td>";
                    }
                    echo"
                    <td>{$row['año_aprobo_c']}</td>
                    <td></td>
                  </tr> ";}}?>
 
                     
                </tbody>
                  </table>
                  <br>
                  <div align = "center"><h3>Cursos Generales Obligatorios <a href="#"><i class="far fa-edit" onclick="document.getElementById('id01').style.display='block'"></i></a></h3></div>
                  <br>
                    <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr width="50%" bgcolor="#e0c200">
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
                      FROM expediente WHERE id_rol = 3 OR id_rol = 6 OR id_rol = 7 OR id_rol = 8 OR id_rol = 9 OR id_rol = 10 AND id_est = $id";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
             
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                 
                  if($row['estatus_c'] == 1){
                    echo "<tr width='50%' style='background-color: rgb(100,149,237,0.3)'>";
                  }else if ($row['estatus_c'] == 2){
                    echo "<tr width='50%' style='background-color: rgb(237,99,124,0.3)'>";
                  }else{
                  echo "<tr width='50%'>";}
                    echo "<td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>
                    <td>{$row['estatus_c']}</td>
                    ";
                    if($row['estatus_R'] == 1){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='id_est' name='id_est' value='{$row['id_est']}'>
                      <input type='hidden' id='id_fijo' name='id_fijo' value='{$row['id_fijo']}'>
                      <input type='hidden' id='estatus_R' name='estatus_R' value='{$row['estatus_R']}'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#c72837;  width : 100%'>recomendada</button></td>
                      </form>";
                    }else if($row['estatus_c'] == 0){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='id_est' name='id_est' value='{$row['id_est']}'>
                      <input type='hidden' id='id_fijo' name='id_fijo' value='{$row['id_fijo']}'>
                      <input type='hidden' id='estatus_R' name='estatus_R' value='{$row['estatus_R']}'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#10c13f;  width : 100%'>recomendar</button></td>
                      </form>";
                    }else{
                      echo "<td><p style= 'margin-left : 50%'>—</p></td>";
                    }
                    echo"
                    <td>{$row['año_aprobo_c']}</td>
                    <td></td>
                  </tr> ";}}?>
                </tbody>
                  </table>
                  <br>
                   <div align = "center"><h3>Electivas Libres <a href="#"><i class="far fa-edit" onclick="document.getElementById('id01').style.display='block'"></i></a></h3></div>
                   <br>
                    <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr width="50%" bgcolor="#e0c200">
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
                      FROM expediente WHERE id_rol = 3 OR id_rol = 6 OR id_rol = 7 OR id_rol = 8 OR id_rol = 9 OR id_rol = 10 AND id_est = $id";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
             
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                 
                  if($row['estatus_c'] == 1){
                    echo "<tr width='50%' style='background-color: rgb(100,149,237,0.3)'>";
                  }else if ($row['estatus_c'] == 2){
                    echo "<tr width='50%' style='background-color: rgb(237,99,124,0.3)'>";
                  }else{
                  echo "<tr width='50%'>";}
                    echo "<td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>
                    <td>{$row['estatus_c']}</td>
                    ";
                    if($row['estatus_R'] == 1){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='id_est' name='id_est' value='{$row['id_est']}'>
                      <input type='hidden' id='id_fijo' name='id_fijo' value='{$row['id_fijo']}'>
                      <input type='hidden' id='estatus_R' name='estatus_R' value='{$row['estatus_R']}'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#c72837;  width : 100%'>recomendada</button></td>
                      </form>";
                    }else if($row['estatus_c'] == 0){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='id_est' name='id_est' value='{$row['id_est']}'>
                      <input type='hidden' id='id_fijo' name='id_fijo' value='{$row['id_fijo']}'>
                      <input type='hidden' id='estatus_R' name='estatus_R' value='{$row['estatus_R']}'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#10c13f;  width : 100%'>recomendar</button></td>
                      </form>";
                    }else{
                      echo "<td><p style= 'margin-left : 50%'>—</p></td>";
                    }
                    echo"
                    <td>{$row['año_aprobo_c']}</td>
                    <td></td>
                  </tr> ";}}?>
                </tbody>
                  </table>
                  <br>
                   <div align = "center"><h3>Electivas Departamentales <a href="#"><i class="far fa-edit" onclick="document.getElementById('id01').style.display='block'"></i></a></h3></div>
                   <br>
                    <table id="example2" class="table table-bordered table-hover">
                     <thead>
                  <tr width="50%" bgcolor="#e0c200">
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
                      FROM expediente WHERE id_rol = 11 OR id_rol = 12 OR id_rol = 13 AND id_est = $id";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
             
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                 
                  if($row['estatus_c'] == 1){
                    echo "<tr width='50%' style='background-color: rgb(100,149,237,0.3)'>";
                  }else if ($row['estatus_c'] == 2){
                    echo "<tr width='50%' style='background-color: rgb(237,99,124,0.3)'>";
                  }else{
                  echo "<tr width='50%'>";}
                    echo "<td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>
                    <td>{$row['estatus_c']}</td>
                    ";
                    if($row['estatus_R'] == 1){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='id_est' name='id_est' value='{$row['id_est']}'>
                      <input type='hidden' id='id_fijo' name='id_fijo' value='{$row['id_fijo']}'>
                      <input type='hidden' id='estatus_R' name='estatus_R' value='{$row['estatus_R']}'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#c72837;  width : 100%'>recomendada</button></td>
                      </form>";
                    }else if($row['estatus_c'] == 0){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='id_est' name='id_est' value='{$row['id_est']}'>
                      <input type='hidden' id='id_fijo' name='id_fijo' value='{$row['id_fijo']}'>
                      <input type='hidden' id='estatus_R' name='estatus_R' value='{$row['estatus_R']}'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#10c13f;  width : 100%'>recomendar</button></td>
                      </form>";
                    }else{
                      echo "<td><p style= 'margin-left : 50%'>—</p></td>";
                    }
                    echo"
                    <td>{$row['año_aprobo_c']}</td>
                    <td></td>
                  </tr> ";}}?>

                    </table>
                 
              </div>
 
    </section>
    </div>
                <!-- /.Final de Expediente del Estudiante -->
                
                
       <!-- /.Comienzo de Examinar -->  
   <div id="Examinar" class="tabcontent">
            <section>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr width="50%" bgcolor="#e0c200">
                    <th>Cursos</th>
                    <th>Descripción</th>
                    <th>Créditos</th>
                    <th>Nota</th>
                    <th>Semestre Aprobó</th>
                  </tr>
                  </thead>
                <tbody>
                <?php
                $sql ="SELECT id_est, nombre_c, descripción_c, créditos_c, nota_c, año_aprobo_c, estatus_c
                   FROM expediente_fijo_libre INNER JOIN expediente USING (id_fijo) WHERE id_especial = 2 AND id_est = $id";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
             
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                 
                  if($row['estatus_c'] == 1){
                    echo "<tr width='50%' style='background-color: rgb(100,149,237,0.3)'>";
                  }else if ($row['estatus_c'] == 2){
                    echo "<tr width='50%' style='background-color: rgb(237,99,124,0.3)'>";
                  }else{
                  echo "<tr width='50%'>";}
                    echo "<td>{$row['nombre_c']}</td>
                    <td>{$row['descripción_c']}</td>
                    <td>{$row['créditos_c']}</td>
                    <td>{$row['nota_c']}</td>
                    <td>{$row['año_aprobo_c']}</td>
                  </tr> ";}}?>
                </tbody>
                  </table>
            </section>    
         </div>
      </div>
              <!-- /.Final de Examinar -->  
                
            <!-- Modals -->
            <!-- Edit -->
            <div id="id01" class="w3-modal" style="padding-left:20%">
    <div class="w3-modal-content w3-animate-zoom">
      <header class="w3-container" style="padding-top:5px">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-button w3-display-topright">&times;</span>
        <h3>Editar</h3>
      </header>
      <div class="w3-container">
          <br>
      <form action='edtiest.php' method='post'>
                          <div class='input-group mb-3'>
                          <input type='text' name='item_id' class='form-control' placeholder='CURSO'>
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
                              <textarea rows='4' cols='50' name='description' class='form-control' placeholder='DESCRIPCIÓN'></textarea>
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
                          <input type='text' name='name' class='form-control' placeholder='RECOMENDACIÓN'>
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
                          <input type='text' name='name' class='form-control' placeholder='CONVALIDACIÓN'>
                          <div class='input-group-append'>
                            <div class='input-group-text'>
                              <span class='fas fa-comment-dots'></span>
                            </div>
                          </div>
                        </div>
          </form>           
      </div>                                                     
      <footer class="w3-container" style="padding-bottom:10px; padding-top:0px">
      <button type='button' class='btn btn-default' data-dismiss='modal' style="float:right; ">APLICAR</button> 
      </footer>   
    </div>
  </div>
            <!-- /.Edit -->

            <!-- Expediente -->
  <div id='id02' class='w3-modal' style='padding-left:20%'>
            <div class='w3-modal-content w3-animate-zoom'>
              <header class='w3-container' style='padding-top:5px'>
                <span onclick='document.getElementById("id02").style.display="none"'
                class='w3-button w3-display-topright'>&times;</span>
                <h3>Subir Expediente</h3>
              </header>
              <div class='w3-container'>
                  <br>
                <div id="drop_zone" ondrop="uploadFile(event)" ondragover="return false">
                <div style="margin: auto; width: 50%; padding-left: 7rem; padding-top: 13rem;">
                  <input type="file" id="myfile" name="myfile">
                          </div>
                </div>   
              </div>
              <footer class='w3-container' style='padding-bottom:10px; padding-top:10px'>
              <button type='button' class='btn btn-default' onclick='history.go(0)' style='float:right; '>APLICAR</button>
              </footer>
            </div>
          </div>
            <!-- /.Expediente -->
            <!-- /.Modals -->
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
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script>
        function openCity(evt, clase) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(clase).style.display = "block";
          evt.currentTarget.className += " active";
        }
        </script>
<script>
    function $(el){
        return document.getElementById(el);
    }

    function uploadFile(event){
    event.preventDefault();
    var file = event.dataTransfer.files[0];
// alert(file.name+" | "+file.size+" | "+file.type);
var formdata = new FormData();
formdata.append("file1", file);
var ajax = new XMLHttpRequest();
ajax.upload.addEventListener("progress", progressHandler, false);
ajax.addEventListener("load", completeHandler, false);
ajax.addEventListener("error", errorHandler, false);
ajax.addEventListener("abort", abortHandler, false);
ajax.open("POST", "../private/file_upload_parser.php");
ajax.send(formdata);

    }

    function progressHandler(event){
$("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
var percent = (event.loaded / event.total) * 100;
$("progressBar").value = Math.round(percent);
$("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
    }

    function completeHandler(event){
$("status").innerHTML = event.target.responseText;
$("progressBar").value = 0;
    }

    function errorHandler(event){
$("status").innerHTML = "Upload Failed";
    }

    function abortHandler(event){
$("status").innerHTML = "Upload Aborted";
    }

   
</script> 
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a>CONSEJERIA-UPRA</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
