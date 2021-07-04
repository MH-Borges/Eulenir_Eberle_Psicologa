<?php

require_once("../../../config.php"); 

$id = $_POST['id_post_delet'];

$pdo->query("DELETE from blog_post WHERE id = '$id'");
$pdo->query("DELETE from comentarios WHERE id_post = '$id'"); 

echo 'Excluído com Sucesso!!';

?>