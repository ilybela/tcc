<?php
require_once "conexao.php";
$conexao = novaConexao();

//busca chamados cadastrados 
$resultado = array(); //cria vetor resultado
$sql = 'select * from cad_animal'; //cria o comando sql
$stmt = $conexao->prepare($sql);
$stmt->execute(); //executa o sql (consulta na tabela)
//armazena dados da consulta do produto no vetor resultado
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Byteon</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .card-lista {
            padding: 30px 0 0 0;
            width: 100%;
            margin: 0 auto;
        }

        .tamanho_img {
            width: 300px;
            height: 200px;
        }

        #btnBusca {
            border: none;
            float: left;
            height: 32px;
            border-radius: 0 7px 7px 0;
            width: 70px;
            font-weight: bold;
            background: #5F9EA0;
        }

        .cor_barra {
            background-color: #27a8c4;
            height: 90px;
            margin: 0 px;
        }

        .navbar-band {

            margin-bottom: 5px;
            color: #FBAE75;
            text-decoration: bold;
            text-size-adjust: 20px;
        }

        .img {
            height: 300px;
            margin-top: 40px;
            padding: 10px;
            margin-right: 50px;
        }

        .h3 {
            text-align: center;
            color: #27a8c4;
        }

        .container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: .5px 10px 15px rgba(0, 0, 0, .2);
            /*sombreado*/
            padding: 25px;
            margin-top: 20px;
            margin-bottom: 20px;
            top: 0px;
            width: 88%;
            padding: 18px 6% 60px 6%;
            background: #fcfcfc;
            border: 2px solid rgba(147, 184, 189, 0.8);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark cor_barra">
        <a href="index.php" class="navbar-band">Patinhas adotáveis</a>
        <button class="navbar-toggler" data-toggle="navbar-target">
            <span class="navbar-toggler-icon">
        </button>

        <div class="collapse navbar-collapse" id="nav-target">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Animais</a>
                    <div class="dropdown-menu">
                        <a href="cad_animal.php" class="dropdown-item">Cadastrar</a>
                        <a href="listar_animal.php" class="dropdown-item">Listar</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Usuários</a>
                    <div class="dropdown-menu">
                        <a href="cad_animal.php" class="dropdown-item">Cadastrar</a>
                    </div>
                </li>

                <li class="list-inline-item">
                    <a class="nav-link" href="logoff.php"> Sair </a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="card-lista">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        LISTA DE ANIMAIS
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($resultado as $produto) {
                            ?>
                            <div class="card mb-3 bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Identificação:
                                        <?= $produto['id'] ?>
                                    </h5>
                                    <p>
                                        Nome: <?= $produto['nome'] ?>
                                    </p>
                                    <p>
                                        Caracteristica: <?= $produto['caracteristica'] ?>
                                    </p>
                                    <p>
                                        Idade: <?= $produto['idade'] ?>
                                    </p>
                                    <p>
                                        Raça: R$ <?= $produto['raca'] ?>
                                    </p>
                                    <p>
                                        Categoria: <?= $produto['categoria'] ?>
                                    </p>

                                    <p>
                                        Vacinado: <?= $produto['vacinado'] ?>
                                    </p>

                                    <p>
                                        <img class="tamanho_img" src=<?= $produto['foto'] ?>>
                                    </p>
                                    <button><a href="editar_animal.php?id=<?= $produto['id']; ?>">Editar</a></button>
                                    <button><a href="Excluir_animal.php?id=<?= $produto['id']; ?>">Excluir</a></button>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="col-6">
                            <a href="home.php">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>