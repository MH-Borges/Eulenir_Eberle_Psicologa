<?php

require_once("../../../config.php"); 

$id = $_POST['id'];

$pdo->query("DELETE from clientes WHERE id = '$id'");
$pdo->query("DELETE from comentarios WHERE id_user = '$id'");

echo 'Excluído com Sucesso!!';

?>