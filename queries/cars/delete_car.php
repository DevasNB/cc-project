<?php 
    include '../../connection/connection.php';

    
    $sql = "DELETE FROM cars WHERE id='$id'";

    $conn->query($sql);
    $conn->close();

    header("location: ../../carros.php");
?>