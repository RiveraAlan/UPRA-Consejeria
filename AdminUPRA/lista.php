<?php
include("inc/connection.php");
session_start();
$advisor_id= 'CC COMS BCN';
$advisor_name = $_SESSION['adv_name'];

// if(!isset($advisor_id)){
//   header("Location: index.php");
//     exit();
// }
?>

<link rel="stylesheet" href="dist/css/lista.css">

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONSEJERÍA-UPRA | LISTA-ESTUDIANTES</title>

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
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/lista.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
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
    <a href="inicio.html" class="brand-link">
      <img src="img/university.jpg" alt="UPRA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CONSEJERÍA UPRA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
        <?php $sql = "SELECT adv_lastname, adv_name FROM `advisor` WHERE adv_major = '$advisor_id'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                $row = mysqli_fetch_assoc($result);
                ;}
            ?>
          <?php echo "<a class='d-block'>{$row['adv_name']} {$row['adv_lastname']} </a>" ?>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Conteo de los Estudiantes por clases</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
              <li class="breadcrumb-item active">Lista</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
         

        <div class="container tables">
          <div class="tab">
            <button class="tablinks active" onclick="openCity(event, 'ElectDept')">Electivas Departamentales</button>
            <button class="tablinks" onclick="openCity(event, 'Concen')">Concentración</button>
            <button class="tablinks" onclick="openCity(event, 'Otros')">Generales</button>
            </div>

        <div id="ElectDept" class="tabcontent active" style="display: block;">
            <div class="table">
                <div class="container-table100">
                          <div class="wrap-table100">
                            <div class="table100 ver2 m-b-110">
                              <table data-vertable="ver1">
                                <thead>
                                  <tr class="row100 head">
                                    <th class="column100 column1" data-column="column1">Código</th>
                                    <th class="column100 column2" data-column="column2">Descripción</th>
                                    <th class="column100 column3" data-column="column3">Créditos</th>
                                    <th class="column100 column4" data-column="column4">Cantidad de Firmas</th>
                                    <th class="column100 column5" data-column="column5">Listas</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <form action="firmas.php" method="POST">
                                  <?php
                                       $sql ="SELECT *
                                        FROM departmental_courses";
                                        $result = mysqli_query($conn, $sql);
                                        $resultCheck = mysqli_num_rows($result);

                                    if($resultCheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                      $sqlSUM ="SELECT COUNT(stdnt_number) as sum
                                      FROM stdnt_record WHERE crse_code = '$row[crse_code]'";
                                        $resultSUM = mysqli_query($conn, $sqlSUM);
                                        $resultCheckSUM = mysqli_num_rows($resultSUM);
                                        $SUM = mysqli_fetch_assoc($resultSUM);
                                      echo "
                                      <tr class='row100'>
                                        <td class='' data-column='column1'>".$row['crse_code']."</td>
                                        <td class='' data-column='column2'>".$row['crse_description']."</td>
                                        <td class='' data-column='column3'>".$row['crse_credits']."</td>
                                        <td class='' data-column='column4'>".$SUM['sum']."</td>
                                        <td class='' data-column='column5'>
                                        <input type='submit' name='crse_code' value='".$row['crse_code']."'></input>
                                        </td>
                                      </tr>";}}?>
                                  </form>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>                
        </div>
      </div>

        <div id="Concen" class="tabcontent">
            <div class="table">
                <div class="container-table100">
                          <div class="wrap-table100">
                            <div class="table100 ver2 m-b-110">
                              <table data-vertable="ver1">
                                <thead>
                                  <tr class="row100 head">
                                    <th class="column100 column2" data-column="column2">Código</th>
                                    <th class="column100 column3" data-column="column3">Descripción</th>
                                    <th class="column100 column4" data-column="column4">Créditos</th>
                                    <th class="column100 column6" data-column="column5">Cantidad de Firmas</th>
                                    <th class="column100 column7" data-column="column7">Listas</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                       $sql ="SELECT *
                                        FROM mandatory_courses";
                                        $result = mysqli_query($conn, $sql);
                                        $resultCheck = mysqli_num_rows($result);

                                    if($resultCheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                      $sqlSUM ="SELECT COUNT(stdnt_number) as sum
                                      FROM stdnt_record WHERE crse_code = '$row[crse_code]'";
                                        $resultSUM = mysqli_query($conn, $sqlSUM);
                                        $resultCheckSUM = mysqli_num_rows($resultSUM);
                                        $SUM = mysqli_fetch_assoc($resultSUM);
                                      echo "
                                    
                                      <tr class='row100'>
                                        <td class='' data-column='column1'>".$row['crse_code']."</td>
                                        <td class='' data-column='column2'>".$row['crse_description']."</td>
                                        <td class='' data-column='column3'>".$row['crse_credits']."</td>
                                        <td class='' data-column='column4'>".$SUM['sum']."</td>
                                        <td class='' data-column='column5'>
                                        <input type='submit' name='crse_code' value='".$row['crse_code']."'></input>
                                        </td>
                                      </tr>
                                     ";}}?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>             
        </div>
      </div>

        <div id="Otros" class="tabcontent">
            <div class="table">
                <div class="container-table100">
                          <div class="wrap-table100">
                            <div class="table100 ver2 m-b-110">
                              <table data-vertable="ver1">
                                <thead>
                                  <tr class="row100 head">
                                    <th class="column100 column2" data-column="column2">Código</th>
                                    <th class="column100 column3" data-column="column3">Descripción</th>
                                    <th class="column100 column4" data-column="column4">Créditos</th>
                                    <th class="column100 column5" data-column="column5">Cantidad de Firmas</th>
                                    <th class="column100 column6" data-column="column6">Listas</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <form action="firmas.php" method="POST">
                                <?php
                                       $sql ="SELECT *
                                        FROM general_courses";
                                        $result = mysqli_query($conn, $sql);
                                        $resultCheck = mysqli_num_rows($result);

                                    if($resultCheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                      $sqlSUM ="SELECT COUNT(stdnt_number) as sum
                                      FROM stdnt_record WHERE crse_code = '$row[crse_code]'";
                                        $resultSUM = mysqli_query($conn, $sqlSUM);
                                        $resultCheckSUM = mysqli_num_rows($resultSUM);
                                        $SUM = mysqli_fetch_assoc($resultSUM);
                                      echo "
                                    
                                      <tr class='row100'>
                                        <td class='' data-column='column1'>".$row['crse_code']."</td>
                                        <td class='' data-column='column2'>".$row['crse_description']."</td>
                                        <td class='' data-column='column3'>".$row['crse_credits']."</td>
                                        <td class='' data-column='column4'>".$SUM['sum']."</td>
                                        <td class='' data-column='column5'>
                                        <form method='post' action='firmas.php'>
                                         <input type='submit' name='crse_code' value='".$row['crse_code']."'></input>
                                        </form>
                                        </td>
                                      </tr>
                                         ";}}?>
                                     </form>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>             
        </div>
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
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
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
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
