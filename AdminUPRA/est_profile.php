<?php
session_start();
include("inc/connection.php");

if(isset($_GET["stdnt_number"])){
  $student_id = $_GET['stdnt_number'];
} else {
  $student_id = $_SESSION['stdnt_number'];
}
$advisor_id = $_SESSION['adv_id'];

if(!isset($student_id)){
  header("Location: index.php");
    exit();
}

$query = "SELECT * FROM stdnt_record WHERE  stdnt_number = '$_SESSION[stdnt_number]'";
$result = mysqli_query($conn, $query);
$resultCheck = mysqli_num_rows($result);
$isRecordPresentInDB = FALSE;

if($resultCheck > 0)
  $isRecordPresentInDB = TRUE;

    $modal = 'document.getElementById("id03").style.display="block"';
?>
 <!-- script to determine equivalencia/convalidacion -->
 <script>
          function edit(tabla){
                    console.log(tabla);
                    document.getElementById('id01').style.display='block';
          }
          function myFunction(className) {
                    console.log(className); 
                    document.getElementById("og_crse").value = className;
                    document.getElementById('id03').style.display='block';
          }
          function equi_conv(elmnt,tabla) {
            if(tabla == 'mandatory_courses'){
              var x = document.getElementById("mand");
              var y = document.getElementById("mandatory");
            if ((x.style.display === "block") && (y.style.display === "block")) {
              x.style.display = "none";
              y.style.display = "none";
            } else {
              x.style.display = "block";
              y.style.display = "block";
            }
            var x = document.getElementById("gen");
            var y = document.getElementById("general");
            if (x.style.display === "block") {
              x.style.display = "none";
            }
            if (y.style.display === "block") {
              y.style.display = "none";
            }
            var x = document.getElementById("dept");
            var y = document.getElementById("depart");
            if (x.style.display === "block") {
              x.style.display = "none";
            } 
            if (y.style.display === "block") {
              y.style.display = "none";
            }
            var y = document.getElementById("free");
            if (y.style.display === "block") {
              y.style.display = "none";
            }
          }else if(tabla == 'general_courses'){
            var x = document.getElementById("gen");
            var y = document.getElementById("general");
            if ((x.style.display === "block") && (y.style.display === "block")) {
              x.style.display = "none";
              y.style.display = "none";
            } else {
              x.style.display = "block";
              y.style.display = "block";
            }
            var x = document.getElementById("mand");
            var y = document.getElementById("mandatory");
            if (x.style.display === "block") {
              x.style.display = "none";
            }
            if (y.style.display === "block") {
              y.style.display = "none";
            }
            var x = document.getElementById("dept");
            var y = document.getElementById("depart");
            if (x.style.display === "block") {
              x.style.display = "none";
            } 
            if (y.style.display === "block") {
              y.style.display = "none";
            }
            var y = document.getElementById("free");
            if (y.style.display === "block") {
              y.style.display = "none";
            }
          }else if(tabla == 'departamental_courses'){
            var x = document.getElementById("dept");
            var y = document.getElementById("depart");
            if ((x.style.display === "block") && (y.style.display === "block")) {
              x.style.display = "none";
              y.style.display = "none";
            } else {
              x.style.display = "block";
              y.style.display = "block";
            }
            var x = document.getElementById("mand");
            var y = document.getElementById("mandatory");
            if (x.style.display === "block") {
              x.style.display = "none";
            }
            if (y.style.display === "block") {
              y.style.display = "none";
            }
            var x = document.getElementById("gen");
            var y = document.getElementById("general");
            if (x.style.display === "block") {
              x.style.display = "none";
            }
            if (y.style.display === "block") {
              y.style.display = "none";
            }
            var y = document.getElementById("general");
            if (x.style.display === "block") {
              x.style.display = "none";
            }
            if (y.style.display === "block") {
              y.style.display = "none";
            }
            var y = document.getElementById("free");
            if (y.style.display === "block") {
              y.style.display = "none";
            }
          }else{
            var y = document.getElementById("free");
            if (y.style.display === "block") {
              y.style.display = "none";
            } else {
              y.style.display = "block";
            }
            var x = document.getElementById("mand");
            var y = document.getElementById("mandatory");
            if (x.style.display === "block") {
              x.style.display = "none";
            }
            if (y.style.display === "block") {
              y.style.display = "none";
            }
            var x = document.getElementById("gen");
            var y = document.getElementById("general");
            if (x.style.display === "block") {
              x.style.display = "none";
            }
            if (y.style.display === "block") {
              y.style.display = "none";
            }
            var x = document.getElementById("dept");
            var y = document.getElementById("depart");
            if (x.style.display === "block") {
              x.style.display = "none";
            }
            if (y.style.display === "block") {
              y.style.display = "none";
            }
          }
          }
          </script>
