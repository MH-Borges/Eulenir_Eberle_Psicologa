<?php

require_once("../../../config.php");

$id = $_POST['id_comment'];

$pdo->query("DELETE from comentarios WHERE id = '$id'");

echo 'Excluído com Sucesso!!';

?>