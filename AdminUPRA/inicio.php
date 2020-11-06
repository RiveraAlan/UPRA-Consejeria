<?php
include("inc/connection.php");
session_start();
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
  <title>CONSEJERÍA-UPRA | EXP-ESTUDIANTES</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
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
        <a href="index.html" class="nav-link">Inicio</a>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expedientes de los Estudiantes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
              <li class="breadcrumb-item active">Expedientes de los Estudiantes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
    <section class="content">
    <!-- bloques de estadisticas -->
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
            <?php
                $sql = "SELECT count(*) id_est FROM `estudiante`";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                $row = mysqli_fetch_assoc($result);
                ;}
              ?>
                <?php echo "<h3>{$row['id_est']}</h3>" ?>

                <p>Estudiantes de CCOM</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>70<sup style="font-size: 20px">%</sup></h3>

                <p>Realización Consejería</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner" style="color: white">
                <h3>44</h3>

                <p>Candidatos a Graduación de CCOM</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>30<sup style="font-size: 20px">%</sup></h3>

                <p>No ha realizado Consejería</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
  
      </div><!-- /.container-fluid -->           

    <!-- /. bloques de estadisticas -->
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        <section class="card-title"><input type="text" name="busqueda" id="busqueda" placeholder="BUSCAR ESTUDIANTE..."></section>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 12%"> <div align='center'>
                          # Estudiante</div>
                      </th>
                      <th style="width: 20%">  <div align='center'>
                          Nombre del Estudiante</div>
                      </th>
                      <th style="width: 30%"> <div align='center'>
                          Programa Académico del Estudiante</div>
                      </th>
                      <th> <div align='center'>
                          Realización de Consejería</div>
                      </th>
                      <th style="width: 8%" class="text-center">
                          Estatus
                      </th>
                  </tr>
              </thead>
              <tbody> 
              <?php
              $sql = "SELECT id_est, correo_est, num_est, apellido_estU, apellido_estD, nombre_est, inicial_est
                      FROM estudiante";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);
              
              if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
             echo "  
                  <tr>
                      <td>
                          {$row['num_est']}
                      </td>
                      <td>
                              {$row['nombre_est']}
                              {$row['apellido_estU']}
                          <br/>
                          <small>
                              Cohorte 2017
                          </small>
                      </td>
                      <td>
                          <ul class='list-inline'> <div align='center'>
                          <form action='inc/exp_session.php' method='post'>
                              <li class='list-inline-item'>
                              <input type='hidden' id='id_est' name='id_est' value='{$row['id_est']}'> 
                                  <button title='UPRA' onclick='estudiante()' name='est-submit' style='border: none'><img alt='Folder' class='table-avatar' src='img/folder.svg' alt='UPRA' /></button>
                              </li></div>
                            </form>
                          </ul>
                      </td>
                      <td class='project-state'>
                          <span class='badge badge-success'>SI</span>
                      </td>
                      <td class='project-actions text-right'>
                          
                          <div style='padding-top: 10px;'>
                          <a class='btn btn-danger btn-sm' href='#''>
                             <i class='fas fa-user-times'></i>
                              Inactivo
                          </a>
                        </div>
                        <div style='padding-top: 10px;'>
                          <a class='btn btn-info btn-sm' href='#'>
                              <i class='fas fa-user-plus'></i>
                              Activo
                          </a>
                        </div>
                      </td>
                  </tr>
                  ";
                }
            }
                  ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
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
