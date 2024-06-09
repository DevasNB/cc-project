<?php 
    include '../../connection/connection.php';

    session_start(); 

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id FROM users WHERE username='".$username."' and password='".$password."'" ;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['logged_in'] = true;
        
        header("Location: ../../index.php");
        exit;
    } else {
        header("Location: login.php?error=invalid_credentials");
        exit;
    }

    $conn->close();
?>
