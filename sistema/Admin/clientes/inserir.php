<?php

require_once("../../../config.php"); 

$id = $_POST['id2_blind'];
$antigo = $_POST['email_antigo'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$ativo = $_POST['ativo'];
$senha = $_POST['senha_client'];
$nivel = $_POST['nivel'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo 'Email invalido'; exit();
}
if (!preg_match("/^[a-zA-Z-' ]*$/", $nome)) {
	echo 'Preencha com um nome valido'; exit();
}

if($_POST['nome'] == ""){echo 'Preecha o Campo Nome'; exit();}
if($_POST['email'] == ""){echo 'Preecha o Campo Email'; exit();}
if($_POST['ativo'] == ""){echo 'Preecha o campo "Ativo" com Sim ou Nao'; exit();}
if($_POST['telefone'] == ""){$telefone = '(00) 00000 - 0000';}
if($_POST['senha_client'] == ""){$senha = '12345';}


if($email != $antigo){
	$res = $pdo->query("SELECT * FROM clientes where email = '$email'"); 
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	if(@count($dados) > 0){ echo 'Email já Cadastrada no Banco!'; exit(); }
}

$ativo_low = strtolower($_POST['ativo']);
$nivel_low = strtolower($_POST['nivel']);


if(ucfirst($ativo_low) == "Nao" or ucfirst($ativo_low) == "Não"){
    $ativo = "Nao";
}else{$ativo = "Sim";}

if(ucfirst($nivel_low) == "Admin" or ucfirst($nivel_low) == "Adm" ){
    $nivel = "Admin";
}else{$nivel = "Padrao";}

$senha_cripto = md5($senha);

$nome_novo = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($nome)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ?"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));
$perfil_url = preg_replace('/[ -]+/' , '-' , $nome_novo);

if($id == ""){
	$res = $pdo->prepare("INSERT into clientes (nome, email, senha, senha_crip, nivel, telefone, ativo, perfil_url) values (:nome, :email, :senha, :senha_crip, :nivel, :telefone, :ativo, :perfil_url)");
}else{
    $res = $pdo->prepare("UPDATE clientes SET nome = :nome, email = :email, senha = :senha, senha_crip = :senha_crip, nivel = :nivel, telefone = :telefone, ativo = :ativo, perfil_url = :perfil_url WHERE id = :id");
    $res->bindValue(":id", $id);
}  

$res->bindValue(":nome", $nome);
$res->bindValue(":email", $email);
$res->bindValue(":senha", $senha);
$res->bindValue(":senha_crip", $senha_cripto);
$res->bindValue(":nivel", $nivel);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":ativo", $ativo);
$res->bindValue(":perfil_url", $perfil_url);

$res->execute();

echo 'Salvo com Sucesso!!';

?>