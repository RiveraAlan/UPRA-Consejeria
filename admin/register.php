<?php

 $db_username = "root";
    $db_password = "";
    $db_hostname = "localhost";
    $db_database = "aromardb";

    try
    {
        $dbconnection = mysqli_connect($db_hostname, $db_username, $db_password,$db_database) or $error=1;
    }
    catch(Exception $ex)
    {
        die("No se pudo conectar a la base de datos: " . $ex->getMessage());
    }

     mysqli_set_charset($dbconnection,"utf8");

?>

    <?php
       $name = filter_input(INPUT_POST,'first_name');
	   $lastname = filter_input(INPUT_POST,'last_name');
	   $email = filter_input(INPUT_POST,'email');
       $address1 = filter_input(INPUT_POST,'address_1'); 
       $address2 = filter_input(INPUT_POST,'address_2'); 
       $city = filter_input(INPUT_POST,'city'); 
       $zipcode = filter_input(INPUT_POST,'zipcode');
       $country = filter_input(INPUT_POST,'country');    
	   $pass = filter_input(INPUT_POST,'password');
	   $rpass = filter_input(INPUT_POST,'confirm');
        

	//se confirma la contraseña
	if ($pass != $rpass) {
		die('Las contraseñas no coinciden, Verifique <br /> <a href="register.html">Volver</a>');
	}

	//se encripta la contraseña
	$contrasenaUser = md5($pass);

        $query = "INSERT INTO user (first_name, last_name, email, password, rol) VALUES ('$name','$lastname','$email','$contrasenaUser','customer')";
        $query_2 = "INSERT INTO address (address_1, address_2, city, country, zipcode) VALUES ('$address1','$address2','$city','$country',' $zipcode')";
        
        

         if(mysqli_query($dbconnection, $query))
         if(mysqli_query($dbconnection, $query_2)){
                header("Location: index.html");
            }else{
                print '<p style = "color: red;"> No se pudo recuperar datos por el error:<br/>'.$dbc->connect_error . '.</p><p>
                                El query que se corrió fue: '.$query. '</p>';
         }


    ?>
