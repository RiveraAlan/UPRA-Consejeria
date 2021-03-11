<?php
include("inc/connection.php");
// session_start();
// $advisor_id= $_SESSION['adv_id'];
// $advisor_name = $_SESSION['adv_name'];

//if(!isset($_SESSION['adv_id'])){
//  header("Location: index.php");
//    exit();
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONSEJERÍA-UPRA | INICIO</title>
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
    .grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto;
  grid-gap: 10px;
  background-color: transparent;
  padding: 10px;
}

.grid-item {
  background-color: transparent;
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}

h2 {
      text-align: center;
    }

    * {
      box-sizing: border-box;
    }

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #282828;
}


    /* Create two equal columns that floats next to each other */
    .column {
      float: left;
      width: 50%;
      padding: 10px;
      height: 840px;
      /*Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    body, h1, h3, input { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
      }
      h1, h3 {
      padding: 12px 0;
      font-weight: 400;
      }
      h1 {
      font-size: 28px;
      }
      .main-block, .info {
      display: flex;
      flex-direction: column;
      }
      .main-block {
      justify-content: center;
      align-items: center;
      width: 100%;
      min-height: 100%;
      background: url("/uploads/media/default/0001/01/49bff73f282c2c21f3341f1fe457fe35337b1792.jpeg") no-repeat center;
      background-size: cover;
      }
      .form {
      width: 86%; 
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 5px; 
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
      background: #ebebeb; 
      }
      .info-item {
      width: 100%;
      }
      input {
      width: calc(100% - 57px);
      height: 36px;
      padding-left: 10px; 
      margin: 0 0 12px -5px;
      border-radius: 0 5px 5px 0;
      border: solid 1px #cbc9c9;
      box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
      background: #fff; 
      }
      .icon {
      padding: 9px 15px;
      margin-top: -1px;
      border-radius: 5px 0 0 5px;
      border: solid 0px #cbc9c9;
      background: #666;
      color: #fff;
      }
      input[type=radio] {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      text-indent: 32px;
      cursor: pointer;
      margin-bottom: 10px;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      border: 0.5px solid #e0c200;
      background: #fff;
      }
      label.radio:after {
      content: "";
      position: absolute;
      width: 8px;
      height: 4px;
      top: 5px;
      left: 4px;
      border-bottom: 3px solid #e0c200;
      border-left: 3px solid #e0c200;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      textarea {
      width: 99%;
      margin-bottom: 12px;
      }
      button {
      width: 100%;
      padding: 8px;
      border-radius: 5px; 
      border: none;
      background: #e0c200; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #e0c200;
      }
      .grade-type div {
      display: flex;
      margin: 6px 0;
      }
      @media (min-width: 568px) {
      .info {
      flex-flow: row wrap;
      justify-content: space-between;
      }
      .info-item {
      width: 48%;
      }
      }

  </style>
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
    <a href="inicio.html" class="brand-link">
      <img src="img/university.jpg" alt="UPRA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CONSEJERÍA UPRA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
        <?php $sql = "SELECT adv_name, adv_lastname FROM `advisor` WHERE adv_id = $advisor_id";
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
            <a onclick="document.getElementById('id01').style.display='block'" href="#" class="nav-link">
               <i class="fas fa-plus-square"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <p>Añadir Clase</p>
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
            <h1>Crear Cohorte Académico</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
              <li class="breadcrumb-item active">Crear Cohorte Académico</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">  

<div class="row">
  <div class="column">
    <h2>Nuevo Curso</h2>
    <p>Instrucciones: Complete los campos requeridos y presione para crear nuevo curso.</p>

    <div class="container form">
        <div class="form-group">
          <label for="sel1">Seleccione el departamento (Concentración):</label>
          <select class="form-control" id="sel1"> 
            <option>Ciencias de Cómputos</option>
          </select>
          <label style="margin-left: 5px">Año</label><br>
        <input type="number" id="crse_year" name="crse_year" placeholder="2021" style="margin-left: 2px">
        </div>
    </div>
    
    <!-- Cambiar fname, lname, id, name  <label for="lname">Descripción del Curso:</label>-->
    <h3>Información del Curso</h3>
    <label> Código </label><br>
        <input type="text" id="crse_code" name="crse_code" placeholder="EJEM 1234">
    <label> Descripción </label>
        <input type="text" id="crse_description" name="crse_description" placeholder="Clase">
        <label> Créditos</label>
        <input type="text" id="crse_credits" name="crse_credits" placeholder="3">

        <p>Curso se clasifica como:</p>
        <input type="radio" id="concentracion" name="clasificacion" value="concentracion">
        <label for="concentracion" class="radio" style="margin-right:20px">Requisito de Concentración</label> 
        <input type="radio" id="general" name="clasificacion" value="general">
        <label for="general" class="radio">Requisito General</label><br>



        <button onclick="myFunction()">Submit</button>


  </div>
  <div class="column" style="background-color:#e0c200; overflow-y:auto">
  <form method="post" action="">
    <h2>Cohorte Completo</h2>
    <p>Instrucciones: Presione el botón de confirmar para crear su nuevo cohorte.</p>
<h2>Concentración</h2>
<div class="table-wrapper">
  <table class="fl-table">
      <thead>
      <tr>
          <th>Código</th>
          <th>Descripción</th>
          <th>Créditos</th>
      </tr>
      </thead>
      <tbody id="concentracion-table">
      <tbody>
  </table>
</div>
<h2>General</h2>
<div class="table-wrapper">
  <table class="fl-table">
      <thead>
      <tr>
          <th>Código</th>
          <th>Descripción</th>
          <th>Créditos</th>
      </tr>
      </thead>
      <tbody id="general-table">
      <tbody>
  </table>
</div>
        <h2>Créditos adicionales</h2>
        <p>Si el cohorte requiere créditos en: electivas departamentales, electivas libres, educación general CISO,
          educación general HUMA indique la cantidad en el espacio correspondiente. </p>

<div class="table-wrapper">
  <table class="fl-table">
      <thead>
      <tr>
          <th>Departamental </th>
          <th>Electiva Libre</th>
          <th>Ciencias Sociales</th>
          <th>Humanidades</th>
      </tr>
      </thead>
      <tbody id="requisito">
      <td>
        <input type="number" id="departamental" name="departamental"></td>
        <td>
        <input type="number" id="free" name="free"></td>
        <td>
        <input type="number" id="ciso" name="ciso"></td>
        <td>
        <input type="number" id="huma" name="huma"></td>
      <tbody>
  </table>
</div>

<button onclick="submitForm()" style="background:white; color:#e0c200">Submit</button>
</form>
  </div>
</div>
       </section> 
     </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>              
    </div>
  </div>
  </body>
            <!-- /. crear expediente -->
    <!-- /.modales -->
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a>CONSEJERÍA-UPRA</a>.</strong> All rights reserved.
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
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
  function myFunction() {
  crse_code = document.getElementById("crse_code").value;
  crse_description = document.getElementById("crse_description").value;
  crse_credits = document.getElementById("crse_credits").value;
  table1 = document.getElementById("concentracion-table").innerHTML;
  table2 = document.getElementById("general-table").innerHTML;
  
                if (document.getElementById("general").checked) {
                    clasificacion = "general";
                }else {
                    clasificacion = "concentracion";
                }
                
  if (clasificacion === "concentracion"){
  document.getElementById("concentracion-table").innerHTML = `
            ${table1}
            <tr>
            <td id='con_code'>${crse_code}</td>
            <td id='con_des'>${crse_description}</td>
            <td id='con_cred'>${crse_credits}</td>
            </tr>`;
  }else {
    document.getElementById("general-table").innerHTML = `
            ${table2}
            <tr>
            <td id='gen_code'>${crse_code}</td>
            <td id='gen_des'>${crse_description}</td>
            <td id='gen_cred'>${crse_credits}</td>
            </tr>`;
  }
}

 function submitForm() {
  var elms = document.querySelectorAll("[id='con_code']");

      for(var i = 0; i < elms.length; i++) 
        elms[i].style.display='none'; 
 }

</script>

</html>