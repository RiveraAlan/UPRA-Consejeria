<?php
include_once 'dbconnect.php';
session_start();





// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( empty($_POST['email']) &&  empty($_POST['password'])) {
    // Could not get the data that should have been sent.
    header('Location: ../index.php?isEmailEmpty=true&isPasswordEmpty=true');
	exit();
} elseif(empty($_POST['email'])) {
    header('Location: ../index.php?isEmailEmpty=true');
	exit();
} elseif(empty($_POST['password'])){
    header('Location: ../index.php?isPasswordEmpty=true');
	exit();
}


// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT id_est, contraseña_est, nombre_est, inicial_est, apellido_estU, apellido_estD, correo_est, num_est, año_CCOM  FROM estudiante WHERE correo_est = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
    $stmt->store_result();
  

    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $firstName, $initial, $lastNameU, $lastNameD, $email, $studentNumber, $year);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        
        
        // =============REMEMBER TO USE PASSWORD ENCRYPTION ====================
        if ($_POST['password'] === $password) {
            // Verification success! User has loggedin!
            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['inicial_est'] = $initial;
            $_SESSION['lastNameU'] = $lastNameU;
            $_SESSION['lastNameD'] = $lastNameD; 
            $_SESSION['fullName'] = $firstName.'  '.$initial.'  '.$lastNameU.' '.$lastNameD;
            $_SESSION['email'] = $email;
            $_SESSION['studentNumber'] = $studentNumber;
            $_SESSION['año_CCOM'] = $year;
            $_SESSION['id_est'] = $id;
            header('Location: ../pruebaconsejeria.php');
            // ====== SWITCH TO INDEX.PHP INSTEAD OF CITA.PHP ============
        } else {
            // Incorrect password
            header('Location:  ../index.php?isAuthFailed=true');

	        exit();
        
          echo '¡Correo electrónico y/o Contraseña incorrecta!';
        }
    } else {
        // Incorrect username
        header('Location:  ../index.php?isAuthFailed=true');
	    exit();
        echo '¡Correo electrónico y/o Contraseña incorrecta!';
    }




	$stmt->close();
}
?>