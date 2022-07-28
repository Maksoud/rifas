<?php
    include("config/global.php");
    include("config/home.php");

    $acaoCompra = $_SERVER['QUERY_STRING'];

    if ($acaoCompra == 'index' || $acaoCompra == '/' || $acaoCompra == 'index.php') {

        header("Location: sorteio");

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="libs/css/estilo.css">
    <title>Erica Premiações</title>
</head>
<body>
    <div id="__next">
        <?php
        include("libs/includes/header.php");
        if ($acaoCompra == 'aguardando-aprovacao') {
            echo '<div class="alert alert-success erro alert-dismissible fade show" role="alert">
                <strong>Comprovante enviado com sucesso. Aguarde até 1h para confirmação do pagamento.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';	
        }
        ?>
        <div class="container app-main corpo">
            <div class="row">
                <div class="col-12">
                  <div class="app-title">
                     <h1>🏆 Últimos prêmios</h1>
                  </div>
                </div>
                <?php 
                foreach ($importaSorteios as $value) {
                    $value['descricao'] = explode("//", $value['descricao']);
                    echo '
                    <div class="col-12 mb-2">
                        <a href="sorteio?'.$value['id'].'">
                            <div class="SorteioTpl_sorteioTpl__2s2Wu">
                                <div class="SorteioTpl_imagemContainer__2-pl4">
                                    <img alt="'.$value['titulo'].'" src="https://cf.shopee.com.br/file/59aa65c1434aa5cb4267394d3e007265"/>
                                </div>
                                <div class="SorteioTpl_info__t1BZr">
                                    <h1 class="SorteioTpl_title__3RLtu">'.$value['titulo'].'</h1>
                                    <p class="SorteioTpl_descricao__1b7iL" style="margin-bottom:1px">'.$value['descricao'][0].'</p>
                                    <span class="badge bg-success blink bg-opacity-75 font-xsss">Garantir AGORA !</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    ';
                }
                ?>
               <div class="app-ganhadores mb-2 ">
                    <!-- <div class="col-12">
                        <div class="app-title">
                            <h1>🥳 Vencedores</h1>
                        </div>
                    </div> -->

                    <?php 
                    foreach ($importaGanhadores as $value) {
                        echo '
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                <div class="ganhadorItem_ganhadorContainer__1Sbxm mb-2">
                                    <div class="ganhadorItem_ganhadorFoto__324kH">
                                        <div>
                                            <img alt="'.$value['nome'].' ganhador do prêmio '.$value['premio'].'" src="libs/img/no-image.jpeg"/>
                                        </div>
                                    </div>
                                    <div class="undefined w-100">
                                        <h3 class="ganhadorItem_ganhadorNome__2j_J-">'.$value['nome'].'</h3>
                                        <p class="ganhadorItem_ganhadorDescricao__Z4kO2">
                                            <b>'.$value['premio'].'</b> cota '.$value['cota'].'
                                        </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    ?>
               </div>
               <section class="content">                    
                    <div class="accordion">
                        <label class="accordion__item">
                        <input type="checkbox" name="accordion">
                        <div class="accordion__title">Como acessar as compras</div>
                        <div class="accordion__content">Existem duas formas de você conseguir acessar suas compras, a primeira é logando no site, abrindo o menu do site e clicando em "Entrar" e a segunda forma é visitando o sorteio e clicando em "Compras" logo a baixo do nome "Cotas".</div>
                        </label>
                        <label class="accordion__item">
                        <input type="checkbox" name="accordion">
                        <div class="accordion__title">Como enviar o comprovante</div>
                        <div class="accordion__content">Logo após você concluir o pagamento em seu banco, você pode clicar no botão ENVIAR COMPROVANTE, e lá você será redirecionado para o whatsapp do nosso suporte.</div>
                        </label>
                        <!-- <label class="accordion__item">
                        <input type="checkbox" name="accordion">
                        <div class="accordion__title">Esqueci a senha, e agora?</div>
                        <div class="accordion__content">Você consegue recuperar sua senha indo no menu do site, depois em Entrar e logo a baixo tem Esqueci minha senha.</div>
                        </label> -->
                    </div>
                </section>
                <?php include("libs/includes/footer.php"); ?>
            </div>
         </div>
    </div>
</body>
</html>