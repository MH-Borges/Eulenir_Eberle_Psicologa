<?php
require_once("../config.php");

@session_start();

$email = $_POST['emailLogin'];
$senha = md5($_POST['senhaLogin']);     

$res = $pdo->query("SELECT * FROM clientes where (email = '$email') and senha_crip = '$senha'");
$dados  = $res->fetchAll(PDO::FETCH_ASSOC);

if(@count($dados) > 0){
    $_SESSION['id_usuario'] = $dados[0]['id']; 
    $_SESSION['nome_usuario'] = $dados[0]['nome']; 
    $_SESSION['email_usuario'] = $dados[0]['email'];
    $_SESSION['senha_usuario'] = $dados[0]['senha'];
    $_SESSION['nivel_usuario'] = $dados[0]['nivel'];

    if($_SESSION['nivel_usuario'] == 'Admin'){
        echo "<script language='javascript'>window.location='Admin'</script>";
    }
    if($_SESSION['nivel_usuario'] == 'Padrao'){
        echo "<script language='javascript'> window.location='../blog.php' </script>";
    }
    }else{
        echo "<script language='javascript'>window.alert('Dados Incorretos!') </script>";
        echo "<script language='javascript'>window.location='index.php'</script>";
    }
?>