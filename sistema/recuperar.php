<?php
require_once("../config.php");

$email = $_POST['emailRecupera'];   
if($email == ""){echo 'Preencha o campo Email!'; exit();}

$res = $pdo->query("SELECT * FROM clientes where email = '$email' ");
$dados  = $res->fetchAll(PDO::FETCH_ASSOC);

if(@count($dados) > 0){
    $senha = $dados[0]['senha'];
    $destinatario = $email;
    $assunto = $nome_loja . 'Recuperação de senha';

    $mensagem = utf8_decode('Sua senha é' .$senha);
    $cabecalhoemail = "From: " .$email;
    mail($destinatario, $assunto, $mensagem, $cabecalhoemail);
    echo 'Senha enviada para o Email';
}
else{echo 'Email não encontrado!';}

?>