<?php
if (isset($_POST['est-submit'])) {
include_once 'connection.php';
session_start();

$_SESSION['id_est'] = mysqli_real_escape_string($conn, $_POST['id_est']);
header('Location:  ../est_profile.php');
	    exit();
}
?>
