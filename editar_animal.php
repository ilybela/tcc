<?php
// CARREGA O PRODUTO NO FORMULÁRIO
require_once "conexao.php";
$conexao = novaConexao();

// Busca os dados do ANIMAL
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

$resultado = array();

// Busca os dados do animal 
$sql = "SELECT * FROM cad_animal WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':id', $id); // Corrigido o nome do parâmetro para ':id_animal'
$stmt->execute();

// Caso a consulta retorne uma linha
if ($stmt->rowCount() == 1) {
  // Armazena o resultado da consulta no vetor resultado
  $resultado = $stmt->fetch();
} else {
  // Caso não exista o id do produto, volta para a página de listar
  header('Location:listar_animal.php');
  exit;
}

if (isset($_POST['salvar'])) {
  $sql = "update cad_animal set nome = :n, idade = :i, raca = :r,
    caracteristica = :c, categoria = :ca, vacinado = :v where id = :id";
  $stmt = $conexao->prepare($sql);
  $stmt->bindValue(':n', $_POST['nome']);
  $stmt->bindValue(':i', $_POST['idade']);
  $stmt->bindValue(':r', $_POST['raca']);
  $stmt->bindValue(':c', $_POST['caracteristica']);
  $stmt->bindValue(':ca', $_POST['categoria']);
  $stmt->bindValue(':v', $_POST['vacinado']);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  header('location:listar_animal.php');
}

?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>Editar animal</title>


</head>
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
    width: 80px;
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

  .h2 {
    text-align: center;
    color: #27a8c4;
  }

  .col-4 {
    background-color: #fff;
    border-radius: 20px;
    box-shadow: .5px 10px 15px rgba(0, 0, 0, .2);
    /*sombreado*/
    margin: auto;
    padding: 150px;
    top: 0px;
    width: 150%;
    padding: 18px 6% 60px 6%;
    margin: 160px;
    background: #fcfcfc;
    border: 2px solid rgba(147, 184, 189, 0.8);
    justify-content: center;

  }

  .form-label {
    color: black;
    font-weight: bold;
  }

  .container {
    justify-content: center;
    margin: auto;
    margin-top: 50px;
    margin-bottom: 50px;
  }
</style>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark cor_barra">
    <a href="index.php" class="navbar-brand">Patinhas adotáveis</a>
    <button class="navbar-toggler" data-toggle="navbar-target">
      <span class="navbar-toggler-icon"></span>
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
            <a href="cad_usuario.php" class="dropdown-item">Cadastrar</a>
          </div>
        </li>

        <li class="list-inline-item">
          <a class="nav-link" href="logoff.php"> Sair </a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container col-4">
    <h2>Altere os dados do animal</h2>
    <form method="post">

      <!-- Passar para a página editar_acao o id do produto -->
      <input type="hidden" name="id" value="<?= $resultado['id']; ?>" />

      <div class=" mb-4 mt-4">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control form-control-sm" name="nome" value="<?= $resultado['nome']; ?>" />
      </div>

      <div class="mb-4 mt-4">
        <label for="caracteristica" class="form-label">Característica:</label>
        <input type="text" class="form-control form-control-sm" name="caracteristica"
          value="<?= $resultado['caracteristica']; ?>" />
      </div>

      <div class="mb-4 mt-4">
        <label for="idade" class="form-label">Idade:</label>
        <input type="text" class="form-control form-control-sm" id="idade" name="idade"
          value="<?= $resultado['idade']; ?>" />
      </div>

      <div class="mb-4 mt-4">
        <label for="raca" class="form-label">Raça:</label>
        <input type="text" class="form-control form-control-sm" id="raca" name="raca"
          value="<?= $resultado['raca']; ?>" />
      </div>

      <div class="mb-4 mt-4">
        <label for="caracteristicas" class="form-label">Características:</label>
        <textarea class="form-control form-control-sm" name="caracteristicas"
          rows="10"><?= $resultado['caracteristica']; ?></textarea>
      </div>

      <div class="mb-4 mt-4">
        <label for="categoria" class="form-label">categoria:</label>
        <input type="text" class="form-control form-control-sm" id="categoria" name="categoria"
          value="<?= $resultado['categoria']; ?>" />
      </div>

      <div class="mb-4 mt-4">
        <label for="vacinado" class="form-label">Vacinado:</label>
        <input type="text" class="form-control form-control-sm" id="vacinado" name="vacinado"
          value="<?= $resultado['vacinado']; ?>" />
      </div>

      <div class="row mt-5">
        <div class="col-6">
          <a href="listar_animal.php" class="btn ">Voltar</a>
        </div>

        <div class="col-6">
          <button class="btn btn-info btn-block" type="submit" name="salvar">Salvar</button>
        </div>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>

</body>

</html>