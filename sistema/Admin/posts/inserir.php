<?php
require_once("../../../config.php"); 
@session_start();

$id = $_POST['id_post_prim'];
$tempo = $_POST['tempo'];
$autor = $_POST['autor'];
$tag = $_POST['tag_id'];
$titulo = $_POST['titulo'];
$text_simp = $_POST['descri_simp'];
$text_completo = $_POST['texto_comp'];
$key_words = $_POST['key_words'];
$fontes = $_POST['fontes'];

//SCRIPT PARA SUBIR FOTO NO BANCO
$nome_img = preg_replace('/[ -]+/' , '-' , @$_FILES['imagem']['name']);
$caminho = '../../../Imgs/blog/' .$nome_img;
if (@$_FILES['imagem']['name'] == ""){ $imagem = "img_padrao.jpg"; }
else{ $imagem = $nome_img; }

$imagem_temp = @$_FILES['imagem']['tmp_name'];
$ext = pathinfo($imagem, PATHINFO_EXTENSION);   
if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ move_uploaded_file($imagem_temp, $caminho); }
else{ echo 'Extensão de Imagem não permitida!'; exit(); }


if($_POST['tempo'] == ""){echo 'Preecha o campo Tempo de Leitura'; exit();}
if($_POST['autor'] == ""){
	$res = $pdo->query("SELECT * FROM clientes where id = '$_SESSION[id_usuario]'"); 
	$dados  = $res->fetchAll(PDO::FETCH_ASSOC);
	$nomeUser = @$dados[0]['nome'];
	$autor = $nomeUser; 
}
if($_POST['titulo'] == ""){echo 'Coloque um Titulo'; exit();}
if($_POST['descri_simp'] == ""){echo 'Está faltando o texto de Chamada'; exit();}
if($_POST['texto_comp'] == ""){echo 'O campo texto da postagem está Vazio'; exit();}
if($_POST['key_words'] == ""){echo 'Adicione palavras chaves'; exit();}

if($_POST['fontes'] == ""){$fontes = "";}


$nome_novo = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($titulo)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ?"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));
$nome_url = preg_replace('/[ -]+/' , '-' , $nome_novo);

$antigo = $_POST['antigo'];
if($titulo != $antigo){
	$res = $pdo->query("SELECT * FROM blog_post where titulo = '$titulo'"); 
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	if(@count($dados) > 0){ echo 'Postagem já Cadastrada no Banco!'; exit(); }
}

$target = 'nao';
$visita = '0';
$like = '0';

if($id == ""){
	$res = $pdo->prepare("INSERT INTO blog_post (data, imagem, tempo, autor, tag_id, titulo, descri_simp, texto_comp, key_words, nome_url, fontes, targ, visita, likes) VALUES (curDate(), :imagem, :tempo, :autor, :tag_id, :titulo, :descri_simp, :texto_comp, :key_words, :nome_url, :fontes, :targ, :visita, :likes)");
	$res->bindValue(":imagem", $imagem);
}else{
	if($imagem == "img_padrao.jpg"){
		$res = $pdo->prepare("UPDATE blog_post SET tempo = :tempo, autor = :autor, tag_id = :tag_id, titulo = :titulo, descri_simp = :descri_simp, texto_comp = :texto_comp, key_words = :key_words, nome_url = :nome_url, fontes = :fontes, targ = :targ, visita = :visita, likes = :likes WHERE id = :id");
	}else{
		$res = $pdo->prepare("UPDATE blog_post SET imagem = :imagem, tempo = :tempo, autor = :autor, tag_id = :tag_id, titulo = :titulo, descri_simp = :descri_simp, texto_comp = :texto_comp, key_words = :key_words, nome_url = :nome_url, fontes = :fontes, targ = :targ, visita = :visita, likes = :likes  WHERE id = :id");
		$res->bindValue(":imagem", $imagem);
	}
	$res->bindValue(":id", $id);
}

$res->bindValue(":tempo", $tempo);
$res->bindValue(":autor", $autor);
$res->bindValue(":tag_id", $tag);
$res->bindValue(":titulo", $titulo);
$res->bindValue(":descri_simp", $text_simp);
$res->bindValue(":texto_comp", $text_completo);
$res->bindValue(":key_words", $key_words);
$res->bindValue(":nome_url", $nome_url);
$res->bindValue(":fontes", $fontes);
$res->bindValue(":targ", $target);
$res->bindValue(":visita", $visita);
$res->bindValue(":likes", $like);


$res->execute();

echo 'Salvo com Sucesso!!';

?>