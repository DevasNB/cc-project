<?php 
    include '../../connection/connection.php';

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit; 
    }
    
    $sql = "DELETE FROM cars WHERE id='$id'";

    $conn->query($sql);
    $conn->close();

    header("location: ../../carros.php");
?>