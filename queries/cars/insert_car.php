<?php 
    include '../../connection/connection.php';

    $model = $_POST["model"];
    $brand = $_POST["brand"];
    $year = $_POST["year"];

    $sql = "INSERT into cars (model, brand, year) values ('$model', '$brand', '$year')";

    $conn->query($sql);
    $conn->close();

    header("location: ../../carros.php");
?>