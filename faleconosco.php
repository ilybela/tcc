<?php
// EMAIL NÃO FUNCIONA EM UM SERVIDOR LOCAL
// somente qd site estiver hospedado

$msg = ""; // Variável para mensagem de retorno

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars(trim($_POST["nome"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $mensagem = htmlspecialchars(trim($_POST["mensagem"]));

    $body = "===========================================" . "\n";
    $body .= "FALE CONOSCO " . "\n";
    $body .= "===================================" . "\n\n";
    $body .= "Nome: " . $nome . "\n";
    $body .= "E-mail: " . $email . "\n";
    $body .= "Mensagem: " . $mensagem . "\n";
    $body .= "===================================" . "\n";

    $cabecalho = "From: " . $email;
    $remetente = "andresa.csf@gmail.com";
    $assunto = "Contato pelo Site";

    $enviaremail = mail($remetente, $assunto, $body, $cabecalho);
    if ($enviaremail) {
        $msg = "E-MAIL ENVIADO COM SUCESSO!";
    } else {
        $msg = "ERRO AO ENVIAR E-MAIL!";
    }
}
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patinhas Adotáveis</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css?v=1.2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <style>
        h1 {
            color: black;
            font-size: 2.5em;
            margin-bottom: 20px;
            text-align: center;
            font-family: serif;
        }

        form {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 9px;
            font-size: 20px;
            font-weight: bold;
            color: black;
            font-family: serif;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 48%;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }

        input[type="reset"] {
            background-color: #f44336;
            color: white;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            opacity: 0.9;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            background-color: ;
        }

        form {
            justify-content: center;
            justify-items: center;
            margin: auto;
            padding: 20px;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        footer {
            position: absolute;
            width: 100%;
        }

        .btn-info {
            background-color: #27a8c4;
            border: #27a8c4;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>

    <header>
        <div class="cabecalho">
            <nav>
                <div class="container">
                    <h1 class="navbar-title">Patinhas Adotáveis</h1>
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand justify-content-left" href="#">
                            <img class="logo" src="./img/logo (2).png" alt="Logo">
                        </a>
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="Index.html">Home</a>
                            </li>
                            <li class="nav-item dropdown"> <!--adiciona classe dropdown -->
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    Adotar
                                </a> <!--transforma serviços em menu-->
                                <div class="dropdown-menu"> <!--coloca as opções de serviço dentro do menu -->
                                    <a href="cachorro.html.html" class="dropdown-item"> Cachorro </a>
                                    <a href="gato.html" class="dropdown-item"> Gato </a>
                                </div>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="blog.html">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="parceria.html">Parceria</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="doacao.html">Doação</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sobre.html">Sobre</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <br><br><br>
        <h4>FALE CONOSCO</h4>

        <form action="" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" rows="6" required></textarea>

            <div style="display: flex; gap: 10px;">
        <input type="submit" value="Enviar" 
               style="background-color: #27a8c4; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
        <input type="reset" value="Limpar" 
               style="background-color: #27a8c4; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
    </div>

        </form>

        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <p class="rop"> Endereço: Rua Primavera, Bairro Miguel Vieira, Num 221, Guaratinguetá</p>

                        <p class="rop"> Telefone: (12)99767-2356</p>

                        <p class="rop"> E-mail: patinhasadotaveis@gmail.com</p>
                        <a href="faleconosco.php">
                            <p class="rop">Fale Conosco</p>
                        </a>
                    </div>

                    <div class="col-6 col-md-6 text-right">
                        <a href="https://www.facebook.com/americanas" target="_blank" class="btn btn-outline-dark ml-2">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://web.whatsapp.com/send?phone=5512997112233" class="btn btn-outline-dark ml-2">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.instagram.com/americanas" target="_blank"
                            class="btn btn-outline-dark ml-2">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
    </header>
    <br>
    <br><br>
    <br>

</body>

</html>