<?php

if (count($_POST) > 0)
{

require_once "conexao.php";
$conexao = novaConexao();

try
{

$sql = "INSERT INTO animal
(nome, idade, raca, caracteristica, categoria, vacinado, foto)
VALUES (:n, :i, :r, :c, :ca, :v, :f)";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':n', $_POST['nome']); 
$stmt->bindValue(':i', $_POST['idade']);
$stmt->bindValue(':r', $_POST['raca']);
$stmt->bindValue(':c', $_POST['caracteristica']);
$stmt->bindValue(':ca', $_POST['categoria']);
$stmt->bindValue(':v', $_POST['vacinado']);
$stmt->bindValue(':f', $_POST['foto']);
$stmt->execute();
echo "Registro cadastrado com sucesso";

}

catch(PDOException $e)
{

echo 'Erro ao inserir registro' . $e->getMessage();

}

}

?>

<html>

<header>
<a class="cabecalho" href='cad_cat.php'> Categoria </a>
    <a class="cabecalho" href='cad_pro.php'> Produto </a>
    <a class="cabecalho" href='cad_fun.php'> Funcionário </a>
    <a class="cabecalho" href='cad_for.php'> Fornecedor </a>
    <a class="cabecalho" href='cad_venda.php'> Venda </a>
</header>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
    <title>Cadastro de animais</title>
</head>

<body>
    <form action="#" method="post">
        <h1>Cadastro de animais</h1>
        Nome:
        <input type="text" size="30" placeholder="Digite o nome" required name="nome">
        <br><br>
        Caracteristica:
        <input type="text" size="200" placeholder="Digite a caracteristica" required name="caracteristicas">
        <br><br>
        Idade:
        <input type="text" size="10" placeholder="Digite a idade" required name="idade">
        <br><br>
        Raça:
        <input type="number" size="5" placeholder="Digite a raça" required name="raca">
        <br><br>
        <br><br>
        Características:
        <input type="number" size="5" placeholder="Digite as caracteristicas" required name="caracteristica">
        <br><br>
        Categoria:
        <input type="number" size="5" placeholder="Digite a categoria" required name="categoria">
        <br><br>
        Vacinado:
        <input type="number" size="5" placeholder="Digite se ele é vacinado" required name="vacinado">
        <br><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>