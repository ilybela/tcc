<?php

    require_once "conexao.php";   
	$conexao = novaConexao();

    //busca o id do produto
	if (isset($_GET['id'])) {
        $id = $_GET['id'];
      }

    $sql = "DELETE FROM cad_animal WHERE id = :id";
    $stmt = $conexao->prepare($sql); 
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    header("Location: listar_animal.php");

?>