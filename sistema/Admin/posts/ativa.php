<?php

require_once("../../../config.php"); 

$id = $_POST['id_post_ativa'];

$res = $pdo->query("SELECT * FROM blog_post where targ = 'sim'"); 
$dados = $res->fetchAll(PDO::FETCH_ASSOC);

if(@count($dados) > 0){ 
    echo 'Já existe um outros post fixado na tela Inicial'; exit(); 
} else {
    $pdo->query("UPDATE blog_post SET targ = 'sim' WHERE id = '$id'");
}

echo 'Ativado com Sucesso!!';

?>