<!--*************Agregar general_courses_major, general_education_ciso,general_education_huma****************-->


<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONSEJERÍA-UPRA | EXP-EST</title>
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
  <link rel="stylesheet" href="login.css">

  <style>
    #drop_zone {
            background-color: #EEE;
            border: #999 5px dashed;
            width: 100%;
            height: 30rem;
            padding: 8px;
            font-size: 18px;
        }

.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto;
  grid-gap: 10px;
  background-color: transparent;
  padding: 10px;
}

.grid-item > div {
  background-color: transparent;
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}

@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro);

body {
  background: #ffffff; 
  color: #414141;
  font: 400 17px/2em 'Source Sans Pro', sans-serif;
}

.select-box {
  cursor: pointer;
  position : relative;
  max-width:  20em;
  margin: 1rem auto;
  width: 100%;
}


#course-list {
  background-color: #d3d3d3;
  padding: 0.5rem 1rem;
  width: 100%;
  border-radius: 0.5rem;
    font-size: 1.25rem;
}

.select,
.label {
  color: #414141;
  display: block;
  font: 400 17px/2em 'Source Sans Pro', sans-serif;
}

.select {
  width: 100%;
  position: absolute;
  top: 0;
  padding: 5px 0;
  height: 40px;
  opacity: 0;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  background: none transparent;
  border: 0 none;
}
.select-box1 {
  background: #ececec;

}
.label {
  position: relative;
  padding: 5px 10px;
  cursor: pointer;
}
.open .label::after {
   content: "▲";
}
.label::after {
  content: "▼";
  font-size: 12px;
  position: absolute;
  right: 0;
  top: 0;
  padding: 5px 15px;
  border-left: 5px solid #fff;
}
.leyenda{
  border: none;
  padding: 10px 20px;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
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
        <a href="inicio.php" class="nav-link">Inicio</a>
      </li>
    </ul>
  </nav>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio.php" class="brand-link">
      <img src="img/university.jpg" alt="UPRA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CONSEJERÍA UPRA</span>
    </a>
<!-- Sidebar -->
    <div class="sidebar">
<!-- Sidebar user -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">

<!--Hice Cambio de adv_id a adv_email-->
        <?php $sql = "SELECT adv_name, adv_lastname FROM `advisor` WHERE adv_email = $advisor_id";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                $row = mysqli_fetch_assoc($result);
                ;}
            ?>
          <?php echo "<a class='d-block'>{$row['adv_name']} {$row['adv_lastname']}</a>" ?>
        </div>
      </div>
<!-- Sidebar Menu -->
         <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
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
            </a>
          </li>
        </ul>
      </nav><!-- /.sidebar-menu -->
    </div><!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Expediente Académico del Estudiante</h1></div><!-- /.col -->
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
//Hice un cambio de stdnt_cohort a stdnt_major
                    $sql = "SELECT stdnt_number, stdnt_email, stdnt_lastname1, stdnt_lastname2, stdnt_name, stdnt_initial, stdnt_major
                    FROM student WHERE stdnt_number = '$student_id'";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);
