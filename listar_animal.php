<?php
require_once "conexao.php";
$conexao = novaConexao();

$resultado = array();
$sql = 'select * from usuarios';
$stmt = $conexao->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .card-lista{
            padding: 30px;
            width: 100%;
            margin: 0 auto;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="card-lista">
                <div class="card">
                    <div class="card-header font-weight bold">
                        Lista de Animais
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($resultado as $usuarios){
                            ?>
                        <div class="card mb-3 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Identificação
                                    <?= $usuarios['usu_id']?>
                                </h5>
                                <p>
                                    Login : <?= $usuarios['usu_login']?>
                                </p>
                                    <p>
                                        Senha: <?= $usuarios['usu_senha']?>
                                    </p>
                            </div>
                        </div>
                        <?php }?>
                        <div class="row mt-5">
                            <div class="col-6">
                                <a href="index.php"> Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
