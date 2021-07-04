<?php
require_once("config.php");

$email = $_POST['email'];

if($email == ""){
    echo 'Preencha o Campo com seu Email!';
    exit();
}

$res = $pdo->query("SELECT * FROM clientes where email = '$email'"); 
$dados = $res->fetchAll(PDO::FETCH_ASSOC);

if(@count($dados) > 0){
    
    $pdo->query("UPDATE clientes SET ativo = 'Não' where email = '$email'"); 
    echo 'Descadastrado da Lista com Sucesso!';
}else{
   echo 'Este email não está cadastrado!';
}

?>