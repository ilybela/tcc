<?php

if (count($_POST) > 0) {

    require_once "conexao.php";
    $conexao = novaConexao();

    try {
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        // Código de upload de imagem
        date_default_timezone_set("Brazil/East");
        $ext = strtolower(substr($_FILES['file']['name'], -4)); // Obtém a extensão do arquivo
        $name = strtolower(substr($_FILES['file']['name'], 0, -4)); // Obtém o nome do arquivo sem a extensão
        $new_name = $name . '_' . date("YmdHis") . $ext; // Cria um novo nome único para o arquivo
        $dir = 'img1/'; // Diretório para salvar as imagens

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true); // Cria o diretório se não existir
        }

        move_uploaded_file($_FILES['file']['tmp_name'], $dir . $new_name); // Move o arquivo para o diretório

        $nome_arquivo = $dir . $new_name;

        $sql = "INSERT INTO cad_animal
(nome, idade, raca, caracteristica, categoria, vacinado, foto)
VALUES (:n, :i, :r, :c, :ca, :v, :f)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':n', $_POST['nome']);
        $stmt->bindValue(':i', $_POST['idade']);
        $stmt->bindValue(':r', $_POST['raca']);
        $stmt->bindValue(':c', $_POST['caracteristica']);
        $stmt->bindValue(':ca', $_POST['categoria']);
        $stmt->bindValue(':v', $_POST['vacinado']);

        $stmt->bindValue(':f', $nome_arquivo);
        $stmt->execute();
        echo "Registro cadastrado com sucesso";

    } catch (PDOException $e) {

        echo 'Erro ao inserir registro' . $e->getMessage();

    }

}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patinhas adotáveis</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        .cor_barra {
            background-color: #27a8c4;
            height: 70px;
        }

        body {
            text-align: center;
            padding: 1px;
            border: 1px solid #ccc;
            border-radius: 35px;
        }

        body {
            background-color: #f8f8f8;

        }

        #form_container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: .5px 10px 15px rgba(0, 0, 0, .2);
            /*sombreado*/
            margin: 25px auto;
            padding: 25px;
        }

        .fome{
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
            margin: 90px ;
            background: #fcfcfc;
            border: 2px solid rgba(147, 184, 189, 0.8);
        }
        
    </style>
</head>


<body>

    <nav class="navbar navbar-expand-sm navbar-dark cor_barra">
        <a href="index.php" class="navbar-band">Patinhas adotáveis</a>
        <button class="navbar-toggler" data-toggle="navbar-target">
            <link rel="stylesheet" href="css.css">
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
                        <a href="cad_usuario.php" class="dropdown-item">Cadastrar</a>
                    </div>
                </li>

                <li class="list-inline-item">
                    <a class="nav-link" href="logoff.php"> Sair </a>
                </li>
            </ul>
        </div>
    </nav>

    <form action="#" method="post" enctype="multipart/form-data" class="fome" >
        <br><br>
        <h1>Cadastro de animais</h1>
        <br>
        Nome:
        <input type="text" size="20" placeholder="Digite o nome" required name="nome" >
        <br><br>
        Caracteristica:
        <input type="text" size="20" placeholder="Digite a caracteristica" required name="caracteristica">
        <br><br>
        Idade:
        <input type="text" size="20" placeholder="Digite a idade" required name="idade">
        <br><br>
        Raça:
        <input type="text" size="20" placeholder="Digite a raça" required name="raca">
        <br><br>

        Categoria:
        <input type="text" size="20" placeholder="Digite a categoria" required name="categoria">
        <br><br>
        Vacinado:
        <input type="text" size="20" placeholder="Digite se ele é vacinado" required name="vacinado">
        <br><br>
        Imagem:
        <input type="file" name="file" required>
        <br><br>

        <input type="submit" class="btn btn-primary" value="Salvar">
    </form>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>