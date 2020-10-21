<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>CONSEJERIA-UPRA | LOGIN</title>
</head>
<body>
     <div class="background-dark">
         <div class="brand">
           <img src="img/university.png" alt="" class="logo">
            <h1 class="title">Consejería UPRA</h1>
            <?php 
            if(isset($_GET['isEmailEmpty']) || isset($_GET['isPasswordEmpty'])){
                echo '<div class="error-message">Please fill both the username and password fields!</div>';
            } 
            if(isset($_GET['isAuthFailed'])){
                echo '<div class="error-message">Incorrect username and/or password!</div>';
            }
            ?>
         </div>
         
         

        <form class="login-form" action="../private/admin_auth.php" method="POST">
             <div class="form-group">
                 <div class="<?= isset($_GET['isEmailEmpty']) && $_GET['isEmailEmpty'] ? 'form-group-label-invalid' : 'form-group-label'?>">E-mail</div>
                 <input type="email" name="email" id="" class="<?= isset($_GET['isEmailEmpty']) && $_GET['isEmailEmpty'] ? 'form-input-invalid' : 'form-input'?>">
             </div>
             <div class="form-group">
                 <div class="<?= isset($_GET['isPasswordEmpty']) && $_GET['isPasswordEmpty'] ? 'form-group-label-invalid' : 'form-group-label'?>">Password</div>
                 <input type="password" name="password" id="" class="<?= isset($_GET['isPasswordEmpty']) && $_GET['isPasswordEmpty'] ? 'form-input-invalid' : 'form-input'?>">
             </div>
             <div class="mx-auto"><button type="submit" class="submit-btn">Login</button></div>
        </form>


     </div>
</body>
</html>