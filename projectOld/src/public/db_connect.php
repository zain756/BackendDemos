<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patientsdb";
/*
$servername = "mysql6.000webhost.com";
$username = "a4130694_user";
$password = "nokiax101";
$dbname = "a4130694_db";
*/
/*
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
*/

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>