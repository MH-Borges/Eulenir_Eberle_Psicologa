<?php
if(isset($_POST['email']) && !empty($_POST['email'])){

$nome = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$telefone = addslashes($_POST['numero']);
$mensagem = addslashes($_POST['msg']);

$to = "contato@mhborges.com.br";
$subject = "Contato (cliente $nome) - Site Portfólio";
$body = ("Informações de contato 
        
        Nome: $nome
        Email: $email
        Telefone: $telefone
        Mensagem: $mensagem     "
);
$header = "From:contato@mhborges.com.br"."\r\n".
          "Reply-To:".$email."\r\n".
          "X=Mailer:PHP/".phpversion();

if(mail($to,$subject,$body,$header)){
    echo ("Email enviado com sucesso");
}
else{
    echo("O Email não pode ser enviado, tente novamente");
}

}
?>