//Cambie crse_code por crse_code y Agregue general_education_ciso y general_education_huma            
                $sentenciaSQL= "SELECT SUM(C)
                FROM ((SELECT crse_credits AS C
                FROM mandatory_courses
                INNER JOIN  stdnt_record USING(crse_code)
                WHERE stdnt_record.stdnt_number = '$student_id')
                UNION ALL
                (SELECT crse_credits AS C
                FROM general_courses
                INNER JOIN stdnt_record USING(crse_code)
                WHERE stdnt_record.stdnt_number = '$student_id')
                UNION ALL (SELECT crse_credits AS C
                FROM departmental_courses
                INNER JOIN stdnt_record USING(crse_code)
                WHERE stdnt_record.stdnt_number = '$student_id')
                UNION ALL
                (SELECT crse_credits AS C
                FROM general_education_ciso
                INNER JOIN stdnt_record USING(crse_code)
                WHERE stdnt_record.stdnt_number = '$student_id')
                UNION ALL
                (SELECT crse_credits AS C
                FROM general_education_huma
                INNER JOIN stdnt_record USING(crse_code)
                WHERE stdnt_record.stdnt_number = '$student_id')
                UNION ALL (SELECT crse_credits AS C
                FROM free_courses
                INNER JOIN stdnt_record USING(crse_code)
                WHERE stdnt_record.stdnt_number = '$student_id')) t1";
                $resultSUM = mysqli_query($conn, $sentenciaSQL);
                $creditos=mysqli_fetch_assoc($resultSUM);
                if ($creditos['SUM(C)'] === NULL){
                  $creditos['SUM(C)']=0;
              }
           
              if($resultCheck > 0){
              $row = mysqli_fetch_assoc($result);
              $año = date('Y')-(substr($row['stdnt_number'], 4,2) + 1999);
               echo "<h3 class='profile-username text-center'>{$row['stdnt_name']} {$row['stdnt_lastname1']} {$row['stdnt_lastname2']}</h3>
                <p class='text-muted text-center'>{$row['stdnt_email']}</p>
                <p class='text-muted text-center'>{$row['stdnt_number']}</p>
                <ul class='list-group list-group-unbordered mb-3'>
                  <li class='list-group-item'>
                    <b>Créditos Aprobados</b> <a class='float-right'>{$creditos['SUM(C)']}</a>
                  </li>
                  <li class='list-group-item'>
                    <b>Año</b> <a class='float-right'>$año</a>
                  </li>
                  <li class='list-group-item'>
                    <b>Secuencia:</b> <a class='float-right'>{$row['stdnt_major']}</a>
                  </li>
                   
                </ul>";?>
                <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-round-xlarge upra-amarillo" style="color:white; width : 100%"><?php print( $isRecordPresentInDB ? "Actualizar " : "Crear ")?> Expediente</button>
              <?php
                echo "</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           
            <!-- About Me Box -->
            <div class='card' >
              <div class='card-header' style='background: #e0c200'>
                <h3 class='card-title' >Comentarios</h3>
              </div>
              <!-- /.card-header -->
              <div>
              <form id='paper' method='POST' action='inc/notespost.php'>
           <textarea placeholder='Escribe una nota aqui.' id='text' name='text' value='' rows='' style='overflow-y: auto; word-wrap: break-word; resize: none; height: 320px;'></textarea>
           <input type='hidden' name='id' value='$student_id'>   
           </div><button type='submit' name='notes-submit' onclick='notes-submit()' class='w3-button w3-round-xlarge upra-amarillo' style='color:white; width : 100%;'>Crear</button>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>";
              }
          ?>
          <!-- /.col -->
          <div class="card" id="style-2" style="overflow-y: scroll; overflow-x: auto; height: 850px; width: 75%;border-top: 3px solid #e0c200;">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div align='center'><h3>UNIVERSIDAD DE PUERTO RICO EN ARECIBO</h3>
                                    <h3>DEPARTAMENTO DE CIENCIAS DE CÓMPUTOS</h3>
                                    <h3>EVALUACIÓN BACHILLERATO EN CIENCIAS DE CÓMPUTOS</h3></div>
            </div>
                
                <!-- /.Comienzo de file del student -->
            <div class="container tables">
                <div class="tab">
                    <button class="tablinks active" onclick="openCity(event, 'file')">Expediente del Estudiante</button>
                    <button class="tablinks" onclick="openCity(event, 'Leyendas')">Leyendas</button>
                  </div>
                
                  <!-- Tab content -->
    <div id="file" class="tabcontent active">
    <section class="content">
    <?php
    $sql = "SELECT stdnt_number, stdnt_email, stdnt_lastname1, stdnt_lastname2, stdnt_name, stdnt_initial, stdnt_major
                    FROM student WHERE stdnt_number = '$student_id'";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);
