<?php 
    include '../../connection/connection.php';

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit; 
    }

    $id = $_POST["id"];
    
    $sql = "DELETE FROM rental WHERE id='$id'";

    $conn->query($sql);
    $conn->close();

    header("location: ../../aluguer.php");
?>