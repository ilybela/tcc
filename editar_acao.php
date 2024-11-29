<?php
    require_once "conexao.php";   
    $conexao = novaConexao();

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
	header('location:editar_animal.php');  
		
?>