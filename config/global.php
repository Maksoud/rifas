<?php
    include("conexao.php");
    $tempomaximo = 43200;
    ob_start();
    session_start();
    if(!isset($_SESSION['megaUser']) && (!isset($_SESSION['megaPass']))){

        header("Location: login.php?acao=negado");exit;

    }elseif (isset($_SESSION['ultima_atividade']) && (time() - $_SESSION['ultima_atividade'] > $tempomaximo)) {

        header("Location: login.php?acao=negado");
        session_unset();
        session_destroy();
        
    }

    $_SESSION['ultima_atividade'] = time();
    
    $emailLogado = $_SESSION['megaUser'];
    $senhaLogado = md5($_SESSION['megaPass']);

	// seleciona a usuario logado
	try{
        
		$resultCliente = $conexao->prepare("SELECT * from usuarios WHERE email=:emailLogado AND senha=:senhaLogado");	
		$resultCliente->bindParam('emailLogado',$emailLogado, PDO::PARAM_STR);		
		$resultCliente->bindParam('senhaLogado',$senhaLogado, PDO::PARAM_STR);		
		$resultCliente->execute();
		$contar = $resultCliente->rowCount();	
		
		if($contar =1){

			$loop = $resultCliente->fetchAll();

			foreach ($loop as $show){

				$id = $show['id'];
				$nome = $show['nome'];
				$email = $show['email'];
				$telefone = $show['telefone'];
                $status = $show['status'];
                $nivel = $show['nivel'];
                $cep = $show['cep'];
                $numero = $show['numero'];
                $bairro = $show['bairro'];
                $complemento = $show['complemento'];
                $uf = $show['uf'];
                $cidade = $show['cidade'];
                $data = $show['data'];

			}
		}

	}catch (PDOWException $erro){ echo $erro;}
?>