<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONSEJERIA-UPRA | STUDENTS-DATA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/lista.css">
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

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="read-mail.php" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="mailbox.php" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
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
        <div class="image">
          <img src="img/profeliana.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">Eliana Valenzuela Andrade</a>
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
            <a href="estudiantes.php" class="nav-link">
               <i class="fas fa-user-graduate"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <p>Data Estudiantes</p>
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
            <a href="mailbox.php" class="nav-link">
               <i class="far fa-envelope"></i>&nbsp;&nbsp;&nbsp;&nbsp;
              <p>Mail Box</p>
            </a>
          </li>
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
            <h1>Conteo de los Estudiantes</h1>
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
            <button class="tablinks" onclick="openCity(event, 'Otros')">Otros</button>
            </div>

        <div id="ElectDept" class="tabcontent">
          <h3 align="center">Electivas Departamentales</h3>
            <div class="table">
                <div class="container-table100">
                          <div class="wrap-table100">
                            <div class="table100 ver2 m-b-110">
                              <table data-vertable="ver1">
                                <thead>
                                  <tr class="row100 head">
                                    <th class="column100 column1" data-column="column1"></th>
                                    <th class="column100 column2" data-column="column2">Código</th>
                                    <th class="column100 column3" data-column="column3">Descripción</th>
                                    <th class="column100 column4" data-column="column4">Créditos</th>
                                    <th class="column100 column5" data-column="column5">Clasificación</th>
                                    <th class="column100 column6" data-column="column6">Cantidad de Firmas</th>
                                    <th class="column100 column7" data-column="column7">Listas</th>
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
                                    <td class="column100 column5" data-column="column5">2</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3027</b></td>
                                  </tr>
                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3036</td>
                                    <td class="column100 column2" data-column="column2">Programación Visual</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Intermedia</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3036</b></td>
                                  </tr>
                                
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3042</td>
                                    <td class="column100 column2" data-column="column2">Arquitectura de Computadoras</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3042</b></td>
                                  </tr>
                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3115</td>
                                    <td class="column100 column2" data-column="column2">Aplicaciones de Microprocesadores</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3115</b></td>
                                  </tr>
                                  
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3135</td>
                                    <td class="column100 column2" data-column="column2">Temas en Ciencias de Cómputos</td>
                                    <td class="column100 column3" data-column="column3">1-6</td>
                                    <td class="column100 column4" data-column="column4">Variable</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3135</b></td>
                                  </tr>
                                 
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3985</td>
                                    <td class="column100 column2" data-column="column2">Investigación Sub-graduada</td>
                                    <td class="column100 column3" data-column="column3">2</td>
                                    <td class="column100 column4" data-column="column4">Variable</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3985</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4018</td>
                                    <td class="column100 column2" data-column="column2">Redes de Computadoras</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4018</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4019</td>
                                    <td class="column100 column2" data-column="column2">Programación Web</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4019</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4125</td>
                                    <td class="column100 column2" data-column="column2">Inteligencia Artificial</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4125</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4135</td>
                                    <td class="column100 column2" data-column="column2">Diseño Compiladores</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4135</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4305</td>
                                    <td class="column100 column2" data-column="column2">Introducción Diseño Web</td>
                                    <td class="column100 column3" data-column="column3">4</td>
                                    <td class="column100 column4" data-column="column4">Intermedia</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4305</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4306</td>
                                    <td class="column100 column2" data-column="column2">Opt. Gráficas</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Intermedia</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4306</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4307</td>
                                    <td class="column100 column2" data-column="column2">Mantenimiento de PC's</td>
                                    <td class="column100 column3" data-column="column3">4</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4307</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4401</td>
                                    <td class="column100 column2" data-column="column2">Desarrollo de Aplicaciones Móviles</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4401</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4420</td>
                                    <td class="column100 column2" data-column="column2">Cloud Computing Apps</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">Avanzada</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4420</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4401</td>
                                    <td class="column100 column2" data-column="column2">Robótica</td>
                                    <td class="column100 column3" data-column="column3">4</td>
                                    <td class="column100 column4" data-column="column4">Intermedia</td>
                                    <td class="column100 column5" data-column="column5">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4401</b></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>             
        </div>
      </div>

        <div id="Concen" class="tabcontent">
           <h3 align="center">Concentración</h3>
            <div class="table">
                <div class="container-table100">
                          <div class="wrap-table100">
                            <div class="table100 ver2 m-b-110">
                              <table data-vertable="ver1">
                                <thead>
                                  <tr class="row100 head">
                                    <th class="column100 column1" data-column="column1"></th>
                                    <th class="column100 column2" data-column="column2">Código</th>
                                    <th class="column100 column3" data-column="column3">Descripción</th>
                                    <th class="column100 column4" data-column="column4">Créditos</th>
                                    <th class="column100 column6" data-column="column5">Cantidad de Firmas</th>
                                    <th class="column100 column7" data-column="column7">Listas</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3001</td>
                                    <td class="column100 column2" data-column="column2">Programación I</td>
                                    <td class="column100 column3" data-column="column3">5</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3001</b></td>
                                  </tr>
                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3010</td>
                                    <td class="column100 column2" data-column="column2">Niveles Lógicos</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3010</b></td>
                                  </tr>
                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3025</td>
                                    <td class="column100 column2" data-column="column2">Int. Sist. Comp.</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3025</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3002</td>
                                    <td class="column100 column2" data-column="column2">Programación II</td>
                                    <td class="column100 column3" data-column="column3">5</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3002</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3015</td>
                                    <td class="column100 column2" data-column="column2">Comp. en la Sociedad</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3015</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3015</td>
                                    <td class="column100 column2" data-column="column2">Organización Comp.</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3015</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4005</td>
                                    <td class="column100 column2" data-column="column2">Estructura de Datos y Análisis Algorítmico</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4005</b></td>
                                  </tr>
                                 
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3020</td>
                                    <td class="column100 column2" data-column="column2">Matemáticas Discretas</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3020</b></td>
                                  </tr>
                                 
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4006</td>
                                    <td class="column100 column2" data-column="column2">Diseño y Análisis Algorítmico</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4006</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4007</td>
                                    <td class="column100 column2" data-column="column2">Int. Probabilidad y Estad.</td>
                                    <td class="column100 column3" data-column="column3">4</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4007</b></td>
                                  </tr>
                                 
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4065</td>
                                    <td class="column100 column2" data-column="column2">Álgebra Lineal Numérica</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4065</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 3041</td>
                                    <td class="column100 column2" data-column="column2">Sistemas Operativos</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 3041</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4025</td>
                                    <td class="column100 column2" data-column="column2">Organización de Lenguaje</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4025</b></td>
                                  </tr>
                                
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4115</td>
                                    <td class="column100 column2" data-column="column2">Diseño de Base de Datos</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4115</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4075</td>
                                    <td class="column100 column2" data-column="column2">Ingeniería de Programación</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4075</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CCOM 4095</td>
                                    <td class="column100 column2" data-column="column2">Proyecto Ing. de Prog.</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOOM 4095</b></td>
                                  </tr>
                                  
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>             
        </div>
      </div>

        <div id="Otros" class="tabcontent">
          <h3 align="center">Otros</h3>
            <div class="table">
                <div class="container-table100">
                          <div class="wrap-table100">
                            <div class="table100 ver2 m-b-110">
                              <table data-vertable="ver1">
                                <thead>
                                  <tr class="row100 head">
                                    <th class="column100 column1" data-column="column1"></th>
                                    <th class="column100 column2" data-column="column2">Código</th>
                                    <th class="column100 column3" data-column="column3">Descripción</th>
                                    <th class="column100 column4" data-column="column4">Créditos</th>
                                    <th class="column100 column5" data-column="column5">Cantidad de Firmas</th>
                                    <th class="column100 column6" data-column="column6">Listas</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">INGL 3101</td>
                                    <td class="column100 column2" data-column="column2">Inglés Básico I</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista INGL 3101</b></td>
                                  </tr>
                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">INGL 3113</td>
                                    <td class="column100 column2" data-column="column2">Práct. Oral Inglés Básico I</td>
                                    <td class="column100 column3" data-column="column3">0</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista INGL 3113</b></td>
                                  </tr>
                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">MATE 3171</td>
                                    <td class="column100 column2" data-column="column2">Pre-cálculo I</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista MATE 3171</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">INGL 3102</td>
                                    <td class="column100 column2" data-column="column2">Inglés Básico II</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista INGL 3102</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">INGL 3114</td>
                                    <td class="column100 column2" data-column="column2">Práct. Oral Inglés Básico II</td>
                                    <td class="column100 column3" data-column="column3">0</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista INGL 3114</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">MATE 3172</td>
                                    <td class="column100 column2" data-column="column2">Pre-cálculo II</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista MATE 3172</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">MATE 3031</td>
                                    <td class="column100 column2" data-column="column2">Cálculo I</td>
                                    <td class="column100 column3" data-column="column3">4</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista MATE 3031</b></td>
                                  </tr>
                                 
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">ESPA 3101</td>
                                    <td class="column100 column2" data-column="column2">Español Básico I</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista ESPA 3101</b></td>
                                  </tr>
                                 
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CIBI 3001</td>
                                    <td class="column100 column2" data-column="column2">Int. Cs. Biológicas I</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CIBI 3001</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">ESPA 3102</td>
                                    <td class="column100 column2" data-column="column2">Español Básico II</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista ESPA 3102</b></td>
                                  </tr>
                                 
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">CIBI 3002</td>
                                    <td class="column100 column2" data-column="column2">Int. Cs. Biológicas II</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CIBI 3002</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">FISI 3011</td>
                                    <td class="column100 column2" data-column="column2">Física Universitaria I</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista FISI 3011</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">FISI 3013</td>
                                    <td class="column100 column2" data-column="column2">Laboratorio Física Univ. I</td>
                                    <td class="column100 column3" data-column="column3">1</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista FISI 3013</b></td>
                                  </tr>
                                
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">ESPA 3208</td>
                                    <td class="column100 column2" data-column="column2">Redacción y Estilo</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista ESPA 3208</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">FISI 3012</td>
                                    <td class="column100 column2" data-column="column2">Física Universitaria II</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista FISI 3012</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                      <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">FISI 3014</td>
                                    <td class="column100 column2" data-column="column2">Laboratorio Física Univ. II</td>
                                    <td class="column100 column3" data-column="column3">1</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista CCOM 3101</b></td>
                                  </tr>
                                    
                                  <tr class="row100">
                                    <td align="center">
                                    <input type="checkbox" class="case" name="case" value="1" /> </td>
                                    <td class="column100 column1" data-column="column1">INGL 3015</td>
                                    <td class="column100 column2" data-column="column2">Inglés para Ciencia y Tecnología</td>
                                    <td class="column100 column3" data-column="column3">3</td>
                                    <td class="column100 column4" data-column="column4">--</td>
                                    <td class="column100 column5" data-column="column5"><a href="ccom3027.html" class="nav-link"></a>
                                    <b>Lista INGL 3015</b></td>
                                  </tr>
                                  
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
