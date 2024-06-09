<?php 
    include '../../connection/connection.php';

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id FROM users WHERE username='".$username."' and password='".$password."'" ;

    $conn->query($sql);
    $conn->close();

    header("location: ../../index.php");
?>