//Cambie crse_code por crse_code y agregue general_education_ciso, general_education_huma       
                $sentenciaSQL= "SELECT SUM(C)
                FROM ((SELECT crse_credits AS C
                FROM mandatory_courses
                INNER JOIN  stdnt_record USING(crse_code)
                WHERE stdnt_record.stdnt_number = '$student_id' AND stdnt_record.crseR_status = 1)
                UNION ALL
                (SELECT crse_credits AS C
                FROM general_courses
                INNER JOIN stdnt_record USING(crse_code)
                WHERE stdnt_record.stdnt_number = '$student_id' AND stdnt_record.crseR_status = 1)
                UNION ALL 
                (SELECT crse_credits AS C
                FROM departmental_courses
                INNER JOIN stdnt_record USING(crse_code)
                WHERE stdnt_record.stdnt_number = '$student_id' AND stdnt_record.crseR_status = 1)
                UNION ALL 
                (SELECT crse_credits AS C
                FROM general_education_ciso
                INNER JOIN stdnt_record USING(crse_code)
                WHERE stdnt_record.stdnt_number = '$student_id' AND stdnt_record.crseR_status = 1)
                UNION ALL
                (SELECT crse_credits AS C
                FROM general_education_huma
                INNER JOIN stdnt_record USING(crse_code)
                WHERE stdnt_record.stdnt_number = '$student_id' AND stdnt_record.crseR_status = 1)
                UNION ALL
                (SELECT crse_credits AS C
                FROM free_courses
                INNER JOIN stdnt_record USING(crse_code)
                WHERE stdnt_record.stdnt_number = '$student_id' AND stdnt_record.crseR_status = 1)) t1";
                $resultSUM = mysqli_query($conn, $sentenciaSQL);
                $creditos=mysqli_fetch_assoc($resultSUM);
               if($creditos['SUM(C)'] < 1){
                  $creditos['SUM(C)'] = 0;
               }
           
              if($resultCheck > 0){
                if($creditos['SUM(C)'] <= 11){
              echo "
              <div class='error-message'><h4 style='text-align:center'>¡Recomendar más créditos!&nbsp;&nbsp;&nbsp;El código recomienda : {$creditos['SUM(C)']} créditos</h4></div>";
                } else if ($creditos['SUM(C)'] > 21){
                  echo "
              <div class='error-message'><h4 style='text-align:center'>¡Recomendar menos créditos!&nbsp;&nbsp;&nbsp;El código recomienda : {$creditos['SUM(C)']} créditos</h4></div>";
                }
              }
              ?> 
      <div class="card-body">
                <div align = "center"><h3>Cursos de Concentración <a href="#"><i class="far fa-edit" onclick="edit('mandatory_courses')"></i></a></h3></div>
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
                    <th>Convalidación/<br>Equivalencia</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
