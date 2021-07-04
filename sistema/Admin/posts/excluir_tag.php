<?php

require_once("../../../config.php"); 

$id = $_POST['id'];
if($id == "1"){ echo 'Desculpe, Impossivel apagar o campo Sem Tag'; exit();}

$pdo->query("DELETE from tags WHERE id = '$id'");

echo 'Excluído com Sucesso!!';

?>