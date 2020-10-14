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
          <div class="site-logo mr-auto w-25"><a href="index.html">CONSEJERÍA UPRA</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Inicio</a></li>
                <li><a href="#courses-section" class="nav-link">Acerca</a></li>
              </ul>
            </nav>
          </div>

      
        </div>
      </div>
      
    </header>

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/laptop.png');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">¡Bienvenidos a Consejería Universidad de Puerto Rico!</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">En el botón de abajo muestra cómo hacer la Consejería</p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="#" class="btn btn-primary py-3 px-5 btn-pill">¿Cómo hacer Consejería?</a></p>

                </div>

                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                    
                    <form action="private/auth.php" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4">Iniciar Sesión</h3>
             <?php 
                if(isset($_GET['isEmailEmpty']) || isset($_GET['isPasswordEmpty'])){
                    echo '<div class="error-message">Please fill both the username and password fields!</div>';
                } 
                if(isset($_GET['isAuthFailed'])){
                    echo '<div class="error-message">Incorrect username and/or password!</div>';
                }
                ?>
              <div class="form-group">
                <label for="" class="form-group-label">Correo Electrónico</label>
                 <input type="email" name="email"  class="form-control <?= isset($_GET['isEmailEmpty']) && $_GET['isEmailEmpty'] ? 'form-input-invalid' : 'form-input'?>">
                 <?php if(isset($_GET['isEmailEmpty']) && $_GET['isEmailEmpty']) echo '<p class="text-field-error">Please provide an e-mail</p>'?>
              </div>
              <div class="form-group">
                <label for="" class="form-group-label">Contraseña</label>
                <input type="password" name="password" id="" class="form-control <?= isset($_GET['isPasswordEmpty']) && $_GET['isPasswordEmpty'] ? 'form-input-invalid' : 'form-input'?>">
                <?php if(isset($_GET['isPasswordEmpty']) && $_GET['isPasswordEmpty']) echo '<p class="text-field-error">Please provide a password</p>'?>
              </div>
               <div class="login-btn-container"><button type="submit" class="btn btn-primary btn-pill">Iniciar Sesión</button></div>
         </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
    <div class="site-section courses-title" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Acerca</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14">

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="images/mision.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <h3><b>Misión</b></h3>
                <p>Los estudiantes de CCOM nos encargamos en utilizar las tecnologías disponibles a nuestro alcance para desarrollar y optimizar plataformas que asistan a los demás en el proceso de matrícula.</p>
              </div>
            </div>

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="images/vision.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <h3><b>Visión</b></h3>
                <p>Deseamos un día proveer esta plataforma a otros departamentos académicos y de esta manera todos los estudiantes de UPRA puedan beneficiarse de una consejería más eficiente y placentera.</p>
              </div>
            </div>

            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.html"><img src="images/proposito.jpg" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <h3><b>Propósito</b></h3>
                <p>El propósito de un sistema de consejería es apoyar al estudiantado y ayudar en la selección de cursos.</p><br><br>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

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
    
  </body>
</html>