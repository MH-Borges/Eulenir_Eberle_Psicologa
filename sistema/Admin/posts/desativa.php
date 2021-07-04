<?php

require_once("../../../config.php"); 

$id = $_POST['id_post_desativa'];

$pdo->query("UPDATE blog_post SET targ = 'nao' WHERE id = '$id'");

echo 'Desativado com Sucesso!!';

?>