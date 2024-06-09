<?php 
    include '../../connection/connection.php';

    $id = $_POST["id"];

    $sql = "SELECT * FROM cars WHERE id='$id'";
   
    $conn->query($sql);
    $conn->close();
?>