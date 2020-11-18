<?php
include("inc/connection.php");
session_start();
$advisor_id= $_SESSION['adv_id'];
$advisor_name = $_SESSION['adv_name'];

if(!isset($_SESSION['adv_id'])){
  header("Location: index.php");
    exit();
}
$count = 0;
$sql = "SELECT stdnt_number 
                    FROM student";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);
                  if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                  $sum = "SELECT 131 - SUM(C) AS sum
                  FROM ((SELECT crse_credits AS C
                  FROM mandatory_courses
                  INNER JOIN  student_record USING(crse_label)
                  WHERE student_record.stdnt_number = '{$row['stdnt_number']}')
                  UNION ALL
                  (SELECT crse_credits AS C
                  FROM general_courses
                  INNER JOIN student_record USING(crse_label)
                  WHERE student_record.stdnt_number = '{$row['stdnt_number']}')
                  UNION ALL (SELECT crse_credits AS C
                  FROM departmental_courses
                  INNER JOIN student_record USING(crse_label)
                  WHERE student_record.stdnt_number = '{$row['stdnt_number']}')
                  UNION ALL (SELECT crse_credits AS C
                  FROM free_courses
                  INNER JOIN student_record USING(crse_label)
                  WHERE student_record.stdnt_number = '{$row['stdnt_number']}')) t1";
                  $sum_result = mysqli_query($conn, $sum);
                  $sum_resultCheck = mysqli_num_rows($sum_result);
                  $creditos = mysqli_fetch_assoc($sum_result);
                  if($sum_resultCheck > 0){
                    if(($creditos['sum'] < 21) && ($creditos['sum'] != NULL)){
                      $count++;
                    }
                    }
                  }
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONSEJERÍA-UPRA | INICIO</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.css">
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
        <?php $sql = "SELECT adv_name, adv_lastname FROM `advisor` WHERE adv_id = $advisor_id";
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
          <li class="nav-item has-treeview menu-open">
            <a href="modal_crear.php" onclick="document.getElementById('id01').style.display='block'" class="nav-link">
               <i class="far fa-calendar-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <p>Crear Expediente</p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="modal_act.php" onclick="document.getElementById('id01').style.display='block'" class="nav-link">
               <i class="far fa-calendar-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <p>Actualizar Expediente</p>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expediente de los Estudiantes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
              <li class="breadcrumb-item active">Expediente de los Estudiantes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
<!-- bloques de estadisticas (boxes) -->
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box de Estudiantes de CCOM-->
            <div class="small-box bg-blue">
              <div class="inner">
            <?php
                $sql = "SELECT count(*) AS amount_of_students FROM `student`";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
              
                if($resultCheck > 0){
                $row = mysqli_fetch_assoc($result);
                ;}
              ?>
                <?php echo "<h3>{$row['amount_of_students']}</h3>" ?>
                <p>Cantidad de Estudiantes</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a class="small-box-footer"></a>
            </div>
          </div><!-- ./col de Estudiantes de CCOM-->
<!-- small box de Realizaron Consejeria -->
          <div class="col-lg-3 col-6">
            <?php
                $sql = "SELECT COUNT(S_R_D1.stdnt_number) AS s_t_c_c FROM student_record_details S_R_D1 
                        WHERE S_R_D1.conducted_counseling = 1;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                $students_t_c_c = mysqli_fetch_array($result, MYSQLI_NUM);

                $sql = "SELECT COUNT(*) AS total_students FROM student_record_details;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                $total_students =  mysqli_fetch_array($result, MYSQLI_NUM);

                $sql = "SELECT COUNT(S_R_D1.stdnt_number) AS s_t_dn_c_c FROM student_record_details S_R_D1 
                WHERE S_R_D1.conducted_counseling = 0;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                $students_t_dn_c_c = mysqli_fetch_array($result, MYSQLI_NUM); ?>
            <div class="small-box bg-success">
              <div class="inner"><a href="cons_R.php" style="color:white">
                <?php echo "<h3>".(($students_t_c_c[0] / $total_students[0]) * 100)."<sup style='font-size: 20px'>%</sup></h3>"?>
                <p>Realizaron Consejería</p>
                  </a></div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a class="small-box-footer"></a>
            </div>
          </div><!-- ./col de Realizaron Consejeria -->
<!-- small box de No ha realizado Consejeria -->
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner"><a href="cons_NOR.php" style="color:white">
              <?php echo "<h3>".(($students_t_dn_c_c[0] / $total_students[0]) * 100)."<sup style='font-size: 20px'>%</sup></h3>"?>
                <p>No ha realizado Consejería</p>
              </a></div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a class="small-box-footer"></a>
            </div>
          </div><!-- ./col No ha realizado Consejeria-->
<!-- small box de Candidatos a Graduacion -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-purple">
              <div class="inner" style="color: white"><a href="cand_Grad.php" style="color:white">
                <h3><?php echo $count;?></h3>
                <p>Candidatos a Graduación</p>
              </a></div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a class="small-box-footer"></a>
            </div>
          </div><!-- ./col Candidatos a Graduacion -->
        </div>
      </div><!-- /.container-fluid -->
