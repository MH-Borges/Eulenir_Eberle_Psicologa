<?php 
  require_once("../config.php");
  $res = $pdo->query("SELECT * FROM clientes");
  $dados  = $res->fetchAll(PDO::FETCH_ASSOC);
  $senha_cripto = md5('54321');

if(@count($dados) === 0){
  $res = $pdo->query("INSERT into clientes (nome, email, senha, senha_crip, nivel, imagem) 
  values ('ADM', '$email','54321', '$senha_cripto', 'Admin', 'sem-foto.jpg')");
}

elseif(@count($dados) != 0){
  @session_start();
  $id_usuario = @$_SESSION['id_usuario'];
  $nivel_usuario = @$_SESSION['nivel_usuario'];
  if($nivel_usuario == 'Admin'){echo "<script language='javascript'>window.location='Admin'</script>";}
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Matheus Henrique || https://mhborges.com.br">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta http-equiv="X-UA-Compatible" content="ie=\edge">

  <link rel="icon" href="../Imgs/icon.png"/>
	<title>Login Eulenir</title>
  
  <!-- font google-->
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- font awesome para icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <!-- JQUERY linkagem -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  

  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body> 
  
  <section class="login_sreen">
    <div class="container">
      <div class="user signInBx">
        <div class="imgBx"><img src="../Imgs/patter01.jpeg"></div>
        <div class="formBx">
          <form action="autenticar.php" method="post" name="login">
            <h2>Login</h2>
            <input type="text" placeholder="Email" name="emailLogin" id="emailLogin">
            <div class="senhaBx">
              <input type="password" placeholder="Senha" name="senhaLogin" id="senhaLogin">
              <button type="button" id="mostraSenha"><i id="eye" class="fas fa-eye"></i></button>
            </div>
            <input id="loginBt" type="submit" placeholder="Login">
            <p>Não tem uma conta?<a href="#" onclick="toggleForm();">Crie Já!</a></p>
            <p><a href="#" data-toggle="modal" data-target="#ModalRecuperar">Esqueceu a senha?</a></p>
          </form>
        </div>
      </div>
      <div class="user signUpBx">
        <div class="formBx">
          <form method="post">
            <h2>Crie Sua Conta</h2>
            <div class="form-group">
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo"> 
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="Seu Email" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone de contato">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="confirmar-senha" name="confirmar-senha" placeholder="Confirmar Senha">
            </div>
            <button type="button" id="btn-cadastrar" class="btn">Cadastrar</button>
            <p class="signupLine">Já tem uma conta?<a id="loginNow" href="#" onclick="toggleForm();">Logue Agora!</a></p>     
          </form>
        </div>
        <div class="imgBx"><img src="../Imgs/patter02.jpeg"></div>
      </div>
    </div>
    <div id="div-mensagem"></div>
  </section>

  <!-- Modal Recupera -->
  <div class="modal fade" id="ModalRecuperar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Recuperar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="emailRecupera" name="emailRecupera" placeholder="Seu Email">
            </div>
        </div>
            <strong><div class="col-md-12 text-center" id="AlertmsgRecupera"></div></strong>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="button" id="btn-recuperar" class="btn btn-info">Recuperar</button>
            </div>
          </form>
      </div>
    </div>
  </div> 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script type="text/javascript" src="js/jquery_login.js"></script>
  <script>
    
    function toggleForm(){
      section = document.querySelector('section');
      container = document.querySelector('.container');
      container.classList.toggle('active');
      section.classList.toggle('active');
    }
  </script>
</body>
</html>