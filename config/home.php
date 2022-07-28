<?php
    include("conexao.php");

    // Seleciona os últimos 5 sorteios
    try {

		$importaSorteios = $conexao->prepare("SELECT * from sorteios ORDER BY id DESC LIMIT 5");		
		$importaSorteios->execute();
		$importaSorteios = $importaSorteios->fetchAll();

	} catch (PDOWException $erro){ echo $erro;}

    // Seleciona os últimos 5 ganhadores
    try {

		$importaGanhadores = $conexao->prepare("SELECT * from ganhadores ORDER BY id DESC LIMIT 5");		
		$importaGanhadores->execute();
		$importaGanhadores = $importaGanhadores->fetchAll();

	} catch (PDOWException $erro){ echo $erro;}

    // Seleciona os últimos 5 ganhadores
    try {

		$importaCotas = $conexao->prepare("SELECT * from cotas WHERE idComprador = '".$id."'");		
		$importaCotas->execute();
		$importaCotas = $importaCotas->fetchAll();
		
	} catch (PDOWException $erro){ echo $erro;}
?>