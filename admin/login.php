 <?php

    //recoger el email y password del usuario para identificarlo y enviarlo al área que corresponde
    $email=filter_input(INPUT_POST,'email');
    $password=filter_input(INPUT_POST,'password');
    if (isset($email))
    {
        // Conectarse al servidor y seleccionar la base de datos
            $db_username = "root";
            $db_password = "";
            $db_hostname = "localhost";
            $db_database = "consejeriaupra";

        try
        {
            $dbconnection = mysqli_connect($db_hostname, $db_username, $db_password,$db_database) or $error=1;
        }
        catch(Exception $ex)
        {
            die("No se pudo conectar a la base de datos: " . $ex->getMessage());
        }

            mysqli_set_charset($dbconnection,"utf8");
        

           $contrasenaUser = md5($password);
        // Definir el "query"
            $query = "SELECT *
                    FROM user
                    WHERE email='$email' AND password='$contrasenaUser'";
            echo $query;
        
            if ($r = @$dbconnection->query($query)) // Correr el "query"
            {
            //header("Location: admin/index.php?estID=$estID & nombre='$nombre $apellido'");
               if ($r->num_rows == 1)
               {
                    $row = $r->fetch_assoc();
                    if ($row['rol'] == 'admin')
                       header("Location: admin/index3.html");
                    else if ($row['rol']== 'customer')
                       header("Location: customer/index.html");
               }
               else  // No pudo traer info del usuario
                    echo '<p style="color: red;  text-align: center;">Email/Password están incorrectos... vuelva a intentarlo...<a href="index.php">Login</a></h3>';
            }
            
    }

    ?>