<?php
    $pag = "perfil";
    require_once("../../config.php");
    
    @session_start();
    //verificação de autenticação do usuario
    if(@$_SESSION['id_usuario'] == null || @$_SESSION ['nivel_usuario'] != 'Admin'){
        echo "<script language='javascript'>window.location='../index.php'</script>";
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

<section id="PerfilAdm">
  
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

  <footer>
    <div class="rodapeBox col-lg-10">
        <h5>
            ©2021. Eulenir Eberle Psicóloga<br>
            CRP 08/24116. Todos os direitos reservados.
        </h5>
        <p>Produzido por <a target="_blank" href="https://mhborges.com.br"><img src="../../Imgs/MH_logo.svg" onload="SVGInject(this)"></a></p>
    </div>
  </footer>

  <div class="modalBX">
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
          <form method="POST" action="perfil/Inserir_perfil.php" enctype="multipart/form-data">
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
  </div>

  <script type="text/javascript" src="../js/script_User.js"></script>
  <script type="text/javascript" src="../js/jquery_UserAdm.js"></script>
  
</section>