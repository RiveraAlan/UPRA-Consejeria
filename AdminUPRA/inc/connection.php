<?php

// $serverName = "localhost";
// $dbUserName = "root";
// $dbPassword = "";
// $dbName = "counseling";

$serverName = '136.145.29.193';
$dbUserName = 'chrtirmo';
$dbPassword = 'chrtirmo840$cuta';
$dbName = 'chrtirmo_db';

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}