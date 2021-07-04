<?php 
require_once("config.php");
if($_POST['nome_news'] == ""){echo 'Preecha o Campo Nome'; exit();}
if($_POST['email_news'] == ""){echo 'Preecha o Campo Email'; exit();}

$Nome_news = $_POST['nome_news'];
$Email_news = $_POST['email_news'];

if (!filter_var($Email_news, FILTER_VALIDATE_EMAIL)){
	echo 'Email invalido'; exit();
}
if (!preg_match("/^[a-zA-Z-' ]*$/", $Nome_news)) {
	echo 'Preencha com um nome valido'; exit();
}

$senha = '12345';
$senha_crip = md5($senha);

//ENVIAR INFOS PARA O BANCO DE DADOS
$res = $pdo->query("SELECT * FROM clientes where email = '$Email_news'"); 
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
if(@count($dados) === 0){
	$res = $pdo->prepare("INSERT into clientes (nome, email, senha, senha_crip, nivel, imagem, telefone, ativo) values (:nome, :email, :senha, :senha_crip, :nivel, :imagem, :telefone, :ativo)");
	$res->bindValue(":nome", $Nome_news);
	$res->bindValue(":email", $Email_news);
	$res->bindValue(":senha", $senha);
	$res->bindValue(":senha_crip", $senha_crip);
	$res->bindValue(":nivel", "Padrao");
	$res->bindValue(":imagem", "sem-foto.jpg");
	$res->bindValue(":telefone", "(00) 00000 - 0000");
	$res->bindValue(":ativo", "Sim");
	$res->execute();
}
else{
    $pdo->prepare("UPDATE clientes SET nome = '$Nome_news', email = '$Email_news', ativo = 'Sim' WHERE email = '$Email_news'");
}

echo 'Cadastrado com Sucesso!';
?>