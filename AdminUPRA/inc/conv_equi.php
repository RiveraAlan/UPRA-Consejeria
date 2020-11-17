<?php
if (isset($_POST['conv_env-submit'])) {
require 'connection.php';
session_start();
    $student_id = $_SESSION['stdnt_number'];
    $tipo = $_POST['tipo'];
    $clase = mysqli_real_escape_string($conn, $_POST['courses']);

    echo $student_id, $tipo, $clase;
}
?>