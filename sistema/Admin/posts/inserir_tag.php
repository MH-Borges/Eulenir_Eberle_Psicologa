<?php

require_once("../../../config.php"); 

if($_POST['nome_tag'] == ""){echo 'Preecha o Campo Nome Tag'; exit();}

$id = $_POST['id2_blind'];
$nome = $_POST['nome_tag'];

if($id === ""){
	$res = $pdo->prepare("INSERT into tags (nome) values (:nome )");
    $res->bindValue(":nome", $nome);
	$res->execute();
}else{
    $pdo->query("UPDATE tags SET nome = '$nome' WHERE id = '$id' ");
}

echo 'Salvo com Sucesso!!';

?>