<?php 
    include '../../connection/connection.php';

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: ../../login.php");
        exit;
    }

    $id = $_POST["id"]; 

    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];
    $kilo_meters = $_POST["kilo_meters"];
    $id_car = $_POST["id_car"];

    $stmt = $conn->prepare("UPDATE rental SET date_start = ?, date_end = ?, kilo_meters = ?, id_car = ? WHERE id = ?");
    $stmt->bind_param("ssisi", $date_start, $date_end, $kilo_meters, $id_car, $id);

    if ($stmt->execute()) {
        header("Location: ../../aluguer.php");
        exit;
    } else {
        echo "Erro ao atualizar o registro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
?>
