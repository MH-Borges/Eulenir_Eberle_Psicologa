<?php 
require_once("config.php");

$Nome_cont = $_POST['nome'];
$Email_cont = $_POST['email'];
$Telefone_cont = $_POST['telefone'];
$Telefone_email = $Telefone_cont;

if($_POST['nome'] == ""){echo 'Preecha o Campo Nome'; exit();}
if($_POST['email'] == ""){echo 'Preecha o Campo Email'; exit();}
if($_POST['mensagem'] == ""){echo 'Preecha o Campo Mensagem'; exit();}

if($_POST['telefone'] == ""){$Telefone_cont = '(00) 00000 - 0000'; $Telefone_email = '(00) 00000 - 0000 (Telefone nao informado)'; }

if (!filter_var($Email_cont, FILTER_VALIDATE_EMAIL)){
	echo 'Email invalido'; exit();
}
if (!preg_match("/^[a-zA-Z-' ]*$/", $Nome_cont)) {
	echo 'Preencha com um nome valido'; exit();
}

$Msg_cont = $_POST['mensagem'];

$destinatario = $email;

$cabecalhos = "From: ".$Email_cont;

$assunto = $Nome_Site . ' - Contato Cliente';

$mensagem = utf8_decode('Nome: '.$Nome_cont. "\r\n"."\r\n" . 'Telefone: '.$Telefone_email. "\r\n"."\r\n" . 'Mensagem: ' . "\r\n"."\r\n" .$Msg_cont);

mail($destinatario, $assunto, $mensagem, $cabecalhos);

echo 'Enviado com Sucesso!';


$senha = '12345';
$senha_crip = md5($senha);

//ENVIAR INFOS PARA O BANCO DE DADOS
$res = $pdo->query("SELECT * FROM clientes where email = '$Email_cont'"); 
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
if(@count($dados) === 0){
	$res = $pdo->prepare("INSERT into clientes (nome, email, senha, senha_crip, nivel, imagem, telefone, ativo) values (:nome, :email, :senha, :senha_crip, :nivel, :imagem, :telefone, :ativo)");
	$res->bindValue(":nome", $Nome_cont);
	$res->bindValue(":email", $Email_cont);
	$res->bindValue(":senha", $senha);
	$res->bindValue(":senha_crip", $senha_crip);
	$res->bindValue(":nivel", "Padrao");
	$res->bindValue(":imagem", "sem-foto.jpg");
	$res->bindValue(":telefone", $Telefone_cont);
	$res->bindValue(":ativo", "Sim");
	$res->execute();
}
else{
    $pdo->prepare("UPDATE clientes SET nome = '$Nome_cont', email = '$Email_cont', telefone = '$Telefone_cont', ativo = 'Sim' WHERE email = '$Email_cont'");
}
?>