<?php
if (isset($_POST['rec-submit'])) {
require 'connection.php';
    $tabla = mysqli_real_escape_string($conn, $_POST['tabla']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $tabla = mysqli_real_escape_string($conn, $_POST['tabla']);