//Cambie crse_code por crse_code
                   $sql ="SELECT *
                   FROM mandatory_courses INNER JOIN stdnt_record USING (crse_code) WHERE stdnt_number = '$student_id'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
             
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  if($row['crse_status'] == 1){
                    echo "<tr width='50%' style='background-color: #e1e9f4'>"; 
                  }else if ($row['crse_status'] == 2){
                    echo "<tr width='50%' style='background-color: #a5bfde'>"; 
                  }else{
                  echo "<tr width='50%' style='background-color: #6496c8'>";
                  }
                    //Cambie ER por R
                  if($row['crseR_status'] == 0){
                    $color = '#eeddd2';
                   }elseif($row['crseR_status'] == 1){
                    $color = '#995d2d';
                   }elseif($row['crseR_status'] == 2){
                    $color = '#c69b7c';
                  }elseif($row['crseR_status'] == NULL){
                    $color = '';
                  }
                    //Cambie crse_name por crse_code
                 if($row['crse_code'] === 'CCOM 3001' OR 
                    $row['crse_code'] === 'INGL 3101' OR 
                    $row['crse_code'] === 'INGL 3113' OR 
                    $row['crse_code'] === 'CCOM 3010' OR 
                    $row['crse_code'] === 'CCOM 3025' OR 
                    $row['crse_code'] === 'MATE 3171')
                   echo "<td href='#' title='Primer Año - Primer Semestre'>{$row['crse_code']}</td>";
                    
                   elseif($row['crse_code'] === 'CCOM 3002' OR 
                    $row['crse_code'] === 'INGL 3102' OR 
                    $row['crse_code'] === 'INGL 3114' OR 
                    $row['crse_code'] === 'CCOM 3015' OR 
                    $row['crse_code'] === 'CCOM 3035' OR 
                    $row['crse_code'] === 'MATE 3172'){
                    echo "<td href='#' title='Primer Año - Segundo Semestre'>{$row['crse_code']}</td>";
                    }
                    
                    elseif($row['crse_code'] === 'CCOM 4005' OR 
                    $row['crse_code'] === 'MATE 3031' OR 
                    $row['crse_code'] === 'CCOM 3020' OR 
                    $row['crse_code'] === 'ESPA 3101' OR 
                    $row['crse_code'] === 'CIBI 3001'){
                    echo "<td href='#' title='Segundo Año - Primer Semestre'>{$row['crse_code']}</td>";
                    }
                    
                    elseif($row['crse_code'] === 'CCOM 4006' OR 
                    $row['crse_code'] === 'CCOM 4007' OR 
                    $row['crse_code'] === 'CCOM 4065' OR 
                    $row['crse_code'] === 'ESPA 3102' OR 
                    $row['crse_code'] === 'CIBI 3002'){
                    echo "<td href='#' title='Segundo Año - Segundo Semestre'>{$row['crse_code']}</td>";
                    }
                    
                    elseif($row['crse_code'] === 'FISI 3011' OR 
                    $row['crse_code'] === 'FISI 3013' OR 
                    $row['crse_code'] === 'ESPA 3208' OR 
                    $row['crse_code'] === 'CCOM 3041' OR 
                    $row['crse_code'] === 'CCOM 4025'){
                    echo "<td href='#' title='Tercer Año - Primer Semestre'>{$row['crse_code']}</td>";
                    }
                    
                    elseif($row['crse_code'] === 'FISI 3012' OR 
                    $row['crse_code'] === 'FISI 3014' OR 
                    $row['crse_code'] === 'INGL 3015' OR 
                    $row['crse_code'] === 'CCOM 4115'){
                    echo "<td href='#' title='Tercer Año - Segundo Semestre'>{$row['crse_code']}</td>";
                    }
                           
                    elseif($row['crse_code'] === 'CCOM 4075'){
                    echo "<td href='#' title='Cuarto Año - Primer Semestre'>{$row['crse_code']}</td>";
                    }
                    
                    elseif($row['crse_code'] === 'CCOM 4095'){
                    echo "<td href='#' title='Cuarto Año - Segundo Semestre'>{$row['crse_code']}</td>";
                    }
                    
                    else
                    echo "<td>{$row['crse_code']}</td>";
                    
            echo    " <td>{$row['crse_description']}</td>
                    <td>{$row['crse_credits']}</td>
                    <td>{$row['crse_grade']}</td>";
                    if($row['crseR_status'] == 1){
                      $colorR = '#c558c5';
                    }elseif($row['crseR_status'] == 0){
                      $colorR = '#7c657c';
                    }else{
                      $colorR = '';
                    }
                    if($row['crse_grade'] == NULL){
                      echo "<form action='inc/recommend.php' method='POST'>
                      <input type='hidden' id='stdnt_number' name='stdnt_number' value='$student_id '>
                      <input type='hidden' id='crse_code' name='crse_code' value='{$row['crse_code']}'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:$colorR;  width : 100%'>Recomendación</button></td>
                      </form>";
                    }else{
                      echo "<td><p style= 'margin-left : 50%'>—</p></td>";
                    }
                    echo"
                    <td>{$row['semester_pass']}</td>";
                    if($row['crse_equivalence'] != NULL || $row['crse_recognition'] != NULL){
                      echo"
                      <td style='background-color:$color; color: white'>{$row['crse_equivalence']}{$row['crse_recognition']}</td>";
                    }else{
                      echo"
                      <td></td>";
                    }
                  echo "</tr> ";}}?>
                </tbody>
                  </table>
                  <br>
                  <div align = "center"><h3>Cursos Generales Obligatorios <a href="#"><i class="far fa-edit" onclick="edit('general_courses')"></i></a></h3></div>
                  <form action='inc/recommend.php' method='POST'>
                   <?php
                    echo  "<input type='hidden' value='$student_id' name='stdnt_number'>";
                    ?>
                   <button type='submit' name='rec-adi' value='crse_suggestionCISO' onclick="" class="w3-button w3-round-xlarge" style="color:white; width : 25%; margin:10px; margin-left:24%; background-color: rgb(253, 118, 100);">Recomendación Adicional CISO</button>
                   <button type='submit' name='rec-adi' value='crse_suggestionHUMA' onclick="" class="w3-button w3-round-xlarge" style="color:white; width : 25%; margin:10px; background-color: rgb(253, 118, 100);">Recomendación Adicional HUMA</button>
                   </form>
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
                    <th>Convalidación/<br>Equivalencia</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                      //cambie crse_code por crse_code
                $sql ="SELECT *
                FROM general_courses INNER JOIN stdnt_record USING (crse_code) WHERE stdnt_number = '$student_id'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
             //Cambie ER por R
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  if($row['crseR_status'] == 0){
                    $color = '#eeddd2';
                   }elseif($row['crseR_status'] == 1){
                    $color = '#995d2d';
                   }elseif($row['crseR_status'] == 2){
                    $color = '#c69b7c';
                  }elseif($row['crseR_status'] == NULL){
                    $color = '';
                  }
                  if($row['crse_status'] == 1){
                    echo "<tr width='50%' style='background-color: #e1e9f4'>"; 
                  }else if ($row['crse_status'] == 2){
                    echo "<tr width='50%' style='background-color: #a5bfde'>"; 
                  }else{
                  echo "<tr width='50%' style='background-color: #6496c8'>";
                  }
                    //cambie name/label por code
                    echo "<td>{$row['crse_code']}</td> 
                    <td>{$row['crse_description']}</td>
                    <td>{$row['crse_credits']}</td>
                    <td>{$row['crse_grade']}</td>
                    ";
                    if($row['crseR_status'] == 1){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='stdnt_number' name='stdnt_number' value='$student_id'>
                      <input type='hidden' id='crse_code' name='crse_code' value='{$row['crse_code']}'>
                      <input type='hidden' id='crseR_status' name='crseR_status' value='1'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#c72837;  width : 100%'>recomendada</button></td>
                      </form>";
                    }else if($row['crse_status'] == 0){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='stdnt_number' name='stdnt_number' value='$student_id'>
                      <input type='hidden' id='crse_code' name='crse_code' value='{$row['crse_code']}'>
                      <input type='hidden' id='crseR_status' name='crseR_status' value='1'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#10c13f;  width : 100%'>recomendar</button></td>
                      </form>";
                    }else{
                      echo "<td><p style= 'margin-left : 50%'>—</p></td>";
                    }
                    echo"
                    <td>{$row['semester_pass']}</td>";
                    if($row['crse_equivalence'] != NULL || $row['crse_recognition'] != NULL){
                      echo"
                      <td style='background-color:$color; color: white'>{$row['crse_equivalence']}{$row['crse_recognition']}</td>";
                    }else{
                      echo"
                      <td></td>";
                    }
                  echo "</tr> ";}}?>
                </tbody>
                  </table>
                  <br>
                   <div align = "center"><h3>Electivas Libres <a href="#"><i class="far fa-edit" onclick="edit('free_courses')"></i></a></h3></div>
                  <form action='inc/recommend.php' method='POST'>
                   <?php
                    echo  "<input type='hidden' value='$student_id' name='stdnt_number'>";
                    ?>
                   <button type='submit' name='rec-adi' value='crse_suggestionFREE' onclick="" class="w3-button w3-round-xlarge" style="color:white; width : 45%; margin:10px; margin-left:27%; background-color: rgb(253, 118, 100);">Recomendación Adicional</button>
                   </form>
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
                    <th>Convalidación/<br>Equivalencia</th>
                  </tr>
                  </thead>
                <tbody>
                <?php
                //elimine label-name solo deje code y cambie student por stdnt
                    $sql ="SELECT crse_code, crse_description, crse_credits, crse_grade, crse_status, semester_pass, crseR_status
                FROM free_courses INNER JOIN stdnt_record USING (crse_code) WHERE stdnt_number = '$student_id'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
             
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  $crse = "{$row['crse_code']}";
                  if($row['crse_status'] == 1){
                    echo "<tr width='50%' style='background-color: #e1e9f4'>"; 
                  }else if ($row['crse_status'] == 2){
                    echo "<tr width='50%' style='background-color: #a5bfde'>"; 
                  }else{
                  echo "<tr width='50%' style='background-color: #6496c8'>";
                  }
                    echo "<td>{$row['crse_code']}</td>
                    <td>{$row['crse_description']}</td>
                    <td>{$row['crse_credits']}</td>
                    <td>{$row['crse_grade']}</td>
                    ";
                    //code por label/name
                    if($row['crseR_status'] == 1){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='stdnt_number' name='stdnt_number' value='$student_id'>
                      <input type='hidden' id='crse_code' name='crse_code' value='{$row['crse_code']}'>
                      <input type='hidden' id='crseR_status' name='crseR_status' value='1'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#c72837;  width : 100%'>recomendada</button></td>
                      </form>";
                    }else if($row['crse_status'] == 0){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='stdnt_number' name='stdnt_number' value='$student_id'>
                      <input type='hidden' id='crse_code' name='crse_code' value='{$row['crse_code']}'>
                      <input type='hidden' id='crseR_status' name='crseR_status' value='1'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#10c13f;  width : 100%'>recomendar</button></td>
                      </form>";
                    }else{
                      echo "<td><p style= 'margin-left : 50%'>—</p></td>";
                    }
                    echo"
                    <td>{$row['semester_pass']}</td>
                    <td><button onclick='myFunction($crse)' class='w3-button w3-round-xlarge upra-amarillo' style='color:white; width : 100%'>Acomodar</button></td>
                  </tr>";}}?>
                </tbody>
                  </table>
                  <br>
                   <div align = "center"><h3>Electivas Departamentales <a href="#"><i class="far fa-edit" onclick="edit('departamental_courses')"></i></a></h3></div>
                   <form action='inc/recommend.php' method='POST'>
                   <?php
                    echo  "<input type='hidden' value='$student_id' name='stdnt_number'>";
                    ?>
                   <button type='submit' name='rec-adi' value='crse_suggestionDEP' onclick="" class="w3-button w3-round-xlarge" style="color:white; width : 45%; margin:10px; margin-left:27%; background-color: rgb(253, 118, 100);">Recomendación Adicional</button>
                   </form>
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
                    <th>Convalidación/<br>Equivalencia</th>
                  </tr>
                  </thead>
                <tbody>
                <?php
                    //code por label
                $sql ="SELECT *
                FROM departmental_courses INNER JOIN stdnt_record USING (crse_code) WHERE stdnt_number = '$student_id'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
             
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                 if($row['crseR_status'] == 0){
                  $color = '#eeddd2';
                 }elseif($row['crseR_status'] == 1){
                  $color = '#995d2d';
                 }elseif($row['crseR_status'] == 2){
                  $color = '#c69b7c';
                }elseif($row['crseR_status'] == NULL){
                  $color = '';
                }
                  if($row['crse_status'] == 1){
                    echo "<tr width='50%' style='background-color: #e1e9f4'>"; 
                  }else if ($row['crse_status'] == 2){
                    echo "<tr width='50%' style='background-color: #a5bfde'>"; 
                  }else{
                  echo "<tr width='50%' style='background-color: #6496c8'>";
                  }
                    echo "<td>{$row['crse_code']}</td>
                    <td>{$row['crse_description']}</td>
                    <td>{$row['crse_credits']}</td>
                    <td>{$row['crse_grade']}</td>
                    ";
                    //code por label/name
                    if($row['crseR_status'] == 1){
                      echo "<form action='inc/recommend.php' method='post'>
                      <input type='hidden' id='stdnt_number' name='stdnt_number' value='$student_id'>
                      <input type='hidden' id='crse_code' name='crse_code' value='{$row['crse_code']}'>
                      <input type='hidden' id='crseR_status' name='crseR_status' value='1'>
                      <td><button onclick='recommend()' name='rec-submit' class='w3-button w3-round-xlarge' style='color:white; background-color:#c72837;  width : 100%'>recomendada</button></td>
                      </form>";
                    }else{
                      echo "<td><p style= 'margin-left : 50%'>—</p></td>";
                    }
                    echo"
                    <td>{$row['semester_pass']}</td>";
                    if($row['crse_equivalence'] != NULL || $row['crse_recognition'] != NULL){
                      echo"
                      <td style='background-color:$color; color: white'>{$row['crse_equivalence']}{$row['crse_recognition']}</td>";
                    }else{
                      echo"
                      <td></td>";
                    }
                  echo "</tr> ";}}?>
                    </table>   
                    
              </div>
    </section>
    </div><!-- /.Final de file del student -->  
