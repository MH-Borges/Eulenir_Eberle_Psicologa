<?php
    require_once("../../config.php");

    $Sobre = $_POST['SobreEdit'];
    $iduser = $_POST ['idSobre'];

    if($_POST['SobreEdit'] == ""){echo 'O campo de mensagem está Vazio'; exit();}

    $res = $pdo->prepare("UPDATE clientes SET sobre = :sobre WHERE id = :id"); 

    $res->bindValue(":sobre", $Sobre);
    $res->bindValue(":id", $iduser);
    $res->execute();      

    echo 'Salvo com Sucesso!';
?>