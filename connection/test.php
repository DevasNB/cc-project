<?php
$servername = "10.0.1.4";
$database = "carros";
$username = "CCPDBUser";
$password = "CCPDBPassword";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>