<!-- Comienzo de Examinar -->  
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
                    <th>Acomodar</th>
                  </tr>
                  </thead>
                <tbody>
                <?php
                    //code por label/name
                $sql ="SELECT *
                   FROM free_courses INNER JOIN stdnt_record USING (crse_code) WHERE special_id = 2 AND stdnt_number = '$student_id'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                  
                if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  $crse = "{$row['crse_code']}";
                  if($row['crse_status'] == 1){
                    echo "<tr width='50%' style='background-color: rgb(100,149,237,0.3)'>";
                  }else if ($row['crse_status'] == 2){
                    echo "<tr width='50%' style='background-color: rgb(237,99,124,0.3)'>";
                  }else{
                  echo "<tr width='50%'>";}
                    echo "<td>{$row['crse_code']}</td>
                    <td>{$row['crse_description']}</td>
                    <td>{$row['crse_credits']}</td>
                    <td>{$row['crse_grade']}</td>
                    <td>{$row['semester_pass']}</td>
                    <td><button onclick='myFunction($crse)' class='w3-button w3-round-xlarge upra-amarillo' style='color:white; width : 100%'>Acomodar</button></td>
                  </tr>";}}?>
                </tbody>
                  </table>
            </section>    
         </div>
      </div><!-- /.Final de Examinar --> 
