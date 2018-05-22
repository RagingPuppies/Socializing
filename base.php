<?php
header('Access-Control-Allow-Origin: *');
session_start();
 
$dbhost = "localhost";
$dbname = "social";
$dbuser = "root"; 
$dbpass = "qwe123!!"; 
 
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
 
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}
?>


