<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguer de Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <style>
      .card {
            border-radius: 10px;
            border: none;
            transition: all 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
        }

        h1 {
    font-size: 36px;
    font-weight: bold;
    margin-bottom: 30px;
}

.store-name {
    color: #007bff;
}

.welcome-message {
    color: #333;
}
      </style>
</head>
<body class="body-index">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CCProject</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="carros.php">Carros</a>
              <a class="nav-link" href="aluguer.php">Alugueres</a>
            </div>
          </div>
        </div>
      </nav>
      
    <div class="container mt-5">
        <div class="text-center">
          <h1>
              <span class="welcome-message">Seja bem-vindo ao <span class="store-name">CC Alugueres</span></span>
          </h1>
          <div class="row mt-5">
            <div class="col-md-4">
              <div class="card">
                <a href="carros.php">
                  <div class="card-body">
                    <h5 class="card-title">Carros</h5>
                    <p class="card-text">Veja os carros disponíveis para aluguel!</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <a href="aluguer.php">
                  <div class="card-body">
                    <h5 class="card-title">Alugar Carro</h5>
                    <p class="card-text">Clique aqui para alugar se já sabe qual carro deseja!</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <a href="perfil.php">
                  <div class="card-body">
                    <h5 class="card-title">Perfil</h5>
                    <p class="card-text">Verifique aqui seus dados de usuário</p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
