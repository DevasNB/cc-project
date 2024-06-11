<?php 
    include '../../connection/connection.php';

    session_start(); 

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id FROM carros.users WHERE username='".$username."' and password='".$password."'" ;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $row['id'];
        
        header("Location: ../../index.php");
        exit;
    } else {
        header("Location: login.php?error=invalid_credentials");
        exit;
    }

    $conn->close();
?>
