<?php 
    include '../connection/connection.php';

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "insert into users (username, password, id_type) values ('$username', '$password', '2')";

    $conn->query($sql);
    $conn->close();

    header("location: ../index.php");
?>