<?php
    require_once("../../../config.php");

    $nome = $_POST['NomeInfo'];
    $email = $_POST['EmailInfo'];
    $telefone = $_POST['TelInfo'];
    $senha = $_POST['SenhaInfo'];
    $senha_crip = md5($_POST['SenhaInfo']);
    $iduser = $_POST ['idInfos'];

    if($nome == ""){ echo "Preencha o Nome!"; exit(); }
    if($email == ""){ echo "Preencha o Email!"; exit(); }
    if($senha == ""){ echo "Preencha a Senha!"; exit(); }
    if($senha != $_POST['ConfSenha']){ echo "Preencha a Senha!"; exit(); }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ echo 'Email invalido'; exit(); }
    if (!preg_match("/^[a-zA-Z-' ]*$/", $nome)) { echo 'Preencha com um nome valido'; exit(); }

    $nome_novo = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($nome)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ?"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));
    $perfil_url = preg_replace('/[ -]+/' , '-' , $nome_novo);

    $res = $pdo->prepare("UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone, senha = :senha, senha_crip = :senha_crip, perfil_url = :perfil_url WHERE id = :id"); 

    $res->bindValue(":nome", $nome);
    $res->bindValue(":email", $email);
    $res->bindValue(":telefone", $telefone);
    $res->bindValue(":senha", $senha);
    $res->bindValue(":senha_crip", $senha_crip);
    $res->bindValue(":id", $iduser);
    $res->bindValue(":perfil_url", $perfil_url);
    $res->execute();      

    echo 'Salvo com Sucesso!';
?>