<?php
    if ($_SERVER['QUERY_STRING'] != '6' || $_SERVER['QUERY_STRING'] != 6) {

        header("Location: sorteio?6");

    }

    include("config/global.php");
    include("config/cotas.php");
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
        <?php 
        include("libs/includes/header.php");
        
        if (isset($_POST['envia-comprovante'])) {
            $sql = "INSERT INTO cotas (idComprador, idSorteio, valor, metodo_pagamento, qtdCotas, cotas, status, data) VALUES ('".$id."', '".$idSorteio."', '".$_POST['valor']."', '0', '".$_POST['qtdCotas']."', '".$_POST['cotas']."', '0', '".$data."');";
            $q = $conexao->prepare($sql);		
            $q->execute();
            header("Location: https://api.whatsapp.com/send?phone=5582981752231&text=Oi%2C%20acabei%20de%20efetuar%20a%20compra%20da%20minha%20cota%20no%20Sorteio%20do%20iPhone%2011%2C%20vou%20enviar%20o%20comprovante.");
        }

        foreach($importaSorteios as $value) {
            $descricao = explode("//", $value['descricao']);
            echo '
            <div class="container app-main">
                <div class="sorteio-header mb-2">
                    <div class="SorteioTpl_sorteioTpl__2s2Wu SorteioTpl_destaque__3vnWR main-sorteio">
                        <div class="SorteioTpl_imagemContainer__2-pl4 col-auto pag-sorteio">
                            <div id="carouselSorteio6282b982deeab" class="carousel slide carousel-dark carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" style="width:100%;height:290px">
                                        <div>
                                            <img alt="'.$value['titulo'].'" src="https://cf.shopee.com.br/file/59aa65c1434aa5cb4267394d3e007265"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="SorteioTpl_info__t1BZr">
                            <h1 class="SorteioTpl_title__3RLtu">'.$value['titulo'].'</h1>
                            <p class="SorteioTpl_descricao__1b7iL" style="margin-bottom:1px">'.$descricao[0].'</p>
                        </div>
                    </div>
                </div>
                <div class="sorteio-preco porApenas font-xs d-flex align-items-center justify-content-center mb-2">
                    <div class="item d-flex align-items-center">
                        <div class="me-1 text-uppercase">Por apenas</div>
                        <div class="tag btn btn-sm bg-cor-primaria text-cor-primaria-link box-shadow-08 preco-sorteio">
                            R$ 0,80
                        </div>
                    </div>
                </div>
                <div class="app-card card font-xs mb-2 sorteio_sorteioDesc__TBYaL">
                    <div class="card-body sorteio_sorteioDescBody__3n4ko">
                        <p>';
                        for($e = 0; $e < count($descricao); $e++){
                            echo $descricao[$e]."<br>";
                        }
                        echo '
                        </p>
                    </div>
                </div>
                <div class="sorteio-share d-flex mb-2 justify-content-between align-items-center">
                    <div class="item d-flex align-items-center font-xs"></div>
                    <!--
                    <div class="item d-flex align-items-center">
                        <div alt="Compartilhe no Facebook" class="pagina_sorteio_social"><i class="fab fa-facebook"></i></div>
                        <div alt="Compartilhe no Telegram" class="pagina_sorteio_social"><i class="fab fa-telegram"></i></div>
                        <div alt="Compartilhe no Twitter" class="pagina_sorteio_social"><i class="fab fa-twitter"></i></div>
                        <div alt="Compartilhe no WhatsApp" class="pagina_sorteio_social"><i class="fab fa-whatsapp"></i></i></div>
                    </div>
                    -->
                </div>
                <div class="app-title mb-2">
                    <h1>🔢 Cotas</h1>
                </div>
                <div class="sorteio-buscas">
                    <div class="row row-gutter-sm">
                        <div class="col">
                            <div class="mb-2">
                                <p class="text-muted font-xs mb-3">
                                    Quantidade restante disponível &nbsp;&nbsp;<span class="badge bg-success blink bg-opacity-75 font-xsss">Garantir AGORA!</span>
                                </p>
                                <div class="progress">
                                    <div class="progress-bar bg-danger progress-bar-striped fw-bold progress-bar-animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-vendas-express mb-2">
                    <div class="app-card card mb-2">
                        <div class="card-body text-center">
                            <p class="text-muted font-lg mb-3">Selecione a quantidade de números aqui:</p>
                            <div class="numeros-select d-flex align-items-center justify-content-center flex-column">
                                <div class="vendasExpressNumsSelect">
                                    <div class="item p-2 me-2 mb-2 flex-column d1">
                                        <h3 class="mb-1 n1"><small class="text-dark font-xsss"></small>02</h3>
                                        <p class="text-muted font-xss text-uppercase">Números</p>
                                    </div>
                                    <div class="item p-2 me-2 mb-2 flex-column d2">
                                        <h3 class="mb-1 n2"><small class="text-dark font-xsss"></small>05</h3>
                                        <p class="text-muted font-xss text-uppercase">Números</p>
                                    </div>
                                    <div class="item p-2 me-2 mb-2  flex-column d3">
                                        <h3 class="mb-1 n3"><small class="text-dark font-xsss"></small>10</h3>
                                        <p class="text-muted font-xss text-uppercase">Números</p>
                                    </div>
                                    <div class="item p-2 me-2 mb-2 flex-column d4">
                                        <h3 class="mb-1 n4"><small class="text-dark font-xsss"></small>20</h3>
                                        <p class="text-muted font-xss text-uppercase">Números</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-wide btn-success participar" data-toggle="modal">ESCOLHA UMA OPÇÃO ACIMA!</button>
                    </div>
                </div>';
        }
        ?>
    </div>
    <?php include("libs/includes/footer.php"); ?>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="numeros">
                        <h3>Esses são seus números</h3>
                        <h6>Anote em um lugar seguro e boa sorte!</h6>
                        <div class="num"></div>
                        <button class="btn btn-success efetuar-pagamento">CLIQUE AQUI PARA PAGAR!</button>
                    </div>
                    <div class="qrcode">
                        <p id="contador"></p>
                        <img class="w100" src="libs/img/pagamentos/1.jpg">
                        <span class="destaque-codpag">Clique no botão abaixo para copiar o código Pix e cole código que já foi copiado no seu banco, na opção PIX COPIA E COLA</span>
                        <div class="pagamento">
                            <input type="text" id="myInput" class="codPag" value="00020101021126580014br.gov.bcb.pix01368716a83c-8eb9-43f4-ba78-427c8d11340c5204000053039865802BR5913Gh Moda Praia6009SAO PAULO622905251G8W6P3SEJ69TA8ZZ08K6MQFZ6304E958">
                            <div class="tooltip">
                                <button onclick="myFunction()" class="btn btn-dark">
                                    <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                                    Copiar o código PIX <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </div>
                        <span class="d-flex mb-2 mt-5 destaque-codpag">O seus números só serão reservados após clicar no botão abaixo e enviar o comprovante pra gente!</span>
                        <form action="" class="edados" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="valor" class="valorInput" value="1.6">
                            <input type="hidden" name="qtdCotas" class="qtdCotas" value="2">
                            <input type="hidden" name="cotas" class="cotas" value="0">
                            <input type="hidden" name="idPagamento" class="idPagamento" value="0">
                            <button name="envia-comprovante" type="submit" class="btn btn-success enviar-comprovante">ENVIAR COMPROVANTE NO <i class="fab fa-whatsapp"></i> WHATSAPP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function myFunction() {

            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);

        }// myFunction

        var deadline = (new Date().getTime()) + (36000*50)

        var x = setInterval(function() {

            var now     = new Date().getTime()
            var t       = deadline - now
            var days    = Math.floor(t / (1000 * 60 * 60 * 24))
            var hours   = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60))
            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60))
            var seconds = Math.floor((t % (1000 * 60)) / 1000)

            if (document.getElementById("contador") != null) {
                document.getElementById("contador").innerHTML = "Pagar em até " + hours + "h " + minutes + "m " + seconds + "s "
            }// if (document.getElementById("contador") != null)

            if (t < 0) {
                clearInterval(x)
                document.getElementById("contador").innerHTML = "EXPIRED"
                document.querySelector('img').src = ''
            }// if (t < 0)

        }, 1000)

  </script>
</body>
</html>