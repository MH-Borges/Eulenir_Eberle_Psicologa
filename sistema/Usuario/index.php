<?php 
    require_once("../../config.php");
    
    @session_start();
    //verificação de autenticação do usuario
    if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'Padrao'){
      echo "<script language='javascript'>window.location='../../blog.php'</script>";
    }
    
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
<script type="text/javascript" src="../../js/jquery.js"></script>
<!-- bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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

<!-- Theme style -->
<link rel="stylesheet" href="../css/style_dash.css">
</head>

<body id="PerfilPage">

  <nav id="menuSist">
    <ul class="Logo">
      <li class="nav-item">
        <a href="../../blog.php"><img src="../../Imgs/icon.png"></a>
        <span>Perfil <?php echo $nome_User ?></span>
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

  <div class="container infosUser">
    <div class="row">
      <div class="col-md-12 banner">
        <button type="button" href="" data-toggle="modal" data-target="#Bannermd" id="MudaBanner"><i class="fas fa-pencil-alt"></i></button>
        <?php if(@$imagemBanner_User != ""){ ?>
            <img src="../../Imgs/BannerPics/<?php echo $imagemBanner_User ?>">
        <?php } else { ?>
            <img src="../../Imgs/BannerPics/banner_padrao.jpg">
        <?php } ?>
        <div id="msgBanner"></div>
      </div>
    </div> 
    
    <div class="imgPerfil">    
      <button type="button" href="" data-toggle="modal" data-target="#Perfilmd" id="MudaFoto" class><i class="fas fa-pencil-alt"></i></button>
      <?php if(@$imagem_User != ""){ ?>
          <img src="../../Imgs/ProfilePics/<?php echo $imagem_User ?>">
      <?php }else{ ?>
          <img src="../../Imgs/ProfilePics/sem-foto.jpg" >
      <?php }?>
      <div id="msgPerfil"></div>
    </div>

    <div class="infoUser">
      <button type="button" href="" data-toggle="modal" data-target="#Infomd" id="MudaInfo" ><i class="fas fa-pencil-alt"></i></button>
      <h3><?php echo @$nome_User ?></h3>
      <h4><?php echo @$email_User ?> <span>|</span> <span><?php echo @$Telefone_User ?></span></h4>
      <div id="msgInfos"></div>
    </div>

  </div>

  <div class="container sobre">
    <button type="button" href="" data-toggle="modal" data-target="#Sobremd" id="MudaSobre" ><i class="fas fa-pencil-alt"></i></button>
    <h3>Sobre</h3>
    <?php if($sobre_User == ""){ ?>
      <div class="sobretxt">Escreva aqui algumas informações sobre você</div>
    <?php } else { ?>
      <div class="sobretxt"><?php echo $sobre_User ?></div>
    <?php } ?>
    <div id="msgSobre"></div>
  </div>
  
  <div class="container coments">
    <h3>Seus ultimos comentários</h3>
    <div  id="msg_exclui_coment"></div>
    <?php
      $query2 = $pdo->query("SELECT * from comentarios where id_user = '$id_User' order by id desc");
      $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
      
      for ($i=0; $i < count($res2); $i++) { 
          foreach ($res2[$i] as $key => $value) {
          }
          
          $id_coment = $res2[$i]['id'];
          $id_user = $res2[$i]['id_user'];
          $id_post = $res2[$i]['id_post'];
          $comment = $res2[$i]['comentario'];
          $data = $res2[$i]['data'];
          $data = implode(' / ', array_reverse(explode('-', $data)));

          $query3 = $pdo->query("SELECT * from clientes where id = '$id_user' ");
          $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
          $nome_cliente = $res3[0]['nome'];
          $imagem_cliente = $res3[0]['imagem'];
    
          $query4 = $pdo->query("SELECT * from blog_post where id = '$id_post' ");
          $res4 = $query4->fetchAll(PDO::FETCH_ASSOC);
          $titulo_post = $res4[0]['titulo'];
          $imagem_post = $res4[0]['imagem'];

          $postagem_get = $res4[0]['nome_url'];
    ?>
    <div class="comentario">
      <div class="imgUser"><img src="../../Imgs/ProfilePics/<?php echo $imagem_cliente ?>"></div>
      <p class="NomeUser"><?php echo $nome_cliente ?> <span><?php echo $data ?></span> </p>
      <p class="textUser"><?php echo $comment ?></p>
      <div class="postInfo">
        <div class="imgPost"><img src="../../Imgs/blog/<?php echo $imagem_post ?>"></div>
        <h4><?php echo $titulo_post ?></h4>
      </div>
      <?php if($id_User == @$_SESSION['id_usuario']){ ?>
        <button class="delet_Comment" type="button" href="" data-toggle="modal" data-target="#deletComent" id="delet_Coment" ><i class="fa fa-trash text-danger"></i></button>
      <?php } ?>
    </div>
    <?php } ?>
  </div>

  <section id="recomend">
    <div class="container">
      <h3>Veja mais do blog</h3>
      <div class="Cards_Post">
        <?php 
          $query = $pdo->query("SELECT * FROM blog_post order by id desc LIMIT 3");
          $res = $query->fetchAll(PDO::FETCH_ASSOC);

          for ($i=0; $i < count($res); $i++) { 
            foreach ($res[$i] as $key => $value) {
            }

            $imagem = $res[$i]['imagem'];
            $titulo = $res[$i]['titulo'];
            $tag_id = $res[$i]['tag_id'];
            $nome_url = $res[$i]['nome_url'];

            $query2 = $pdo->query("SELECT * from tags where id = '$tag_id' ");
            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
            $nome_tag = $res2[0]['nome'];

            ?>
            <a class="mix ansiedade" href="../../postagem-<?php echo $nome_url ?>">
                <div class="card_blog">
                <div id="img"><img src="../../Imgs/blog/<?php echo $imagem ?>" alt=""></div>
                    <div class="title_blog"><h4><?php echo $titulo ?></h4></div>

                    <?php if($tag_id != "1"){ ?>
                        <div class="tag"><p><?php echo $nome_tag ?></p></div>
                    <?php } if( $tag_id == "1") { ?>
                        <div class="noneB"></div>
                    <?php } ?>
                    
                </div>
            </a>

        <?php } ?>    
      </div>
    </div>
  </section>

  <!--Rodapé-->
  <footer>
    <div class="rodapeBox col-lg-10">
        <h5>
            ©2021. Eulenir Eberle Psicóloga<br>
            CRP 08/24116. Todos os direitos reservados.
        </h5>
        <p>Produzido por <a target="_blank" href="https://mhborges.com.br"><img src="../../Imgs/MH_logo.svg" onload="SVGInject(this)"></a></p>
    </div>
  </footer>

  <div class="modal fade" id="Bannermd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Editar Banner</h5>
        </div>
        <form id="form_banner" method="POST">
          <div class="modal-body">
            <?php if(@$imagemBanner_User != ""){ ?>
              <img src="../../Imgs/BannerPics/<?php echo $imagemBanner_User ?>" class="BannerIMG" id="target">
            <?php }else{ ?>
              <img src="../../Imgs/BannerPics/banner_padrao.jpg" class="BannerIMG" id="target">
            <?php }?>
          </div>
          <div class="modal-footer">
            <div class="form-group">
              <label> Escolha sua Imagem </label>
              <input type="file" value="<?php echo @$imagemBanner_User ?>" class="form-control-file" id="imgBanner" name="imgBanner" onChange="carregarImgBanner();">
            </div>
            <input value="<?php echo @$id_User ?>" type="hidden" name="idBanner" id="idBanner">
            <button type="button" id="fechaBanner" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" name="salvar_banner" id="salvar_banner" class="btn btn-success">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div> 

  <div class="modal fade" id="Perfilmd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Editar foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="Inserir_perfil.php" enctype="multipart/form-data">
          <div class="modal-body">
            <?php if(@$imagem_User != ""){ ?>
              <img src="../../Imgs/ProfilePics/<?php echo $imagem_User ?>" class="PerfilIMG" id="targetPerfil">
            <?php  } else { ?>
              <img src="../../Imgs/ProfilePics/sem-foto.jpg" class="PerfilIMG" id="targetPerfil">
            <?php } ?>
          </div>
          <div class="modal-footer">
            <div class="form-group">
              <label> Escolha sua Imagem </label>
              <input type="file" value="<?php echo @$imagem_User ?>" class="form-control-file TargetIMGPerfil" id="imgPerfil" name="imgPerfil" onChange="carregarImg();">
            </div>
            <input value="<?php echo @$id_User ?>" type="hidden" name="idPerfil" id="idPerfil">
            <button type="button" id="fechaPerfil" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" name="salvar_perfil" id="salvar_perfil" class="btn btn-success">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="Infomd" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5>Editar Perfil</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <form id="form" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group">
                      <label >Nome</label>
                      <input value="<?php echo @$nome_User ?>" type="text" class="form-control" id="NomeInfo" name="NomeInfo" placeholder="Nome">
                  </div>
                  <div class="form-group">
                      <label >Email</label>
                      <input value="<?php echo @$email_User ?>" type="email" class="form-control" id="EmailInfo" name="EmailInfo" placeholder="Email">
                  </div>
                  <div class="form-group">
                      <label >Telefone</label>
                      <input value="<?php echo @$Telefone_User ?>" type="text" class="form-control" id="TelInfo" name="TelInfo" placeholder="Telefone">
                  </div>
                  <div class="row senhas">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label >Senha</label>
                              <div class="senhaBx">
                                <input value="<?php echo @$senha_User ?>" type="password" class="form-control" id="SenhaInfo" name="SenhaInfo" placeholder="Nova Senha">
                                <button type="button" id="mostraSn" ><i class="fas fa-eye"></i></button>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                              <div class="form-group">
                              <label >Confirmar Senha</label>
                              <div class="senhaBx">
                                <input value="<?php echo @$senha_User ?>" type="password" class="form-control" id="ConfSenha" name="ConfSenha" placeholder="Confirmar Senha">
                                <button type="button" id="ConfSn"><i class="fas fa-eye"></i></button>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input value="<?php echo $_SESSION['id_usuario'] ?>" type="hidden" name="idInfos" id="idInfos">
                  <button type="button" id="FechaInfo" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" name="Salvar_Info" id="Salvar_Info" class="btn btn-success">Salvar</button>
                </div>
              </form>
          </div>
      </div>
  </div>

  <div class="modal fade" id="Sobremd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Me conte um pouco sobre quem é voce!!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form id="form_sobre" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                        <label>Sobre você <span>(Max 2000 Caracteres)</span></label>
                        <textarea id="editor" name="SobreEdit"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input value="<?php echo $_SESSION['id_usuario'] ?>" type="hidden" name="idSobre" id="idSobre">
                    <button type="button" id="FechaSobre" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="Salvar_Sobre" id="Salvar_Sobre" class="btn btn-success">Salvar</button>
                  </div>
                </form>
            </div>
        </div>
    </div>

  <div class="modal fade" id="deletComent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <p>Deseja realmente Excluir este Comentário?</p>
        </div>
        <div class="modal-footer">    
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="FechaComment">Cancelar</button>
            <form method="post">
              <input type="hidden" name="id_comment" value="<?php echo $id_coment ?>" >
              <button type="button" id="Delete_Comment" name="Delete_Comment" class="btn btn-danger">Excluir</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Plugins -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/script_User.js"></script>
  <script type="text/javascript" src="../js/jquery_User.js"></script>
  

</body>
</html>