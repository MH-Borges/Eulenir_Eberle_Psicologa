<?php
    require_once("../../config.php");

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

    $res = $pdo->prepare("UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone, senha = :senha, senha_crip = :senha_crip WHERE id = :id"); 

    $res->bindValue(":nome", $nome);
    $res->bindValue(":email", $email);
    $res->bindValue(":telefone", $telefone);
    $res->bindValue(":senha", $senha);
    $res->bindValue(":senha_crip", $senha_crip);
    $res->bindValue(":id", $iduser);
    $res->execute();      

    echo 'Salvo com Sucesso!';
?>