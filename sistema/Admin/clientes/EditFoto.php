<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>
	</body>
        <?php 

        require_once("../../../config.php");

        $id = $_POST['idFoto'];
        
        $nome_img = preg_replace('/[ -]+/' , '-' , @$_FILES['imgCliente']['name']);
        $caminho = '../../../Imgs/ProfilePics/' .$nome_img;
        if (@$_FILES['imgCliente']['name'] == ""){ $imagem = "sem-foto.jpg"; }
        else{ $imagem = $nome_img; }


        $imagem_temp = @$_FILES['imgCliente']['tmp_name'];
        $ext = pathinfo($imagem, PATHINFO_EXTENSION);   
        if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ move_uploaded_file($imagem_temp, $caminho); 
        } else { 
            echo "<script language='javascript'>window.alert('Extensão de imagem não permitida') </script>"; 
            echo "<script language='javascript'>window.location='index.php?pag=clientes'</script>";
        }

        if($imagem == ""){
            $res = $pdo->prepare("INSERT INTO clientes (imagem) VALUES ('sem-foto.jpg')");
        }else{
            if($imagem == "sem-foto.jpg"){
                $res = $pdo->prepare("UPDATE clientes SET imagem = '$imagem' WHERE id = '$id'");
            }else{
                $res = $pdo->prepare("UPDATE clientes SET imagem = '$imagem' WHERE id = '$id'");
            }
        }
        $res->execute();


        echo "<script language='javascript'>window.location='../index.php?pag=clientes'</script>";

        ?>
		
	</body>
</html>



<?php

require_once("../../../config.php");







$res = $pdo->prepare("UPDATE clientes SET imagem = :imagem WHERE id = :id");
$res->bindValue(":id", $id);
$res->bindValue(":imagem", $imagem);

$res->execute();

echo 'Editado com Sucesso!!';

?>