<?php 
    require_once("../../config.php");
    
    @session_start();
    //verificação de autenticação do usuario
    if(@$_SESSION['id_usuario'] == null || @$_SESSION ['nivel_usuario'] != 'Admin'){
      echo "<script language='javascript'>window.location='../index.php'</script>";
    }
    
    //variaveis para o menu
    $pag = @$_GET["pag"];
    $perfil = "perfil";
    $menu1 = "posts";
    $menu2 = "clientes";
    

    //consulta de banco de dados para trazer dados do usuario
     
    $res = $pdo->query("SELECT * FROM clientes where id = '$_SESSION[id_usuario]'"); 
    $dados  = $res->fetchAll(PDO::FETCH_ASSOC);
    $nome_User = @$dados[0]['nome'];
    $email_User = @$dados[0]['email'];
    $Telefone_User = @$dados[0]['telefone'];   
    $senha_User = @$dados[0]['senha'];  
    $imagem_User = @$dados[0]['imagem'];
    $imagemBanner_User = @$dados[0]['imagem_banner'];
    $id_User = @$dados[0]['id'];
    $sobre_User = @$dados[0]['sobre'];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Matheus Henrique || https://mhborges.com.br">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>Painel User</title>
<link rel="icon" href="../../Imgs/icon.png" type="image/x-icon">  


<!-- font google-->
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<!-- font awesome para icons-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<!-- JQUERY linkagem -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<!-- Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script src="../../js/svg-inject.min.js"></script>

<script src="https://cdn.tiny.cloud/1/01uhosbwsatq81mxwpnxld6f9r0yekrqdchl405mj6b76bsl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: '#editor',
    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
    tinycomments_mode: 'embedded',
  });
</script>
<!-- style -->
<link rel="stylesheet" href="../css/style_dash.css">

</head>

<body id="AdminPage">
  <nav id="menuSist">
    <ul class="menuSide">
      <li class="nav-item">
        <a href="#" class="nav-link" onclick="toggleForm();"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
    <ul class="itens_menu">
      <li class="nav-item">
        <a class="nav-link" href="../../blog.php" role="button">
          <i class="fas fa-house-user"></i>
        </a>
      </li>
      <li class="nav-item dropdown show">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-cog"></i>
        </a>
        <div class="dropdown-menu">
          <a href="../logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-3 text-danger"></i> Sair
          </a>
          <button class="dropdown-item" type="button" href="" data-toggle="modal" data-target="#Infomd" id="MudaInfoNav" >
            <i class="fas fa-wrench mr-3 text-dark"></i>Configurações de conta
          </button>
        </div>
      </li>
    </ul>
  </nav>

  <nav class="Sidebar">
    <div class="BxUser">
      <div class="imgBannerAdm">
        <?php if(@$imagemBanner_User != ""){ ?>
            <img id="ftBanner" src="../../Imgs/BannerPics/<?php echo $imagemBanner_User ?>">
        <?php }else{ ?>
            <img id="ftBanner" src="../../Imgs/BannerPics/banner_padrao.jpg">
        <?php }?>
      </div>
      <div class="imgAdm">
        <?php if(@$imagem_User != ""){ ?>
            <img src="../../Imgs/ProfilePics/<?php echo $imagem_User ?>">
        <?php }else{ ?>
            <img src="../../Imgs/ProfilePics/sem-foto.jpg">
        <?php }?>
      </div> 
      <div class="nameUser">
        <a href="index.php?pag=<?php echo $perfil ?>"><?php echo @$nome_User ?></a>
      </div>
    </div>

    <div class="divider"></div>

    <div class="Painel">
      <a href="index.php?pag=home.php">
        <i id="rotate" class="fas fa-cogs"></i>
        <span>Painel de Controle</span>
        <i class="fas fa-cogs"></i>
      </a>
    </div>

    <ul class="Icons">
      <div class="divider"></div>
      <li class="nav-item">
        <a href="index.php?pag=<?php echo $menu1 ?>">
          <i class="fas fa-book-open"></i>
          <p>Blog Post</p>
        </a>
      </li>
      <div class="divider"></div>
      <li class="nav-item">
        <a href="index.php?pag=<?php echo $menu2 ?>">
          <i class="fas fa-users"></i>
          <p>Contato de Clientes</p>
        </a>
      </li>
      <div class="divider"></div>
      <li class="nav-item">
        <a href="#" data-toggle="modal" data-target="#ModalEmail">
          <i class="fas fa-envelope-open-text"></i>
          <p>Email Marketing</p>
        </a>
      </li>
      <div class="divider"></div>
      <li class="nav-item">
        <a href="backup.php">
          <i class="fas fa-file-download"></i>
          <p>Backup</p>
        </a>
      </li>
      <div class="divider"></div>
    </ul>
  </nav>

  <div class="Box_conteudo">
    <?php 
      if ($pag == null){include_once("home.php");}
      elseif ($pag==$menu1){include_once($menu1. ".php");}
      elseif ($pag==$menu2){include_once($menu2. ".php");}
      elseif ($pag==$perfil){include_once($perfil. ".php");}
      else{include_once("home.php");}
    ?>
  </div>

  <div class="modal fade" id="ModalEmail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Email Marketing</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <form id="form-perfil" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <?php 
              $query = $pdo->query("SELECT * FROM clientes where ativo = 'Sim' ");
              $res = $query->fetchAll(PDO::FETCH_ASSOC);
              $total_emails = @count($res);
            ?>
            <p><small>Total de Emails Cadastrados - <?php echo $total_emails ?></small></p>
            <div class="form-group">
              <label >Assunto Email</label>
              <input  type="text" class="form-control" id="assunto-email" name="assunto-email" placeholder="Assunto do Email">
            </div>
            <div class="form-group">
              <label >Link <small>(Se Tiver)</small></label>
              <input  type="text" class="form-control" id="link-email" name="link-email" placeholder="Link Caso Exista">
            </div>
            <div class="form-group">
              <label >Mensagem </label>
              <textarea maxlength="1000" class="form-control" id="mensagem-email" name="mensagem-email"></textarea>
            </div>
            <small><div id="mensagem-email-marketing" class="mr-4"></div></small>
          </div>
          <div class="modal-footer">
            <button type="button" id="btn-fechar-email" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" name="btn-salvar-email" id="btn-salvar-email" class="btn btn-success">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#dataTable').DataTable();
    });
    
    $("#dataTable").dataTable({
      "ordering": false,
      "bJQueryUI": true,
      "oLanguage": {
          "sProcessing":   "Processando...",
          "sLengthMenu":   "Mostrar _MENU_ registros",
          "sZeroRecords":  "Não foram encontrados resultados",
          "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
          "sInfoFiltered": "",
          "sInfoPostFix":  "",
          "sSearch":       "Buscar:",
          "sUrl":          "",
          "oPaginate": {
            "sFirst":    "Primeiro",
            "sPrevious": "Anterior",
            "sNext":     "Seguinte",
            "sLast":     "Último"
          }
      }
    });
  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script type="text/javascript" src="../js/jquery_Adm.js"></script>
  <script type="text/javascript" src="../js/script_Adm.js"></script>
</body>
</html>