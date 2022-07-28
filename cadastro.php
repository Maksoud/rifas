<?php
    include("config/conexao.php");

    if(isset($_POST['cadastrar'])){

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $cep = $_POST['cep'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $data = date('Y-m-d H:i');

        // Conexão com banco de dados para verificação de email existente
        $verificaEmail = $conexao->prepare("SELECT * from usuarios WHERE email='".$email."'");
        $verificaEmail->execute();
        $contarEmail = $verificaEmail->rowCount();
        // Validação de dados

        if($contarEmail == 1){
            echo '<script language="javascript" type="text/javascript">window.location.href="?3";</script>';
        } else {
            $sql = "INSERT INTO usuarios (nome, email, telefone, senha, cpf, cep, numero, bairro, data, status, nivel) VALUES ('".$nome."', '".$email."', '".$telefone."', '".$senha."', '".$cpf."', '".$cep."', '".$numero."', '".$bairro."', '".$data."', '1', '0');";
        }
        $q = $conexao->prepare($sql);		
        $q->execute();

        if($q) {
            header("Location: login.php?criado");
        } else {
            header("Location: cadastro.php");
        }

    }
    
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
    <link rel="stylesheet" href="libs/css/estilo.css">
    <title>Erica Premiações</title>
</head>
<body>
    <div id="__next">
        <?php include("libs/includes/header.php"); ?>
        <script src="libs/js/script.js"></script>
        <div class="container app-main app-form">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="perfil app-card card mb-2">
                <div class="card-body">
                    <div class="mb-2"><label for="nome" class="form-label">Nome completo</label><input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo" required=""></div>
                    <div class="mb-2"><label for="email" class="form-label">E-mail</label><input type="email" name="email" class="form-control" id="email" placeholder="exemplo@exemplo.com "></div>
                    <div class="mb-2"><label for="senha" class="form-label">Senha</label><input class="form-control mb-2" name="senha" id="senha" required="" minlength="5" maxlength="20" type="password"></div>
                    <div class="mb-2"><label for="telefone" class="form-label">Telefone</label><input class="form-control mb-2" name="telefone" id="telefone" required="" value=""></div>
                </div>
            </div>
            <div class="endereco app-card card mb-2 ">
                <div class="card-body">
                    <div class="mb-2"><label for="cpf" class="form-label">CPF</label><input type="text" name="cpf" class="form-control" id="nome" placeholder="CPF" required=""></div>
                    <div class="mb-2"><label for="cep" class="form-label">CEP</label><input name="cep" class="form-control" id="cep" value=""></div>
                    <div class="mb-2"><label for="numero" class="form-label">Número</label><input type="text" name="numero" class="form-control" id="numero"></div>
                    <div class="mb-2"><label for="bairro" class="form-label">Bairro</label><input type="text" name="bairro" class="form-control" id="bairro" required=""></div>
                    <div class="mb-2">
                </div>
            </div>
            <div class="flex">
                <p><input type="checkbox" required name="idade">Eu li e aceito os termos e condições.</p> <br>
                <p><input type="checkbox" required name="idade">Eu afirmo que sou maior de 18 anos.</p> <br>
            </div>
                <button type="submit" class="btn btn-secondary btn-wide" name="cadastrar">Cadastrar</button>
        </form>
    </div>
    <?php include("libs/includes/footer.php"); ?>
</body>
</html>