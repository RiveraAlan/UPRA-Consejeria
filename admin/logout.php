<?php
// Need the session:
session_start();

// Reset the session array:
$_SESSION = array();

// Destroy the session data on the server:
session_destroy();

header("Location:index.html");

?>