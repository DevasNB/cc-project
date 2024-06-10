<?php
    include 'connection/connection.php';


    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit; 
    }

    if(isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];

        $sql = "SELECT * FROM carros.users WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            echo "Nenhum usuário encontrado com este ID.";
        }

        $stmt->close();
    } else {
        echo "ID do usuário não fornecido";
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
<body class="body-index">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CCProject</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              <a class="nav-link" href="carros.php">Carros</a>
              <a class="nav-link" href="aluguer.php">Alugueres</a>
            </div>
          </div>
        </div>
      </nav>

      <div class="login-container">
      <h1>Perfil do Usuário</h1>
    <?php if(isset($user)) : ?>
        <p>Nome: <?php echo $user['username']; ?></p>
        <p>Passoword: <?php echo $user['password']; ?></p>
        <!-- Adicione outras informações do usuário conforme necessário -->
    <?php endif; ?>
    <a href="queries/users/update_user.php" class="btn btn-warning btn-large">Editar utilizador</a>
      <a href="queries/users/exit_session.php" class="btn btn-danger btn-large">Sair da Sessão</a>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>