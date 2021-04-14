<?php
require('private/dbconnect.php');
session_start();

$file_name = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
$route = "UPRA-Consejeria/AdminUPRA".$file_name;

move_uploaded_file($file_tmp,$route);


?>