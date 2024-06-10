<?php
session_start();

$servername = "10.0.1.4";
$database = "carros";
$username = "CCPDBUser";
$password = "CCPDBPassword";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

?>
