<?php require_once("../../../config.php");

$id = $_POST['idBanner'];

//SCRIPT PARA SUBIR FOTO NO BANCO
$caminho = '../../../Imgs/BannerPics/' .@$_FILES['imgBanner']['name'];
if (@$_FILES['imgBanner']['name'] == ""){ 
  $imagem = "banner_padrao.jpg";
} else { $imagem = @$_FILES['imgBanner']['name']; }


$imagem_temp = @$_FILES['imgBanner']['tmp_name']; 
$ext = pathinfo($imagem, PATHINFO_EXTENSION);   
if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
move_uploaded_file($imagem_temp, $caminho);
} else { echo 'Extensão de Imagem não permitida!'; exit(); }

if($imagem == ""){
	$res = $pdo->prepare("INSERT INTO clientes (imagem_banner) VALUES ('banner_padrao.jpg')");
}else{
    if($imagem == "banner_padrao.jpg"){
        $res = $pdo->prepare("UPDATE clientes SET imagem_banner = '$imagem' WHERE id = '$id'");
    }else{
        $res = $pdo->prepare("UPDATE clientes SET imagem_banner = '$imagem' WHERE id = '$id'");
    }
}
$res->execute();
echo 'Salvo com Sucesso!!';

?>