<?php
//start session for loggedin variable
session_start();

//connect to MTQ db
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "music theory query db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>