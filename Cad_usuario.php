<?php

if (count($_POST) > 0)
{

require_once "conexao.php";
$conexao = novaConexao();

try
{

$sql = "INSERT INTO cad_usuario
(nome, email, senha)
VALUES (:n, :e, :se)";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':n', $_POST['nome']); 
$stmt->bindValue(':e', $_POST['email']);
$stmt->bindValue(':se', $_POST['senha']);

$stmt->execute();
echo "Registro cadastrado com sucesso";

}

catch(PDOException $e)
{

echo 'Erro ao inserir registro' . $e->getMessage();

}

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css?v=1.1">
    <title>cadastro</title>
</head>

<body>


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
.img{
    height: 300px;
    margin-top: 40px;
    padding: 10px;
  margin-right: 50px;
}
.h3{
    text-align: center;
    color: #27a8c4;
}
.container{
background-color: #fff;
            border-radius: 20px;
            box-shadow: .5px 10px 15px rgba(0, 0, 0, .2);
            /*sombreado*/
            margin: 25px auto;
            padding: 25px;
            position: absolute;
            top: 0px;
            width: 88%;
            padding: 18px 6% 60px 6%;
            margin: 160px ;
            background: #fcfcfc;
            border: 2px solid rgba(147, 184, 189, 0.8);
            justify-items: center;
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


    <div class="container col-11 col-md-9" id="form_container">
        <div class="row align-itens-center gx5">
            <div class="col-md-6">
                <h2>Realize o seu cadastro</h2>
                <form action="#" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome...">
                        <label for="nome" class="form-label">
                            Digite o seu nome
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Digite seu email...">
                        <label for="email" class="form-label">
                            Digite o seu e-mail
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="senha" id="senha" class="form-control"
                            placeholder="Digite sua senha...">
                        <label for="senha" class="form-label">
                            Digite a sua senha
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="confirmasenha" id="confirmasenha" class="form-control"
                            placeholder="Digite sua senha...">
                        <label for="senha" class="form-label">
                            Confirme a sua senha
                        </label>
                    </div>
                  
                    <input type="submit" class="btn btn-primary" value="Salvar">


                  
                </form>
            </div>
<br><br>
            <div class="col-md-6">
                <div class="col-12">
                <img src="img/logo (2).png" class="img-fluid">
                </div>
                <div class="col-12" id="link-container">
                
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

