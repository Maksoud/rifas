<?php
include("../../config/conexao.php");
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$pontoreferencia = $_POST['pontoreferencia'];
$data = date('Y-m-d H:i');

// Conexão com banco de dados para verificação de email existente
$verificaEmail = $conexao->prepare("SELECT * from usuarios WHERE email='".$email."'");
$verificaEmail->execute();
$contarEmail = $verificaEmail->rowCount();
// Validação de dados

if($usuario == "" || $usuario == null || $usuario == " "){
    echo '<script language="javascript" type="text/javascript">window.location.href="?1";</script>';
} elseif($contarUsuario == 1){
    echo '<script language="javascript" type="text/javascript">window.location.href="?2";</script>';
} elseif($contarEmail == 1){
    echo '<script language="javascript" type="text/javascript">window.location.href="?3";</script>';
} else {
    $sql = "INSERT INTO usuarios (nome, email, telefone, senha, cep, logradouro, numero, bairro, complemento, uf, cidade, pontoreferencia, data, status, nivel) VALUES ('".$nome."', '".$email."', '".$telefone."', '".$senha."', '".$cep."', '".$logradouro."', '".$numero."', '".$bairro."', '".$complemento."', '".$uf."', '".$cidade."', '".$pontoreferencia."', '".$data."', '1', '0');";
}
    $q = $conexao->prepare($sql);		
    $q->execute();

    if($q) {
        header("Location: ../../?4");
    } else {
        header("Location: ../../erro404");
    }
?>