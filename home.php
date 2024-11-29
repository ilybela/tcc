<?php
//*inicia a sessão*//
session_start();
//*armazena na variavel nome, o usuario logado*//
$nome =  $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patinhas adotáveis</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .cor_barra{
            background-color: #27a8c4;
        height: 90px;
        margin: 0 px;
        }
        .navbar-band{
    
    margin-bottom: 5px;
    color: #FBAE75;
    text-decoration: bold;
    text-size-adjust: 20px;
}

.h1{
    text-align: center;
    color: #27a8c4;
    margin-top: 20px;
    padding: 20px;
}

 </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark cor_barra">
    <a href="home.php" class="navbar-band">Patinhas adotáveis</a>
    <button class="navbar-toggler" data-toggle="navbar-target">
        <span class="navbar-toggler-icon">
    </button>

    <div class="collapse navbar-collapse" id="nav-target">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle"
                data-toggle="dropdown">Animais</a>
                <div class="dropdown-menu">
                    <a href="cad_animal.php" class="dropdown-item">Cadastrar</a>
                    <a href="listar_animal.php" class="dropdown-item">Listar</a>
    </div>
    </li>

    <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle"
                data-toggle="dropdown">Usuários</a>
                <div class="dropdown-menu">
                    <a href="cad_usuario.php" class="dropdown-item">Cadastrar</a>
    </div>
   </li>

    <li class="list-inline-item">
        <a class="nav-link" href="logoff.php"> Sair </a>
    </li>
    </ul>
    </nav>

    <h1> Bem-vindo ao Sistema <?= $nome ?> </h1>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
