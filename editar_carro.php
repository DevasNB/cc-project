<?php
    include 'connection/connection.php';

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit; 
    }

    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "SELECT * FROM cars WHERE id='$id'";
        
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $car = $result->fetch_assoc();
        } else {
            echo "Nenhum carro encontrado com este ID.";
        }
    } else {
        echo "ID do carro não fornecido na URL.";
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
          <h1 class="mt-5">Editar carro</h1>
          <p>Preenche corretamente os seguintes campos de formulário</p>
        </div>
        <!-- <div class="my-2">
            <a href="index.php" class="btn btn-secondary btn-block">Voltar</a>
        </div> -->
        <div class="col-12">
            <div class="form-container">
                <form method="POST" action="queries/cars/update_car.php">
                    <?php if(isset($car)) { ?>
                        <div class="form-group">
                            <label for="model">Modelo de carro</label>
                            <input type="text" class="form-control" name="model" value="<?= $car['model'] ?>" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="brand">Marca</label>
                            <input type="text" class="form-control" name="brand" value="<?= $car['brand'] ?>" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="year">Ano</label>
                            <input type="number" class="form-control" name="year" value="<?= $car['year'] ?>" required>
                        </div>
                        <!-- Incluir um campo oculto para enviar o ID do carro -->
                        <input type="hidden" name="id" value="<?= $car['id'] ?>">
                        <button type="submit" class="btn btn-primary btn-block mt-2">Atualizar</button>
                    <?php } else { ?>
                        <p>Nenhum carro para editar.</p>
                    <?php } ?>
                </form>
            </div>
        </div>

      </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>