<!-- /. bloques de estadisticas -->
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        <div class="search-bar">
        <input type="text" class="search-bar_input" onkeyup="searchStudent(this.value)" placeholder="Buscar por Nombre Completo o Número de Estudiante..." >
        <img class="search-bar_icon" src="img/search-solid.svg" />
        </div>
        <ul id="myUL"></ul>   
            
<style>
* {
  box-sizing: border-box;
}

.search-bar {
  display: flex;
  align-items: center;
  width: 50%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  margin: auto;
}
.search-bar_input {
  width: 50rem;
  border: none;
  outline: none;
}
.search-bar_icon {
 width: 20px;
 height: 20px;
margin-left: auto;
}



#myUL {
  width: 50%;
  list-style-type: none;
  padding: 0;
  margin: 0 auto;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}
    
#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
<!-- TERMINAR EL SEARCH -->
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <ul id="myUL"></ul>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 12%"> <div align='center'># Estudiante</div></th>
                      <th style="width: 20%">  <div align='center'>Nombre del Estudiante</div></th>
                      <th style="width: 30%"> <div align='center'>Programa Académico del Estudiante</div></th>
                      <th> <div align='center'>Realización de Consejería</div></th>
                      <th style="width: 8%" class="text-center">Estatus</th>
                      <th style="width: 8%" class="text-center">   
                      </th>
                  </tr>
              </thead>
              <tbody> 
              <?php
              $sql = "SELECT stdnt_number, stdnt_email, stdnt_lastname1, stdnt_lastname2, stdnt_name, stdnt_initial, conducted_counseling, record_status, stdnt_cohort
              FROM student NATURAL JOIN student_record_details;";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);
              
              $students = array();
              if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                  array_push($students, array("stdnt_name" =>$row["stdnt_name"].' '.$row["stdnt_lastname1"].' '.$row["stdnt_lastname2"], "stdnt_number" => $row["stdnt_number"]));
                  if(boolval($row["conducted_counseling"]))
                    $conducted_counseling = "<span class='badge badge-success'>SI</span>";
                  else 
                    $conducted_counseling = "<span class='badge badge-danger'>NO</span>";
                  echo "  
                  <tr>
                      <td align='center'>
                          {$row['stdnt_number']}
                      </td>
                      <td align='center'>
                              {$row['stdnt_name']}
                              {$row['stdnt_lastname1']}
                              {$row['stdnt_lastname2']}
                          <br/>
                          <small>
                              {$row['stdnt_cohort']}
                          </small>
                      </td>
                      <td align='center'>
                          <ul class='list-inline'> <div align='center'>
                          <form action='inc/exp_session.php' method='post'>
                              <li class='list-inline-item'>
                              <input type='hidden' id='stdnt_number' name='stdnt_number' value='{$row['stdnt_number']}'> 
                                  <button title='UPRA' onclick='student()' name='est-submit' style='background-color: transparent; border: none'><img alt='Folder' class='table-avatar' src='img/folder.svg' alt='UPRA' /></button>
                              </li></div>
                            </form>
                          </ul>
                      </td>
                      <td class='project-state'>
                          $conducted_counseling
                      </td>";
                      if($row['record_status'] == 1){
                        echo "<td class='project-actions' align='center'>Activo</td>";
                      }else{
                      echo "<td class='project-actions' align='center'>Inactivo</td>";}
                      echo "
                      <form action='inc/status_est.php' method='POST'>
                      <td class='project-actions text-right' align='center'>
                          <input type='hidden' value='{$row['stdnt_number']}' name='stdnt_number'></input>
                          <div style='padding-top: 10px;'>
                          <button type='submit' value='0' onclick='student()' name='status-submit' class='btn btn-danger btn-sm' href='#''>
                             <i class='fas fa-user-times'></i>
                              Inactivo
                          </button>
                        </div>
                        <div style='padding-top: 10px;'>
                          <button type='submit' value='1' onclick='student()' name='status-submit'class='btn btn-info btn-sm' href='#'>
                              <i class='fas fa-user-plus'></i>
                              Activo &nbsp;&nbsp;&nbsp;
                          </button>
                        </div>
                      </td>
                      </form>
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
<script>
function searchStudent(str){
  const strCpy = "^" + str;
  let re = new RegExp(strCpy, "i");
  const students = <?php echo json_encode($students); ?>;
  let searchList = '';

  if(str === ""){
    document.getElementById('myUL').innerHTML = '';
    return;
  }
    

    students.map((student, index) => {
        if(re.test(student.stdnt_name) || re.test(student.stdnt_number)){
              searchList += `<li><a href='est_profile.php?stdnt_number=${student.stdnt_number}'>${student.stdnt_name}</a></li>`;
        }
    }); 

    document.getElementById('myUL').innerHTML = searchList;
}    

</script>
</body>
</html>