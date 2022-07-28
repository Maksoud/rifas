<?php
    ob_start();
    session_start();
    include("config/conexao.php");
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
    <?php
        if(isset($_GET['acao'])){
            
            if(!isset($_POST['logar'])){
            
                $acao = $_GET['acao'];
                // if($acao=='negado'){
                //     echo '<div class="alert alert-success erro">
                //     <strong>Sessão finalizada por inatividade.</strong>
                // </div>';	
                // }
            }
        }

        if(isset($_POST['logar'])){

            // RECUPERAR DADOS FORM
            $email   = trim(strip_tags($_POST['email']));
            $senha	 = trim(strip_tags(md5($_POST['senha'])));
            
            // SELECIONAR BANCO DE DADOS
            
            $select = "SELECT * from usuarios WHERE BINARY email=:email AND BINARY senha=:senha";
            
            try{
                $result = $conexao->prepare($select);
                $result->bindParam(':email', $email, PDO::PARAM_STR);
                $result->bindParam(':senha', $senha, PDO::PARAM_STR);
                $result->execute();
                $contar = $result->rowCount();
                if($contar>0){

                    $email   = $_POST['email'];
                    $senha	 = $_POST['senha'];
                    $_SESSION['megaUser'] = $email;
                    $_SESSION['megaPass'] = $senha;
                    
                    echo '<div class="alert alert-success succces">
                        <strong>Logado com Sucesso!</strong>
                    </div>';
                    
                    header("Refresh: 0, sorteio?6");

                }else{

                    echo '<div class="alert alert-danger erro">
                            <strong>Erro ao logar!</strong> Os dados estão incorretos.
                        </div>';

                }
                
            }catch(PDOException $e){
                echo $e;
            }
        }// se clicar no botão entrar no sistema
    ?>
    <div id="__next">
        <?php include("libs/includes/header.php"); ?>
        <div class="container app-main app-form">
            <form action="#" action="#" method="post" enctype="multipart/form-data">
                <br>
            <h2>Você deve fazer o login ou <a href="cadastro.php">Criar uma conta </a> para poder concorrer.</h2>
                <br>
            <div class="perfil app-card card mb-2">
                <div class="card-body">
                    <div class="mb-2"><label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" required="">
                </div>
                <div class="mb-2">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" placeholder="*********" required>
                </div>
                <button type="submit" name="logar" class="btn btn-dark">Acessar</button>
                <button class="btn btn-warning"><a href="cadastro.php" style="color:#000 !important">Criar conta</a></button>
            </div>
        </form>
    </div>
    <?php include("libs/includes/footer.php"); ?>
</body>
</html>