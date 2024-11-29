<?php
// se o usuário clicou no botão entrar
if (count($_POST) > 0) {
    session_start();

    // conecta com o BD
    require_once "conexao.php";
    $conexao = novaConexao();

    // consulta a tabela de usuários
    $sql = "SELECT * FROM cad_usuario WHERE email = :email AND senha = :senha";
    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':senha', $_POST['senha']);
    $stmt->execute();

    // armazena o resultado da consulta no vetor resultados
    $resultado_consulta = $stmt->fetch(PDO::FETCH_ASSOC);

    // caso consulta retorne uma linha (usuário encontrado)
    if ($resultado_consulta) {
        // busca o nome do usuário
        $nome = $resultado_consulta['nome'];
        // armazena na sessão
        $_SESSION['nome'] = $nome ;
       // direciona para a página home.php
        header('Location: home.php');
        exit(); // é uma boa prática adicionar exit após header
    } else {
        echo "Dados Incorretos! E-mail ou Senha Inválido";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css?v=1.1">
    <title>Login</title>
    
      
</head>

<body>
     <nav class="navbar navbar-expand-sm navbar-dark cor_barra">
      
        <button class="navbar-toggler" data-toggle="navbar-target">
            <span class="navbar-toggler-icon">
        </button>

        <div class="collapse navbar-collapse" id="nav-target">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Animais</a>
                    <div class="dropdown-menu">
                        <a href="cad_animais.php" class="dropdown-item">Cadastrar</a>
                        <a href="listar_animal.php" class="dropdown-item">Listar</a>

        </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Usuários</a>
            <div class="dropdown-menu">
                <a href="Cad_usuario.php" class="dropdown-item">Cadastrar</a>
            </div>
        </li>

        <li class="list-inline-item">
            <a class="nav-link" href="logoff.php"> Sair </a>
        </li>
        </ul>
    </nav>
    <br><br><br>

    <div class="container col-11 col-md-9" id="form_container">
        <div class="row align-itens-center gx5">
            <!-- gx é a distância entre uma coluna e outra -->

            <div class="col-md-6">
                <h2>Acesso Administrador</h2>
                <form action="#" method="post">

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu E-mail">
                        <label for="email" class="form-label">Digite o seu E-mail</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a sua senha">
                        <label for="senha" class="form-label">Digite a sua senha</label>
                    </div>
                    <br>
                    <a href="Cad_usuario.php" class="btn btn-info">voltar</a>
                    <input type="submit" class="btn btn-primary" value="Entrar">
                </form>
            </div>

            <div class="col-md-6">
                <div class="col-12">
                    <img src="img/logo1.png.png" class="img-fluid logo">
                    <br>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
