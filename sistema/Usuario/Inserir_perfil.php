<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>
	</body>
        <?php 

        require_once("../../config.php"); 

        $id = $_POST['idPerfil'];

        //SCRIPT PARA SUBIR FOTO NO BANCO
        $caminho = '../../Imgs/ProfilePics/' .@$_FILES['imgPerfil']['name'];
        if (@$_FILES['imgPerfil']['name'] == ""){ 
        $imagem = "sem-foto.jpg";

        } else { $imagem = @$_FILES['imgPerfil']['name']; }


        $imagem_temp = @$_FILES['imgPerfil']['tmp_name']; 
        $ext = pathinfo($imagem, PATHINFO_EXTENSION);   
        if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
        move_uploaded_file($imagem_temp, $caminho);
        } else { 
            echo "<script language='javascript'>window.alert('Extensão de imagem não permitida') </script>"; 
            echo "<script language='javascript'>window.location='index.php'</script>";
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
        echo 'Salvo com Sucesso!!';

        echo "<script language='javascript'>window.location='index.php'</script>";

        ?>
		
	</body>
</html>
