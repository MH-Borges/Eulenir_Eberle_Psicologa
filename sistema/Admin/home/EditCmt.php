<?php

require_once("../../../config.php");

$id = $_POST['id_comment_edit'];
$comment = $_POST['mensagem'];

$pdo->query("UPDATE comentarios SET comentario = '$comment' WHERE id = '$id' ");

echo 'Editado com Sucesso!!';

?>