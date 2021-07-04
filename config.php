<?php 
//variaveis globais

$email = 'contato@eulenireberle.com.br';
$telefone = '(41) 3359 - 8662';
$whatsapp = '(41) 99992 - 7795';
$whatsapp_link = '5541999927795'; //<-- wa.me
$Nome_Site = 'Eulenir Eberle Site';

/*
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'Eulenir_Eberle';
*/

$servidor = 'localhost';
$usuario = 'loidir81_EulenirBD';
$senha = 'Eulenir123';
$banco = 'loidir81_Eulenir_site';


$enviar_total_emails = 480;
$intervalo_envio_email = 70;

$url_loja = 'localhost/loja';

date_default_timezone_set('America/Sao_Paulo'); // time zone do cadastro (guarda o momento q o usuario se cadastrou)

try{
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha"); // conexão com o banco de dados

    $conn = mysqli_connect($servidor, $usuario, $senha, $banco);
}
catch(Exception $e){
    echo "Erro ao conectar com o banco de dados! " . $e;
}
?>