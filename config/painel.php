<?php
    include("conexao.php");

    // Seleciona todos os usuários
    try{
		$importaUsuarios = $conexao->prepare("SELECT * from usuarios");		
		$importaUsuarios->execute();
		$importaUsuarios = $importaUsuarios->fetchAll();
	}catch (PDOWException $erro){ echo $erro;}

    // Seleciona todas as vendas
    try{
		$importaVendas = $conexao->prepare("SELECT * from cotas");		
		$importaVendas->execute();
		$importaVendas = $importaVendas->fetchAll();
	}catch (PDOWException $erro){ echo $erro;}
    
    $sorteados = explode(",", $sorteados);
?>