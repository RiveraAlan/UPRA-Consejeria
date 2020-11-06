<?php
if (isset($_POST['rec-submit'])) {
require 'connection.php';
    $id_est = mysqli_real_escape_string($conn, $_POST['id_est']);