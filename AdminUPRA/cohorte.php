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

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.grid-container {
  display: grid;
  grid-template-columns: auto auto;
  padding: 10px;
}
.grid-item {
  padding: 20px;
  font-size: 30px;
  text-align: center;
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
    <h2 style="margin-top:1px">Cohorte Completo</h2>
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
          <th>Dept.</th>
          <th>Libre</th>
          <th>CISO</th>
          <th>HUMA</th>
      </tr>
      </thead>
      <tbody id="requisito">
      <td>
        <input type="number" id="departamental" name="departamental" style="width:100%"></td>
        <td>
        <input type="number" id="free" name="free" style="width:100%"></td>
        <td>
        <input type="number" id="ciso" name="ciso" style="width:100%"></td>
        <td>
        <input type="number" id="huma" name="huma" style="width:100%"></td>
      <tbody>
  </table>
</div>

<button id="myBtn" style="background:white; color:#e0c200">Submit</button>
<!-- The Modal -->
<div id="myModal" class="modal" style="padding-bottom: 20px">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" id="close">&times;</span>
    <h2>Flujograma del Cohorte</h2>
    <div class="grid-container">
      <div class="grid-item">
    <h3 for="sel2"><b>Seleccione el Curso:</b></h3>
          <select class="form-control" id="sel2"> 
            <option>CCOM 3045</option>
          </select>
          <h3 for="sel3"><b>Seleccione el Año:</b></h3>
          <select class="form-control" id="year"> 
            <option>Primer Año</option>
            <option>Segundo Año</option>
            <option>Tercer Año</option>
            <option>Cuarto Año</option>
          </select>
      
          <h3 for="sel3"><b>Seleccione el Semestre:</b></h3>
          <select class="form-control" id="semester"> 
            <option>Enero-Mayo</option>
            <option>Agosto-Diciembre</option>
          </select>

          <div class="grid-container">
  <div class="grid-item">
  <h3 for="sel4"><span class="close" id="clearPre">&times;</span><b>Pre-Requisito:</b></h3>
          <select class="form-control" id="sel4"> 
          <option></option>
          </select>
          <div>
            <button onclick="submitPre()" style="background:#e0c200; width: 30%; height: 35%; margin-top: 5px; margin-bottom: 5px">Add</button>
          </div>
  <div id="pre" style="overflow-y: auto;">
  </div>
  </div>
  <div class="grid-item">
  <h3 for="sel5"><span class="close" id="clearCo">&times;</span><b>Co-Requisito:</b></h3>
          <select class="form-control" id="sel5"> 
          <option></option>
          </select>
          <div>
            <button onclick="submitCo()" style="background:#e0c200; width: 30%; height: 35%; margin-top: 5px; margin-bottom: 5px">Add</button>
          </div>
  <div id="co" style="overflow-y: auto;">
  </div>
  </div>  
  </div>
  <div>
            <button onclick="submitReq()" style="background: #e0c200; width: 30%; height: 35%; margin-top: 5px; margin-bottom: 5px; margin-left: 10%">Save</button>
            </div>
          </div>
            <div class="card card-primary grid-item" style="border-top: 3px solid #e0c200;">
              <ol class="card-body box-profile" id="clases" style="overflow-y:auto; max-height: 400px">

              </ol>
            <button onclick="submitAll()" style="background:#e0c200; margin-top: 5px; margin-bottom: 5px">Submit</button>

</div>

                </div>
</div>
  
</div>
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

let pre_requisitos = [];
let co_requisitos = [];

function submitPre() {
    var pre = document.getElementById("sel4").value;
    var list = document.getElementById("pre").innerHTML;
    document.getElementById("pre").innerHTML = `
      ${list}
      <h3 name="pre-requisito">${pre}</h3>
    `;
    pre_requisitos.push(pre);
 }

 function submitCo() {
    var co = document.getElementById("sel5").value;
    var list = document.getElementById("co").innerHTML;
    document.getElementById("co").innerHTML = `
      ${list}
      <h3 id="co-requisito">${co}</h3>
    `;
    co_requisitos.push(co);
 }
var list_counter = 0;
var arr = [];
var class_arr = [];
 function submitReq(){
   var clase = document.getElementById("sel2").value;
   var list = document.getElementById("clases").innerHTML;
   var year = document.getElementById("year").value;
   var semester = document.getElementById("semester").value;
   
  class_arr.push([clase, year, semester]);
  console.table(class_arr);
   list_counter++;

  if (pre_requisitos.length >= co_requisitos.length){
    var temp = pre_requisitos.length;
    if (temp === 0){
      temp = 1;
    }
  }else if (co_requisitos.length > pre_requisitos.length){
    var temp = co_requisitos.length;
  }
  console.log(temp);
  for (i = 0; i < temp; i++){
    if (pre_requisitos[i] != "" && co_requisitos[i] != ""){
        arr.push([clase, pre_requisitos[i], co_requisitos[i]])
        document.getElementById("clases").innerHTML = `
          ${list}
          <li style="margin-left:20px; font-size: 0.6em" onclick="viewClase('${clase}')">${clase}</li>
        `;
        } else if (pre_requisitos[i] != "" && co_requisitos[i] === ""){
            arr.push([clase, pre_requisitos[i], "-"]);
            document.getElementById("clases").innerHTML = `
              ${list}
              <li style="margin-left:20px; font-size: 0.6em" onclick="viewClase('${clase}')">${clase}</li>
            `;
            } else if(co_requisitos[i] != "" && pre_requisitos[i] === ""){
                arr.push([clase, "-", co_requisitos[i]]);
                document.getElementById("clases").innerHTML = `
                  ${list}
                  <li style="margin-left:20px; font-size: 0.6em" onclick="viewClase('${clase}')">${clase}</li>
                `;
                } else if(co_requisitos[i] === "" && pre_requisitos[i] === ""){
                    document.getElementById("clases").innerHTML = `
                      ${list}
                      <li style="margin-left:20px; font-size: 0.6em" onclick="viewClase('${clase}')">${clase}</li>
                    `;
                    }
  }

 pre_requisitos = [];
 co_requisitos = [];

 document.getElementById("co").innerHTML = ``;
 document.getElementById("pre").innerHTML = ``;
 console.table(arr);
 }
 
 function viewClase(clase){
  var list;
  document.getElementById("co").innerHTML = ``;
  document.getElementById("pre").innerHTML = ``;
   for (var i = 0; i < arr.length; i++){
    if (arr[i][0] === `${clase}`){
      if (arr[i][1] != null){
        list = document.getElementById("pre").innerHTML;
        document.getElementById("pre").innerHTML = `
      ${list}
      <h3 name="pre-requisito">${arr[i][1]}</h3>
    `;
      }
      if (arr[i][2] != null){
        list = document.getElementById("co").innerHTML;
        document.getElementById("co").innerHTML = `
      ${list}
      <h3 name="co-requisito">${arr[i][2]}</h3>
    `;
      }
    }
   }
   for (var i = 0; i < class_arr.length; i++){
     if(class_arr[i][1] = `${clase}`){
    document.getElementById("year").value = class_arr[i][2];
    document.getElementById("semester").value = class_arr[i][3]; 
     }
   }
 }

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementById("close");

// Get the <span> element that clears the co-requisitos
var clearCo = document.getElementById("clearCo");

// Get the <span> element that clears the pre-requisitos
var clearPre = document.getElementById("clearPre");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  var con_code = document.querySelectorAll("[id='con_code']");
  var gen_code = document.querySelectorAll("[id='gen_code']");
  
    for(var i = 0; i < con_code.length; i++){ 
      loop = document.getElementById("sel2").innerHTML;
      document.getElementById("sel2").innerHTML = `
              ${loop}
              <option>${con_code[i].innerHTML}</option>
              `; 
      document.getElementById("sel4").innerHTML = `
              ${loop}
              <option>${con_code[i].innerHTML}</option>
              `; 
      document.getElementById("sel5").innerHTML = `
              ${loop}
              <option>${con_code[i].innerHTML}</option>
              `; 
    }

      for(var i = 0; i < gen_code.length; i++){ 
        loop = document.getElementById("sel2").innerHTML;
        document.getElementById("sel2").innerHTML = `
            ${loop}
            <option>${gen_code[i].innerHTML}</option>
            `; 
        document.getElementById("sel4").innerHTML = `
            ${loop}
            <option>${gen_code[i].innerHTML}</option>
            `; 
        document.getElementById("sel5").innerHTML = `
            ${loop}
            <option>${gen_code[i].innerHTML}</option>
            `; 
          }
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  document.getElementById("sel2").innerHTML = `<option></option>`;
  document.getElementById("sel4").innerHTML = `<option></option>`;
  document.getElementById("sel5").innerHTML = `<option></option>`;
  document.getElementById("pre").innerHTML = ``;
  document.getElementById("co").innerHTML = ``;
}