<!-- Comienzo de Leyendas -->
        <div id="Leyendas" class="tabcontent ">
            <section>
            <h1>Leyenda Estatus del Curso</h1>
            <i>Esta leyenda está relacionada con los colores de las filas dentro de los expedientes.</i>
            <div><a class="leyenda" style="background:#e1e9f4;"></a> Ya el estudiante pasó el curso</div> 
            <div><a class="leyenda" style="background:#a5bfde;"></a> El estudiante está tomando el curso</div> 
            <div><a class="leyenda" style="background:#6496c8;"></a> El estudiante no ha tomado el curso</div> 
            
            <h1>Leyenda Botón Recomendación</h1>
            <i>Esta leyenda está relacionada con los colores de los botones de recomendación.</i>
            <div><a class="leyenda" style="background:#c558c5;"></a> El sistema la recomendó automáticamente</div>
            <div><a class="leyenda" style="background:#7c657c;"></a> El sistema no la ha recomendado</div>
               <FONT COLOR="red"> <i COLOR="red"><b>Nota Aclaratoria:</b> Si desea cambiar la recomendación presione el botón y el color cambiará automáticamente junto con la recomendación.</i></FONT>
            <h1>Leyenda Convalidación/Equivalencia</h1>
            <i>Esta leyenda está relacionada con las convalidaciones y equivalencias.</i>
            <div><a class="leyenda" style="background:#eeddd2;"></a> No he realizado el proceso</div>
            <div><a class="leyenda" style="background:#c69b7c;"></a> En proceso: Ya envié los documentos</div>
            <div><a class="leyenda" style="background:#995d2d;"></a> Completado: Ya recibí respuesta</div>
            </section>
        </div><!-- /.Final de Leyendas -->
