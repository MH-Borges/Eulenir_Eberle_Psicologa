<?php 

require_once("../config.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);


if($nome == ""){echo 'Preencha o Campo nome!'; exit(); }
if($email == ""){ echo 'Preencha o Campo email!'; exit(); }
if($telefone == ""){$telefone = '(00) 00000 - 0000';}
if($senha == ""){ echo 'Preencha o Campo senha!'; exit(); }
if($senha != $_POST['confirmar-senha']){ echo 'As senhas não coincidem!'; exit(); }

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo "Email invalido"; exit();
}
if (!preg_match("/^[a-zA-Z-' ]*$/", $nome)) {
	echo "Preencha com um nome valido"; exit();
}


$res = $pdo->query("SELECT * FROM clientes where email = '$email' "); 
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
if(@count($dados) == 0){
	$res = $pdo->prepare("INSERT into clientes (nome, email, senha, senha_crip, nivel, imagem, telefone, ativo) values (:nome, :email, :senha, :senha_crip, :nivel, :imagem, :telefone, :ativo)");
	
    $res->bindValue(":nome", $nome);
	$res->bindValue(":email", $email);
	$res->bindValue(":senha", $senha);
	$res->bindValue(":senha_crip", $senha_crip);
	$res->bindValue(":nivel", 'Padrao');
    $res->bindValue(":imagem", 'sem-foto.jpg');
    $res->bindValue(":telefone", $telefone);
    $res->bindValue(":ativo", 'Sim');

	$res->execute();

	echo 'Cadastrado com Sucesso!';
}else{
	echo 'Email já Cadastrado! Tente logar usando este mesmo email e a senha 12345';
}


?>