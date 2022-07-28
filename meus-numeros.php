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
                            <h1>🛒 Meus números</h1>
                        </div>
                    </div>
                </div><br>
                <table class="table table-dark text-center table-responsive">
                    <thead>
                        <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Sorteio</th>
                        <th scope="col">Cotas</th>
                        <th scope="col">Status</th>
                        <th scope="col">Pagamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($importaCotas as $value){
                                $cotas = explode(",", $value['cotas']);
                                foreach($importaSorteios as $sorteios){
                                    if($value['idSorteio'] == $sorteios['id'] && $value['idComprador'] == $id){
                                        if($sorteios['status'] == 1){
                                            $sorteios['status'] = "Em andamento";
                                        }else if($sorteios['status'] == 2){
                                            $sorteios['status'] = "Concluído";
                                        }
                                        if($value['status'] == 0){
                                            $value['status'] = "Pendente";
                                        }else if($value['status'] == 1){
                                            $value['status'] = "Aprovado";
                                        }else if($value['status'] == 2){
                                            $value['status'] = "Expirado";
                                        }
                                        echo '
                                            <tr>
                                                <th scope="row">'.$value['id'].'</th>
                                                <td>'.$sorteios['titulo'].'</td>
                                                <td>'.$value['cotas'].'</td>
                                                <td>'.$sorteios['status'].'</td>
                                                <td>'.$value['status'].'</td>
                                            </tr>
                                        ';
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php include("libs/includes/footer.php"); ?>
    </div>
</body>
</html>