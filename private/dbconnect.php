<?php
$serverName = 'localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'consejeria';

$conn = new mysqli($serverName, $dbUserName, $dbPassword, $dbName) 
or die('Connection was unsuccessful');

//echo 'successful connection to database';
?>