<!-- Modals -->
<!-- Edit -->
    <div id="id01" class="w3-modal" style="padding-left:20%">
    <div class="w3-modal-content w3-animate-zoom">
      <header class="w3-container" style="padding-top:5px">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-button w3-display-topright">&times;</span>
        <div style="text-align: center"><h3>Editar</h3></div>
        <hr>
      </header>
      <div class="w3-container">
          <br>
      <form action='inc/edit_crse.php' method='POST'>
          <div class="grid-container">
<!-- Dos select Box --> 
          <div class="select-box">          
                  <select name="course" id="course-list">
                  <?php
                      //solo deje code y quite name/label y agregue ciso y huma
                        $sql ="SELECT 	crse_code FROM departmental_courses
                                UNION ALL 
                                (SELECT crse_code FROM mandatory_courses)
                                UNION ALL 
                                (SELECT crse_code FROM general_courses)
                                UNION ALL 
                                (SELECT crse_code FROM general_education_ciso)
                                UNION ALL 
                                (SELECT crse_code FROM general_education_huma)
                                UNION ALL 
                                (SELECT crse_code FROM free_courses)";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                         if($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            //tenia label y name los cambia ambos por code
                            echo "<option value='{$row['crse_code']}'>{$row['crse_code']}</option>";
                        }
                        } ?>
                  </select>
              </div>
          
                          <div class="select-box"> 
                              <select name="grade" id="course-list">
                              <option value='A'>A</option>
                              <option value='B'>B</option>
                              <option value='C'>C</option>
                              <option value='D'>D</option>
                              <option value='F'>F</option>
                              <option value='IB'>IB</option>
                              <option value='IC'>IC</option>
                              <option value='ID'>ID</option>
                              <option value='IF'>IF</option>
                              </select>
                        </div>
              </div> 
<!-- ./ termina dos select Box --> 
                          <div class='input-group mb-3'>
                          <input type='text' name='semester' class='form-control' placeholder='SEMESTRE'>
                          
                          <div class='input-group-append'>
                            <div class='input-group-text'>
                              <span class='fas fa-comment-dots'></span>
                            </div>
                          </div>
                        </div>
                        <p><FONT COLOR="red"> <i COLOR="red">Nota Aclaratoria: </i></FONT>Poner semestre por codigo "TERM" según la plataforma PuTTY.</p>
                    
      </div>                                                     
      <footer class="w3-container" style="padding-bottom:10px; padding-top:0px">
<!-- HAY QUE BREGARLO!  -->
          <button type='submit' class='btn btn-default' onclick='edit_crse()' name='edit_crse-submit' style='float:right;'>APLICAR</button>
      </footer>   
      </form> 
    </div>
  </div><!-- /.Edit -->
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
          </div><!-- /.Expediente -->

            
            <!-- /.Modals -->
             
            </div>
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
      </section>
        <!-- /.row -->
      </div>
    </div><!-- /.container-fluid -->
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
    <strong>Copyright &copy; 2020 <a>CONSEJERÍA-UPRA</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- jQuery -->
<script>
$(document).ready(function(){
    $('#text').autosize();});
</script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
  // REDIRECT TO PHP SCRIPT THAT WILL PUT THE STUDENT RECORD IN A TXT FILE
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

  let  isRecordPresentInDB = '<?php echo $isRecordPresentInDB; ?>';
   
  if(isRecordPresentInDB){
    ajax.open("POST", "inc/update_stdnt_record.php");
  } else {
    ajax.open("POST", "inc/add_stdnt_record.php");
  }
	ajax.send(formdata);
    }
</script>
</body>
</html>