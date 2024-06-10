<?php 
    include '../../connection/connection.php';

    $id = $_POST["id"]; 
    $model = $_POST["model"];
    $brand = $_POST["brand"];
    $year = $_POST["year"];

    $sql = "UPDATE carros.cars SET model='$model', brand='$brand', year='$year' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro ao atualizar o registro: " . $conn->error;
    }

    $conn->close();

    header("location: ../../carros.php");
?>