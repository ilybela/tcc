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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Fale Conosco</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="icon" href="img/logo (2).png">
</head>
<body>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

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
        }
    </style>
</head>
<body>

    <h1>FALE CONOSCO</h1>

    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="mensagem">Mensagem:</label>
        <textarea id="mensagem" name="mensagem" rows="6" required></textarea>

        <div class="btn-container">
            <input type="reset" value="Limpar">
            <input type="submit" value="Enviar">
        </div>
    </form>


    <?php if ($msg): ?>
        <p><?php echo $msg; ?></p>
    <?php endif; ?>
</body>
</html>
