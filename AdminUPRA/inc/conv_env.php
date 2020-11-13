<?php
if (isset($_POST['conv_env-submit'])) {
require 'connection.php';
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $clase = mysqli_real_escape_string($conn, $_POST['clase']);

echo $tipo, $clase;
}
?>