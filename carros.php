<?php 

    include 'connection/connection.php';

    $sql = "SELECT * FROM cars";
    $result = $conn->query($sql);

    $cars = [];

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $cars[] = $row;
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguer de Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
              <a class="nav-link active" href="#">Carros</a>
              <a class="nav-link" href="aluguer.php">Alugueres</a>
            </div>
          </div>
        </div>
      </nav>

      <div class="container">
        <div class="text-center">
          <h1 class="mt-5">Carros disponíveis</h1>
        </div>
        <a href="adicionar_carro.php" class="btn btn-primary my-2">Adicionar carro</a>
        <div class="row">
          <?php foreach($cars as $car): ?>
            <div class="col-md-4">
              <div class="card mb-4" style="width: 18rem;">
                  <img src="" class="card-img-top" alt="<?= $car['model'] ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?= $car['model'] ?></h5>
                    <p class="card-text"><?= $car['brand'] ?></p>
                    <p class="card-text"><?= $car['year'] ?></p>
                  </div>
                </div>
                <a href="" type="button" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary my-2">Eliminar carro</a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>


      <!-- modal -->
      <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar Carro</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Pretendes mesmo eliminar este carro? Não existe forma de o recuperar depois disso.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
        </div>
      </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
