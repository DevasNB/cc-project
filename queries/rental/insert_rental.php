<?php 
    include '../../connection/connection.php';

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: ../../login.php");
        exit;
    }

    $id_uti = 1;

    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];
    $kilo_meters = $_POST["kilo_meters"];
    $id_car = $_POST["id_car"];

    $stmt = $conn->prepare("INSERT INTO rental (date_start, date_end, kilo_meters, id_car, id_uti) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiis", $date_start, $date_end, $kilo_meters, $id_car, $id_uti);

    if ($stmt->execute()) {
        header("Location: ../../aluguer.php");
        exit;
    } else {
        echo "Erro ao inserir o registro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
?>
