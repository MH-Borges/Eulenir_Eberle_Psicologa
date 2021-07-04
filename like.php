<?php

require_once("config.php"); 

$id = $_POST['id_like'];

$query = $pdo->query("SELECT * FROM blog_post where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$total = $res[0]['likes'];
$totalLikes = $total + 1;

$pdo->query("UPDATE blog_post SET likes = '$totalLikes' WHERE id = '$id' ");

echo 'atualizado com Sucesso!!';

?>