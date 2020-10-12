<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Site Metas -->
   <title>CONSEJERIA-UPRA</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="stylesheet" href="main.css">
   <link rel="stylesheet" href="login.css">
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->
   <head>
   <body>
       <div class="banner">
            <img src="image/upra.png" alt=" " class="logo">
             <h1 class="banner-title">Consejería - Login</h1>
             <p>inicio</p>
            </div>
    <main>      
    <form action="private/auth.php" method="POST" class="login-form">
    <?php 
            if(isset($_GET['isEmailEmpty']) || isset($_GET['isPasswordEmpty'])){
                echo '<div class="error-message">Please fill both the username and password fields!</div>';
            } 
            if(isset($_GET['isAuthFailed'])){
                echo '<div class="error-message">Incorrect username and/or password!</div>';
            }
            ?>
          <div class="form-group">
            <label for="" class="form-group-label">E-mail</label>
             <input type="email" name="email"  class="<?= isset($_GET['isEmailEmpty']) && $_GET['isEmailEmpty'] ? 'form-input-invalid' : 'form-input'?>">
             <?php if(isset($_GET['isEmailEmpty']) && $_GET['isEmailEmpty']) echo '<p class="text-field-error">Please provide an e-mail</p>'?>
          </div>
          <div class="form-group">
            <label for="" class="form-group-label">Password</label>
            <input type="password" name="password" id="" class="<?= isset($_GET['isPasswordEmpty']) && $_GET['isPasswordEmpty'] ? 'form-input-invalid' : 'form-input'?>">
            <?php if(isset($_GET['isPasswordEmpty']) && $_GET['isPasswordEmpty']) echo '<p class="text-field-error">Please provide a password</p>'?>
          </div>
           <div class="login-btn-container"><button type="submit" class="login-btn">Login</button></div>
     </form>
    </main>
   </body>
    </head>
</html>
