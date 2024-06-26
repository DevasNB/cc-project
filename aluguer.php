<?php
  include 'connection/connection.php';

  if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
      header("Location: login.php");
      exit; 
  }

  $sql = "SELECT rental.*, cars.model, users.username 
          FROM carros.rental 
          JOIN carros.cars ON rental.id_car = cars.id
          JOIN carros.users ON rental.id_uti = users.id";
  $result = $conn->query($sql);

  $rentals = [];

  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $rentals[] = $row;
      }
  }

  $conn->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alguguer de Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CCProject</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
              <a class="nav-link" href="carros.php">Carros</a>
              <a class="nav-link active" href="#">Alugueres</a>
            </div>
          </div>
        </div>
      </nav>

      <div class="container">
        <div class="text-center">
          <h1 class="mt-5">Os meus alugueres</h1>
          <p>Aqui é possivel visualizar os alugueres feitos</p>
        </div>
        <a href="adicionar_aluguer.php" class="btn btn-primary my-2">Novo aluguer</a>
        <div class="row">
          <?php foreach($rentals as $rental): ?>
            <div class="col-md-4">
                <div class="card mb-4" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $rental['model'] ?></h5>
                        <p class="card-text"><?= $rental['date_start'] ?></p>
                        <p class="card-text"><?= $rental['date_end'] ?></p>
                        <p class="card-text"><?= $rental['kilo_meters'] ?> km</p>
                        <p class="card-text"><?= $rental['username'] ?></p>
                        <a href="editar_aluguer.php?id=<?= $rental['id'] ?>" class="btn btn-warning my-2"><i class="bi bi-pencil-fill"></i></a>
                        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#myModal<?= $rental['id'] ?>" class="btn btn-danger my-2"><i class="bi bi-trash-fill"></i></a>
                    </div>
                </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
        <!-- <div class="my-2">
            <a href="index.php" class="btn btn-secondary btn-block">Voltar</a>
        </div> -->
      
      <!-- modal -->
      <?php foreach($rentals as $rental): ?>
        <div class="modal fade" id="myModal<?= $rental['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cancelar Aluguer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Pretendes mesmo cancelar este aluguer? Não existe forma de o recuperar depois disso.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="queries/rental/delete_rental.php" method="post">
                  <input type="hidden" name="id" value="<?= $rental['id'] ?>">
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>