// When the user clicks on <span> (x), clear co-requisitos
clearCo.onclick = function() {
  document.getElementById("co").innerHTML = '';
  for (var i = 0; i < arr.length; i++){
    if (arr[i][0] === `${clase}`){
      console.log(arr[i][2]);
    }
  }
  co_requisitos = [];
}

// When the user clicks on <span> (x), clear pre-requisitos
clearPre.onclick = function() {
  document.getElementById("pre").innerHTML = '';
  pre_requisitos = [];
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    document.getElementById("sel2").innerHTML = `<option></option>`;
    document.getElementById("sel4").innerHTML = `<option></option>`;
    document.getElementById("sel5").innerHTML = `<option></option>`;
    document.getElementById("pre").innerHTML = ``;
    document.getElementById("co").innerHTML = ``;
  }
}

function submitAll() {
  document.innerHTML = `
  <form method="POST" action="inc/add_class.php">
  <input type="hidden" name="dept" value=""></input>
  <input type="hidden" name="cohort_year" value=""></input>
  <input type="hidden" name="code" value=""></input>
  <input type="hidden" name="desc" value=""></input>
  <input type="hidden" name="cred" value=""></input>
  <input type="hidden" name="req" value=""></input>
  <input type="hidden" name="cred_dept" value=""></input>
  <input type="hidden" name="cred_free" value=""></input>
  <input type="hidden" name="cred_ciso" value=""></input>
  <input type="hidden" name="pre_co" value=""></input>
  <input type="hidden" name="class_year" value=""></input>
  <input type="hidden" name="class_semester" value=""></input>
  </form>
  `;
}

</script>

</html>