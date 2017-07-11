<?php
error_reporting(1);
//include("index.php");
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "bhushan";
$dbname = "inv";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}


?>
