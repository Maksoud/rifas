<?php
    include("config/global.php");
    include("config/home.php");
    $acaoCompra = $_SERVER['QUERY_STRING'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <link rel="stylesheet" href="libs/css/app.style.css"/>
    <link rel="stylesheet" href="libs/css/style1.css"/>
    <link rel="stylesheet" href="libs/css/style2.css"/>
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="libs/css/estilo.css">
    <title>Erica Premiações</title>
</head>
<body>
    <div id="__next">
        <?php include("libs/includes/header.php"); ?>
        <div class="container app-main">
            <div class="mb-3">
                <div class="row justify-content-between w-100 align-items-center">
                    <div class="col">
                        <div class="app-title">
                            <h1>⚙️ Configurações</h1>
                        </div>
                    </div>
                </div><br>
                <?php
                    echo '
                        <label> Nome </label><strong>: '.$nome.'</strong> <br>
                        <label> Email </label><strong>: '.$email.'</strong> <br>
                        <label> Telefone </label><strong>: '.$telefone.'</strong> <br>
                        <label> Cep </label><strong>: '.$cep.'</strong> <br>
                        <label> Cidade </label><strong>: '.$cidade.'</strong> <br>
                        <label> Complemento </label><strong>: '.$complemento.'</strong> <br>
                        <label> Usuário desde </label><strong>: '.$data.'</strong>
                    ';
                ?>
            </div>
        <?php include("libs/includes/footer.php"); ?>
    </div>
</body>
</html>